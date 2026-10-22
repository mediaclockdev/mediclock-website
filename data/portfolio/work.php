<?php
/* ============================================================
   * Portfolio (new) — case studies shown in the "Our recent work" grid
   Read by includes/sections/portfolio/work.php. Order here = order on screen.

     'type'   filter group: 'web' | 'app' | 'product' (see 'filters' below)
     'wide'   true = 7 of 12 columns, false = 5. Alternate them so each
              row of two adds up to 12.
     'layout' how the screenshot is framed:
                'browser' one desktop screenshot in a browser window
                'device'  one phone screenshot, cropped at the bottom
                'phones'  two full phone screenshots, side by side
     'theme'  the card's background tint (pf-theme-<theme> in portfolio-new.css)
     'images' [ [src under assets/images/, alt], ... ]
   ============================================================ */
return [
    'filters' => [
        'all'     => 'All work',
        'web'     => 'Websites',
        'app'     => 'Mobile apps',
        'product' => 'Digital products',
    ],
    'projects' => [
        [
            'title'  => 'Total Inspections',
            'meta'   => 'Admin portal · Product design · Development',
            'tag'    => 'Web application',
            'type'   => 'web',
            'wide'   => true,
            'layout' => 'browser',
            'theme'  => 'slate',
            'images' => [
                ['pages/portfolio/work/total-inspections.webp', 'Total Inspections template management dashboard'],
            ],
        ],
        [
            'title'  => 'Trevor',
            'meta'   => 'Site management · Mobile app · Product design',
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
            'meta'   => 'Shopping platform · Mobile app · Product design',
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
            'meta'   => 'Safety platform · Admin dashboard · Development',
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
