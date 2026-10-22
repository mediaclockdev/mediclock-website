<?php
/* ============================================================
   * Quote popup — shared component
   An enquiry form in a popup, so a "talk to us" button opens the form where
   the visitor already is instead of scrolling them to the bottom of the page.
   The main-site counterpart of the ad pages' popup (includes/landing/modal.php).

   Include it once on a page, and add 'quote-modal' to $page_css.
   main.js then opens it from every .contactBtn and [data-quote-modal] on the
   page (header and footer buttons included), in place of the contact panel,
   so the page does not need includes/components/contact.php as well.
   A button's data-interest is sent with the enquiry.

     $quote_title    (string) default 'Tell us about your project'
     $quote_lead     (string) default 'We reply within one business day with next steps.'
     $quote_prompt   (string) message placeholder — default 'What would you like to build?'
     $quote_submit   (string) default 'Book a Free Consultation'

   Posts to send-contact.php as a normal website enquiry (form_type contact);
   validation is main.js's shared validator, like every other form.
   ============================================================ */
$quote_title  = $quote_title  ?? 'Tell us about your project';
$quote_lead   = $quote_lead   ?? 'We reply within one business day with next steps.';
$quote_prompt = $quote_prompt ?? 'What would you like to build?';
$quote_submit = $quote_submit ?? 'Book a Free Consultation';
$qmE = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
?>
<!-- * Quote popup (opened by main.js) -->
<div class="mc-modal" id="mcQuoteModal" role="dialog" aria-modal="true" aria-labelledby="mcQuoteTitle" aria-hidden="true">
    <div class="mc-modal-backdrop" data-quote-close></div>
    <div class="mc-modal-dialog">
        <div class="mc-modal-header">
            <div>
                <h2 class="mc-modal-title" id="mcQuoteTitle"><?= $qmE($quote_title) ?></h2>
                <p class="mc-modal-lead"><?= $qmE($quote_lead) ?></p>
            </div>
            <button type="button" class="mc-modal-close" data-quote-close aria-label="Close">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <path d="M18 6 6 18M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form id="mcQuoteForm" class="mc-modal-form" action="<?= $qmE(asset_url('send-contact.php')) ?>" method="POST" novalidate>
            <input type="hidden" name="form_type" value="contact" />
            <input type="hidden" name="interest" value="Free consultation" data-quote-interest />
            <input type="hidden" name="page_url" value="<?= $qmE($_SERVER['REQUEST_URI'] ?? '') ?>" />
            <!-- honeypot: hidden from people, filled in by bots; send-contact.php drops those -->
            <div class="mc-modal-hp" aria-hidden="true">
                <label for="mcQuoteHp">Leave this empty</label>
                <input type="text" id="mcQuoteHp" name="website_check" tabindex="-1" autocomplete="off" />
            </div>

            <div class="mc-modal-field">
                <label class="visually-hidden" for="mcQuoteName">Your name</label>
                <input type="text" id="mcQuoteName" name="name" placeholder="Your Name*" autocomplete="name" required />
            </div>
            <div class="mc-modal-row">
                <div class="mc-modal-field">
                    <label class="visually-hidden" for="mcQuotePhone">Phone number</label>
                    <input type="tel" id="mcQuotePhone" name="phone" placeholder="Phone Number*" autocomplete="tel" inputmode="tel" maxlength="16" required />
                </div>
                <div class="mc-modal-field">
                    <label class="visually-hidden" for="mcQuoteEmail">Email address</label>
                    <input type="email" id="mcQuoteEmail" name="email" placeholder="Email*" autocomplete="email" required />
                </div>
            </div>
            <div class="mc-modal-field">
                <label class="visually-hidden" for="mcQuoteMessage"><?= $qmE($quote_prompt) ?></label>
                <textarea id="mcQuoteMessage" name="message" rows="3" maxlength="180" placeholder="<?= $qmE($quote_prompt) ?>"></textarea>
            </div>

            <button type="submit" class="mc-modal-submit"><?= $qmE($quote_submit) ?></button>
            <p class="mc-modal-note">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="11" width="18" height="11" rx="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                </svg>
                <span>Your idea is protected by our Non-Disclosure Agreement (NDA).</span>
            </p>
        </form>
        <p class="mc-modal-success" id="mcQuoteSuccess" hidden>Thank you — we will be in touch shortly.</p>
    </div>
</div>
<?php unset($quote_title, $quote_lead, $quote_prompt, $quote_submit, $qmE); ?>
