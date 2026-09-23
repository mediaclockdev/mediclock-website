<?php
/* ============================================================
   * Roadmap — shared component (service pages)
   Heading plus the process infographic.

     $roadmap_image     (string, required)  relative to assets/images/
     $roadmap_w, $roadmap_h (int)           the image's real size
     $roadmap_title     (string)            default 'Our Roadmap'
     $roadmap_lead      (string)            line under the heading — default ''
     $roadmap_alt       (string)            default: the title
     $roadmap_id        (string)            default 'roadmap'
     $roadmap_theme     (string)            'dark' | 'light'  — default 'dark'
     $roadmap_max_width (int)               display width cap in px — default 1024
     $roadmap_steps     (array)             [ ['Step title', 'description'], … ]
                                            The infographic's own content as text. Below 768px the
                                            image is far too small to read, so the steps are shown
                                            instead — see the note in service.css.
   ============================================================ */
$roadmap_image     = $roadmap_image ?? '';
$roadmap_title     = $roadmap_title ?? 'Our Roadmap';
$roadmap_lead      = $roadmap_lead  ?? '';
$roadmap_alt       = $roadmap_alt   ?? $roadmap_title;
$roadmap_id        = $roadmap_id    ?? 'roadmap';
$roadmap_theme     = ($roadmap_theme ?? 'dark') === 'light' ? 'light' : 'dark';
$roadmap_max_width = (int) ($roadmap_max_width ?? 0);
$roadmap_steps     = $roadmap_steps ?? [];
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
?>
<?php if ($roadmap_image !== ''): ?>
<!-- * Roadmap -->
<section class="section svc-roadmap band-<?= $roadmap_theme ?><?= $roadmap_steps ? ' svc-roadmap--steps' : '' ?>" id="<?= $h($roadmap_id) ?>" aria-labelledby="<?= $h($roadmap_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 id="<?= $h($roadmap_id) ?>-title"><?= $h($roadmap_title) ?></h2>
            <?php if ($roadmap_lead !== ''): ?><p><?= $h($roadmap_lead) ?></p><?php endif; ?>
        </div>
        <div class="roadmap-img-wrapper">
            <img class="roadmap-img" src="<?= $h(img_src($roadmap_image)) ?>" alt="<?= $h($roadmap_alt) ?>"
                width="<?= (int) ($roadmap_w ?? 0) ?>" height="<?= (int) ($roadmap_h ?? 0) ?>" loading="lazy" decoding="async"<?= $roadmap_max_width ? ' style="max-width:' . $roadmap_max_width . 'px"' : '' ?> />
        </div>
        <?php if ($roadmap_steps): ?>
        <!-- * Roadmap : the same steps as text, for the widths where the
             infographic would be too small to read -->
        <ol class="roadmap-steps list-unstyled mb-0">
            <?php foreach ($roadmap_steps as $rmI => [$rmTitle, $rmText]): ?>
            <li class="roadmap-step">
                <span class="roadmap-step-num" aria-hidden="true"><?= $rmI + 1 ?></span>
                <div class="roadmap-step-body">
                    <h3><?= $h($rmTitle) ?></h3>
                    <p><?= $h($rmText) ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ol>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<?php unset($roadmap_image, $roadmap_title, $roadmap_lead, $roadmap_alt, $roadmap_id, $roadmap_w, $roadmap_h, $roadmap_theme,
    $roadmap_max_width, $roadmap_steps, $rmI, $rmTitle, $rmText); ?>
