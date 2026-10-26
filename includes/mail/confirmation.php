<?php
/**
 * Media Clock - Visitor Confirmation Email
 *
 * Builds and sends the "we received your enquiry" email back to whoever
 * submitted a form. The wording per form_type lives in
 * data/mail/confirmations.php; this file is the shared layout and sender.
 *
 * Used by send-contact.php after the team notification has gone out.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once dirname(__DIR__) . '/img.php';

/* Emails need absolute URLs (no relative links in an inbox). Fixed rather
   than read from HTTP_HOST: the Host header is sent by the visitor, and a
   forged one would put an attacker's domain on every link we email out.
   Define MC_SITE_URL before including this file to override it. */
if (!defined('MC_SITE_URL')) {
    define('MC_SITE_URL', 'https://mediaclock.com.au/');
}

/**
 * Builds the confirmation for one form submission.
 *
 * $data    name, position, service, source, page_context
 * $summary label => value pairs repeated back under "Your details";
 *          short structured answers only, never free text (see send-contact.php)
 *
 * Returns ['subject' => ..., 'html' => ..., 'text' => ...]
 */
function mc_build_confirmation(string $formType, array $data, array $summary): array
{
    $all = require dirname(__DIR__, 2) . '/data/mail/confirmations.php';
    $cfg = $all[$formType] ?? $all['contact'];

    // ---------------------------------------------------------
    // 1. PLACEHOLDERS
    //    Every value here is typed by the visitor, so each is capped in
    //    length; the greeting only uses a name that looks like a name, so
    //    "Hi www.spam-site.com," can't be sent under our brand.
    // ---------------------------------------------------------

    $val = fn(string $key): string => mb_strimwidth(trim((string) ($data[$key] ?? '')), 0, 60, '...');
    $firstName = explode(' ', $val('name'))[0];
    if (!preg_match("/^[\p{L}'-]{1,30}$/u", $firstName)) {
        $firstName = '';
    }
    $summary = array_map(fn($v) => mb_strimwidth((string) $v, 0, 80, '...'), $summary);

    $vars = [
        '{first_name}' => $firstName !== '' ? $firstName : 'there',
        '{position}'   => $val('position') !== '' ? $val('position') : 'the role',
        '{service}'    => $val('service') !== '' ? $val('service') : 'your project',
        '{in_city}'    => $val('source') !== '' ? ' in ' . $val('source') : '',
        '{from_page}'  => $val('page_context') !== '' ? ' after viewing ' . $val('page_context') : '',
    ];
    $fill = fn(string $s): string => strtr($s, $vars);
    $e    = fn(string $s): string => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');

    $subject    = $fill($cfg['subject']);
    $heading    = $fill($cfg['heading']);
    $paragraphs = array_map($fill, $cfg['paragraphs']);
    $steps      = array_values($cfg['next_steps'] ?? []);
    $cta        = $cfg['cta'] ?? null;
    $ctaUrl     = $cta ? MC_SITE_URL . ltrim($cta['path'], '/') : '';
    $showSummary = !empty($cfg['show_summary']) && $summary;
    $contact    = mc_contact();

    // ---------------------------------------------------------
    // 2. HTML BODY
    //    Tables + inline styles only: Gmail and Outlook strip <style>
    //    blocks and ignore flexbox/grid.
    // ---------------------------------------------------------

    $pHtml = '';
    foreach ($paragraphs as $p) {
        $pHtml .= '<p style="margin: 0 0 12px; font-size: 16px; line-height: 1.6; color: #3d4b52;">' . $e($p) . '</p>';
    }

    $stepsHtml = '';
    if ($steps) {
        $stepsHtml = '<p style="margin: 20px 0 12px; font-size: 16px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #192b34;">What happens next</p>';
        foreach ($steps as $i => $step) {
            $stepsHtml .= '
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 0 0 10px;">
                <tr>
                    <td width="26" height="26" align="center" style="width: 26px; height: 26px; border-radius: 13px; background-color: #f15a26; color: #ffffff; font-size: 13px; font-weight: 700;">' . ($i + 1) . '</td>
                    <td style="padding-left: 12px; font-size: 17px; color: #192b34;">' . $e($step) . '</td>
                </tr>
            </table>';
        }
    }

    $ctaHtml = '';
    if ($cta) {
        $ctaHtml = '
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 16px 0 0;">
                <tr>
                    <td style="border-radius: 999px; background-color: #f15a26;">
                        <a href="' . $e($ctaUrl) . '" target="_blank" style="display: inline-block; padding: 13px 28px; font-size: 15px; font-weight: 700; color: #ffffff; text-decoration: none;">' . $e($cta['label']) . '</a>
                    </td>
                </tr>
            </table>';
    }

    $summaryHtml = '';
    if ($showSummary) {
        $rows = '';
        foreach ($summary as $label => $value) {
            $rows .= '
                <tr>
                    <td width="40%" style="padding: 8px 12px 8px 0; font-size: 16px; color: #7a868c; vertical-align: top;">' . $e($label) . '</td>
                    <td style="padding: 8px 0; font-size: 16px; font-weight: 600; color: #192b34; word-break: break-word;">' . $e($value) . '</td>
                </tr>';
        }
        $summaryHtml = '
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top: 32px; border-top: 1px solid #e4e9eb;">
                <tr><td colspan="2" style="padding: 12px 0 6px; font-size: 18px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #192b34;">Your details</td></tr>
                ' . $rows . '
            </table>';
    }

    $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $e($subject) . '</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6f7; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f6f7;">
        <tr>
            <td align="center" style="padding: 24px 12px;">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; overflow: hidden;">
                    <tr>
                        <td style="padding: 26px 32px; border-bottom: 3px solid #f15a26;">
                            <img src="' . MC_SITE_URL . 'assets/images/logo-dark.png" alt="Media Clock" width="150" style="display: block; border: 0; max-width: 150px; height: auto;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 32px;">
                            <p style="margin: 0 0 6px; font-size: 18px; color: #3d4b52;">Hi ' . $e($vars['{first_name}']) . ',</p>
                            <h1 style="margin: 0 0 8px; font-size: 30px; line-height: 1.3; color: #192b34;">' . $e($heading) . '</h1>
                            ' . $pHtml . $stepsHtml . $ctaHtml . $summaryHtml . '
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 14px 18px; background-color: #192b34; font-size: 15px; line-height: 1.7; color: #c9d1d4;">
                            Need to talk sooner? Call <a href="' . $e('tel:' . $contact['dialer']['tel']) . '" style="color: #ffffff; text-decoration: none; font-weight: 700;">' . $e($contact['dialer']['text']) . '</a> or simply reply to this email.<br>
                            Media Clock &middot; <a href="' . MC_SITE_URL . '" target="_blank" style="color: #ffffff; text-decoration: none;">mediaclock.com.au</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

    // ---------------------------------------------------------
    // 3. PLAIN TEXT BODY
    //    For text-only clients; sending HTML without it also raises
    //    the spam score.
    // ---------------------------------------------------------

    $text  = "Hi {$vars['{first_name}']},\n\n";
    $text .= $heading . "\n\n";
    $text .= implode("\n\n", $paragraphs) . "\n";
    if ($steps) {
        $text .= "\nWhat happens next:\n";
        foreach ($steps as $i => $step) {
            $text .= ($i + 1) . ". {$step}\n";
        }
    }
    if ($cta) {
        $text .= "\n{$cta['label']}: {$ctaUrl}\n";
    }
    if ($showSummary) {
        $text .= "\nYour details\n------------\n";
        foreach ($summary as $label => $value) {
            $text .= "{$label}: {$value}\n";
        }
    }
    $text .= "\n====================================\n";
    $text .= "Need to talk sooner? Call {$contact['dialer']['text']} or reply to this email.\n";
    $text .= "Media Clock | " . MC_SITE_URL . "\n";

    return ['subject' => $subject, 'html' => $html, 'text' => $text];
}

/**
 * Sends the confirmation, trying each SMTP config in turn.
 *
 * Never throws: a failed "thank you" is logged, and the visitor still sees
 * success because their enquiry already reached the team.
 */
function mc_send_confirmation(array $smtpConfigs, string $siteName, string $toEmail, string $toName, array $parts): bool
{
    // Replies go to the real inbox, not the smtp@ sending account
    $replyTo = mc_contact()['email'];

    foreach ($smtpConfigs as $cfg) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = $cfg['host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $cfg['user'];
            $mail->Password   = $cfg['pass'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $cfg['port'];

            $mail->CharSet    = 'UTF-8';
            $mail->Encoding   = 'base64';
            $mail->Timeout    = 12;

            $mail->setFrom($cfg['from'], $siteName);
            $mail->addAddress($toEmail, $toName);
            $mail->addReplyTo($replyTo, $siteName);

            $mail->isHTML(true);
            $mail->Subject = $parts['subject'];
            $mail->Body    = $parts['html'];
            $mail->AltBody = $parts['text'];

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Confirmation email failed with {$cfg['user']}: " . ($mail->ErrorInfo ?: $e->getMessage()));
        }
    }
    return false;
}
