<?php
/* ============================================================
   * Logo slider — shared component (client logos, tech stack, …)
   Use it on any page, as many times as you like: set the variables,
   then include. Every variable is cleared at the bottom of this file,
   so a second slider on the same page never inherits the first one's
   title, theme or logos.

     $logos_items               (array, required)  [ ['src' => 'clients/01.webp', 'alt' => 'Acme',
                                               'w' => 187, 'h' => 110], … ]
                                             src is relative to assets/images/
     $logos_id            (string)  section id                         — default 'clients'
     $logos_title         (string)  heading                            — default ''
     $logos_title_visible (bool)    false = heading kept for screen
                                    readers and search only            — default true
     $logos_eyebrow       (string)  small orange label                 — default ''
     $logos_lead          (string)  intro paragraph                    — default ''
     $logos_theme         (string)  'dark' | 'light' section           — default 'dark'
     $logos_per_view      (array)   [desktop, tablet, phone]           — default [6, 4, 2]
     $logos_autoplay      (int)     ms between moves, 0 = off          — default 5000

   Example:
     $logos_items       = require 'data/shared/clients.php';
     $logos_title = 'Happy Clients';
     include 'includes/components/logo-slider.php';
   ============================================================ */
$logos_items               = $logos_items               ?? [];
$logos_id            = $logos_id            ?? 'clients';
$logos_title         = $logos_title         ?? '';
$logos_title_visible = $logos_title_visible ?? true;
$logos_eyebrow       = $logos_eyebrow       ?? '';
$logos_lead          = $logos_lead          ?? '';
$logos_theme         = ($logos_theme ?? 'dark') === 'light' ? 'light' : 'dark';
$logos_per_view      = $logos_per_view      ?? [6, 4, 2];
$logos_autoplay      = (int) ($logos_autoplay ?? 5000);
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
[$lsPv, $lsPvMd, $lsPvSm] = array_pad(array_map('intval', $logos_per_view), 3, 1);
$lsLabel = $logos_title !== '' ? $logos_title : 'Logos';
?>
<?php if ($logos_items): ?>
<!-- * Logo slider : <?= $h($lsLabel) ?> -->
<section class="section logo-band band-<?= $logos_theme ?>" id="<?= $h($logos_id) ?>"
    <?= $logos_title !== '' ? 'aria-labelledby="' . $h($logos_id) . '-title"' : 'aria-label="' . $h($lsLabel) . '"' ?>>
    <div class="container">
        <?php if ($logos_title !== '' || $logos_eyebrow !== '' || $logos_lead !== ''): ?>
        <div class="head<?= $logos_title_visible ? '' : ' visually-hidden' ?>">
            <?php if ($logos_eyebrow !== ''): ?><div class="eyebrow"><?= $h($logos_eyebrow) ?></div><?php endif; ?>
            <?php if ($logos_title !== ''): ?><h2 id="<?= $h($logos_id) ?>-title"><?= $h($logos_title) ?></h2><?php endif; ?>
            <?php if ($logos_lead !== ''): ?><p><?= $h($logos_lead) ?></p><?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="mc-slider logo-slider" data-slider data-autoplay="<?= $logos_autoplay ?>"
            style="--pv:<?= $lsPv ?>;--pv-md:<?= $lsPvMd ?>;--pv-sm:<?= $lsPvSm ?>;--gap:20px"
            aria-roledescription="carousel" aria-label="<?= $h($lsLabel) ?>">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($logos_items as $lsI => $lsLogo): ?>
                <div class="mc-slide logo-slide" role="group" aria-roledescription="slide"
                    aria-label="<?= $lsI + 1 ?> of <?= count($logos_items) ?>">
                    <img src="<?= $h(img_src($lsLogo['src'])) ?>" alt="<?= $h($lsLogo['alt'] ?? '') ?>"
                        loading="lazy" decoding="async"<?= isset($lsLogo['w'], $lsLogo['h']) ? ' width="' . (int) $lsLogo['w'] . '" height="' . (int) $lsLogo['h'] . '"' : '' ?> />
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
