<?php
/* * Landing : app categories, then the closing call to action.
   Icons are inline SVG rather than image files: five small line drawings that
   must sit on a dark and a light background and follow the text colour. */
$lpIcons = [
    'health'      => '<path d="M12 21s-7-4.6-9.1-9A5.1 5.1 0 0 1 12 6.6a5.1 5.1 0 0 1 9.1 5.4C19 16.4 12 21 12 21z"/><path d="M3.6 12.6h3.6l1.5-2.7 2.1 4.8 1.8-3.3h4.2"/>',
    'booking'     => '<rect x="3" y="5" width="18" height="16" rx="3"/><path d="M3 10h18M8 3v4M16 3v4"/><path d="M8.5 15.2l2 2 4-4.4"/>',
    'realestate'  => '<path d="M3.5 10.6 12 4l8.5 6.6"/><path d="M5.6 12v7.4a1 1 0 0 0 1 1h10.8a1 1 0 0 0 1-1V12"/><path d="M10 20.4v-5.2h4v5.2"/>',
    'ecommerce'   => '<path d="M3 4h2.2l2 11.2a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.5L20.5 8H6.4"/><circle cx="10" cy="20" r="1.4"/><circle cx="17.5" cy="20" r="1.4"/>',
    'marketplace' => '<path d="M4 9h16l-1 10.2a1.6 1.6 0 0 1-1.6 1.4H6.6A1.6 1.6 0 0 1 5 19.2z"/><path d="M4 9 5.8 4.4A1.2 1.2 0 0 1 6.9 3.6h10.2a1.2 1.2 0 0 1 1.1.8L20 9"/><path d="M9.4 13a2.6 2.6 0 0 0 5.2 0"/>',
];
?>
<section class="lp-band-light lp-categories">
    <div class="lp-container">
        <p class="lp-eyebrow"><?= $e($lp['categories_eyebrow']) ?></p>
        <h2 class="lp-section-title"><?= $e($lp['categories_title']) ?></h2>

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

        <div class="lp-cta-panel lp-cta-panel--horizontal">
            <div class="lp-cta-panel-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor" width="40" height="40">
                    <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm-3-4h6v-2H9v2zm3-15.5c-4.14 0-7.5 3.36-7.5 7.5 0 2.65 1.36 4.96 3.4 6.32V17c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-1.68c2.04-1.36 3.4-3.67 3.4-6.32 0-4.14-3.36-7.5-7.5-7.5zm0 13v-1.5c-2.3 0-3.5-1.5-3.5-1.5V11.5S9.5 13 12 13v-1.5l3 2-3 2z" opacity="0"/>
                    <path d="M11 2v4h2V2h-2zm-3.66 4.34l-2.83-2.83-1.41 1.41 2.83 2.83 1.41-1.41zM3 11h4v2H3v-2zm18 0h-4v2h4v-2zm-2.93-3.25l2.83-2.83-1.41-1.41-2.83 2.83 1.41 1.41z"/>
                    <path d="M12 8c-2.76 0-5 2.24-5 5 0 1.77 1 3.32 2.5 4.19V18h5v-.81C16 16.32 17 14.77 17 13c0-2.76-2.24-5-5-5z"/>
                </svg>
            </div>
            <div class="lp-cta-panel-content">
                <h2><?= $e($lp['categories_cta_title']) ?></h2>
                <p><?= $e($lp['categories_cta_lead']) ?></p>
            </div>
            <div class="lp-cta-panel-action">
                <button type="button" class="lp-btn lp-btn-primary" data-lp-scroll-to="#lp-quote"><?= $e($lp['categories_cta']) ?></button>
            </div>
        </div>
    </div>
</section>
<?php unset($lpIcons, $lpName, $lpBody, $lpKey); ?>
