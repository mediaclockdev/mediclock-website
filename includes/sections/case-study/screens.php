<?php
/* * Case study — mobile screens fanned out, the middle one in front.
   Built for five screens (cs-fan-1 … 5); with fewer, the outer slots drop off. */
$csS = $cs['screens'];
$csShots = array_slice($csS['images'], 0, 5);
$csFirstSlot = intdiv(5 - count($csShots), 2) + 1;
?>
<section class="cs-section cs-dark cs-gallery" id="screens" aria-labelledby="cs-screens-title">
    <div class="container cs-up">
        <h2 class="cs-title" id="cs-screens-title"><?= $e($csS['title']) ?></h2>
        <p class="cs-subtitle"><?= $e($csS['subtitle']) ?></p>
    </div>
    <div class="cs-fan">
        <?php foreach ($csShots as $csI => [$csSrc, $csAlt]): ?>
        <div class="cs-fan-item cs-fan-<?= $csFirstSlot + $csI ?>">
            <div class="cs-phone">
                <div class="cs-scr"><img src="<?= $e(img_src($csSrc)) ?>" alt="<?= $e($csAlt) ?>" loading="lazy" decoding="async" /></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php unset($csShots, $csFirstSlot, $csI, $csSrc, $csAlt); ?>
