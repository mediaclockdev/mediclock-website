<?php
/* ============================================================
   * Mobile App Development — page content  (entry: /mobile-app-development.php)
   Everything that differs on this page: meta, section order and copy.
   Markup is in includes/components/; images in
   assets/images/pages/mobile-app-development/.

   New service page? Copy this file to data/pages/<slug>.php, change
   the content, and add a 2-line <slug>.php entry at the root.
   ============================================================ */
return [
    'title'       => 'Mobile App Development - Media Clock',
    'description' => 'Need a custom mobile app? Our expert team delivers top-tier mobile app development services, eCommerce & custom solutions near you. Get an instant quote today!',
    'css'         => 'service',
    'sections'    => [
        // * Hero
        [
            'type'  => 'hero',
            'title' => 'Custom Mobile App Developers',
            'sub'   => 'Business Automation or Concept Development',
            'cta'   => '',
            'image' => 'pages/mobile-app-development/hero.webp',
            'form'  => true,
        ],
        // * Happy Clients
        [
            'type'  => 'logo-slider',
            'id'    => 'clients',
            'title' => 'Happy Clients',
            'theme' => 'dark',
            'items' => require __DIR__ . '/../shared/clients.php',
        ],
        // * Services strip
        [
            'type'  => 'service-strip',
            'title' => 'Mobile app development services',
            'items' => [
                ['icon' => 'pages/mobile-app-development/icons/app-ios.svg', 'label' => 'iOS App Development'],
                ['icon' => 'pages/mobile-app-development/icons/app-android.svg', 'label' => 'Android App Development'],
                ['icon' => 'pages/mobile-app-development/icons/app-hybrid.svg', 'label' => 'Hybrid App Development'],
                ['icon' => 'pages/mobile-app-development/icons/app-business.svg', 'label' => 'Business App Development'],
                ['icon' => 'pages/mobile-app-development/icons/app-support.svg', 'label' => 'App Support & Maintenance'],
            ],
        ],
        // * Intro band
        [
            'type' => 'intro',
            'text' => 'Established in 2017, we have designed 100s of mobile apps and website design.',
        ],
        // * Recent Projects
        [
            'type'  => 'projects',
            'title' => 'Recent Projects',
            'items' => [
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
            ],
        ],
        // * Roadmap
        [
            'type'  => 'roadmap',
            'title' => 'Mobile App Development Roadmap',
            'image' => 'pages/mobile-app-development/roadmap.webp',
            'w'     => 1024,
            'h'     => 932,
            'alt'   => 'Mobile app development roadmap',
        ],
        // * Tech stack (heading kept for screen readers)
        [
            'type'          => 'logo-slider',
            'id'            => 'tech',
            'title'         => 'Technologies we use',
            'title_visible' => false,
            'theme'         => 'light',
            'items'         => require __DIR__ . '/../shared/tech-stack.php',
        ],
        // * Testimonials
        [
            'type'          => 'testimonials',
            'title'         => 'What our clients say',
            'title_visible' => false,
        ],
        // * Book A Free Consultation (contact section, shown open)
        [
            'type'    => 'contact',
            'visible' => true,
            'eyebrow' => '',
            'title'   => 'Book A Free Consultation',
            'points'  => [
                'Check if the project is technically feasible.',
                'To understand needs, desire and problems to solve.',
                'Plan technology, timeline, & costs.',
            ],
        ],
        // * FAQ
        [
            'type'    => 'faq',
            'id'      => 'faqs',
            'eyebrow' => '',
            'title'   => 'FAQ',
            'items'   => [
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
            ],
        ],
    ],
];
