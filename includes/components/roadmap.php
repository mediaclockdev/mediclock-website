<?php
/* ============================================================
   * Roadmap — shared component (service pages)
   Heading plus the process infographic.

     $roadmap_image     (string, required)  relative to assets/images/
     $roadmap_w, $roadmap_h (int)           the image's real size
     $roadmap_title     (string)            default 'Our Roadmap'
     $roadmap_alt       (string)            default: the title
     $roadmap_id        (string)            default 'roadmap'
     $roadmap_theme     (string)            'dark' | 'light'  — default 'dark'
     $roadmap_max_width (int)               display width cap in px — default 1024
   ============================================================ */
$roadmap_image     = $roadmap_image ?? '';
$roadmap_title     = $roadmap_title ?? 'Our Roadmap';
$roadmap_alt       = $roadmap_alt   ?? $roadmap_title;
$roadmap_id        = $roadmap_id    ?? 'roadmap';
$roadmap_theme     = ($roadmap_theme ?? 'dark') === 'light' ? 'light' : 'dark';
$roadmap_max_width = (int) ($roadmap_max_width ?? 0);
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
?>
<?php if ($roadmap_image !== ''): ?>
<!-- * Roadmap -->
<section class="section svc-roadmap band-<?= $roadmap_theme ?>" id="<?= $h($roadmap_id) ?>" aria-labelledby="<?= $h($roadmap_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 id="<?= $h($roadmap_id) ?>-title"><?= $h($roadmap_title) ?></h2>
        </div>
        <img class="roadmap-img" src="<?= $h(img_src($roadmap_image)) ?>" alt="<?= $h($roadmap_alt) ?>"
            width="<?= (int) ($roadmap_w ?? 0) ?>" height="<?= (int) ($roadmap_h ?? 0) ?>" loading="lazy" decoding="async"<?= $roadmap_max_width ? ' style="max-width:' . $roadmap_max_width . 'px"' : '' ?> />
    </div>
</section>
<?php endif; ?>
<?php unset($roadmap_image, $roadmap_title, $roadmap_alt, $roadmap_id, $roadmap_w, $roadmap_h, $roadmap_theme,
    $roadmap_max_width); ?>
