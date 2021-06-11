<div class="entry-meta">
    <h2 class="entry-title"> 
        <?php  echo get_the_title(); ?> 
    </h2>
    <div class="category-name"> 
        Tipo de proyecto: <?php echo the_category(', '); // Show Category Name?>         
    </div>
    
    <div class="project-status"> 
    <?php
        // Show Project Status
        echo "Estado del proyecto: " . ucfirst(get_post_status($post));
    ?> 
</div>