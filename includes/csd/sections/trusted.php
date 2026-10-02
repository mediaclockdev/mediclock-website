<?php
/* * CSD : client logo marquee — "Trusted by".
   Built to match the mobile-app ad pages exactly, as asked: the same shared
   logo data, the same endless single row. Only the class prefix differs, so
   this page can be restyled without touching includes/landing/.

   Reads the main site's dark client logos — the same brands, already sized
   and optimised. Read-only: nothing here changes how they appear elsewhere.

   One row that scrolls forever rather than a wrapping grid that breaks into a
   ragged second line. The list is rendered twice and the track slides left by
   exactly half its own width, so at the moment the animation loops the second
   copy is sitting where the first started and the join never shows. The
   duplicate carries aria-hidden and empty alt text, so a screen reader still
   hears each client once. */
$csdLogos = require dirname(__DIR__, 3) . '/data/shared/clients-dark.php';
?>
<section class="csd-logos">
    <div class="csd-wrap csd-center">
        <span class="csd-eyebrow"><?= $e($csd['trusted_title']) ?></span>
    </div>
    <!-- full-bleed on purpose: the logos run off both edges instead of
         stopping at the container, which is what sells the movement -->
    <div class="csd-marquee">
        <ul class="csd-marquee-track">
            <?php for ($csdCopy = 0; $csdCopy < 2; $csdCopy++): ?>
            <?php foreach ($csdLogos as $csdLogo): ?>
            <li<?= $csdCopy ? ' aria-hidden="true"' : '' ?>>
                <!-- not lazy: a tile that is off to the right has not loaded when the
                     track carries it into the window, and it scrolls in blank. All
                     twelve logos together are ~53KB, and the second copy reuses the
                     same URLs, so there is nothing to save by deferring them. -->
                <img src="<?= $e(img_src($csdLogo['src'])) ?>" alt="<?= $csdCopy ? '' : $e($csdLogo['alt']) ?>"
                    width="<?= (int) $csdLogo['w'] ?>" height="<?= (int) $csdLogo['h'] ?>" decoding="async" />
            </li>
            <?php endforeach; ?>
            <?php endfor; ?>
        </ul>
    </div>
</section>
<?php unset($csdLogos, $csdLogo, $csdCopy); ?>
