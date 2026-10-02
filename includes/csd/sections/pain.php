<?php
/* * CSD : pain points — the three signs a business has outgrown off-the-shelf
   tools. The orange left rule is what tells these apart from the "what we
   build" cards further down, which share the same tilt/glare treatment. */
?>
<section class="csd-section csd-alt csd-pain">
    <div class="csd-wrap">
        <div class="csd-center">
            <span class="csd-eyebrow"><?= $e($csd['pain_eyebrow']) ?></span>
            <h2><?= $e($csd['pain_title']) ?></h2>
            <p class="csd-lead"><?= $e($csd['pain_lead']) ?></p>
        </div>
        <div class="csd-grid-3">
            <?php foreach ($csd['pain_cards'] as $csdCard): ?>
            <div class="csd-card csd-tilt">
                <span class="csd-glare" aria-hidden="true"></span>
                <!-- our own literal markup from data/csd/common.php, not visitor input -->
                <div class="csd-icon" aria-hidden="true"><?= $csdCard['icon'] ?></div>
                <h3><?= $e($csdCard['title']) ?></h3>
                <p><?= $e($csdCard['text']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($csdCard); ?>
