<?php
$page_title       = 'Web Application – Media Clock';
$page_description = 'Custom web application development for Australian businesses: bespoke systems that replace manual, paper-based processes. Book a free consultation.';
$page_css         = ['service', 'web-application'];
include 'includes/layout/header.php';

// * Hero
$hero_title = 'Custom Web Application Developers';
$hero_sub   = 'Business Atomisation or Concept Development';
$hero_cta   = '';
$hero_image = 'pages/web-application/hero.webp';
$hero_form  = true;
include 'includes/components/hero.php';

// * Happy Clients
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'dark';
$logos_items = require __DIR__ . '/data/shared/clients.php';
include 'includes/components/logo-slider.php';

// * Intro band
$intro_text  = 'Established in 2017, we have designed 100s of websites, web and mobile apps.';
$intro_theme = 'light';
include 'includes/components/intro.php';

// * Recent Projects
$projects_title       = 'Recent Projects';
$projects_theme       = 'dark';
$projects_media_cols  = 5;
$projects_image_first = true;
$projects_items       = [
    [
        'title' => 'Australian Scaffold, Riverstone, NSW 2765',
        'image' => 'pages/web-application/projects/australian-scaffold.webp',
        'w'     => 450,
        'h'     => 306,
        'alt'   => 'Australian Scaffold web application screens',
        'logo'  => ['src' => 'pages/web-application/projects/australian-scaffold-logo.webp', 'w' => 240, 'h' => 65, 'alt' => 'Australian Scaffold'],
        'copy'  => [
            'Australian Scaffolds provides a complete range of scaffold & access equipments for sale & hire in NSW, Australia. The existing business operated on paper-based processes for registration, vendor management and costing of estimates for scaffolds. These day-to-day tasks were monotonous, tedious & time consuming. To overcome this manual paper- based process, the client needed a transformational solution with advanced technologies to support the vendor management and cost estimation.',
            'Media Clock understood the client’s concerns and addressed them with the digitisation solution. Our technical experts came up with an integrated cost estimation solution designed and developed to streamline, automate and simplify the overall vendor management by providing platform to vendors, vendor team members and company administration and company team members.',
        ],
    ],
    [
        'title' => 'Instrowest, Rockingham WA 6168',
        'image' => 'pages/web-application/projects/instrowest.webp',
        'w'     => 451,
        'h'     => 306,
        'alt'   => 'Instrowest calibration management system screens',
        'logo'  => ['src' => 'pages/web-application/projects/instrowest-logo.webp', 'w' => 108, 'h' => 65, 'alt' => 'Instro West'],
        'copy'  => [
            'Instrowest is a leading instrumentation and electrical services company specialising in providing high-quality solutions to the mining and industrial sectors.',
            'We developed a customised Calibration Management System for Instrowest to streamline their project management and reporting processes, resulting in increased efficiency and accuracy in their operations.',
        ],
    ],
    [
        'title' => 'Richards Aluminium, Mornington TAS 7018',
        'image' => 'pages/web-application/projects/richards-aluminium.webp',
        'w'     => 450,
        'h'     => 306,
        'alt'   => 'Richards Aluminium formula builder screens',
        'logo'  => ['src' => 'pages/web-application/projects/richards-aluminium-logo.webp', 'w' => 372, 'h' => 42, 'alt' => 'Richards Aluminium Windows & Doors'],
        'copy'  => [
            'Richard Aluminium faced significant challenges with their manual process for designing and estimating window constructions. The process involved creating window designs in Excel, manually generating formulas, and calculating the cost and length of aluminum required. This approach was not only time-consuming but also prone to errors, impacting the efficiency and accuracy of the business operations.',
            'Media Clock recognised these issues and provided an innovative solution by developing a formula builder. This advanced tool automated the entire process, enabling Richard Aluminium to seamlessly create window sketches and generate the necessary formulas for accurate cost estimation and material calculations. The transformation from a manual, error-prone process to an automated, efficient system greatly enhanced the company’s operational efficiency and accuracy.',
        ],
    ],
];
$projects_cta = [
    'title' => 'Take a look at our works',
    'label' => 'Book a free demo',
    'href'  => 'https://calendly.com/nithyaamediaclock/',
];
include 'includes/components/projects.php';

