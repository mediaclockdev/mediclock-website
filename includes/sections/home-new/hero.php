<?php
/* * Homepage (new) — hero: three rotating slides, typed headline (assets/js/home-new.js)
   The slides ride along as JSON so the script and the markup share one source. */
$hnSlides = $hn['hero'];
$hnFirst  = $hnSlides[0];
?>
<section class="hn-hero" aria-labelledby="hn-hero-title">
    <div class="hn-hero-sweep" aria-hidden="true"></div>
    <?php foreach ($hnSlides as $hnI => $hnSlide): ?>
    <div class="hn-hero-bg<?= $hnI === 0 ? ' is-on' : '' ?>" data-slide="<?= $hnI ?>" aria-hidden="true"
        style="--hn-bg:url('<?= $e(img_src($hnSlide['bg'])) ?>')"></div>
    <?php endforeach; ?>
    <div class="hn-shell hn-hero-grid">
        <div class="hn-hero-copy">
            <div class="hn-eyebrow">
                <span class="hn-hero-tag"><?= $e($hnFirst['tag']) ?></span>
                <span class="hn-hero-dots" aria-hidden="true">
                    <?php foreach ($hnSlides as $hnI => $hnSlide): ?><i<?= $hnI === 0 ? ' class="is-on"' : '' ?>></i><?php endforeach; ?>
                </span>
            </div>
            <h1 class="hn-hero-title" id="hn-hero-title">
                <!-- read by screen readers in full; the typed copy below is visual only -->
                <span class="visually-hidden"><?= $e($hnFirst['a'] . ' ' . $hnFirst['b']) ?></span>
                <span class="hn-typed" aria-hidden="true">
                    <span class="hn-ln"><span class="hn-t1"><?= $e($hnFirst['a']) ?></span><i class="hn-caret"></i></span>
                    <span class="hn-ln hn-ln-accent"><span class="hn-t2"><?= $e($hnFirst['b']) ?></span></span>
                </span>
            </h1>
            <p class="hn-hero-lead is-shown"><?= $e($hnFirst['sub']) ?></p>
            <div class="hn-hero-actions">
                <a class="hn-btn" href="#contact">Discuss your idea <span aria-hidden="true">↗</span></a>
                <a class="hn-btn hn-btn-ghost" href="#work">See our work</a>
            </div>
            <div class="hn-proof">
                <?php foreach ($hn['proof'] as $hnI => [$hnBig, $hnSmall]): ?>
                <?php if ($hnI): ?><i class="hn-proof-line" aria-hidden="true"></i><?php endif; ?>
                <div><strong><?= $e($hnBig) ?></strong><?= $e($hnSmall) ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script type="application/json" class="hn-hero-data"><?= json_encode(
        array_map(fn($s) => ['tag' => $s['tag'], 'a' => $s['a'], 'b' => $s['b'], 'sub' => $s['sub']], $hnSlides),
        JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP
    ) ?></script>
</section>
<?php unset($hnSlides, $hnFirst, $hnI, $hnSlide, $hnBig, $hnSmall); ?>
