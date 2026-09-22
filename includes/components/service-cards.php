<?php
/* ============================================================
   * Service cards — shared component (service pages)
   Dark cards with an icon tile over the top edge, a centred title and
   a short description; optional closing call to action underneath.
   The grid is CSS (not Bootstrap columns) so the cards can share row
   tracks through subgrid and every description starts on the same line.

     $service_cards_items (array, required)  [ [
         'image' => 'pages/<slug>/cards/x.webp',   icon tile, relative to assets/images/
         'title' => 'Business Name Consultation',
         'text'  => '…',
       ], … ]
     $service_cards_title (string)  section heading                — default 'Our services'
     $service_cards_lead  (string)  line under the heading         — optional
     $service_cards_id    (string)  section id                     — default 'service-cards'
     $service_cards_theme (string)  'light' | 'dark'               — default 'light'
     $service_cards_cta   (array)   ['title' => '…', 'label' => '…', 'href' => '…'] — optional
   Styles: service.css
   ============================================================ */
$service_cards_items = $service_cards_items ?? [];
$service_cards_title = $service_cards_title ?? 'Our services';
$service_cards_lead  = $service_cards_lead  ?? '';
$service_cards_id    = $service_cards_id    ?? 'service-cards';
$service_cards_theme = ($service_cards_theme ?? 'light') === 'dark' ? 'dark' : 'light';
$service_cards_cta   = $service_cards_cta   ?? [];
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
?>
<?php if ($service_cards_items): ?>
<!-- * Service cards -->
<section class="section svc-cards band-<?= $service_cards_theme ?>" id="<?= $h($service_cards_id) ?>" aria-labelledby="<?= $h($service_cards_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 id="<?= $h($service_cards_id) ?>-title"><?= $h($service_cards_title) ?></h2>
            <?php if ($service_cards_lead !== ''): ?><p><?= $h($service_cards_lead) ?></p><?php endif; ?>
        </div>
        <div class="svc-cards-wrap">
            <ul class="list-unstyled svc-cards-grid">
                <?php foreach ($service_cards_items as $scItem): ?>
                <li>
                    <article class="svc-card h-100">
                        <?php if (!empty($scItem['image'])): ?>
                        <img class="svc-card-icon" src="<?= $h(img_src($scItem['image'])) ?>" alt="" width="117" height="117" loading="lazy" decoding="async" />
                        <?php endif; ?>
                        <h3 class="svc-card-title"><?= $h($scItem['title']) ?></h3>
                        <?php if (!empty($scItem['text'])): ?><p><?= $h($scItem['text']) ?></p><?php endif; ?>
                    </article>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php if (!empty($service_cards_cta['label']) && !empty($service_cards_cta['href'])): ?>
        <!-- * Service cards : closing call to action -->
        <div class="svc-cards-cta">
            <?php if (!empty($service_cards_cta['title'])): ?><h2 class="svc-cards-cta-title"><?= $h($service_cards_cta['title']) ?></h2><?php endif; ?>
            <a class="svc-cards-cta-btn" href="<?= $h($service_cards_cta['href']) ?>"><?= $h($service_cards_cta['label']) ?></a>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<?php unset($service_cards_items, $service_cards_title, $service_cards_lead, $service_cards_id, $service_cards_theme, $service_cards_cta, $scItem); ?>
