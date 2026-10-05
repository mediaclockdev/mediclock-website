<?php
/* * Landing : FAQ.
   Built on <details>/<summary>: it opens without JavaScript, it is keyboard
   operable for free, and the browser's own find-in-page can reach closed
   answers. The first one starts open so the section does not read as a wall
   of closed boxes. */
?>
<section class="lp-section lp-faq">
    <div class="lp-container">
        <div class="lp-section-head lp-section-head--stacked">
            <div>
                <h2 class="lp-section-title"><?= $e($lp['faq_title']) ?></h2>
            </div>
        </div>
        <div class="lp-faq-list">
            <?php foreach ($lp['faq'] as $lpI => [$lpQ, $lpA]): ?>
            <details name="lp-faq" class="lp-faq-item"<?= $lpI === 0 ? ' open' : '' ?>>
                <summary>
                    <span><?= $e($lpQ) ?></span>
                    <span class="lp-faq-toggle" aria-hidden="true"></span>
                </summary>
                <p><?= $e($lpA) ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($lpI, $lpQ, $lpA); ?>
