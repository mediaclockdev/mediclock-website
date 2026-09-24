<?php
/* * Landing : client logo marquee.
   Reads the main site's dark client logos — the same brands, already sized
   and optimised. Read-only: nothing here changes how they appear elsewhere.

   One row that scrolls forever, the way the live page does it, rather than a
   wrapping grid that breaks into a ragged second line. The list is rendered
   twice and the track slides left by exactly half its own width, so at the
   moment the animation loops the second copy is sitting where the first
   started and the join never shows. The duplicate carries aria-hidden and
   empty alt text, so a screen reader still hears each client once. */
$lpLogos = require dirname(__DIR__, 3) . '/data/shared/clients-dark.php';
?>
<section class="lp-band-light lp-logos lp-logos--marquee">
    <div class="lp-container">
        <h2 class="lp-eyebrow-title"><?= $e($lp['trusted_title']) ?></h2>
    </div>
    <!-- full-bleed on purpose: the logos run off both edges instead of
         stopping at the container, which is what sells the movement -->
    <div class="lp-marquee">
        <ul class="lp-marquee-track">
            <?php for ($lpCopy = 0; $lpCopy < 2; $lpCopy++): ?>
            <?php foreach ($lpLogos as $lpLogo): ?>
            <li<?= $lpCopy ? ' aria-hidden="true"' : '' ?>>
                <!-- not lazy: a tile that is off to the right has not loaded when the
                     track carries it into the window, and it scrolls in blank. All
                     twelve logos together are ~53KB, and the second copy reuses the
                     same URLs, so there is nothing to save by deferring them. -->
                <img src="<?= $e(img_src($lpLogo['src'])) ?>" alt="<?= $lpCopy ? '' : $e($lpLogo['alt']) ?>"
                    width="<?= (int) $lpLogo['w'] ?>" height="<?= (int) $lpLogo['h'] ?>" decoding="async" />
            </li>
            <?php endforeach; ?>
            <?php endfor; ?>
        </ul>
    </div>
</section>
<?php unset($lpLogos, $lpLogo, $lpCopy); ?>
