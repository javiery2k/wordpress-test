<div class="entry-content" itemprop="mainEntityOfPage">
<?php if (has_post_thumbnail()) : ?>
<?php the_post_thumbnail('full', array( 'itemprop' => 'image' )); ?>
<?php endif; ?>
<meta itemprop="description" content="<?php echo get_the_excerpt(); ?>" />
<?php the_content(); ?>
</div>