<?php /* * Homepage (new) — "Our process": sticky intro + scroll-drawn orange roadmap (assets/js/home-new.js) */ ?>
<section class="hn-section hn-dark hn-process" id="process" aria-labelledby="hn-process-title">
    <div class="hn-shell hn-process-grid">
        <div class="hn-process-sticky hn-reveal">
            <span class="hn-eyebrow">Our process</span>
            <h2 id="hn-process-title">The road from <span class="hn-accent">idea to impact.</span></h2>
            <p>Follow the orange route. Each milestone becomes clear as the journey reaches it, then settles back as the next stage takes focus.</p>
        </div>
        <div class="hn-roadmap">
            <svg class="hn-road-svg" viewBox="0 0 66 1000" preserveAspectRatio="none" aria-hidden="true">
                <path class="hn-road-base" d="M24 0 L24 1000"></path>
                <path class="hn-road-glow" d="M24 0 L24 1000"></path>
            </svg>
            <?php foreach ($hn['process'] as $hnI => $hnStep): ?>
            <i class="hn-road-point" style="top:<?= 9 + $hnI * 20 ?>%" aria-hidden="true"></i>
            <?php endforeach; ?>
            <ol class="hn-steps">
                <?php foreach ($hn['process'] as $hnI => [$hnTitle, $hnText, $hnTag]): ?>
                <li class="hn-step">
                    <b><?= str_pad((string) ($hnI + 1), 2, '0', STR_PAD_LEFT) ?></b>
                    <div>
                        <h3><?= $e($hnTitle) ?></h3>
                        <p><?= $e($hnText) ?></p>
                        <span class="hn-step-tag"><?= $e($hnTag) ?></span>
                    </div>
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</section>
<?php unset($hnI, $hnStep, $hnTitle, $hnText, $hnTag); ?>
