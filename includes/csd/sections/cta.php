<?php
/* * CSD : closing call to action — the last thing on the page before the
   footer, with both ways to get in touch side by side. */
?>
<section class="csd-section csd-cta-band">
    <div class="csd-wrap csd-center">
        <h2><?= $e($csd['cta_title']) ?></h2>
        <p><?= $e($csd['cta_text']) ?></p>
        <a href="#csd-enquire" class="csd-btn csd-btn-dark" data-csd-scroll-to="#csd-enquire">
            <?= $e($csd['cta_btn']) ?> <span class="csd-arr" aria-hidden="true">&rarr;</span>
        </a>
        <a href="<?= $e(mc_tel()) ?>" class="csd-cta-phone"><?= $e(mc_tel_text()) ?></a>
    </div>
</section>
