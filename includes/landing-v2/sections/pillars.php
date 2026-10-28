<?php
/* * Landing v2 : three pillars — design, build, launch.
   A small line over a very large one, then three cards. Each card is a title,
   one sentence and a picture pinned to its bottom edge, so the three line up
   however long the sentence runs.

   Layout by width (landing-v2.css):
     wide     three across, stepped down left to right
     tablet   two across, the third card full width with its picture beside it
     phone    a sideways swipe row (.lp2-swipe), one card and a peek
   Cards fade up as they scroll in (landing-v2.js); without the script they
   are simply there. */
/* the tech tiles, as before — replaced by brand marks
$lpTech = array_column(require dirname(__DIR__, 3) . '/data/shared/tech-stack.php', null, 'alt');
$lpTech = array_values(array_filter(array_map(
    fn($alt) => $lpTech[$alt] ?? null,
    $lp['v2_pillar_build_tech']
)));
*/
$lpIcons = require dirname(__DIR__) . '/brand-icons.php';
[$lpScreen, $lpScreenAlt] = $lp['v2_pillar_design_screen'];
?>
<section class="lp2-pillars" aria-labelledby="lp2-pillars-title">
    <div class="lp-container">
        <h2 id="lp2-pillars-title" class="lp2-big-title" data-lp2-reveal>
            <span><?= $e($lp['v2_pillars_kicker']) ?></span>
            <?= $e($lp['v2_pillars_title']) ?>
        </h2>

        <ul class="lp2-pillar-grid lp2-swipe">
            <?php foreach ($lp['v2_pillars'] as $lpKey => [$lpTitle, $lpText]): ?>
            <li class="lp2-pillar lp2-pillar--<?= $e($lpKey) ?>" data-lp2-reveal>
                <div class="lp2-pillar-copy">
                    <h3><?= $e($lpTitle) ?></h3>
                    <p><?= $e($lpText) ?></p>
                </div>

                <div class="lp2-pillar-visual">
                    <?php if ($lpKey === 'design'): ?>
                    <div class="lp2-phone lp2-pillar-phone">
                        <img src="<?= $e(img_src($lpScreen)) ?>" alt="<?= $e($lpScreenAlt) ?>" width="404" height="900"
                            loading="lazy" decoding="async" />
                    </div>

                    <?php elseif ($lpKey === 'build'): ?>
                    <ul class="lp2-pillar-tech">
                        <?php foreach ($lp['v2_pillar_build_tech'] as $lpName): ?>
                        <li><?= $lpIcons[$lpName] ?? '' ?><span><?= $e($lpName) ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php /* previous: the dark tech tiles
                    <ul class="lp2-pillar-tech">
                        <?php foreach ($lpTech as $lpT): ?>
                        <li><img src="<?= $e(img_src($lpT['src'])) ?>" alt="<?= $e($lpT['alt']) ?>"
                                width="<?= (int) $lpT['w'] ?>" height="<?= (int) $lpT['h'] ?>" loading="lazy" decoding="async" /></li>
                        <?php endforeach; ?>
                    </ul>
                    */ ?>

                    <?php elseif ($lpKey === 'launch'): ?>
                    <ul class="lp2-pillar-stores">
                        <?php foreach ($lp['v2_pillar_launch'] as [$lpName, $lpSub]): ?>
                        <li>
                            <?= $lpIcons[$lpName] ?? '' ?>
                            <span><strong><?= $e($lpName) ?></strong><?= $e($lpSub) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php /* previous: three rows with an orange tick
                    <ul class="lp2-pillar-checks">
                        <?php foreach ($lp['v2_pillar_launch_list'] as $lpItem): ?>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                            <?= $e($lpItem) ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    */ ?>
                    <?php endif; ?>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php unset($lpIcons, $lpName, $lpSub, $lpScreen, $lpScreenAlt, $lpKey, $lpTitle, $lpText, $lpItem); ?>
