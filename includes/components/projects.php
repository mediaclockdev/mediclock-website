<?php
/* ============================================================
   * Recent projects — shared component (service pages)
   Copy on one side, image on the other, alternating per project.

     $projects_items (array, required)  [ [
         'title' => 'Times Table Tunes',
         'image' => 'pages/<slug>/projects/x.webp',   relative to assets/images/
         'w' => 369, 'h' => 488,                      the image's real size
         'alt'   => '…',                              default: the title
         'logo'  => ['src' => '…', 'w' => 240, 'h' => 65, 'alt' => '…'],  optional, above the title
         'copy'  => ['paragraph', …],
         'stats' => ['Downloads' => '500', 'Ratings' => '4.5/5'],  optional
       ], … ]
     $projects_title       (string) default 'Recent Projects'
     $projects_id          (string) default 'projects'
     $projects_theme       (string) 'light' | 'dark'                          — default 'light'
     $projects_media_cols  (int)    image column width on desktop, out of 12  — default 6
     $projects_image_first (bool)   true = first project's image on the left  — default false
     $projects_cta         (array)  optional closing call to action:
                                    ['title' => '…', 'label' => '…', 'href' => '…']
   ============================================================ */
$projects_items       = $projects_items       ?? [];
$projects_title       = $projects_title       ?? 'Recent Projects';
$projects_id          = $projects_id          ?? 'projects';
$projects_theme       = ($projects_theme ?? 'light') === 'dark' ? 'dark' : 'light';
$projects_media_cols  = min(max((int) ($projects_media_cols ?? 6), 3), 9);
$projects_image_first = $projects_image_first ?? false;
$projects_cta         = $projects_cta         ?? [];
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
?>
<?php if ($projects_items): ?>
<!-- * Recent Projects — copy and image side by side, alternating -->
<section class="section svc-projects band-<?= $projects_theme ?>" id="<?= $h($projects_id) ?>" aria-labelledby="<?= $h($projects_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 id="<?= $h($projects_id) ?>-title"><?= $h($projects_title) ?></h2>
        </div>
        <?php foreach ($projects_items as $pjI => $pj): ?>
        <article class="project row align-items-center g-4 g-lg-5<?= ($pjI % 2 === 1) !== $projects_image_first ? ' flex-lg-row-reverse' : '' ?>">
            <div class="col-12 col-lg-<?= 12 - $projects_media_cols ?> project-copy">
                <?php if (!empty($pj['logo']['src'])): ?>
                <img class="project-logo" src="<?= $h(img_src($pj['logo']['src'])) ?>" alt="<?= $h($pj['logo']['alt'] ?? '') ?>"
                    width="<?= (int) ($pj['logo']['w'] ?? 0) ?>" height="<?= (int) ($pj['logo']['h'] ?? 0) ?>" loading="lazy" decoding="async" />
                <?php endif; ?>
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
            <div class="col-12 col-lg-<?= $projects_media_cols ?> project-media">
                <img src="<?= $h(img_src($pj['image'])) ?>" alt="<?= $h($pj['alt'] ?? $pj['title']) ?>"
                    width="<?= (int) $pj['w'] ?>" height="<?= (int) $pj['h'] ?>" loading="lazy" decoding="async" />
            </div>
        </article>
        <?php endforeach; ?>

        <?php if (!empty($projects_cta['label']) && !empty($projects_cta['href'])): ?>
        <!-- * Recent Projects : closing call to action -->
        <div class="projects-cta">
            <?php if (!empty($projects_cta['title'])): ?><h2 class="projects-cta-title"><?= $h($projects_cta['title']) ?></h2><?php endif; ?>
            <a class="projects-cta-btn" href="<?= $h($projects_cta['href']) ?>"<?= preg_match('#^https?://#', $projects_cta['href']) ? ' target="_blank" rel="noopener"' : '' ?>><?= $h($projects_cta['label']) ?> <span aria-hidden="true">&rarr;</span></a>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<?php unset($projects_items, $projects_title, $projects_id, $projects_theme, $projects_media_cols,
    $projects_image_first, $projects_cta, $pjI, $pj, $pjPara, $pjLabel, $pjValue); ?>
