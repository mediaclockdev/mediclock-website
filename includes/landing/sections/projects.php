<?php
/* * Landing : case studies — the work, with the problem each app solved.
   Kept as a slider rather than a fixed row of three: there are six of these
   and the slider lets all six be reached without making the page longer.

   The button points at the form rather than off to the main site. On a page
   bought with ad spend, "Explore More" should open the conversation, not hand
   the visitor a door out of the funnel. */
?>
<section class="lp-section lp-projects">
    <div class="lp-container">
        <div class="lp-section-head">
            <div>
                <h2 class="lp-section-title"><?= $e($lp['projects_title']) ?></h2>
                <p class="lp-section-lead"><?= $e($lp['projects_lead']) ?></p>
            </div>
        </div>

        <div class="mc-slider lp-project-slider" data-slider style="--pv:3;--pv-md:2;--pv-sm:1;--gap:24px;">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($lp['projects'] as [$lpTag, $lpTitle, $lpBody, $lpImg]): ?>
                <div class="mc-slide lp-project">
                    <div class="lp-project-media">
                        <img src="<?= $e(img_src($lpImg)) ?>" alt="<?= $e($lpTitle) ?>" width="800" height="643"
                            loading="lazy" />
                    </div>
                    <div class="lp-project-body">
                        <p class="lp-project-tag"><?= $e($lpTag) ?></p>
                        <h3><?= $e($lpTitle) ?></h3>
                        <p class="lp-project-text"><?= $e($lpBody) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mc-slider-dots"></div>
        </div>
        
        <div class="lp-projects-foot">
            <button type="button" class="lp-head-link" data-lp-scroll-to="#lp-quote"><?= $e($lp['projects_cta']) ?> &rarr;</button>
        </div>
    </div>
</section>
<?php unset($lpTag, $lpTitle, $lpBody, $lpImg); ?>
