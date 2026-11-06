<?php
/* ============================================================
   * Case study — Tas Precision
   Read by case-study.php for /portfolio-new/tas-precision/.
   Same shape as total-inspections.php (see the notes at the top of that
   file). Copy from the Tas Precision case study design. The first three
   screens are the design's own. Its last section showed the approach laptop
   and the key features phone again, so that section has the app's
   Calculation of Amount and Category screens instead, cut from
   assets/images/csd/projects/tas-precision.webp (as on Trevor).
   ============================================================ */
$csImg = 'pages/portfolio/case-studies/tas-precision/';

return [
    'title'       => 'TAS PRECISION',
    'name'        => 'Tas Precision', /* the enquiry says this, not the capitals */
    'subtitle'    => 'A digital platform for job management, estimation, reporting, documentation, and approvals.',
    'meta_title'  => 'Tas Precision Case Study | Media Clock',
    'description' => 'How Media Clock built Tas Precision, a job management platform with estimates, branded PDF reports, document storage and DocuSign approvals.', /* under 155 characters */
    /* the hero shows the client's logo instead of the orange shapes (Tas Precision header design) */
    'hero_logo'   => [$csImg . 'logo.webp', 972, 1066],

    'problem' => [
        'title'  => 'The Challenge',
        'body'   => [
            'Tas Precision needed a simpler way to manage jobs, supporting documents, reports, estimates, and approvals across its operations.',
            'Information was spread across disconnected workflows, making it difficult to monitor job progress, locate documents, and maintain consistent reporting.',
            'The platform also needed structured job statuses, flexible search, reliable document storage, professional report generation, accurate estimation, and secure digital approval workflows.',
        ],
        'visual' => [
            'device' => 'tablet',
            'image'  => [$csImg . 'notifications-desktop.webp', 'Tas Precision notifications for assigned and completed jobs'],
            'ratio'  => '16 / 9', /* the screenshot's own shape */
            'label'  => 'Tas Precision job notifications on a tablet',
        ],
    ],

    'approach' => [
        'title'    => 'The Approach',
        /* the design's first paragraph, as the line under the heading like the other case studies */
        'subtitle' => 'Tas Precision was developed as a centralised job management platform for teams managing clients, jobs, documents, estimates, reports, and approvals.',
        'body'     => [
            'Teams can create and update jobs, organise supporting files, prepare scopes and estimates, generate branded PDF documents, and send reports for digital signatures.',
            'Search filters and job statuses provide clearer visibility from initial job creation through completion and approval.',
        ],
        'visual'   => [
            'device' => 'laptop',
            'image'  => [$csImg . 'active-jobs-desktop.webp', 'Tas Precision active jobs list with region, status, client and assignee'],
            'ratio'  => '16 / 9',
            'label'  => 'Tas Precision active jobs dashboard on a laptop',
        ],
    ],

    'features' => [
        'title'  => 'Key Features',
        'items'  => [
            ['Job Management Dashboard', 'Search, filter, and monitor jobs by client, region, status, invoice status, scope status, and other operational criteria.'],
            ['Document and Report Management', 'Store invoices, reports, photos, instructions, contracts, and completion certificates within each job.'],
            ['Estimation and PDF Generation', 'Create scopes, add line items, calculate costs, manage multiple estimates, and generate branded PDF documents.'],
            ['Digital Approval Workflows', 'Send documents through DocuSign and track Sent, Viewed, and Signed statuses directly from the platform.'],
        ],
        'visual' => [
            'device' => 'phone',
            'image'  => [$csImg . 'job-menu-mobile.webp', 'Tas Precision mobile menu with job status categories'],
            'label'  => 'Tas Precision job navigation on a phone',
        ],
    ],

    'screens' => [
        'title'    => 'Platform Experience',
        'subtitle' => 'Complete job visibility from creation through approval.',
        /* a desktop and a phone side by side, like Trevor and Richards Aluminium */
        'pair'     => [
            'laptop' => [$csImg . 'calculation-desktop.webp', 'Tas Precision Calculation of Amount screen filtering jobs by region, status and category'],
            'phone'  => [$csImg . 'categories-mobile.webp', 'Tas Precision mobile app listing jobs by category with counts'],
        ],
    ],

    'cta' => [
        'title'  => 'Build Your Next Digital Product with Media Clock',
        'button' => 'Talk to Media Clock',
    ],
];
