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
        return $base . ltrim($path, '/');
    }
}
if (!function_exists('img_src')) {
    function img_src(string $path): string
    {
        return asset_url('assets/images/' . ltrim($path, '/'));
    }
}
