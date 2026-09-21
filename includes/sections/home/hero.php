<?php
/* * Homepage hero — three slides, rotated by the shared [data-slider] engine (main.js) */
$heroSlides = [
    ['bg' => 'home/hero/1.webp', 'html' => '<h1 class="home-hero-title"><span class="home-hero-words"><span>Mobile Apps</span><span>Web Apps</span></span></h1><p class="home-hero-sub">Bespoke Software Solutions</p>', 'cta' => 'Got a project?', 'href' => page_url('contact-us')],
    ['bg' => 'home/hero/2.webp', 'html' => '<h2 class="home-hero-title">We Scope,<br>Design &amp; Develop<br>your software</h2>', 'cta' => 'Book a Consultation', 'href' => page_url('contact-us')],
    ['bg' => 'home/hero/3.webp', 'html' => '<h2 class="home-hero-title">Turning Your Vision<br>and Process<br>Into Software</h2>', 'cta' => 'Ready to Start?', 'href' => page_url('contact-us')],
];
?>
<!-- * Homepage hero -->
<section class="home-hero" aria-label="Media Clock">
    <div class="mc-slider" data-slider data-autoplay="5000" style="--pv:1;--gap:0px" aria-roledescription="carousel"
        aria-label="Highlights">
        <div class="mc-slider-track" tabindex="0">
            <?php foreach ($heroSlides as $i => $s): ?>
            <div class="mc-slide home-hero-slide" role="group" aria-roledescription="slide"
                aria-label="<?= $i + 1 ?> of <?= count($heroSlides) ?>"
                style="background-image:url('<?= $e(img_src($s['bg'])) ?>')">
                <div class="container">
                    <?= $s['html'] ?>
                    <a class="service-hero-cta" href="<?= $e($s['href']) ?>"><span aria-hidden="true">&rarr;</span>
                        <?= $e($s['cta']) ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="mc-slider-dots"></div>
    </div>
</section>
<?php unset($heroSlides, $i, $s); ?>
