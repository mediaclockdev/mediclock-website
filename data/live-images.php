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

    // * Web Application — hero, roadmap, projects, why-us photos
    'pages/web-application/hero.webp'    => $u . '2025/09/Group-1597881322.webp',
    'pages/web-application/roadmap.webp' => $u . '2025/09/Group-1597880999-4-1024x931.png',
    'pages/web-application/projects/australian-scaffold.webp'      => $u . '2025/09/Group-1597881394-3.png',
    'pages/web-application/projects/australian-scaffold-logo.webp' => $u . '2025/09/MicrosoftTeams-image-20-1-3.png',
    'pages/web-application/projects/instrowest.webp'               => $u . '2025/09/Group-1597881394-2.png',
    'pages/web-application/projects/instrowest-logo.webp'          => $u . '2025/09/MicrosoftTeams-image-20-1-2.png',
    'pages/web-application/projects/richards-aluminium.webp'       => $u . '2025/09/Group-1597881394-1.png',
    'pages/web-application/projects/richards-aluminium-logo.webp'  => $u . '2025/09/Logo_01_2-removebg-preview-2.png',
    'pages/web-application/why/tailored-solutions.webp'      => $u . '2025/09/Group-1597880528-1.png',
    'pages/web-application/why/expertise-experience.webp'    => $u . '2025/09/Group-1597880529-8.png',
    'pages/web-application/why/scalability-flexibility.webp' => $u . '2025/09/Group-1597880528-4.png',

    // * Homepage — why-us flip cards (front photo, blurred back)
    'home/why/expertise.webp'           => $u . '2025/09/Group-1597880528-2.webp',
    'home/why/expertise-back.webp'      => $u . '2025/09/Group-1597880528-1.png',
    'home/why/cost-effective.webp'      => $u . '2025/09/Group-1597880526.webp',
    'home/why/cost-effective-back.webp' => $u . '2025/09/Frame-1597880528.png',
    'home/why/customised.webp'          => $u . '2025/09/Group-1597880527.webp',
    'home/why/customised-back.webp'     => $u . '2025/09/Group-1597880531-4.png',

    // * About us — hero background, team photos
    'pages/about-us/hero.webp'   => $u . '2025/10/Rectangle-161123887-1-1.webp',
    'pages/about-us/team.webp'   => $u . '2025/09/100.webp',
    'pages/about-us/team-2.webp' => $u . '2025/09/555.webp',

    // * Tech-stack (web) logo slider
    'tech/web-01.webp' => $u . '2025/09/Group-1597881291-5.webp',
    'tech/web-02.webp' => $u . '2025/09/Group-1597881284-3-2.webp',
    'tech/web-03.webp' => $u . '2025/09/Group-1597881278-8-1.webp',
    'tech/web-04.webp' => $u . '2025/09/Group-1597881282-8-1.webp',
    'tech/web-05.webp' => $u . '2025/09/Group-1597881283-6-1.webp',
    'tech/web-06.webp' => $u . '2025/09/Group-1597881286-4-1.webp',
    'tech/web-07.webp' => $u . '2025/09/Group-1597881287-4-1.webp',
    'tech/web-08.webp' => $u . '2025/09/Group-1597881285-4-1.webp',
    'tech/web-09.webp' => $u . '2025/09/Group-1597881291-4.webp',
    'tech/web-10.webp' => $u . '2025/09/Group-1597881289-3-1.webp',
    'tech/web-11.webp' => $u . '2025/09/Group-1597881290-3-1.webp',

    // * Homepage — hero slideshow (slide order) + What we do cards
    'home/hero/1.webp' => $u . '2025/09/Group-1597881499.webp',
    'home/hero/2.webp' => $u . '2025/09/image-56-1.webp',
    'home/hero/3.webp' => $u . '2025/09/Group-1597881167-1.webp',
    'home/services/mobile-app.webp' => $u . '2025/09/Group-1597880697-5-1-1.webp',
    'home/services/web-app.webp'    => $u . '2025/09/Group-1597880697-4.webp',

    // * Our Process — hero background, step badges, step illustrations
    'pages/our-process/hero.webp'    => $u . '2025/09/Group-1597881717.png',
    'pages/our-process/badge-1.webp' => $u . '2025/09/Group-1597881301.png',
    'pages/our-process/badge-2.webp' => $u . '2025/09/Group-1597881302.png',
    'pages/our-process/badge-3.webp' => $u . '2025/09/Group-1597881303-1.png',
    'pages/our-process/step-1.webp'  => $u . '2025/09/Group-1597881183-3.png',
    'pages/our-process/step-2.webp'  => $u . '2025/09/Group-1597881224.png',
    'pages/our-process/step-3.webp'  => $u . '2025/09/Group-1597881220.png',

    // * Portfolio — hero background + client tiles (tile order)
    'pages/portfolio/hero.webp' => $u . '2025/10/Group-1597881281-9.webp',
    'pages/portfolio/01.webp'   => $u . '2025/10/Group-1597881253-1.webp',
    'pages/portfolio/02.webp'   => $u . '2025/10/Group-1597881252-1.webp',
    'pages/portfolio/03.webp'   => $u . '2025/10/Group-1597881251.webp',
    'pages/portfolio/04.webp'   => $u . '2025/10/Group-1597881250.webp',
    'pages/portfolio/05.webp'   => $u . '2025/10/Group-1597881275.webp',
    'pages/portfolio/06.webp'   => $u . '2025/10/Group-1597881255.webp',
    'pages/portfolio/07.webp'   => $u . '2025/10/Group-1597881256.webp',
    'pages/portfolio/08.webp'   => $u . '2025/10/Group-1597881257.webp',
    'pages/portfolio/09.webp'   => $u . '2025/10/Group-1597881272.webp',
    'pages/portfolio/10.webp'   => $u . '2025/10/Group-1597881276.webp',
    'pages/portfolio/11.webp'   => $u . '2025/10/Group-1597881270.webp',
    'pages/portfolio/12.webp'   => $u . '2025/10/Group-1597881261.webp',
    'pages/portfolio/13.webp'   => $u . '2025/10/Group-1597881264.webp',
    'pages/portfolio/14.webp'   => $u . '2025/10/Group-1597881268.webp',
    'pages/portfolio/15.webp'   => $u . '2025/10/Group-1597881715.webp',
    'pages/portfolio/16.webp'   => $u . '2025/10/Group-1597881267.webp',
    'pages/portfolio/17.webp'   => $u . '2025/10/Group-1597881266.webp',
    'pages/portfolio/18.webp'   => $u . '2025/10/Group-1597881265.webp',
    'pages/portfolio/19.webp'   => $u . '2025/10/Group-1597881271.webp',
    'pages/portfolio/20.webp'   => $u . '2025/10/Group-1597881277.webp',

    // * Contact us — hero background
    'pages/contact-us/hero.webp' => $u . '2025/10/Group-1597881476.webp',
];
