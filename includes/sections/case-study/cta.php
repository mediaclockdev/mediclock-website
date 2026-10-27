<?php /* * Case study — closing call to action (opens the quote popup) */ ?>
<section class="cs-more" id="end" aria-labelledby="cs-more-title">
    <div class="container cs-up">
        <div class="cs-more-row">
            <h2 class="cs-title" id="cs-more-title"><?= $e($cs['cta']['title']) ?></h2>
            <button type="button" class="cs-btn contactBtn" data-interest="<?= $e($cs['title']) ?> case study"><?= $e($cs['cta']['button']) ?></button>
        </div>
    </div>
</section>
