<?php
/* ============================================================
   * Advertisement landing pages v2 — shared content
   Only what the v2 sections say. It is merged over data/landing/common.php
   and under the city file (data/landing/perth.php …), so the title, phone,
   form wording and city stay the same as the original ad pages.

   Fewer words is the point of this version: every section gets a headline,
   one sentence at most, and a picture.
   ============================================================ */
return [

    /* ---- Header — the pill beside the phone number (opens the quote form) */
    'v2_header_cta' => 'Free Consultation',

    /* ---- Hero -------------------------------------------------------- */
    /* {city} is filled in by page.php */
    'v2_hero_eyebrow'      => 'Mobile App Development · {city}',
    /* wording from the approved content doc ("Let's Build Your App.") */
    'v2_hero_title_before' => 'Let’s Build',
    'v2_hero_title_accent' => 'Your App',
    'v2_hero_lead'         => 'Design, develop and launch with Media Clock.',
    'v2_hero_cta'          => 'Book a Free Discovery Call',
    /* the same free call, worded for where each button sits, so the page
       does not repeat one line four times (the hero keeps the full name) */
    'v2_steps_cta'         => 'Start With a Free Call',   /* under the four steps — step one is the call */
    'v2_faq_cta'           => 'Ask Us on a Free Call',    /* beside the questions */
    /* The hero's phones: five finished mockups, cut apart from one design so
       each can animate (assets/images/landing-v2/hero/). [image, width,
       height, alt], left to right; on a phone only the middle three show. */
    'v2_hero_apps' => [
        ['landing-v2/hero/phone-1.webp', 363, 999,  'Total Inspections app — inspector home screen'],
        ['landing-v2/hero/phone-2.webp', 375, 998,  'Health care app — cycle tracking calendar'],
        ['landing-v2/hero/phone-3.webp', 460, 1008, 'Photo organiser app — welcome screen'],
        ['landing-v2/hero/phone-4.webp', 371, 984,  'Shelynx shopping app — home screen'],
        ['landing-v2/hero/phone-5.webp', 366, 991,  'Mining safety app — hazard report dashboard'],
    ],
    /* Previous hero phones (screenshots framed in CSS) — no longer shown; the
       markup that used them is commented out in the hero section.
       [screen, alt] — left to right; the middle one is the largest. The
       screens are cut from the case-study mockups and framed in CSS, so a new
       app only needs a 404×900 screenshot. */
    'v2_hero_phones'       => [
        ['landing-v2/phones/screen-1.webp', 'Health care app — cycle tracking screen'],
        ['landing-v2/phones/screen-2.webp', 'Mining safety app — hazard report dashboard'],
        ['landing-v2/phones/screen-3.webp', 'Property inspection app — welcome screen'],
        ['landing-v2/phones/screen-4.webp', 'Shopping and order app — sign-in screen'],
        ['landing-v2/phones/screen-5.webp', 'Rental marketplace app — browse screen'],
    ],

    /* ---- Stats — four numbers, no heading ---------------------------- */
    /* [number, suffix, label]. The number counts up from zero when the row
       scrolls into view; the suffix stays put in orange. Keep the number a
       plain figure (a decimal is fine) so the script can count it. */
    'v2_stats' => [
        ['50',  '+', 'Apps delivered'],
        ['98',  '%', 'Client retention'],
        ['100', '%', 'Code ownership'],
        ['4.9', '★', 'Reviews'],
    ],

    /* ---- Three pillars — design, build, launch ----------------------- */
    /* a small line over a very large one, then three cards: a title, one
       sentence and a picture each. The pictures are set per card below. */
    'v2_pillars_kicker' => 'From Idea to App Store,',
    'v2_pillars_title'  => 'One Team.',
    'v2_pillars'        => [
        'design' => ['Design', 'Wireframes and a prototype you can tap.'],
        'build'  => ['Build',  'A demo build on your phone every week.'],
        'launch' => ['Launch', 'App Store and Google Play. You own it.'],
    ],
    /* design card: one phone peeking up from the bottom of the card */
    'v2_pillar_design_screen' => ['landing-v2/phones/screen-4.webp', 'Sign-in screen designed by Media Clock'],
    /* design card: a photo of the design desk (user journey, wireframes,
       screens) — replaces the phone above, which is kept for going back */
    'v2_pillar_design_photo' => ['landing-v2/pillars/design-workspace.webp', 'User journey sticky notes, wireframe sketches and app screens on a designer’s desk'],
    /* build card: six tools, each drawn as its brand mark from
       includes/landing-v2/brand-icons.php (was six of the dark tiles from
       data/shared/tech-stack.php, matched by alt) */
    'v2_pillar_build_tech'    => ['Swift', 'Kotlin', 'Flutter', 'React', 'Node.js', 'Firebase'],
    /* launch card: a short checklist — was ticks; now each with its mark
    'v2_pillar_launch_list'   => ['App Store', 'Google Play', 'Updates & support'],
    */
    /* launch card: where it goes and what follows — [name, one line]; the
       mark for each is in includes/landing-v2/brand-icons.php */
    'v2_pillar_launch' => [
        ['App Store',         'iPhone & iPad'],
        ['Google Play',       'Android devices'],
        ['Ongoing Support',   '1–3 months included'],
    ],

    /* ---- Our work — one wide card at a time, swipeable --------------- */
    // 'v2_work_kicker' => 'Recent Work,',
    // 'v2_work_title'  => 'Real Businesses.',
    'v2_work_kicker' => 'Our Portfolio,',
    'v2_work_title'  => 'Real Results.',
    'v2_work_lead'   => 'From startups to government, across Australia.',
    /* Each card: industry tag, app name, one line on what it does, two facts
       and one screen of the app (assets/images/landing-v2/phones/, 404×900,
       framed as a phone in CSS like the hero's). The facts are [value, label]; swap in real numbers — downloads,
       users, rating — as clients agree to share them. */
    'v2_work' => [
        [
            'tag'   => 'Mining · Safety',
            'name'  => 'Mining Safety App',
            'line'  => 'Field crews report hazards from site. Management sees them the same minute.',
            'facts' => [['Mobile + web', 'Platforms'], ['Real-time', 'Site visibility']],
            'screen' => 'landing-v2/phones/screen-2.webp',
        ],
        [
            'tag'   => 'Property · Field teams',
            'name'  => 'Total Inspections',
            'line'  => 'Photos and notes captured on site, finished inspection reports sent from the phone.',
            'facts' => [['iOS + Android', 'Platforms'], ['Instant', 'Report sharing']],
            'screen' => 'landing-v2/phones/screen-3.webp',
        ],
        [
            'tag'   => 'Marketplace',
            'name'  => 'Rental Marketplace',
            'line'  => 'Owners list, renters book and pay — the whole rental in one app.',
            'facts' => [['Mobile + web', 'Platforms'], ['In-app', 'Bookings & payments']],
            'screen' => 'landing-v2/phones/screen-5.webp',
        ],
        [
            'tag'   => 'Retail · Orders',
            'name'  => 'Shelynx',
            'line'  => 'Shop, pay and track every order, with an admin panel running the day behind it.',
            'facts' => [['Mobile + admin', 'Platforms'], ['Live', 'Order tracking']],
            'screen' => 'landing-v2/phones/screen-4.webp',
        ],
        [
            'tag'   => 'Health care',
            'name'  => 'Health Care App',
            'line'  => 'Symptom and wellbeing tracking that pulls data from Apple Watch and Wear OS.',
            'facts' => [['iOS + Android', 'Platforms'], ['Wearables', 'Watch data sync']],
            'screen' => 'landing-v2/phones/screen-1.webp',
        ],
        [
            'tag'   => 'Consumer · Subscriptions',
            'name'  => 'Photo Storage App',
            'line'  => 'Upload, sort and share photos, with credits and subscriptions built in.',
            'facts' => [['iOS + Android', 'Platforms'], ['In-app', 'Purchases']],
            'screen' => 'landing-v2/phones/screen-6.webp',
        ],
    ],
    'v2_work_foot' => 'Mining, property, healthcare, retail and more. What are you building?',
    'v2_work_cta'  => 'Tell Us Your Idea',

    /* ---- Features — three big promises, one phone each --------------- */
    /* A very large headline, one sentence and a phone, alternating sides.
       [headline, sentence, screen, alt]; the screens are the hero's. */
    'v2_features' => [
        /* headings from the content doc, the sentences cut to one line */
        ['Agile App Development.',  'Real progress every week. Reach the market faster.', 'landing-v2/phones/screen-2.webp', 'Mining safety app — hazard report dashboard'],
        ['Clear Communication.',    'Talk directly to the designers and developers.',     'landing-v2/phones/screen-3.webp', 'Property inspection app — welcome screen'],
        ['Build, Launch & Grow.',   'We stay on after launch to help you scale.',         'landing-v2/phones/screen-5.webp', 'Rental marketplace app — browse screen'],
    ],
    'v2_features_cta' => 'Free Consultation',

    /* ---- How it works — four steps ----------------------------------- */
    /* The old page's five stages, with discovery and strategy merged. Each
       step ends in the thing the client actually gets from it. */
    'v2_steps_kicker' => 'Idea to Launch,',
    'v2_steps_title'  => 'In Four Steps.',
    'v2_steps_lead'   => 'You approve every stage.',
    /* [title, one sentence, what you get] */
    'v2_steps' => [
        ['Discover', 'A free call about your idea.',     'Fixed price & dates'],
        ['Design',   'A prototype you can tap through.', 'Clickable prototype'],
        ['Build',    'Short sprints, shown as we go.',   'A build every week'],
        ['Launch',   'Submitted to both stores.',        'Live on iOS & Android'],
    ],

    /* ---- Pricing ----------------------------------------------------- */
    /* The tiers themselves — names, prices, features, timings — are read
       from 'pricing' in data/landing/common.php, so a price change there
       reaches the original ad pages and this one together. */
    'v2_pricing_kicker' => 'How Much Does an App Cost?',
    'v2_pricing_title'  => 'No Surprises.',
    'v2_pricing_cta'    => 'Get a Quote',
    'v2_pricing_note'   => 'Not sure which fits? We’ll scope it on a free call.',
    /* the tiers' feature lists are long on the original page; v2 shows the
       first few of each */
    'v2_pricing_features' => 4,

    /* ---- Reviews (the original page's slider) ----------------------- */
    /* v2 shows each Google review cut down to its key line or two, short
       enough to fit three lines on the card, so there is no "Read more".
       Same order as data/landing/reviews.php; trimmed from each reviewer's
       own words, not new claims. */
    'reviews_more'    => false,
    'v2_reviews_text' => [
        'Media Clock exceeded our expectations. Their expert team delivered a top-notch app.',
        'A solid, easy-to-use app we now use every day for onsite inspections.',
        'Great work, very organised and result oriented. Well done, Media Clock.',
        'Very professional and knowledgeable. Functional, user-friendly solutions.',
        'They truly understand client requirements and are happy to make changes.',
        'Professional, responsive and easy to work with. A clean, modern result.',
        'Our app stalled with another company. Media Clock got it back on track. A game changer.',
        'They turned our ideas into a clean, user-friendly app, on time and on budget.',
    ],

    /* ---- Let's talk — the quote form's line under its heading ------ */
    'form_lead' => 'Share your idea and we’ll call you back within 4 business hours.',

    /* ---- FAQ --------------------------------------------------------- */
    /* The cost answer matches the $4,999 / $9,999 pricing cards;
       the original page's FAQ still quotes $8,000 / $15,000. */
    // 'v2_faq_kicker' => 'Good Questions,',
    // 'v2_faq_title'  => 'Straight Answers.',
    /* the plain name people look for; split over the small and big lines */
    'v2_faq_kicker' => 'Frequently Asked',
    'v2_faq_title'  => 'Questions',
    /* Previous five, cut to a line each — too clipped to read as answers
    'v2_faq'        => [
        ['What will my app cost?', 'From $4,999 for an MVP and $9,999 for a full product, iOS and Android. You get a fixed written quote within 3 business days of a free call.'],
        ['How long does it take?', 'An MVP takes 6–8 weeks, a full product 10–14. Dates are in writing before you commit.'],
        ['Is my idea safe?', 'Yes. We sign an NDA before you share anything.'],
        ['Can you fix an existing app?', 'Often, yes. A code review tells us honestly whether to fix it or rebuild.'],
        ['What happens after launch?', '1–3 months of support is included, then an optional monthly plan.'],
    ],
    */
    /* Seven, as on the original page: full questions, each answered in two
       or three plain sentences. Prices, timings and support match the
       pricing cards ('pricing' in data/landing/common.php). */
    'v2_faq'        => [
        ['How much does an app cost?', 'Our MVP Launch package starts from $4,999 and our Full Product package from $9,999, both for iOS and Android. The final price depends on the screens and features you need. After a free call, we send you a fixed written quote within 3 business days.'],
        ['How long does it take to build an app?', 'An MVP usually takes 6–8 weeks and a full product 10–14 weeks. You get the delivery dates in writing before you commit, and a demo build on your phone every week.'],
        ['Is my app idea safe with you?', 'Yes. We sign a Non-Disclosure Agreement before you share any details, and it stays in place for the whole project.'],
        ['Can you add payments and connect our other systems?', 'Yes. We integrate Stripe, PayPal, Apple Pay and Google Pay, as well as maps, messaging, CRMs, accounting software and any system with an API.'],
        ['Can you fix or take over an existing app?', 'Often, yes. We start with a code review, then tell you honestly whether it’s better to fix the app or rebuild it.'],
        ['Do you publish the app to the App Store and Google Play?', 'Yes. We handle the whole submission, including store listings, screenshots and Apple’s and Google’s review. The app goes live under your own developer accounts, and you own all of the code.'],
        ['What happens after launch?', 'Support is included for 1 month with an MVP and 3 months with a Full Product. After that, an optional monthly plan covers updates, bug fixes and new features.'],
    ],


    /* Logo band under the hero ("Global Success") — the client logos sliding
       past on a loop, on a light band. The logos are data/shared/clients.php. */
    // 'v2_logos_kicker' => 'Australian App Developers',
    // 'v2_logos_title'  => 'Global Success',
    'v2_logos_kicker' => 'Built in Australia,',
    'v2_logos_title'  => 'Trusted Worldwide.',

    /* ---- Headings in Title Case ------------------------------------
       Every v2 heading capitalises its main words. These four are shared
       with the original ad page (data/landing/common.php), so v2 sets its
       own here and leaves that page's sentence case alone. */
    'reviews_title'    => 'What Our Clients Say',
    'cta_title_before' => 'Have an App Idea?',
    'cta_title_accent' => 'Let’s Talk.',
    'form_title'       => 'Tell Us About Your App',
    /* the quote form's button (the form and the pop-up), was the shared
       'Book a Free Discovery Call' */
    'form_submit'      => 'Request My Free Call',

    /* the line under "Let's Talk." — dropped on v2 (the contact section
       skips it when empty); the original ad page keeps its own
    'cta_lead'         => 'Check timeline feasibility and Cost. Book a free discovery call.',
    */
    'cta_lead'         => '',

];
