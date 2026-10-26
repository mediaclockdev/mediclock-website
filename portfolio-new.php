<?php
/* ============================================================
   * Portfolio (new design) — test URL /portfolio-new/
   Will replace portfolio.php. Until then it is noindex so it never
   competes with /portfolio/ in search. To go live: move this file's
   contents into portfolio.php, drop $page_robots, and delete this file.

   Everything on the page is namespaced .pf- (assets/css/portfolio-new.css)
   so it cannot collide with main.css or Bootstrap.
   ============================================================ */
$page_title       = 'Our Recent Work | Media Clock';
$page_description = 'Selected websites, mobile apps and digital products designed and built by Media Clock for Australian businesses.';
$page_robots      = 'noindex, nofollow';
$page_css         = ['portfolio-new', 'quote-modal'];
$page_js          = 'portfolio-new';
$page_fonts       = 'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap';
include 'includes/layout/header.php';
?>
<div class="pf-page">
    <!-- reveal-on-scroll only hides content once JS is known to be running -->
    <script>document.documentElement.classList.add('pf-js');</script>
    <div class="pf-cursor" aria-hidden="true"></div>
<?php
include 'includes/sections/portfolio/hero.php';
include 'includes/sections/portfolio/work.php';
include 'includes/sections/portfolio/process.php';
include 'includes/sections/portfolio/cta.php';

// * Quote popup — every "talk to us" button on the page (and the header's) opens it in place
$quote_context = 'our portfolio';
include 'includes/components/quote-modal.php';
?>
</div>
<?php
include 'includes/layout/footer.php';
