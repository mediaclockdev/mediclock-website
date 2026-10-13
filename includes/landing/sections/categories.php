<?php
/* * Landing : app categories, then the closing call to action.
   Icons are inline SVG rather than image files: five small line drawings that
   must sit on a dark and a light background and follow the text colour. */
$lpIcons = [
    'health'      => '<path d="M12 21s-7-4.6-9.1-9A5.1 5.1 0 0 1 12 6.6a5.1 5.1 0 0 1 9.1 5.4C19 16.4 12 21 12 21z"/><path d="M3.6 12.6h3.6l1.5-2.7 2.1 4.8 1.8-3.3h4.2"/>',
    'idea'        => '<path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/>',
    'realestate'  => '<path d="M3.5 10.6 12 4l8.5 6.6"/><path d="M5.6 12v7.4a1 1 0 0 0 1 1h10.8a1 1 0 0 0 1-1V12"/><path d="M10 20.4v-5.2h4v5.2"/>',
    'ecommerce'   => '<path d="M3 4h2.2l2 11.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.5L20.5 8H6.4"/><circle cx="10" cy="20" r="1.4"/><circle cx="17.5" cy="20" r="1.4"/>',
    'marketplace' => '<path d="M4 9h16l-1 10.2a1.6 1.6 0 0 1-1.6 1.4H6.6A1.6 1.6 0 0 1 5 19.2z"/><path d="M4 9 5.8 4.4A1.2 1.2 0 0 1 6.9 3.6h10.2a1.2 1.2 0 0 1 1.1.8L20 9"/><path d="M9.4 13a2.6 2.6 0 0 0 5.2 0"/>',
];
?>
<section class="lp-section lp-section--grey lp-categories">
    <div class="lp-container">
        <div class="lp-section-head lp-section-head--stacked">
            <div>
                <?php if ($lp['categories_eyebrow'] !== ''): ?>
                <p class="lp-kicker lp-kicker--orange"><?= $e($lp['categories_eyebrow']) ?></p>
                <?php endif; ?>
                <h2 class="lp-section-title"><?= $e($lp['categories_title']) ?></h2>
                <p class="lp-section-lead"><?= $e($lp['categories_lead']) ?></p>
            </div>
        </div>

        <ul class="lp-category-grid">
            <?php foreach ($lp['categories'] as [$lpName, $lpBody, $lpKey]): ?>
            <li class="lp-category">
                <span class="lp-category-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
                        stroke-linecap="round" stroke-linejoin="round"><?= $lpIcons[$lpKey] ?></svg>
                </span>
                <h3><?= $e($lpName) ?></h3>
                <p><?= $e($lpBody) ?></p>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php unset($lpIcons, $lpName, $lpBody, $lpKey); ?>
