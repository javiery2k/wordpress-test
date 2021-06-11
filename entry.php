<article id="post-<?php the_ID(); ?>" <?php post_class((is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? "column is-full-mobile is-one-quarter" : "column")); ?>>
<header>
<?php if (! is_search()) {
    get_template_part('entry', 'meta');
} ?>
</header>
<?php get_template_part('entry', (is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content')); ?>
<?php if (is_singular()) {
    get_template_part('entry-footer');
} ?>
</article>