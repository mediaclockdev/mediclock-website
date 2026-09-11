<?php
/* ============================================================
   * Testimonials — shared data
   Real client quotes, as published on the live service pages.
   Read by includes/components/testimonials.php. Images live in
   assets/images/testimonials/.

   Shape: [
     'quote'    => plain text, no quote marks (the component adds them),
     'name'     => client name,
     'role'     => one line, or an array of lines,
     'avatar'   => photo path (relative to assets/images/), '' for none,
     'logo'     => company logo path, '' for none,
     'logo_alt' => company name for the logo's alt text,
     'logo_w', 'logo_h' => the logo's intrinsic size (optional),
   ]
   ============================================================ */
return [
    [
        'quote'    => 'The final output of the application looks good. It met my requirements and overall, the project was successful.',
        'name'     => 'Dr. Katherine H. Gill',
        'role'     => ['Allied Health Manager and Director', 'Senior Occupational Therapist'],
        'avatar'   => 'testimonials/katherine-gill.webp',
        'logo'     => 'testimonials/katherine-gill-logo.webp',
        'logo_alt' => 'FND Australia Support Services Inc',
        'logo_w'   => 156,
        'logo_h'   => 173,
    ],
    [
        'quote'    => "Media Clock's ability to create a stunning and functional website that perfectly met our needs was impressive.",
        'name'     => 'Adam Death',
        'role'     => ['Managing Director', 'Harvest Vegetarian Restaurant'],
        'avatar'   => 'testimonials/adam-death.webp',
        'logo'     => 'testimonials/adam-death-logo.webp',
        'logo_alt' => 'Harvest Vegetarian Restaurant',
        'logo_w'   => 294,
        'logo_h'   => 176,
    ],
    [
        'quote'    => "Media Clock has reset our website as close to the original as possible. They've finally succeeded with my request.",
        'name'     => 'Tony Williams',
        'role'     => ['CEO', 'Compella Compression'],
        'avatar'   => 'testimonials/tony-williams.webp',
        'logo'     => 'testimonials/tony-williams-logo.webp',
        'logo_alt' => 'Compella Compression',
        'logo_w'   => 248,
        'logo_h'   => 176,
    ],
    [
        'quote'    => 'The team delivered on time and within budget. They were flexible and worked within our project requirements.',
        'name'     => 'A/Prof. George',
        'role'     => ['Executive', 'Glance Optical'],
        'avatar'   => 'testimonials/george.webp',
        'logo'     => 'testimonials/george-logo.webp',
        'logo_alt' => 'MRF',
        'logo_w'   => 271,
        'logo_h'   => 110,
    ],
    [
        'quote'    => "The team's collaboration and positive attitude to deliver the job to everyone's satisfaction were impressive.",
        'name'     => 'Dinesh Singh',
        'role'     => ['Managing Director', 'Carbon Co Pty Ltd'],
        'avatar'   => 'testimonials/dinesh-singh.webp',
        'logo'     => 'testimonials/dinesh-singh-logo.webp',
        'logo_alt' => 'CarbonCo',
        'logo_w'   => 342,
        'logo_h'   => 134,
    ],
];
