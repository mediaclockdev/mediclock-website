<?php
$page_title       = 'iOS App Development Melbourne | Media Clock';
$page_description = 'iPhone and iPad app developers in Melbourne since 2017. We handle design, build and App Store submission, with an NDA upfront and full code ownership.';
$page_canonical   = 'https://mediaclock.com.au/ios-development/';
$page_css         = ['service', 'ios-development'];
include 'includes/layout/header.php';

/* Phone number — the same one the header, footer and every other page use */
$ios_tel      = mc_contact()['dialer']['tel'];
$ios_tel_text = mc_tel_text();

/* Tick icon shared by the checklists */
$ios_tick = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>';

// * Hero — the same proposal-card hero every other service page uses
$hero_title    = 'iOS App Development Melbourne';
$hero_sub      = 'Custom iPhone and iPad apps, from first idea to App Store.';
$hero_cta      = 'Schedule a call';
$hero_cta_href = 'tel:' . $ios_tel;
$hero_image    = 'pages/ios-development/hero.webp';
$hero_form     = true;
include 'includes/components/hero.php';

// * Happy Clients (dark band, white client cards)
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'dark';
$logos_items = require __DIR__ . '/data/shared/clients.php';
include 'includes/components/logo-slider.php';

// * iPhone app developers in Melbourne (intro band)
$intro_title = 'iPhone app developers in Melbourne';
$intro_text  = 'We’ve been building iPhone and iPad apps for Australian businesses since 2017. Some clients arrive with a detailed spec. Others have a sketch on a napkin. We’re happy to start from either. Before we talk details, we sign an NDA. We look after the tricky Apple parts too: developer accounts, App Store listings and getting through review. When it’s done, the code is yours.';
$intro_theme = 'light';
include 'includes/components/intro.php';

// * Apps we've built
// 'link' is optional: Visit Tasmania isn't listed on the App Store under that name and
// Times Table Tunes (id1670930764) now returns 404 — TODO add their URLs when confirmed.
$projects_id    = 'apps';
$projects_title = 'Apps we’ve built';
$projects_lead  = 'A few of the apps our team has designed, built and launched.';
$projects_theme  = 'dark';
$projects_layout = 'grid';
$projects_items = [
    [
        'title' => 'Visit Tasmania',
        'image' => 'pages/mobile-app-development/projects/visit-tasmania.webp',
        'w'     => 371,
        'h'     => 532,
        'alt'   => 'Visit Tasmania app screens',
        'copy'  => ['A travel guide that lets visitors build their own itinerary and find things to do around the state.'],
    ],
    [
        'title' => 'Times Table Tunes',
        'image' => 'pages/mobile-app-development/projects/times-table-tunes.webp',
        'w'     => 369,
        'h'     => 488,
        'alt'   => 'Times Table Tunes app screens',
        'copy'  => ['A learning app for primary, secondary and adult students. The original program was already popular with teachers and parents, so the app had to live up to it.'],
    ],
    [
        'title' => 'Star Calendar Calculator',
        'image' => 'pages/mobile-app-development/projects/star-calendar-calculator.webp',
        'w'     => 369,
        'h'     => 486,
        'alt'   => 'Star Calendar Calculator app screens',
        'copy'  => ['A specialised calendar tool that turns complex date calculations into something you can see at a glance.'],
    ],
];
include 'includes/components/projects.php';

// * iPhone and iPad app development services
$what_we_do_id    = 'ios-services';
$what_we_do_title = 'iPhone and iPad app development services';
$what_we_do_intro = 'New apps, second versions and fixes to apps someone else started. Here’s what we usually help with.';
$what_we_do_cta   = [];
$what_we_do_theme = 'light';
$what_we_do_layout = 'stacked';
$what_we_do_items = [
    [
        'icon'  => 'pages/ios-development/icons/svc-iphone.svg',
        'title' => 'iPhone apps',
        'text'  => 'Customer apps, booking apps and marketplaces that open fast, don’t crash, and feel like they belong on an iPhone. The app should look like your business, not a template.',
        'link'  => ['label' => 'See our UI/UX design work', 'href' => page_url('ui-ux-design')],
    ],
    [
        'icon'  => 'pages/ios-development/icons/svc-ipad.svg',
        'title' => 'iPad apps for field teams',
        'text'  => 'Bigger screens for inspections, reports and forms that people fill in on site. We can make them work offline and sync when the connection comes back.',
    ],
    [
        'icon'  => 'pages/ios-development/icons/svc-business.svg',
        'title' => 'Business and enterprise apps',
        'text'  => 'If you already have a CRM, booking system or backend, we connect the app to it. We can also set up different access levels for staff, managers and admins.',
        'link'  => ['label' => 'See our web application work', 'href' => page_url('web-application')],
    ],
    [
        'icon'  => 'pages/ios-development/icons/svc-app-store.svg',
        'title' => 'App Store publishing',
        'text'  => 'Apple’s review process catches a lot of first-time app owners out. We set up your Apple Developer account, prepare the listing and screenshots, and handle submission. If Apple sends it back, we deal with it.',
    ],
];
include 'includes/components/what-we-do.php';
?>

