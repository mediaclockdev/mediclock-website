<?php
$page_title       = 'Our Process – Media Clock';
$page_description = 'How Media Clock delivers web and mobile apps: initial planning and analysis, proof of concept, then full software development.';
$page_css         = ['service', 'our-process'];
include 'includes/layout/header.php';

// * Hero
$hero_title    = 'Transforming Ideas into Reality';
$hero_cta      = "Let's Talk";
$hero_cta_href = mc_tel();
$hero_image    = 'pages/our-process/hero.webp';
include 'includes/components/hero.php';

// * Intro band
$intro_text = 'At Media Clock, we excel in creating innovative web and mobile applications that cater to diverse needs, from business automation to cutting-edge concept-based solutions. Our robust project delivery model ensures that we understand your vision, refine your requirements, and deliver high-quality results efficiently and effectively.';
include 'includes/components/intro.php';

// * Three-step process
$steps = [
    [
        'name'    => 'Initial Planning & Analysis',
        'summary' => 'We define project goals, gather requirements, and assess feasibility to ensure a clear path forward.',
        'image'   => ['pages/our-process/step-1.webp', 300, 451],
        'points'  => [
            'Scoping (SOW):' => 'We define the scope of work to ensure all aspects of the project are covered.',
            'Requirement Gathering:' => 'We work closely with you to gather detailed requirements, ensuring we understand your business needs and objectives.',
            'Business Requirement Documentation:' => 'We create comprehensive documentation outlining the business needs and goals.',
            'Functional Requirement Documentation:' => 'We detail the specific functions and features your application will need to meet your business objectives.',
            'Initial Call:' => 'This step includes an initial call to discuss your vision and establish a clear path forward.',
        ],
    ],
    [
        'name'    => 'Proof of Concept',
        'summary' => 'We build a small, working model to test the idea and spot any issues early on.',
        'image'   => ['pages/our-process/step-2.webp', 596, 451],
        'points'  => [
            'Persona Defining:' => 'We identify the target users to tailor the application to their needs.',
            'User Stories/Use Cases:' => 'We create user stories and use cases to understand how users will interact with your application.',
            'Process Flow Chart:' => 'We develop a process flow chart to visualise the steps and processes involved.',
            'Feature Specification:' => 'We turn the user stories and flows into a detailed feature list, defining how each screen and function should behave.',
            'Architectural Diagram:' => 'We design an architectural diagram to outline the technical structure of your application.',
            'Low Fidelity Design:' => 'We create initial designs to provide a basic visual representation of your application.',
            'Prototype (High Fidelity Design):' => 'We develop a high-fidelity prototype to give you a realistic preview of the final product.',
        ],
    ],
    [
        'name'    => 'Software Development',
        'summary' => 'We develop, test, and deploy the complete software, turning the concept into a finished product.',
        'image'   => ['pages/our-process/step-3.webp', 611, 451],
        'points'  => [
            'Coding:' => 'Our team of expert developers writes clean, efficient code to build your application according to the defined requirements and specifications.',
            'Testing:' => 'We conduct rigorous testing to ensure the functionality, performance, and security of your application.',
            'Deployment:' => 'We deploy your application in a controlled environment to prepare it for launch.',
            'Launching:' => 'We assist in launching your application, ensuring a smooth transition from development to production.',
            'Support:' => 'We provide ongoing support and maintenance to keep your application running smoothly and address any issues that may arise.',
        ],
    ],
];
?>
<!-- * Our Three-Step Process -->
<section class="section process band-light" id="process" aria-labelledby="process-title">
    <div class="container">
        <div class="head">
            <h2 id="process-title">Our Three-Step Process</h2>
        </div>

        <ol class="process-steps list-unstyled mb-0">
            <?php foreach ($steps as $i => $step): ?>
            <li class="process-step">
                <!-- * Process : step badge + summary -->
                <div class="process-step-head">
                    <!-- the badge used to be a 226px image with the step name baked
                         into it over three lines; as markup the box widens to the
                         name and keeps it on one line -->
                    <div class="process-badge">
                        <span class="process-badge-mark"><span class="process-badge-num"><?= $i + 1 ?></span></span>
                        <h3 class="process-badge-name"><?= $e($step['name']) ?></h3>
                    </div>
                    <p class="process-summary"><?= $e($step['summary']) ?></p>
                </div>
                <!-- * Process : illustration -->
                <div class="process-media">
                    <img src="<?= $e(img_src($step['image'][0])) ?>" alt="" width="<?= $step['image'][1] ?>"
                        height="<?= $step['image'][2] ?>" loading="lazy" decoding="async" />
                </div>
                <!-- * Process : what happens in this step -->
                <ul class="process-points">
                    <?php foreach ($step['points'] as $label => $text): ?>
                    <li><strong><?= $e($label) ?></strong> <?= $e($text) ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
<?php
unset($steps, $step, $i, $label, $text);

// * Contact panel (hidden until a .contactBtn opens it; the header buttons need it)
include 'includes/components/contact.php';

include 'includes/layout/footer.php';
