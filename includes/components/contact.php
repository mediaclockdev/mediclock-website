<?php
/* ============================================================
   * Contact section — shared component
   Every page needs exactly one: the header, footer, hero and the
   "GET A QUOTE" tab all open it through .contactBtn (main.js). Without
   it on the page, those buttons do nothing.

     $contact_visible      (bool)   true  = always-visible section (e.g. the service
                                            pages' "Book A Free Consultation")
                                    false = hidden panel that opens when any
                                            .contactBtn is clicked — default false
     $contact_eyebrow      (string) default 'Get In Touch'   ('' hides it)
     $contact_title        (string) default 'Book A Free Consultation'
     $contact_lead         (string) default ''
     $contact_points_title (string) heading over the bullet list — default 'Why?'
     $contact_points       (array)  bullet list — default []
     $contact_note         (string) orange highlight line — default ''
     $contact_privacy      (string) small print — default: the NDA line
     $contact_interests    (array)  "Interested In" options. Include every
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
?>
<!-- * Contact section -->
<section class="contact<?= $contact_visible ? ' contact--static' : '' ?>" id="contact"
    <?= $contact_visible ? '' : 'aria-hidden="true"' ?> aria-labelledby="contact-title">
    <div class="container contactgrid row g-4">

        <!-- * Contact : copy -->
        <div class="col-12 col-lg-5">
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
            <?php if ($contact_privacy !== ''): ?><p class="contact-privacy"><?= $h($contact_privacy) ?></p><?php endif; ?>
        </div>

        <!-- * Contact : form -->
        <div class="form col-12 col-lg-7">
            <form id="form" novalidate>
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
            </form>
            <div class="success" id="success" role="status">
                <h3>Thank you.</h3>
                <p>Your consultation request has been received.</p>
            </div>
        </div>

    </div>
</section>
<?php unset($contact_visible, $contact_eyebrow, $contact_title, $contact_lead, $contact_points_title,
    $contact_points, $contact_note, $contact_privacy, $contact_interests, $csGroup, $csLabel, $csPoint,
    $csOption); ?>
