<?php
/* ============================================================
   * Testimonials slider — shared component
   One quote at a time with the client's photo, name, role and
   company logo, like the live service pages. Variables are cleared
   at the bottom, so it can't leak settings into anything after it.

     $testimonials_items                (array)  default: data/shared/testimonials.php
     $testimonials_id             (string) section id           — default 'testimonials'
     $testimonials_eyebrow        (string)                      — default ''
     $testimonials_title          (string)                      — default ''
     $testimonials_title_visible  (bool)   false = heading for
                                           screen readers only  — default true
     $testimonials_lead           (string)                      — default ''
     $testimonials_theme          (string) 'light' | 'dark'     — default 'light'
     $testimonials_autoplay       (int)    ms, 0 = off          — default 6000

   Example:
     $testimonials_title = 'What our clients say';
     $testimonials_theme = 'dark';
     include 'includes/components/testimonials.php';
   ============================================================ */
$testimonials_items               = $testimonials_items               ?? require dirname(__DIR__, 2) . '/data/shared/testimonials.php';
$testimonials_id            = $testimonials_id            ?? 'testimonials';
$testimonials_eyebrow       = $testimonials_eyebrow       ?? '';
$testimonials_title         = $testimonials_title         ?? '';
$testimonials_title_visible = $testimonials_title_visible ?? true;
$testimonials_lead          = $testimonials_lead          ?? '';
$testimonials_theme         = ($testimonials_theme ?? 'light') === 'dark' ? 'dark' : 'light';
$testimonials_autoplay      = (int) ($testimonials_autoplay ?? 6000);
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
$tsLabel = $testimonials_title !== '' ? $testimonials_title : 'Client testimonials';
?>
<?php if ($testimonials_items): ?>
<!-- * Testimonials slider -->
<section class="section testimonial-band band-<?= $testimonials_theme ?>" id="<?= $h($testimonials_id) ?>"
    <?= $testimonials_title !== '' ? 'aria-labelledby="' . $h($testimonials_id) . '-title"' : 'aria-label="' . $h($tsLabel) . '"' ?>>
    <div class="container">
        <?php if ($testimonials_title !== '' || $testimonials_eyebrow !== '' || $testimonials_lead !== ''): ?>
        <div class="head<?= $testimonials_title_visible ? '' : ' visually-hidden' ?>">
            <?php if ($testimonials_eyebrow !== ''): ?><div class="eyebrow"><?= $h($testimonials_eyebrow) ?></div><?php endif; ?>
            <?php if ($testimonials_title !== ''): ?><h2 id="<?= $h($testimonials_id) ?>-title"><?= $h($testimonials_title) ?></h2><?php endif; ?>
            <?php if ($testimonials_lead !== ''): ?><p><?= $h($testimonials_lead) ?></p><?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="mc-slider testimonial-slider" data-slider data-autoplay="<?= $testimonials_autoplay ?>"
            style="--pv:1;--gap:24px" aria-roledescription="carousel" aria-label="<?= $h($tsLabel) ?>">
            <div class="mc-slider-track" tabindex="0">
                <?php foreach ($testimonials_items as $tsI => $ts): ?>
                <figure class="mc-slide tcard" role="group" aria-roledescription="slide"
                    aria-label="<?= $tsI + 1 ?> of <?= count($testimonials_items) ?>">
                    <blockquote class="tcard-quote">
                        <p>&ldquo;<?= $h($ts['quote']) ?>&rdquo;</p>
                    </blockquote>
                    <figcaption class="tcard-foot">
                        <?php if (!empty($ts['avatar'])): ?>
                        <img class="tcard-avatar" src="<?= $h(img_src($ts['avatar'])) ?>" alt="" width="64"
                            height="64" loading="lazy" decoding="async" />
                        <?php endif; ?>
                        <span class="tcard-who">
                            <span class="tcard-name"><?= $h($ts['name']) ?></span>
                            <?php foreach ((array) ($ts['role'] ?? []) as $tsLine): ?>
                            <span class="tcard-role"><?= $h($tsLine) ?></span>
                            <?php endforeach; ?>
                        </span>
                        <?php if (!empty($ts['logo'])): ?>
                        <img class="tcard-logo" src="<?= $h(img_src($ts['logo'])) ?>"
                            alt="<?= $h($ts['logo_alt'] ?? '') ?>" loading="lazy" decoding="async"<?= isset($ts['logo_w'], $ts['logo_h']) ? ' width="' . (int) $ts['logo_w'] . '" height="' . (int) $ts['logo_h'] . '"' : '' ?> />
                        <?php endif; ?>
                    </figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
            <div class="mc-slider-dots"></div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php unset($testimonials_items, $testimonials_id, $testimonials_eyebrow, $testimonials_title,
    $testimonials_title_visible, $testimonials_lead, $testimonials_theme, $testimonials_autoplay,
    $tsLabel, $tsI, $ts, $tsLine); ?>
