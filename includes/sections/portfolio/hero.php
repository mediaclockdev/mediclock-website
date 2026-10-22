<?php /* * Portfolio — hero (dark band, slow-moving orange shapes on the right) */ ?>
<section class="pf-hero" aria-labelledby="pf-hero-title">
    <div class="pf-orb pf-orb-main" aria-hidden="true"><span></span><i></i><b></b></div>
    <div class="pf-orb pf-orb-soft" aria-hidden="true"></div>
    <div class="pf-spark pf-spark-one" aria-hidden="true">×</div>
    <div class="pf-spark pf-spark-two" aria-hidden="true">+</div>
    <div class="container pf-hero-inner">
        <div class="pf-hero-copy">
            <div class="pf-eyebrow"><i></i> Our recent work · <?= date('Y') ?></div>
            <h1 id="pf-hero-title">
                <span class="pf-hero-line">Digital work,</span>
                <span class="pf-hero-line pf-hero-accent">built to move.</span>
            </h1>
            <p>Websites, mobile apps, and digital products designed with clarity, character, and precise interactions.</p>
            <div class="pf-hero-actions">
                <a class="pf-btn pf-btn-primary" href="#work">View our work <span class="pf-arr" aria-hidden="true">↗</span></a>
                <button type="button" class="pf-btn contactBtn" data-interest="Free consultation">Start a project</button>
            </div>
        </div>
    </div>
</section>
