<?php
/* reCAPTCHA v2 site key — leave empty and no widget renders */
$recaptcha_site_key = $recaptcha_site_key ?? '';

/* Per-page values — explicitly set in the page's root file before including this header.
     $page_title = '...';
     $page_description = '...';
     $page_canonical = 'https://mediaclock.com.au/slug/';   // optional <link rel="canonical">
     $page_css = 'service';             // -> assets/css/service.css
     $page_css = ['service', 'about'];  // several files, in order
     $page_js  = 'about';               // -> assets/js/about.js (used by footer.php)
*/
$page_title = $page_title ?? 'Media Clock';
$page_description = $page_description ?? '';
$page_canonical = $page_canonical ?? '';
$page_css = array_filter((array) ($page_css ?? []));
$e = fn($s) => htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
require_once dirname(__DIR__) . '/img.php';
$services = require dirname(__DIR__, 2) . '/data/shared/services.php';
/* * Nav : highlight whichever page we are on (about-us.php -> 'about-us') */
$nav_current = current_slug();
/* "Services" lights up only on a service page, never on the homepage */
$nav_service_slugs = [];
foreach ($services as $navItems) foreach ($navItems as [, $navSlug]) $nav_service_slugs[] = $navSlug;
$nav_on_service = in_array($nav_current, $nav_service_slugs, true);
/* "Blogs" covers the index and every article (blog-post.php) */
$nav_on_blog = in_array($nav_current, ['blog', 'blog-post'], true);
unset($navItems, $navSlug);
?>
<!doctype html>
<html lang="en-AU">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!-- * Favicon : same icon set the live site serves -->
    <link rel="icon" type="image/webp" sizes="32x32" href="<?= $e(img_src('favicon-32.webp')) ?>" />
    <link rel="icon" type="image/webp" sizes="192x192" href="<?= $e(img_src('favicon-192.webp')) ?>" />
    <link rel="apple-touch-icon" href="<?= $e(img_src('apple-touch-icon.webp')) ?>" />
    <title><?= $e($page_title) ?></title>
    <?php if ($page_description): ?>
    <meta name="description" content="<?= $e($page_description) ?>" />
    <?php endif; ?>
    <?php if ($page_canonical): ?>
    <link rel="canonical" href="<?= $e($page_canonical) ?>" />
    <?php endif; ?>
    <!-- * Header : brand fonts (Poppins nav, Open Sans dropdown) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet" />
    <!-- * Styles : Bootstrap first, then our own so brand rules win the cascade -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= $e(asset_url('assets/css/main.css')) ?>" />
    <?php foreach ($page_css as $cssFile): ?>
    <link rel="stylesheet" href="<?= $e(asset_url('assets/css/' . $cssFile . '.css')) ?>" />
    <?php endforeach; ?>
</head>

