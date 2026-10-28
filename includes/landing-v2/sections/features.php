<?php
/* * Landing v2 : features — three big promises, a phone each.
   No section title: each block is its own very large headline, one sentence,
   a button and a phone, the phone swapping sides from block to block. Below
   992px they stack, words over phone; on a phone they become a sideways
   swipe row (.lp2-swipe) of cards, with the phone cut off by the card's
   bottom edge, so the three cost one screen of scrolling rather than three. */
?>
<section class="lp2-features" aria-label="Why work with us">
    <div class="lp-container">
        <ul class="lp2-feature-list lp2-swipe">
            <?php foreach ($lp['v2_features'] as $lpI => [$lpTitle, $lpText, $lpImg, $lpAlt]): ?>
            <li class="lp2-feature<?= $lpI % 2 ? ' lp2-feature--flip' : '' ?>">
                <div class="lp2-feature-copy" data-lp2-reveal>
                    <h2><?= $e($lpTitle) ?></h2>
                    <p class="lp2-feature-text"><?= $e($lpText) ?></p>
                    <button type="button" class="lp-btn lp2-pill" data-lp-open-modal
                        aria-haspopup="dialog"><?= $e($lp['v2_features_cta']) ?></button>
                </div>
                <div class="lp2-feature-visual" data-lp2-reveal>
                    <div class="lp2-phone lp2-feature-phone">
                        <img src="<?= $e(img_src($lpImg)) ?>" alt="<?= $e($lpAlt) ?>" width="404" height="900"
                            loading="lazy" decoding="async" />
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php unset($lpI, $lpTitle, $lpText, $lpImg, $lpAlt); ?>
