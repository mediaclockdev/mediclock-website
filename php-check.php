<?php
/* Temporary: confirms the server's PHP version. Delete after checking. */
echo 'PHP ' . PHP_VERSION . ' — ';
echo version_compare(PHP_VERSION, '8.0', '>=')
    ? 'OK for this site'
    : 'TOO OLD, this site needs PHP 8.0+';
