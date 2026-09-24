<?php
/* * Landing : recent work.
   Title above the picture, the way the live page has it, and the picture runs
   to the edges of the card — the card clips it, so its bottom corners follow
   the card's own radius.

   The button points at the form rather than off to the main site. On a page
   bought with ad spend, "Explore More" should open the conversation, not hand
   the visitor a door out of the funnel. */
?>
<section class="lp-band-light lp-projects">
    <div class="lp-container">
        <h2 class="lp-section-title"><?= $e($lp['projects_title']) ?></h2>
        <div class="mc-slider lp-project-slider" data-slider style="--pv:3;--pv-md:2;--pv-sm:1;--gap:30px;">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($lp['projects'] as [$lpTitle, $lpImg]): ?>
                <div class="mc-slide lp-project">
                    <h3><?= $e($lpTitle) ?></h3>
                    <div class="lp-project-media">
                        <img src="<?= $e(img_src($lpImg)) ?>" alt="<?= $e($lpTitle) ?>" width="800" height="643"
                            loading="lazy" />
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mc-slider-dots"></div>
        </div>
        <div class="lp-center">
            <button type="button" class="lp-btn lp-btn-primary" data-lp-scroll-to="#lp-quote"><?= $e($lp['projects_cta']) ?></button>
        </div>
    </div>
</section>
<?php unset($lpTitle, $lpImg); ?>
