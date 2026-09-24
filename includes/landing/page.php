<?php
/* ============================================================
   * Advertisement landing pages — template
   The whole page, once. The two city pages at the site root each set
   $lp_city and include this file, so Perth and Melbourne can never drift
   apart: a fix made here lands on both.

   Adding a third city is a data file plus an eight-line page at the root —
   .htaccess and router.php already map /any-slug/ to any-slug.php, so there
   is no routing to change.

     $lp_city = 'perth';
     require __DIR__ . '/includes/landing/page.php';
   ============================================================ */
if (!isset($lp_city)) {
    http_response_code(500);
    exit('landing page: $lp_city not set');
}

$lpDir = dirname(__DIR__, 2) . '/data/landing';
$lpCityFile = $lpDir . '/' . $lp_city . '.php';
if (!is_file($lpCityFile)) {
    http_response_code(500);
    exit('landing page: no data file for ' . htmlspecialchars($lp_city, ENT_QUOTES, 'UTF-8'));
}

/* City values win; anything the city file leaves out falls back to the shared
   copy, so the pages stay identical except where a difference is intended. */
$lp = array_merge(require $lpDir . '/common.php', require $lpCityFile);
$lp['reviews'] = require $lpDir . '/reviews.php';

/* {city} is written once in the shared copy and filled in per page */
foreach (['hero_title', 'title', 'description'] as $lpKey) {
    $lp[$lpKey] = str_replace('{city}', $lp['city'], $lp[$lpKey]);
}
unset($lpKey, $lpDir, $lpCityFile);

$e = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');

include __DIR__ . '/header.php';

foreach ([
    'hero',
    'trusted',
    'trust',
    'platforms',
    'projects',
    'pricing',
    'roadmap',
    'tech',
    'categories',
    'reviews',
    'faq',
] as $lpSection) {
    include __DIR__ . '/sections/' . $lpSection . '.php';
}
unset($lpSection);

include __DIR__ . '/footer.php';
