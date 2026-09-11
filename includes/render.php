<?php
/* ============================================================
   * Page renderer
   Draws a whole page from its content file. A root entry file is
   only this:

     $page = require __DIR__ . '/data/pages/my-page.php';
     require __DIR__ . '/includes/render.php';

   $page = [
     'title'       => '…',              <title>
     'description' => '…',              meta description
     'css'         => 'service',        one or more files in assets/css/
     'js'          => '',               optional file in assets/js/
     'sections'    => [ ['type' => 'hero', 'title' => '…'], … ],  top to bottom
   ]

   'type' is a file in includes/components/ (reusable) or, failing
   that, includes/sections/ (one-off markup, e.g. 'package/packages').
   The other keys become that component's variables, prefixed:
     ['type' => 'faq', 'title' => 'FAQ']  →  $faq_title = 'FAQ'
   and are cleared again afterwards, so the same component can be
   used twice with different settings.
   ============================================================ */
$page_title       = $page['title'] ?? 'Media Clock';
$page_description = $page['description'] ?? '';
$page_css         = $page['css'] ?? [];
$page_js          = $page['js'] ?? '';
include __DIR__ . '/layout/header.php';

// * Renderer : variable prefix per component (default: the type, '-' → '_')
$rnPrefix = ['logo-slider' => 'logos'];
?>
<main>
<?php foreach ($page['sections'] as $rnSection) {
    $rnType = $rnSection['type'];
    unset($rnSection['type']);
    $rnFile = __DIR__ . "/components/$rnType.php";
    if (!is_file($rnFile)) {
        $rnFile = __DIR__ . "/sections/$rnType.php";
    }
    if (!is_file($rnFile)) {
        trigger_error("Unknown section type '$rnType'", E_USER_WARNING);
        continue;
    }
    $rnPre = ($rnPrefix[$rnType] ?? str_replace(['-', '/'], '_', $rnType)) . '_';
    extract($rnSection, EXTR_PREFIX_ALL, rtrim($rnPre, '_'));
    include $rnFile;
    // clear this component's variables, defaults included
    foreach (array_keys(get_defined_vars()) as $rnVar) {
        if (strncmp($rnVar, $rnPre, strlen($rnPre)) === 0) {
            unset($$rnVar);
        }
    }
} ?>
</main>
<?php
unset($rnPrefix, $rnSection, $rnType, $rnFile, $rnPre, $rnVar);
include __DIR__ . '/layout/footer.php';
