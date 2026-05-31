<?php
// Path: template-parts/post-card.php

$thumbnail_url  = get_the_post_thumbnail_url();
$title          = get_the_title();
$excerpt        = get_the_excerpt();
$link           = get_the_permalink();
$lang           = get_locale();
$is_rtl         = is_rtl();

// if has not thumbnail
if (! has_post_thumbnail()) {
    $thumbnail_url = THEME_URL . '/assets/images/logo-thumbnail.webp';
}

?>

<div class="post-card">
    <div class="thumbnail">
        <a href="<?= $link ?>">
            <img src="<?= $thumbnail_url ?>" alt="<?= $title ?>" onerror="this.onerror=null;this.src='<?php echo THEME_URL . '/assets/images/logo-thumbnail.webp'; ?>'">
            <figcaption><?= $title ?></figcaption>
        </a>
    </div>
    <div class="title">
        <a href="<?= $link ?>"><?= $title ?></a>
    </div>
    <div class="excerpt">
        <?= $excerpt ?>
    </div>
    <div class="read-more">
        <a href="<?= $link ?>">
            <?php if ($is_rtl): ?>
                قراءة المزيد <i class="fa-solid fa-arrow-left"></i>
            <?php else: ?>
                Read More <i class="fa-solid fa-arrow-right"></i>
            <?php endif; ?>
        </a>
    </div>
</div>