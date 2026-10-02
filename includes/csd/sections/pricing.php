<?php
/* * CSD : how we get to a number. Three steps rather than three packages —
   this is deliberately not a price list, because nothing here is off the rack. */
?>
<section class="csd-section csd-dark csd-pricing">
    <div class="csd-wrap">
        <div class="csd-center">
            <span class="csd-eyebrow"><?= $e($csd['pricing_eyebrow']) ?></span>
            <h2><?= $e($csd['pricing_title']) ?></h2>
            <p class="csd-lead"><?= $e($csd['pricing_lead']) ?></p>
        </div>
        <div class="csd-grid-3">
            <?php foreach ($csd['pricing_cards'] as [$csdStep, $csdPrice, $csdTitle, $csdText, $csdFeatured, $csdRibbon]): ?>
            <div class="csd-price-card csd-tilt<?= $csdFeatured ? ' is-featured' : '' ?>">
                <span class="csd-glare" aria-hidden="true"></span>
                <?php if ($csdRibbon !== ''): ?>
                <span class="csd-pop"><?= $e($csdRibbon) ?></span>
                <?php endif; ?>
                <span class="csd-price-label"><?= $e($csdStep) ?></span>
                <span class="csd-price"><?= $e($csdPrice) ?></span>
                <h3><?= $e($csdTitle) ?></h3>
                <p><?= $e($csdText) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="csd-center csd-section-cta">
            <a href="#csd-enquire" class="csd-btn" data-csd-scroll-to="#csd-enquire">
                <?= $e($csd['pricing_cta']) ?> <span class="csd-arr" aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</section>
<?php unset($csdStep, $csdPrice, $csdTitle, $csdText, $csdFeatured, $csdRibbon); ?>
