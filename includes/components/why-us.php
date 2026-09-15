<?php
/* ============================================================
   * Why choose us — shared component (homepage + service pages)
   Cards in the shared slider: the front (photo + title) zooms out
   and fades on hover or keyboard focus, uncovering the back (optional
   photo, icon, title and copy). Styles: main.css. The back is always in the markup, so screen readers and
   search get the full text.

     $why_us_items    (array, required)  [ [
         'title' => 'Tailored Solutions',
         'front_title' => '…',                       front-only title, optional (default: title)
         'text'  => '…',
         'icon'  => 'pages/<slug>/icons/x.svg',     relative to assets/images/
         'image' => 'pages/<slug>/why/x.webp',      front photo, optional
         'back'  => 'pages/<slug>/why/x-back.webp', back photo, optional
       ], … ]
     $why_us_id       (string)  section id                        — default 'why-us'
     $why_us_title    (string)                                    — default 'Why choose us?'
     $why_us_theme    (string)  'dark' | 'light'                  — default 'dark'
     $why_us_per_view (array)   [desktop, tablet, phone]          — default [3, 2, 1]
     $why_us_autoplay (int)     ms between moves, 0 = off         — default 5000
   ============================================================ */
$why_us_items    = $why_us_items    ?? [];
$why_us_id       = $why_us_id       ?? 'why-us';
$why_us_title    = $why_us_title    ?? 'Why choose us?';
$why_us_theme    = ($why_us_theme ?? 'dark') === 'light' ? 'light' : 'dark';
$why_us_per_view = $why_us_per_view ?? [3, 2, 1];
$why_us_autoplay = (int) ($why_us_autoplay ?? 5000);
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
[$wuPv, $wuPvMd, $wuPvSm] = array_pad(array_map('intval', $why_us_per_view), 3, 1);
?>
<?php if ($why_us_items): ?>
<!-- * Why choose us -->
<section class="section why-us band-<?= $why_us_theme ?>" id="<?= $h($why_us_id) ?>" aria-labelledby="<?= $h($why_us_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 id="<?= $h($why_us_id) ?>-title"><?= $h($why_us_title) ?></h2>
        </div>

        <div class="mc-slider why-slider" data-slider data-autoplay="<?= $why_us_autoplay ?>"
            style="--pv:<?= $wuPv ?>;--pv-md:<?= $wuPvMd ?>;--pv-sm:<?= $wuPvSm ?>;--gap:70px"
            aria-roledescription="carousel" aria-label="<?= $h($why_us_title) ?>">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($why_us_items as $wuI => $wu): ?>
                <article class="mc-slide why-card" role="group" aria-roledescription="slide"
                    aria-label="<?= $wuI + 1 ?> of <?= count($why_us_items) ?>" tabindex="0">
                    <div class="why-card-inner">
                        <!-- * Why choose us : card front (decorative, repeats the title) -->
                        <div class="why-card-front" aria-hidden="true">
                            <?php if (!empty($wu['image'])): ?>
                            <img class="why-card-img" src="<?= $h(img_src($wu['image'])) ?>" alt="" loading="lazy" decoding="async" />
                            <?php endif; ?>
                            <span class="why-card-front-title"><?= $h($wu['front_title'] ?? $wu['title']) ?></span>
                        </div>
                        <!-- * Why choose us : card back -->
                        <div class="why-card-back">
                            <?php if (!empty($wu['back'])): ?>
                            <img class="why-card-img" src="<?= $h(img_src($wu['back'])) ?>" alt="" loading="lazy" decoding="async" />
                            <?php endif; ?>
                            <?php if (!empty($wu['icon'])): ?>
                            <img class="why-card-icon" src="<?= $h(img_src($wu['icon'])) ?>" alt="" width="40" height="40" loading="lazy" decoding="async" />
                            <?php endif; ?>
                            <h3 class="why-card-title"><?= $h($wu['title']) ?></h3>
                            <p><?= $h($wu['text']) ?></p>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <div class="mc-slider-dots"></div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php unset($why_us_items, $why_us_id, $why_us_title, $why_us_theme, $why_us_per_view, $why_us_autoplay,
    $wuPv, $wuPvMd, $wuPvSm, $wuI, $wu); ?>
