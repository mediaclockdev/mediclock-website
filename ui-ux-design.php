<?php
$page_title       = 'UI/UX Design – Media Clock';
$page_description = 'UI/UX design for websites, web and mobile apps: process flows, personas, wireframes and high-fidelity designs, at a fixed cost with unlimited revisions.';
$page_css         = ['service', 'ui-ux-design'];
include 'includes/layout/header.php';

// * Hero
$hero_title    = 'User Interface (UI) & User Experience (UX) Designers';
$hero_cta      = 'Schedule a call';
$hero_cta_href = 'tel:0489906090';
$hero_image    = 'pages/ui-ux-design/hero.webp';
$hero_form     = true;
include 'includes/components/hero.php';

// * Happy Clients
$logos_id    = 'clients';
$logos_title = 'Happy Clients';
$logos_theme = 'dark';
$logos_items = require __DIR__ . '/data/shared/clients.php';
include 'includes/components/logo-slider.php';

// * Intro band
$intro_text  = 'Established in 2017, we have designed 100s of mobile apps and websites.';
$intro_bold  = true;
$intro_theme = 'light';
include 'includes/components/intro.php';

// * Proof of Concept — the circle images carry the step number, so they stay decorative
$poc_items = [
    ['Process Flow', 'We map out the overall workflow to visualise the steps and interactions involved in your app.'],
    ['Architectural Design', 'We create the structural framework of your application to ensure it works well and is easy to use.'],
    ['Persona Defining', 'We identify target user personas to tailor the application to the specific needs and behaviors of the intended audience.'],
    ['User Stories', 'We develop detailed user stories & use cases to understand & define the specific needs & goals of your users.'],
    ['Low-Fidelity Design', 'We start with low-fidelity wireframes to outline the basic layout & functionality, focusing on structure rather than aesthetics.'],
    ['High-Fidelity Design', 'We create high-fidelity designs that incorporate visual details, interactions, & final touches, providing a realistic preview of the end product.'],
];
?>
<!-- * Proof of Concept -->
<section class="section poc band-dark" id="poc" aria-labelledby="poc-title">
    <div class="container">
        <div class="head">
            <h2 id="poc-title">Proof of Concept</h2>
            <p>What we cover?</p>
        </div>
        <ol class="poc-steps list-unstyled mb-0">
            <?php foreach ($poc_items as $i => [$name, $text]): ?>
            <li class="poc-step">
                <img class="poc-circle" src="<?= $e(img_src('pages/ui-ux-design/poc/' . ($i + 1) . '.webp')) ?>" alt=""
                    width="241" height="241" loading="lazy" decoding="async" />
                <h3 class="poc-name"><span class="visually-hidden"><?= $i + 1 ?>. </span><?= $e($name) ?></h3>
                <p class="poc-text"><?= $e($text) ?></p>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>

<!-- * Get Started Today -->
<section class="section uiux-cta band-light" aria-labelledby="uiux-cta-title">
    <div class="container">
        <div class="uiux-cta-card">
            <h2 id="uiux-cta-title">Get Started Today</h2>
            <p>Ready to take your digital presence to new heights?</p>
            <a class="projects-cta-btn" href="tel:0489906090">Let's Talk <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</section>

<!-- * Why UI/UX Design? -->
<section class="section uiux-why band-dark" id="why-ui-ux" aria-labelledby="why-ui-ux-title">
    <div class="container">
        <div class="head">
            <h2 id="why-ui-ux-title">Why UI/UX Design?</h2>
        </div>
        <img class="uiux-why-img" src="<?= $e(img_src('pages/ui-ux-design/why-ui-ux.webp')) ?>"
            alt="Wireframe, low-fidelity and finished app screens side by side" width="1184" height="679" loading="lazy" decoding="async" />
        <p><strong>Visualise the Structure:</strong> Imagine your app’s layout – where the buttons go, how users will navigate. See a big picture early on, making sure everything flows smoothly.</p>
        <p><strong>Focus on User Experience:</strong> A good app is all about how users interacts with it prioritising and focusing on the functionality not fancy graphics. Additionally, intuitive navigation and responsive design are key to ensuring a seamless user experience.</p>
        <p><strong>Save Time and Money:</strong> Early problem solving in fixing layouts in the app without wasting time on coding and development. Easy to spot gaps. It reduces misunderstandings and misinterpretations that can leads to coding errors later.</p>
        <p><strong>Streamlined Development:</strong> A clear wireframe gives all of us (Stakeholders, Business Analysts, Developers, Database Administrators and Testers) a roadmap for building the app that makes it faster and efficient.</p>
        <p>By incorporating these aspects of error-prevention, wireframes become a powerful tool for creating a smooth and user-friendly final product.</p>
    </div>
