<?php
/* ============================================================
   * TEMPORARY — images still to be copied from the live site
   Each key is where the file belongs (under assets/images/); each
   value is the same image on the live WordPress site. img_src() uses
   these only while the local file is missing.

   To finish: download each file below (WordPress › Media Library, or
   Hostinger File Manager › public_html/wp-content/uploads/), save it at
   assets/images/<key>, then delete this file.

   The live CDN already serves the .png entries as WebP, which is why
   their local names end in .webp.
   ============================================================ */
$u = 'https://mediaclock.com.au/wp-content/uploads/';

return [
    // hero background — Mobile App Development
    'pages/mobile-app-development/hero.webp'    => $u . '2025/11/Group-1597881321-1.webp',
    'pages/mobile-app-development/roadmap.webp' => $u . '2025/09/Group-1597880999-1-1-1024x932.png',

    // Recent Projects — phone mockups
    'pages/mobile-app-development/projects/times-table-tunes.webp'        => $u . '2025/09/Group-1597881395.png',
    'pages/mobile-app-development/projects/visit-tasmania.webp'           => $u . '2025/09/Group-1597881395-1.png',
    'pages/mobile-app-development/projects/star-calendar-calculator.webp' => $u . '2025/09/Group-1597881394.png',

    // Happy Clients logo slider
    'clients/01.webp' => $u . '2025/09/Group-1597881278-8.webp',
    'clients/02.webp' => $u . '2025/09/Group-1597881282-8.webp',
    'clients/03.webp' => $u . '2025/09/Group-1597881283-6.webp',
    'clients/04.webp' => $u . '2025/09/Group-1597881303.webp',
    'clients/05.webp' => $u . '2025/09/Group-1597881693.webp',
    'clients/06.webp' => $u . '2025/09/Group-1597881286-4.webp',
    'clients/07.webp' => $u . '2025/09/Group-1597881287-4.webp',
    'clients/08.webp' => $u . '2025/09/Group-1597881285-4.webp',
    'clients/09.webp' => $u . '2025/09/Group-1597881288-3.webp',
    'clients/10.webp' => $u . '2025/09/Group-1597881289-3.webp',
    'clients/11.webp' => $u . '2025/09/Group-1597881290-3.webp',
    'clients/12.webp' => $u . '2025/09/Group-1597881307.webp',

    // Tech-stack logo slider
    'tech/01.webp' => $u . '2025/09/Group-1597881278-9.webp',
    'tech/02.webp' => $u . '2025/09/Group-1597881282-9.webp',
    'tech/03.webp' => $u . '2025/09/Group-1597881283-7.webp',
    'tech/04.webp' => $u . '2025/09/Group-1597881284-3-3.webp',
    'tech/05.webp' => $u . '2025/09/Group-1597881279-6.webp',
    'tech/06.webp' => $u . '2025/09/Group-1597881280-6.webp',
    'tech/07.webp' => $u . '2025/09/Group-1597881285-5.webp',
    'tech/08.webp' => $u . '2025/09/Group-1597881281-6.webp',
    'tech/09.webp' => $u . '2025/09/Group-1597881286-5.webp',
    'tech/10.webp' => $u . '2025/09/Group-1597881287-5.webp',
    'tech/11.webp' => $u . '2025/09/Group-1597881288-4.webp',
    'tech/12.webp' => $u . '2025/09/Group-1597881289-4.webp',
    'tech/13.webp' => $u . '2025/09/Group-1597881290-4.webp',
    'tech/14.webp' => $u . '2025/09/Group-1597881291-4-1.webp',

    // Testimonials — client photo + company logo
    'testimonials/katherine-gill.webp'      => $u . '2025/09/Ellipse-177-1-1.webp',
    'testimonials/katherine-gill-logo.webp' => $u . '2025/09/image-removebg-preview-67-1-1-1.webp',
    'testimonials/adam-death.webp'          => $u . '2025/09/Ellipse-177-2.webp',
    'testimonials/adam-death-logo.webp'     => $u . '2025/09/image-removebg-preview-67-2.webp',
    'testimonials/tony-williams.webp'       => $u . '2025/09/image-248-1-3.webp',
    'testimonials/tony-williams-logo.webp'  => $u . '2025/09/image-250-2.webp',
    'testimonials/george.webp'              => $u . '2025/09/image-250-1.webp',
    'testimonials/george-logo.webp'         => $u . '2025/09/Group-1597881720-2.webp',
    'testimonials/dinesh-singh.webp'        => $u . '2025/09/image-252.webp',
    'testimonials/dinesh-singh-logo.webp'   => $u . '2025/09/image-254.webp',
];
