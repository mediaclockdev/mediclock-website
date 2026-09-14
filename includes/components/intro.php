<?php
/* ============================================================
   * Intro band — shared component (service pages)
   One line of proof on a band.

     $intro_text  (string, required)
     $intro_theme (string)  'dark' | 'light'  — default 'dark'
   ============================================================ */
$intro_text  = $intro_text ?? '';
$intro_theme = ($intro_theme ?? 'dark') === 'light' ? 'light' : 'dark';
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
?>
<?php if ($intro_text !== ''): ?>
<!-- * Intro band -->
<section class="svc-intro band-<?= $intro_theme ?>">
    <div class="container">
        <p class="svc-intro-text"><?= $h($intro_text) ?></p>
    </div>
</section>
<?php endif; ?>
<?php unset($intro_text, $intro_theme); ?>