<!-- * Swift or React Native? -->
<section class="section band-dark ios-compare" id="swift-or-react-native" aria-labelledby="swift-or-react-native-title">
    <div class="container">
        <div class="head">
            <h2 id="swift-or-react-native-title">Swift or React Native?</h2>
            <p>Not every app needs to be built twice. On the first call we’ll recommend one and tell you why.</p>
        </div>
        <div class="row g-4">
            <?php foreach ([
                ['Swift', 'For iPhone and iPad only', 'svc-iphone', [
                    'Most of your customers use Apple devices',
                    'The app relies on Apple features like Face ID, Apple Pay or HealthKit',
                    'Performance matters more than launching on Android',
                ]],
                ['React Native', 'For iOS and Android', 'svc-business', [
                    'You need to reach both iPhone and Android users',
                    'You’d rather maintain one codebase than two',
                    'You want to launch sooner with a smaller budget',
                ]],
            ] as [$techName, $techFor, $techIcon, $techPoints]): ?>
            <div class="col-12 col-md-6">
                <article class="ios-tech h-100">
                    <h3 class="ios-tech-title"><?= $e($techName) ?></h3>
                    <p class="ios-tech-for"><?= $e($techFor) ?></p>
                    <ul class="ios-checks">
                        <?php foreach ($techPoints as $point): ?>
                        <li><span class="ios-check"><?= $ios_tick ?></span><?= $e($point) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
// * How we build your app (numbered steps in the shared feature slider)
$feature_slider_id       = 'process';
$feature_slider_title    = 'How we build your app';
$feature_slider_lead     = 'You’ll know what’s happening at every stage, and you’ll see the app long before it goes live.';
$feature_slider_link     = ['label' => 'More on our process', 'href' => page_url('our-process')];
$feature_slider_theme    = 'light';
$feature_slider_per_view = [3, 2, 1];
$feature_slider_autoplay = 0;
$feature_slider_items    = [
    ['number' => '01', 'title' => 'Discovery and scoping', 'text' => 'We work out who the app is for, what it needs to do, and what can wait for version two.'],
    ['number' => '02', 'title' => 'Wireframes', 'text' => 'You click through the layout of every screen before any code is written.'],
    ['number' => '03', 'title' => 'Design', 'text' => 'We turn the wireframes into screens that look and feel like your brand.'],
    ['number' => '04', 'title' => 'Development', 'text' => 'We build in stages and send you test builds so you can try the app on your own phone.'],
    ['number' => '05', 'title' => 'Testing', 'text' => 'We test on real iPhones and iPads, old and new, not just the simulator.'],
    ['number' => '06', 'title' => 'Launch and support', 'text' => 'We submit to the App Store and stay on hand for fixes and updates after launch.'],
];
include 'includes/components/feature-slider.php';

// * Industries we work with (shared service strip, heading shown)
$service_strip_id            = 'industries';
$service_strip_title         = 'Industries we work with';
$service_strip_title_visible = true;
$service_strip_theme         = 'dark';
$service_strip_cols          = 4;
$service_strip_lead          = 'If yours isn’t listed, get in touch anyway. Most of what makes a good app carries across industries.';
$service_strip_items         = [
    ['icon' => 'pages/ios-development/icons/ind-healthcare.svg', 'label' => 'Healthcare and wellness'],
    ['icon' => 'pages/ios-development/icons/ind-property.svg', 'label' => 'Real estate and property inspections'],
    ['icon' => 'pages/ios-development/icons/ind-ecommerce.svg', 'label' => 'eCommerce and retail'],
    ['icon' => 'pages/ios-development/icons/ind-bookings.svg', 'label' => 'Bookings and appointments'],
    ['icon' => 'pages/ios-development/icons/ind-marketplace.svg', 'label' => 'Online marketplaces'],
    ['icon' => 'pages/ios-development/icons/ind-travel.svg', 'label' => 'Tourism and travel'],
    ['icon' => 'pages/ios-development/icons/ind-education.svg', 'label' => 'Education'],
];
include 'includes/components/service-strip.php';

