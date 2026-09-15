<?php
/* ============================================================
   * img_src() — image path helper
   Every image lives under assets/images/; pass the path below it.

     img_src('clients/01.webp')   // assets/images/clients/01.webp
   ============================================================ */
if (!function_exists('img_src')) {
    function img_src(string $path): string
    {
        return 'assets/images/' . ltrim($path, '/');
    }
}
