<?php
/* ============================================================
   * SMTP accounts — template
   Copy to data/private/smtp.php (git-ignored) and fill in the real
   values on each server. Tried in order; later entries are fallbacks.
   ============================================================ */
return [
    [
        'host' => 'sh01076.bluehost.com',
        'user' => 'smtp@mediaclock.com.au',
        'pass' => 'CHANGE_ME',
        'port' => 587,
        'from' => 'smtp@mediaclock.com.au',
    ],
];
