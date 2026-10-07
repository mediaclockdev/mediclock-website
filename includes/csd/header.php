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

     <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1699717874013272');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1699717874013272&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
         
         
         
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WTQJKQL7');</script>
        <!-- End Google Tag Manager -->
         
         
        <!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZS0TL9XVCJ"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-ZS0TL9XVCJ'); </script>
         
         
        <meta name="google-site-verification" content="H0HJjZ_uq-KFAKhilx8xKqBZ61Si_mV-RvAJPfy0QaY" />
</head>

<body class="csd-body" data-site-base="<?= $e(page_url('')) ?>">

     <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTQJKQL7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
