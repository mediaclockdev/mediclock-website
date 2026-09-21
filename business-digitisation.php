<?php
$page_title       = 'Business Digitisation – Media Clock';
$page_description = 'Business digitisation: business name consultation, logo and branding, business cards, letterheads, email signatures and professional email setup.';
$page_css         = ['service', 'business-digitisation'];
include 'includes/layout/header.php';

// * Hero
$hero_title    = 'Modernising Your Business Identity';
$hero_sub      = '';
$hero_cta      = "Let's Start";
$hero_cta_href = 'tel:0489906090';
$hero_image    = 'pages/business-digitisation/hero.webp';
$hero_form     = true;
include 'includes/components/hero.php';

// * Happy Clients (light band, dark client cards)
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'light';
$logos_items = require __DIR__ . '/data/shared/clients-dark.php';
include 'includes/components/logo-slider.php';

// * Intro band
$intro_title = 'Your Partner in Digital Success';
$intro_text  = 'Building a brand identity can be challenging, from designing a memorable logo and crafting professional business cards to setting up an effective letterhead. We’re here to make these tasks easier and help you create a cohesive and impactful brand.';
$intro_theme = 'dark';
include 'includes/components/intro.php';

// * Service cards + Get a Quote
$service_cards_title = 'Business digitisation services';
$service_cards_items = [
    [
        'image' => 'pages/business-digitisation/cards/business-name-consultation.webp',
        'title' => 'Business Name Consultation',
        'text'  => 'Whether you’re a budding startup or a seasoned player, our expert team is here to help you find the perfect name that resonates with your brand identity and drives results in the digital sphere.',
    ],
    [
        'image' => 'pages/business-digitisation/cards/logo-designing-branding.webp',
        'title' => 'Logo Designing & Branding',
        'text'  => 'Your brand is your identity. Let us craft a logo and branding that truly represents your Aussie spirit and sets you apart from the crowd.',
    ],
    [
        'image' => 'pages/business-digitisation/cards/email-signature.webp',
        'title' => 'Email Signature',
        'text'  => 'Make every email count with custom signatures that exude professionalism and leave a lasting impression on your recipients.',
    ],
    [
        'image' => 'pages/business-digitisation/cards/letterhead-design.webp',
        'title' => 'Letterhead Design',
        'text'  => 'Elevate your letters with letterhead designs that look great and impress clients with careful attention to detail. Make every interaction a reflection of your brand’s quality.',
    ],
    [
        'image' => 'pages/business-digitisation/cards/business-card-design.webp',
        'title' => 'Business Card Design',
        'text'  => 'Leave a lasting mark with captivating business card designs that reflect the essence of your brand and make a lasting impression on potential clients and partners.',
    ],
    [
        'image' => 'pages/business-digitisation/cards/email-id-creation.webp',
        'title' => 'Email ID Creation',
        'text'  => 'Say goodbye to tech headaches! We’ll handle the setup of your official email addresses seamlessly, so you can focus on what you do best—running your business.',
    ],
];
$service_cards_cta = [
    'title' => "Get ready to conquer the digital realm with Media Clock. Let's kickstart your journey to online success today!",
    'label' => 'Get a Quote',
    'href'  => 'tel:0489906090',
];
include 'includes/components/service-cards.php';

// * Why choose us
$why_us_title = 'Why choose us?';
$why_us_items = [
    [
        'title' => 'Seamless Digital Foundation',
        'text'  => 'Establishing a strong online presence is crucial for business growth. We help you build this foundation by registering your domain name and setting up professional email accounts, ensuring a polished and professional image.',
        'icon'  => 'pages/business-digitisation/icons/why-seamless-foundation.svg',
        'image' => 'pages/business-digitisation/why/seamless-digital-foundation.webp',
        'back'  => 'pages/business-digitisation/why/card-back.webp',
    ],
    [
        'title' => 'Time and Cost-Effective',
        'text'  => 'Outsourcing your business digitisation needs to us is not just convenient but also cost-effective. We streamline the process, eliminating the need for multiple vendors and reducing overall expenses.',
        'icon'  => 'pages/business-digitisation/icons/why-time-cost.svg',
        'image' => 'pages/business-digitisation/why/time-and-cost-effective.webp',
        'back'  => 'pages/business-digitisation/why/card-back.webp',
    ],
    [
        'title' => 'Focus on Your Core Business',
        'text'  => 'By handling the technical aspects of business setup, we allow you to concentrate on what you do best – running your business. Our efficient services free up your time and resources to focus on core operations and growth.',
        'icon'  => 'pages/business-digitisation/icons/why-core-business.svg',
        'image' => 'pages/business-digitisation/why/focus-on-your-core-business.webp',
        'back'  => 'pages/business-digitisation/why/card-back.webp',
    ],
    [
        'title' => 'Comprehensive One-Stop Solution',
        'text'  => 'We offer a complete suite of business digitisation services under one roof. From crafting a memorable logo to securing your online identity with domain registration and professional email, we handle it all, saving you time and effort.',
        'icon'  => 'pages/business-digitisation/icons/why-one-stop.svg',
        'image' => 'pages/business-digitisation/why/comprehensive-one-stop-solution.webp',
        'back'  => 'pages/business-digitisation/why/card-back.webp',
    ],
    [
        'title' => 'Expert Consultation & Creativity',
        'text'  => 'Our team of experienced professionals provides expert guidance on choosing the perfect business name and designing a logo that truly represents your brand. We combine creativity with strategic thinking to deliver exceptional results.',
        'icon'  => 'pages/business-digitisation/icons/why-expert-consultation.svg',
        'image' => 'pages/business-digitisation/why/expert-consultation-creativity.webp',
        'back'  => 'pages/business-digitisation/why/card-back.webp',
    ],
];
include 'includes/components/why-us.php';

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
        'question' => 'How do you create business names that stand out?',
        'answer'   => 'Our team utilises market research and creativity to craft unique names that resonate with your brand.',
        'open'     => true,
    ],
    [
        'question' => 'Can you design logos that capture our brand essence?',
        'answer'   => 'Yes, we tailor logos to reflect your brand identity and set you apart from competitors.',
    ],
    [
        'question' => 'Do you offer customisable email signatures?',
        'answer'   => 'Absolutely, we create professional email signatures tailored to your preferences.',
    ],
    [
        'question' => 'Can you assist with setting up official email addresses?',
        'answer'   => 'Yes, we handle the seamless setup of your email addresses, so you can focus on your business.',
    ],
    [
        'question' => 'Do you provide branding services beyond logos, such as color schemes and font selection?',
        'answer'   => 'Absolutely, we offer comprehensive branding packages including color palettes, typography, and brand guidelines.',
    ],
    [
        'question' => 'Can you ensure that our business card designs align with current design trends?',
        'answer'   => 'Yes, our designers stay updated on the latest trends to create business cards that leave a lasting impression.',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
