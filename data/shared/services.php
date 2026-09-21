<?php
/* ============================================================
   * Services — single source of truth
   The header mega menu, the footer column and the hero's
   "Select your Service" dropdown all read this one array, so a
   service is added or renamed in exactly one place.

   Shape:  'Category name' => [ ['Service label', 'page slug'], ... ]
   The slug is the page file without .php; page_url() turns it into /slug/.

   Add the remaining services under the right category below.
   Three categories fill the mega panel's three columns neatly;
   add a fourth and the panel will wrap to a second row.
   ============================================================ */
return [
    'Development' => [
        ['Mobile App Development',    'mobile-app-development'],
        ['iOS App Development',       'ios-development'],
        ['Web Application',           'web-application'],
        ['Website Development',       'website-development'],
        ['eCommerce Website Design',  'ecommerce-website-design'],
    ],
    'Design & Experience' => [
        ['UI/UX Design',              'ui-ux-design'],
    ],
    'Marketing & Growth' => [
        ['Digital Marketing',         'digital-marketing'],
        ['SEO Packages',              'package'],
        ['Business Digitisation',     'business-digitisation'],
    ],
];