</section>
<?php
unset($poc_items, $i, $name, $text);

// * Testimonials
$testimonials_title         = 'What our clients say';
$testimonials_title_visible = false;
include 'includes/components/testimonials.php';

// * Why choose us — the live site repeats the first photo and icon on the last three cards
$why_us_title = 'Why choose us?';
$why_us_items = [
    [
        'title' => 'Expert Team',
        'text'  => 'Our experienced designers and developers use industry best practices and the latest trends to deliver top-notch quality.',
        'icon'  => 'pages/ui-ux-design/icons/why-expert-team.svg',
        'image' => 'pages/ui-ux-design/why/expert-team.webp',
    ],
    [
        'title' => 'Client-Centric Approach',
        'text'  => 'We tailor designs to your needs and goals, ensuring your vision is accurately represented.',
        'icon'  => 'pages/ui-ux-design/icons/why-client-centric.svg',
        'image' => 'pages/ui-ux-design/why/client-centric.webp',
    ],
    [
        'title' => 'Proven Processes',
        'text'  => 'Our structured approach includes thorough research, iterative design, and rigorous testing to meet high usability and performance standards.',
        'icon'  => 'pages/ui-ux-design/icons/why-proven-processes.svg',
        'image' => 'pages/ui-ux-design/why/proven-processes.webp',
    ],
    [
        'title' => 'Quality Prototypes',
        'text'  => 'We create high-fidelity prototypes that validate design concepts and ensure smooth, intuitive user interactions before development.',
        'icon'  => 'pages/ui-ux-design/icons/why-expert-team.svg',
        'image' => 'pages/ui-ux-design/why/expert-team.webp',
    ],
    [
        'title' => 'Fixed Cost & Unlimited Revisions',
        'text'  => 'We offer clear, fixed pricing with unlimited revisions to meet your expectations without extra costs.',
        'icon'  => 'pages/ui-ux-design/icons/why-expert-team.svg',
        'image' => 'pages/ui-ux-design/why/expert-team.webp',
    ],
    [
        'title' => 'Seamless Integration',
        'text'  => 'We ensure smooth coordination across all platforms and technologies for consistent, high-quality performance.',
        'icon'  => 'pages/ui-ux-design/icons/why-expert-team.svg',
        'image' => 'pages/ui-ux-design/why/expert-team.webp',
    ],
];
include 'includes/components/why-us.php';

// * Tech stack
$logos_id            = 'tech';
$logos_title         = 'Technologies We Use';
$logos_theme         = 'light';
$logos_items         = require __DIR__ . '/data/shared/tech-stack.php';
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
        'question' => 'What is the difference between UI and UX design?',
        'answer'   => 'UI design focuses on the look and feel of the application, while UX design is about improving the overall user experience and usability.',
        'open'     => true,
    ],
    [
        'question' => 'How do I see the work while you do UI/UX design?',
        'answer'   => 'We provide a link where you can review each screen and type feedback directly on the design. Automatic notifications are sent to us for any necessary corrections.',
    ],
    [
        'question' => 'How do you ensure the UI/UX designs are error-free and user-friendly?',
        'answer'   => 'We use testing and feedback to refine designs and ensure they are both functional and user-friendly.',
    ],
    [
        'question' => 'What can I expect in terms of revisions and costs for UI/UX design services?',
        'answer'   => 'We offer fixed costs with reasonable unlimited revisions to ensure the design meets your needs and expectations.',
    ],
];
include 'includes/components/faq.php';

include 'includes/layout/footer.php';
