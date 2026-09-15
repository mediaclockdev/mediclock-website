<?php
/* ============================================================
   * Feature slider — shared component (service pages)
   A heading plus a slider of feature cards (icon, title, short copy),
   using the shared [data-slider] engine in main.js.

     $feature_slider_items    (array, required)  [ [
         'icon'  => 'pages/<slug>/icons/x.svg',   relative to assets/images/
         'title' => 'User Friendly Navigation',
         'text'  => '…',
       ], … ]
     $feature_slider_title    (string)  default 'Features'
     $feature_slider_id       (string)  section id                — default 'features'
     $feature_slider_theme    (string)  'dark' | 'light'          — default 'dark'
     $feature_slider_per_view (array)   [desktop, tablet, phone]  — default [4, 2, 1]
     $feature_slider_autoplay (int)     ms between moves, 0 = off — default 5000
   Styles: service.css
   ============================================================ */
$feature_slider_items    = $feature_slider_items    ?? [];
$feature_slider_title    = $feature_slider_title    ?? 'Features';
$feature_slider_id       = $feature_slider_id       ?? 'features';
$feature_slider_theme    = ($feature_slider_theme ?? 'dark') === 'light' ? 'light' : 'dark';
$feature_slider_per_view = $feature_slider_per_view ?? [4, 2, 1];
$feature_slider_autoplay = (int) ($feature_slider_autoplay ?? 5000);
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
[$fsPv, $fsPvMd, $fsPvSm] = array_pad(array_map('intval', $feature_slider_per_view), 3, 1);
?>
<?php if ($feature_slider_items): ?>
<!-- * Feature slider -->
<section class="section feature-slider band-<?= $feature_slider_theme ?>" id="<?= $h($feature_slider_id) ?>" aria-labelledby="<?= $h($feature_slider_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 class="feature-slider-title" id="<?= $h($feature_slider_id) ?>-title"><?= $h($feature_slider_title) ?></h2>
        </div>

        <div class="mc-slider" data-slider data-autoplay="<?= $feature_slider_autoplay ?>"
            style="--pv:<?= $fsPv ?>;--pv-md:<?= $fsPvMd ?>;--pv-sm:<?= $fsPvSm ?>;--gap:20px"
            aria-roledescription="carousel" aria-label="<?= $h($feature_slider_title) ?>">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($feature_slider_items as $fsI => $fsItem): ?>
                <article class="mc-slide feature-card" role="group" aria-roledescription="slide"
                    aria-label="<?= $fsI + 1 ?> of <?= count($feature_slider_items) ?>">
                    <?php if (!empty($fsItem['icon'])): ?>
                    <img class="feature-card-icon" src="<?= $h(img_src($fsItem['icon'])) ?>" alt="" width="64" height="64" loading="lazy" decoding="async" />
                    <?php endif; ?>
                    <h3 class="feature-card-title"><?= $h($fsItem['title']) ?></h3>
                    <?php if (!empty($fsItem['text'])): ?><p><?= $h($fsItem['text']) ?></p><?php endif; ?>
                </article>
                <?php endforeach; ?>
            </div>
            <div class="mc-slider-dots"></div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php unset($feature_slider_items, $feature_slider_title, $feature_slider_id, $feature_slider_theme,
    $feature_slider_per_view, $feature_slider_autoplay, $fsPv, $fsPvMd, $fsPvSm, $fsI, $fsItem); ?>
