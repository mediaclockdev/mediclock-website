<?php
/* * Case study — one device beside a section's copy ($csVisual, see the
   'visual' notes in data/portfolio/case-studies/). The device is decorative
   to a screen reader: role="img" and its label describe it in one line. */
$csDevice = $csVisual['device'];
?>
<div class="cs-visual cs-rv" role="img" aria-label="<?= $e($csVisual['label']) ?>">
    <?php if ($csDevice === 'phone-scroll'): ?>
    <?php [$csSrc, $csAlt, $csW, $csH] = $csVisual['image']; ?>
    <!-- the screenshot scrolls slowly inside the phone once it is on screen (case-study.js) -->
    <div class="cs-phone cs-phone-scroll" data-cs-scroll>
        <div class="cs-scr">
            <div class="cs-scroll-track"><img src="<?= $e(img_src($csSrc)) ?>" alt="" width="<?= (int) $csW ?>" height="<?= (int) $csH ?>" loading="lazy" decoding="async" /></div>
        </div>
    </div>
    <?php elseif ($csDevice === 'phone'): ?>
    <!-- one phone screenshot, still, in the same phone frame -->
    <div class="cs-phone cs-phone-still">
        <div class="cs-scr"><img src="<?= $e(img_src($csVisual['image'][0])) ?>" alt="" loading="lazy" decoding="async" /></div>
    </div>
    <?php else: ?>
    <?php ob_start(); ?>
    <?php if (!empty($csVisual['mockup'])): ?>
    <?php include dirname(__DIR__, 2) . '/case-studies/' . $csSlug . '/' . $csVisual['mockup'] . '.php'; ?>
    <?php else: ?>
    <img class="cs-screen-img" src="<?= $e(img_src($csVisual['image'][0])) ?>" alt="" loading="lazy" decoding="async" />
    <?php endif; ?>
    <?php $csScreen = ob_get_clean(); ?>
    <?php if ($csDevice === 'laptop'): ?>
    <div class="cs-laptop cs-tilt" data-cs-tilt>
        <div class="cs-lid"><div class="cs-screen"><?= $csScreen ?></div></div>
        <div class="cs-base"></div>
    </div>
    <?php else: ?>
    <div class="cs-tablet cs-tilt" data-cs-tilt>
        <div class="cs-screen"><?= $csScreen ?></div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
</div>
<?php unset($csDevice, $csSrc, $csAlt, $csW, $csH, $csScreen); ?>
