<?php
/* * Homepage (new) — "Client perspective": one quote, picked by name from data/shared/testimonials.php */
$hnQuote = null;
foreach (require dirname(__DIR__, 3) . '/data/shared/testimonials.php' as $hnT) {
    if ($hnT['name'] === $hn['testimonial']) { $hnQuote = $hnT; break; }
}
if ($hnQuote):
    // initials for the avatar disc: "Adam Death" -> "AD"
    $hnInitials = implode('', array_map(fn($w) => mb_substr($w, 0, 1), array_slice(preg_split('/\s+/', trim($hnQuote['name'])), 0, 2)));
    // the design uses curly apostrophes
    $hnText = str_replace("'", '’', $hnQuote['quote']);
?>
<section class="hn-section hn-light hn-testimonial" aria-labelledby="hn-quote-title">
    <div class="hn-shell">
        <div class="hn-section-head">
            <div>
                <span class="hn-eyebrow">Client perspective</span>
                <h2 class="hn-reveal" id="hn-quote-title">Good work earns <span class="hn-accent">confidence.</span></h2>
            </div>
        </div>
        <figure class="hn-quote-card hn-reveal">
            <div class="hn-quote-mark" aria-hidden="true">“</div>
            <blockquote><?= $e($hnText) ?></blockquote>
            <figcaption class="hn-quote-person">
                <div class="hn-avatar" aria-hidden="true"><?= $e($hnInitials) ?></div>
                <div><strong><?= $e($hnQuote['name']) ?></strong><span><?= $e(implode(' · ', (array) $hnQuote['role'])) ?></span></div>
            </figcaption>
        </figure>
    </div>
</section>
<?php endif;
unset($hnQuote, $hnT, $hnInitials, $hnText); ?>
