<?php
$page_title       = 'Website Development – Media Clock';
$page_description = 'Website development for Australian businesses: informative, responsive, lead generation, brand awareness and NDIS websites that work on every device.';
$page_css         = ['service', 'website-development'];
include 'includes/layout/header.php';

// * Hero
$hero_title    = 'Stunning Website Development';
$hero_sub      = 'Where creativity meets technology';
$hero_cta      = 'Schedule a call';
$hero_cta_href = 'tel:0489906090';
$hero_image    = 'pages/website-development/hero.webp';
$hero_form     = true;
include 'includes/components/hero.php';

// * Services strip
$service_strip_title = 'Website development services';
$service_strip_items = [
    // "\n" = the live page's line break; website-development.css shows it with white-space: pre-line
    ['icon' => 'pages/website-development/icons/web-informative.svg', 'label' => "Informative\nWebsite"],
    ['icon' => 'pages/website-development/icons/web-responsive.svg',  'label' => "Responsive\nDesign"],
    ['icon' => 'pages/website-development/icons/web-lead-gen.svg',    'label' => "Lead Generation\nWebsite"],
    ['icon' => 'pages/website-development/icons/web-brand.svg',       'label' => "Brand\nAwareness"],
    ['icon' => 'pages/website-development/icons/web-ndis.svg',        'label' => "NDIS\nWebsite"],
];
include 'includes/components/service-strip.php';

// * Intro band
$intro_text  = 'Our website development service offers top-notch solutions to create dynamic and user-friendly sites. We specialise in designing and building websites that are not only visually stunning but also perform like a dream across all devices. With our know-how, we make sure your online presence is professional, engaging, and perfectly tailored to suit your business needs.';
$intro_theme = 'light';
include 'includes/components/intro.php';

// * Our Recent Works — carousel, two per view
$portfolio_items = [
    ['title' => 'Azeta Real Estate',                'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/azeta-real-estate.webp'],
    ['title' => 'Compella Compression',             'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/compella-compression.webp'],
    ['title' => 'Carbon Co',                        'category' => 'Brand Awareness Website',    'image' => 'pages/website-development/portfolio/carbon-co.webp'],
    ['title' => 'Sculpt Body And Wellness Clinics', 'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/sculpt-body.webp'],
    ['title' => "Shweta's Make-up Studio",          'category' => 'Informative Website Design', 'image' => 'pages/website-development/portfolio/shwetas-makeup.webp'],
    ['title' => 'Budget Cleaning Group',            'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/budget-cleaning.webp'],
    ['title' => 'Quick Key',                        'category' => 'Brand Awareness Website',    'image' => 'pages/website-development/portfolio/quick-key.webp'],
    ['title' => 'Sunrise Cleaning Group',           'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/sunrise-cleaning.webp'],
    ['title' => 'Atomic Bar',                       'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/atomic-bar.webp'],
    ['title' => 'Harvest Cooking Classes',          'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/harvest-cooking.webp'],
    ['title' => 'Singh Sweets And Restaurant',      'category' => 'Brand Awareness Website',    'image' => 'pages/website-development/portfolio/singh-sweets.webp'],
    ['title' => 'Monarch Flooring',                 'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/monarch-flooring.webp'],
    ['title' => 'Moga Tyre',                        'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/moga-tyre.webp'],
    ['title' => 'NDIS Clock',                       'category' => 'Lead Generation Website',    'image' => 'pages/website-development/portfolio/ndis-clock.webp'],
    ['title' => 'Croydon Bakehouse',                'category' => 'Informative Website Design', 'image' => 'pages/website-development/portfolio/croydon-bakehouse.webp'],
    ['title' => 'Smashed Up',                       'category' => 'Informative Website Design', 'image' => 'pages/website-development/portfolio/smashed-up.webp'],
];
?>
<!-- * Our Recent Works -->
<section class="section webdev-works band-dark" id="recent-works" aria-labelledby="recent-works-title">
    <div class="container">
        <div class="head">
            <h2 id="recent-works-title">Our Recent Works</h2>
        </div>
        <div class="mc-slider works-slider" data-slider data-autoplay="5000"
            style="--pv:2;--pv-md:2;--pv-sm:1;--gap:20px"
            aria-roledescription="carousel" aria-label="Our Recent Works">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($portfolio_items as $i => $item): ?>
                <article class="mc-slide work-card" role="group" aria-roledescription="slide"
                    aria-label="<?= $i + 1 ?> of <?= count($portfolio_items) ?>">
                    <img src="<?= $e(img_src($item['image'])) ?>" alt="<?= $e($item['title']) ?> website"
                        width="697" height="342" loading="lazy" decoding="async" />
                    <h3 class="work-title"><?= $e($item['title']) ?></h3>
                    <p class="work-cat"><?= $e($item['category']) ?></p>
                </article>
                <?php endforeach; ?>
            </div>
            <div class="mc-slider-dots"></div>
        </div>
    </div>
