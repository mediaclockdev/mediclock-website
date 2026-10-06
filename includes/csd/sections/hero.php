<?php
/* * CSD : hero — headline, proof points, the video stage, and the quick form
   band that overlaps the bottom of the hero. The form sits here on purpose:
   paid traffic converts on the first screen or not at all. */
$csdVideo  = dirname(__DIR__, 3) . '/assets/images/csd/hero-video.mp4';
$csdPoster = dirname(__DIR__, 3) . '/assets/images/csd/hero-poster.jpg';
?>
<section class="csd-hero">
    <span class="csd-orb csd-orb-1" aria-hidden="true"></span>
    <span class="csd-orb csd-orb-2" aria-hidden="true"></span>
    <div class="csd-wrap csd-hero-grid">

        <div class="csd-hero-copy">
            <span class="csd-eyebrow"><?= $e($csd['hero_eyebrow']) ?></span>
            <h1>
                <?= $e($csd['hero_title_before']) ?>
                <!-- csd.js types the words through this span, reading them from
                     data-csd-words so data/csd/common.php stays the only place the
                     list is written. With JS off the first word simply stays put and
                     the sentence still reads.

                     Before it starts typing, csd.js measures every word and pins the
                     span to the widest, so the headline keeps the same line breaks
                     from the first letter to the last. Without that the h1 flips
                     between three and four lines as each word types and erases, and
                     every section below it slides up and down for the whole visit.
                     The measuring is done in JS rather than with hidden copies of the
                     words in the markup, so nothing extra lands in the heading for
                     copy-and-paste or a crawler to pick up. -->
                <span class="csd-rotator" data-csd-words="<?= $e(implode('|', $csd['hero_rotate'])) ?>"><span
                        id="csdRotWord"><?= $e($csd['hero_rotate'][0]) ?></span><span class="csd-caret"
                        aria-hidden="true"></span></span>
                <?= $e($csd['hero_title_after']) ?>
            </h1>
            <p class="csd-hero-sub"><?= $e($csd['hero_sub']) ?></p>
            <ul class="csd-ticks">
                <?php foreach ($csd['hero_points'] as $csdPoint): ?>
                <li><?= $e($csdPoint) ?></li>
                <?php endforeach; ?>
            </ul>
            <div class="csd-hero-ctas">
                <a href="#csd-enquire" class="csd-btn" data-csd-scroll-to="#csd-enquire">
                    <?= $e($csd['hero_cta']) ?> <span class="csd-arr" aria-hidden="true">&rarr;</span>
                </a>
                <a href="<?= $e(mc_tel()) ?>" class="csd-btn csd-btn-outline">Call <?= $e(mc_tel_text()) ?></a>
            </div>
        </div>

        <div class="csd-stage">
            <div class="csd-video-frame" id="csdVideoFrame">
                <span class="csd-live"><i aria-hidden="true"></i>LIVE DEMO</span>
                <?php if (is_file($csdVideo)): ?>
                <video autoplay muted loop playsinline preload="metadata"
                    <?= is_file($csdPoster) ? 'poster="' . $e(img_src('csd/hero-poster.jpg')) . '"' : '' ?>
                    aria-label="<?= $e($csd['hero_video_label']) ?>">
                    <source src="<?= $e(img_src('csd/hero-video.mp4')) ?>" type="video/mp4" />
                </video>
                <?php else: ?>
                <img src="<?= $e(img_src('csd/hero-poster.jpg')) ?>" alt="<?= $e($csd['hero_video_label']) ?>"
                    width="1280" height="720" />
                <?php endif; ?>
            </div>
            <?php foreach ($csd['hero_badges'] as $csdI => [$csdGlyph, $csdColour, $csdBadgeTitle, $csdBadgeSub]): ?>
            <div class="csd-badge csd-badge-<?= $csdI + 1 ?>">
                <span class="csd-badge-ic" style="background:<?= $e($csdColour) ?>"
                    aria-hidden="true"><?= $e($csdGlyph) ?></span>
                <div><?= $e($csdBadgeTitle) ?><small><?= $e($csdBadgeSub) ?></small></div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- * CSD : quick form. It overlaps the bottom of the hero, the way the
     design has it. novalidate hands validation to the shared validator in
     main.js — the same rules, messages and input-time filtering every other
     form on the site uses. -->
<div class="csd-qf-wrap" id="csd-enquire">
    <div class="csd-wrap">
        <div class="csd-qf">
            <div class="csd-qf-head">
                <h2><?= $e($csd['form_title']) ?></h2>
                <p><?= $e($csd['form_lead']) ?></p>
            </div>
            <form id="csdQuoteForm" novalidate>
                <div>
                    <label for="csdName">Name*</label>
                    <input id="csdName" name="csd_name" type="text" autocomplete="name" placeholder="Name*" required />
                </div>
                <div>
                    <label for="csdEmail">Email*</label>
                    <input id="csdEmail" name="csd_email" type="email" autocomplete="email" placeholder="Email*" required />
                </div>
                <div>
                    <label for="csdPhone">Phone*</label>
                    <input id="csdPhone" name="csd_phone" type="tel" autocomplete="tel" placeholder="04XX XXX XXX"
                        required />
                </div>
                <div>
                    <label for="csdType">What do you need?</label>
                    <select id="csdType" name="csd_type">
                        <?php foreach ($csd['form_options'] as $csdOpt): ?>
                        <option><?= $e($csdOpt) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- which city page the lead came from, so an enquiry can be
                     traced back to the campaign that paid for it -->
                <input type="hidden" name="csd_source" value="Custom software — <?= $e($csd['city']) ?>" />
                <button type="submit" class="csd-btn">
                    <?= $e($csd['form_submit']) ?> <span class="csd-arr" aria-hidden="true">&rarr;</span>
                </button>
            </form>
            <p class="csd-qf-note">&#128274; <?= $e($csd['form_note']) ?></p>
            <p class="csd-qf-success" id="csdQuoteSuccess" hidden>Thank you — we will be in touch shortly.</p>
        </div>
    </div>
</div>
<?php unset($csdVideo, $csdPoster, $csdPoint, $csdI, $csdGlyph, $csdColour, $csdBadgeTitle, $csdBadgeSub, $csdOpt); ?>
