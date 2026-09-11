<?php
/* ============================================================
   * Service strip — shared component (service pages)
   One dark pill per sub-service, each with its line icon.

     $service_strip_items (array, required)  [ ['icon'  => 'pages/<slug>/icons/x.svg',
                                                'label' => 'iOS App Development'], … ]
                                              icon is relative to assets/images/
     $service_strip_title (string)  heading, screen readers only — default 'Our services'
     $service_strip_id    (string)  section id                   — default 'services'

   In data/pages/<slug>.php:
     ['type' => 'service-strip', 'title' => '…', 'items' => [ … ]]
   ============================================================ */
$service_strip_items = $service_strip_items ?? [];
$service_strip_title = $service_strip_title ?? 'Our services';
$service_strip_id    = $service_strip_id    ?? 'services';
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
$ssCols = min(max(count($service_strip_items), 1), 6); // one row on desktop
?>
<?php if ($service_strip_items): ?>
<!-- * Services strip -->
<section class="svc-strip band-light" id="<?= $h($service_strip_id) ?>" aria-labelledby="<?= $h($service_strip_id) ?>-title">
    <div class="container">
        <h2 id="<?= $h($service_strip_id) ?>-title" class="visually-hidden"><?= $h($service_strip_title) ?></h2>
        <ul class="row row-cols-1 row-cols-sm-2 row-cols-lg-<?= $ssCols ?> g-3 list-unstyled mb-0">
            <?php foreach ($service_strip_items as $ssItem): ?>
            <li class="col">
                <div class="svc-pill h-100">
                    <img src="<?= $h(img_src($ssItem['icon'])) ?>" alt="" width="42" height="42" />
                    <h3><?= $h($ssItem['label']) ?></h3>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>
<?php unset($service_strip_items, $service_strip_title, $service_strip_id, $ssCols, $ssItem); ?>