</section>

<?php
unset($portfolio_items, $item, $i);

// * Our Process
$roadmap_id        = 'our-process';
$roadmap_title     = 'Our Process';
$roadmap_lead      = 'Your Website Journey Made Easy';
$roadmap_image     = 'pages/website-development/process.webp';
$roadmap_w         = 1039;
$roadmap_h         = 1628;
$roadmap_alt       = 'Website process: Consultation, Design, Development, Testing, Launch, Support & Maintenance';
$roadmap_theme     = 'light';
$roadmap_max_width = 775;
include 'includes/components/roadmap.php';

// * Why choose us
$why_us_title = 'Why choose us?';
$why_us_items = [
    [
        'title' => 'SEO-Friendly Designs',
        'text'  => 'A beautiful website is of little use if it can’t be found online. That’s why we incorporate SEO best practices right from the design stage to improve your website’s visibility on search engines. From keyword optimisation to meta tags, we ensure your website is optimised for maximum online exposure.',
        'icon'  => 'pages/website-development/icons/why-seo.svg',
        'image' => 'pages/website-development/why/seo.webp',
        'back'  => 'pages/website-development/why/back.webp',
    ],
    [
        'title' => 'Mobile Responsive',
        'text'  => 'With the majority of internet users accessing websites through mobile devices, having a mobile-responsive design is crucial. Our websites are designed to adapt seamlessly to different screen sizes, ensuring a consistent user experience across all devices.',
        'icon'  => 'pages/website-development/icons/why-mobile.svg',
        'image' => 'pages/website-development/why/mobile.webp',
        'back'  => 'pages/website-development/why/back.webp',
    ],
    [
        'title' => 'Fast Loading Speed',
        'text'  => 'In today’s fast-paced world, users expect websites to load quickly. Our optimised designs and efficient coding practices ensure that your website loads blazingly fast, keeping visitors engaged and reducing bounce rates.',
        'icon'  => 'pages/website-development/icons/why-speed.svg',
        'image' => 'pages/website-development/why/speed.webp',
        'back'  => 'pages/website-development/why/back.webp',
    ],
    [
        'title' => 'Customised Solutions',
        'text'  => 'We don’t believe in one-size-fits-all solutions. Our team works closely with you to understand your business goals & create a website that reflects your brand identity & resonates with your target audience.',
        'icon'  => 'pages/website-development/icons/why-custom.svg',
        'image' => 'pages/website-development/why/custom.webp',
        'back'  => 'pages/website-development/why/back.webp',
    ],
    [
        'title' => 'Cutting-Edge Technologies',
        'text'  => 'Our designers & developers stay updated with the latest trends & technologies in the industry to ensure your website is not only visually appealing but also technically sound. From responsive design to seamless navigation, we use cutting-edge technologies to deliver an exceptional user experience.',
        'icon'  => 'pages/website-development/icons/why-tech.svg',
        'image' => 'pages/website-development/why/tech.webp',
        'back'  => 'pages/website-development/why/back.webp',
    ],
];
include 'includes/components/why-us.php';

// * Tech stack
$logos_id            = 'tech';
$logos_title         = 'Technologies we use';
$logos_title_visible = false;
$logos_theme         = 'light';
$logos_items         = require __DIR__ . '/data/shared/tech-stack-website.php';
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
        'question' => 'What affects the cost and timeline of website design?',
        'answer'   => 'Cost and timeline depend on the number of pages and features you need.',
        'open'     => true,
    ],
    [
        'question' => 'Do I need to pay for a domain name separately?',
        'answer'   => 'If you already have a domain name, we can use it. If not, we can purchase one for you.',
    ],
    [
        'question' => 'Which web hosting should I choose?',
        'answer'   => 'Choose shared hosting for a lower budget or dedicated hosting for better performance and security.',
    ],
    [
        'question' => 'Is an SSL certificate necessary?',
        'answer'   => 'Yes, an SSL certificate is required for website security and protecting user data.',
    ],
    [
        'question' => 'Do you offer website maintenance after launch?',
        'answer'   => 'Yes, we provide ongoing maintenance, including backups and monitoring, under our Annual Maintenance Contract (AMC)',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
