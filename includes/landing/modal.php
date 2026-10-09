<?php
/* ============================================================
   * Landing : Discovery Call Quote Modal Popup
   Opens when clicking "Book a Free Discovery Call" or other quote CTAs
   across the page, instead of scrolling down.
   ============================================================ */
?>
<div class="lp-modal" id="lpQuoteModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="lpModalTitle">
    <div class="lp-modal-backdrop" data-lp-close-modal tabindex="-1"></div>
    <div class="lp-modal-dialog">
        <div class="lp-modal-header">
            <div class="lp-modal-header-copy">
                <h2 id="lpModalTitle" class="lp-modal-title"><?= $e($lp['form_title']) ?></h2>
                <p class="lp-modal-lead"><?= $e($lp['form_lead']) ?></p>
            </div>
            <button type="button" class="lp-modal-close" data-lp-close-modal aria-label="Close modal">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <div class="lp-modal-body">
            <form id="lpModalQuoteForm" action="<?= $e(asset_url('send-contact.php')) ?>" method="POST" novalidate>
                <input type="hidden" name="form_type" value="landing" />

                <div class="lp-form-group">
                    <label class="visually-hidden" for="lpModalName">Your name</label>
                    <input type="text" id="lpModalName" name="lp_name" placeholder="Your Name*" autocomplete="name" required />
                </div>

                <div class="lp-modal-row">
                    <div class="lp-form-group">
                        <label class="visually-hidden" for="lpModalPhone">Phone number</label>
                        <input type="tel" id="lpModalPhone" name="lp_phone" placeholder="Phone Number*" autocomplete="tel" required />
                    </div>
                    <div class="lp-form-group">
                        <label class="visually-hidden" for="lpModalEmail">Email address</label>
                        <input type="email" id="lpModalEmail" name="lp_email" placeholder="Email*" autocomplete="email" required />
                    </div>
                </div>

                <div class="lp-form-group">
                    <label class="visually-hidden" for="lpModalMessage">Your app idea</label>
                    <textarea id="lpModalMessage" name="lp_message" rows="3" maxlength="180" placeholder="What’s your app idea?"></textarea>
                </div>

                <input type="hidden" name="lp_source" value="<?= $e($lp['city']) ?>" />
                <input type="hidden" name="service" value="Mobile App Development" />
                <input type="hidden" name="page_url" value="<?= $e($_SERVER['REQUEST_URI'] ?? '') ?>" />

                <button type="submit" class="lp-btn lp-btn-dark lp-btn-block lp-modal-submit"><?= $e($lp['form_submit']) ?></button>

                <p class="lp-modal-note">
                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <span><?= $e($lp['form_note']) ?></span>
                </p>
            </form>
            <p class="lp-form-success" id="lpModalQuoteSuccess" hidden>Thank you — we will be in touch shortly.</p>
        </div>
    </div>
</div>
