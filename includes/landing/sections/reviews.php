<?php
/* * Landing : Google reviews, verbatim.
   Long reviews are clamped to a few lines with a "Read more" that expands in
   place — the full text is always in the DOM, so nothing is hidden from a
   screen reader or from find-in-page. */
?>
<section class="lp-band-dark lp-reviews">
    <div class="lp-container">
        <h2 class="lp-section-title lp-section-title--orange">Client Feedback</h2>
        
        <div class="mc-slider lp-review-slider" data-slider data-autoplay="5000"
            style="--pv:4;--pv-md:2;--pv-sm:1;--gap:20px;"
            aria-roledescription="carousel" aria-label="Client Feedback">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($lp['reviews'] as $lpI => $lpR): ?>
                <div class="mc-slide lp-review" role="group" aria-roledescription="slide"
                    aria-label="<?= $lpI + 1 ?> of <?= count($lp['reviews']) ?>">
                    
                    <!-- Top section: Avatar + Info + Google Icon -->
                    <div class="lp-review-head">
                        <img src="<?= $e(img_src($lpR['avatar'])) ?>" alt="" width="44" height="44" loading="lazy" />
                        <div class="lp-review-info">
                            <strong><?= $e($lpR['name']) ?></strong>
                            <span class="lp-review-when"><?= $e($lpR['when']) ?></span>
                        </div>
                        <!-- Simple CSS Google 'G' icon for illustration, or an SVG -->
                        <div class="lp-review-g-icon">
                            <svg viewBox="0 0 24 24" width="20" height="20">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Stars -->
                    <div class="lp-review-stars" aria-label="<?= (int) $lpR['stars'] ?> out of 5 stars">
                        <span aria-hidden="true"><?= str_repeat('★', (int) $lpR['stars']) ?></span>
                    </div>

                    <!-- Review Text -->
                    <div class="lp-review-body">
                        <p><?= $e($lpR['text']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mc-slider-dots"></div>
        </div>
    </div>
</section>
<?php unset($lpR, $lpI); ?>
