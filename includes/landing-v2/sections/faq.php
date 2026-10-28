<?php
/* * Landing v2 : FAQ — title on the left, the questions on the right.
   Built on <details name="…">: it opens without JavaScript, it is keyboard
   operable for free, find-in-page reaches closed answers, and the shared name
   makes it an exclusive accordion (opening one closes the other) in browsers
   that support it. The first starts open so the list does not read as a wall
   of closed boxes. On a narrow screen the title sits above the list. */
?>
<section class="lp2-faq" aria-labelledby="lp2-faq-title">
    <div class="lp-container lp2-faq-grid">
        <div class="lp2-faq-head" data-lp2-reveal>
            <h2 id="lp2-faq-title" class="lp2-big-title lp2-big-title--left">
                <span><?= $e($lp['v2_faq_kicker']) ?></span>
                <?= $e($lp['v2_faq_title']) ?>
            </h2>
            <p class="lp2-faq-call">
                Still unsure? Call
                <a href="<?= $e(mc_tel()) ?>"><?= $e(mc_tel_text()) ?></a>
            </p>
            <!-- the same button as the hero, so the question left over can be asked -->
            <button type="button" class="lp-btn lp2-pill lp2-faq-cta" data-lp-open-modal aria-haspopup="dialog"><?= $e($lp['v2_hero_cta']) ?></button>
        </div>

        <div class="lp2-faq-list" data-lp2-reveal>
            <?php foreach ($lp['v2_faq'] as $lpI => [$lpQ, $lpA]): ?>
            <details name="lp2-faq" class="lp2-faq-item"<?= $lpI === 0 ? ' open' : '' ?>>
                <summary>
                    <span><?= $e($lpQ) ?></span>
                    <span class="lp2-faq-icon" aria-hidden="true"></span>
                </summary>
                <p><?= $e($lpA) ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($lpI, $lpQ, $lpA); ?>
