<?php
/* ============================================================
   * Case study — Trevor
   Read by case-study.php for /portfolio-new/trevor/.
   Same shape as total-inspections.php (see the notes at the top of that
   file). Copy from the Trevor case study design. The first three screens
   are the design's own (from the Trevor website); its last section showed
   two of them again, so that section has the app's Create Audit screens
   instead, cut from assets/images/csd/projects/trevor.webp.
   ============================================================ */
$csImg = 'pages/portfolio/case-studies/trevor/';

return [
    'title'       => 'TREVOR',
    'name'        => 'Trevor', /* the enquiry says this, not the capitals */
    'subtitle'    => 'A digital platform for workplace audits, evidence management, and WHS compliance.',
    'meta_title'  => 'Trevor Case Study | Media Clock',
    'description' => 'How Media Clock built Trevor, a safety audit platform with digital WHS checklists, photo evidence, corrective actions and role-based access.', /* under 155 characters */

    'problem' => [
        'title'  => 'The Challenge',
        'body'   => [
            'Paper checklists, disconnected photos, and manually maintained records made workplace safety audits difficult to manage.',
            'Trevor needed one digital workflow for inspections, evidence, corrective actions, and ongoing WHS monitoring.',
            'The platform also required secure role-based access and a consistent experience across desktop, tablet, and mobile devices.',
        ],
        'visual' => [
            'device' => 'tablet',
            'image'  => [$csImg . 'save-submit.webp', 'Trevor save and submit audit step'],
            'ratio'  => '16 / 10', /* the design's tablet shape */
            'label'  => 'Trevor save and submit audit step on a tablet',
        ],
    ],

    'approach' => [
        'title'    => 'The Approach',
        /* the design's first paragraph, as the line under the heading like the other case studies */
        'subtitle' => 'Trevor was designed as a centralised safety audit platform for administrators, auditors, site managers, contractors, and staff.',
        'body'     => [
            'Digital checklists guide Yes, No, and N/A responses, comments, evidence uploads, and improvement actions. Auditors can capture photos in the field while management teams review findings and follow-up activity in one place.',
            'Role-based permissions keep information secure and create a clearer, more accountable approach to WHS compliance.',
        ],
        'visual'   => [
            'device' => 'laptop',
            'image'  => [$csImg . 'how-it-works.webp', 'How Trevor works: creating an audit'],
            'ratio'  => '16 / 9',
            'label'  => 'Trevor audit creation steps on a laptop',
        ],
    ],

    'features' => [
        'title'  => 'Key Features',
        'items'  => [
            ['Digital Safety Audits', 'Run workplace inspections and WHS audits through structured digital workflows.'],
            ['Compliance Checklists & Actions', 'Record responses, comments, and required improvement actions.'],
            ['Photo Evidence & Audit Records', 'Capture evidence and maintain a reliable, centralised audit history.'],
            ['Role-Based Compliance', 'Provide secure access and monitor compliance status in real time.'],
        ],
        'visual' => [
            'device' => 'laptop',
            'image'  => [$csImg . 'precision-workflow.webp', 'Trevor workflow: create audit, complete inspection, save and submit'],
            'ratio'  => '16 / 9',
            'label'  => 'Trevor audit workflow overview on a laptop',
        ],
    ],

    'screens' => [
        'title'    => 'Platform Experience',
        /* two lines in the design, so a list */
        'subtitle' => [
            'Digital inspections and centralised oversight across every device.',
            'Complete inspections in the field, then review audit history, actions, and compliance status from one platform.',
        ],
        /* a desktop and a phone side by side, like Richards Aluminium */
        'pair'     => [
            'laptop' => [$csImg . 'create-audit-desktop.webp', 'Trevor Create Audit screen on desktop, listing site audits by date'],
            'ratio'  => '16 / 10',
            'phone'  => [$csImg . 'create-audit-mobile.webp', 'Trevor Create Audit screen in the mobile app'],
        ],
    ],

    'cta' => [
        'title'  => 'Build Your Next Digital Product with Media Clock',
        'button' => 'Talk to Media Clock',
    ],
];
