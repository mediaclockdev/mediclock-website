<?php
/* ============================================================
   * Portfolio (new) — case studies shown in the "Our recent work" grid
   Read by includes/sections/portfolio/work.php. Order here = order on screen.

     'meta'   the line under the title: what the project is about (its
              industry and what it does), not our services
     'type'   filter group: 'web' | 'app' | 'product' (see 'filters' below)
     'wide'   true = 7 of 12 columns, false = 5. Alternate them so each
              row of two adds up to 12.
     'layout' how the screenshot is framed:
                'browser' one desktop screenshot in a browser window
                'device'  one phone screenshot, cropped at the bottom
                'phones'  two full phone screenshots, side by side
     'theme'  the card's background tint (pf-theme-<theme> in portfolio-new.css)
     'images' [ [src under assets/images/, alt], ... ]
     'case_study' optional — slug of data/portfolio/case-studies/<slug>.php;
              the card then links to <case_study_base>/<slug>/
   ============================================================ */
return [
    // Case studies live under the test portfolio until it replaces /portfolio/;
    // then change this to 'portfolio' (and the rule in .htaccess and router.php)
    'case_study_base' => 'portfolio-new',
    'filters' => [
        'all'     => 'All work',
        'web'     => 'Websites',
        'app'     => 'Mobile apps',
        'product' => 'Digital products',
    ],
    'projects' => [
        [
            'title'  => 'Total Inspections',
            // 'meta'   => 'Admin portal · Product design · Development',
            'meta'   => 'Property inspections · Checklists · PDF reports',
            'tag'    => 'Web application',
            'type'   => 'web',
            'wide'   => true,
            'layout' => 'browser',
            'theme'  => 'slate',
            'case_study' => 'total-inspections',
            'images' => [
                ['pages/portfolio/work/total-inspections.webp', 'Total Inspections template management dashboard'],
            ],
        ],
        [
            'title'  => 'Trevor',
            // 'meta'   => 'Site management · Mobile app · Product design',
            // 'meta'   => 'WHS & safety · Site audits · Photo evidence',
            'meta'   => 'WHS & safety · Site audits · Contractors', /* the app's own tabs: Site Manager, Contractor, Create Audit */
            'tag'    => 'Mobile app',
            'type'   => 'app',
            'wide'   => false,
            'layout' => 'device',
            'theme'  => 'green',
            'images' => [
                ['pages/portfolio/work/trevor.webp', 'Trevor site management mobile application screen'],
            ],
        ],
        [
            'title'  => 'Shelynx',
            // 'meta'   => 'Shopping platform · Mobile app · Product design',
            // 'meta'   => 'Retail · Online shopping · Order tracking',
            'meta'   => 'Fashion retail · Online shopping · Local delivery', /* what the screens show; no order tracking on them */
            'tag'    => 'Mobile app',
            'type'   => 'app',
            'wide'   => false,
            'layout' => 'phones',
            'theme'  => 'blush',
            'images' => [
                ['pages/portfolio/work/shelynx-home.webp', 'Shelynx mobile shopping home screen'],
                ['pages/portfolio/work/shelynx-discover.webp', 'Shelynx product discovery mobile screen'],
            ],
        ],
        [
            'title'  => 'Hazcom',
            // 'meta'   => 'Safety platform · Admin dashboard · Development',
            'meta'   => 'Mining & safety · Hazard reporting · Analytics',
            'tag'    => 'Web application',
            'type'   => 'product',
            'wide'   => true,
            'layout' => 'browser',
            'theme'  => 'blue',
            'images' => [
                ['pages/portfolio/work/hazcom.webp', 'Hazcom SuperAdmin dashboard'],
            ],
        ],
    ],
];
