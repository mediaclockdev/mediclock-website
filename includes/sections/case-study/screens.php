<?php
/* * Case study — mobile screens fanned out, the middle one in front.
   Built for five screens (cs-fan-1 … 5); with fewer, the outer slots drop off.
   With 'pair' instead of 'images': one desktop and one phone side by side. */
$csS = $cs['screens'];
// $csShots = array_slice($csS['images'], 0, 5);
$csShots = array_slice($csS['images'] ?? [], 0, 5);
$csFirstSlot = intdiv(5 - count($csShots), 2) + 1;
?>
<section class="cs-section cs-dark cs-gallery" id="screens" aria-labelledby="cs-screens-title">
    <div class="container cs-up">
        <h2 class="cs-title" id="cs-screens-title"><?= $e($csS['title']) ?></h2>
        <?php /* <p class="cs-subtitle"><?= $e($csS['subtitle']) ?></p> */ ?>
        <?php /* one line, or a list of them */ ?>
        <?php foreach ((array) $csS['subtitle'] as $csP): ?>
        <p class="cs-subtitle"><?= $e($csP) ?></p>
        <?php endforeach; ?>
    </div>
    <?php if (!empty($csS['pair'])): ?>
    <?php [$csPcSrc, $csPcAlt] = $csS['pair']['laptop']; [$csPhSrc, $csPhAlt] = $csS['pair']['phone']; ?>
    <!-- a desktop and a phone, front on, the phone just over the end of the laptop's base -->
    <div class="cs-pair cs-rv">
        <div class="cs-laptop">
            <div class="cs-lid">
                <div class="cs-screen"<?= !empty($csS['pair']['ratio']) ? ' style="aspect-ratio: ' . $e($csS['pair']['ratio']) . '"' : '' ?>>
                    <img class="cs-screen-img" src="<?= $e(img_src($csPcSrc)) ?>" alt="<?= $e($csPcAlt) ?>" loading="lazy" decoding="async" />
                </div>
            </div>
            <div class="cs-base"></div>
        </div>
        <div class="cs-phone">
            <div class="cs-scr"><img src="<?= $e(img_src($csPhSrc)) ?>" alt="<?= $e($csPhAlt) ?>" loading="lazy" decoding="async" /></div>
        </div>
    </div>
    <?php else: ?>
    <!-- <div class="cs-fan"> -->
    <!-- cs-fan-count-N lets three screens sit larger than the five-screen fan -->
    <div class="cs-fan cs-fan-count-<?= count($csShots) ?>">
        <?php foreach ($csShots as $csI => [$csSrc, $csAlt]): ?>
        <div class="cs-fan-item cs-fan-<?= $csFirstSlot + $csI ?>">
            <div class="cs-phone">
                <div class="cs-scr"><img src="<?= $e(img_src($csSrc)) ?>" alt="<?= $e($csAlt) ?>" loading="lazy" decoding="async" /></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>
<?php unset($csShots, $csFirstSlot, $csI, $csSrc, $csAlt, $csP, $csPcSrc, $csPcAlt, $csPhSrc, $csPhAlt); ?>
