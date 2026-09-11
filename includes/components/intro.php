<?php
/* ============================================================
   * Intro band — shared component (service pages)
   One line of proof on a dark band.

     $intro_text (string, required)

   In data/pages/<slug>.php:  ['type' => 'intro', 'text' => '…']
   ============================================================ */
$intro_text = $intro_text ?? '';
$h = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
?>
<?php if ($intro_text !== ''): ?>
<!-- * Intro band -->
<section class="svc-intro band-dark">
    <div class="container">
        <p class="svc-intro-text"><?= $h($intro_text) ?></p>
    </div>
</section>
<?php endif; ?>
<?php unset($intro_text); ?>
