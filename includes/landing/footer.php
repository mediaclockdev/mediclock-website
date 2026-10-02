<?php
/* ============================================================
   * Advertisement landing pages — footer
   The main site's footer carries four columns of links. That is the right
   footer for a site you want people to explore and the wrong one for an ad
   landing page, so this one states who we are, how to reach us, and stops.
   ============================================================ */
$lpC = mc_contact();
?>
    <!-- * Landing footer. The closing section above already carries the
         phone, the address and the form, so this is the legal line and
         nothing else — no column of links out of a paid funnel. -->
    <footer class="lp-footer">
        <div class="lp-container lp-footer-inner">
            <p>&copy; <?= date('Y') ?> Mediaclock Pty Ltd &middot; ABN 65 617 380 006</p>
            <p>
                392 A St Kilda Rd, St Kilda VIC 3182 &middot;
                <a href="<?= $e(mc_tel()) ?>"><?= $e(mc_tel_text()) ?></a> &middot;
                <a href="<?= $e(mc_tel('mobile')) ?>"><?= $e(mc_tel_text('mobile')) ?></a> &middot;
                <a href="mailto:<?= $e($lpC['email']) ?>"><?= $e($lpC['email']) ?></a>
            </p>
        </div>
    </footer>

    <!-- * Sticky quote button — follows the visitor down the page so the form
         is always one tap away, wherever they stopped reading -->
    <button type="button" class="lp-sticky-quote" data-lp-scroll-to="#lp-quote">Get a Quote</button>

    <!-- main.js unchanged: it carries the shared form validator (the same
         rules, messages and input-time filtering every other form uses) and
         mcThankYou(). Each of its blocks bails out when the element it wants
         is absent, so the parts that drive the main site's nav simply do
         nothing here. landing.js adds only what is specific to this page. -->
    <script src="<?= $e(asset_url('assets/js/main.js')) ?>" defer></script>
    <script src="<?= $e(asset_url('assets/js/landing.js')) ?>" defer></script>
</body>

</html>
