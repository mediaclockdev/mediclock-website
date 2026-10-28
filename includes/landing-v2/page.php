<?php
/* ============================================================
   * Advertisement landing pages v2 — template
   The minimal redesign, built section by section next to the original
   (includes/landing/), which it leaves untouched. It borrows that version's
   header, footer, quote modal and landing.css — logo, phone, buttons, form
   and tracking stay identical — and adds landing-v2.css for its own sections.

     $lp_city = 'perth';
     require __DIR__ . '/includes/landing-v2/page.php';
   ============================================================ */
if (!isset($lp_city)) {
    http_response_code(500);
    exit('landing page: $lp_city not set');
}

$lpRoot = dirname(__DIR__, 2);
$lpCityFile = $lpRoot . '/data/landing/' . $lp_city . '.php';
if (!is_file($lpCityFile)) {
    http_response_code(500);
    exit('landing page: no data file for ' . htmlspecialchars($lp_city, ENT_QUOTES, 'UTF-8'));
}

/* original shared copy, then the v2 copy over it, then the city over both */
$lp = array_merge(
    require $lpRoot . '/data/landing/common.php',
    require $lpRoot . '/data/landing-v2/common.php',
    require $lpCityFile
);
$lp['reviews'] = require $lpRoot . '/data/landing/reviews.php';
/* the short versions of the same reviews, in the same order */
foreach ($lp['v2_reviews_text'] as $lpI => $lpText) {
    if (isset($lp['reviews'][$lpI])) $lp['reviews'][$lpI]['text'] = $lpText;
}
unset($lpI, $lpText);

/* {city} can appear in any top-level line of copy */
foreach ($lp as $lpKey => $lpVal) {
    if (is_string($lpVal)) {
        $lp[$lpKey] = str_replace('{city}', $lp['city'], $lpVal);
    }
}
unset($lpKey, $lpVal, $lpRoot, $lpCityFile);

$e = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
$lpExtraCss = ['assets/css/landing-v2.css'];
$lpExtraJs  = ['assets/js/landing-v2.js'];
$lpHeaderCta = $lp['v2_header_cta'];

include dirname(__DIR__) . '/landing/header.php';

/* "landing/…" sections are the original page's own partials, used as they
   are so the two versions share one review slider and one quote form;
   landing-v2.css only enlarges their headings to this page's scale. */
echo '<main class="lp-main lp2-main">';
foreach ([
    'hero',             /* headline, one line, one button, the phones with the numbers scrolling over them */
    'logos',            /* "Global Success" — client logos sliding past, on the hero's dark */
    // 'stats',         /* four numbers that count up — now scroll over the hero phones (the reel in hero.php) */
    'work',             /* case studies, one wide card at a time */
    'pillars',          /* design, build, launch */

    // 'features',      /* three big promises, a phone each — hidden for now; remove the // to bring it back */
    'steps',            /* how it works, four steps */
    'pricing',          /* three tiers */
    'landing/reviews',  /* "What our clients say" — the Google review slider */
    'faq',              /* five questions */
    'landing/contact',  /* "Let's talk" + the quote form (#lp-quote) */
] as $lpSection) {
    include str_starts_with($lpSection, 'landing/')
        ? dirname(__DIR__) . '/landing/sections/' . substr($lpSection, 8) . '.php'
        : __DIR__ . '/sections/' . $lpSection . '.php';
}
echo '</main>';
unset($lpSection);

include dirname(__DIR__) . '/landing/footer.php';
