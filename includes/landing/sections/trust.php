<?php
/* * Landing : why businesses choose Media Clock.
   Six reasons as tick cards on the dark band, then one orange card inviting
   the call. The showreel that used to sit here has moved to the hero, which is
   where the new design puts it. */
?>
<section class="lp-section lp-section--dark lp-trust">
    <div class="lp-container">
        <div class="lp-section-head lp-section-head--stacked">
            <div>
                <!-- <?php if ($lp['trust_eyebrow'] !== ''): ?>
                <p class="lp-kicker lp-kicker--orange"><?= $e($lp['trust_eyebrow']) ?></p>
                <?php endif; ?> -->
                <h2 class="lp-section-title"><?= $e($lp['trust_title']) ?></h2>
            </div>
        </div>

        <ul class="lp-trust-grid">
            <?php foreach ($lp['trust_points'] as [$lpHead, $lpBody]): ?>
            <li class="lp-trust-card">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 6L9 17l-5-5"></path>
                </svg>
                <div>
                    <h3><?= $e($lpHead) ?></h3>
                    <p><?= $e($lpBody) ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>

        <div class="lp-trust-call">
            <p><?= $e($lp['trust_cta_title']) ?></p>
            <a class="lp-btn lp-btn-dark" href="<?= $e(mc_tel()) ?>"><?= $e($lp['trust_cta']) ?> &rarr;</a>
        </div>
    </div>
</section>
<?php unset($lpHead, $lpBody); ?>
