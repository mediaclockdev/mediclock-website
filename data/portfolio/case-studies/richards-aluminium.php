<?php
/* ============================================================
   * Case study — Richards Aluminium
   Read by case-study.php for /portfolio-new/richards-aluminium/.
   Same shape as total-inspections.php (see the notes at the top of that
   file). Copy from the Richards Aluminium case study design. The screens
   section is one desktop and one phone, not a fan, as in the design.
   The two formula builder screenshots were cut out of the design's own
   monitor and phone frames so they sit in the page's frames like every
   other case study. The design had no other screens, so the approach
   laptop and the screens pair are drawn mockups (tester's bug list #19, #20).
   ============================================================ */
$csImg = 'pages/portfolio/case-studies/richards-aluminium/';

return [
    'title'       => 'RICHARDS ALUMINIUM',
    'name'        => 'Richards Aluminium', /* the enquiry says this, not the capitals */
    // 'subtitle'    => 'A Custom Window Design & Automated Estimation System',
    /* the line under the heading is a sentence on the other case studies, so the same here */
    'subtitle'    => 'A custom window design and automated estimation system.',
    // 'meta_title'  => 'Richards Aluminium case study | Media Clock',
    'meta_title'  => 'Richards Aluminium Case Study | Media Clock',
    // 'description' => 'How Media Clock built a custom window design and formula builder system for Richards Aluminium that automates material quantities, costing and fabrication sheets.',
    'description' => 'How Media Clock built a window design and formula builder system for Richards Aluminium, automating material quantities, costing and fabrication sheets.', /* under 155 characters */

    'problem' => [
        // 'title'  => 'The challenge',
        'title'  => 'The Challenge',
        'body'   => [
            // 'Richards Aluminium, based in Mornington, TAS 7018, relied on a manual process to design and estimate window constructions. Creating designs in Excel, writing formulas, and calculating aluminium requirements and costs was time-consuming and prone to errors.',
            'Richards Aluminium, based in Mornington, TAS 7018, relied on a manual process to design windows and estimate their costs. Creating designs in Excel, writing formulas, and calculating aluminium requirements and costs were time-consuming and prone to errors.',
            'The business needed a streamlined solution to design window and door configurations, manage materials, and automate quantity and pricing calculations.',
        ],
        'visual' => [
            'device' => 'laptop',
            'image'  => [$csImg . 'formula-builder-desktop.webp', 'Richards Aluminium formula builder desktop screenshot'],
            /* the screenshot is wider than the laptop's usual screen; this shows all of it */
            'ratio'  => '1350 / 741',
            'label'  => 'Richards Aluminium formula builder on a laptop',
        ],
    ],

    'approach' => [
        // 'title'    => 'The approach',
        'title'    => 'The Approach',
        // 'subtitle' => 'Media Clock developed a customised Window Design and Formula Builder system to digitise design and estimation workflows.',
        'subtitle' => 'Media Clock developed a custom window design and formula builder system to digitise the design and estimation workflow.',
        'body'     => [
            'The system combines a digital sketch pad with a flexible formula builder, supporting arithmetic, comparison, and conditional operators. It automates material quantity and pricing calculations while supporting reusable templates, project management, and fabrication documentation.',
            'Users can also export material quantity and cost data to Excel for further processing and optimisation.',
        ],
        /* was: no 'visual', so the copy ran in one centred column */
        /* tester's bug list #19: every other case study has a device here. The design had
           no screenshot for it, so this is a drawn mockup of the project costing screen in the
           app's own style (sample project and prices). Swap in a real screenshot when there is one. */
        'visual'   => [
            'device' => 'laptop',
            'image'  => [$csImg . 'project-costing-desktop.webp', 'Richards Aluminium project costing screen with material quantities and selling price'],
            'label'  => 'Richards Aluminium project costing on a laptop',
        ],
    ],

    'features' => [
        // 'title'  => 'Key features',
        'title'  => 'Key Features',
        'items'  => [
            ['Window & Door Design', 'Create designs using a digital sketch pad.'],
            // ['Formula Builder & Automated Calculations', 'Build custom formulas and automatically calculate material quantities, cost prices, and selling prices.'],
            ['Formula Builder & Automated Calculations', 'Build custom formulas and automatically calculate material quantities, material cost, and selling prices.'], /* tester's bug list #18 */
            ['Material Management', 'Manage aluminium, glass, hardware, pricing, and units.'],
            ['Fabrication Details & Excel Export', 'Generate printable fabrication sheets and export material quantity and cost data.'],
        ],
        'visual' => [
            'device' => 'phone',
            'image'  => [$csImg . 'formula-builder-mobile.webp', 'Richards Aluminium formula builder mobile screenshot'],
            'label'  => 'Richards Aluminium formula builder on a phone',
        ],
    ],

    'screens' => [
        // 'title'    => 'System experience',
        'title'    => 'System Experience',
        'subtitle' => 'Design windows and doors, calculate materials, and generate accurate estimates in one streamlined system.',
        /* a desktop and a phone side by side instead of the fan of phones */
        // 'pair'     => [
        //     'laptop' => [$csImg . 'formula-builder-desktop.webp', 'Richards Aluminium desktop estimation screenshot'],
        //     'ratio'  => '1350 / 741',
        //     'phone'  => [$csImg . 'formula-builder-mobile.webp', 'Richards Aluminium mobile estimation screenshot'],
        // ],
        /* tester's bug list #20: the two screenshots above are already used in "The Challenge"
           and "Key Features", so these are drawn mockups in the app's style instead
           (materials list and the phone costing view; sample data) */
        'pair'     => [
            'laptop' => [$csImg . 'materials-desktop.webp', 'Richards Aluminium materials list with purchase price, markup and sell price'],
            'phone'  => [$csImg . 'project-costing-mobile.webp', 'Richards Aluminium project costing on a phone'],
        ],
    ],

    'cta' => [
        // 'title'  => 'Want to see more? Discuss customised software for manufacturing workflows, automated calculations, and material management.',
        /* the design's one long heading ran to five lines; the question stays the heading */
        // 'title'  => 'Want to see more?',
        'title'  => 'Want to See More?',
        // 'text'   => 'Discuss customised software for manufacturing workflows, automated calculations, and material management.',
        'text'   => 'Let’s discuss custom software for manufacturing workflows, automated calculations, and material management.',
        // 'button' => 'Get in touch with us',
        'button' => 'Get in Touch with Us',
    ],
];
