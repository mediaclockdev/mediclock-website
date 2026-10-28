<?php /* * Portfolio — hero (dark band, background video behind the copy) */ ?>
<section class="pf-hero" aria-labelledby="pf-hero-title">
    <?php /* Background video under an even dark tint, so the copy stays readable.
             To go back to the orange shapes: comment out this block and the
             pause button, then uncomment the shapes below.
             Phones get the smaller file. portfolio-new.js starts it (no autoplay
             here), so readers who ask for less motion or save data never
             download it and keep the poster, the video's first frame. The pause
             button is there because the video loops for longer than 5 seconds
             (WCAG 2.2.2). */ ?>
    <div class="pf-hero-media" aria-hidden="true">
        <video class="pf-hero-video" muted loop playsinline preload="none"
               poster="<?= $e(img_src('pages/portfolio/hero-video-poster.webp')) ?>">
            <source src="<?= $e(asset_url('assets/videos/portfolio-hero-720.mp4')) ?>" type="video/mp4" media="(max-width: 767.98px)">
            <source src="<?= $e(asset_url('assets/videos/portfolio-hero-1080.mp4')) ?>" type="video/mp4">
        </video>
    </div>
    <button type="button" class="pf-hero-toggle" aria-label="Pause background video" hidden>
        <svg viewBox="0 0 16 16" aria-hidden="true"><path class="pf-i-pause" d="M4 3h3v10H4zm5 0h3v10H9z" /><path class="pf-i-play" d="M5 2.5 13.5 8 5 13.5z" /></svg>
    </button>
    <?php /* Orange shapes — the hero's background before the video. Uncomment to bring them back.
    <div class="pf-orb pf-orb-main" aria-hidden="true"><span></span><i></i><b></b></div>
    <div class="pf-orb pf-orb-soft" aria-hidden="true"></div>
    <div class="pf-spark pf-spark-one" aria-hidden="true">×</div>
    <div class="pf-spark pf-spark-two" aria-hidden="true">+</div>
    */ ?>
    <div class="container pf-hero-inner">
        <div class="pf-hero-copy">
            <div class="pf-eyebrow"><i></i> Our recent work · <?= date('Y') ?></div>
            <h1 id="pf-hero-title">
                <span class="pf-hero-line">Digital work,</span>
                <span class="pf-hero-line pf-hero-accent">built to move</span>
            </h1>
            <p>Websites, mobile apps, and digital products designed with clarity, character, and precise interactions.</p>
            <div class="pf-hero-actions">
                <a class="pf-btn pf-btn-primary" href="#work">View our work <span class="pf-arr" aria-hidden="true">↗</span></a>
                <button type="button" class="pf-btn contactBtn" data-interest="Free consultation">Start a project</button>
            </div>
        </div>
    </div>
</section>
