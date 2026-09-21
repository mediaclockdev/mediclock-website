<?php
$page_title       = 'About us – Media Clock';
$page_description = 'Media Clock crafts tailored software, web and mobile apps for Australian businesses, built on innovation, quality and collaboration.';
$page_css         = ['service', 'about-us'];
include 'includes/layout/header.php';

// * Hero : photo + Request For Proposal card, no heading (the page h1 is in the About band)
$hero_title = '';
$hero_cta   = '';
$hero_image = 'pages/about-us/hero.webp';
include 'includes/components/hero.php';

// * Happy Clients
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'dark';
$logos_items = require __DIR__ . '/data/shared/clients.php';
include 'includes/components/logo-slider.php';
?>
<!-- * About us -->
<section class="section about band-light" aria-labelledby="about-title">
    <div class="container">
        <h1 id="about-title" class="about-title">About us</h1>
        <p>Welcome to Media Clock, your premier destination for tailored software solutions designed to meet the diverse needs of modern Australian businesses and individuals. At Media Clock, we pride ourselves on delivering exceptional results with a professional touch that’s second to none.</p>
        <p>With a strong emphasis on creativity, quality, and efficiency, we specialize in crafting cutting-edge software products that elevate businesses to new heights. Whether you’re a bustling urban startup, a thriving family-run enterprise, or a growing business in regional areas, our solutions are meticulously crafted to suit your unique requirements.</p>

        <div class="about-media">
            <img src="<?= img_src('pages/about-us/team.webp') ?>" alt="The Media Clock team at work" loading="lazy" decoding="async" />
            <img src="<?= img_src('pages/about-us/team-2.webp') ?>" alt="Media Clock team members collaborating" loading="lazy" decoding="async" />
        </div>

        <p>Our team of seasoned developers, designers, and strategists is dedicated to understanding the intricacies of today’s digital landscape. From intuitive web and mobile applications to bespoke software solutions, we leverage the latest technologies and industry best practices to ensure your success.</p>
        <p>But we’re more than just a software development company. We’re your trusted partners, committed to providing personalized service and support at every stage of your journey. Whether you’re looking to streamline operations, enhance online presence, or innovate within your industry, Media Clock is here to help you achieve your goals.</p>
    </div>
</section>
<?php
// * Our Values (same photos as the Web Application why-us cards on the live site)
$why_us_id    = 'values';
$why_us_title = 'Our Values';
$why_us_items = [
    [
        'title' => 'Innovation',
        'icon'  => 'pages/about-us/icons/innovation.svg',
        'text'  => 'We embrace forward-thinking to deliver solutions that are ahead of the curve. Innovation drives us to create unique digital experiences that keep our clients at the forefront of their industry.',
        'image' => 'pages/web-application/why/tailored-solutions.webp',
    ],
    [
        'title' => 'Quality',
        'icon'  => 'pages/about-us/icons/quality.svg',
        'text'  => 'Quality is the cornerstone of our work at Media Clock. We take pride in our meticulous attention to detail, ensuring that every line of code, every design element, and every interaction reflects our commitment to excellence. From inception to delivery, we uphold the highest standards to ensure the utmost satisfaction of our clients.',
        'image' => 'pages/web-application/why/expertise-experience.webp',
    ],
    [
        'title' => 'Collaboration',
        'icon'  => 'pages/about-us/icons/collaboration.svg',
        'text'  => 'We value collaboration, partnering closely with our clients to truly understand their vision. By working together, we create strong relationships that lead to successful, impactful outcomes.',
        'image' => 'pages/web-application/why/scalability-flexibility.webp',
    ],
];
$why_us_autoplay = 0;
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

// * Our Partners
$logos_id    = 'partners';
$logos_title = 'Our Partners';
$logos_theme = 'light';
$logos_items = [
    ['src' => 'partners/01.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/02.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/03.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/04.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/05.webp', 'alt' => 'Partner logo'],
    ['src' => 'partners/06.webp', 'alt' => 'Partner logo'],
];
include 'includes/components/logo-slider.php';

include 'includes/layout/footer.php';
