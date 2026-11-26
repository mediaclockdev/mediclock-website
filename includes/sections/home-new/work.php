<?php
/* * Homepage (new) — "Explore our recent projects": 2 x 2 grid + "See More Projects"
   Case-study links share their base with the portfolio (data/portfolio/work.php),
   so they move with it when the new portfolio goes live. */
$hnCaseBase = (require dirname(__DIR__, 3) . '/data/portfolio/work.php')['case_study_base'];
?>
<section class="hn-work" id="work" aria-labelledby="hn-work-title">
    <!-- wider than .hn-shell on purpose: the design gives the projects up to 1280px -->
    <div class="hn-work-wrap">
        <div class="hn-work-head">
            <span class="hn-work-eyebrow">Our portfolio</span>
            <h2 id="hn-work-title">Explore our <span>recent</span> projects</h2>
        </div>
        <div class="hn-work-grid" aria-label="Selected projects">
            <?php foreach ($hn['work'] as $hnProject):
                $hnHref = !empty($hnProject['case_study'])
                    ? page_url($hnCaseBase . '/' . $hnProject['case_study'])
                    : page_url('portfolio'); ?>
            <article class="hn-work-item">
                <div class="hn-work-visual">
                    <img src="<?= $e(img_src($hnProject['image'])) ?>" alt="<?= $e($hnProject['alt']) ?>"
                        width="1400" height="697" loading="lazy" decoding="async" />
                </div>
                <div class="hn-work-caption">
                    <div>
                        <h3><?= $e($hnProject['title']) ?></h3>
                        <p><?= $e($hnProject['meta']) ?></p>
                    </div>
                    <a href="<?= $e($hnHref) ?>" aria-label="View <?= $e($hnProject['title']) ?> project"><span aria-hidden="true">↗</span></a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <div class="hn-work-cta">
            <a class="hn-btn hn-work-more" href="<?= $e(page_url('portfolio-new')) ?>">See More Projects</a>
        </div>
    </div>
</section>
<?php unset($hnCaseBase, $hnProject, $hnHref); ?>
