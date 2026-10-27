<?php /* * Case study — problem statement (copy left, device right) */ $csS = $cs['problem']; ?>
<section class="cs-section cs-light" id="problem" aria-labelledby="cs-problem-title">
    <div class="container cs-split">
        <div class="cs-up">
            <h2 class="cs-title" id="cs-problem-title"><?= $e($csS['title']) ?></h2>
            <?php foreach ($csS['body'] as $csP): ?>
            <p class="cs-body"><?= $e($csP) ?></p>
            <?php endforeach; ?>
        </div>
        <?php $csVisual = $csS['visual']; include __DIR__ . '/visual.php'; ?>
    </div>
</section>
