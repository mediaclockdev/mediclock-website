<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
 
$mail = new PHPMailer(true);
 
try {
 
    $mail->isSMTP();
 
    $mail->Host = 'sh01076.bluehost.com';
    $mail->SMTPAuth = true;
 
    $mail->Username = 'smtp@snm.bug.mybluehost.me';
 
    // Enter your NEW SMTP password here
    $mail->Password = 'PeZ}Oe*G?fKP@B!D';
 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
 
    // Sender
    $mail->setFrom(
        'smtp@snm.bug.mybluehost.me',
        'Media Clock'
    );
 
    // IMPORTANT: put your actual Outlook enquiry email here
    $mail->addAddress(
        'anmol@mediaclock.com.au',
        'Website Enquiries'
    );
 
    $mail->isHTML(false);
 
    $mail->Subject = 'Media Clock SMTP Test';
 
    $mail->Body = 'This is a test email from the Media Clock website using Bluehost authenticated SMTP.';
 
    $mail->send();
 
    echo 'SMTP email sent successfully.';
 
} catch (Exception $e) {
 
    echo 'SMTP email failed.<br><br>';
    echo 'Error: ' . htmlspecialchars($mail->ErrorInfo);
 
}