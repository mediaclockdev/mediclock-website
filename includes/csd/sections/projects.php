<?php
/* * CSD : selected work. Each thumbnail is revealed by an orange curtain that
   wipes off once the card scrolls in (csd.js adds .is-in); the whole card is
   a scroll-to-form trigger, since "show me something like this" is the most
   common reason a visitor clicks one.

   Everything inside the card is a <span>: the card itself is an <a>, which
   may only contain phrasing content, so a <ul> of feature points would be
   invalid here. The list semantics are carried by role=list/listitem instead,
   which gives a screen reader the same "list of 3 items" announcement. */
?>
<section class="csd-section csd-alt csd-projects">
    <div class="csd-wrap">
        <div class="csd-center">
            <span class="csd-eyebrow"><?= $e($csd['projects_eyebrow']) ?></span>
            <h2><?= $e($csd['projects_title']) ?></h2>
        </div>
        <div class="csd-grid-projects">
            <?php foreach ($csd['projects'] as $csdP): ?>
            <a class="csd-project csd-tilt" href="#csd-enquire" data-csd-scroll-to="#csd-enquire">
                <span class="csd-glare" aria-hidden="true"></span>
                <span class="csd-thumb">
                    <img src="<?= $e(img_src($csdP['img'])) ?>" alt="<?= $e($csdP['alt']) ?>" width="1200" height="833"
                        loading="lazy" decoding="async" />
                    <span class="csd-thumb-ov" aria-hidden="true"><span>Discuss a similar build &rarr;</span></span>
                </span>
                <span class="csd-project-body">
                    <span class="csd-tag"><?= $e($csdP['tag']) ?></span>
                    <span class="csd-project-title"><?= $e($csdP['title']) ?></span>
                    <span class="csd-project-text"><?= $e($csdP['text']) ?></span>
                    <?php if (!empty($csdP['points'])): ?>
                    <span class="csd-project-points" role="list">
                        <?php foreach ($csdP['points'] as $csdPt): ?>
                        <span class="csd-project-point" role="listitem"><?= $e($csdPt) ?></span>
                        <?php endforeach; ?>
                    </span>
                    <?php endif; ?>
                </span>
            </a>
            <?php endforeach; ?>
        </div>
        <div class="csd-center csd-section-cta">
            <a href="#csd-enquire" class="csd-btn" data-csd-scroll-to="#csd-enquire">
                <?= $e($csd['projects_cta']) ?> <span class="csd-arr" aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</section>
<?php unset($csdP, $csdPt); ?>
