<?php /* * Case study — hero: back to the grid, project name, one-line summary */ ?>
<?php /* optional 'hero_logo' => [src, width, height]: the client's logo as a large, faint
         watermark on the right, in place of the orange shapes (case-study.css) */ ?>
<?php $csLogo = $cs['hero_logo'] ?? null; ?>
<?php /* <section class="cs-hero" aria-labelledby="cs-title"> */ ?>
<section class="cs-hero<?= $csLogo ? ' cs-hero-has-logo' : '' ?>" aria-labelledby="cs-title">
    <?php if ($csLogo): ?>
    <?php /* a layer the same width as the copy's container, so the logo's right edge lines up
             with the content at every width; the logo box takes the logo's own shape */ ?>
    <div class="container cs-hero-mark" aria-hidden="true">
        <div class="cs-hero-mark-area">
            <div class="cs-hero-logo" style="aspect-ratio: <?= (int) $csLogo[1] ?> / <?= (int) $csLogo[2] ?>">
                <img src="<?= $e(img_src($csLogo[0])) ?>" alt="" width="<?= (int) $csLogo[1] ?>" height="<?= (int) $csLogo[2] ?>" decoding="async" />
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="container cs-hero-inner">
        <!-- <a class="cs-back" href="<?= $e(page_url($csBase)) ?>#work"><span aria-hidden="true">←</span> All work</a> -->
        <a class="cs-back" href="<?= $e(page_url($csBase)) ?>#work"><span aria-hidden="true">←</span> All Work</a>
        <h1 class="cs-display" id="cs-title"><?= $e($cs['title']) ?></h1>
        <p class="cs-hero-sub"><?= $e($cs['subtitle']) ?></p>
        <!-- <a class="cs-btn" href="#problem">View case study</a> -->
        <a class="cs-btn" href="#problem">View Case Study</a>
    </div>
</section>
<?php unset($csLogo); ?>
