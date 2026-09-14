<?php
$page_title       = 'Get In Touch – Media Clock';
$page_description = 'Contact Media Clock: call 0489 906 090, email info@mediaclock.com.au, or book a free consultation with our Melbourne, Sydney, Brisbane or Hobart team.';
$page_css         = ['service', 'contact-us'];
$page_js          = 'contact-us';
include 'includes/layout/header.php';

// * Hero : no proposal card on this page, the consultation form is below
$hero_title    = "Let's Connect and Grow";
$hero_sub      = 'Start Your Journey Here';
$hero_cta      = 'Schedule a Meeting';
$hero_cta_href = 'tel:0489906090';
$hero_image    = 'pages/contact-us/hero.webp';
$hero_form     = false;
include 'includes/components/hero.php';

// * Offices — the first one's map shows on load
$offices = [
    ['392 A St Kilda Road,', 'St Kilda, VIC 3182', 'Media Clock, 392 A St Kilda Rd, St Kilda VIC 3182'],
    ['70/3 Reid Avenue Westmead,', 'NSW 2145', '70/3 Reid Avenue, Westmead NSW 2145'],
    ['8 Archer St, Upper Mount', 'Gravatt, QLD 4122', '8 Archer St, Upper Mount Gravatt QLD 4122'],
    ['Level 1, 111 Macquarie St,', 'Hobart, TAS 7000', 'Level 1, 111 Macquarie Street, Hobart TAS 7000'],
];
$map = fn($q) => 'https://maps.google.com/maps?q=' . rawurlencode($q) . '&t=m&z=15&output=embed&iwloc=near';
?>
<!-- * Contact : phone + email -->
<section class="contact-direct band-light" aria-label="Call or email us">
    <div class="container">
        <div class="contact-direct-card">
            <a href="tel:0489906090"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.3 0 .7-.2 1l-2.3 2.2z" />
                </svg>0489 906 090</a>
            <a href="mailto:info@mediaclock.com.au"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <rect x="3" y="5" width="18" height="14" rx="2" />
                    <path d="M3 7l9 6 9-6" />
                </svg>info@mediaclock.com.au</a>
        </div>
    </div>
</section>
<?php
// * Book A Free Consultation (contact section, shown open, with the budget slider)
$contact_visible = true;
$contact_eyebrow = '';
$contact_title   = 'Book A Free Consultation';
$contact_budget  = true;
$contact_points  = [
    'Check if the project is technically feasible.',
    'To understand needs, desire and problems to solve.',
    'Plan technology, timeline, & costs.',
];
include 'includes/components/contact.php';
?>
<!-- * Offices : map + address tabs (assets/js/contact-us.js swaps the map) -->
<section class="section offices band-light" id="offices" aria-labelledby="offices-title">
    <div class="container">
        <h2 id="offices-title" class="visually-hidden">Our offices</h2>
        <iframe class="offices-map" id="officeMap" src="<?= $e($map($offices[0][2])) ?>"
            title="Map: <?= $e($offices[0][2]) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="offices-tabs">
            <?php foreach ($offices as $i => [$line1, $line2, $query]): ?>
            <button type="button" class="offices-tab" data-map="<?= $e($map($query)) ?>" data-title="Map: <?= $e($query) ?>"
                aria-controls="officeMap" aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>">
                <?= $e($line1) ?><br /><?= $e($line2) ?>
            </button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- * Subscribe To Our Blog -->
<section class="section subscribe band-light" aria-labelledby="subscribe-title">
    <div class="container">
        <h2 id="subscribe-title">Subscribe To Our Blog</h2>
        <p>Stay updated with latest technology trends.</p>
        <form class="subscribe-form" id="subscribeForm" novalidate>
            <label for="subEmail" class="visually-hidden">Email address</label>
            <input id="subEmail" name="email" type="email" required placeholder="Enter your Email here" autocomplete="email" />
            <button type="submit">Subscribe</button>
        </form>
        <p class="subscribe-success" id="subscribeSuccess" role="status" hidden>Thanks for subscribing.</p>
    </div>
</section>
<?php
unset($offices, $map, $i, $line1, $line2, $query);

include 'includes/layout/footer.php';
