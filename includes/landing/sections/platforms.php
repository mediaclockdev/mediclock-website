<?php
/* * Landing : what we build for every platform.
   Title, then the description, then the picture last — the order the live page
   uses. The image is pushed to the bottom of the card by the CSS, so all five
   line up across the row however long the copy runs. */
?>
<section class="lp-band-light lp-platforms">
    <div class="lp-container">
        <h2 class="lp-section-title"><?= $e($lp['platforms_title']) ?></h2>
        <ul class="lp-platform-grid">
            <?php foreach ($lp['platforms'] as [$lpName, $lpBody, $lpImg]): ?>
            <li class="lp-platform">
                <h3><?= $e($lpName) ?></h3>
                <p><?= $e($lpBody) ?></p>
                <div class="lp-platform-media">
                    <img src="<?= $e(img_src($lpImg)) ?>" alt="" width="398" height="224" loading="lazy" />
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php unset($lpName, $lpBody, $lpImg); ?>