// * Roadmap
$roadmap_title     = 'Web App Development Roadmap';
$roadmap_image     = 'pages/web-application/roadmap.webp';
$roadmap_w         = 1024;
$roadmap_h         = 931;
$roadmap_alt       = 'Web app development roadmap';
$roadmap_theme     = 'light';
$roadmap_max_width = 616;
include 'includes/components/roadmap.php';

// * Why choose us
$why_us_title = 'Why choose us?';
$why_us_items = [
    [
        'title' => 'Tailored Solutions',
        'text'  => 'Our experts excel in creating bespoke web applications tailored to your brand’s identity and objectives. From concept to execution, we work closely with you to ensure that your vision is brought to life.',
        'icon'  => 'pages/web-application/icons/why-tailored.svg',
        'image' => 'pages/web-application/why/tailored-solutions.webp',
    ],
    [
        'title' => 'Expertise & Experience',
        'text'  => 'With years of experience in web app development, our team has the expertise to handle projects of any complexity. Whether you require a simple web application or a comprehensive enterprise solution, we have the skills to deliver.',
        'icon'  => 'pages/web-application/icons/why-expertise.svg',
        'image' => 'pages/web-application/why/expertise-experience.webp',
    ],
    [
        'title' => 'Scalability & Flexibility',
        'text'  => 'We understand the importance of scalability and flexibility in today’s dynamic business environment. Our web applications are designed to adapt to your evolving needs and grow alongside your business seamlessly.',
        'icon'  => 'pages/web-application/icons/why-scalability.svg',
        'image' => 'pages/web-application/why/scalability-flexibility.webp',
    ],
    [
        'title' => 'Responsive Design',
        'text'  => 'In an era where mobile devices dominate, responsive design is paramount. Our web applications are optimised for all devices, ensuring a consistent and intuitive user experience across desktops, tablets, and smartphones.',
        'icon'  => 'pages/ecommerce-website-design/icons/feature-responsive-design.svg',
        'image' => 'pages/web-application/why/tailored-solutions.webp',
    ],
    [
        'title' => 'Security & Reliability',
        'text'  => 'Your data security is our top priority. We implement robust security measures to safeguard your web application against cyber threats, ensuring the confidentiality and integrity of your sensitive information.',
        'icon'  => 'pages/ecommerce-website-design/icons/why-robust-security.svg',
        'image' => 'pages/web-application/why/expertise-experience.webp',
    ],
];
include 'includes/components/why-us.php';

// * Tech stack
$logos_id            = 'tech';
$logos_title         = 'Technologies we use';
$logos_title_visible = false;
$logos_theme         = 'light';
$logos_items         = require __DIR__ . '/data/shared/tech-stack-web.php';
include 'includes/components/logo-slider.php';

// * Testimonials
$testimonials_title         = 'What our clients say';
$testimonials_title_visible = false;
include 'includes/components/testimonials.php';

// * Book A Free Consultation (contact section, shown open)
$contact_visible = true;
$contact_eyebrow = '';
$contact_title   = 'Book A Free Consultation';
$contact_points  = [
    'Check if the project is technically feasible.',
    'To understand needs, desire and problems to solve.',
    'Plan technology, timeline, & costs.',
];
include 'includes/components/contact.php';

// * FAQ
$faq_id      = 'faqs';
$faq_eyebrow = '';
$faq_title   = 'FAQ';
$faq_items   = [
    [
        'question' => 'How long does it take to develop a web app?',
        'answer'   => 'Timelines vary based on project scope. Typically, we take step by step approach to complete any web app to get the desired quality outcome.',
        'open'     => true,
    ],
    [
        'question' => 'What platforms do you develop web apps for?',
        'answer'   => 'We specialize in developing web apps for all major platforms, including desktop, mobile, and tablets.',
    ],
    [
        'question' => 'Can you integrate our existing systems with the new web app?',
        'answer'   => 'Yes, we offer seamless integration services to ensure your new web app works harmoniously with your current systems.',
    ],
    [
        'question' => 'How do you ensure the security of our web app and data?',
        'answer'   => 'We prioritise security at every stage of development, implementing robust measures to safeguard your app and data.',
    ],
    [
        'question' => 'Do you provide ongoing support and maintenance?',
        'answer'   => 'Absolutely. We offer comprehensive support and maintenance packages to keep your web app running smoothly post-launch.',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
