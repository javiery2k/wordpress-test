<?php get_header(); ?>

<?php get_search_form(); ?>

<?php $categories = get_categories(); ?>
<ul class="cat-list">
  <li><a class="cat-list_item active" href="#!" data-slug="">All projects</a></li>

  <?php foreach($categories as $category) : ?>
    <li>
      <a class="cat-list_item" href="#!" data-slug="<?= $category->slug; ?>">
        <?= $category->name; ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>


<main id="content" role="main" class="columns is-multiline">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php get_template_part('entry'); ?>
    <?php endwhile; endif; ?>    
</main>

<div class="is-clearfix"><?php get_template_part('nav', 'below'); ?></div>

<?php get_footer(); ?>

<div id="modal-post" class="modal">
  <div class="modal-background"></div>
  <div class="modal-content">
    <div class="box">
      1
    </div>
  </div>
  <button id="modal-post-close" class="modal-close is-large" aria-label="close"></button>
</div>