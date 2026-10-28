<?php
/* * Landing v2 : stats — four big numbers straight under the phones.
   No heading: the numbers are the message. The final figure is in the HTML,
   so without JavaScript (or with reduced motion) the row simply reads as
   written; landing-v2.js only adds the count-up on top. */
?>
<section class="lp2-stats" aria-label="Media Clock in numbers">
    <ul class="lp-container lp2-stats-grid">
        <?php foreach ($lp['v2_stats'] as [$lpNum, $lpSuffix, $lpLabel]): ?>
        <li class="lp2-stat">
            <strong>
                <span data-lp2-count="<?= $e($lpNum) ?>"><?= $e($lpNum) ?></span><em><?= $e($lpSuffix) ?></em>
            </strong>
            <span class="lp2-stat-label"><?= $e($lpLabel) ?></span>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
<?php unset($lpNum, $lpSuffix, $lpLabel); ?>
