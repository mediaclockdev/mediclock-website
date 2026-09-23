<?php
/* ============================================================
   * Contact section — shared component
   Every page needs exactly one: the menu, footer, hero and package
   buttons all open it through .contactBtn (main.js). Without it on the
   page, those buttons do nothing.

     $contact_visible      (bool)   true  = always-visible "Book A Free Consultation" section
                                    false = the same section, hidden until any .contactBtn
                                            opens it, plus a Website field and the
                                            "Interested In" picker — default false
                                    Both render one form: 2x2 fields, AU phone prefix,
                                    requirements with a character count, NDA line,
                                    reCAPTCHA and a full-width submit.
     $contact_eyebrow      (string) default 'Get In Touch'   ('' hides it)
     $contact_title        (string) default 'Book A Free Consultation'
     $contact_lead         (string) default ''
     $contact_points_title (string) heading over the bullet list — default 'Why?'
     $contact_points       (array)  bullet list — default []
     $contact_note         (string) orange highlight line — default ''
     $contact_details      (array)  phone / email / address rows under the copy, optional:
                                    [ ['type' => 'phone'|'email'|'address', 'text' => '…', 'href' => '…'], … ]
     $contact_privacy      (string) small print — default: the NDA line
     $contact_budget       (bool)   "Project Budget" range picker (one required) — default false
     $contact_interests    (array)  hidden-panel variant only: "Interested In" options. Include every
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
$contact_details      = $contact_details      ?? [];
$contact_budget       = $contact_budget       ?? false;
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
<section class="contact contact--form<?= $contact_visible ? ' contact--static' : '' ?>" id="contact"
    <?= $contact_visible ? '' : 'aria-hidden="true"' ?> aria-labelledby="contact-title">
    <div class="container">
        <div class="row g-4 g-lg-5">

            <!-- * Contact : copy -->
            <div class="contact-copy col-12 col-lg-6">
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
                <?php if ($contact_details): ?>
                <ul class="contact-details">
                    <?php foreach ($contact_details as $csDetail):
                        $csIcon = [
                            'phone'   => '<path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.3 0 .7-.2 1l-2.3 2.2z" fill="currentColor" stroke="none"/>',
                            'email'   => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3.5 6 8.5 7 8.5-7"/>',
                            'address' => '<path d="M12 21s-6.5-6-6.5-11a6.5 6.5 0 0 1 13 0c0 5-6.5 11-6.5 11z"/><circle cx="12" cy="10" r="2.3"/>',
                        ][$csDetail['type'] ?? 'address'] ?? '';
                        $csInner = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $csIcon . '</svg><span>' . $h($csDetail['text']) . '</span>';
                    ?>
                    <li><?php if (!empty($csDetail['href'])): ?><a href="<?= $h($csDetail['href']) ?>"><?= $csInner ?></a><?php else: ?><?= $csInner ?><?php endif; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if ($contact_note !== ''): ?><p class="contact-note"><?= $h($contact_note) ?></p><?php endif; ?>
            </div>

            <!-- * Contact : form -->
            <div class="form col-12 col-lg-6">
                <form id="form" novalidate>
                    <!-- * Contact : one form for both variants — the panel adds
                         Website and "Interested In", everything else matches -->
                    <?php if ($contact_visible): ?>
                    <input type="hidden" id="interest" name="interest" value="Free consultation" />
                    <?php endif; ?>
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
                                <input id="cPhone" name="phone" type="tel" required placeholder="412 345 678" inputmode="tel" maxlength="16" data-phone="au"
                                    autocomplete="tel-national" aria-describedby="cPhonePrefix" />
                            </div>
                            <input type="hidden" name="phone_country" value="+61" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="cCompany">Company Name <?= $csReq ?></label>
                            <input id="cCompany" name="company" required placeholder="Your Company Name"
                                autocomplete="organization" />
                        </div>
                        <?php if (!$contact_visible): ?>
                        <div class="field col-12 col-sm-6">
                            <label for="cSite">Website</label>
                            <input id="cSite" name="website" type="text" inputmode="url" autocomplete="url"
                                placeholder="https://yourwebsite.com.au" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="interest">Interested In</label>
                            <select id="interest" name="interest">
                                <?php foreach ($contact_interests as $csOption): ?>
                                <option><?= $h($csOption) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php endif; ?>
                        <?php if ($contact_budget): ?>
                        <!-- * Contact : project budget — pick a range (radio pills, one required) -->
                        <fieldset class="field field-budget col-12">
                            <legend>Project Budget (AUD) <?= $csReq ?></legend>
                            <div class="budget-options">
                                <?php foreach (['Under $5k', '$5k – $15k', '$15k – $30k', '$30k – $60k', '$60k – $100k', '$100k+', 'Not sure yet'] as $csBi => $csBudget): ?>
                                <label class="budget-option">
                                    <input type="radio" name="budget" value="<?= $h($csBudget) ?>"<?= $csBi === 0 ? ' required' : '' ?> />
                                    <span><?= $h($csBudget) ?></span>
                                </label>
                                <?php endforeach; ?>
                            </div>
                        </fieldset>
                        <?php endif; ?>
                        <div class="field col-12">
                            <!-- * Contact : label left, character count right (wraps on narrow screens) -->
                            <div class="field-head">
                                <label for="cMessage">Write your requirements in brief here... <?= $csReq ?></label>
                                <span class="field-count" id="cMessageCount">0 / 180</span>
                            </div>
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
                </form>
                <div class="success" id="success" role="status">
                    <h3>Thank you.</h3>
                    <p>Your consultation request has been received.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<?php unset($contact_visible, $contact_eyebrow, $contact_title, $contact_lead, $contact_points_title, $contact_details, $csDetail, $csIcon, $csInner,
    $contact_points, $contact_note, $contact_privacy, $contact_budget, $contact_interests, $csGroup, $csLabel, $csPoint,
    $csOption, $csReq, $csBi, $csBudget); ?>
