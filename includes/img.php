<?php
/* ============================================================
   * img_src() — image path helper
   Returns the local path (assets/images/…) when the file is there.
   Until it is, falls back to the same image on the live WordPress
   site, listed in data/live-images.php — so pages render
   properly while images are still being copied across.

   Once every file in that list exists under assets/images/, delete
   data/live-images.php. Nothing else changes: this helper
   then simply returns local paths.

     img_src('clients/01.webp')   // assets/images/clients/01.webp
   ============================================================ */
if (!function_exists('img_src')) {
    function img_src(string $path): string
    {
        static $live = null;
        $path  = ltrim($path, '/');
        $local = 'assets/images/' . $path;
        if (is_file(dirname(__DIR__) . '/' . $local)) {
            return $local;
        }
        if ($live === null) {
            $map  = dirname(__DIR__) . '/data/live-images.php';
            $live = is_file($map) ? require $map : [];
        }
        return $live[$path] ?? $local;
    }
}
