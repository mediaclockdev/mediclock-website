<?php
/* * Landing : development roadmap.
   The artwork is one wide image. It is legible on a laptop and unreadable on a
   phone, so below 768px the CSS hides it and shows the same three steps as
   real text — readable, selectable, and static rather than a slider. */
?>
<section class="lp-band-dark lp-roadmap">
    <div class="lp-container">
        <h2 class="lp-section-title"><?= $e($lp['roadmap_title']) ?></h2>

        <div class="lp-roadmap-art">
            <img src="<?= $e(img_src($lp['roadmap_image'])) ?>" alt="<?= $e($lp['roadmap_title']) ?>"
                width="<?= (int) $lp['roadmap_w'] ?>" height="<?= (int) $lp['roadmap_h'] ?>" loading="lazy" />
        </div>

        <ol class="lp-roadmap-steps">
            <?php foreach ($lp['roadmap_steps'] as $lpI => [$lpHead, $lpBody]): ?>
            <li>
                <span class="lp-step-num"><?= $lpI + 1 ?></span>
                <div>
                    <strong><?= $e($lpHead) ?></strong>
                    <p><?= $e($lpBody) ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
<?php unset($lpI, $lpHead, $lpBody); ?>
