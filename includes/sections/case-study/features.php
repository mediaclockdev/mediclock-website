<?php /* * Case study — key features (list left, device right) */ $csS = $cs['features']; ?>
<section class="cs-section cs-light" id="features" aria-labelledby="cs-features-title">
    <div class="container cs-split">
        <div class="cs-up">
            <h2 class="cs-title" id="cs-features-title"><?= $e($csS['title']) ?></h2>
            <ul class="cs-features">
                <?php foreach ($csS['items'] as [$csItemTitle, $csItemCopy]): ?>
                <li>
                    <h3><?= $e($csItemTitle) ?></h3>
                    <p><?= $e($csItemCopy) ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php $csVisual = $csS['visual']; include __DIR__ . '/visual.php'; ?>
    </div>
</section>
<?php unset($csItemTitle, $csItemCopy); ?>