// * What an iOS app costs
$ios_plans = [
    [
        'name'     => 'Launch app',
        'from'     => 'Starting from',
        'price'    => '$8,000',
        'for'      => 'For testing an idea with real users before you invest more.',
        'features' => ['iPhone app', 'Up to 8 core screens', 'User login', 'Push notifications', 'App Store submission', '1 month of support after launch'],
        'time'     => 'Usually 6 to 8 weeks',
    ],
    [
        'name'     => 'Full product',
        'from'     => 'Starting from',
        'price'    => '$15,000',
        'for'      => 'For businesses ready to launch on iPhone and Android together.',
        'features' => ['iOS and Android from one codebase', 'Custom UI/UX design', 'Payments', 'Analytics', 'API integrations', 'Admin tools', '3 months of support after launch'],
        'time'     => 'Usually 10 to 14 weeks',
        'featured' => true,
    ],
    [
        'name'     => 'Enterprise',
        'from'     => 'Priced per project',
        'price'    => 'Custom quote',
        'for'      => 'For apps that connect to several business systems or have strict security needs.',
        'features' => ['Integrations with CRM, ERP or legacy systems', 'Staff roles and access levels', 'Security requirements planned in from the start'],
        'time'     => 'Planned individually',
    ],
];
?>

<!-- * What an iOS app costs -->
<section class="section band-light ios-pricing" id="pricing" aria-labelledby="pricing-title">
    <div class="container">
        <div class="head">
            <h2 id="pricing-title">What an iOS app costs</h2>
            <p>These are starting points. Your final quote comes after scoping, once we know exactly what the app needs to do.</p>
        </div>
        <div class="row g-4">
            <?php foreach ($ios_plans as $plan): ?>
            <div class="col-12 col-lg-4">
                <article class="ios-plan h-100<?= !empty($plan['featured']) ? ' ios-plan--featured' : '' ?>">
                    <h3 class="ios-plan-name"><?= $e($plan['name']) ?></h3>
                    <p class="ios-plan-price"><span><?= $e($plan['from']) ?></span><?= $e($plan['price']) ?></p>
                    <p class="ios-plan-for"><?= $e($plan['for']) ?></p>
                    <ul class="ios-checks">
                        <?php foreach ($plan['features'] as $feature): ?>
                        <li><span class="ios-check"><?= $ios_tick ?></span><?= $e($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="ios-plan-time"><?= $e($plan['time']) ?></p>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
        <p class="ios-pricing-note">The first call is free. If it makes sense to go further, we run a paid scoping stage that maps out every screen and feature, and your quote is based on that.</p>
    </div>
</section>

<?php
// * Final call to action (shared contact section, shown open)
$contact_visible      = true;
$contact_eyebrow      = '';
$contact_title        = 'Book A Free Consultation';
$contact_lead         = 'Tell us about it. On a free 30-minute call we’ll talk through what you want to build and whether iPhone, Android or both makes sense. We’ll also give you an honest idea of what it involves.';
$contact_details      = [
    ['type' => 'phone', 'text' => $ios_tel_text, 'href' => 'tel:' . $ios_tel],
    ['type' => 'email', 'text' => 'info@mediaclock.com.au', 'href' => 'mailto:info@mediaclock.com.au'],
    ['type' => 'address', 'text' => '392 A St Kilda Rd, St Kilda VIC 3182', 'href' => 'https://maps.google.com/maps?q=' . rawurlencode('Media Clock, 392 A St Kilda Rd, St Kilda VIC 3182')],
];
include 'includes/components/contact.php';

// * Questions we get asked
$faq_id      = 'faqs';
$faq_eyebrow = '';
$faq_title   = 'FAQ';
$faq_items   = [
    [
        'question' => 'How much does an iOS app cost?',
        'answer'   => 'It depends on what the app needs to do. Smaller launch apps start from $8,000 and full products from $15,000. The first call is free. After that we run a paid scoping stage that maps out every screen and feature, and your quote is based on that.',
        'open'     => true,
    ],
    [
        'question' => 'How long does it take to build an iPhone app?',
        'answer'   => 'A smaller launch app usually takes 6 to 8 weeks. A full product usually takes 10 to 14 weeks. Larger business systems are planned individually.',
    ],
    [
        'question' => 'Should I build in Swift or React Native?',
        'answer'   => 'If you only need iPhone and iPad, or your app leans heavily on Apple hardware, Swift is often the better choice. If you need Android as well, React Native lets us build both from one codebase, which usually saves time and money. We recommend one on the first call and explain why.',
    ],
    [
        'question' => 'Can you connect the app to my existing system?',
        'answer'   => 'Yes. If you already have a backend, CRM, booking system or API, we connect the app to it.',
    ],
    [
        'question' => 'Is my app idea safe with you?',
        'answer'   => 'Yes. We sign a Non-Disclosure Agreement before we discuss the details of your project.',
    ],
    [
        'question' => 'Who owns the code?',
        'answer'   => 'You do. Once the project is finished and paid for, the app and all source code belong to you.',
    ],
    [
        'question' => 'Do you handle App Store submission?',
        'answer'   => 'Yes. We set up or manage your Apple Developer account, prepare the listing and handle submission. If Apple sends the app back, we deal with it.',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
