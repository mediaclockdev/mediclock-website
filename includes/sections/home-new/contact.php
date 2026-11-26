<?php
/* * Homepage (new) — "Start a conversation": copy + enquiry form
   Posts to send-contact.php as a normal website enquiry (form_type contact),
   the same handler every other form uses; assets/js/home-new.js sends it in
   the background and opens the thank-you page on success. Without JS the
   form still posts and the handler redirects to the thank-you page itself. */
?>
<section class="hn-cta hn-dark" id="contact" aria-labelledby="hn-cta-title">
    <div class="hn-shell hn-cta-grid">
        <div class="hn-cta-copy hn-reveal">
            <span class="hn-eyebrow">Start a conversation</span>
            <h2 id="hn-cta-title">Have an idea worth <span class="hn-accent">building?</span></h2>
            <p>Share the problem, opportunity or rough concept. We will help make the next step clearer, including feasibility, approach, timing and likely investment.</p>
            <div class="hn-contact-notes">
                <?php foreach ($hn['contact_notes'] as $hnI => $hnNote): ?>
                <span><b><?= str_pad((string) ($hnI + 1), 2, '0', STR_PAD_LEFT) ?></b><?= $e($hnNote) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <form class="hn-form hn-reveal hn-delay-1" id="hnContactForm" method="POST" action="<?= $e(asset_url('send-contact.php')) ?>">
            <input type="hidden" name="form_type" value="contact" />
            <input type="hidden" name="interest" value="Free consultation" />
            <div class="hn-field">
                <label for="hnName">First name</label>
                <input id="hnName" name="name" placeholder="Your name" autocomplete="given-name" required />
            </div>
            <div class="hn-field">
                <label for="hnEmail">Email address</label>
                <input id="hnEmail" name="email" type="email" placeholder="you@company.com" autocomplete="email" required />
            </div>
            <div class="hn-field">
                <label for="hnPhone">Contact number</label>
                <!-- the handler needs at least 8 digits; home-new.js checks that before sending -->
                <input id="hnPhone" name="phone" type="tel" placeholder="+61 412 345 678" autocomplete="tel" inputmode="tel"
                    maxlength="20" required />
            </div>
            <div class="hn-field">
                <label for="hnCompany">Company</label>
                <input id="hnCompany" name="company" placeholder="Company name" autocomplete="organization" />
            </div>
            <div class="hn-field hn-field-full">
                <label for="hnBrief">Tell us briefly about the project</label>
                <textarea id="hnBrief" name="message" maxlength="500" placeholder="What would you like to build or improve?" required></textarea>
            </div>
            <?php if (!empty($recaptcha_site_key)): ?>
            <div class="hn-field hn-field-full">
                <div class="g-recaptcha" data-sitekey="<?= $e($recaptcha_site_key) ?>"></div>
            </div>
            <?php if (empty($recaptcha_loaded)): $recaptcha_loaded = true; ?>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <?php endif; ?>
            <?php endif; ?>
            <button class="hn-btn" type="submit">Send project enquiry <span aria-hidden="true">↗</span></button>
            <div class="hn-form-status" role="status" aria-live="polite"></div>
        </form>
    </div>
</section>
<?php unset($hnI, $hnNote); ?>
