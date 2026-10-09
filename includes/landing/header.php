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
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" />
    <!-- main.css supplies the brand tokens, fonts and reset. Every rule this
         page adds is namespaced .lp-, so nothing here can reach the main site
         and nothing there can reach this page. -->
    <link rel="stylesheet" href="<?= $e(asset_url('assets/css/main.css')) ?>" />
    <link rel="stylesheet" href="<?= $e(asset_url('assets/css/landing.css')) ?>" />

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

<body class="lp-body" data-site-base="<?= $e(page_url('')) ?>">
     <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTQJKQL7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- * Landing header -->
    <header class="lp-header">
        <div class="lp-container lp-header-inner">
            <a class="lp-logo" href="#" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" aria-label="Scroll to top">
                <img src="<?= $e(img_src('logo-dark.png')) ?>" alt="Media Clock" width="261" height="36" />
            </a>
            <div class="lp-header-actions">
                <a class="lp-header-phone lp-header-phone--landline" href="<?= $e(mc_tel()) ?>" aria-label="Call <?= $e(mc_tel_text()) ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8.1 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.8 2z"></path>
                    </svg>
                    <span><?= $e(mc_tel_text()) ?></span>
                </a>
            </div>
        </div>
    </header>
