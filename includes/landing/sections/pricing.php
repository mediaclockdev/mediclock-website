<?php /* * Landing : what an app costs — the question the ad clicked on */ ?>
<section class="lp-band-light lp-pricing">
    <div class="lp-container">
        <h2 class="lp-section-title"><?= $e($lp['pricing_title']) ?></h2>
        <p class="lp-section-lead"><?= $e($lp['pricing_lead']) ?></p>

        <ul class="lp-price-grid">
            <?php foreach ($lp['pricing'] as $lpTier): ?>
            <li class="lp-price<?= $lpTier['popular'] ? ' lp-is-popular' : '' ?>">
                <?php if ($lpTier['popular']): ?>
                <span class="lp-price-flag">Most popular</span>
                <?php endif; ?>
                <h3><?= $e($lpTier['name']) ?></h3>
                <p class="lp-price-blurb"><?= $e($lpTier['blurb']) ?></p>
                <p class="lp-price-figure"><?= $e($lpTier['price']) ?></p>
                <ul class="lp-price-features">
                    <?php foreach ($lpTier['features'] as $lpFeat): ?>
                    <li><?= $e($lpFeat) ?></li>
                    <?php endforeach; ?>
                </ul>
                <p class="lp-price-timing"><?= $e($lpTier['timing']) ?></p>
            </li>
            <?php endforeach; ?>
        </ul>

        <p class="lp-price-note"><?= $e($lp['pricing_note']) ?></p>
        <div class="lp-center">
            <button type="button" class="lp-btn lp-btn-primary" data-lp-scroll-to="#lp-quote"><?= $e($lp['pricing_cta']) ?></button>
        </div>
    </div>
</section>
<?php unset($lpTier, $lpFeat); ?>
