<?php
/* * Landing v2 : how it works — four steps on a line.
   Each step is a numbered dot, a title, one sentence and the thing the client
   walks away with. On a wide screen the dots sit on one horizontal line that
   fills orange as the row scrolls in; on a phone the same list becomes a
   vertical timeline down the left edge. One <ol>, no duplicate markup. */
?>
<section class="lp2-steps" aria-labelledby="lp2-steps-title">
    <div class="lp-container">
        <h2 id="lp2-steps-title" class="lp2-big-title" data-lp2-reveal>
            <span><?= $e($lp['v2_steps_kicker']) ?></span>
            <?= $e($lp['v2_steps_title']) ?>
        </h2>
        <!-- <p class="lp2-section-lead" data-lp2-reveal><?= $e($lp['v2_steps_lead']) ?></p> -->

        <ol class="lp2-step-list" data-lp2-reveal>
            <?php foreach ($lp['v2_steps'] as $lpI => [$lpTitle, $lpText, $lpGet]): ?>
            <li class="lp2-step" style="--i:<?= $lpI ?>">
                <span class="lp2-step-dot" aria-hidden="true"><?= $lpI + 1 ?></span>
                <h3><?= $e($lpTitle) ?></h3>
                <p><?= $e($lpText) ?></p>
                <p class="lp2-step-get">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                    <span class="visually-hidden">You get: </span><?= $e($lpGet) ?>
                </p>
            </li>
            <?php endforeach; ?>
        </ol>

        <div class="lp2-steps-cta" data-lp2-reveal>
            <button type="button" class="lp-btn lp2-pill" data-lp-open-modal aria-haspopup="dialog"><?= $e($lp['v2_steps_cta']) ?></button>
        </div>
    </div>
</section>
<?php unset($lpI, $lpTitle, $lpText, $lpGet); ?>
