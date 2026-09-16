<?php
/* ============================================================
   * Blog post — one article
   Reached as /blog/<slug>/ (.htaccess on Apache, router.php locally),
   which lands here with ?slug=<slug>. An unknown slug returns 404 and
   shows the "article not found" panel below.
   ============================================================ */
$posts   = require __DIR__ . '/data/blog/posts.php';
$reqSlug = (string) ($_GET['slug'] ?? '');
$post    = null;
$postIx  = null;
foreach ($posts as $i => $p) {
    if ($p['slug'] === $reqSlug) {
        $post   = $p;
        $postIx = $i;
        break;
    }
}
$bodyFile = $post ? __DIR__ . '/data/blog/body/' . $post['slug'] . '.php' : '';
$body     = ($bodyFile && is_file($bodyFile)) ? require $bodyFile : [];

if (!$post) {
    http_response_code(404);
    $page_title       = 'Article not found – Media Clock';
    $page_description = '';
} else {
    $page_title       = $post['title'] . ' – Media Clock';
    $page_description = $post['excerpt'];
}
$page_css = ['service', 'blog'];
$page_js  = 'blog';
include 'includes/layout/header.php';

$blogDate = fn(string $d): string => date('j M Y', strtotime($d));

// * On this page — the article's h2s, listed when there are enough to be useful
$toc = [];
foreach ($body as $bIx => $blk) {
    if ($blk[0] === 'h2') {
        $toc[] = ['id' => 'section-' . (count($toc) + 1), 'text' => $blk[1], 'at' => $bIx];
    }
}
$tocIds = [];
foreach ($toc as $t) {
    $tocIds[$t['at']] = $t['id'];
}
$showToc = count($toc) >= 3;

// * Related — same category first, newest first, up to three
$related = [];
if ($post) {
    foreach ($posts as $i => $p) {
        if ($i !== $postIx && $p['cat'] === $post['cat']) {
            $related[] = $p;
        }
    }
    foreach ($posts as $i => $p) {
        if ($i !== $postIx && $p['cat'] !== $post['cat'] && count($related) < 3) {
            $related[] = $p;
        }
    }
    $related = array_slice($related, 0, 3);
}
?>
<?php if (!$post): ?>
<!-- * Article not found -->
<section class="section blog-missing band-dark" aria-labelledby="missing-title">
    <div class="container">
        <h1 id="missing-title">We can’t find that article</h1>
        <p>The link may be out of date, or the article may have been renamed.</p>
        <a class="projects-cta-btn" href="<?= $e(page_url('blog')) ?>">Back to all articles <span aria-hidden="true">&rarr;</span></a>
    </div>
</section>
<?php else: ?>
<!-- * Article header — breadcrumb, category, title, meta -->
<section class="post-header band-dark" aria-labelledby="post-title">
    <div class="container">
        <nav class="post-crumbs" aria-label="Breadcrumb">
            <ol class="list-unstyled">
                <li><a href="<?= $e(page_url('')) ?>">Home</a></li>
                <li><a href="<?= $e(page_url('blog')) ?>">Blogs</a></li>
                <li aria-current="page"><?= $e($post['title']) ?></li>
            </ol>
        </nav>
        <span class="blog-chip"><?= $e($post['cat']) ?></span>
        <h1 id="post-title"><?= $e($post['title']) ?></h1>
        <p class="blog-meta">
            <time datetime="<?= $e($post['date']) ?>"><?= $e($blogDate($post['date'])) ?></time>
            <span aria-hidden="true">•</span>
            <span><?= (int) $post['minutes'] ?> min read</span>
        </p>
    </div>
</section>

