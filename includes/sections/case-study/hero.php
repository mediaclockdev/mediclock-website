<?php /* * Case study — hero: back to the grid, project name, one-line summary */ ?>
<section class="cs-hero" aria-labelledby="cs-title">
    <div class="container cs-hero-inner">
        <a class="cs-back" href="<?= $e(page_url($csBase)) ?>#work"><span aria-hidden="true">←</span> All work</a>
        <h1 class="cs-display" id="cs-title"><?= $e($cs['title']) ?></h1>
        <p class="cs-hero-sub"><?= $e($cs['subtitle']) ?></p>
        <a class="cs-btn" href="#problem">View case study</a>
    </div>
</section>
