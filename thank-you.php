<?php
/* ============================================================
   * Thank you — where every enquiry form lands after it is sent.
   A page of its own rather than an inline message, so the submission has a
   URL: that is what an analytics goal or an ad conversion is set against.

   ?form= picks the wording, because "your application" and "your enquiry"
   should not be the same sentence. An unknown or missing value falls back to
   the enquiry copy, so a stray link still reads correctly.
   ============================================================ */
$ty_kinds = [
    'enquiry' => [
        'lead'  => 'Your enquiry is with us. One of the team will read it properly and come back to you — usually within one business day.',
        'steps' => [
            'We read your enquiry and check we are the right fit.',
            'A short call to understand what you are trying to build.',
            'A written proposal with scope, timeline and a fixed price.',
        ],
    ],
    'proposal' => [
        'lead'  => 'Your proposal request is with us. We will look at what you need and come back with scope, timeline and cost — usually within one business day.',
        'steps' => [
            'We review your requirements and note anything we need to ask.',
            'A short call to fill in the gaps and agree the scope.',
            'A written proposal with timeline and a fixed price.',
        ],
    ],
    'application' => [
        'title' => 'Thank you for applying',
        'lead'  => 'Your application is with us. We read every one, and we will be in touch if it looks like a match.',
        'steps' => [
            'We review your CV against the role.',
            'A short call to talk through your experience.',
            'A practical task or portfolio review, then an interview with the team.',
        ],
    ],
];
$ty_key  = isset($_GET['form'], $ty_kinds[$_GET['form']]) ? $_GET['form'] : 'enquiry';
$ty      = $ty_kinds[$ty_key];
$ty_title = $ty['title'] ?? 'Thank you';

$page_title       = $ty_title . ' – Media Clock';
$page_description = 'We have received your message and will be in touch shortly.';
/* a confirmation page has no business in search results, and keeping it out
   stops it being counted as a landing page in analytics */
$page_robots      = 'noindex, follow';
$page_css         = ['service', 'thank-you'];
include 'includes/layout/header.php';
?>

<!-- * Thank you : confirmation -->
<section class="section ty-hero band-dark" aria-labelledby="ty-title">
    <div class="container">
        <span class="ty-tick" aria-hidden="true">
            <svg viewBox="0 0 52 52" width="52" height="52" fill="none" stroke="currentColor" stroke-width="4"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 27l8.5 8.5L38 19" />
            </svg>
        </span>
        <h1 id="ty-title"><?= $e($ty_title) ?></h1>
        <p class="ty-lead"><?= $e($ty['lead']) ?></p>

        <!-- * Thank you : for anyone who would rather not wait -->
        <div class="ty-direct">
            <p class="ty-direct-note">In a hurry? Call us and we will pick it up straight away.</p>
            <div class="ty-direct-links">
                <a href="<?= $e(mc_tel()) ?>"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.3 0 .7-.2 1l-2.3 2.2z" />
                    </svg><?= $e(mc_tel_text()) ?></a>
                <a class="is-secondary" href="<?= $e(mc_tel('mobile')) ?>"><?= $e(mc_tel_text('mobile')) ?></a>
                <a href="mailto:info@mediaclock.com.au"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" aria-hidden="true">
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <path d="M3 7l9 6 9-6" />
                    </svg>info@mediaclock.com.au</a>
            </div>
        </div>
    </div>
</section>

<!-- * Thank you : what happens next -->
<section class="section ty-next band-light" aria-labelledby="ty-next-title">
    <div class="container">
        <div class="head">
            <h2 id="ty-next-title">What happens next?</h2>
        </div>
        <ol class="ty-steps list-unstyled mb-0">
            <?php foreach ($ty['steps'] as $tyI => $tyStep): ?>
            <li class="ty-step">
                <span class="ty-step-num" aria-hidden="true"><?= $tyI + 1 ?></span>
                <p><?= $e($tyStep) ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- * Thank you : somewhere to go next, rather than a dead end -->
<section class="section ty-more band-dark" aria-labelledby="ty-more-title">
    <div class="container">
        <div class="head">
            <h2 id="ty-more-title">While you are here</h2>
        </div>
        <ul class="ty-links list-unstyled mb-0">
            <?php foreach ([
                ['portfolio',   'Our work',    'The Australian businesses and government clients we build for.'],
                ['our-process', 'How we work', 'Scoping, proof of concept and development, step by step.'],
                ['blog',        'Our writing', 'Notes on app costs, agencies and getting a build right.'],
            ] as [$tySlug, $tyLabel, $tyText]): ?>
            <li>
                <a class="ty-link" href="<?= $e(page_url($tySlug)) ?>">
                    <h3><?= $e($tyLabel) ?> <span aria-hidden="true">&rarr;</span></h3>
                    <p><?= $e($tyText) ?></p>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php
unset($ty_kinds, $ty, $ty_key, $ty_title, $tyI, $tyStep, $tySlug, $tyLabel, $tyText);
include 'includes/layout/footer.php';