<!-- * Article body — optional contents rail beside the copy -->
<section class="post-body band-light">
    <div class="container">
        <?php if ($post['img']): ?>
        <img class="post-cover" src="<?= $e(img_src($post['img'])) ?>" alt="" width="1200" height="800" decoding="async" />
        <?php endif; ?>

        <div class="post-layout<?= $showToc ? '' : ' post-layout--wide' ?>">
            <?php if ($showToc): ?>
            <!-- * Article : on this page (blog.js folds it shut on phones) -->
            <details class="post-toc" open>
                <summary>On this page</summary>
                <ol class="list-unstyled">
                    <?php foreach ($toc as $t): ?>
                    <li><a href="#<?= $e($t['id']) ?>"><?= $e($t['text']) ?></a></li>
                    <?php endforeach; ?>
                </ol>
            </details>
            <?php endif; ?>

            <article class="post-article">
                <?php
                $openList = false;
                foreach ($body as $bIx => $blk):
                    [$tag, $text] = [$blk[0], $blk[1]];
                    $lead = $blk[2] ?? '';
                    // lists are stored as single items; group the runs back together
                    if ($tag === 'li' && !$openList) {
                        echo "<ul class=\"post-list\">\n";
                        $openList = true;
                    } elseif ($tag !== 'li' && $openList) {
                        echo "</ul>\n";
                        $openList = false;
                    }
                    if ($tag === 'li') {
                        if ($lead && str_starts_with($text, $lead)) {
                            $restText = ltrim(substr($text, strlen($lead)), " –—-:");
                            echo '<li><strong>' . $e($lead) . '</strong>' . ($restText ? ' — ' . $e($restText) : '') . "</li>\n";
                        } else {
                            echo '<li>' . $e($text) . "</li>\n";
                        }
                        continue;
                    }
                    if ($tag === 'h2' || $tag === 'h3') {
                        $id = $tocIds[$bIx] ?? '';
                        echo '<' . $tag . ($id ? ' id="' . $e($id) . '"' : '') . '>' . $e($text) . '</' . $tag . ">\n";
                        continue;
                    }
                    echo '<p>' . $e($text) . "</p>\n";
                endforeach;
                if ($openList) {
                    echo "</ul>\n";
                }
                ?>

                <!-- * Article : in-line call to action -->
                <div class="post-inline-cta">
                    <p>Planning something like this? We scope, design and build it with you.</p>
                    <a class="projects-cta-btn" href="<?= $e(page_url('contact-us')) ?>">Talk to us <span aria-hidden="true">&rarr;</span></a>
                </div>
            </article>
        </div>
    </div>
</section>

<?php if ($related): ?>
<!-- * Keep reading -->
<section class="section post-related band-dark" aria-labelledby="related-title">
    <div class="container">
        <div class="head">
            <h2 id="related-title">Keep reading</h2>
        </div>
        <ul class="blog-grid list-unstyled">
            <?php foreach ($related as $rp): ?>
            <li class="blog-grid-item">
                <article class="blog-card h-100">
                    <a class="blog-card-media" href="<?= $e(page_url('blog/' . $rp['slug'])) ?>" tabindex="-1" aria-hidden="true">
                        <?php if ($rp['img']): ?>
                        <img src="<?= $e(img_src($rp['img'])) ?>" alt="" width="1200" height="800" loading="lazy" decoding="async" />
                        <?php else: ?>
                        <span class="post-media-fallback"><?= $e($rp['cat']) ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="blog-card-body">
                        <span class="blog-chip"><?= $e($rp['cat']) ?></span>
                        <h3 class="blog-card-title"><a href="<?= $e(page_url('blog/' . $rp['slug'])) ?>"><?= $e($rp['title']) ?></a></h3>
                        <p class="blog-meta">
                            <time datetime="<?= $e($rp['date']) ?>"><?= $e($blogDate($rp['date'])) ?></time>
                            <span aria-hidden="true">•</span>
                            <span><?= (int) $rp['minutes'] ?> min read</span>
                        </p>
                    </div>
                </article>
            </li>
            <?php endforeach; ?>
        </ul>
        <a class="post-back" href="<?= $e(page_url('blog')) ?>">All articles <span aria-hidden="true">&rarr;</span></a>
    </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
unset($posts, $post, $postIx, $body, $bodyFile, $reqSlug, $toc, $tocIds, $showToc, $related, $rp, $t, $blk, $bIx, $blogDate, $openList);

// * Contact panel (hidden until a .contactBtn opens it; the header buttons need it)
include 'includes/components/contact.php';

include 'includes/layout/footer.php';
