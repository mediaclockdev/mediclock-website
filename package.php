<?php
$page_title       = 'SEO Packages Australia | Basic, Standard, Pro & Premium | Media Clock';
$page_description = 'Compare Media Clock SEO packages for Australian businesses, including technical SEO, local SEO, content, off-page optimisation, social optimisation and reporting.';
$page_css         = 'package';
include 'includes/layout/header.php';

// * Hero
$hero_title    = 'SEO packages Australia: built around what your website actually needs.';
$hero_sub      = 'Basic to Custom, built for Australian businesses.';
$hero_cta      = 'Explore SEO Packages';
$hero_cta_href = '#packages';
$hero_image    = 'hero-service.png';
$hero_form     = true;
include 'includes/components/hero.php';

// * Our Clients
$logos_id      = 'trusted';
$logos_eyebrow = 'Our Clients';
$logos_title   = 'Trusted by Australian businesses';
$logos_lead    = 'Most agencies hand you a report. As an Australian SEO agency that also builds websites, we can go and make the fixes ourselves — which is the bit that usually stalls.';
$logos_theme   = 'light';
$logos_items   = require __DIR__ . '/data/shared/package-logos.php'; // SEO client logos (assets/images/pages/package/logos/)
include 'includes/components/logo-slider.php';

// * One-off sections (includes/sections/package/)
include 'includes/sections/package/services.php';
include 'includes/sections/package/packages.php';
include 'includes/sections/package/process.php';
// include 'includes/sections/package/results.php'; // * Case studies — hidden for now (re-enable once real case studies exist)
include 'includes/sections/package/why.php';
include 'includes/sections/package/locations.php';

// * Testimonials (Client Feedback) — hidden for now; remove the // to bring it back
// $testimonials_eyebrow = 'Client Feedback';
// $testimonials_title   = 'What our clients say';
// $testimonials_lead    = 'Three honest reviews beat a promise about page one by Friday. Where we can, these are the same clients featured in the results above.';
// $testimonials_theme   = 'dark';
// include 'includes/components/testimonials.php';

// * Book A Free Consultation (contact section, shown open — same as the service pages)
//   Package buttons (.contactBtn) fill the hidden "interest" field and scroll here.
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
$faq_eyebrow = 'FAQs';
$faq_title   = 'SEO FAQs';
$faq_theme   = 'light';
$faq_items   = [
    [
        'question' => 'What SEO services does Media Clock offer?',
        'answer'   => "We cover SEO audits, keyword research, on-page SEO, technical SEO, local SEO, SEO content, internal linking, structured data and monthly reporting. Which of those you get depends on your website and the package you choose. Most sites need two or three areas done properly rather than all six done thinly, and the audit tells us which ones.",
        'open'     => true,
    ],
    [
        'question' => 'What is included in your SEO packages?',
        'answer'   => "Every package mixes strategy, keyword research, technical work, on-page changes, local SEO, content, structured data and reporting \u{2014} the difference is how much happens each month and whether we're implementing fixes or only recommending them. Essentials tells you what's wrong. Growth fixes it. Performance keeps fixing it across a larger site. Custom is built from scratch.",
    ],
    [
        'question' => 'How much do SEO packages cost in Australia?',
        'answer'   => 'SEO pricing in Australia realistically runs from a few hundred dollars a month for a small local site to five figures for enterprise work. A ten-page trades website is nothing like an ecommerce store with 4,000 products, so the price follows the work. Every Media Clock package is quoted after a free consultation, once we\'ve seen your site and what it actually needs.',
    ],
    [
        'question' => 'How long does SEO take to show results?',
        'answer'   => 'Technical and on-page fixes can show movement within a few weeks. Meaningful growth in organic traffic and enquiries usually takes three to six months, and longer in competitive industries where your rivals have been at it for a decade. It depends on your starting point, content, competition and how fast changes get approved. Anyone promising page one in 30 days is guessing.',
    ],
    [
        'question' => 'Do you offer local SEO packages?',
        'answer'   => "Yes, and for trades, clinics and anyone with a van it's often the quickest win available. Local SEO packages cover your Google Business Profile, reviews, local keyword research, service-area targeting and location pages that say something specific about each area. We won't build thirty pages where only the suburb name changes \u{2014} that stopped working years ago.",
    ],
    [
        'question' => 'What is included in technical SEO services?',
        'answer'   => 'Technical SEO covers everything affecting whether search engines can crawl, understand and index your pages: indexing issues, redirects, canonical tags, XML sitemaps, robots directives, structured data, site architecture and page performance. The work needed depends entirely on what the audit finds, which is why we don\'t quote technical SEO blind. Some sites need a week. Some need a rebuild.',
    ],
    [
        'question' => 'Do you provide SEO content services?',
        'answer'   => 'Yes. That covers new service pages, location pages, FAQs and blog articles, plus rewrites of existing pages that rank but don\'t convert. We write to match search intent rather than a word count, so if the honest answer to someone\'s question is two paragraphs, that\'s what you get. Padding a page to 1,500 words helps nobody.',
    ],
    [
        'question' => 'Do you offer SEO packages for small businesses?',
        'answer'   => 'Yes. Small business SEO in Australia usually needs focus rather than scale, which is what Essentials is for — foundations checked, key pages fixed, and a roadmap for what comes next. That said, if you\'re getting fifty visitors a month with no reviews, we\'ll tell you your money may do more elsewhere first.',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
