<?php get_header(); ?>
<?php get_search_form(); ?>
<main id="content" role="main" class="columns">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part('entry'); ?>
<?php endwhile; endif; ?>
<?php get_template_part('nav', 'below'); ?>
</main>

<?php get_footer(); ?>