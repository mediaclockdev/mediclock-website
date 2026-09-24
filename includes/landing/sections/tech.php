<?php
/* ============================================================
   * Tech stack slider — landing page specific
   * Uses landing page namespaced classes (lp-tech-band) so it 
   * is completely decoupled from the main website's .logo-band
   ============================================================ */
$logos_items               = $logos_items               ?? [];
$logos_id            = $logos_id            ?? 'tech';
$logos_title         = $logos_title         ?? ($lp['tech_title'] ?? '');
$logos_title_visible = $logos_title_visible ?? true;
$logos_eyebrow       = $logos_eyebrow       ?? '';
$logos_lead          = $logos_lead          ?? '';
$logos_theme         = ($logos_theme ?? 'light') === 'dark' ? 'dark' : 'light';
$logos_per_view      = $logos_per_view      ?? [6, 4, 2];
$logos_autoplay      = (int) ($logos_autoplay ?? 5000);
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');

if (empty($logos_items)) {
    $logos_items = require dirname(__DIR__, 3) . '/data/shared/tech-stack.php';
}
[$lsPv, $lsPvMd, $lsPvSm] = array_pad(array_map('intval', $logos_per_view), 3, 1);
$lsLabel = $logos_title !== '' ? $logos_title : 'Logos';
?>
<?php if ($logos_items): ?>
<!-- * Tech slider : <?= $h($lsLabel) ?> -->
<section class="lp-band-<?= $logos_theme ?> lp-tech-band" id="<?= $h($logos_id) ?>"
    <?= $logos_title !== '' ? 'aria-labelledby="' . $h($logos_id) . '-title"' : 'aria-label="' . $h($lsLabel) . '"' ?>>
    <div class="lp-container">
        <?php if ($logos_title !== '' || $logos_eyebrow !== '' || $logos_lead !== ''): ?>
        <div class="lp-tech-band-head<?= $logos_title_visible ? '' : ' visually-hidden' ?>">
            <?php if ($logos_eyebrow !== ''): ?><p class="lp-eyebrow"><?= $h($logos_eyebrow) ?></p><?php endif; ?>
            <?php if ($logos_title !== ''): ?><h2 id="<?= $h($logos_id) ?>-title" class="lp-section-title"><?= $h($logos_title) ?></h2><?php endif; ?>
            <?php if ($logos_lead !== ''): ?><p class="lp-section-lead"><?= $h($logos_lead) ?></p><?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="mc-slider lp-tech-slider" data-slider data-autoplay="<?= $logos_autoplay ?>"
            style="--pv:<?= $lsPv ?>;--pv-md:<?= $lsPvMd ?>;--pv-sm:<?= $lsPvSm ?>;--gap:20px;"
                aria-roledescription="carousel" aria-label="<?= $h($lsLabel) ?>">
                <div class="mc-slider-track" tabindex="0">
                    <?php foreach ($logos_items as $lsI => $lsLogo): ?>
                    <div class="mc-slide lp-tech-slide" role="group" aria-roledescription="slide"
                        aria-label="<?= $lsI + 1 ?> of <?= count($logos_items) ?>">
                        <img src="<?= $h(img_src($lsLogo['src'])) ?>" alt="<?= $h($lsLogo['alt'] ?? '') ?>" loading="lazy"
                            decoding="async"
                            <?= isset($lsLogo['w'], $lsLogo['h']) ? ' width="' . (int) $lsLogo['w'] . '" height="' . (int) $lsLogo['h'] . '"' : '' ?> />
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="mc-slider-dots"></div>
            </div>
    </div>
</section>
<?php endif; ?>
<?php unset($logos_items, $logos_id, $logos_title, $logos_title_visible, $logos_eyebrow, $logos_lead,
    $logos_theme, $logos_per_view, $logos_autoplay, $lsPv, $lsPvMd, $lsPvSm, $lsLabel, $lsI, $lsLogo); ?>