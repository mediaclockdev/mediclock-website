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
/* every tile is 335 wide whatever the logo in it (111px of logo in one,
   295px in another), so equal tiles left uneven gaps. The v2 band uses
   copies cut down to the logo plus 6px each side (same height, same
   tile colour), keyed by the same file name, with their new widths;
   the row's gap then sets the same space between every pair. */
$lpTrim = ['01' => 123, '02' => 138, '03' => 225, '04' => 307, '05' => 302, '06' => 146,
           '07' => 146, '08' => 224, '09' => 228, '10' => 306, '11' => 293, '12' => 250];
foreach ($lpLogos as &$lpLogo) {
    $lpId = basename($lpLogo['src'], '.webp');
    if (isset($lpTrim[$lpId])) {
        $lpLogo['src'] = 'landing-v2/logos/' . $lpId . '.webp';
        $lpLogo['w'] = $lpTrim[$lpId];
    }
}
unset($lpLogo, $lpId, $lpTrim);
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
