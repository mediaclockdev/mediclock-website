<?php
/* ============================================================
   * Custom Software Development ad pages — footer
   The main site's footer carries four columns of links. That is the right
   footer for a site you want people to explore and the wrong one for an ad
   landing page, so this one states who we are, how to reach us, and stops.
   ============================================================ */
$csdC = mc_contact();
?>
    <!-- * Landing footer -->
    <footer class="csd-footer">
        <div class="csd-wrap">
            <div class="csd-foot-grid">
                <div>
                    <a href="#" data-csd-top aria-label="Scroll to top">
                        <img class="csd-footer-logo" src="<?= $e(img_src('logo-light.webp')) ?>" alt="Media Clock"
                            width="239" height="48" />
                    </a>
                    <p><?= $e($csd['footer_tagline']) ?></p>
                </div>
                <div>
                    <h2>Contact</h2>
                    <ul class="csd-foot-list">
                        <li>MEDIACLOCK PTY LTD. &middot; ABN 65 617 380 006</li>
                        <?php if (!empty($csd['address'])): ?>
                        <li>
                            <a href="https://maps.google.com/maps?q=<?= rawurlencode($csd['address']) ?>" target="_blank"
                                rel="noopener noreferrer"><?= $e($csd['address']) ?></a>
                        </li>
                        <?php endif; ?>
                        <li><a href="<?= $e(mc_tel()) ?>"><?= $e(mc_tel_text()) ?></a></li>
                        <li><a href="<?= $e(mc_tel('mobile')) ?>"><?= $e(mc_tel_text('mobile')) ?></a></li>
                        <li><a href="mailto:<?= $e($csdC['email']) ?>"><?= $e($csdC['email']) ?></a></li>
                    </ul>
                </div>
            </div>
            <p class="csd-copy">Copyright &copy; <?= date('Y') ?> Media Clock. All Rights are reserved.</p>
        </div>
    </footer>

    <!-- * Phone-only action bar. It replaces the desktop header CTA once the
         header scrolls away, so calling and the form are both always one tap
         from wherever the visitor stopped reading. -->
    <div class="csd-call-bar">
        <a href="<?= $e(mc_tel()) ?>" class="csd-call-bar-1">Call Now</a>
        <a href="#csd-enquire" class="csd-call-bar-2" data-csd-scroll-to="#csd-enquire">Get a Quote</a>
    </div>

    <!-- main.js carries the shared form validator (the same rules, messages and
         input-time filtering every other form uses), mcThankYou(), and the
         [data-slider] engine the Technologies strip runs on. Each of its blocks
         bails out when the element it wants is absent, so the parts that drive
         the main site's nav simply do nothing here. csd.js adds only what is
         specific to this page. -->
    <script src="<?= $e(asset_url('assets/js/main.js')) ?>" defer></script>
    <script src="<?= $e(asset_url('assets/js/csd.js')) ?>" defer></script>
</body>

</html>
