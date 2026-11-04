<?php /* * Case study — closing call to action (opens the quote popup) */ ?>
<section class="cs-more" id="end" aria-labelledby="cs-more-title">
    <div class="container cs-up">
        <?php /* <div class="cs-more-row"> */ ?>
        <?php /* optional 'text': a line under the title; title, line and button then stack */ ?>
        <div class="cs-more-row<?= !empty($cs['cta']['text']) ? ' has-text' : '' ?>">
            <h2 class="cs-title" id="cs-more-title"><?= $e($cs['cta']['title']) ?></h2>
            <?php if (!empty($cs['cta']['text'])): ?>
            <p class="cs-more-text"><?= $e($cs['cta']['text']) ?></p>
            <?php endif; ?>
            <?php /* <button type="button" class="cs-btn contactBtn" data-interest="<?= $e($cs['title']) ?> case study"><?= $e($cs['cta']['button']) ?></button> */ ?>
            <button type="button" class="cs-btn contactBtn" data-interest="<?= $e($cs['name'] ?? $cs['title']) ?> case study"><?= $e($cs['cta']['button']) ?></button>
        </div>
    </div>
</section>
