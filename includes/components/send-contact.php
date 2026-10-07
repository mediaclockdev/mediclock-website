<?php
/**
 * Contact Form Mail Handler
 *
 * File: send-contact.php
 *
 * This receives the contact form submission, validates it,
 * optionally verifies Google reCAPTCHA, and sends the email.
 */

// ---------------------------------------------------------
// SETTINGS
// ---------------------------------------------------------

// Email address where enquiries should be received.
$toEmail = 'anmol@mediaclock.com.au';

// Email address used as the sender.
// IMPORTANT: Ideally use an email address on your own domain.
$fromEmail = 'noreply@mediaclock.com.au';

// Website/company name.
$siteName = 'mediaclock';

// Google reCAPTCHA secret key.
// Leave empty if reCAPTCHA is not being used.
$recaptchaSecret = '';

// Maximum message length.
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

    // If request came through fetch/AJAX, return JSON.
    $isAjax =
        isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';

    if ($isAjax || strpos($accept, 'application/json') !== false) {
        header('Content-Type: application/json; charset=UTF-8');

        echo json_encode([
            'success' => $success,
            'message' => $message
        ]);

        exit;
    }

    // Normal browser submission.
    header('Content-Type: text/html; charset=UTF-8');

    if ($success) {
        echo '<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Thank You</title>
</head>
<body>
<h1>Thank you.</h1>
<p>Your consultation request has been received.</p>
<p><a href="javascript:history.back()">Go back</a></p>
</body>
</html>';
    } else {
        echo '<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Form Error</title>
</head>
<body>
<h1>Unable to submit the form</h1>
<p>' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>
<p><a href="javascript:history.back()">Go back</a></p>
</body>
</html>';
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


// ---------------------------------------------------------
// WEBSITE VALIDATION - OPTIONAL FIELD
// ---------------------------------------------------------

if ($website !== '') {

    // Add https:// temporarily if user entered just example.com
    $websiteForValidation = $website;

    if (
        !preg_match('#^https?://#i', $websiteForValidation)
    ) {
        $websiteForValidation = 'https://' . $websiteForValidation;
    }

    if (!filter_var($websiteForValidation, FILTER_VALIDATE_URL)) {
        sendResponse(false, 'Please enter a valid website address.', 400);
    }
}


// ---------------------------------------------------------
// PHONE VALIDATION
// ---------------------------------------------------------

// Remove spaces, brackets, hyphens etc.
$phoneDigits = preg_replace('/[^0-9+]/', '', $phone);

if (strlen(preg_replace('/[^0-9]/', '', $phoneDigits)) < 8) {
    sendResponse(false, 'Please enter a valid contact number.', 400);
}


// ---------------------------------------------------------
// HONEYPOT / SPAM PROTECTION
// ---------------------------------------------------------

// If you later add a hidden field named "website_check",
// bots filling it should be rejected.

$honeypot = trim($_POST['website_check'] ?? '');

if ($honeypot !== '') {
    // Return a generic success response so bots do not know
    // that they were detected.
    sendResponse(true, 'Your consultation request has been received.');
}


// ---------------------------------------------------------
// GOOGLE reCAPTCHA VALIDATION
// ---------------------------------------------------------

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

    if ($captchaResult === false) {
        sendResponse(false, 'reCAPTCHA verification failed. Please try again.', 400);
    }

    $captchaData = json_decode($captchaResult, true);

    if (empty($captchaData['success'])) {
        sendResponse(false, 'reCAPTCHA verification failed. Please try again.', 400);
    }
}


// ---------------------------------------------------------
// EMAIL SUBJECT
// ---------------------------------------------------------

$subject = 'New Consultation Request - ' . $siteName;


// ---------------------------------------------------------
// BUILD EMAIL
// ---------------------------------------------------------

$emailBody = '';

$emailBody .= "NEW CONSULTATION REQUEST\n";
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

$emailBody .= "\n";
$emailBody .= "Requirements:\n";
$emailBody .= "-------------\n";
$emailBody .= $message . "\n\n";

$emailBody .= "==========================\n";
$emailBody .= "Submitted from: " . ($_SERVER['HTTP_HOST'] ?? '') . "\n";
$emailBody .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? '') . "\n";
$emailBody .= "Date: " . date('Y-m-d H:i:s') . "\n";


// ---------------------------------------------------------
// EMAIL HEADERS
// ---------------------------------------------------------

$headers = [];

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/plain; charset=UTF-8';

// IMPORTANT:
// Do NOT put the visitor's email into the From header.
// Use your own domain email to reduce spoofing / delivery problems.
$headers[] = 'From: ' . $siteName . ' <' . $fromEmail . '>';

// Visitor's email goes into Reply-To.
$headers[] = 'Reply-To: ' . $email;


// ---------------------------------------------------------
// SEND EMAIL
// ---------------------------------------------------------

$mailSent = @mail(
    $toEmail,
    $subject,
    $emailBody,
    implode("\r\n", $headers)
);


// ---------------------------------------------------------
// RESULT
// ---------------------------------------------------------

if (!$mailSent) {

    // Do not expose server/mail configuration to visitors.
    sendResponse(
        false,
        'Sorry, we could not send your request right now. Please try again later.',
        500
    );
}

sendResponse(
    true,
    'Thank you. Your consultation request has been received.'
);