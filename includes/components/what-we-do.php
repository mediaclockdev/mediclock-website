<?php
/* ============================================================
   * What we do — shared component (service pages)
   Heading, intro and a call to action on the left; a 2-column grid of
   services on the right (icon + title, short description underneath).

     $what_we_do_items (array, required)  [ [
         'icon'  => 'pages/<slug>/icons/x.svg',   relative to assets/images/
         'title' => 'Organic Marketing',
         'text'  => '…',
         'link'  => ['label' => 'See our UI/UX design work', 'href' => '/ui-ux-design/'],  optional
       ], … ]
     $what_we_do_title (string)  default 'What we do?'
     $what_we_do_intro (string)  default ''
     $what_we_do_cta   (array)   ['label' => '…', 'href' => '…'] — optional
     $what_we_do_id    (string)  section id                  — default 'what-we-do'
     $what_we_do_theme (string)  'dark' | 'light'            — default 'dark'
     $what_we_do_layout (string) 'side'    = intro left, 2-column grid right (default)
                                 'stacked' = heading + intro across the top, then
                                             roomy 2 x 2 cards (icon tile, title, copy, link)
   Styles: service.css
   ============================================================ */
$what_we_do_items = $what_we_do_items ?? [];
$what_we_do_title = $what_we_do_title ?? 'What we do?';
$what_we_do_intro = $what_we_do_intro ?? '';
$what_we_do_cta   = $what_we_do_cta   ?? [];
$what_we_do_id    = $what_we_do_id    ?? 'what-we-do';
$what_we_do_theme = ($what_we_do_theme ?? 'dark') === 'light' ? 'light' : 'dark';
$what_we_do_layout = ($what_we_do_layout ?? 'side') === 'stacked' ? 'stacked' : 'side';
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
?>
<?php if ($what_we_do_items && $what_we_do_layout === 'stacked'): ?>
<!-- * What we do — stacked: heading on top, cards below -->
<section class="section what-we-do what-we-do--stacked band-<?= $what_we_do_theme ?>" id="<?= $h($what_we_do_id) ?>" aria-labelledby="<?= $h($what_we_do_id) ?>-title">
    <div class="container">
        <div class="head">
            <h2 class="what-we-do-title" id="<?= $h($what_we_do_id) ?>-title"><?= $h($what_we_do_title) ?></h2>
            <?php if ($what_we_do_intro !== ''): ?><p><?= $h($what_we_do_intro) ?></p><?php endif; ?>
        </div>
        <ul class="row row-cols-1 row-cols-md-2 g-4 list-unstyled mb-0">
            <?php foreach ($what_we_do_items as $wwdItem): ?>
            <li class="col">
                <article class="wwd-card h-100">
                    <?php if (!empty($wwdItem['icon'])): ?>
                    <span class="wwd-card-icon"><img src="<?= $h(img_src($wwdItem['icon'])) ?>" alt="" width="34" height="34" loading="lazy" decoding="async" /></span>
                    <?php endif; ?>
                    <div class="wwd-card-body">
                        <h3><?= $h($wwdItem['title']) ?></h3>
                        <?php if (!empty($wwdItem['text'])): ?><p><?= $h($wwdItem['text']) ?></p><?php endif; ?>
                        <?php if (!empty($wwdItem['link']['label']) && !empty($wwdItem['link']['href'])): ?>
                        <a class="wwd-link" href="<?= $h($wwdItem['link']['href']) ?>"><?= $h($wwdItem['link']['label']) ?> <span aria-hidden="true">&rarr;</span></a>
                        <?php endif; ?>
                    </div>
                </article>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php elseif ($what_we_do_items): ?>
<!-- * What we do -->
<section class="section what-we-do<?= $what_we_do_cta ? ' what-we-do--cta' : '' ?> band-<?= $what_we_do_theme ?>" id="<?= $h($what_we_do_id) ?>" aria-labelledby="<?= $h($what_we_do_id) ?>-title">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-center">

            <!-- * What we do : intro -->
            <div class="col-12 col-lg-4 what-we-do-copy">
                <h2 class="what-we-do-title" id="<?= $h($what_we_do_id) ?>-title"><?= $h($what_we_do_title) ?></h2>
                <?php if ($what_we_do_intro !== ''): ?><p class="what-we-do-intro"><?= $h($what_we_do_intro) ?></p><?php endif; ?>
            </div>

            <!-- * What we do : services grid -->
            <div class="col-12 col-lg-8">
                <ul class="row row-cols-1 row-cols-md-2 g-4 list-unstyled mb-0">
                    <?php foreach ($what_we_do_items as $wwdItem): ?>
                    <li class="col">
                        <div class="wwd-item">
                            <div class="wwd-item-head">
                                <?php if (!empty($wwdItem['icon'])): ?>
                                <img src="<?= $h(img_src($wwdItem['icon'])) ?>" alt="" width="50" height="50" loading="lazy" decoding="async" />
                                <?php endif; ?>
                                <h3><?= $h($wwdItem['title']) ?></h3>
                            </div>
                            <?php if (!empty($wwdItem['text'])): ?><p><?= $h($wwdItem['text']) ?></p><?php endif; ?>
                            <?php if (!empty($wwdItem['link']['label']) && !empty($wwdItem['link']['href'])): ?>
                            <a class="wwd-link" href="<?= $h($wwdItem['link']['href']) ?>"><?= $h($wwdItem['link']['label']) ?> <span aria-hidden="true">&rarr;</span></a>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>

        <?php if (!empty($what_we_do_cta['label']) && !empty($what_we_do_cta['href'])): ?>
        <!-- * What we do : call to action.
             Outside the row, so it closes the section at every width. Inside the
             left column it landed above the whole service grid once the columns
             stacked below 992px, roughly 700px short of the section's end. -->
        <a class="projects-cta-btn what-we-do-cta" href="<?= $h($what_we_do_cta['href']) ?>"><?= $h($what_we_do_cta['label']) ?> <span aria-hidden="true">&rarr;</span></a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<?php unset($what_we_do_items, $what_we_do_title, $what_we_do_intro, $what_we_do_cta, $what_we_do_id, $what_we_do_theme, $what_we_do_layout, $wwdItem); ?>
