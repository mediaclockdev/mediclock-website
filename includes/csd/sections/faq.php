<?php
/* * CSD : FAQ. Native <details> so the answers are in the page for find-in-page
   and for a visitor with JS off; the first one is open as the design has it. */
?>
<section class="csd-section csd-alt csd-faq">
    <div class="csd-wrap">
        <div class="csd-center">
            <span class="csd-eyebrow"><?= $e($csd['faq_eyebrow']) ?></span>
            <h2><?= $e($csd['faq_title']) ?></h2>
        </div>
        <div class="csd-faq-list">
            <?php foreach ($csd['faq'] as $csdI => [$csdQ, $csdA]): ?>
            <details name="csd-faq"<?= $csdI === 0 ? ' open' : '' ?>>
                <summary><?= $e($csdQ) ?></summary>
                <p><?= $e($csdA) ?></p>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php unset($csdI, $csdQ, $csdA); ?>
