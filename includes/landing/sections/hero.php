<?php
/* * Landing : hero — headline, proof points, stats and the form.
   The form sits in the hero on purpose: paid traffic converts on the first
   screen or not at all, so it is visible without scrolling on a laptop. */
?>
<section class="lp-hero">
    <div class="lp-container lp-hero-grid">

        <div class="lp-hero-copy">
            <h1><?= $e($lp['hero_title']) ?></h1>
            <ul class="lp-hero-points">
                <?php foreach ($lp['hero_points'] as $lpPoint): ?>
                <li><?= $e($lpPoint) ?></li>
                <?php endforeach; ?>
            </ul>

            <ul class="lp-stats">
                <?php foreach ($lp['hero_stats'] as [$lpNum, $lpLabel, $lpIcon]): ?>
                <li class="lp-stat">
                    <img src="<?= $e(img_src($lpIcon)) ?>" alt="" width="171" height="171" loading="lazy" />
                    <strong><?= $e($lpNum) ?></strong>
                    <span><?= $e($lpLabel) ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- * Landing : quote form. novalidate hands validation to the shared
             validator in main.js — the same rules every other form on the site
             uses, including the input-time filtering on name, phone and email -->
        <div class="lp-form-card" id="lp-quote">
            <h2><?= $e($lp['form_title']) ?></h2>
            <p class="lp-form-lead"><?= $e($lp['form_lead']) ?></p>
            <form id="lpQuoteForm" novalidate>
                <label class="visually-hidden" for="lpName">Your name</label>
                <input type="text" id="lpName" name="lp_name" placeholder="Your Name*" autocomplete="name" required />

                <label class="visually-hidden" for="lpPhone">Phone number</label>
                <input type="tel" id="lpPhone" name="lp_phone" placeholder="Phone Number*" autocomplete="tel" required />

                <label class="visually-hidden" for="lpEmail">Email address</label>
                <input type="email" id="lpEmail" name="lp_email" placeholder="Email*" autocomplete="email" required />

                <label class="visually-hidden" for="lpMessage">Your app idea</label>
                <textarea id="lpMessage" name="lp_message" rows="3" placeholder="What’s your app idea?"></textarea>

                <!-- which city page the lead came from, so an enquiry can be
                     traced back to the campaign that paid for it -->
                <input type="hidden" name="lp_source" value="<?= $e($lp['city']) ?>" />

                <button type="submit" class="lp-btn lp-btn-primary lp-btn-block"><?= $e($lp['form_submit']) ?></button>
                <p class="lp-form-note"><?= $e($lp['form_note']) ?></p>
            </form>
            <p class="lp-form-success" id="lpQuoteSuccess" hidden>Thank you — we will be in touch shortly.</p>
        </div>

    </div>
</section>
<?php unset($lpPoint, $lpNum, $lpLabel, $lpIcon); ?>
