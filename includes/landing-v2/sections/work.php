<?php
/* * Landing v2 : our work — one wide dark card per app, swiped sideways.
   The track is a native scroll-snap row, so it swipes on a phone, scrolls
   with a trackpad and works with no JavaScript at all. landing-v2.js only
   adds the arrows' behaviour and keeps the dots in step.

   Each card: tag, name, one line, two facts, one phone screen. The next card
   peeks in at the edge so it is obvious there is more to see. */
$lpWork = $lp['v2_work'];
?>
<section class="lp2-work" aria-labelledby="lp2-work-title">
    <div class="lp-container">
        <h2 id="lp2-work-title" class="lp2-big-title" data-lp2-reveal>
            <span><?= $e($lp['v2_work_kicker']) ?></span>
            <?= $e($lp['v2_work_title']) ?>
        </h2>
        <!-- <p class="lp2-section-lead" data-lp2-reveal><?= $e($lp['v2_work_lead']) ?></p> -->
    </div>

    <div class="lp2-work-carousel" data-lp2-carousel>
        <!-- the arrows sit on the current card's left and right edges, like
             build.appetiser.com.au; the dots stay under the row -->
        <div class="lp2-work-stage">
        <ul class="lp2-track" data-lp2-track tabindex="0" aria-label="Apps we have built">
            <?php foreach ($lpWork as $lpI => $lpCase): ?>
            <li class="lp2-case" aria-roledescription="slide" aria-label="<?= $lpI + 1 ?> of <?= count($lpWork) ?>">
                <div class="lp2-case-copy">
                    <p class="lp2-case-tag"><?= $e($lpCase['tag']) ?></p>
                    <h3><?= $e($lpCase['name']) ?></h3>
                    <p class="lp2-case-line"><?= $e($lpCase['line']) ?></p>
                    <dl class="lp2-case-facts">
                        <?php foreach ($lpCase['facts'] as [$lpValue, $lpLabel]): ?>
                        <div>
                            <dt><?= $e($lpLabel) ?></dt>
                            <dd><?= $e($lpValue) ?></dd>
                        </div>
                        <?php endforeach; ?>
                    </dl>
                    <!-- a conversation, not a link off to the main site -->
                    <button type="button" class="lp2-case-link" data-lp-open-modal aria-haspopup="dialog">
                        Build something like this <span aria-hidden="true">&rarr;</span>
                    </button>
                </div>
                <!-- one screen in the hero's phone frame, centred -->
                <div class="lp2-case-media">
                    <div class="lp2-phone lp2-case-phone">
                        <img src="<?= $e(img_src($lpCase['screen'])) ?>" alt="<?= $e($lpCase['name']) ?> app screen"
                            width="404" height="900" loading="lazy" decoding="async" />
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
            <button type="button" class="lp2-arrow lp2-arrow--prev" data-lp2-prev aria-label="Previous app">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button type="button" class="lp2-arrow lp2-arrow--next" data-lp2-next aria-label="Next app">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>

        <?php /* Previous nav — the arrows either side of the dots, under the row
        <div class="lp-container lp2-carousel-nav">
            <button type="button" class="lp2-arrow" data-lp2-prev aria-label="Previous app">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <div class="lp2-dots" aria-hidden="true">
                <?php foreach ($lpWork as $lpI => $lpCase): ?>
                <span<?= $lpI === 0 ? ' class="is-on"' : '' ?>></span>
                <?php endforeach; ?>
            </div>
            <button type="button" class="lp2-arrow" data-lp2-next aria-label="Next app">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
            </button>
        </div>
        */ ?>
        <div class="lp-container lp2-carousel-nav">
            <div class="lp2-dots" aria-hidden="true">
                <?php foreach ($lpWork as $lpI => $lpCase): ?>
                <span<?= $lpI === 0 ? ' class="is-on"' : '' ?>></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="lp-container lp2-work-foot" data-lp2-reveal>
        <p><?= $e($lp['v2_work_foot']) ?></p>
        <button type="button" class="lp-btn lp2-pill" data-lp-open-modal aria-haspopup="dialog"><?= $e($lp['v2_work_cta']) ?></button>
    </div>
</section>
<?php unset($lpWork, $lpI, $lpCase, $lpValue, $lpLabel); ?>
