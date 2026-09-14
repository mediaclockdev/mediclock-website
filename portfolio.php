<?php
$page_title       = 'Portfolio – Media Clock';
$page_description = 'Explore the Media Clock portfolio: the Australian businesses and government clients we have delivered tailored software solutions for.';
$page_css         = ['service', 'portfolio'];
include 'includes/layout/header.php';

// * Hero
$hero_title = 'Trusted by Experts';
$hero_cta   = '';
$hero_image = 'pages/portfolio/hero.webp';
include 'includes/components/hero.php';

// * Client tiles — the dark rounded square is part of each image. Order here = order on screen.
$portfolio = [
    'FND Australia Support Services Inc',
    'Tasmanian Government',
    'Keycon Constructions',
    'Jewel of Asia',
    'Hertz',
    'Carbon Co',
    'Tasmanian Whiskey, Wine & Food',
    'Golf Club',
    'Lifeline Movers',
    'One Stop Utilities',
    'Atomic',
    'Triple R Community Care Services',
    'Verma Jewellers',
    'West Coast Council',
    'Richards Aluminium Windows & Doors',
    'Australian Scaffold',
    'Harvest Vegetarian Restaurant',
    'The Australia Today',
    'Niawa Care',
    'Turbo',
];
?>
<!-- * Portfolio -->
<section class="section portfolio band-light" id="portfolio" aria-labelledby="portfolio-title">
    <div class="container">
        <p class="portfolio-lead">Explore our portfolio, featuring the logos of our esteemed clients. Each logo represents a unique collaboration where we delivered tailored software solutions to meet specific needs. Discover the trust and confidence that businesses have placed in our expertise.</p>
        <h2 id="portfolio-title">Portfolio</h2>

        <ul class="portfolio-grid list-unstyled">
            <?php foreach ($portfolio as $i => $name): ?>
            <li>
                <img src="<?= $e(img_src(sprintf('pages/portfolio/%02d.webp', $i + 1))) ?>" alt="<?= $e($name) ?>"
                    width="265" height="265" loading="lazy" decoding="async" />
            </li>
            <?php endforeach; ?>
        </ul>
        <p class="portfolio-more">and lot more...</p>
    </div>
</section>
<?php
unset($portfolio, $i, $name);

// * Contact panel (hidden until a .contactBtn opens it; the header buttons need it)
include 'includes/components/contact.php';

include 'includes/layout/footer.php';
