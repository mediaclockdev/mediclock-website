<?php
/* ============================================================
   * Case study — one project
   Reached as /portfolio-new/<slug>/ (.htaccess on Apache, router.php locally),
   which lands here with ?slug=<slug>. The content is
   data/portfolio/case-studies/<slug>.php; an unknown slug returns 404
   and shows the "case study not found" panel below.

   noindex while the new portfolio is on its test URL. To go live, drop
   $page_robots and move the URL base from portfolio-new to portfolio
   (see 'case_study_base' in data/portfolio/work.php).

   Everything on the page is namespaced .cs- (assets/css/case-study.css)
   so it cannot collide with main.css or Bootstrap.
   ============================================================ */
require_once __DIR__ . '/includes/img.php';
$csWork  = require __DIR__ . '/data/portfolio/work.php';
$csBase  = $csWork['case_study_base'];
$csSlug  = (string) ($_GET['slug'] ?? '');
$csFile  = __DIR__ . '/data/portfolio/case-studies/' . $csSlug . '.php';
$cs      = (preg_match('/^[a-z0-9-]+$/', $csSlug) && is_file($csFile)) ? require $csFile : null;
unset($csWork, $csFile);

$page_robots = 'noindex, nofollow';
if (!$cs) {
    http_response_code(404);
    $page_title = 'Case study not found – Media Clock';
    $page_css   = 'portfolio-new';
    $page_fonts = 'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap';
} else {
    $page_title       = $cs['meta_title'];
    $page_description = $cs['description'];
    $page_canonical   = 'https://mediaclock.com.au' . page_url($csBase . '/' . $csSlug);
    $page_og_type     = 'article';
    $page_og_title    = $page_title;
    $page_og_desc     = $page_description;
    $page_css         = ['case-study', 'quote-modal'];
    $page_js          = array_merge(['case-study'], $cs['scripts'] ?? []);
    $page_fonts       = 'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700;800&display=swap';
}
include 'includes/layout/header.php';

if (!$cs): ?>
<!-- * Case study not found (styled by portfolio-new.css, like the grid it links back to) -->
<div class="pf-page">
    <section class="pf-cta pf-missing" aria-labelledby="cs-missing-title">
        <h1 id="cs-missing-title">We can’t find that case study</h1>
        <p>The link may be out of date, or the project may have been renamed.</p>
        <a class="pf-btn pf-btn-primary" href="<?= $e(page_url($csBase)) ?>#work">See all our work <span class="pf-arr" aria-hidden="true">↗</span></a>
    </section>
</div>
<?php else: ?>
<div class="cs-page">
    <!-- reveal-on-scroll only hides content once JS is known to be running -->
    <script>document.documentElement.classList.add('cs-js');</script>
    <?php /* Reading progress bar — hidden for now, no other page on the site has one.
             Remove this comment (and the ones in case-study.css and case-study.js) to bring it back.
    <div class="cs-progress" aria-hidden="true"></div>
    */ ?>
<?php
include 'includes/sections/case-study/hero.php';
include 'includes/sections/case-study/problem.php';
include 'includes/sections/case-study/approach.php';
include 'includes/sections/case-study/features.php';
include 'includes/sections/case-study/screens.php';
include 'includes/sections/case-study/cta.php';

// * Quote popup — "Get in touch" (and the header's buttons) open it in place
$quote_context = 'the ' . $cs['title'] . ' case study';
include 'includes/components/quote-modal.php';
?>
</div>
<?php endif;
include 'includes/layout/footer.php';
