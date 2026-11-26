<?php
/* * Homepage (new) — about: years since 2017 + intro copy + three pillars */
$hnYears = str_pad((string) max(1, (int) date('Y') - 2017), 2, '0', STR_PAD_LEFT);
?>
<section class="hn-section hn-dark hn-about" id="about" aria-labelledby="hn-about-title">
    <div class="hn-shell hn-about-grid">
        <div class="hn-reveal">
            <div class="hn-big-number"><?= $e($hnYears) ?></div>
            <p class="hn-eyebrow hn-about-eyebrow">Years of thoughtful delivery</p>
        </div>
        <div class="hn-about-copy hn-reveal hn-delay-1">
            <h2 id="hn-about-title">Technology should feel <span class="hn-accent">clear</span>, not complicated.</h2>
            <p>We bring product thinking, thoughtful design and dependable development into one practical team. The result is software that looks polished, explains itself quickly and supports the way your business actually works.</p>
            <div class="hn-pillars">
                <?php foreach ($hn['pillars'] as [$hnStrong, $hnText]): ?>
                <div class="hn-pillar"><strong><?= $e($hnStrong) ?></strong><span><?= $e($hnText) ?></span></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php unset($hnYears, $hnStrong, $hnText); ?>
