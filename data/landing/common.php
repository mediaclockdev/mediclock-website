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
    /* The headline is stored in three parts so the city can be set in orange
       without putting markup in the data. {city} is filled in by page.php. */
    'hero_badge'        => 'iOS + Android specialists · St Kilda 3082, VIC',
    'hero_title_before' => 'Build your app with a',
    'hero_title_city'   => '{city}',
    'hero_title_after'  => 'mobile app development team',
    'hero_lead'         => 'One team from idea to App Store. We scope it, design it, build it for iOS and Android, and hand you the code.',
    'hero_cta'          => 'Book a Free Discovery Call',
    'hero_ticks'        => [
        'Feasibility Check',
        'Cost Estimate',
        'Get Timeline',
    ],
    'hero_video_label'  => 'Media Clock app development showreel',

    /* ---- Proof strip — the orange band under the hero ----------------- */
    'strip' => [
        ['50+',  'Apps delivered since 2017'],
        ['98%',  'Client Retention'],
        ['100%', 'You own the code'],
        ['NDA',  'Signed before you share'],
    ],

    /* ---- Quote form -------------------------------------------------- */
    'form_title'  => 'Tell us about your app',
    'form_lead'   => 'We reply within 4 business hours with next steps.',
    'form_submit' => 'Book a Free Discovery Call',
    'form_note'   => 'Your idea is protected by our NDA. We never share project details.',

    /* ---- Trusted by -------------------------------------------------- */
    'trusted_title' => 'Trusted by Australian businesses',

    /* ---- Projects / case studies ------------------------------------- */
    'projects_title' => 'Our Recent Projects',
    'projects_lead'  => 'A few of the apps we have recently built for Australian businesses.',
    'projects_cta'   => 'Explore More',
    /* [tag, title, blurb, image] */
    'projects'       => [
        ['Mining · Safety',      'Mining Safety & Hazard Reporting',  'A custom mobile and web solution for field workers and supervisors, digitising hazard reporting and giving management real-time visibility of site issues and records.', 'landing/projects/03.webp'],
        ['Property · Field teams', 'Property Inspection App',         'We developed a custom inspection solution to capture site data and photos, streamline reporting and share completed reports with clients.', 'landing/projects/05.webp'],
        ['Marketplace',          'Rental Marketplace App',            'A custom mobile app and web platform connecting owners and renters, with integrated listings, bookings and payments for a seamless rental experience.', 'landing/projects/06.webp'],
        ['Retail · Orders',      'Shopping & Order Management App',   'A complete mobile shopping experience with product browsing, cart management and order tracking, supported by an admin platform to manage orders and daily operations.', 'landing/projects/02.webp'],
        ['Health care',           'Health care App',                    'A mobile health app for tracking menopause symptoms and wellbeing, integrating data from Apple Watch and Google Wear OS devices to give users clearer insights into their health.', 'landing/projects/04.webp'],
        ['Consumer',             'Photo Storage & Organisation App',  'Upload, sort and share photos from the phone, with the storage and syncing handled in the background.', 'landing/projects/01.webp'],
    ],

    /* ---- Platforms --------------------------------------------------- */
    'platforms_title' => 'Mobile App Development Services in Australia',
    'platforms_lead'  => 'From new product builds to app upgrades, we provide end-to-end mobile app development across all major platforms.',
    'platforms'       => [
        ['iOS',             'Native-quality apps built for the App Store, submitted and approved by our team.',      'landing/platforms/01.webp'],
        ['Android',         'Expand your reach across Android devices with a scalable application built for growth.', 'landing/platforms/02.webp'],
        ['Cross-platform',  'One React Native codebase for both stores. Faster to launch, cheaper to maintain.',      'landing/platforms/03.webp'],
        ['Custom software', 'Custom software built around your workflows and business requirements.',                 'landing/platforms/04.webp'],
        ['Web application', 'Feature-rich web apps that work across devices, giving customers easy access.',          'landing/platforms/05.webp'],
    ],

    /* ---- App categories ---------------------------------------------- */
    'categories_eyebrow' => '',
    'categories_title'   => 'What Kind Of App Do You Want To Build',
    'categories_lead'    => 'Tell us where you are. The first call is free, and you will leave it knowing your next step.',
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

    /* ---- Why businesses choose us ------------------------------------ */
    'trust_eyebrow' => 'Why Media Clock',
    'trust_title'   => 'Why Businesses Trust What We Build',
    'trust_cta'     => 'Call Now To Discuss',
    'trust_cta_title' => 'Want to talk it through?',
    'trust_points'  => [
        ['We Understand Before We Build', 'Discovery, requirement gathering and designs before development.'],
        ['Built Around Your Idea',        'Custom apps designed for your users, workflow and goals.'],
        ['See It Before We Build It',     'Wireframes and prototypes give you a clear view of the product early.'],
        ['Clear Scope & Pricing',         'Know what you’re getting before development starts.'],
        ['You Own What We Build',         'Full ownership of your app and code.'],
        ['Support After Launch',          'Testing, deployment, updates and ongoing improvements.'],
    ],

    /* ---- How it works ------------------------------------------------ */
    'roadmap_title' => 'How it works',
    'roadmap_lead'  => 'You see and approve each stage before we move to the next.',
    'roadmap_steps' => [
        ['Discovery',   'Free call to understand your idea, users and goals.'],
        ['Strategy',    'Requirements and a Scope of Work with fixed price and dates.'],
        ['Design',      'Wireframes and prototypes so you see it before we build it.'],
        ['Development', 'Built and tested, with a demo build on your phone weekly.'],
        ['Launch',      'App Store and Google Play submission, then ongoing support.'],
    ],

    /* ---- Pricing ----------------------------------------------------- */
    'pricing_title' => 'How much does an app cost?',
    'pricing_lead'  => 'Most agencies won’t tell you. Here’s where our projects usually land, so you know before you call.',
    'pricing_note'  => 'Every project starts with a Scope of Work document. Fixed price, fixed timeline, no surprises.',
    'pricing_cta'   => 'Get a Free App Strategy Session',
    'pricing'       => [
        [
            'name'     => 'MVP Launch',
            'blurb'    => 'For validating an idea fast.',
            'lead_in'  => 'Starting from',
            'price'    => '$4,999',
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
            'lead_in'  => 'Starting from',
            'price'    => '$9,999',
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
            'lead_in'  => 'Custom quote',
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

    /* ---- Technologies ------------------------------------------------ */
    'tech_title' => 'Technologies We Use',

    /* ---- Reviews ----------------------------------------------------- */
    'reviews_title' => 'What our clients say',
    'reviews_note'  => '★★★★★ Google reviews',

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

    /* ---- Closing call to action -------------------------------------- */
    'cta_title_before' => 'Have an app idea?',
    'cta_title_accent' => 'Let’s talk.',
    'cta_lead'         => 'Book a free discovery call. We reply within 4 business hours with next steps.',
    'cta_address'      => '392 A St Kilda Rd, St Kilda VIC 3182',
];