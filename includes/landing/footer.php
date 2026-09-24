<?php
/* ============================================================
   * Advertisement landing pages — footer
   The main site's footer carries four columns of links. That is the right
   footer for a site you want people to explore and the wrong one for an ad
   landing page, so this one states who we are, how to reach us, and stops.
   ============================================================ */
$lpC = mc_contact();
?>
    <!-- * Landing footer -->
    <footer class="lp-footer">
        <div class="lp-container">
            <img class="lp-footer-logo" src="<?= $e(img_src('logo-light.webp')) ?>" alt="Media Clock" width="239"
                height="48" />
            <p class="lp-footer-tagline">
                Media Clock delivers innovative digital solutions including mobile and web app development,
                UX/UI design, e-commerce, website development, digital marketing, and business digitisation.
            </p>
            <div class="lp-footer-contact">
                <h2>Contact Us</h2>
                <div class="lp-footer-contact-grid">
                    <div class="lp-footer-contact-row">
                        <span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            MEDIACLOCK PTY LTD.
                        </span>
                        <span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                            ABN: 65 617 380 006
                        </span>
                        <span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            392 A St Kilda Rd, St Kilda VIC 3182
                        </span>
                    </div>
                    <div class="lp-footer-contact-row">
                        <a href="<?= $e(mc_tel('mobile')) ?>">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                            <?= $e(mc_tel_text('mobile')) ?>
                        </a>
                        <a href="<?= $e(mc_tel()) ?>">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <?= $e(mc_tel_text()) ?>
                        </a>
                        <a href="mailto:<?= $e($lpC['email']) ?>">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <?= $e($lpC['email']) ?>
                        </a>
                    </div>
                </div>
            </div>
            <p class="lp-footer-copy">
                Copyright &copy; <?= date('Y') ?> Media Clock. All Rights are reserved.
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
