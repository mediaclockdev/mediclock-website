<?php
/* ============================================================
   * Services — single source of truth
   The header mega menu, the footer column and the hero's
   "Select your Service" dropdown all read this one array, so a
   service is added or renamed in exactly one place.

   Shape:  'Category name' => [ ['Service label', 'url'], ... ]

   Add the remaining services under the right category below.
   Three categories fill the mega panel's three columns neatly;
   add a fourth and the panel will wrap to a second row.
   ============================================================ */
return [
    'Development' => [
        ['Mobile App Development',    'https://mediaclock.com.au/mobile-app-development/'],
        ['Web Application',           'https://mediaclock.com.au/web-application/'],
        ['Website Development',       'https://mediaclock.com.au/website-development/'],
        ['eCommerce Website Design',  'https://mediaclock.com.au/ecommerce-website-design/'],
    ],
    'Design & Experience' => [
        ['UI/UX Design',              'https://mediaclock.com.au/ui-ux-design/'],
    ],
    'Marketing & Growth' => [
        ['Digital Marketing',         'https://mediaclock.com.au/digital-marketing/'],
        ['SEO Packages',              '#top'],
        ['Business Digitisation',     'https://mediaclock.com.au/business-digitisation/'],
    ],
];
