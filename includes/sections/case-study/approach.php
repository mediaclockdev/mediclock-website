<?php /* * Case study — the approach (device left, copy right; copy first on small screens) */ $csS = $cs['approach']; ?>
<section class="cs-section cs-dark" id="approach" aria-labelledby="cs-approach-title">
    <div class="container cs-split is-reversed">
        <?php $csVisual = $csS['visual']; include __DIR__ . '/visual.php'; ?>
        <div class="cs-up" style="--cs-delay:.15s">
            <h2 class="cs-title" id="cs-approach-title"><?= $e($csS['title']) ?></h2>
            <p class="cs-subtitle"><?= $e($csS['subtitle']) ?></p>
            <?php foreach ($csS['body'] as $csP): ?>
            <p class="cs-body"><?= $e($csP) ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</section>
