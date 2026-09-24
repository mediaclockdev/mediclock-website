<?php
/* ============================================================
   * Advertisement landing pages — header
   Deliberately not includes/layout/header.php. These pages are paid traffic:
   the visitor arrives from an ad with one job to do, so the header carries the
   logo and a single call button and nothing else. No nav, no services menu,
   no search — every extra link is a way out of the funnel.

   Expects $lp (the merged page content) and $e (the escaper) from page.php.
   ============================================================ */
require_once dirname(__DIR__) . '/img.php';
?>
<!doctype html>
<html lang="en-AU">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="icon" type="image/webp" sizes="32x32" href="<?= $e(img_src('favicon-32.webp')) ?>" />
    <link rel="icon" type="image/webp" sizes="192x192" href="<?= $e(img_src('favicon-192.webp')) ?>" />
    <link rel="apple-touch-icon" href="<?= $e(img_src('apple-touch-icon.webp')) ?>" />
    <title><?= $e($lp['title']) ?></title>
    <meta name="description" content="<?= $e($lp['description']) ?>" />
    <!-- * Ad pages are paid traffic only. Keeping them out of the index stops
         them competing with /mobile-app-development/ for the same terms and
         keeps them from being counted as organic landing pages in analytics. -->
    <meta name="robots" content="noindex, nofollow" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" />
    <!-- main.css supplies the brand tokens, fonts and reset. Every rule this
         page adds is namespaced .lp-, so nothing here can reach the main site
         and nothing there can reach this page. -->
    <link rel="stylesheet" href="<?= $e(asset_url('assets/css/main.css')) ?>" />
    <link rel="stylesheet" href="<?= $e(asset_url('assets/css/landing.css')) ?>" />
</head>

<body class="lp-body" data-site-base="<?= $e(page_url('')) ?>">
    <!-- * Landing header -->
    <header class="lp-header">
        <div class="lp-container lp-header-inner">
            <a class="lp-logo" href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" aria-label="Scroll to top">
                <img src="<?= $e(img_src('logo-light.webp')) ?>" alt="Media Clock" width="239" height="48" />
            </a>
            <a class="lp-btn lp-btn-call" href="<?= $e(mc_tel()) ?>">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.6.1.3 0 .7-.2 1l-2.3 2.2z" />
                </svg>
                <span><?= $e(mc_tel_text()) ?></span>
            </a>
        </div>
    </header>
