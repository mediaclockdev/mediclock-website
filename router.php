<?php
/* ============================================================
   * router.php — local development only
   PHP's built-in server ignores .htaccess, and it falls back to
   index.php for any URL that is not a real file — which makes every
   pretty URL look like the home page. This script does locally what
   .htaccess does on Apache: /about-us/ -> about-us.php

     php -S localhost:8000 router.php

   Never used on the live server; Apache reads .htaccess instead.
   ============================================================ */

// Only ever runs under `php -S`; a direct hit on a real server 404s.
if (PHP_SAPI !== 'cli-server') {
    http_response_code(404);
    exit;
}

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$file = __DIR__ . $path;

// Shared code is included by pages, never opened directly (matches .htaccess).
// Checked before the is_file() pass below, or the real files would be served.
if (preg_match('#^/(includes|data)/#', $path) || str_contains($path, '/.')) {
    http_response_code(403);
    exit('403 Forbidden');
}

// Real file (CSS, JS, images) — let the built-in server serve it as-is
if ($path !== '/' && is_file($file)) {
    return false;
}

// "/" -> index.php
if ($path === '/') {
    require __DIR__ . '/index.php';
    return true;
}

// "/blog/<slug>/" -> blog-post.php?slug=<slug>  (matches the .htaccess rule)
if (preg_match('#^/blog/([a-z0-9-]+)/?$#i', $path, $mBlog)) {
    $_GET['slug'] = $mBlog[1];
    $_SERVER['SCRIPT_NAME'] = '/blog-post.php';
    require __DIR__ . '/blog-post.php';
    return true;
}

// "/about-us/" or "/about-us" -> about-us.php
$slug = trim($path, '/');
if (preg_match('#^[a-z0-9-]+$#i', $slug) && is_file(__DIR__ . "/$slug.php")) {
    $_SERVER['SCRIPT_NAME'] = "/$slug.php";   // keeps current_slug() accurate
    require __DIR__ . "/$slug.php";
    return true;
}

http_response_code(404);
echo '<h1>404 Not Found</h1><p>No page for <code>' .
    htmlspecialchars($path, ENT_QUOTES, 'UTF-8') . '</code></p>';
