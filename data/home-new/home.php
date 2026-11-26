<?php
/* ============================================================
   * Homepage (new design) — content for home-new.php
   Read by the sections in includes/sections/home-new/.
   Order here = order on screen. Images are under assets/images/.
   ============================================================ */
return [
    /* * Hero : three rotating slides. The headline is typed out line by line
       ('a' white, 'b' orange) by assets/js/home-new.js; 'bg' is the full-bleed
       picture behind it. The first slide is also rendered in the HTML, so the
       page reads correctly before (or without) JavaScript. */
    'hero' => [
        [
            'tag' => '01 · Web development',
            'a'   => 'Websites that',
            'b'   => 'win customers.',
            'sub' => 'Fast, beautiful websites and web platforms built around your goals, designed to earn trust and drive enquiries.',
            'bg'  => 'pages/home-new/hero/web-development.webp',
        ],
        [
            'tag' => '02 · App development',
            'a'   => 'Apps people',
            'b'   => 'love to use.',
            'sub' => 'Reliable iOS and Android apps designed for everyday use, from the first prototype to a confident launch.',
            'bg'  => 'pages/home-new/hero/app-development.webp',
        ],
        [
            'tag' => '03 · Digital marketing',
            'a'   => 'Growth you',
            'b'   => 'can measure.',
            'sub' => 'SEO, content and campaigns tied to real business outcomes, so the right people find you and take action.',
            'bg'  => 'pages/home-new/hero/digital-marketing.webp',
        ],
    ],

    /* * Hero : the three proof points under the buttons */
    'proof' => [
        ['100s', 'projects delivered'],
        ['2017', 'established in Australia'],
        ['End-to-end', 'strategy to launch'],
    ],

    /* * Recent projects : 2 x 2 grid.
       'case_study' optional — slug of data/portfolio/case-studies/<slug>.php;
       the arrow then opens that case study, otherwise the portfolio page. */
    'work' => [
        [
            'title' => 'Richards Aluminium',
            'meta'  => 'Fabrication Management · Web Platform',
            'image' => 'pages/home-new/work/richards-aluminium.webp',
            'alt'   => 'Richards Aluminium responsive fabrication management platform shown on desktop, tablet, mobile and laptop screens',
            'case_study' => 'richards-aluminium',
        ],
        [
            'title' => 'SHYLynx',
            'meta'  => 'Marketplace · Web & Mobile Platform',
            'image' => 'pages/home-new/work/shelynx.webp',
            'alt'   => 'SHYLynx responsive marketplace platform shown on desktop, tablet, mobile and laptop screens',
            'case_study' => 'shelynx',
        ],
        // Placeholders from the design — swap for real projects before go-live
        [
            'title' => 'Placeholder Project 01',
            'meta'  => 'Placeholder values only · Final project details will be added later',
            'image' => 'pages/home-new/work/richards-aluminium.webp',
            'alt'   => 'Placeholder project 1 mockup for portfolio layout preview',
        ],
        [
            'title' => 'Placeholder Project 02',
            'meta'  => 'Placeholder values only · Final project details will be added later',
            'image' => 'pages/home-new/work/shelynx.webp',
            'alt'   => 'Placeholder project 2 mockup for portfolio layout preview',
        ],
    ],

    /* * About : the three pillars under the intro copy */
    'pillars' => [
        ['Business first', 'Every feature begins with a useful outcome.'],
        ['Built together', 'Clear communication from discovery to launch.'],
        ['Made to last', 'Scalable foundations without unnecessary complexity.'],
    ],

    /* * What we do : hovering (or tapping / focusing) a service swaps the
       picture behind the panel. */
    'services' => [
        ['title' => 'Product & UI/UX Design',      'image' => 'pages/home-new/services/ui-ux-design.webp',                'alt' => 'Product and UI UX design shown across desktop, tablet and mobile screens'],
        ['title' => 'Mobile App Development',      'image' => 'pages/home-new/services/mobile-app-development.webp',      'alt' => 'Mobile app development shown on phone screens'],
        ['title' => 'Web Application Development', 'image' => 'pages/home-new/services/web-application-development.webp', 'alt' => 'Richards Aluminium production management web application in a fabrication workshop'],
        ['title' => 'Website Design & Build',      'image' => 'pages/home-new/services/website-design.webp',              'alt' => 'Northline Homes responsive website design shown across desktop, tablet width and mobile width layouts'],
        ['title' => 'eCommerce Experiences',       'image' => 'pages/home-new/services/ecommerce.webp',                   'alt' => 'Atelier Lane eCommerce journey showing handbag customisation, checkout and fulfilment'],
        ['title' => 'Digital Marketing',           'image' => 'pages/home-new/services/digital-marketing.webp',           'alt' => 'Digital marketing campaign journey for a dental implant consultation campaign'],
    ],

    /* * Our process : the five roadmap steps */
    'process' => [
        ['Discover',          'We unpack the business goal, user needs, risks and practical constraints before deciding what should be built.', 'Goals · users · scope'],
        ['Define',            'We structure the product, prioritise the right features and turn assumptions into a clear working plan.',        'Flows · features · roadmap'],
        ['Design',            'Wireframes become a polished, consistent interface that is understandable before development begins.',            'UX · UI · prototype'],
        ['Build & validate',  'Development happens in visible increments, with review, testing and refinement throughout the process.',           'Engineering · QA · feedback'],
        ['Launch & improve',  'We prepare for release, support the product in the real world and use evidence to guide what comes next.',        'Release · support · growth'],
    ],

    /* * Client perspective : which testimonial from data/shared/testimonials.php */
    'testimonial' => 'Adam Death',

    /* * Contact band : the three notes under the copy */
    'contact_notes' => ['Free initial consultation', 'NDA available', 'Practical next steps'],
];
