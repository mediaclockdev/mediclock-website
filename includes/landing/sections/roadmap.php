<?php
/* * Landing : how it works.
   Five stages as text columns under an orange rule. This replaces the single
   wide roadmap illustration, which was legible on a laptop and unreadable on a
   phone — as text it reflows, it can be selected and read aloud, and it needs
   no separate mobile fallback. */
?>
<section class="lp-section lp-roadmap">
    <div class="lp-container">
        <div class="lp-section-head lp-section-head--stacked">
            <div>
                <h2 class="lp-section-title"><?= $e($lp['roadmap_title']) ?></h2>
                <p class="lp-section-lead"><?= $e($lp['roadmap_lead']) ?></p>
            </div>
        </div>

        <ol class="lp-steps">
            <?php foreach ($lp['roadmap_steps'] as $lpI => [$lpHead, $lpBody]): ?>
            <li class="lp-step">
                <span class="lp-step-num" aria-hidden="true"><?= str_pad((string) ($lpI + 1), 2, '0', STR_PAD_LEFT) ?></span>
                <h3><?= $e($lpHead) ?></h3>
                <p><?= $e($lpBody) ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
<?php unset($lpI, $lpHead, $lpBody); ?>
