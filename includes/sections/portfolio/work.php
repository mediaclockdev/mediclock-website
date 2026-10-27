<?php
/* * Portfolio — "Our recent work": filter chips + case-study grid (data/portfolio/work.php) */
$pfWork = require dirname(__DIR__, 3) . '/data/portfolio/work.php';
?>
<section class="pf-work" id="work" aria-labelledby="pf-work-title">
  <div class="container">
    <div class="pf-section-head pf-reveal">
        <div>
            <div class="pf-kicker">Selected portfolio</div>
            <h2 id="pf-work-title">Our recent work.</h2>
        </div>
        <p>A selection of the web platforms and mobile apps we have designed and built for Australian businesses.</p>
    </div>

    <div class="pf-filters pf-reveal" role="group" aria-label="Filter projects">
        <?php foreach ($pfWork['filters'] as $pfKey => $pfLabel): ?>
        <button type="button" class="pf-filter<?= $pfKey === 'all' ? ' is-active' : '' ?>" data-filter="<?= $e($pfKey) ?>"
            aria-pressed="<?= $pfKey === 'all' ? 'true' : 'false' ?>"><?= $e($pfLabel) ?></button>
        <?php endforeach; ?>
    </div>

    <div class="pf-grid">
        <?php foreach ($pfWork['projects'] as $pfI => $pfProject): ?>
        <!-- --pf-delay staggers the two cards in each row as they fade in -->
        <article class="pf-project pf-reveal<?= $pfProject['wide'] ? ' is-wide' : '' ?>" data-type="<?= $e($pfProject['type']) ?>"
            style="--pf-delay:<?= ($pfI % 2) * 0.1 ?>s">
            <div class="pf-visual pf-visual-<?= $e($pfProject['layout']) ?> pf-theme-<?= $e($pfProject['theme']) ?>">
                <?php if ($pfProject['layout'] === 'browser'): ?>
                <div class="pf-browser">
                    <div class="pf-browser-top" aria-hidden="true"><i></i><i></i><i></i></div>
                    <?php [$pfSrc, $pfAlt] = $pfProject['images'][0]; ?>
                    <img src="<?= $e(img_src($pfSrc)) ?>" alt="<?= $e($pfAlt) ?>" loading="lazy" decoding="async" />
                </div>
                <?php elseif ($pfProject['layout'] === 'device'): ?>
                <div class="pf-device">
                    <?php [$pfSrc, $pfAlt] = $pfProject['images'][0]; ?>
                    <img src="<?= $e(img_src($pfSrc)) ?>" alt="<?= $e($pfAlt) ?>" loading="lazy" decoding="async" />
                </div>
                <?php else: ?>
                <?php foreach ($pfProject['images'] as [$pfSrc, $pfAlt]): ?>
                <div class="pf-phone">
                    <img src="<?= $e(img_src($pfSrc)) ?>" alt="<?= $e($pfAlt) ?>" loading="lazy" decoding="async" />
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="pf-project-info">
                <div>
                    <?php if (!empty($pfProject['case_study'])): ?>
                    <!-- the link's ::after covers the whole card, so anywhere on it opens the case study -->
                    <h3><a class="pf-project-link" href="<?= $e(page_url($pfWork['case_study_base'] . '/' . $pfProject['case_study'])) ?>"><?= $e($pfProject['title']) ?></a></h3>
                    <p><?= $e($pfProject['meta']) ?></p>
                    <span class="pf-case">View case study <span aria-hidden="true">→</span></span>
                    <?php else: ?>
                    <h3><?= $e($pfProject['title']) ?></h3>
                    <p><?= $e($pfProject['meta']) ?></p>
                    <?php endif; ?>
                </div>
                <span class="pf-tag"><?= $e($pfProject['tag']) ?></span>
            </div>
        </article>
        <?php endforeach; ?>
    </div>

    <div class="pf-more pf-reveal">
        <button type="button" class="pf-btn pf-btn-dark contactBtn" data-interest="Free consultation">Talk to us about your project <span class="pf-arr" aria-hidden="true">↗</span></button>
    </div>
  </div>
</section>
<?php unset($pfWork, $pfKey, $pfLabel, $pfI, $pfProject, $pfSrc, $pfAlt); ?>
