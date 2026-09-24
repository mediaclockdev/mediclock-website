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
                <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61" viewBox="0 0 61 61" fill="none">
                    <path d="M28.8562 0V9.67984H32.1441V0H28.8559H28.8562ZM15.4306 2.90894L12.7369 4.79501L18.288 12.7223L20.9803 10.8361L15.4306 2.90894ZM45.569 2.90894L40.0195 10.8362L42.7121 12.7223L48.2632 4.79501L45.5694 2.90894H45.569ZM30.4994 12.3283C22.4562 12.3283 15.936 17.2125 15.936 23.2384L24.2103 48.2966H36.79L45.0635 23.2384C45.0635 17.2126 38.5438 12.3283 30.5002 12.3283H30.4994ZM4.34447 15.2334L3.22111 18.3248L12.3126 21.6347L13.4401 18.5448L4.34427 15.2334H4.34447ZM56.6551 15.2334L47.5592 18.5451L48.6829 21.6353L57.7788 18.3248L56.6551 15.2334ZM13.0009 29.3655L3.65268 31.8729L4.50089 35.0464L13.8491 32.5426L13.0011 29.3655H13.0009ZM47.9987 29.3655L47.1511 32.5426L56.4993 35.046L57.3469 31.8723L47.9987 29.3654V29.3655ZM24.0269 50.1233V54.479H36.9735V50.124H24.0269L24.0269 50.1233ZM24.0269 56.6443V61H36.9735V56.645H24.0269L24.0269 56.6443Z" fill="#1E1E1E"></path>
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
