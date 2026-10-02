<?php
/* * CSD : what we build — six capability cards. No step numbers here on
   purpose: these are six things we build, not an ordered sequence, so a number
   on each card implied a running order that does not exist. The numbers in
   "How we work" stay, because those steps really do run in order. */
?>
<section class="csd-section csd-alt csd-build">
    <div class="csd-wrap">
        <div class="csd-center">
            <span class="csd-eyebrow"><?= $e($csd['build_eyebrow']) ?></span>
            <h2><?= $e($csd['build_title']) ?></h2>
            <p class="csd-lead"><?= $e($csd['build_lead']) ?></p>
        </div>
        <div class="csd-grid-3">
            <?php foreach ($csd['build_cards'] as $csdCard): ?>
            <div class="csd-card csd-tilt">
                <span class="csd-glare" aria-hidden="true"></span>
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
<?php unset($csdCard); ?>
