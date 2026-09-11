<?php
/* ============================================================
   * Roadmap — shared component (service pages)
   Heading plus the process infographic, on a dark band.

     $roadmap_image (string, required)  relative to assets/images/
     $roadmap_w, $roadmap_h (int)       the image's real size
     $roadmap_title (string)            default 'Our Roadmap'
     $roadmap_alt   (string)            default: the title
     $roadmap_id    (string)            default 'roadmap'
   ============================================================ */
$roadmap_image = $roadmap_image ?? '';
$roadmap_title = $roadmap_title ?? 'Our Roadmap';
$roadmap_alt   = $roadmap_alt   ?? $roadmap_title;
$roadmap_id    = $roadmap_id    ?? 'roadmap';
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
?>
<?php if ($roadmap_image !== ''): ?>
<!-- * Roadmap -->
<section class="section svc-roadmap band-dark" id="<?= $h($roadmap_id) ?>" aria-labelledby="<?= $h($roadmap_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 id="<?= $h($roadmap_id) ?>-title"><?= $h($roadmap_title) ?></h2>
        </div>
        <img class="roadmap-img" src="<?= $h(img_src($roadmap_image)) ?>" alt="<?= $h($roadmap_alt) ?>"
            width="<?= (int) ($roadmap_w ?? 0) ?>" height="<?= (int) ($roadmap_h ?? 0) ?>" loading="lazy" decoding="async" />
    </div>
</section>
<?php endif; ?>
<?php unset($roadmap_image, $roadmap_title, $roadmap_alt, $roadmap_id, $roadmap_w, $roadmap_h); ?>
