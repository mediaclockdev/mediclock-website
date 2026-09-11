<?php
/* ============================================================
   * Recent projects — shared component (service pages)
   Copy on one side, image on the other, alternating per project.

     $projects_items (array, required)  [ [
         'title' => 'Times Table Tunes',
         'image' => 'pages/<slug>/projects/x.webp',   relative to assets/images/
         'w' => 369, 'h' => 488,                      the image's real size
         'alt'   => '…',                              default: the title
         'copy'  => ['paragraph', …],
         'stats' => ['Downloads' => '500', 'Ratings' => '4.5/5'],  optional
       ], … ]
     $projects_title (string)  default 'Recent Projects'
     $projects_id    (string)  default 'projects'
   ============================================================ */
$projects_items = $projects_items ?? [];
$projects_title = $projects_title ?? 'Recent Projects';
$projects_id    = $projects_id    ?? 'projects';
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
?>
<?php if ($projects_items): ?>
<!-- * Recent Projects — copy left / image right, alternating -->
<section class="section svc-projects band-light" id="<?= $h($projects_id) ?>" aria-labelledby="<?= $h($projects_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 id="<?= $h($projects_id) ?>-title"><?= $h($projects_title) ?></h2>
        </div>
        <?php foreach ($projects_items as $pjI => $pj): ?>
        <article class="project row align-items-center g-4 g-lg-5<?= $pjI % 2 ? ' flex-lg-row-reverse' : '' ?>">
            <div class="col-12 col-lg-6 project-copy">
                <h3 class="project-title"><?= $h($pj['title']) ?></h3>
                <?php foreach ($pj['copy'] ?? [] as $pjPara): ?>
                <p><?= $h($pjPara) ?></p>
                <?php endforeach; ?>
                <?php if (!empty($pj['stats'])): ?>
                <dl class="project-stats">
                    <?php foreach ($pj['stats'] as $pjLabel => $pjValue): ?>
                    <div><dt><?= $h($pjLabel) ?></dt><dd><?= $h($pjValue) ?></dd></div>
                    <?php endforeach; ?>
                </dl>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6 project-media">
                <img src="<?= $h(img_src($pj['image'])) ?>" alt="<?= $h($pj['alt'] ?? $pj['title']) ?>"
                    width="<?= (int) $pj['w'] ?>" height="<?= (int) $pj['h'] ?>" loading="lazy" decoding="async" />
            </div>
        </article>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>
<?php unset($projects_items, $projects_title, $projects_id, $pjI, $pj, $pjPara, $pjLabel, $pjValue); ?>
