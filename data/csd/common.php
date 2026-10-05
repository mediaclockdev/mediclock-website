<?php
/* ============================================================
   * Custom Software Development ad pages — shared content
   Everything the Perth and Melbourne pages say in common. The two pages are
   the same page with a different city, so the wording lives here once and the
   per-city file (data/csd/perth.php, melbourne.php) overrides only the city.

   Read by includes/csd/page.php. Nothing outside includes/csd/ reads this
   file. These pages are deliberately separate from both the main site and the
   mobile-app ad pages (data/landing/*), so a change to this campaign can
   never move a section anywhere else.

   'icon' values are our own literal SVG markup, echoed raw by the section
   templates. Nothing here comes from a visitor, so there is nothing to escape.
   ============================================================ */
return [

    /* ---- Hero -------------------------------------------------------- */
    /* {city} is replaced by page.php, so the copy is written once */
    'hero_eyebrow' => 'Custom Software Development {city}',
    /* the headline is split around the rotating word csd.js types out */
    'hero_title_before' => 'Software built around how your',
    'hero_title_after'  => 'actually works',
    'hero_rotate'       => ['business', 'team', 'customers', 'workflow'],
    'hero_sub'          => 'Juggling spreadsheets, manual processes, double-entering data and paying for tools that only do half the job? We build the system that ties it all together.',
    'hero_points'       => [
        'Custom software built exactly around your business requirements',
        'Automate complex & manual workflows',
        'Capture field data & generate reports automatically',
        'Improve accuracy, transparency & productivity',
    ],
    'hero_cta'          => 'Book a Free Discovery Call',
    'hero_video_label'  => 'Animated demo of a custom business dashboard and field app',
    'hero_badges'       => [
        ['✓', '#3FB37F', 'Invoice synced to Xero', 'No double entry'],
        ['⚡', 'var(--csd-orange)', '36 admin hours saved', 'Every week, automated'],
    ],

    /* ---- Quick form -------------------------------------------------- */
    'form_title'   => 'Tell us what you need built',
    'form_lead'    => 'Brainstorm, technology, timeline & costs',
    'form_submit'  => 'Get My Free Consult',
    'form_note'    => 'Your details are protected by our NDA. No spam, ever.',
    'form_options' => [
        'Business system / internal tool',
        'Customer or staff portal',
        'Dashboard & reporting',
        'Workflow automation',
        'System integration / API',
        'Replace or rebuild old software',
        'SaaS product',
        'Not sure yet',
    ],

    /* ---- Trusted by / Technologies ----------------------------------- */
    /* Both strips are rendered exactly as they are on the mobile-app ad
       pages, from the same shared logo data. */
    'trusted_title' => 'Trusted By',
    'tech_title'    => 'Technologies We Use',

    /* ---- Pain points ------------------------------------------------- */
    'pain_eyebrow' => 'Sound familiar?',
    'pain_title'   => 'Your business has outgrown off-the-shelf tools',
    'pain_lead'    => 'Generic software works until it doesn’t. Here’s when custom starts to make sense.',
    'pain_cards'   => [
        [
            'title' => 'Everything lives in spreadsheets',
            'text'  => 'Nobody’s sure which version is right, and one person holds half the process in their head.',
            'icon'  => '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" pathLength="1"/><path d="M3 9h18M3 15h18M9 3v18M15 3v18" pathLength="1"/></svg>',
        ],
        [
            'title' => 'Your tools don’t talk to each other',
            'text'  => 'Staff re-type the same job, customer or invoice into three systems. Mistakes creep in every week.',
            'icon'  => '<svg viewBox="0 0 24 24"><path d="M9 7H6a4 4 0 0 0 0 8h3M15 7h3a4 4 0 0 1 0 8h-3" pathLength="1"/><path d="M4 20L20 4" pathLength="1"/></svg>',
        ],
        [
            'title' => 'Subscriptions keep climbing',
            'text'  => 'Every new staff member means another monthly seat, for software that still doesn’t fit how you work.',
            'icon'  => '<svg viewBox="0 0 24 24"><path d="M3 17l6-6 4 4 8-8" pathLength="1"/><path d="M15 7h6v6" pathLength="1"/></svg>',
        ],
    ],

    /* ---- Projects ---------------------------------------------------- */
    'projects_eyebrow' => 'Our work',
    'projects_title'   => 'Software we’ve built for Australian businesses',
    'projects_cta'     => 'Discuss Your Project',
    'projects'         => [
        [
            'img'   => 'csd/projects/australian-scaffold.webp',
            'alt'   => 'Australian Scaffold admin portal on desktop and the vendor list on mobile',
            'tag'   => 'Scaffolding · NSW',
            'title' => 'Scaffold Estimator & Vendor Portal',
            'text'  => 'Paper-based vendor registration and scaffold costing replaced with one platform — digital onboarding, separate portals for vendors and staff, and estimates that cost themselves.',
            'points' => ['Digital vendor onboarding', 'Automated cost estimation', 'Role-based access control'],
        ],
        [
            'img'   => 'csd/projects/trevor.webp',
            'alt'   => 'Trevor safety audit platform showing an audit list on desktop and mobile',
            'tag'   => 'WHS & Safety',
            'title' => 'Trevor — Safety Audit Platform',
            'text'  => 'Workplace safety inspections and WHS compliance audits done on a phone instead of a clipboard, with structured checklists, photo evidence and a full audit history.',
            'points' => ['Digital safety audits', 'Photo & evidence capture', 'Real-time compliance tracking'],
        ],
        [
            'img'   => 'csd/projects/total-inspection.webp',
            'alt'   => 'Total Inspections admin dashboard and the inspector app on a phone',
            'tag'   => 'Property',
            'title' => 'Total Inspection — Property Inspection App',
            'text'  => 'An iOS and Android app for residential, commercial and pre-purchase inspections — checklists, photo markup and branded PDF reports generated on the spot.',
            'points' => ['Works fully offline', 'Photo markup tools', 'Automated branded PDFs'],
        ],
        [
            'img'   => 'csd/projects/hazcom.webp',
            'alt'   => 'HazCom hazard reporting dashboard and the mobile hazard report list',
            'tag'   => 'Mining & Safety',
            'title' => 'HazCom — Hazard Reporting Platform',
            'text'  => 'Crews log hazards from the field with photos, severity and location; supervisors triage, investigate and close them out from a central dashboard.',
            'points' => ['Mobile hazard reporting', 'Investigation workflow', 'Safety analytics & exports'],
        ],
        [
            'img'   => 'csd/projects/instrowest.webp',
            'alt'   => 'Instrowest calibration management dashboard and a mobile QA/QC checklist',
            'tag'   => 'Industrial',
            'title' => 'Instrowest — Calibration Management',
            'text'  => 'Calibration workflows for control valves, shutdown valves, transmitters and switches, with QA/QC checks and traceable as-found and as-left records.',
            'points' => ['Four calibration workflows', 'QA/QC checklists', 'Equipment traceability'],
        ],
        [
            'img'   => 'csd/projects/richards-aluminium.webp',
            'alt'   => 'Richards Aluminium formula builder with a double door window template',
            'tag'   => 'Manufacturing · TAS',
            'title' => 'Richards Aluminium — Formula Builder',
            'text'  => 'Window and door designs sketched on screen with Excel-style formulas behind them, costing material and length automatically — in place of an error-prone spreadsheet.',
            'points' => ['Digital sketch pad', 'Excel-like formula builder', 'Automated cost calculation'],
        ],
        [
            'img'   => 'csd/projects/proscaff.webp',
            'alt'   => 'Pro-Scaff CRM product list on desktop and the job pipeline on mobile',
            'tag'   => 'CRM & Operations',
            'title' => 'Proscaff — Vendor CRM & Job Management',
            'text'  => 'Quoting, scheduling, timesheets, invoicing and asset tracking across web and mobile, so the office and the field work from the same job record.',
            'points' => ['Quote to job tracking', 'Scheduling & timesheets', 'MYOB-integrated invoicing'],
        ],
        [
            'img'   => 'csd/projects/tas-precision.webp',
            'alt'   => 'Tas Precision job management dashboard and the mobile job category list',
            'tag'   => 'Job Management',
            'title' => 'Tas Precision — Job & Estimation Platform',
            'text'  => 'Job tracking, document storage, branded report templates and structured estimating in one dashboard, with DocuSign handling the sign-off.',
            'points' => ['Job dashboard & filters', 'Branded PDF reports', 'DocuSign signatures'],
        ],
    ],

    /* ---- What we build ----------------------------------------------- */
    'build_eyebrow' => 'What we build',
    'build_title'   => 'Custom software for real business problems',
    'build_lead'    => 'Designed around your workflow, your people and your data – not a template.',
    'build_cards'   => [
        [
            'title' => 'Business Systems',
            'text'  => 'Job management, inspections, bookings, scheduling, compliance – the system your team runs on every day.',
            'icon'  => '<svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="14" rx="2" pathLength="1"/><path d="M8 21h8M12 18v3" pathLength="1"/><path d="M6 13l3-3 3 2 5-5" pathLength="1"/></svg>',
            'link'  => 'Build a business system',
        ],
        [
            'title' => 'Customer & Staff Portals',
            'text'  => 'Secure logins where customers track orders, submit requests and manage their account without calling you.',
            'icon'  => '<svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" pathLength="1"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7" pathLength="1"/></svg>',
            'link'  => 'Build a custom portal',
        ],
        [
            'title' => 'Dashboards & Reporting',
            'text'  => 'Live numbers in one place. No more weekly exports or chasing people for updates.',
            'icon'  => '<svg viewBox="0 0 24 24"><path d="M4 20V10M10 20V4M16 20v-7M22 20H2" pathLength="1"/></svg>',
            'link'  => 'Build a live dashboard',
        ],
        [
            'title' => 'Workflow Automation',
            'text'  => 'Approvals, quotes, reports and reminders that run themselves, so your team can do the real work.',
            'icon'  => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3" pathLength="1"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M4.9 19.1L7 17M17 7l2.1-2.1" pathLength="1"/></svg>',
            'link'  => 'Automate your workflows',
        ],
        [
            'title' => 'Integrations & APIs',
            'text'  => 'Connect Xero, MYOB, your CRM, payment gateways or hardware so data flows once, correctly.',
            'icon'  => '<svg viewBox="0 0 24 24"><path d="M8 6l-6 6 6 6M16 6l6 6-6 6" pathLength="1"/><path d="M14 4l-4 16" pathLength="1"/></svg>',
            'link'  => 'Integrate your systems',
        ],
        [
            'title' => 'Web + Mobile Together',
            'text'  => 'An admin web app for the office and a mobile app for the field, built as one connected system.',
            'icon'  => '<svg viewBox="0 0 24 24"><rect x="2" y="4" width="14" height="11" rx="2" pathLength="1"/><rect x="15" y="9" width="7" height="12" rx="1.5" pathLength="1"/><path d="M6 19h6" pathLength="1"/></svg>',
            'link'  => 'Build a connected app',
        ],
    ],

    /* ---- Built to own ------------------------------------------------ */
    'own_eyebrow' => 'Built to own, not rent',
    'own_title'   => 'Pay once for the build. Own it for good.',
    'own_lead'    => 'With off-the-shelf software you rent someone else’s product forever. With us, the code, the data and the roadmap are yours.',
    'own_points'  => [
        'Full source code handed over',
        'Hosted on your account, not ours',
        'Add users without adding costs',
        'Change it whenever your business changes',
    ],
    /* [row label, custom, off-the-shelf]; the first row is the header */
    'own_compare' => [
        ['Feature', 'Custom', 'Off-the-shelf'],
        ['Fits your process', '✓ Yes', 'Partly'],
        ['Per-user fees', '✓ None', 'Monthly, forever'],
        ['You own the code', '✓ Yes', 'No'],
        ['Connects to your tools', '✓ Built in', 'If supported'],
        ['Feature requests', '✓ Your call', 'Their roadmap'],
    ],

    /* ---- Process ----------------------------------------------------- */
    'process_eyebrow' => 'How we work',
    'process_title'   => 'From first call to go-live',
    'process_lead'    => 'A clear process so you always know where the project is and what’s next.',
    'process_steps'   => [
        ['Discovery Call',     'A free chat about the problem, your team and what success looks like.'],
        ['Scoping',            'We map your workflows and write a Scope of Work – features, timeline and cost, in writing.'],
        ['Design & Prototype', 'Wireframes and a clickable prototype so you see it before a line of code is written.'],
        ['Build in Sprints',   'Working software every couple of weeks. You test it, we adjust.'],
        ['Test & Launch',      'Full QA, data migration, staff handover and a smooth go-live.'],
        ['Support & Grow',     'Bug fixes, updates and new features as your business grows.'],
    ],

    /* ---- Pricing ----------------------------------------------------- */
    'pricing_eyebrow' => 'Pricing',
    'pricing_title'   => 'No guesswork on cost',
    'pricing_lead'    => 'Every business is different, so we don’t sell off-the-rack packages. Here’s how we get you to a firm number.',
    'pricing_cta'     => 'Book Your Free Discovery Call',
    /* [step label, price line, heading, copy, featured?, ribbon] */
    'pricing_cards'   => [
        ['Step 1', 'Free', 'Discovery Call', '30 minutes to understand the problem and tell you honestly whether custom software is the right move.', false, ''],
        ['Step 2', 'Paid Scoping', 'Scope of Work', 'We map workflows, users and integrations, then give you a detailed scope, timeline and fixed quote.', true, 'Where the clarity comes from'],
        ['Step 3', 'Fixed Quote', 'Build', 'Agreed price, agreed dates, agreed deliverables. No surprise invoices halfway through.', false, ''],
    ],

    /* ---- Reviews ----------------------------------------------------- */
    'reviews_eyebrow' => 'Client feedback',
    'reviews_title'   => 'What our clients say',
    'reviews'         => [
        ['They built a solid, easy-to-use web and mobile system for our onsite inspection reports. We use it every day – and no more expensive per-user subscriptions.', 'Ruchi Gurung', 'Google Review'],
        ['From requirement gathering and UI/UX right through to the full web and mobile application, the whole process was smooth. On time, on budget.', 'Stephen Rainbird', 'Google Review'],
        ['Our project stalled with another company. Media Clock got it back on track, finished it, and has maintained it for over two years.', 'Tymspen Co.', 'Google Review'],
    ],

    /* ---- FAQ --------------------------------------------------------- */
    'faq_eyebrow' => 'FAQ',
    'faq_title'   => 'Common questions',
    'faq'         => [
        ['How much does custom software cost?', 'It depends on the number of users, workflows and integrations. After a free discovery call, we run a paid scoping session and give you a fixed quote in writing before any build starts.'],
        ['How long does it take?', 'A focused first version usually takes a few months. Larger systems with many user roles or integrations take longer. You’ll get dates in writing during scoping.'],
        ['Who owns the software?', 'You do. Source code, data and documentation are handed over to you. No lock-in, no exit fees.'],
        ['Can it work with the systems we already use?', 'Yes. We connect to accounting software, CRMs, payment gateways, email and any system with a documented API, so you don’t have to replace everything at once.'],
        ['We’re a small business. Is custom software worth it?', 'Often, yes – especially if you’re paying for several subscriptions or losing hours to manual work. We’ll tell you honestly on the discovery call if an off-the-shelf tool is the better fit.'],
        ['Can you fix or replace our existing software?', 'Yes. We start with a review of what you have, then tell you whether it’s cheaper to improve it or rebuild it.'],
        ['What happens after launch?', 'We offer ongoing support covering bug fixes, security updates and new features, sized to what your system needs.'],
        ['Is my idea kept confidential?', 'Yes. We sign an NDA before you share any details, and it stays in place for the life of the project.'],
    ],

    /* ---- Closing CTA ------------------------------------------------- */
    'cta_title' => 'Ready to stop working around your software?',
    'cta_text'  => 'Tell us what’s slowing your team down. We’ll show you what a custom system could look like – free, no obligation.',
    'cta_btn'   => 'Book a Free Discovery Call',

    /* ---- Footer ------------------------------------------------------ */
    'footer_tagline' => 'Custom software, mobile apps and web applications for Australian businesses.',
];
