<?php
/* * Landing v2 : pricing — three tiers, the popular one in dark.
   Tier data is the original page's ($lp['pricing']); only the heading and
   the button wording are v2's own. Every button opens the quote modal.

   On a wide screen the three sit side by side with the popular one lifted.
   On a tablet and a phone they stack (phones used to swipe sideways with
   .lp2-swipe — taken off so all three show without swiping). Either way
   the popular one moves first — CSS `order` moves it without changing
   the reading order of the HTML for anyone else. */
$lpCheck = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"'
    . ' stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>';
?>
<section class="lp2-pricing" aria-labelledby="lp2-pricing-title">
    <div class="lp-container">
        <h2 id="lp2-pricing-title" class="lp2-big-title" data-lp2-reveal>
            <span><?= $e($lp['v2_pricing_kicker']) ?></span>
            <?= $e($lp['v2_pricing_title']) ?>
        </h2>
        <!-- <ul class="lp2-price-grid lp2-swipe"> -->
        <ul class="lp2-price-grid">
            <?php foreach ($lp['pricing'] as $lpTier): ?>
            <li class="lp2-price<?= $lpTier['popular'] ? ' is-popular' : '' ?>" data-lp2-reveal>
                <?php if ($lpTier['popular']): ?>
                <p class="lp2-price-flag">Most popular</p>
                <?php endif; ?>

                <h3><?= $e($lpTier['name']) ?></h3>
                <p class="lp2-price-blurb"><?= $e($lpTier['blurb']) ?></p>

                <p class="lp2-price-figure">
                    <span><?= $e($lpTier['lead_in']) ?></span>
                    <strong><?= $e($lpTier['price']) ?></strong>
                </p>

                <ul class="lp2-price-features">
                    <?php foreach (array_slice($lpTier['features'], 0, $lp['v2_pricing_features']) as $lpFeat): ?>
                    <li><?= $lpCheck ?><?= $e($lpFeat) ?></li>
                    <?php endforeach; ?>
                </ul>

                <p class="lp2-price-timing">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                    <span><span class="visually-hidden">Timeline: </span><?= $e($lpTier['timing']) ?></span>
                </p>

                <button type="button" class="lp-btn lp2-price-btn" data-lp-open-modal aria-haspopup="dialog">
                    <?= $e($lp['v2_pricing_cta']) ?><span class="visually-hidden"> — <?= $e($lpTier['name']) ?></span>
                </button>
            </li>
            <?php endforeach; ?>
        </ul>

        <p class="lp2-price-note" data-lp2-reveal><?= $e($lp['v2_pricing_note']) ?></p>
    </div>
</section>
<?php unset($lpCheck, $lpTier, $lpFeat); ?>
