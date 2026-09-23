<?php
$page_title       = 'Careers – Media Clock';
$page_description = 'Join the Media Clock team in Melbourne. Current openings in design, video, business development and marketing.';
$page_canonical   = 'https://mediaclock.com.au/career/';
$page_css         = ['service', 'career'];
$page_js          = 'career';
include 'includes/layout/header.php';

/* * Open roles — one list, used by the vacancy cards and by the "Apply for
   position" picker in the form, so the two can never fall out of step.
   Grouped by area. Add or retire a role here and both places follow. */
$career_roles = [
    'Business Development Executive (IT)',
    'Business Development Manager (IT)',
    'UX/UI Designer',
    'Graphics Designer',
    'Senior Graphics Designer',
    'Video Editor',
    'Senior Video Editor',
    'Digital Marketing Manager',
];

// * Hero — no proposal card here: this page asks for applications, not projects
$hero_title    = 'Join Our Dynamic Team';
$hero_cta      = 'See open roles';
$hero_cta_href = '#vacancies';
$hero_image    = 'pages/our-process/hero.webp';
$hero_form     = false;
include 'includes/components/hero.php';

// * Why Media Clock? — heading, one paragraph and the five things we offer
$service_strip_id            = 'why-media-clock';
$service_strip_title         = 'Why Media Clock?';
$service_strip_title_visible = true;
$service_strip_theme         = 'dark';
$service_strip_lead          = 'Since 2017 we have built mobile apps, web apps and websites for businesses across Australia. We are a team of passionate and innovative people working towards the same goal. Whether you are a seasoned professional or a bright-eyed graduate, we offer an environment where you can learn, grow and thrive.';
$service_strip_cols          = 5;
$service_strip_items         = [
    ['icon' => 'pages/career/icons/learning.svg', 'label' => 'Unparalleled learning'],
    ['icon' => 'pages/career/icons/growth.svg', 'label' => 'Growth opportunities'],
    ['icon' => 'pages/career/icons/culture.svg', 'label' => 'Collaborative culture'],
    ['icon' => 'pages/career/icons/meaningful-work.svg', 'label' => 'Meaningful work'],
    ['icon' => 'pages/career/icons/compensation.svg', 'label' => 'Competitive compensation'],
];
include 'includes/components/service-strip.php';
?>

<!-- * Job vacancies -->
<section class="section band-light vacancies" id="vacancies" aria-labelledby="vacancies-title">
    <div class="container">
        <div class="head">
            <h2 id="vacancies-title">Job vacancies</h2>
            <p>Nothing here that fits? Send us your CV anyway — we will keep it on file.</p>
        </div>
        <ul class="vacancy-grid list-unstyled mb-0">
            <?php foreach ($career_roles as $crRole): ?>
            <li>
                <article class="vacancy">
                    <h3 class="vacancy-title"><?= $e($crRole) ?></h3>
                    <!-- career.js preselects the role; without it the link still reaches the form -->
                    <a class="vacancy-apply" href="#apply" data-role="<?= $e($crRole) ?>">Apply Now<span
                            class="visually-hidden"> for <?= $e($crRole) ?></span> <span aria-hidden="true">&rarr;</span></a>
                </article>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<!-- * Apply — the shared consultation-form styling (.contact--form), with a CV upload -->
<section class="contact contact--form contact--static careers-apply" id="apply" aria-labelledby="apply-title">
    <div class="container">
        <div class="row g-4 g-lg-5">

            <div class="contact-copy col-12 col-lg-6">
                <div class="eyebrow">Apply Now</div>
                <h2 id="apply-title">Send us your application</h2>
                <p>Tell us which role you are after and attach your CV. We read every application and reply to the ones we can help.</p>
                <h3 class="contact-points-title">What happens next?</h3>
                <ul class="contact-points">
                    <li>We review your CV against the role.</li>
                    <li>A short call to talk through your experience.</li>
                    <li>A practical task or portfolio review, then an interview with the team.</li>
                </ul>
            </div>

            <div class="form col-12 col-lg-6">
                <form id="applyForm" novalidate>
                    <div class="row gx-4 gy-5">
                        <div class="field col-12 col-sm-6">
                            <label for="aFirst">First Name <span class="req" aria-hidden="true">*</span></label>
                            <input id="aFirst" name="first_name" required placeholder="Your First Name"
                                autocomplete="given-name" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="aEmail">Email Address <span class="req" aria-hidden="true">*</span></label>
                            <input id="aEmail" name="email" type="email" required placeholder="Your Email Address"
                                autocomplete="email" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="aPhone">Phone Number <span class="req" aria-hidden="true">*</span></label>
                            <div class="phone-field">
                                <span class="phone-prefix" id="aPhonePrefix"><svg viewBox="0 0 20 10" width="20"
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
                                <input id="aPhone" name="phone" type="tel" required placeholder="412 345 678"
                                    inputmode="tel" maxlength="16" data-phone="au" autocomplete="tel-national"
                                    aria-describedby="aPhonePrefix" />
                            </div>
                            <input type="hidden" name="phone_country" value="+61" />
                        </div>
                        <div class="field col-12 col-sm-6">
                            <label for="aPosition">Apply for position <span class="req" aria-hidden="true">*</span></label>
                            <select id="aPosition" name="position" required data-empty="Please select the role you are applying for.">
                                <option value="" disabled selected>Select a role</option>
                                <?php foreach ($career_roles as $crRole): ?>
                                <option><?= $e($crRole) ?></option>
                                <?php endforeach; ?>
                                <option>Something else</option>
                            </select>
                        </div>
                        <div class="field col-12">
                            <label for="aResume">Upload your CV <span class="req" aria-hidden="true">*</span></label>
                            <!-- accept filters the picker; main.js enforces the type and
                                 the size, which data-max-mb sets -->
                            <input id="aResume" name="resume" type="file" required accept=".pdf,.doc,.docx"
                                data-empty="Please attach your CV." data-max-mb="5" aria-describedby="aResumeHint" />
                            <small class="field-hint" id="aResumeHint">PDF or Word, up to 5MB.</small>
                        </div>
                        <div class="field col-12">
                            <div class="field-head">
                                <label for="aMessage">Tell us about yourself <span class="req" aria-hidden="true">*</span></label>
                                <span class="field-count" id="aMessageCount">0 / 180</span>
                            </div>
                            <textarea id="aMessage" name="message" maxlength="180" required
                                data-empty="Please tell us a little about yourself."
                                data-counter="aMessageCount" aria-describedby="aMessageCount"></textarea>
                        </div>
                    </div>
                    <p class="form-privacy">Your application is handled in line with our <a
                            href="<?= $e(page_url('privacy-policy')) ?>">Privacy Policy</a>.</p>
                    <?php if (!empty($recaptcha_site_key)): ?>
                    <div class="form-captcha">
                        <div class="g-recaptcha" data-sitekey="<?= $e($recaptcha_site_key) ?>"></div>
                    </div>
                    <?php if (empty($recaptcha_loaded)): $recaptcha_loaded = true; ?>
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <?php endif; ?>
                    <?php endif; ?>
                    <button class="form-submit" type="submit">Submit</button>
                </form>
                <div class="success" id="applySuccess" role="status">
                    <h3>Thank you.</h3>
                    <p>Your application has been received. We will be in touch if it is a match.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
unset($career_roles, $crRole);

// * Contact panel (hidden until a .contactBtn opens it; the header and footer buttons need it)
include 'includes/components/contact.php';

include 'includes/layout/footer.php';
