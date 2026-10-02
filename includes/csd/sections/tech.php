<?php
/* * CSD : Technologies we use.
   Built to match the mobile-app ad pages exactly, as asked: the same shared
   tech-stack tiles in the same paged slider. The slider layout (.mc-slider)
   and its engine ([data-slider] in main.js) are shared site-wide infrastructure
   and are only read here — the band around them is namespaced .csd-, so this
   page can be restyled without touching includes/landing/ or the main site. */
$csdTech = require dirname(__DIR__, 3) . '/data/shared/tech-stack.php';
?>
<?php if ($csdTech): ?>
<section class="csd-tech-band" id="csd-tech" aria-labelledby="csd-tech-title">
    <div class="csd-wrap csd-center">
        <span class="csd-eyebrow">Technology</span>
        <h2 id="csd-tech-title" class="csd-tech-title"><?= $e($csd['tech_title']) ?></h2>
    </div>
    <div class="csd-wrap">
        <div class="mc-slider csd-tech-slider" data-slider data-autoplay="5000"
            style="--pv:6;--pv-md:4;--pv-sm:2;--gap:20px;" aria-roledescription="carousel"
            aria-label="<?= $e($csd['tech_title']) ?>">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($csdTech as $csdI => $csdLogo): ?>
                <div class="mc-slide csd-tech-slide" role="group" aria-roledescription="slide"
                    aria-label="<?= $csdI + 1 ?> of <?= count($csdTech) ?>">
                    <img src="<?= $e(img_src($csdLogo['src'])) ?>" alt="<?= $e($csdLogo['alt'] ?? '') ?>" loading="lazy"
                        decoding="async" width="<?= (int) $csdLogo['w'] ?>" height="<?= (int) $csdLogo['h'] ?>" />
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mc-slider-dots"></div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php unset($csdTech, $csdLogo, $csdI); ?>
