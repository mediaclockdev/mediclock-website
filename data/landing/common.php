<?php
/* ============================================================
   * Advertisement landing pages — shared content
   Everything the Perth and Melbourne pages say in common. The two pages are
   the same page with a different city, so the wording lives here once and the
   per-city file (data/landing/perth.php, melbourne.php) overrides only what
   genuinely differs.

   Read by includes/landing/page.php. Nothing outside includes/landing/ reads
   this file, and nothing in here is shared with the main site — these pages
   are deliberately kept separate so a change to an ad campaign can never
   move a section on a normal page.
   ============================================================ */
return [

    /* ---- Hero -------------------------------------------------------- */
    /* {city} is replaced with the city name, so the headline is written once */
    'hero_title'   => '{city} Mobile App Development',
    'hero_points'  => [
        'iOS & Android Specialists',
        '50+ apps delivered since 2017',
        'You own the code',
        'NDA signed before you share your idea',
    ],
    'hero_stats'   => [
        ['10+',  'Years of Experience',  'landing/hero/01.webp'],
        ['400+', 'Project Delivered',    'landing/hero/02.webp'],
        ['98%',  'Client Retention',     'landing/hero/03.webp'],
    ],

    /* ---- Hero form --------------------------------------------------- */
    'form_title'  => 'Tell us about your app',
    'form_lead'   => 'We reply within 4 business hours with next steps.',
    'form_submit' => 'Book a Free Discovery Call',
    'form_note'   => 'Your idea is protected by our NDA. We never share project details.',

    /* ---- Trusted by -------------------------------------------------- */
    'trusted_title' => 'Trusted By',

    /* ---- Why businesses trust us ------------------------------------- */
    'trust_eyebrow' => '',
    'trust_title'   => 'Why Businesses Trust What We Build',
    'trust_cta'     => 'Call Now To Discuss',
    'trust_points'  => [
        ['We Understand Before We Build', 'Discovery, requirement gathering and designs before development.'],
        ['Built Around Your Idea',        'Custom apps designed for your users, workflow and goals.'],
        ['See It Before We Build It',     'Wireframes and prototypes give you a clear view of the product early.'],
        ['Clear Scope & Pricing',         'Know what you’re getting before development starts.'],
        ['You Own What We Build',         'Full ownership of your app and code.'],
        ['Support After Launch',          'Testing, deployment, updates and ongoing improvements.'],
    ],

    /* ---- Platforms --------------------------------------------------- */
    'platforms_title' => 'What We Build for Every Platform',
    'platforms'       => [
        ['iOS',             'Native-quality apps built for the App Store, submitted and approved by our team.',      'landing/platforms/01.webp'],
        ['Android',         'Expand your reach across Android devices with a scalable application built for growth.', 'landing/platforms/02.webp'],
        ['Cross-platform',  'One React Native codebase for both stores. Faster to launch, cheaper to maintain.',      'landing/platforms/03.webp'],
        ['Custom software', 'Custom software built around your workflows and business requirements.',                 'landing/platforms/04.webp'],
        ['Web application', 'Feature-rich web apps that work across devices, giving customers easy access.',          'landing/platforms/05.webp'],
    ],

    /* ---- Projects ---------------------------------------------------- */
    'projects_title' => 'Our Latest Projects',
    'projects_cta'   => 'Explore More',
    'projects'       => [
        ['Photo Storage & Organisation App', 'landing/projects/01.webp'],
        ['Shopping & Order Management App',  'landing/projects/02.webp'],
        ['Mining Safety & Hazard Reporting', 'landing/projects/03.webp'],
        ['Healthcare App',                   'landing/projects/04.webp'],
        ['Property Inspection App',          'landing/projects/05.webp'],
        ['Rental Marketplace App',           'landing/projects/06.webp'],
    ],

    /* ---- Pricing ----------------------------------------------------- */
    'pricing_title' => 'What does an app actually cost?',
    'pricing_lead'  => 'Most agencies won’t tell you. Here’s where our projects usually land, so you know before you call.',
    'pricing_note'  => 'Every project starts with a Scope of Work document. Fixed price, fixed timeline, no surprises.',
    'pricing_cta'   => 'Get a Free App Strategy Session',
    'pricing'       => [
        [
            'name'     => 'MVP Launch',
            'blurb'    => 'For validating an idea fast.',
            'price'    => 'Starting from $8,000',
            'popular'  => false,
            'features' => [
                'One platform — iOS or Android',
                'Up to 8 core screens',
                'Login, profiles, push notifications',
                'App Store / Play Store submission',
                '1 month post-launch support',
            ],
            'timing'   => '6–8 weeks',
        ],
        [
            'name'     => 'Full Product',
            'blurb'    => 'For businesses launching a real product.',
            'price'    => 'Starting from $15,000',
            'popular'  => true,
            'features' => [
                'iOS and Android (React Native)',
                'Unlimited screens, custom UI/UX design',
                'Payments, admin dashboard, analytics',
                'Third-party API integrations',
                '3 months support & maintenance',
            ],
            'timing'   => '10–14 weeks',
        ],
        [
            'name'     => 'Enterprise',
            'blurb'    => 'For complex systems and integrations.',
            'price'    => 'Let’s talk',
            'popular'  => false,
            'features' => [
                'Custom backend & cloud architecture',
                'ERP, CRM and hardware integrations',
                'Role-based access & advanced security',
                'Dedicated project manager',
                'Ongoing SLA-backed support',
            ],
            'timing'   => 'Scoped per project',
        ],
    ],

    /* ---- Roadmap ----------------------------------------------------- */
    'roadmap_title' => 'Mobile App Development Roadmap',
    'roadmap_image' => 'landing/roadmap.webp',
    'roadmap_w'     => 1253,
    'roadmap_h'     => 1140,
    /* the wide artwork is unreadable on a phone, so below 768px these render
       as real text instead — same content, no pinch-and-zoom */
    'roadmap_steps' => [
        ['Scope of Work', 'Together we define the purpose, goals, features and scope of the project.'],
        ['Design & Prototyping', 'Process flows, use cases, user personas, and low and high fidelity wireframes.'],
        ['Application Development', 'We build to the approved designs, test thoroughly, and support the launch.'],
    ],

    /* ---- Technologies ------------------------------------------------ */
    'tech_title' => 'Technologies We Use',

    /* ---- App categories ---------------------------------------------- */
    'categories_eyebrow' => '',
    'categories_title'   => 'What Kind Of App Do You Want To Build',
    'categories'         => [
        ['Health care Apps', 'Patient tools, records and practitioner portals.', 'health'],
        ['Booking Apps',     'Appointments, classes, calendars and reminders.',  'booking'],
        ['Real Estate Apps', 'Listings, inspections and agent dashboards.',      'realestate'],
        ['E-Commerce Apps',  'Product catalogues, carts and checkout.',          'ecommerce'],
        ['Marketplace Apps', 'Two platforms with listings and payments.',        'marketplace'],
    ],
    'categories_cta_title' => 'Have Something In Mind?',
    'categories_cta_lead'  => 'We would love to hear your idea and turn it into a powerful app.',
    'categories_cta'       => 'Let’s Discuss Your Idea',

    /* ---- FAQ --------------------------------------------------------- */
    'faq_title' => 'Frequently Asked Questions',
    'faq'       => [
        ['What will my app cost?', 'A single-platform MVP typically starts around $8,000, and a full iOS + Android product around $15,000. The final figure depends on the number of screens, integrations and whether you need a backend. After a 30-minute scope call we give you a written fixed quote within 3 business days.'],
        ['How long does it take to build?', 'An MVP runs 6–8 weeks and a full product 10–14 weeks, from approved designs to store submission. We give you the delivery dates in writing before you commit, and you get a demo build on your phone every week.'],
        ['Is my app idea safe with you?', 'Yes. We sign a Non-Disclosure Agreement before you share anything, and it stays in place for the life of the project.'],
        ['Can you integrate payments and third-party APIs?', 'Yes — Stripe, PayPal, Apple Pay and Google Pay for payments, plus maps, messaging, CRMs, accounting systems and any documented API your business already uses.'],
        ['Can you redesign or rescue an existing app?', 'Often, yes. We start with a paid code review to check the state of the existing codebase, then tell you honestly whether it’s cheaper to fix or rebuild. Plenty of our projects start this way.'],
        ['Do you publish the app to the App Store and Google Play?', 'We handle the full submission, including store listings, screenshots and the review process. The apps stay under your developer accounts, so you keep control.'],
        ['What happens after launch?', 'Support is included for the first 1–3 months depending on your package. After that, most clients move to a monthly plan covering store updates, OS upgrades, bug fixes and new features.'],
    ],
];
