<?php
/* * Landing : hero — badge, headline, proof ticks and the showreel.
   The quote form used to sit here; it now lives in the closing section
   (sections/contact.php) and keeps the same #lp-quote id, so every CTA on the
   page — including the sticky button — still reaches it.

   The media slot plays the showreel that used to sit in "Why Businesses Trust
   What We Build". It is optional on purpose: if assets/images/landing/trust.mp4
   has not been copied across the slot falls back to a still, so a missing file
   never leaves a black hole on a page that is paying for its traffic. */
$lpVideo    = dirname(__DIR__, 3) . '/assets/images/landing/trust.mp4';
$lpHasVideo = is_file($lpVideo);
$lpPoster   = is_file(dirname(__DIR__, 3) . '/assets/images/landing/trust-poster.webp')
    ? img_src('landing/trust-poster.webp')
    : '';
?>
<section class="lp-hero">
    <div class="lp-container lp-hero-grid">

        <div class="lp-hero-copy">
            <p class="lp-hero-badge"><span aria-hidden="true"></span><?= $e($lp['hero_badge']) ?></p>

            <h1>
                <?= $e($lp['hero_title_before']) ?>
                <span class="lp-hero-city"><?= $e($lp['hero_title_city']) ?></span>
                <?= $e($lp['hero_title_after']) ?>
            </h1>

            <p class="lp-hero-lead"><?= $e($lp['hero_lead']) ?></p>

            <div class="lp-hero-ctas">
                <button type="button" class="lp-btn lp-btn-primary"
                    data-lp-scroll-to="#lp-quote"><?= $e($lp['hero_cta']) ?></button>
                <a class="lp-btn lp-btn-ghost" href="<?= $e(mc_tel()) ?>">Call <?= $e(mc_tel_text()) ?></a>
            </div>

            <ul class="lp-hero-ticks">
                <?php foreach ($lp['hero_ticks'] as $lpTick): ?>
                <li><?= $e($lpTick) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="lp-hero-media">
            <?php if ($lpHasVideo): ?>
            <!-- the poster is the video's own first frame, so it hands over to
                 playback without a jump and the box is never a black hole -->
            <video src="<?= $e(img_src('landing/trust.mp4')) ?>"<?= $lpPoster ? ' poster="' . $e($lpPoster) . '"' : '' ?>
                autoplay muted loop playsinline preload="metadata"
                aria-label="<?= $e($lp['hero_video_label']) ?>"></video>
            <?php else: ?>
            <img src="<?= $e(img_src('landing/projects/01.webp')) ?>" alt="Apps built by Media Clock" width="800"
                height="663" />
            <?php endif; ?>
        </div>

    </div>
</section>
<?php unset($lpVideo, $lpHasVideo, $lpPoster, $lpTick); ?>