<body>
    <!-- * Header : scroll sentinel (drives the sticky state, see JS) -->
    <div class="header-sentinel" aria-hidden="true"></div>

    <!-- * Header -->
    <header class="site-header" id="top">
        <!-- * Header : desktop bar -->
        <div class="header-inner d-none d-lg-flex align-items-center justify-content-between">
            <a class="header-logo" href="<?= $e(page_url('')) ?>" aria-label="Media Clock home"><img src="<?= $e(img_src('logo-light.webp')) ?>" alt="Media Clock" width="239"
                    height="48" /></a>
            <nav aria-label="Primary">
                <ul class="header-menu nav align-items-center">
                    <li>
                        <a href="<?= $e(page_url('about-us')) ?>"<?= $nav_current === 'about-us' ? ' class="current"' : '' ?>>About us</a>
                    </li>
                    <li class="has-sub">
                        <a href="#top"<?= $nav_on_service ? ' class="current"' : '' ?> aria-haspopup="true">Services</a>
                        <!-- * Header : services mega panel (3 columns, from data/shared/services.php) -->
                        <div class="sub-menu mega-menu">
                            <div class="mega-grid">
                                <?php foreach ($services as $group => $items): ?>
                                <div class="mega-col">
                                    <h3 class="mega-title"><?= $e($group) ?></h3>
                                    <ul>
                                        <?php foreach ($items as [$label, $slug]): ?>
                                        <li><a href="<?= $e(page_url($slug)) ?>"<?= $slug === $nav_current ? ' class="current"' : '' ?>><?= $e($label) ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?= $e(page_url('our-process')) ?>"<?= $nav_current === 'our-process' ? ' class="current"' : '' ?>>Our Process</a></li>
                    <li><a href="<?= $e(page_url('blog')) ?>"<?= $nav_on_blog ? ' class="current"' : '' ?>>Blogs</a></li>
                    <li><a href="<?= $e(page_url('portfolio')) ?>"<?= $nav_current === 'portfolio' ? ' class="current"' : '' ?>>Portfolio</a></li>
                    <li>
                        <a href="<?= $e(page_url('contact-us')) ?>"<?= $nav_current === 'contact-us' ? ' class="current"' : '' ?>>Get In Touch</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- * Header : mobile bar -->
        <div class="header-mobile d-flex d-lg-none align-items-center justify-content-between">
            <a class="header-mobile-logo" href="<?= $e(page_url('')) ?>" aria-label="Media Clock home"><img src="<?= $e(img_src('logo-dark.png')) ?>" alt="Media Clock" width="261"
                    height="36" /></a>
            <div class="header-mobile-actions d-flex align-items-center">
                <a class="header-icon-btn" href="tel:0489906090" aria-label="Call 0489 906 090"><svg viewBox="0 0 24 24"
                        fill="currentColor" aria-hidden="true">
                        <path
                            d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.3 0 .7-.2 1l-2.3 2.2z" />
                    </svg></a>
                <button type="button" class="header-icon-btn" id="navToggle" aria-label="Open menu"
                    aria-expanded="false" aria-controls="fsMenu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"
                        aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- * Header : full-screen mobile menu -->
    <div class="fs-menu" id="fsMenu" aria-hidden="true">
        <button type="button" class="fs-menu-close" id="navClose" aria-label="Close menu">
            &times;
        </button>
        <div class="fs-menu-inner d-flex flex-column">
            <a class="fs-link<?= $nav_current === 'about-us' ? ' current' : '' ?>" href="<?= $e(page_url('about-us')) ?>">About us</a>
        <?php foreach ($services as $group => $items): ?>
        <details class="fs-group">
            <summary class="fs-group-title"><?= $e($group) ?></summary>
            <?php foreach ($items as [$label, $slug]): ?>
            <a class="fs-link<?= $slug === $nav_current ? ' current' : '' ?>" href="<?= $e(page_url($slug)) ?>"><?= $e($label) ?></a>
            <?php endforeach; ?>
        </details>
        <?php endforeach; ?>
            <a class="fs-link<?= $nav_current === 'our-process' ? ' current' : '' ?>" href="<?= $e(page_url('our-process')) ?>">Our Process</a>
            <a class="fs-link<?= $nav_on_blog ? ' current' : '' ?>" href="<?= $e(page_url('blog')) ?>">Blogs</a>
            <a class="fs-link<?= $nav_current === 'portfolio' ? ' current' : '' ?>" href="<?= $e(page_url('portfolio')) ?>">Portfolio</a>
            <a class="fs-link<?= $nav_current === 'career' ? ' current' : '' ?>" href="<?= $e(page_url('career')) ?>">Careers</a>
            <a class="fs-link<?= $nav_current === 'contact-us' ? ' current' : '' ?>" href="<?= $e(page_url('contact-us')) ?>">Get In Touch</a>
            <div class="fs-menu-cta d-flex flex-column align-items-center">
                <a class="fs-btn call" href="tel:0489906090">Call Us</a>
                <button type="button" class="fs-btn quote contactBtn" data-interest="Free consultation">
                    Get a Quote
                </button>
            </div>
            <div class="fs-social d-flex">
                <a href="https://www.facebook.com/mediaclock.com.au/" target="_blank" rel="noopener"
                    aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5H16.7V3.6c-.3 0-1.3-.13-2.45-.13-2.43 0-4.1 1.48-4.1 4.2v2.23H7.44V13h2.71v8h3.35z" />
                    </svg></a>
                <a href="https://www.linkedin.com/company/mediaclock/" target="_blank" rel="noopener"
                    aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M6.94 8.5H3.9V21h3.04V8.5zM5.42 3A1.78 1.78 0 1 0 5.4 6.56 1.78 1.78 0 0 0 5.42 3zM21 14.2c0-3.36-1.8-4.93-4.2-4.93-1.94 0-2.8 1.07-3.28 1.82V8.5h-3.04c.04.86 0 12.5 0 12.5h3.04v-6.98c0-.28.02-.56.1-.75.22-.55.73-1.12 1.58-1.12 1.11 0 1.56.85 1.56 2.09V21H21v-6.8z" />
                    </svg></a>
                <a href="https://www.instagram.com/media_clock_/" target="_blank" rel="noopener"
                    aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="5" />
                        <circle cx="12" cy="12" r="4" />
                        <circle cx="17.2" cy="6.8" r="1.2" fill="currentColor" stroke="none" />
                    </svg></a>
            </div>
        </div>
    </div>

    <!-- * Header : sticky side quote tab -->
    <button type="button" class="sticky-quote contactBtn" data-interest="Free consultation">
        GET A QUOTE
    </button>