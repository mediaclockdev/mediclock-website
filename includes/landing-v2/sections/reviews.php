<?php
/* * Landing v2 : Google reviews, in the Google-badge style.
   "EXCELLENT", five stars and the Google G on top; underneath, three
   reviews to a row (two on tablet, one on a phone), each with an initials
   avatar, "Google Review", the small G, stars and a verified tick. No card
   boxes — the reviews sit on the section itself.

   The v2 page's own copy of the original ad page's slider
   (includes/landing/sections/reviews.php), which the original page keeps
   using unchanged. Same data: data/landing/reviews.php, with the short
   v2_reviews_text in place of the full reviews (see page.php).

   Each review shows v2_reviews_excerpt from data/landing-v2/common.php:
   two or three of the reviewer's own sentences, the reference site's
   length. Empty that list and 'v2_reviews_full' picks between the full
   reviews and the one-line v2_reviews_text. Anything over seven lines
   folds behind "Read more". No autoplay, so a review never slides away
   mid-read.

   Slides and dots are main.js's shared [data-slider]; the previous / next
   arrows and "Read more" are landing-v2.js. */

/* Google's G, used large in the head and small on each review */
$lp2GoogleG = static fn(int $size) => '<svg viewBox="0 0 24 24" width="' . $size . '" height="' . $size . '" aria-hidden="true" focusable="false">'
    . '<path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>'
    . '<path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>'
    . '<path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>'
    . '<path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>'
    . '</svg>';

/* "joshua thomas" → JT, "Tymspen Co." → TC, a single name → its first letter */
$lp2Initials = static function (string $name): string {
    $words = preg_split('/\s+/', trim(preg_replace('/[^\p{L}\s]/u', ' ', $name)), -1, PREG_SPLIT_NO_EMPTY);
    $out = '';
    foreach (array_slice($words, 0, 2) as $w) $out .= mb_strtoupper(mb_substr($w, 0, 1));
    return $out;
};

$lp2Rating = $lp['v2_reviews_rating'] ?? 'Excellent';

/* the text each review shows (page.php has already swapped in the one-line
   v2_reviews_text, which is the fallback when neither list applies) */
if (!empty($lp['v2_reviews_excerpt'])) {
    $lp2Full = $lp['v2_reviews_excerpt'];
} elseif (!empty($lp['v2_reviews_full'])) {
    $lp2Full = array_column(require dirname(__DIR__, 3) . '/data/landing/reviews.php', 'text');
} else {
    $lp2Full = [];
}
?>
<section class="lp-section lp2-reviews" aria-labelledby="lp2-reviews-title">
    <div class="lp-container">
        <div class="lp2-reviews-head">
            <h2 class="lp2-reviews-rating" id="lp2-reviews-title" data-lp2-reveal>
                <?= $e($lp2Rating) ?><span class="lp2-sr"> — rated 5 out of 5 on Google</span>
            </h2>
            <div class="lp2-reviews-stars" aria-hidden="true">★★★★★</div>
            <div class="lp2-reviews-g"><?= $lp2GoogleG(120) ?></div>
        </div>

        <div class="mc-slider lp2-review-slider" data-slider
            style="--pv:3;--pv-md:2;--pv-sm:1;"
            aria-roledescription="carousel" aria-label="Google reviews">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($lp['reviews'] as $lpI => $lpR): ?>
                <div class="mc-slide lp2-review" role="group" aria-roledescription="slide"
                    aria-label="<?= $lpI + 1 ?> of <?= count($lp['reviews']) ?>">
                    <div class="lp2-review-head">
                        <span class="lp2-review-avatar lp2-review-avatar--<?= $lpI % 6 ?>" aria-hidden="true"><?= $e($lp2Initials($lpR['name'])) ?></span>
                        <div class="lp2-review-who">
                            <strong><?= $e(ucwords($lpR['name'])) ?></strong>
                            <span>Google Review</span>
                        </div>
                        <span class="lp2-review-g"><?= $lp2GoogleG(22) ?></span>
                    </div>
                    <div class="lp2-review-rating">
                        <span class="lp2-review-stars" role="img" aria-label="<?= (int) $lpR['stars'] ?> out of 5 stars"><?= str_repeat('★', (int) $lpR['stars']) ?></span>
                        <svg class="lp2-review-verified" viewBox="0 0 24 24" width="22" height="22" role="img" aria-label="Verified review">
                            <circle cx="12" cy="12" r="11" fill="#4285F4"/>
                            <path d="M7.5 12.5l3 3 6-6.5" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="lp2-review-text" id="lp2-review-text-<?= $lpI ?>">“<?= $e($lp2Full[$lpI] ?? $lpR['text']) ?>”</p>
                    <!-- shown by landing-v2.js only when the review is longer than seven lines -->
                    <button type="button" class="lp2-review-more" aria-expanded="false"
                        aria-controls="lp2-review-text-<?= $lpI ?>" hidden>Read more</button>
                </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="lp2-review-arrow lp2-review-arrow--prev" data-lp2-review-prev aria-label="Previous reviews">
                <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path d="M15 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <button type="button" class="lp2-review-arrow lp2-review-arrow--next" data-lp2-review-next aria-label="Next reviews">
                <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path d="M9 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <div class="mc-slider-dots"></div>
        </div>
    </div>
</section>
<?php unset($lpR, $lpI, $lp2GoogleG, $lp2Initials, $lp2Rating, $lp2Full); ?>
