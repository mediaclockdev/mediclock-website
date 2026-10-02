<?php
/* * Landing : the orange proof band directly under the hero.
   Four short claims, each one already made elsewhere on the page — this band
   just puts them in front of someone who has only read the headline. */
?>
<section class="lp-strip">
    <div class="lp-container lp-strip-grid">
        <?php foreach ($lp['strip'] as [$lpFigure, $lpLabel]): ?>
        <div class="lp-strip-item">
            <strong><?= $e($lpFigure) ?></strong>
            <span><?= $e($lpLabel) ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php unset($lpFigure, $lpLabel); ?>
