<?php
/* * Homepage — Our Journey (counters animated by assets/js/home.js) */
$journey = [
    ['Web Apps Developed', 175, '+'],
    ['Mobile Apps Developed', 30, '+'],
    ['Clients', 150, '+'],
    ['Satisfied Clients', 98, '%'],
];
?>
<!-- * Homepage : our journey -->
<section class="section home-journey" id="journey" aria-labelledby="journey-title">
    <div class="container">
        <div class="head">
            <h2 id="journey-title">Our Journey</h2>
        </div>
        <div class="row row-cols-2 row-cols-lg-4 g-4">
            <?php foreach ($journey as $i => [$label, $n, $suffix]): ?>
            <div class="col">
                <div class="journey-stat h-100">
                    <img src="<?= $e(img_src('home/journey/' . ($i + 1) . '.svg')) ?>" alt="" width="50" height="50" />
                    <div class="journey-num"><span data-count="<?= $n ?>"><?= $n ?></span><?= $e($suffix) ?></div>
                    <div class="journey-label"><?= $e($label) ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($journey, $i, $label, $n, $suffix); ?>
