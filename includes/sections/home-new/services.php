<?php /* * Homepage (new) — "What we do": service list; hovering one swaps the picture behind the panel */ ?>
<section class="hn-section hn-light hn-services" id="services" aria-labelledby="hn-services-title">
    <div class="hn-shell">
        <div class="hn-section-head">
            <div>
                <span class="hn-eyebrow">What we do</span>
                <h2 class="hn-reveal" id="hn-services-title">One team for the full <span class="hn-accent">digital journey.</span></h2>
            </div>
            <p class="hn-reveal">From the first sketch to a working product and the campaigns that help people find it.</p>
        </div>
        <div class="hn-spotlight hn-reveal">
            <?php foreach ($hn['services'] as $hnI => $hnService): ?>
            <div class="hn-service-bg<?= $hnI === 0 ? ' is-active' : '' ?>" data-service-bg="<?= $hnI ?>" aria-hidden="<?= $hnI === 0 ? 'false' : 'true' ?>">
                <img src="<?= $e(img_src($hnService['image'])) ?>" alt="<?= $e($hnService['alt']) ?>"
                    width="1672" height="941" loading="lazy" decoding="async" />
            </div>
            <?php endforeach; ?>
            <div class="hn-service-menu" role="group" aria-label="Services">
                <?php foreach ($hn['services'] as $hnI => $hnService): ?>
                <button type="button" class="hn-service-choice<?= $hnI === 0 ? ' is-active' : '' ?>" data-service="<?= $hnI ?>"
                    aria-pressed="<?= $hnI === 0 ? 'true' : 'false' ?>">
                    <span class="hn-choice-num"><?= str_pad((string) ($hnI + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <span class="hn-choice-title"><?= $e($hnService['title']) ?></span>
                    <span class="hn-choice-arrow" aria-hidden="true">↗</span>
                </button>
                <?php endforeach; ?>
            </div>
            <!-- keeps the panel's height and lightens the picture behind the list -->
            <div class="hn-service-stage" aria-hidden="true"></div>
        </div>
    </div>
</section>
<?php unset($hnI, $hnService); ?>
