<?php
/* * Homepage — What we do? (six service cards) */
$homeServices = [
    ['UX/UI', 'Design', 'home/services/ux-ui.webp', 'Creating user-friendly application designs to ensure error-free development.', 'ui-ux-design/'],
    ['Mobile App', 'Development', 'home/services/mobile-app.webp', 'Turn your vision into a seamless mobile experience that engages users on the go.', 'mobile-app-development/'],
    ['Web App', 'Development', 'home/services/web-app.webp', 'Empower your business with dynamic web solutions tailored to your unique needs.', 'website-development/'],
    ['Website', 'Design', 'home/services/website.webp', 'Elevate your online presence with captivating designs that leave a lasting impression.', 'website-development/'],
    ['eCommerce', 'Design', 'home/services/mobile-app.webp', 'Transform your online store into a thriving marketplace with design and functionality.', 'ecommerce-website-design/'],
    ['Digital', 'Marketing', 'home/services/digital-marketing.webp', "Amplify your brand's online presence and drive results through targeted digital strategies.", 'digital-marketing/'],
];
?>
<!-- * Homepage : what we do -->
<section class="section home-services band-dark" id="services" aria-labelledby="services-title">
    <div class="container">
        <div class="head">
            <h2 id="services-title">What we do?</h2>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($homeServices as [$l1, $l2, $img, $copy, $slug]): ?>
            <div class="col">
                <article class="home-service h-100">
                    <img src="<?= $e(img_src($img)) ?>" alt="" width="321" height="222" loading="lazy" decoding="async" />
                    <h3><?= $e($l1) ?><br><?= $e($l2) ?></h3>
                    <p><?= $e($copy) ?></p>
                    <a href="<?= $e(page_url($slug)) ?>">How? Know more</a>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($homeServices, $l1, $l2, $img, $copy, $slug); ?>
