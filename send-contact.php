<?php
/**
 * Contact Form Mail Handler
 *
 * File: send-contact.php (at site root)
 *
 * Receives the contact form submission, validates input,
 * and sends via authenticated PHPMailer SMTP.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';

// ---------------------------------------------------------
// SETTINGS
// ---------------------------------------------------------

$toEmail   = 'anmol@mediaclock.com.au';
$fromEmail = 'smtp@snm.bug.mybluehost.me';
$siteName  = 'Media Clock';

$smtpHost  = 'sh01076.bluehost.com';
$smtpUser  = 'smtp@snm.bug.mybluehost.me';
$smtpPass  = 'PeZ}Oe*G?fKP@B!D';
$smtpPort  = 587;

$recaptchaSecret = '';
$maxMessageLength = 180;

// ---------------------------------------------------------
// ONLY ACCEPT POST REQUESTS
// ---------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, 'Invalid request method.', 405);
}

// ---------------------------------------------------------
// HELPER FUNCTIONS
// ---------------------------------------------------------

function cleanText($value)
{
    $value = is_string($value) ? $value : '';
    return trim(strip_tags($value));
}

function sendResponse($success, $message, $statusCode = 200)
{
    http_response_code($statusCode);

    $isAjax =
        (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
         strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') ||
        (isset($_SERVER['HTTP_ACCEPT']) &&
         str_contains($_SERVER['HTTP_ACCEPT'], 'application/json'));

    if ($isAjax) {
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode([
            'success' => $success,
            'message' => $message
        ]);
        exit;
    }

    // Normal browser submission fallback
    if ($success) {
        header('Location: thank-you/?form=enquiry');
    } else {
        header('Content-Type: text/html; charset=UTF-8');
        echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><title>Form Error</title></head><body>';
        echo '<h1>Unable to submit the form</h1>';
        echo '<p>' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '<p><a href="javascript:history.back()">Go back</a></p>';
        echo '</body></html>';
    }
    exit;
}

// ---------------------------------------------------------
// GET FORM VALUES
// ---------------------------------------------------------

$firstName = cleanText($_POST['first_name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$phone     = cleanText($_POST['phone'] ?? '');
$company   = cleanText($_POST['company'] ?? '');
$website   = cleanText($_POST['website'] ?? '');
$interest  = cleanText($_POST['interest'] ?? '');
$budget    = cleanText($_POST['budget'] ?? '');
$message   = cleanText($_POST['message'] ?? '');

// ---------------------------------------------------------
// BASIC VALIDATION
// ---------------------------------------------------------

if ($firstName === '') {
    sendResponse(false, 'Please enter your first name.', 400);
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse(false, 'Please enter a valid email address.', 400);
}

if ($phone === '') {
    sendResponse(false, 'Please enter your contact number.', 400);
}

if ($company === '') {
    sendResponse(false, 'Please enter your company name.', 400);
}

if ($message === '') {
    sendResponse(false, 'Please enter your requirements.', 400);
}

if (mb_strlen($message) > $maxMessageLength) {
    sendResponse(false, 'Your requirements must be 180 characters or less.', 400);
}

if ($website !== '') {
    $websiteForValidation = $website;
    if (!preg_match('#^https?://#i', $websiteForValidation)) {
        $websiteForValidation = 'https://' . $websiteForValidation;
    }
    if (!filter_var($websiteForValidation, FILTER_VALIDATE_URL)) {
        sendResponse(false, 'Please enter a valid website address.', 400);
    }
}

$phoneDigits = preg_replace('/[^0-9+]/', '', $phone);
if (strlen(preg_replace('/[^0-9]/', '', $phoneDigits)) < 8) {
    sendResponse(false, 'Please enter a valid contact number.', 400);
}

// Honeypot check
$honeypot = trim($_POST['website_check'] ?? '');
if ($honeypot !== '') {
    sendResponse(true, 'Your consultation request has been received.');
}

// Google reCAPTCHA
if ($recaptchaSecret !== '') {
    $captchaResponse = $_POST['g-recaptcha-response'] ?? '';
    if ($captchaResponse === '') {
        sendResponse(false, 'Please complete the reCAPTCHA verification.', 400);
    }

    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $postData = http_build_query([
        'secret'   => $recaptchaSecret,
        'response' => $captchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
    ]);

    $context = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => $postData,
            'timeout' => 10
        ]
    ]);

    $captchaResult = @file_get_contents($verifyUrl, false, $context);
    $captchaData = $captchaResult ? json_decode($captchaResult, true) : null;
    if (empty($captchaData['success'])) {
        sendResponse(false, 'reCAPTCHA verification failed. Please try again.', 400);
    }
}

// ---------------------------------------------------------
// BUILD EMAIL CONTENT
// ---------------------------------------------------------

$subject = 'New Consultation Request - ' . $siteName;

$emailBody = "NEW CONSULTATION REQUEST\n";
$emailBody .= "==========================\n\n";
$emailBody .= "First Name: " . $firstName . "\n";
$emailBody .= "Email: " . $email . "\n";
$emailBody .= "Phone: +61 " . $phone . "\n";
$emailBody .= "Company: " . $company . "\n";

if ($website !== '') {
    $emailBody .= "Website: " . $website . "\n";
}
if ($interest !== '') {
    $emailBody .= "Interested In: " . $interest . "\n";
}
if ($budget !== '') {
    $emailBody .= "Project Budget: " . $budget . "\n";
}

$emailBody .= "\nRequirements:\n";
$emailBody .= "-------------\n";
$emailBody .= $message . "\n\n";

$emailBody .= "==========================\n";
$emailBody .= "Submitted from: " . ($_SERVER['HTTP_HOST'] ?? '') . "\n";
$emailBody .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? '') . "\n";
$emailBody .= "Date: " . date('Y-m-d H:i:s') . "\n";

// ---------------------------------------------------------
// SEND EMAIL VIA PHPMailer SMTP
// ---------------------------------------------------------

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;
    $mail->Password   = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $smtpPort;

    $mail->setFrom($fromEmail, $siteName);
    $mail->addAddress($toEmail, 'Website Enquiries');
    $mail->addReplyTo($email, $firstName);

    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body    = $emailBody;

    $mail->send();
    sendResponse(true, 'Thank you. Your consultation request has been received.');
} catch (Exception $e) {
    error_log('PHPMailer error in send-contact.php: ' . $mail->ErrorInfo);
    sendResponse(false, 'Sorry, we could not send your request right now. Please try again later.', 500);
}
