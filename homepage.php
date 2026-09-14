<?php
$page_title       = 'Best Mobile App & Website Development service in Australia';
$page_description = 'Media Clock scopes, designs and develops mobile apps, web apps, websites and bespoke software for Australian businesses. Book a free consultation.';
$page_css         = 'home';
$page_js          = 'home';
include 'includes/layout/header.php';

// * Hero : three rotating slides (one-off, homepage only)
include 'includes/sections/home/hero.php';

// * Happy Clients
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'dark';
$logos_items = require __DIR__ . '/data/shared/clients.php';
include 'includes/components/logo-slider.php';

// * Intro band
$intro_text = 'Established in 2017, we have designed 100s of mobile apps and website design.';
include 'includes/components/intro.php';

// * One-off sections (includes/sections/home/)
include 'includes/sections/home/services.php';
include 'includes/sections/home/journey.php';

// * Why choose us
$why_us_items = [
    [
        'title' => 'Expertise & innovation',
        'text'  => 'Our team combines technical proficiency with creative thinking to deliver exceptional solutions.',
        'icon'  => 'home/why/1.svg',
        'image' => 'home/why/expertise.webp',
        'back'  => 'home/why/expertise-back.webp',
    ],
    [
        'title' => 'Cost effective solution',
        'text'  => 'Get top-notch software development services with us without breaking the bank.',
        'icon'  => 'home/why/2.svg',
        'image' => 'home/why/cost-effective.webp',
        'back'  => 'home/why/cost-effective-back.webp',
    ],
    [
        'title' => 'Customised approaches',
        'text'  => 'We tailor our services to meet your unique business needs and project goals.',
        'icon'  => 'home/why/3.svg',
        'image' => 'home/why/customised.webp',
        'back'  => 'home/why/customised-back.webp',
    ],
];
$why_us_autoplay = 0;
$why_us_per_view = [3, 3, 3]; // one page at every width: no dots, no swiping (stacks below 992px in home.css)
include 'includes/components/why-us.php';

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

// * Our Partners
$logos_id    = 'partners';
$logos_title = 'Our Partners';
$logos_theme = 'light';
$logos_items = [
    ['src' => 'partners/01.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/02.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/03.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/04.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/05.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/06.webp', 'alt' => 'Partner logo'],
];
include 'includes/components/logo-slider.php';

include 'includes/layout/footer.php';
