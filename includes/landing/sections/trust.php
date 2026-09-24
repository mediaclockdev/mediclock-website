<?php
/* * Landing : why businesses trust what we build.
   Laid out the way the live page has it: centred heading, then the video and
   the points side by side in two equal columns, top-aligned. Live drops to a
   single stacked column at 1024px, and so do we.

   The video is optional on purpose. If assets/images/landing/trust.mp4 has not
   been copied across yet the section falls back to a still, so a missing file
   never leaves a black hole on a page that is paying for its traffic. */
$lpVideo    = dirname(__DIR__, 3) . '/assets/images/landing/trust.mp4';
$lpHasVideo = is_file($lpVideo);
$lpPoster   = is_file(dirname(__DIR__, 3) . '/assets/images/landing/trust-poster.webp')
    ? img_src('landing/trust-poster.webp')
    : '';
?>
<section class="lp-band-dark lp-trust">
    <div class="lp-container">
        <p class="lp-eyebrow"><?= $e($lp['trust_eyebrow']) ?></p>
        <h2 class="lp-section-title"><?= $e($lp['trust_title']) ?></h2>

        <div class="lp-trust-grid">
            <div class="lp-trust-media">
                <?php if ($lpHasVideo): ?>
                <!-- the poster is the video's own first frame, so it hands over to
                     playback without a jump and the box is never a black hole -->
                <video src="<?= $e(img_src('landing/trust.mp4')) ?>"<?= $lpPoster ? ' poster="' . $e($lpPoster) . '"' : '' ?>
                    autoplay muted loop playsinline preload="metadata"
                    aria-label="Media Clock app development showreel"></video>
                <?php else: ?>
                <img src="<?= $e(img_src('landing/projects/01.webp')) ?>" alt="Apps built by Media Clock" width="800"
                    height="663" loading="lazy" />
                <?php endif; ?>
            </div>

            <ul class="lp-trust-points">
                <?php foreach ($lp['trust_points'] as [$lpHead, $lpBody]): ?>
                <li>
                    <strong><?= $e($lpHead) ?></strong>
                    <span><?= $e($lpBody) ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="lp-center">
            <a class="lp-btn lp-btn-primary" href="<?= $e(mc_tel()) ?>"><?= $e($lp['trust_cta']) ?></a>
        </div>
    </div>
</section>
<?php unset($lpVideo, $lpHasVideo, $lpPoster, $lpHead, $lpBody); ?>
