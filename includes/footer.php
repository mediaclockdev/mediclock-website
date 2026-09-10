<?php $services = $services ?? require __DIR__ . '/services.php'; ?>
    <!-- * Footer -->
    <footer class="global-footer">
        <!-- * Footer : 3-column top block (Bootstrap grid, gutters off) -->
        <div class="container footer-top">
            <div class="row g-0">

                <!-- * Footer : brand + contact + social -->
                <div class="col-12 col-lg-6 footer-brand">
                    <img src="assets/images/logo-light.webp" alt="Media Clock" width="239" height="48" />
                    <p class="footer-tagline">
                        Bespoke mobile apps, web apps and digital marketing for Australian
                        businesses. Established in 2017.
                    </p>
                    <div class="footer-contact">
                        <a href="tel:0489906090">0489 906 090</a>
                        <a href="mailto:info@mediaclock.com.au">info@mediaclock.com.au</a>
                    </div>
                    <h2 class="footer-heading">Follow Us</h2>
                    <div class="footer-social d-flex">
                        <a href="https://www.facebook.com/mediaclock.com.au/" target="_blank" rel="noopener"
                            aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12" />
                            </svg></a>
                        <a href="https://www.instagram.com/media_clock_/" target="_blank" rel="noopener"
                            aria-label="Instagram"><svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2c2.7 0 3.1 0 4.1.06 1.1.05 1.8.2 2.4.45.7.27 1.2.6 1.7 1.1.5.5.9 1 1.1 1.7.25.6.4 1.3.45 2.4.05 1 .06 1.4.06 4.1s0 3.1-.06 4.1c-.05 1.1-.2 1.8-.45 2.4a4.6 4.6 0 0 1-1.1 1.7c-.5.5-1 .9-1.7 1.1-.6.25-1.3.4-2.4.45-1 .05-1.4.06-4.1.06s-3.1 0-4.1-.06c-1.1-.05-1.8-.2-2.4-.45a4.6 4.6 0 0 1-1.7-1.1 4.6 4.6 0 0 1-1.1-1.7c-.25-.6-.4-1.3-.45-2.4C2 15.1 2 14.7 2 12s0-3.1.06-4.1c.05-1.1.2-1.8.45-2.4.22-.6.55-1.15 1.1-1.7.5-.5 1-.9 1.7-1.1.6-.25 1.3-.4 2.4-.45C8.9 2 9.3 2 12 2m0 1.8c-2.6 0-3 0-4 .06-.95.04-1.46.2-1.8.33-.45.17-.78.38-1.12.72-.34.34-.55.67-.72 1.12-.13.34-.29.85-.33 1.8-.05 1-.06 1.4-.06 4s0 3 .06 4c.04.95.2 1.46.33 1.8.17.45.38.78.72 1.12.34.34.67.55 1.12.72.34.13.85.29 1.8.33 1 .05 1.4.06 4 .06s3 0 4-.06c.95-.04 1.46-.2 1.8-.33.45-.17.78-.38 1.12-.72.34-.34.55-.67.72-1.12.13-.34.29-.85.33-1.8.05-1 .06-1.4.06-4s0-3-.06-4c-.04-.95-.2-1.46-.33-1.8a2.9 2.9 0 0 0-.72-1.12 2.9 2.9 0 0 0-1.12-.72c-.34-.13-.85-.29-1.8-.33-1-.05-1.4-.06-4-.06M12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10m0 1.8a3.2 3.2 0 1 0 0 6.4 3.2 3.2 0 0 0 0-6.4m5.2-2.9a1.17 1.17 0 1 1 0 2.34 1.17 1.17 0 0 1 0-2.34" />
                            </svg></a>
                        <a href="https://www.linkedin.com/company/mediaclock/" target="_blank" rel="noopener"
                            aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5M3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2 3.77-2 4 0 4.75 2.6 4.75 6.1V21H17v-5.6c0-1.35-.02-3.1-1.9-3.1-1.9 0-2.2 1.5-2.2 3v5.7H9z" />
                            </svg></a>
                        <a href="https://api.whatsapp.com/send/?phone=0489%20906%20090&amp;text&amp;type=phone_number&amp;app_absent=0"
                            target="_blank" rel="noopener" aria-label="WhatsApp"><svg viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5.05-1.3A10 10 0 1 0 12 2m0 1.8a8.2 8.2 0 0 1 6.9 12.6l-.25.4.55 2-2.05-.55-.4.24A8.2 8.2 0 1 1 12 3.8m-3.3 4.1c-.2 0-.5.07-.77.35-.26.28-1 1-1 2.4s1.03 2.8 1.17 3c.15.2 2 3.1 4.9 4.3 2.4 1 2.9.8 3.4.75.5-.05 1.63-.65 1.85-1.3.23-.63.23-1.16.16-1.28-.07-.12-.26-.2-.55-.34-.28-.15-1.63-.8-1.88-.9-.25-.1-.44-.14-.62.15-.19.28-.72.9-.88 1.1-.16.18-.32.2-.6.07-.28-.15-1.18-.44-2.26-1.4-.83-.75-1.4-1.66-1.56-1.94-.16-.28-.02-.44.12-.58.13-.13.28-.32.42-.5.14-.16.19-.28.28-.46.1-.2.05-.36-.02-.5-.07-.15-.6-1.5-.85-2.05-.22-.5-.45-.44-.6-.44h-.5" />
                            </svg></a>
                    </div>
                </div>

                <!-- * Footer : Quick Links -->
                <div class="col-12 col-lg-3 footer-col">
                    <h2 class="footer-heading">Quick Links</h2>
                    <a href="https://mediaclock.com.au/about-us/" target="_blank" rel="noopener">About us</a>
                    <a href="https://mediaclock.com.au/portfolio/" target="_blank" rel="noopener">Portfolio</a>
                    <a href="https://mediaclock.com.au/our-process/" target="_blank" rel="noopener">Our Process</a>
                    <button type="button" class="contactBtn" data-interest="Free consultation">
                        Get In Touch
                    </button>
                    <a href="https://mediaclock.com.au/career/" target="_blank" rel="noopener">Careers</a>
                </div>

                <!-- * Footer : Services -->
                <div class="col-12 col-lg-3 footer-col">
                    <h2 class="footer-heading">Services</h2>
                    <?php foreach ($services as $items): foreach ($items as [$label, $url]): ?>
                    <a href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8') ?>"<?= $url === '#top' ? ' class="current"' : ' target="_blank" rel="noopener"' ?>><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></a>
                    <?php endforeach; endforeach; ?>
                </div>

            </div>
        </div>

        <!-- * Footer : bottom bar -->
        <div class="container footer-bottom">
            <div class="row g-0 align-items-center">
                <div class="col-12 col-lg-6">
                    Copyright &copy; <span id="gfyear"></span> Media Clock. All Rights
                    are reserved.
                </div>
                <div class="col-12 col-lg-3">ABN 65 617 380 006</div>
                <div class="col-12 col-lg-3">
                    <a href="https://mediaclock.com.au/privacy-policy/" target="_blank" rel="noopener">Privacy
                        Policy</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- * Scripts : main.js = header/menu, package.js = this page -->
    <script src="assets/js/main.js" defer></script>
    <?php if (!empty($page_js)): ?>
    <script src="assets/js/<?= htmlspecialchars($page_js, ENT_QUOTES, 'UTF-8') ?>.js" defer></script>
    <?php endif; ?>
    </body>

    </html>