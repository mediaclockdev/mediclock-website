<?php
/* ============================================================
   * Service hero — shared component
   Every service page uses the same hero. Set the variables below
   BEFORE including this file, then:  include 'includes/components/hero.php';

     $hero_title    (string, required)  big heading
     $hero_sub      (string)            second line, slightly smaller
     $hero_eyebrow  (string)            small orange label above the title
     $hero_cta      (string)            button label  — default "Let's Start"; '' hides it
     $hero_cta_href (string)            link target; omit to open the contact panel
     $hero_image    (string)            background file in assets/images/
     $hero_stats    (array)             [ ['40–150','Target keywords'], ... ]
     $hero_form     (bool)              show the "Request For Proposal" card

   Anything not set falls back to a sensible default, so a minimal page is:
     $hero_title = 'Website Development'; include 'includes/components/hero.php';
   ============================================================ */
$hero_title    = $hero_title    ?? '';
$hero_sub      = $hero_sub      ?? '';
$hero_eyebrow  = $hero_eyebrow  ?? '';
$hero_cta      = $hero_cta      ?? "Let's Start";
$hero_cta_href = $hero_cta_href ?? '';
$hero_image    = $hero_image    ?? 'hero-service.png';
$hero_stats    = $hero_stats    ?? [];
$hero_form     = $hero_form     ?? true;
$h = fn($s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
?>
<!-- * Service hero -->
<section class="service-hero" style="background-image:url('<?= $h(img_src($hero_image)) ?>')">
    <div class="container service-hero-inner">
        <div class="row align-items-center g-4">

            <!-- * Service hero : copy -->
            <div class="col-12 col-lg-8 service-hero-copy">
                <?php if ($hero_eyebrow): ?>
                <div class="eyebrow"><?= $h($hero_eyebrow) ?></div>
                <?php endif; ?>

                <?php if ($hero_title !== ''): /* '' = the page puts its h1 elsewhere */ ?>
                <h1 class="service-hero-title"><?= $h($hero_title) ?></h1>
                <?php endif; ?>

                <?php if ($hero_sub): ?>
                <p class="service-hero-sub"><?= $h($hero_sub) ?></p>
                <?php endif; ?>

                <?php if ($hero_cta === ''): /* CTA switched off for this page */ ?>
                <?php elseif ($hero_cta_href): ?>
                <a class="service-hero-cta" href="<?= $h($hero_cta_href) ?>"><?= $h($hero_cta) ?> <span
                        aria-hidden="true">&rarr;</span></a>
                <?php else: ?>
                <button type="button" class="service-hero-cta contactBtn" data-interest="Free consultation">
                    <?= $h($hero_cta) ?> <span aria-hidden="true">&rarr;</span>
                </button>
                <?php endif; ?>

                <?php if ($hero_stats): ?>
                <div class="service-hero-stats">
                    <?php foreach ($hero_stats as $s): ?>
                    <div><strong><?= $h($s[0]) ?></strong><span><?= $h($s[1]) ?></span></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <?php if ($hero_form): ?>
            <!-- * Service hero : Request For Proposal card -->
            <div class="col-12 col-lg-4 rfp-card">
                <h2 class="rfp-title">Request For Proposal</h2>
                <form class="rfp-form d-flex flex-column" id="rfpForm" novalidate>
                    <input type="text" name="rfp_name" placeholder="Your Name" autocomplete="name" required />
                    <input type="tel" name="rfp_phone" placeholder="Phone number" autocomplete="tel" required />
                    <input type="email" name="rfp_email" placeholder="Email" autocomplete="email" required />
                    <select name="rfp_service" required>
                        <option value="" disabled selected>Select your Service</option>
                        <?php foreach (($hero_services ?? require dirname(__DIR__, 2) . '/data/shared/services.php') as $group => $items): ?>
                    <optgroup label="<?= $h($group) ?>">
                        <?php foreach ($items as [$label, $url]): ?>
                        <option value="<?= $h($label) ?>"><?= $h($label) ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                    <?php endforeach; ?>
                    </select>
                    <textarea name="rfp_message" placeholder="Write the requirements in brief here.."
                        required></textarea>

                    <p class="rfp-nda">
                        We prioritise confidentiality and secure your ideas with a
                        Non-Disclosure Agreement(NDA)
                    </p>

                    <?php if (!empty($recaptcha_site_key)): ?>
                    <!-- reCAPTCHA renders only once a site key is set (see includes/layout/header.php) -->
                    <div class="g-recaptcha" data-sitekey="<?= $h($recaptcha_site_key) ?>"></div>
                    <?php if (empty($recaptcha_loaded)): $recaptcha_loaded = true; ?><script src="https://www.google.com/recaptcha/api.js" async defer></script><?php endif; ?>
                    <?php endif; ?>

                    <button type="submit" class="rfp-submit">Send</button>
                </form>
                <div class="rfp-success" id="rfpSuccess" role="status" hidden>
                    <h3>Thanks — request received.</h3>
                    <p>We'll be in touch within one business day.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php unset($hero_title, $hero_sub, $hero_eyebrow, $hero_cta, $hero_cta_href, $hero_image, $hero_stats, $hero_form); ?>
