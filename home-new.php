<?php
/* ============================================================
   * Homepage (new design) — test URL /home-new/
   Will replace index.php once approved. Until then it is noindex so it
   never competes with / in search. To go live: move this file's contents
   into index.php, drop $page_robots, and delete this file.

   The site header and footer are the shared ones; only the body is new.
   Everything on the page is namespaced .hn- (assets/css/home-new.css)
   so it cannot collide with main.css or Bootstrap.
   Content lives in data/home-new/home.php.
   ============================================================ */
$page_title       = 'Media Clock | Bespoke Apps, Web & Digital Growth';
$page_description = 'Media Clock designs and develops purposeful mobile apps, web platforms and digital experiences for Australian businesses.';
$page_robots      = 'noindex, nofollow';
$page_css         = ['home-new', 'quote-modal'];
$page_js          = 'home-new';
$page_fonts       = 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap';
include 'includes/layout/header.php';

$hn = require __DIR__ . '/data/home-new/home.php';
?>
<div class="hn-page">
    <!-- reveal-on-scroll only hides content once JS is known to be running -->
    <script>document.documentElement.classList.add('hn-js');</script>
    <!-- scroll progress bar along the top of the window -->
    <div class="hn-progress" aria-hidden="true"></div>
<?php
include 'includes/sections/home-new/hero.php';
include 'includes/sections/home-new/work.php';
include 'includes/sections/home-new/about.php';
include 'includes/sections/home-new/services.php';
include 'includes/sections/home-new/process.php';
include 'includes/sections/home-new/testimonial.php';
include 'includes/sections/home-new/contact.php';

// * Quote popup — the header's "Get a Quote" (and any .contactBtn) opens it in place
$quote_context = 'our homepage';
include 'includes/components/quote-modal.php';
?>
</div>
<?php
include 'includes/layout/footer.php';
