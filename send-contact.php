<?php
/**
 * Media Clock - Unified Form Mail Handler
 *
 * File: send-contact.php (at site root)
 *
 * Receives submissions from all website forms (Contact, Mobile App Landing,
 * Custom Software Development, Careers, RFP, Newsletter) and sends a
 * responsive branded HTML email via authenticated PHPMailer SMTP.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';

// ---------------------------------------------------------
// 1. SETTINGS & RECIPIENTS
// ---------------------------------------------------------

$toEmails = [
    'anmol@mediaclock.com.au',
    'mediaclockdev@gmail.com',
    'darshit@mediaclock.com.au',
    'raj@mediaclock.com.au',
];

$fromEmail = 'smtp@mediaclock.com.au';
$siteName  = 'Media Clock';

$smtpHost  = 'sh01076.bluehost.com';
$smtpUser  = 'smtp@mediaclock.com.au';
$smtpPass  = 'pzKZ*hn!]jQ?35lS';
$smtpPort  = 587;

$recaptchaSecret = '';

// ---------------------------------------------------------
// 2. CORS PREFLIGHT & REQUEST METHOD CHECK
// ---------------------------------------------------------

$requestMethod = strtoupper($_SERVER['REQUEST_METHOD'] ?? '');

if ($requestMethod === 'OPTIONS') {
    http_response_code(204);
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Accept');
    exit;
}

if ($requestMethod !== 'POST') {
    sendResponse(false, 'Invalid request method.', 405);
}

// ---------------------------------------------------------
// 3. HELPER FUNCTIONS
// ---------------------------------------------------------

function normalizeEmailText(string $str): string
{
    // Convert unicode dashes (en-dash, em-dash, figure dash, minus) to standard ASCII hyphen
    $str = str_replace(
        ["\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\x92", "\xe2\x80\x95", "\xe2\x88\x92", '–', '—', '‒', '―', '−'],
        '-',
        $str
    );
    // Convert unicode bullets, middle dots to standard pipe
    $str = str_replace(
        ["\xe2\x80\xa2", "\xc2\xb7", "\xe2\x88\x99", '•', '·', '∙'],
        '|',
        $str
    );
    // Convert non-breaking spaces and wide spaces to standard ASCII space
    $str = str_replace(
        ["\xc2\xa0", "\u{00A0}", "\u{2007}", "\u{202F}", '&nbsp;'],
        ' ',
        $str
    );
    // Convert typographic single and double quotes to standard ASCII quotes
    $str = str_replace(
        ["\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9a", "\xe2\x80\x9b", '‘', '’', '‚', '‛'],
        "'",
        $str
    );
    $str = str_replace(
        ["\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x9e", "\xe2\x80\x9f", '“', '”', '„', '‟'],
        '"',
        $str
    );
    // Remove control characters (except newline, tab, carriage return)
    $str = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $str);
    return $str;
}

function cleanText($value): string
{
    $value = is_string($value) ? $value : '';
    $clean = trim(strip_tags($value));
    return normalizeEmailText($clean);
}

function sendResponse(bool $success, string $message, int $statusCode = 200, string $thankYouKind = 'enquiry'): void
{
    http_response_code($statusCode);

    $accept = $_SERVER['HTTP_ACCEPT'] ?? '';
    $requestedWith = strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');

    $isAjax =
        $requestedWith === 'xmlhttprequest' ||
        strpos($accept, 'application/json') !== false;

    if ($isAjax) {
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode([
            'success' => $success,
            'message' => $message,
            'kind'    => $thankYouKind,
        ]);
        exit;
    }

    // Normal browser submission fallback
    if ($success) {
        header('Location: thank-you/?form=' . urlencode($thankYouKind));
        exit;
    }

    header('Content-Type: text/html; charset=UTF-8');
    echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><title>Form Error</title></head><body>';
    echo '<h1>Unable to submit the form</h1>';
    echo '<p>' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><a href="javascript:history.back()">Go back</a></p>';
    echo '</body></html>';
    exit;
}

// Honeypot check (anti-bot)
$honeypot = trim($_POST['website_check'] ?? '');
if ($honeypot !== '') {
    sendResponse(true, 'Your request has been received.');
}

// ---------------------------------------------------------
// 4. IDENTIFY FORM TYPE & EXTRACT FIELDS
// ---------------------------------------------------------

$formType = strtolower(cleanText($_POST['form_type'] ?? ''));

// Detect form type if not explicitly supplied
if ($formType === '') {
    if (isset($_POST['csd_name']) || isset($_POST['csd_email'])) {
        $formType = 'csd';
    } elseif (isset($_POST['lp_name']) || isset($_POST['lp_email']) || isset($_POST['lp_source'])) {
        $formType = 'landing';
    } elseif (isset($_POST['rfp_name']) || isset($_POST['rfp_service'])) {
        $formType = 'rfp';
    } elseif (isset($_POST['position']) || isset($_FILES['resume'])) {
        $formType = 'career';
    } elseif (isset($_POST['subscribe_email']) || (isset($_POST['email']) && count($_POST) === 1)) {
        $formType = 'subscribe';
    } else {
        $formType = 'contact';
    }
}

// Extract Common Fields across forms
$name = cleanText(
    $_POST['name'] ??
    $_POST['first_name'] ??
    $_POST['csd_name'] ??
    $_POST['rfp_name'] ??
    $_POST['lp_name'] ??
    ''
);

$email = trim(
    $_POST['email'] ??
    $_POST['csd_email'] ??
    $_POST['rfp_email'] ??
    $_POST['lp_email'] ??
    $_POST['subscribe_email'] ??
    ''
);

$phone = cleanText(
    $_POST['phone'] ??
    $_POST['csd_phone'] ??
    $_POST['rfp_phone'] ??
    $_POST['lp_phone'] ??
    ''
);

$message = cleanText(
    $_POST['message'] ??
    $_POST['lp_message'] ??
    $_POST['rfp_message'] ??
    $_POST['csd_message'] ??
    ''
);

$source = cleanText(
    $_POST['source'] ??
    $_POST['lp_source'] ??
    $_POST['csd_source'] ??
    ''
);

// Specific fields
$company   = cleanText($_POST['company'] ?? '');
$website   = cleanText($_POST['website'] ?? '');
$position  = cleanText($_POST['position'] ?? '');
$csdType   = cleanText($_POST['csd_type'] ?? '');
$service   = cleanText($_POST['service'] ?? $_POST['rfp_service'] ?? '');
$interest  = cleanText($_POST['interest'] ?? '');
$budget    = cleanText($_POST['budget'] ?? '');

// ---------------------------------------------------------
// 5. BASIC VALIDATION
// ---------------------------------------------------------

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse(false, 'Please enter a valid email address.', 400);
}

if ($formType !== 'subscribe') {
    if ($name === '') {
        sendResponse(false, 'Please enter your name.', 400);
    }
    if ($phone === '') {
        sendResponse(false, 'Please enter your phone number.', 400);
    }
    $phoneDigits = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phoneDigits) < 8) {
        sendResponse(false, 'Please enter a valid phone number (at least 8 digits).', 400);
    }
}

// Google reCAPTCHA (if configured)
if ($recaptchaSecret !== '') {
    $captchaResponse = $_POST['g-recaptcha-response'] ?? '';
    if ($captchaResponse === '') {
        sendResponse(false, 'Please complete the reCAPTCHA verification.', 400);
    }
    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $postData = http_build_query([
        'secret'   => $recaptchaSecret,
        'response' => $captchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
    ]);
    $context = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => $postData,
            'timeout' => 10,
        ],
    ]);
    $captchaResult = @file_get_contents($verifyUrl, false, $context);
    $captchaData = $captchaResult ? json_decode($captchaResult, true) : null;
    if (empty($captchaData['success'])) {
        sendResponse(false, 'reCAPTCHA verification failed. Please try again.', 400);
    }
}

// ---------------------------------------------------------
// 6. BUILD FORM METADATA & TITLE
// ---------------------------------------------------------

$thankYouKind = 'enquiry';

switch ($formType) {
    case 'career':
        $thankYouKind = 'application';
        $badgeLabel   = 'Careers | Job Application';
        $emailHeading = 'New Job Application';
        $subject      = 'New Job Application' . ($position !== '' ? " ({$position})" : '') . " - {$siteName}";
        break;

    case 'csd':
        $thankYouKind = 'enquiry';
        $badgeLabel   = 'Custom Software Development' . ($source !== '' ? " | {$source}" : '');
        $emailHeading = 'New Custom Software Enquiry';
        $subject      = 'New Custom Software Enquiry' . ($source !== '' ? " ({$source})" : '') . " - {$siteName}";
        break;

    case 'landing':
        $thankYouKind = 'enquiry';
        $badgeLabel   = 'Mobile App Development' . ($source !== '' ? " | {$source}" : '');
        $emailHeading = 'New App Consultation Request';
        $subject      = 'New App Consultation Request' . ($source !== '' ? " ({$source})" : '') . " - {$siteName}";
        break;

    case 'rfp':
        $thankYouKind = 'proposal';
        $badgeLabel   = 'Service Proposal (RFP)' . ($service !== '' ? " | {$service}" : '');
        $emailHeading = 'New Request For Proposal';
        $subject      = 'New Request For Proposal' . ($service !== '' ? " ({$service})" : '') . " - {$siteName}";
        break;

    case 'subscribe':
        $thankYouKind = 'enquiry';
        $badgeLabel   = 'Newsletter Subscription';
        $emailHeading = 'New Newsletter Subscriber';
        $subject      = "New Newsletter Subscription - {$siteName}";
        break;

    case 'contact':
    default:
        $thankYouKind = 'enquiry';
        $badgeLabel   = 'Website Enquiry';
        $emailHeading = 'New Consultation Request';
        $subject      = "New Consultation Request - {$siteName}";
        break;
}

// Assemble fields table
$displayFields = [];

if ($name !== '') {
    $displayFields['Full Name'] = $name;
}
$displayFields['Email Address'] = $email;
if ($phone !== '') {
    $displayFields['Phone Number'] = $phone;
}
if ($position !== '') {
    $displayFields['Applied Position'] = $position;
}
if ($csdType !== '') {
    $displayFields['Project Type'] = $csdType;
}
if ($service !== '') {
    $displayFields['Interested Service'] = $service;
}
if ($company !== '') {
    $displayFields['Company Name'] = $company;
}
if ($website !== '') {
    $displayFields['Website'] = $website;
}
if ($interest !== '') {
    $displayFields['Interest'] = $interest;
}
if ($budget !== '') {
    $displayFields['Project Budget'] = $budget;
}
if ($source !== '') {
    $displayFields['Campaign / City'] = $source;
}

// Check for file attachment (Careers)
$hasAttachment = false;
$attachedFileName = '';
if (!empty($_FILES['resume']['tmp_name']) && is_uploaded_file($_FILES['resume']['tmp_name'])) {
    $hasAttachment = true;
    $attachedFileName = basename($_FILES['resume']['name'] ?? 'Resume.pdf');
    $displayFields['Attached CV / Resume'] = $attachedFileName . ' (attached)';
}

// ---------------------------------------------------------
// 7. BUILD HTML & PLAIN TEXT EMAIL
// ---------------------------------------------------------

$hBadge   = htmlspecialchars($badgeLabel, ENT_QUOTES, 'UTF-8');
$hHeading = htmlspecialchars($emailHeading, ENT_QUOTES, 'UTF-8');
$hMessage = nl2br(htmlspecialchars($message !== '' ? $message : '(Not provided)', ENT_QUOTES, 'UTF-8'));
$cleanPhone = preg_replace('/[^0-9+]/', '', $phone);

$hostName  = htmlspecialchars($_SERVER['HTTP_HOST'] ?? 'mediaclock.com.au', ENT_QUOTES, 'UTF-8');
$ipAddress = htmlspecialchars($_SERVER['REMOTE_ADDR'] ?? 'Unknown', ENT_QUOTES, 'UTF-8');
$timestamp = date('d M Y, h:i A');

// Build table rows
$rowsHtml = '';
foreach ($displayFields as $label => $val) {
    $hL = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
    $hV = htmlspecialchars($val, ENT_QUOTES, 'UTF-8');

    if (strpos($label, 'Email') !== false) {
        $valHtml = '<a href="mailto:' . $hV . '" style="color: #f15a26; text-decoration: none; font-size: 15px; font-weight: 600;">' . $hV . '</a>';
    } elseif (strpos($label, 'Phone') !== false) {
        $valHtml = '<a href="tel:' . $cleanPhone . '" style="color: #192b34; text-decoration: none; font-size: 15px; font-weight: 600;">' . $hV . '</a>';
    } elseif (strpos($label, 'Website') !== false) {
        $webUrl = preg_match('#^https?://#i', $val) ? $val : 'https://' . $val;
        $valHtml = '<a href="' . htmlspecialchars($webUrl, ENT_QUOTES, 'UTF-8') . '" target="_blank" style="color: #f15a26; text-decoration: none; font-size: 15px; font-weight: 600;">' . $hV . '</a>';
    } elseif (strpos($label, 'Campaign') !== false || strpos($label, 'Position') !== false || strpos($label, 'Project Type') !== false) {
        $valHtml = '<span style="display: inline-block; background-color: #eef1f2; color: #192b34; font-size: 13px; font-weight: 600; padding: 4px 12px; border-radius: 999px;">' . $hV . '</span>';
    } elseif (strpos($label, 'Attached') !== false) {
        $valHtml = '<span style="display: inline-block; background-color: #e6f7ed; color: #0e6245; font-size: 13px; font-weight: 600; padding: 4px 12px; border-radius: 999px;">[Attached] ' . $hV . '</span>';
    } else {
        $valHtml = '<span style="font-size: 15px; font-weight: 600; color: #192b34;">' . $hV . '</span>';
    }

    $rowsHtml .= '
    <tr>
      <td style="padding: 12px 0; border-bottom: 1px solid #edf1f3;">
        <span style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #82929b; margin-bottom: 3px;">' . $hL . '</span>
        ' . $valHtml . '
      </td>
    </tr>';
}

$messageBlockHtml = '';
if ($message !== '' || $formType !== 'subscribe') {
    $messageTitle = ($formType === 'career') ? 'Applicant Note / Message' : (($formType === 'landing') ? 'App Idea' : 'Requirements / Message');
    $messageBlockHtml = '
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 14px; margin-bottom: 4px; background-color: #f8fafb; border-left: 3px solid #f15a26; border-radius: 0 8px 8px 0;">
      <tr>
        <td style="padding: 18px 20px;">
          <span style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #82929b; margin-bottom: 6px;">' . htmlspecialchars($messageTitle, ENT_QUOTES, 'UTF-8') . '</span>
          <div style="font-size: 14px; line-height: 1.6; color: #243740;">' . $hMessage . '</div>
        </td>
      </tr>
    </table>';
}

$htmlBody = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$hHeading}</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6f8; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #192b34; -webkit-font-smoothing: antialiased;">
  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f4f6f8; padding: 30px 15px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06); border: 1px solid #e5e9ec;">
          
          <!-- Top Accent Bar -->
          <tr>
            <td height="4" style="background-color: #f15a26; font-size: 0; line-height: 0;">&nbsp;</td>
          </tr>

          <!-- Header -->
          <tr>
            <td style="padding: 28px 32px 22px 32px; background-color: #192b34; color: #ffffff;">
              <span style="font-size: 12px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; color: #f15a26; display: block; margin-bottom: 6px;">{$siteName} &nbsp;|&nbsp; {$hBadge}</span>
              <h1 style="margin: 0; font-size: 20px; font-weight: 700; color: #ffffff; line-height: 1.3;">{$hHeading}</h1>
            </td>
          </tr>

          <!-- Content Body -->
          <tr>
            <td style="padding: 28px 32px 28px 32px;">
              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                {$rowsHtml}
              </table>

              {$messageBlockHtml}
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;

// Build Plain Text AltBody
$textBody  = strtoupper($emailHeading) . "\n";
$textBody .= str_repeat('=', strlen($emailHeading)) . "\n\n";
foreach ($displayFields as $k => $v) {
    $textBody .= "{$k}: {$v}\n";
}
if ($message !== '') {
    $textBody .= "\nMessage / Requirements:\n";
    $textBody .= "------------------------\n";
    $textBody .= $message . "\n\n";
}
$textBody .= "====================================\n";
$textBody .= "Submitted from: {$hostName}\n";
$textBody .= "IP: {$ipAddress}\n";
$textBody .= "Date: {$timestamp}\n";

// ---------------------------------------------------------
// 8. SEND VIA PHPMailer SMTP
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

    $mail->CharSet    = 'UTF-8';
    $mail->Encoding   = 'base64';

    $mail->setFrom($fromEmail, $siteName);

    // Add all recipients
    $recipients = !empty($toEmails) ? $toEmails : ($toEmail ?? []);
    $recipients = is_array($recipients) ? $recipients : explode(',', (string) $recipients);
    foreach ($recipients as $recipient) {
        $recipient = trim($recipient);
        if ($recipient !== '' && filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            $mail->addAddress($recipient);
        }
    }

    // Set reply-to as the visitor's email
    if ($email !== '') {
        $mail->addReplyTo($email, $name !== '' ? $name : 'Website Visitor');
    }

    // Attach uploaded CV / Resume if present (Careers)
    if ($hasAttachment && !empty($_FILES['resume']['tmp_name'])) {
        $mail->addAttachment($_FILES['resume']['tmp_name'], $attachedFileName);
    }

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $htmlBody;
    $mail->AltBody = $textBody;

    $mail->send();

    sendResponse(true, 'Thank you. Your request has been received.', 200, $thankYouKind);

} catch (Exception $e) {
    error_log('PHPMailer error in send-contact.php: ' . $mail->ErrorInfo);
    sendResponse(false, 'Sorry, we could not send your request right now. Please try again later.', 500);
}