<?php
$page_title       = 'Mobile App Development – Media Clock';
$page_description = 'Need a custom mobile app? Our expert team delivers top-tier mobile app development services, eCommerce & custom solutions near you. Get an instant quote today!';
$page_css         = 'service';
include 'includes/layout/header.php';

// * Hero
$hero_title = 'Custom Mobile App Developers';
$hero_sub   = 'Business Automation or Concept Development';
$hero_cta   = '';
$hero_image = 'pages/mobile-app-development/hero.webp';
$hero_form  = true;
include 'includes/components/hero.php';

// * Happy Clients
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'dark';
$logos_items = require __DIR__ . '/data/shared/clients.php';
include 'includes/components/logo-slider.php';

// * Services strip
$service_strip_title = 'Mobile app development services';
$service_strip_items = [
    ['icon' => 'pages/mobile-app-development/icons/app-ios.svg', 'label' => 'iOS App Development'],
    ['icon' => 'pages/mobile-app-development/icons/app-android.svg', 'label' => 'Android App Development'],
    ['icon' => 'pages/mobile-app-development/icons/app-hybrid.svg', 'label' => 'Hybrid App Development'],
    ['icon' => 'pages/mobile-app-development/icons/app-business.svg', 'label' => 'Business App Development'],
    ['icon' => 'pages/mobile-app-development/icons/app-support.svg', 'label' => 'App Support & Maintenance'],
];
include 'includes/components/service-strip.php';

// * Intro band
$intro_text = 'Established in 2017, we have designed 100s of mobile apps and websites.';
$intro_bold = true;
include 'includes/components/intro.php';

// * Recent Projects
$projects_title = 'Recent Projects';
$projects_items = [
    [
        'title' => 'Times Table Tunes',
        'image' => 'pages/mobile-app-development/projects/times-table-tunes.webp',
        'w'     => 369,
        'h'     => 488,
        'alt'   => 'Times Table Tunes app screens',
        'copy'  => [
            'Sheridan House Australia Pty Ltd is a Melbourne-based company that produces educational and training resources. Its Directors have backgrounds in television and film production, and primary teaching. Its products have been acclaimed in Australia and internationally.',
            'The times table tunes App is the latest in its range of innovative and successful resources for primary, secondary, tertiary and mature-age students. The times table tunes were hugely popular with teachers and parents when first released on CD.',
        ],
        'stats' => ['Downloads' => '500', 'Ratings' => '4.5/5'],
    ],
    [
        'title' => 'Visit Tasmania',
        'image' => 'pages/mobile-app-development/projects/visit-tasmania.webp',
        'w'     => 371,
        'h'     => 532,
        'alt'   => 'Visit Tasmania app screens',
        'copy'  => [
            'AWDW Solutions is a Tasmanian family business dedicated to helping small businesses establish a digital presence. With a focus on supporting local enterprises, AWDW Solutions collaborated with Media Clock to create impactful digital solutions. Media Clock has developed three innovative apps for them: Visit Tasmania, Whiskey Wines & Food, & MTB Mountain Trail.',
            'Visit Tasmania app, is an ultimate pocket travel guide, designed to help craft your dream trip to Tasmania with personalised itineraries. Uncovers hidden gems beyond the usual tourist trail, explore dramatic coastlines, encounter iconic wildlife like penguins and wallabies, and delves into Tasmania’s rich history.',
        ],
        'stats' => ['Downloads' => '48k', 'Ratings' => '4.3/5'],
    ],
    [
        'title' => 'Star Calendar Calculator',
        'image' => 'pages/mobile-app-development/projects/star-calendar-calculator.webp',
        'w'     => 369,
        'h'     => 486,
        'alt'   => 'Star Calendar Calculator app screens',
        'copy'  => [
            'The Star Calendar Calculator offers a unique system with 364 & 360-day calendars. It uses a special clock to track time units and dials to visualise the calendar’s relation to seasons, weeks, and the zodiac. The 364-day calendar has 13 28-day months, while the 360-day one has 12 30-day months with different week structures.',
            'Both are compared to the Gregorian calendar for reference. The zodiac dial even corrects zodiac signs based on the actual star positions.',
        ],
        'stats' => ['Downloads' => '100+', 'Ratings' => '4.3/5'],
    ],
];
include 'includes/components/projects.php';

// * Roadmap
$roadmap_title = 'Mobile App Development Roadmap';
$roadmap_image = 'pages/mobile-app-development/roadmap.webp';
$roadmap_w     = 1024;
$roadmap_h     = 932;
$roadmap_alt   = 'Mobile app development roadmap';
include 'includes/components/roadmap.php';

// * Tech stack
$logos_id            = 'tech';
$logos_title         = 'Technologies We Use';
$logos_theme         = 'light';
$logos_items         = require __DIR__ . '/data/shared/tech-stack.php';
include 'includes/components/logo-slider.php';

// * Testimonials
$testimonials_title         = 'What our clients say';
$testimonials_title_visible = false;
include 'includes/components/testimonials.php';

// * Book A Free Consultation (contact section, shown open)
$contact_visible = true;
$contact_eyebrow = '';
$contact_title   = 'Book A Free Consultation';
$contact_points  = [
    'Check if the project is technically feasible.',
    'To understand needs, desire and problems to solve.',
    'Plan technology, timeline, & costs.',
];
include 'includes/components/contact.php';

// * FAQ
$faq_id      = 'faqs';
$faq_eyebrow = '';
$faq_title   = 'FAQ';
$faq_items   = [
    [
        'question' => 'Is my app idea safe and secure with you?',
        'answer'   => 'Yes, we have a Non-Disclosure Agreement (NDA) in place to ensure your ideas are completely safe and secure with us.',
        'open'     => true,
    ],
    [
        'question' => 'What will be the cost of developing mobile app Android or iOS?',
        'answer'   => 'The cost varies depending on your project. Let’s have an initial meeting to understand your needs, and then we can provide you with a cost estimate for the app.',
    ],
    [
        'question' => 'How many hours does it take to develop an app?',
        'answer'   => 'The time needed varies from project to project and depends on how detailed you want to go.',
    ],
    [
        'question' => 'Will you provide documentation for my solution or mobile app development? Do I own the code?',
        'answer'   => 'Yes, you’ll have full copyright and ownership of the app. We start with a Scope of Work documentation to clarify the features and functionalities.',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
