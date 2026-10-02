<?php
/* ============================================================
   * Custom Software Development ad pages — template
   The whole page, once. The two city pages at the site root each set
   $csd_city and include this file, so Perth and Melbourne can never drift
   apart: a fix made here lands on both.

   Adding a third city is a data file plus an eight-line page at the root —
   .htaccess and router.php already map /any-slug/ to any-slug.php, so there
   is no routing to change.

     $csd_city = 'perth';
     require __DIR__ . '/includes/csd/page.php';

   Deliberately separate from includes/landing/ (the mobile-app ad pages).
   Same idea, different campaign and a different design: keeping them apart
   is what stops a tweak to one campaign moving a section in the other.
   ============================================================ */
if (!isset($csd_city)) {
    http_response_code(500);
    exit('custom software page: $csd_city not set');
}

$csdDir  = dirname(__DIR__, 2) . '/data/csd';
$csdFile = $csdDir . '/' . $csd_city . '.php';
if (!is_file($csdFile)) {
    http_response_code(500);
    exit('custom software page: no data file for ' . htmlspecialchars($csd_city, ENT_QUOTES, 'UTF-8'));
}

/* City values win; anything the city file leaves out falls back to the shared
   copy, so the pages stay identical except where a difference is intended. */
$csd = array_merge(require $csdDir . '/common.php', require $csdFile);

/* {city} is written once in the shared copy and filled in per page */
foreach (['hero_eyebrow', 'title', 'description'] as $csdKey) {
    $csd[$csdKey] = str_replace('{city}', $csd['city'], $csd[$csdKey]);
}
unset($csdKey, $csdDir, $csdFile);

$e = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');

include __DIR__ . '/header.php';

echo '<main class="csd-main">';
foreach ([
    'hero',      /* headline, video stage and the quick form band */
    'trusted',   /* logo marquee — same as the mobile-app ad pages */
    'pain',
    'projects',
    'build',
    'own',
    'process',
    'pricing',
    'tech',      /* tech slider — same as the mobile-app ad pages */
    'reviews',
    'faq',
    'cta',
] as $csdSection) {
    include __DIR__ . '/sections/' . $csdSection . '.php';
}
echo '</main>';
unset($csdSection);

include __DIR__ . '/footer.php';
