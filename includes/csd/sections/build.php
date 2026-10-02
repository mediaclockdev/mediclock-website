<?php
/* * CSD : what we build — six numbered capability cards. The outline number in
   the corner is decorative (aria-hidden): a screen reader reading "01" before
   every heading adds nothing. */
?>
<section class="csd-section csd-alt csd-build">
    <div class="csd-wrap">
        <div class="csd-center">
            <span class="csd-eyebrow"><?= $e($csd['build_eyebrow']) ?></span>
            <h2><?= $e($csd['build_title']) ?></h2>
            <p class="csd-lead"><?= $e($csd['build_lead']) ?></p>
        </div>
        <div class="csd-grid-3">
            <?php foreach ($csd['build_cards'] as $csdI => $csdCard): ?>
            <div class="csd-card csd-tilt">
                <span class="csd-glare" aria-hidden="true"></span>
                <span class="csd-num" aria-hidden="true"><?= str_pad((string) ($csdI + 1), 2, '0', STR_PAD_LEFT) ?></span>
                <!-- our own literal markup from data/csd/common.php, not visitor input -->
                <div class="csd-icon" aria-hidden="true"><?= $csdCard['icon'] ?></div>
                <h3><?= $e($csdCard['title']) ?></h3>
                <p><?= $e($csdCard['text']) ?></p>
                <a href="#csd-enquire" class="csd-more" data-csd-scroll-to="#csd-enquire">
                    <?= $e($csd['build_card_link']) ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($csdCard, $csdI); ?>
