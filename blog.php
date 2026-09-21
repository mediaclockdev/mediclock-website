<?php
$page_title       = 'Blogs – Media Clock';
$page_description = 'Guides on mobile apps, websites and digital growth for Australian businesses, from the Media Clock team.';
$page_css         = ['service', 'blog'];
$page_js          = 'blog';
include 'includes/layout/header.php';

$posts = require __DIR__ . '/data/blog/posts.php';

// * Categories for the filter row, in the order they first appear
$blogCats = [];
foreach ($posts as $bp) {
    $blogCats[$bp['cat']] = true;
}
$blogCats = array_keys($blogCats);

$blogDate = fn(string $d): string => date('j M Y', strtotime($d));
$blogSlug = fn(string $s): string => 'cat-' . strtolower(preg_replace('/[^a-z0-9]+/i', '-', $s));
?>
<!-- * Blog hero — dark band, no photo: the cards below carry the colour -->
<section class="blog-hero band-dark" aria-labelledby="blog-hero-title">
    <div class="container">
        <p class="eyebrow">Media Clock journal</p>
        <h1 id="blog-hero-title">Ideas worth building on</h1>
        <p class="blog-hero-lead">Practical guides on mobile apps, websites and digital growth — written by the team that builds them for Australian businesses.</p>
    </div>
</section>

<!-- * All articles — category filter + card grid -->
<section class="section blog-list band-light" id="articles" aria-labelledby="blog-list-title">
    <div class="container">
        <div class="head blog-list-head">
            <h2 id="blog-list-title">All articles</h2>
        </div>

        <!-- * Blog list : category filter (main.js-free, assets/js/blog.js) -->
        <div class="blog-filters" role="group" aria-label="Filter articles by category">
            <button type="button" class="blog-filter is-active" data-filter="all" aria-pressed="true">All</button>
            <?php foreach ($blogCats as $bc): ?>
            <button type="button" class="blog-filter" data-filter="<?= $e($blogSlug($bc)) ?>" aria-pressed="false"><?= $e($bc) ?></button>
            <?php endforeach; ?>
        </div>

        <ul class="blog-grid list-unstyled" id="blogGrid">
            <?php foreach ($posts as $bp): ?>
            <li class="blog-grid-item" data-cat="<?= $e($blogSlug($bp['cat'])) ?>">
                <article class="blog-card h-100">
                    <a class="blog-card-media" href="<?= $e(page_url('blog/' . $bp['slug'])) ?>" tabindex="-1" aria-hidden="true">
                        <?php if ($bp['img']): ?>
                        <img src="<?= $e(img_src($bp['img'])) ?>" alt="" width="1200" height="800" loading="lazy" decoding="async" />
                        <?php else: ?>
                        <span class="post-media-fallback"><?= $e($bp['cat']) ?></span>
                        <?php endif; ?>
                    </a>
                    <div class="blog-card-body">
                        <span class="blog-chip"><?= $e($bp['cat']) ?></span>
                        <h3 class="blog-card-title">
                            <a href="<?= $e(page_url('blog/' . $bp['slug'])) ?>"><?= $e($bp['title']) ?></a>
                        </h3>
                        <p class="blog-card-excerpt"><?= $e($bp['excerpt']) ?></p>
                        <div class="blog-card-foot">
                            <p class="blog-meta">
                                <time datetime="<?= $e($bp['date']) ?>"><?= $e($blogDate($bp['date'])) ?></time>
                                <span aria-hidden="true">•</span>
                                <span><?= (int) $bp['minutes'] ?> min read</span>
                            </p>
                            <a class="blog-read-more" href="<?= $e(page_url('blog/' . $bp['slug'])) ?>">Read more<span class="visually-hidden">: <?= $e($bp['title']) ?></span> <span aria-hidden="true">&rarr;</span></a>
                        </div>
                    </div>
                </article>
            </li>
            <?php endforeach; ?>
        </ul>
        <p class="blog-empty" id="blogEmpty" role="status" hidden>No articles in this category yet.</p>
    </div>
</section>

<!-- * Closing call to action -->
<section class="section blog-cta" aria-labelledby="blog-cta-title">
    <div class="container">
        <div class="blog-cta-card">
            <h2 id="blog-cta-title">Got a project in mind?</h2>
            <p>Tell us what you are building and we will map out the technology, timeline and costs with you.</p>
            <a class="projects-cta-btn" href="<?= $e(page_url('contact-us')) ?>">Book a free consultation <span aria-hidden="true">&rarr;</span></a>
        </div>
    </div>
</section>
<?php
unset($posts, $blogCats, $bp, $bc, $blogDate, $blogSlug);

// * Contact panel (hidden until a .contactBtn opens it; the header buttons need it)
include 'includes/components/contact.php';

include 'includes/layout/footer.php';
