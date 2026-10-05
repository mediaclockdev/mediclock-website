<?php
/* * CSD : client feedback — the same Google reviews the other pages quote.
   The five stars are decorative; the rating is stated in text for anyone who
   cannot see them. */
?>
<section class="csd-section csd-dark csd-reviews">
    <div class="csd-wrap">
        <div class="csd-center">
            <span class="csd-eyebrow"><?= $e($csd['reviews_eyebrow']) ?></span>
            <h2><?= $e($csd['reviews_title']) ?></h2>
        </div>
        <div class="csd-grid-3">
            <?php foreach ($csd['reviews'] as [$csdQuote, $csdWho, $csdSource]): ?>
            <figure class="csd-review csd-tilt">
                <span class="csd-glare" aria-hidden="true"></span>
                <div class="csd-stars">
                    <span class="csd-sr-only">Rated 5 out of 5</span>
                    <span aria-hidden="true">&#9733;</span><span aria-hidden="true">&#9733;</span><span
                        aria-hidden="true">&#9733;</span><span aria-hidden="true">&#9733;</span><span
                        aria-hidden="true">&#9733;</span>
                </div>
                <blockquote>
                    <p><?= $e($csdQuote) ?></p>
                </blockquote>
                <figcaption class="csd-who">
                    <!-- initials, built from the name so a new review needs no extra data -->
                    <span class="csd-av" aria-hidden="true"><?= $e(implode('', array_map(
                        fn($w) => mb_strtoupper(mb_substr($w, 0, 1)),
                        array_slice(preg_split('/\s+/', $csdWho), 0, 2)
                    ))) ?></span>
                    <span><b><?= $e($csdWho) ?></b><small><?= $e($csdSource) ?></small></span>
                </figcaption>
            </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($csdQuote, $csdWho, $csdSource); ?>
