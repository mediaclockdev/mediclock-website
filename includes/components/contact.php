<?php
/* ============================================================
   * Contact section — shared component
   Every page needs exactly one: the header, footer, hero and the
   "GET A QUOTE" tab all open it through .contactBtn (main.js). Without
   it on the page, those buttons do nothing.

     $contact_visible      (bool)   true  = always-visible section in the live service-page
                                            layout ("Book A Free Consultation": 2x2 fields,
                                            message, NDA line, reCAPTCHA, full-width submit)
                                    false = hidden panel (white form card) that opens when
                                            any .contactBtn is clicked — default false
     $contact_eyebrow      (string) default 'Get In Touch'   ('' hides it)
     $contact_title        (string) default 'Book A Free Consultation'
     $contact_lead         (string) default ''
     $contact_points_title (string) heading over the bullet list — default 'Why?'
     $contact_points       (array)  bullet list — default []
     $contact_note         (string) orange highlight line — default ''
     $contact_privacy      (string) small print — default: the NDA line
     $contact_interests    (array)  panel only: "Interested In" options. Include every
                                    data-interest value used on the page, or that
                                    button can't preselect its option. Default:
                                    'Free consultation' + every service.
   ============================================================ */
$contact_visible      = $contact_visible      ?? false;
$contact_eyebrow      = $contact_eyebrow      ?? 'Get In Touch';
$contact_title        = $contact_title        ?? 'Book A Free Consultation';
$contact_lead         = $contact_lead         ?? '';
$contact_points_title = $contact_points_title ?? 'Why?';
$contact_points       = $contact_points       ?? [];
$contact_note         = $contact_note         ?? '';
$contact_privacy      = $contact_privacy      ?? 'We prioritise confidentiality and have a Non-Disclosure Agreement (NDA) in place to safeguard and protect your ideas.';
if (!isset($contact_interests)) {
    $contact_interests = ['Free consultation'];
    foreach (require dirname(__DIR__, 2) . '/data/shared/services.php' as $csGroup) {
        foreach ($csGroup as [$csLabel]) {
            $contact_interests[] = $csLabel;
        }
    }
}
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
$csReq = '<span class="req" aria-hidden="true">*</span>';
?>
<!-- * Contact section -->
<section class="contact<?= $contact_visible ? ' contact--static' : '' ?>" id="contact"
    <?= $contact_visible ? '' : 'aria-hidden="true"' ?> aria-labelledby="contact-title">
    <div class="container">
        <div class="row g-4 g-lg-5">

            <!-- * Contact : copy -->
            <div class="contact-copy col-12 col-lg-<?= $contact_visible ? 6 : 5 ?>">
                <?php if ($contact_eyebrow !== ''): ?><div class="eyebrow"><?= $h($contact_eyebrow) ?></div><?php endif; ?>
                <h2 id="contact-title"><?= $h($contact_title) ?></h2>
                <?php if ($contact_lead !== ''): ?><p><?= $h($contact_lead) ?></p><?php endif; ?>
                <?php if ($contact_points): ?>
                <h3 class="contact-points-title"><?= $h($contact_points_title) ?></h3>
                <ul class="contact-points">
                    <?php foreach ($contact_points as $csPoint): ?>
                    <li><?= $h($csPoint) ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if ($contact_note !== ''): ?><p class="contact-note"><?= $h($contact_note) ?></p><?php endif; ?>
                <?php if (!$contact_visible && $contact_privacy !== ''): ?><p class="contact-privacy"><?= $h($contact_privacy) ?></p><?php endif; ?>
            </div>

            <!-- * Contact : form -->
            <div class="form col-12 col-lg-<?= $contact_visible ? 6 : 7 ?>">
                <form id="form" novalidate>
                <?php if ($contact_visible): ?>
                    <!-- * Contact : service-page form -->
                    <input type="hidden" id="interest" name="interest" value="Free consultation" />
                    <div class="row gx-4 gy-5">
                        <div class="field col-12 col-sm-6">
                            <label for="cFirst">First Name <?= $csReq ?></label>
                            <input id="cFirst" name="first_name" required placeholder="Your First Name"
                                autocomplete="given-name" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="cEmail">Email Address <?= $csReq ?></label>
                            <input id="cEmail" name="email" type="email" required placeholder="Your Email Address"
                                autocomplete="email" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="cPhone">Contact No <?= $csReq ?></label>
                            <div class="phone-field">
                                <span class="phone-prefix" id="cPhonePrefix"><svg viewBox="0 0 20 10" width="20"
                                        height="10" aria-hidden="true">
                                        <rect width="20" height="10" fill="#012169" />
                                        <path d="M0 0l10 5M10 0L0 5" stroke="#fff" stroke-width="1.2" />
                                        <path d="M0 0l10 5M10 0L0 5" stroke="#e4002b" stroke-width=".5" />
                                        <path d="M5 0v5M0 2.5h10" stroke="#fff" stroke-width="1.6" />
                                        <path d="M5 0v5M0 2.5h10" stroke="#e4002b" stroke-width=".9" />
                                        <g fill="#fff">
                                            <circle cx="5" cy="7.6" r=".9" />
                                            <circle cx="15" cy="2" r=".5" />
                                            <circle cx="13.2" cy="4.6" r=".5" />
                                            <circle cx="16.8" cy="4" r=".5" />
                                            <circle cx="16" cy="5.9" r=".3" />
                                            <circle cx="15" cy="8.3" r=".6" />
                                        </g>
                                    </svg><span class="visually-hidden">Australia</span> +61</span>
                                <input id="cPhone" name="phone" type="tel" required placeholder="412 345 678"
                                    autocomplete="tel-national" aria-describedby="cPhonePrefix" />
                            </div>
                            <input type="hidden" name="phone_country" value="+61" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="cCompany">Company Name <?= $csReq ?></label>
                            <input id="cCompany" name="company" required placeholder="Your Company Name"
                                autocomplete="organization" />
                        </div>
                        <div class="field col-12">
                            <label for="cMessage">Write your requirements in brief here... <?= $csReq ?></label>
                            <span class="field-count" id="cMessageCount">0 / 180</span>
                            <textarea id="cMessage" name="message" maxlength="180" required
                                data-counter="cMessageCount" aria-describedby="cMessageCount"></textarea>
                        </div>
                    </div>
                    <?php if ($contact_privacy !== ''): ?><p class="form-privacy"><?= $h($contact_privacy) ?></p><?php endif; ?>
                    <?php if (!empty($recaptcha_site_key)): ?>
                    <div class="form-captcha">
                        <div class="g-recaptcha" data-sitekey="<?= $h($recaptcha_site_key) ?>"></div>
                    </div>
                    <?php if (empty($recaptcha_loaded)): $recaptcha_loaded = true; ?>
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <?php endif; ?>
                    <?php endif; ?>
                    <button class="form-submit" type="submit">Submit</button>
                <?php else: ?>
                    <!-- * Contact : panel form -->
                    <div class="formgrid row g-2">
                        <div class="field col-12 col-sm-6">
                            <label for="cFirst">First Name *</label>
                            <input id="cFirst" name="first_name" required placeholder="Your first name"
                                autocomplete="given-name" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="cCompany">Company Name *</label>
                            <input id="cCompany" name="company" required placeholder="Company name"
                                autocomplete="organization" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="cEmail">Email Address *</label>
                            <input id="cEmail" name="email" type="email" required placeholder="name@company.com.au"
                                autocomplete="email" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="cPhone">Contact No *</label>
                            <input id="cPhone" name="phone" type="tel" required placeholder="Contact number"
                                autocomplete="tel" />
                        </div>
                        <div class="field col-12">
                            <label for="cSite">Website</label>
                            <input id="cSite" name="website" type="url" placeholder="https://yourwebsite.com.au" />
                        </div>
                        <div class="field col-12">
                            <label for="interest">Interested In</label>
                            <select id="interest" name="interest">
                                <?php foreach ($contact_interests as $csOption): ?>
                                <option><?= $h($csOption) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="field col-12">
                            <label for="cMessage">Requirements *</label>
                            <textarea id="cMessage" name="message" maxlength="180" required
                                placeholder="Tell us briefly what you want to improve."></textarea>
                        </div>
                    </div>
                    <div class="formnote">Maximum 180 characters for requirements.</div>
                    <div class="formactions">
                        <button class="btn primary" type="submit">Submit</button>
                    </div>
                <?php endif; ?>
                </form>
                <div class="success" id="success" role="status">
                    <h3>Thank you.</h3>
                    <p>Your consultation request has been received.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<?php unset($contact_visible, $contact_eyebrow, $contact_title, $contact_lead, $contact_points_title,
    $contact_points, $contact_note, $contact_privacy, $contact_interests, $csGroup, $csLabel, $csPoint,
    $csOption, $csReq); ?>
