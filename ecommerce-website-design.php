<?php
$page_title       = 'eCommerce Website Design – Media Clock';
$page_description = 'eCommerce website design on Shopify, WooCommerce, Magento, BigCommerce and more: secure, scalable online stores built for Australian businesses.';
$page_css         = ['service', 'ecommerce-website-design'];
include 'includes/layout/header.php';

// * Hero
$hero_title    = 'eCommerce Website Designers';
$hero_sub      = 'Make your online business easy';
$hero_cta      = 'Schedule a call';
$hero_cta_href = 'tel:0489906090';
$hero_image    = 'pages/ecommerce-website-design/hero.webp';
$hero_form     = true;
include 'includes/components/hero.php';

// * Happy Clients (dark band)
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'dark';
$logos_items = require __DIR__ . '/data/shared/clients.php';
include 'includes/components/logo-slider.php';

// * Intro band
$intro_text  = [
    'Our e-commerce development service focuses on creating user-friendly and visually appealing online stores tailored to your business needs. We ensure seamless integration with various payment gateways and provide robust security features to protect your customers’ data.',
    'With our expertise, you can expect a fully functional, scalable, and responsive e-commerce platform designed to enhance your sales and customer satisfaction.',
];
$intro_theme = 'light';
include 'includes/components/intro.php';

// * Start your Online Business with us (feature slider)
$feature_slider_id    = 'features';
$feature_slider_title = 'Start your Online Business with us';
$feature_slider_items = [
    ['icon' => 'pages/ecommerce-website-design/icons/feature-user-friendly-navigation.svg', 'title' => 'User Friendly Navigation', 'text' => 'Easy-to-use menus, search bars, and filters to help customers find products quickly.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-responsive-design.svg', 'title' => 'Responsive Design', 'text' => 'Optimised for mobile devices to ensure a seamless shopping experience across all devices.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-product-images-videos.svg', 'title' => 'Display Products Images/Videos', 'text' => 'Clear, high-resolution visuals to showcase products effectively.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-secure-payment-gateways.svg', 'title' => 'Secure Payment Gateways', 'text' => 'Integration with trusted payment processors to ensure safe and smooth transactions.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-shopping-cart-checkout.svg', 'title' => 'Shopping Cart and Checkout', 'text' => 'Intuitive and streamlined process to reduce cart abandonment.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-product-reviews-ratings.svg', 'title' => 'Product Reviews and Ratings', 'text' => 'Customer feedback features to build trust and influence purchase decisions.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-seo.svg', 'title' => 'Search Engine Optimisation (SEO)', 'text' => 'Optimised content and meta tags to improve visibility on search engines.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-personalisation.svg', 'title' => 'Personalisation', 'text' => 'Personalised recommendations and content to enhance the shopping experience.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-wishlist.svg', 'title' => 'Wishlist and Save for Later', 'text' => 'Options for customers to save products they are interested in.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-inventory-management.svg', 'title' => 'Inventory Management', 'text' => 'Live stock levels that update with every order, so products are never oversold.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-order-tracking.svg', 'title' => 'Order Tracking', 'text' => 'Features that allow customers to track the status of their orders.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-customer-accounts.svg', 'title' => 'Customer Accounts', 'text' => 'Secure user accounts where customers can view order history, track shipments, and manage their details.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-social-media-integration.svg', 'title' => 'Social Media Integration', 'text' => 'Links and sharing options to connect with social media platforms.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-marketing-tools.svg', 'title' => 'Marketing Tools', 'text' => 'Built-in discounts, promotions and email campaigns to bring customers back.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-analytics-reporting.svg', 'title' => 'Analytics and Reporting', 'text' => 'Sales, traffic and customer reports so you can see what is working and what is not.'],
    ['icon' => 'pages/ecommerce-website-design/icons/feature-customer-support.svg', 'title' => 'Customer Support', 'text' => 'Integrated chatbots or live chat support for instant customer assistance.'],
];
include 'includes/components/feature-slider.php';

// * Testimonials
$testimonials_title         = 'What our clients say';
$testimonials_title_visible = false;
include 'includes/components/testimonials.php';

// * Why choose us
$why_us_title = 'Why choose us?';
$why_us_items = [
    [
        'title' => 'Tailored Solutions',
        'text'  => 'We build your store around the way you actually sell — your products, pricing rules, shipping and checkout — on the platform that suits you, rather than forcing your business into a template.',
        'icon'  => 'pages/ecommerce-website-design/icons/why-tailored-solutions.svg',
        'image' => 'pages/ecommerce-website-design/why/tailored-solutions.webp',
    ],
    [
        'title' => 'Seamless User Experience',
        'text'  => 'We design intuitive and user-friendly eCommerce platforms that make shopping easy and enjoyable for your customers. Our goal is to enhance user engagement and boost your sales.',
        'icon'  => 'pages/ecommerce-website-design/icons/why-seamless-user-experience.svg',
        'image' => 'pages/ecommerce-website-design/why/seamless-user-experience.webp',
    ],
    [
        'title' => 'Robust Security',
        'text'  => 'We prioritise the security of your online store by implementing advanced security measures. Protecting your business and customer data is our top priority.',
        'icon'  => 'pages/ecommerce-website-design/icons/why-robust-security.svg',
        'image' => 'pages/ecommerce-website-design/why/robust-security.webp',
    ],
    [
        'title' => 'Scalable and Flexible',
        'text'  => 'Our eCommerce solutions are built to grow with your business. Whether you’re just starting or looking to expand, our platforms can scale to meet your evolving needs.',
        'icon'  => 'pages/ecommerce-website-design/icons/why-scalable-and-flexible.svg',
        'image' => 'pages/ecommerce-website-design/why/scalable-and-flexible.webp',
    ],
    [
        'title' => 'Expert Support',
        'text'  => 'Our team of experienced professionals is always ready to assist you. From initial setup to ongoing maintenance, we provide continuous support to ensure your online store runs smoothly.',
        'icon'  => 'pages/ecommerce-website-design/icons/why-expert-support.svg',
        'image' => 'pages/ecommerce-website-design/why/expert-support.webp',
    ],
];
include 'includes/components/why-us.php';

// * Technologies (light band) — same heading as the other service pages
$logos_id            = 'platforms';
$logos_title         = 'Technologies We Use';
$logos_theme         = 'light';
$logos_items         = require __DIR__ . '/data/shared/tech-stack-ecommerce.php';
include 'includes/components/logo-slider.php';

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
        'question' => 'What exactly does ecommerce design involve?',
        'answer'   => 'Ecommerce design focuses on creating or improving online stores to enhance user experience and boost sales.',
        'open'     => true,
    ],
    [
        'question' => 'How long does it take to design an ecommerce website?',
        'answer'   => 'It depends on the size of your catalogue and the features you need. A straightforward store on an existing platform is usually a matter of weeks, while a larger build with custom features, integrations and migrated products takes longer. We confirm the timeline with you after the first scoping call, before any design work starts.',
    ],
    [
        'question' => 'Do you offer ongoing support after the website is live?',
        'answer'   => 'Yes, we provide maintenance and support plans to keep your site secure and updated.',
    ],
    [
        'question' => 'Can you help with SEO for my online store?',
        'answer'   => 'Absolutely! We integrate SEO best practices to improve your store’s visibility in search results.',
    ],
    [
        'question' => 'Which platforms do you specialise in for ecommerce design?',
        'answer'   => 'We specialise in Shopify, WooCommerce, Magento, and BigCommerce, tailoring solutions to your needs.',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
