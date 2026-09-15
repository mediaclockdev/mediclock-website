<?php
$page_title       = 'Digital Marketing – Media Clock';
$page_description = ''; // the live page has no meta description
$page_css         = ['service', 'digital-marketing'];
include 'includes/layout/header.php';

// * Hero
$hero_title    = 'Digital Marketing Agency';
$hero_sub      = 'Get quality leads, Make more sales';
$hero_cta      = 'Let’s Start';
$hero_cta_href = 'tel:0489906090';
$hero_image    = 'pages/digital-marketing/hero.webp';
$hero_form     = true;
include 'includes/components/hero.php';

// * Service tiles (dark band, heading kept for screen readers)
$logos_id            = 'services';
$logos_title         = 'Digital marketing services';
$logos_title_visible = false;
$logos_theme         = 'dark';
$logos_items         = require __DIR__ . '/data/shared/marketing-services.php';
include 'includes/components/logo-slider.php';

// * Intro band
$intro_lead  = 'Media Clock:';
$intro_text  = 'Dedicated to solving your digital marketing challenges with personalised account managers, brand reputation expertise, and results-driven strategies, working closely with you on strategic planning and content creation.';
$intro_theme = 'light';
include 'includes/components/intro.php';

// * What we do
$what_we_do_title = 'What we do?';
$what_we_do_intro = 'We don’t believe in one-size-fits-all approaches. Our team of seasoned digital strategists understands your unique business goals, audience demographics and market dynamics to craft bespoke strategies that deliver tangible results.';
$what_we_do_cta   = ['label' => 'Let’s Discuss', 'href' => 'tel:0489906090'];
$what_we_do_items = [
    [
        'icon'  => 'pages/digital-marketing/icons/what-organic-marketing.svg',
        'title' => 'Organic Marketing',
        'text'  => 'Grow your online presence naturally with tailored content that speaks directly to your audience.',
    ],
    [
        'icon'  => 'pages/digital-marketing/icons/what-paid-ads.svg',
        'title' => 'Paid Ad Campaigns',
        'text'  => 'Get results fast with targeted ads that grab attention and drive clicks, maximising your ROI.',
    ],
    [
        'icon'  => 'pages/digital-marketing/icons/what-social-media.svg',
        'title' => 'Social Media Engagement',
        'text'  => 'Connect with your audience, building a community that loves and shares your brand.',
    ],
    [
        'icon'  => 'pages/digital-marketing/icons/what-seo.svg',
        'title' => 'Search Engine Optimisation',
        'text'  => 'Get found first with top-notch optimisation that boosts your search rankings.',
    ],
];
include 'includes/components/what-we-do.php';

// * Happy Clients (light band, dark client cards)
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'light';
$logos_items = require __DIR__ . '/data/shared/clients-dark.php';
include 'includes/components/logo-slider.php';

// * Why choose us
$why_us_title = 'Why choose us?';
$why_us_items = [
    [
        'title' => 'Tailored Solutions',
        'text'  => 'Our targeted campaigns and innovative strategies drive engagement and boost online visibility. Comprehensive analytics ensure continuous improvement and measurable results.',
        'icon'  => 'pages/digital-marketing/icons/why-tailored-solutions.svg',
        'image' => 'pages/digital-marketing/why/tailored-solutions.webp',
        'back'  => 'pages/digital-marketing/why/tailored-solutions-back.webp',
    ],
    [
        'title' => 'Transparent Reporting',
        'text'  => 'Integration with trusted payment processors to ensure safe and smooth transactions. Gain peace of mind with our clear and transparent reporting.',
        'icon'  => 'pages/digital-marketing/icons/why-transparent-reporting.svg',
        'image' => 'pages/digital-marketing/why/transparent-reporting.webp',
        'back'  => 'pages/digital-marketing/why/transparent-reporting-back.webp',
    ],
    [
        'title' => 'Experienced Team',
        'text'  => 'Our team of digital marketing professionals brings years of experience and industry knowledge to the table. We’re passionate about what we do and dedicated to your success.',
        'icon'  => 'pages/digital-marketing/icons/why-experienced-team.svg',
        'image' => 'pages/digital-marketing/why/experienced-team.webp',
        'back'  => 'pages/digital-marketing/why/experienced-team-back.webp',
    ],
    [
        'title'       => 'Full-Service Digital Marketing',
        'front_title' => 'Full Fledge Digital Marketing',
        'text'        => 'From SEO to social media management, content creation to PPC campaigns, we cover it all. Our holistic approach ensures that all aspects of your digital presence work together seamlessly to maximise your ROI.',
        'icon'        => 'pages/digital-marketing/icons/why-full-service.svg',
        'image'       => 'pages/digital-marketing/why/full-service-digital-marketing.webp',
        'back'        => 'pages/business-digitisation/why/card-back.webp',
    ],
    [
        'title' => 'Results-Driven Strategies',
        'text'  => 'Our team of experts uses data-driven insights to craft strategies that deliver measurable results. We don’t just set goals; we achieve. Unlock your brand’s full potential with our data-driven approach.',
        'icon'  => 'pages/digital-marketing/icons/why-results-driven.svg',
        'image' => 'pages/digital-marketing/why/results-driven-strategies.webp',
        'back'  => 'pages/digital-marketing/why/results-driven-strategies-back.webp',
    ],
];
include 'includes/components/why-us.php';

// * Testimonials
$testimonials_title         = 'What our clients say';
$testimonials_title_visible = false;
include 'includes/components/testimonials.php';

// * Book a free consultation (contact section, shown open)
$contact_visible = true;
$contact_eyebrow = '';
$contact_title   = 'Book a free consultation';
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
        'question' => 'What digital marketing services do you offer?',
        'answer'   => 'We offer Google My Business, PPC advertising, social media marketing, content marketing, email marketing, and more to enhance your online presence and achieve measurable results.',
        'open'     => true,
    ],
    [
        'question' => 'Do you offer customised digital marketing plans?',
        'answer'   => 'Yes, we create customised digital marketing plans tailored to your business goals, target audience, and budget for optimal results.',
    ],
    [
        'question' => 'How can digital marketing benefit my business?',
        'answer'   => 'Digital marketing increases brand awareness, drives targeted traffic, generates leads, and boosts sales by reaching a larger audience and engaging potential customers.',
    ],
    [
        'question' => 'How do you measure the success of digital marketing campaigns?',
        'answer'   => 'We measure success using KPIs like website traffic, conversion rates, click-through rates, engagement metrics, and ROI, providing regular reports on progress and performance.',
    ],
    [
        'question' => 'How long does it take to see results from digital marketing efforts?',
        'answer'   => 'SEO efforts typically take a few months, while PPC campaigns can yield quicker results; consistent optimisation is essential for long-term success.',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
