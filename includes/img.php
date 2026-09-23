<?php
/* ============================================================
   * asset_url() / img_src() — asset path helpers
   Paths are absolute from the site root, so they still resolve when a
   page is served from a nested URL such as /website-development/.
   The base is the folder of the running script, so a copy of the site
   in a sub-folder (e.g. /mediaclock/) works too. Define SITE_BASE
   before including this file to force a base.

     asset_url('assets/css/main.css')  // /assets/css/main.css
     img_src('clients/01.webp')        // /assets/images/clients/01.webp
   ============================================================ */
if (!function_exists('asset_url')) {
    function asset_url(string $path): string
    {
        static $base = null;
        if ($base === null) {
            if (defined('SITE_BASE')) {
                $dir = SITE_BASE;
            } else {
                // * CLI (local dev server) has no web path; the site root is '/'
                $script = PHP_SAPI === 'cli' ? '' : (string) ($_SERVER['SCRIPT_NAME'] ?? '');
                $dir = str_replace('\\', '/', dirname($script));
            }
            $base = rtrim($dir === '.' ? '' : $dir, '/') . '/';
        }
        $rel = ltrim($path, '/');
        $url = $base . $rel;
        /* * Cache-busting, CSS and JS only.
           The dev server sends no Last-Modified, ETag or Cache-Control, so a
           browser reuses a stale main.css for the whole session and a fix that
           is already in the file still looks broken on screen. ?v=<mtime>
           changes the URL whenever the file changes, so the browser refetches
           it — and on Apache it does the same for visitors after a deploy.
           Images are left alone: they rarely change, and a stat() per <img>
           on a page with dozens of them is not worth it. */
        if (preg_match('/\.(css|js)$/i', $rel)) {
            $mtime = @filemtime(dirname(__DIR__) . '/' . $rel);
            if ($mtime) {
                $url .= '?v=' . $mtime;
            }
        }
        return $url;
    }
}
if (!function_exists('img_src')) {
    function img_src(string $path): string
    {
        return asset_url('assets/images/' . ltrim($path, '/'));
    }
}
/* * page_url() — internal page links
   Same base as asset_url(), with the trailing slash the live URLs use.
   .htaccess maps /about-us/ back to about-us.php, so visitors never see
   the .php. Never hard-code https://mediaclock.com.au/ for our own pages:
   a relative link keeps staging on staging.

     page_url('about-us')  // /about-us/
     page_url('')          // /
   ============================================================ */
if (!function_exists('page_url')) {
    function page_url(string $slug): string
    {
        $slug = trim($slug, '/');
        return $slug === '' ? asset_url('') : asset_url($slug . '/');
    }
}
/* * current_slug() — the running page's slug, e.g. 'about-us' for about-us.php */
if (!function_exists('current_slug')) {
    function current_slug(): string
    {
        return pathinfo((string) ($_SERVER['SCRIPT_NAME'] ?? ''), PATHINFO_FILENAME);
    }
}

/* ============================================================
   * Contact numbers — read from data/shared/contact.php.
   These live here because this is the one file every page and every component
   already requires, so a number is available wherever it is needed without
   each caller loading the data file itself.

     mc_contact()     the whole array
     mc_tel()         'tel:…' for the number call buttons dial
     mc_tel_text()    that number, formatted for display
   ============================================================ */
if (!function_exists('mc_contact')) {
    function mc_contact(): array
    {
        static $c = null;
        if ($c === null) {
            $c = require dirname(__DIR__) . '/data/shared/contact.php';
        }
        return $c;
    }
}
if (!function_exists('mc_tel')) {
    function mc_tel(string $which = 'dialer'): string
    {
        return 'tel:' . mc_contact()[$which]['tel'];
    }
}
if (!function_exists('mc_tel_text')) {
    function mc_tel_text(string $which = 'dialer'): string
    {
        return mc_contact()[$which]['text'];
    }
}
