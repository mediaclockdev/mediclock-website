<?php
/* ============================================================
   * Intro band — shared component (service pages)
   One line of proof on a band.

     $intro_text  (string|array, required)  one paragraph, or an array of paragraphs
     $intro_theme (string)  'dark' | 'light'  — default 'dark'
     $intro_lead  (string)  bold words before the text, optional
     $intro_title (string)  heading above the text, optional
     $intro_bold  (bool)    Poppins bold text (the "Established in 2017" proof line) — default false
   ============================================================ */
$intro_text  = array_values(array_filter((array) ($intro_text ?? []), fn($p) => $p !== ''));
$intro_theme = ($intro_theme ?? 'dark') === 'light' ? 'light' : 'dark';
$intro_lead  = $intro_lead ?? '';
$intro_title = $intro_title ?? '';
$intro_bold  = !empty($intro_bold);
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
?>
<?php if ($intro_text): ?>
<!-- * Intro band -->
<section class="svc-intro band-<?= $intro_theme ?>">
    <div class="container">
        <?php if ($intro_title !== ''): ?><h2 class="svc-intro-title"><?= $h($intro_title) ?></h2><?php endif; ?>
        <?php foreach ($intro_text as $inI => $inPara): ?>
        <p class="svc-intro-text<?= $intro_bold ? ' svc-intro-text--bold' : '' ?>"><?php if ($inI === 0 && $intro_lead !== ''): ?><strong><?= $h($intro_lead) ?></strong> <?php endif; ?><?= $h($inPara) ?></p>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>
<?php unset($intro_text, $intro_theme, $intro_lead, $intro_title, $intro_bold, $inI, $inPara); ?>
