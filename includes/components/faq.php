<?php
/* ============================================================
   * FAQ Section — shared dynamic component
   Every page with FAQs uses this component.
   Set the variables below BEFORE including this file:

     $faq_id       (string, optional)   section HTML id (default 'faqs')
     $faq_eyebrow  (string, optional)   eyebrow label (default 'FAQs')
     $faq_title    (string, optional)   section heading (default 'Frequently Asked Questions')
     $faq_lead     (string, optional)   optional lead paragraph
     $faq_theme    (string, optional)   'light' or 'dark' (default 'light')
     $faq_items    (array, required)    list of questions and answers:
       [
         [
           'question' => 'What is included?',
           'answer'   => 'Every package mixes strategy...',
           'open'     => true, // optional: true to have it open on page load
         ],
         ...
       ]

   Example usage:
     $faq_title = 'SEO FAQs';
     $faq_items = [ ... ];
     include 'includes/components/faq.php';
   ============================================================ */

$faq_id      = $faq_id      ?? 'faqs';
$faq_eyebrow = $faq_eyebrow ?? 'FAQs';
$faq_title   = $faq_title   ?? 'Frequently Asked Questions';
$faq_lead    = $faq_lead    ?? '';
$faq_theme   = $faq_theme   ?? 'light';
$faq_items   = $faq_items   ?? [];
$h = fn($s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
?>
<?php if (!empty($faq_items)): ?>
<section class="section faq-section<?= $faq_theme === 'dark' ? ' faq-dark' : '' ?>" id="<?= $h($faq_id) ?>">
    <div class="container">
        <div class="head">
            <?php if ($faq_eyebrow): ?>
            <div class="eyebrow"><?= $h($faq_eyebrow) ?></div>
            <?php endif; ?>
            <h2><?= $h($faq_title) ?></h2>
            <?php if ($faq_lead): ?>
            <p><?= $h($faq_lead) ?></p>
            <?php endif; ?>
        </div>
        <div class="faq d-flex flex-column">
            <?php foreach ($faq_items as $item): 
                $isOpen = !empty($item['open']);
            ?>
            <div class="faqitem<?= $isOpen ? ' open' : '' ?>">
                <button type="button" class="faqbtn d-flex align-items-center justify-content-between" aria-expanded="<?= $isOpen ? 'true' : 'false' ?>">
                    <span class="faq-q"><?= $h($item['question']) ?></span>
                    <span class="faq-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                </button>
                <div class="answer">
                    <?php if (is_array($item['answer'])): ?>
                        <?php foreach ($item['answer'] as $para): ?>
                            <p><?= $para ?></p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p><?= $item['answer'] ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php unset($faq_id, $faq_eyebrow, $faq_title, $faq_lead, $faq_theme, $faq_items); ?>
