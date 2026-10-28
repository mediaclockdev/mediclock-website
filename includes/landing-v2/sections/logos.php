<?php
/* * Landing v2 : "Global Success" — the client logos sliding past on a loop,
   straight under the hero on a light band, like build.appetiser.com.au.
   Pure CSS: the row is printed twice and the track slides left by exactly
   one copy, so the loop has no seam. The second copy is hidden from screen
   readers so each client is announced once. The logos load up front (all
   twelve are ~80KB): lazy ones would pop in mid-slide, as the row moves
   sideways rather than scrolling into view. It pauses on hover and stands
   still for people who ask for reduced motion. */
/* the light set — dark logos for a light band (was clients-dark.php when
   the band was dark) */
$lpLogos = require dirname(__DIR__, 3) . '/data/shared/clients.php';
?>
<section class="lp2-logos" aria-labelledby="lp2-logos-title">
    <div class="lp-container">
        <h2 id="lp2-logos-title" class="lp2-big-title lp2-logos-title" data-lp2-reveal>
            <span><?= $e($lp['v2_logos_kicker']) ?></span>
            <?= $e($lp['v2_logos_title']) ?>
        </h2>
    </div>

    <div class="lp2-marquee">
        <div class="lp2-marquee-track">
            <?php foreach ([false, true] as $lpCopy): ?>
            <ul class="lp2-marquee-row"<?= $lpCopy ? ' aria-hidden="true"' : '' ?>>
                <?php foreach ($lpLogos as $lpLogo): ?>
                <li><img src="<?= $e(img_src($lpLogo['src'])) ?>" alt="<?= $lpCopy ? '' : $e($lpLogo['alt']) ?>" width="<?= (int) $lpLogo['w'] ?>" height="<?= (int) $lpLogo['h'] ?>" decoding="async"></li>
                <?php endforeach; ?>
            </ul>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($lpLogos, $lpLogo, $lpCopy); ?>
