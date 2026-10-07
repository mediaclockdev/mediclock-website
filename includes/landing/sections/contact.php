<?php
/* * Landing : closing call to action and the quote form.
   The form carries id="lp-quote" — the same id it had in the hero — so the
   sticky button and every [data-lp-scroll-to] CTA on the page still reach it.

   novalidate hands validation to the shared validator in main.js: the same
   rules, messages and input-time filtering every other form on the site uses. */
$lpC = mc_contact();
?>
<section class="lp-contact">
    <div class="lp-container lp-contact-grid">

        <div class="lp-contact-copy">
            <h2>
                <?= $e($lp['cta_title_before']) ?>
                <span><?= $e($lp['cta_title_accent']) ?></span>
            </h2>
            <p class="lp-contact-lead"><?= $e($lp['cta_lead']) ?></p>
            <a class="lp-contact-phone" href="<?= $e(mc_tel()) ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" aria-hidden="true">
                    <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8.1 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.8 2z"></path>
                </svg>
                <?= $e(mc_tel_text()) ?>
            </a>
            <?php if (!empty($lp['cta_address'])): ?>
            <a class="lp-contact-address" href="https://maps.google.com/maps?q=<?= rawurlencode($lp['cta_address']) ?>" target="_blank" rel="noopener noreferrer">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span><?= $e($lp['cta_address']) ?></span>
            </a>
            <?php endif; ?>
        </div>

        <div class="lp-form-card" id="lp-quote">
            <h2><?= $e($lp['form_title']) ?></h2>
            <p class="lp-form-lead"><?= $e($lp['form_lead']) ?></p>
            <form id="lpQuoteForm" action="<?= $e(asset_url('send-contact.php')) ?>" method="POST" novalidate>
                <input type="hidden" name="form_type" value="landing" />
                <label class="visually-hidden" for="lpName">Your name</label>
                <input type="text" id="lpName" name="lp_name" placeholder="Your Name*" autocomplete="name" required />

                <div class="lp-form-row">
                    <div>
                        <label class="visually-hidden" for="lpPhone">Phone number</label>
                        <input type="tel" id="lpPhone" name="lp_phone" placeholder="Phone Number*" autocomplete="tel"
                            required />
                    </div>
                    <div>
                        <label class="visually-hidden" for="lpEmail">Email address</label>
                        <input type="email" id="lpEmail" name="lp_email" placeholder="Email*" autocomplete="email"
                            required />
                    </div>
                </div>

                <label class="visually-hidden" for="lpMessage">Your app idea</label>
                <textarea id="lpMessage" name="lp_message" rows="3" maxlength="180" placeholder="What’s your app idea?"></textarea>

                <!-- which city page the lead came from, so an enquiry can be
                     traced back to the campaign that paid for it -->
                <input type="hidden" name="lp_source" value="<?= $e($lp['city']) ?>" />

                <button type="submit" class="lp-btn lp-btn-dark lp-btn-block"><?= $e($lp['form_submit']) ?></button>
                <p class="lp-form-note"><?= $e($lp['form_note']) ?></p>
            </form>
            <p class="lp-form-success" id="lpQuoteSuccess" hidden>Thank you — we will be in touch shortly.</p>
        </div>

    </div>
</section>
