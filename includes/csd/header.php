<?php
/* ============================================================
   * Custom Software Development ad pages — header
   Deliberately not includes/layout/header.php. These pages are paid traffic:
   the visitor arrives from an ad with one job to do, so the header carries the
   logo, the phone number and a single call to action and nothing else. No nav,
   no services menu, no search — every extra link is a way out of the funnel.

   Expects $csd (the merged page content) and $e (the escaper) from page.php.
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
    <title><?= $e($csd['title']) ?></title>
    <meta name="description" content="<?= $e($csd['description']) ?>" />
    <!-- * Ad pages are paid traffic only. Keeping them out of the index stops
         them competing with the service pages for the same terms and keeps
         them from being counted as organic landing pages in analytics. -->
    <meta name="robots" content="noindex, nofollow" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- main.css supplies the brand tokens and the shared slider layout the
         Technologies strip is built on. Every rule csd.css adds is namespaced
         .csd-, so nothing here can reach the main site and nothing there can
         reach this page. -->
    <link rel="stylesheet" href="<?= $e(asset_url('assets/css/main.css')) ?>" />
    <link rel="stylesheet" href="<?= $e(asset_url('assets/css/csd.css')) ?>" />
</head>

<body class="csd-body" data-site-base="<?= $e(page_url('')) ?>">
    <!-- reading progress bar -->
    <div class="csd-progress" id="csdProgress"></div>

    <!-- * Landing header -->
    <header class="csd-header" id="csdHeader">
        <div class="csd-wrap csd-nav">
            <a class="csd-logo" href="#" data-csd-top aria-label="Scroll to top">
                <img src="<?= $e(img_src('logo-light.webp')) ?>" alt="Media Clock" width="239" height="48" />
            </a>
            <div class="csd-nav-right">
                <a href="<?= $e(mc_tel()) ?>" class="csd-nav-phone">
                    <span class="csd-ring" aria-hidden="true"></span><?= $e(mc_tel_text()) ?>
                </a>
                <a href="#csd-enquire" class="csd-btn" data-csd-scroll-to="#csd-enquire">Get a Free Consult</a>
            </div>
        </div>
    </header>
