<?php
/* * Landing v2 : hero — one line of eyebrow, the headline, one sentence, one
   button, then a row of phones showing apps we have built.

   The phones sit across the seam between the dark hero and the white page
   below it, so the first screen ends on our work rather than on a hard edge.
   They fan out from the middle on load; on a phone-width screen the outer
   two drop away, where five would be too small to read. */
$lpApps = $lp['v2_hero_apps'];
$lpMid = intdiv(count($lpApps), 2);
?>
<section class="lp2-hero">
    <div class="lp-container lp2-hero-copy">
        <!-- <p class="lp2-hero-eyebrow"><span aria-hidden="true"></span><?= $e($lp['v2_hero_eyebrow']) ?></p> -->

        <!-- each word rises in turn (--i is its place in the line); the
             accent words are the last to arrive and get the orange sweep -->
        <h1>
            <?php $lpW = 0;
            foreach (preg_split('/\s+/', trim($lp['v2_hero_title_before'])) as $lpWord): ?>
            <span class="lp2-w" style="--i:<?= $lpW++ ?>"><?= $e($lpWord) ?></span>
            <?php endforeach; ?>
            <span class="lp2-accent">
                <?php foreach (preg_split('/\s+/', trim($lp['v2_hero_title_accent'])) as $lpWord): ?>
                <span class="lp2-w" style="--i:<?= $lpW++ ?>"><?= $e($lpWord) ?></span>
                <?php endforeach; ?>
            </span>
        </h1>

        <p class="lp2-hero-lead"><?= $e($lp['v2_hero_lead']) ?></p>

        <div class="lp2-hero-ctas">
            <button type="button" class="lp-btn lp-btn-primary"
                data-lp-open-modal aria-haspopup="dialog"><?= $e($lp['v2_hero_cta']) ?></button>
            <!-- <a class="lp2-hero-call" href="<?= $e(mc_tel()) ?>">or call <?= $e(mc_tel_text()) ?></a> -->
        </div>
    </div>

    <?php /* Previous hero phones — single screenshots framed in CSS, from
             v2_hero_phones. Replaced by the mockups below; remove this comment
             (and restore $lpPhones / $lpMid above) to bring them back.
    <ul class="lp2-phones">
        <?php foreach ($lpPhones as $lpI => [$lpImg, $lpAlt]): ?>
        <!-- --d is the distance from the middle phone: it sets the size, the
             stacking order and the entrance delay -->
        <li class="lp2-phone" style="--d:<?= abs($lpI - $lpMid) ?>">
            <img src="<?= $e(img_src($lpImg)) ?>" alt="<?= $e($lpAlt) ?>" width="404" height="900"
                <?= $lpI === $lpMid ? 'fetchpriority="high"' : 'loading="lazy"' ?> decoding="async" />
        </li>
        <?php endforeach; ?>
    </ul>
    */ ?>

    <!-- the reel: the phones stay pinned while the four numbers scroll up
         over them (like a film's credits). Each number lights up as it
         passes the middle of the screen and the phones dim behind it —
         landing-v2.js drives both from the scroll position. Without the
         script, or with reduced motion, it is simply phones then numbers. -->
    <div class="lp2-reel" data-lp2-reel>
        <div class="lp2-reel-pin">
            <!-- five finished phone mockups; --x is the place from the middle (-2 … 2),
                 --d the distance from it: the stacking order and entrance delay -->
            <ul class="lp2-apps">
                <?php foreach ($lpApps as $lpI => [$lpImg, $lpWidth, $lpHeight, $lpAlt]): ?>
                <li class="lp2-app" style="--pw:<?= (int) $lpWidth ?>;--x:<?= $lpI - $lpMid ?>;--d:<?= abs($lpI - $lpMid) ?>">
                    <img src="<?= $e(img_src($lpImg)) ?>" alt="<?= $e($lpAlt) ?>" width="<?= (int) $lpWidth ?>" height="<?= (int) $lpHeight ?>"
                        <?= $lpI === $lpMid ? 'fetchpriority="high"' : '' ?> decoding="async" />
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <ul class="lp2-reel-stats" aria-label="Media Clock in numbers">
            <?php foreach ($lp['v2_stats'] as [$lpNum, $lpSuffix, $lpLabel]): ?>
            <li class="lp2-reel-stat">
                <strong><span data-lp2-count="<?= $e($lpNum) ?>"><?= $e($lpNum) ?></span><em><?= $e($lpSuffix) ?></em></strong>
                <span><?= $e($lpLabel) ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php unset($lpNum, $lpSuffix, $lpLabel, $lpApps, $lpMid, $lpI, $lpImg, $lpWidth, $lpHeight, $lpAlt, $lpW, $lpWord); ?>
