<?php
/* ============================================================
   * Case study — HazCom
   Read by case-study.php for /portfolio-new/hazcom/.
   Same shape as total-inspections.php (see the notes at the top of that
   file). Copy from the HazCom case study design; the screens are
   screenshots of the mobile app and the super admin dashboard, except
   Report Hazard and Notifications, which are drawn mockups (bug list #21).
   ============================================================ */
$csImg = 'pages/portfolio/case-studies/hazcom/';

return [
    'title'       => 'HAZCOM',
    'name'        => 'HazCom', /* the enquiry says "HazCom case study", not the capitals */
    'subtitle'    => 'A hazard reporting and safety management platform built for mining organisations that need a more efficient way to identify, investigate, and resolve workplace safety issues.',
    // 'meta_title'  => 'HazCom case study | Media Clock',
    'meta_title'  => 'HazCom Case Study | Media Clock',
    // 'description' => 'How Media Clock designed and built HazCom, a hazard reporting and safety management platform for mining, with mobile reporting, investigations and an admin dashboard.',
    'description' => 'How Media Clock built HazCom, a hazard reporting and safety platform for mining teams, with mobile reporting, investigations and an admin dashboard.', /* under 155 characters, so search results show it whole */

    'problem' => [
        // 'title'  => 'The challenge',
        'title'  => 'The Challenge',
        'body'   => [
            'Managing workplace hazards requires reliable reporting, investigation, compliance tracking, and safety communication. HazCom needed to streamline the safety workflow, from hazard reporting in the field through to investigation, resolution, reporting, and management oversight. The platform was designed to help organisations maintain centralised hazard records and monitor safety activities.',
            'The platform also had to support multiple user roles, provide timely notifications, and deliver a consistent experience across both mobile and web applications.',
        ],
        'visual' => [
            'device' => 'phone',
            'image'  => [$csImg . 'employee-directory.webp', 'HazCom employee directory screen'],
            'label'  => 'HazCom employee directory screen',
        ],
    ],

    'approach' => [
        // 'title'    => 'The approach',
        'title'    => 'The Approach',
        'subtitle' => 'HazCom was designed as a digital safety management platform that helps workers, supervisors, and management teams coordinate workplace safety activities.',
        'body'     => [
            'The mobile application enables employees to report hazards using descriptions, categories, severity levels, location details, and photos. Management teams can review reports, manage investigations, track progress, and monitor outcomes through a centralised administrative dashboard.',
            'A role-based permission system ensures users have access according to their responsibilities, while automated push and email notifications keep teams informed about report approvals, rejections, updates, and comments.',
            'The result is a centralised, transparent, and data-driven approach to workplace hazard reporting and safety management.',
        ],
        'visual'   => [
            'device' => 'phone',
            'image'  => [$csImg . 'hazard-history.webp', 'HazCom hazard history screen'],
            'label'  => 'HazCom hazard history screen',
        ],
    ],

    'features' => [
        // 'title'  => 'Key features',
        'title'  => 'Key Features',
        'items'  => [
            ['Digital Hazard Reporting', 'Employees can submit workplace hazards with severity levels, categories, descriptions, and location details directly through the mobile application.'],
            ['Photo Evidence & Mobile Reporting', 'Built-in image capture allows users to attach photos to reports, providing additional context for hazard reports and investigations.'],
            ['Investigation & Resolution Workflow', 'Hazards can be tracked from initial submission through investigation, resolution, and final closure.'],
            ['Role-Based Safety Management', 'Dedicated access levels for employees, supervisors, mine managers, administrators, and super admins support controlled access and platform management.'],
        ],
        'visual' => [
            'device' => 'laptop',
            'image'  => [$csImg . 'dashboard.webp', 'HazCom super admin dashboard'],
            'label'  => 'HazCom super admin dashboard on a laptop',
        ],
    ],

    'screens' => [
        // 'title'    => 'Platform experience',
        'title'    => 'Platform Experience',
        /* two lines in the design, so a list */
        'subtitle' => [
            'A digital safety management platform designed to help mining organisations improve hazard visibility, support compliance processes, and strengthen workplace safety management.',
            'Employees can report hazards through mobile applications, while management teams gain centralised oversight, safety reporting capabilities, and visibility into hazard records and statuses to support workplace safety operations.',
        ],
        // 'images'   => [
        //     [$csImg . 'employee-directory.webp', 'HazCom employee directory screen'],
        //     [$csImg . 'hazard-history.webp', 'HazCom hazard history screen'],
        //     [$csImg . 'hazard-details.webp', 'HazCom hazard details screen'],
        // ],
        /* tester's bug list #21: the first two repeated "The Challenge" and "The Approach".
           The design has no other phone screens, so Report Hazard and Notifications are
           drawn mockups in the app's style (sample data); Hazard Details is the real one. */
        'images'   => [
            [$csImg . 'report-hazard.webp', 'HazCom report hazard form with severity, location and photos'],
            [$csImg . 'hazard-details.webp', 'HazCom hazard details screen'],
            [$csImg . 'notifications.webp', 'HazCom notifications for approvals, comments and status updates'],
        ],
    ],

    'cta' => [
        // 'title'  => 'Build your next digital product with Media Clock',
        'title'  => 'Build Your Next Digital Product with Media Clock',
        'button' => 'Talk to Media Clock',
    ],
];
