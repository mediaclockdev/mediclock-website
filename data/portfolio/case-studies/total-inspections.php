<?php
/* ============================================================
   * Case study — Total Inspections
   Read by case-study.php for /portfolio-new/total-inspections/.
   The file name is the URL slug.

   Every case study file has the same shape:
     'title', 'subtitle'      hero heading and line under it
     'meta_title', 'description'
     'problem'   title, body (paragraphs), visual
     'approach'  title, subtitle, body, visual
     'features'  title, items [[title, copy], ...], visual
     'screens'   title, subtitle, images [[src, alt], ...]   (up to 5 phones)
     'cta'       title, button
     'scripts'   optional extra JS under assets/js/ (e.g. live mockups)

   A 'visual' is one device beside the copy:
     ['device' => 'tablet' | 'laptop', 'mockup' => 'name', 'label' => '…']
         an HTML mockup: includes/case-studies/<slug>/<name>.php
     ['device' => 'tablet' | 'laptop', 'image' => [src, alt], 'label' => '…']
         a screenshot instead of a mockup
     ['device' => 'phone-scroll', 'image' => [src, alt, width, height], 'label' => '…']
         one tall phone screenshot that scrolls slowly inside the phone
     ['device' => 'phone', 'image' => [src, alt], 'label' => '…']
         one phone screenshot, still
   Images are paths under assets/images/.
   ============================================================ */
$csImg = 'pages/portfolio/case-studies/total-inspections/';

return [
    'title'       => 'Total Inspections',
    'subtitle'    => 'A property inspection app for iOS and Android',
    'meta_title'  => 'Total Inspections case study | Media Clock',
    'description' => 'How Media Clock designed and built Total Inspections, a property inspection app for iOS and Android with checklists, photo markup and branded PDF reports.',
    'scripts'     => ['case-studies/total-inspections'],

    'problem' => [
        'title'  => 'Problem statement',
        'body'   => [
            // 'Total Inspections is a mobile property inspection app for iOS and Android that helps professional inspectors manage residential, commercial, pre-purchase, and audit inspections. The platform digitizes inspection checklists, photo documentation, defect reporting, and automated PDF report generation.',  /* US spelling */
            'Total Inspections is a mobile property inspection app for iOS and Android that helps professional inspectors manage residential, commercial, pre-purchase, and audit inspections. The platform digitises inspection checklists, photo documentation, defect reporting, and automated PDF report generation.',
        ],
        'visual' => ['device' => 'tablet', 'mockup' => 'templates', 'label' => 'Total Inspections admin dashboard on a tablet'],
    ],

    'approach' => [
        'title'    => 'The approach',
        'subtitle' => 'We designed one flow that follows how an inspection actually runs: check, capture, mark up, report.',
        'body'     => [
            'Inspectors complete a digital checklist, photograph defects and annotate them on the image. The app then turns the findings into a professional PDF, in the business\'s own branding.',
        ],
        'visual'   => [
            'device' => 'phone-scroll',
            'image'  => [$csImg . 'home-scroll.webp', 'Total Inspections home screen', 680, 4322],
            'label'  => 'Total Inspections mobile findings screen, scrolling',
        ],
    ],

    'features' => [
        'title'  => 'Key features',
        'items'  => [
            ['Digital Inspection Checklists', 'Create and complete structured property inspections digitally.'],
            ['Property & Inspection Management', 'Manage property details, inspection types, and findings in one platform.'],
            ['Admin & Inspector Management', 'Manage inspectors, users, reports, and branded documentation.'],
            // ['Branded Reporting', 'Generate professional reports with customized business branding.'],  /* US spelling */
            ['Branded Reporting', 'Generate professional reports with customised business branding.'],
        ],
        'visual' => ['device' => 'laptop', 'mockup' => 'dashboard', 'label' => 'Total Inspections admin dashboard on a laptop'],
    ],

    'screens' => [
        'title'    => 'Mobile screens',
        // 'subtitle' => 'Everything you need in one app. Hover a screen to bring it forward.',
        'subtitle' => 'Everything you need in one app.', /* no hover hint: phones and tablets cannot hover */
        'images'   => [
            [$csImg . 'screen-1.webp', 'Total Inspections app screen 1'],
            [$csImg . 'screen-2.webp', 'Total Inspections app screen 2'],
            [$csImg . 'screen-3.webp', 'Total Inspections app screen 3'],
            [$csImg . 'screen-4.webp', 'Total Inspections app screen 4'],
            [$csImg . 'screen-5.webp', 'Total Inspections app screen 5'],
        ],
    ],

    'cta' => [
        'title'  => 'Want to see more?',
        'button' => 'Get in touch with us',
    ],
];
