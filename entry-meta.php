<div class="entry-meta">
<div class="category-name"> 
<?php
    // Show Category Name
    global $post;
    $categories = get_the_category($post->ID);
    echo "Tipo de proyecto: ". ucfirst($categories[0]->name);
?> 
</div>
<div class="project-status"> 
<?php
    // Show Project Status
    echo "Estado del proyecto: " . ucfirst(get_post_status($post));
?> 
</div>