<?php
/* * CSD : how we work — six steps from first call to go-live. The orange bar
   across the bottom of each card draws itself once the card scrolls in. */
?>
<section class="csd-section csd-alt csd-process">
    <div class="csd-wrap">
        <div class="csd-center">
            <span class="csd-eyebrow"><?= $e($csd['process_eyebrow']) ?></span>
            <h2><?= $e($csd['process_title']) ?></h2>
            <p class="csd-lead"><?= $e($csd['process_lead']) ?></p>
        </div>
        <ol class="csd-steps">
            <?php foreach ($csd['process_steps'] as $csdI => [$csdTitle, $csdText]): ?>
            <li class="csd-step csd-tilt">
                <span class="csd-glare" aria-hidden="true"></span>
                <span class="csd-sn" aria-hidden="true"><?= str_pad((string) ($csdI + 1), 2, '0', STR_PAD_LEFT) ?></span>
                <h3><?= $e($csdTitle) ?></h3>
                <p><?= $e($csdText) ?></p>
                <span class="csd-bar" aria-hidden="true"></span>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
<?php unset($csdI, $csdTitle, $csdText); ?>
