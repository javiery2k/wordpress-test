<?php
/**
 * Check the access
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Loading the styles
 */
function my_theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('bulma-style', get_stylesheet_directory_uri() . '/bulma.min.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

/**
 * Disable Editor Gutenberg
 */
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
    return false;
}

/**
 * Register the 'project' Post Type and the project's specific statuses.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function register_custom_post_type_and_status()
{
    register_post_type('projects', array(
        'labels' => array(
            'name'                  => _x('Projects', 'plugin-custom-post-type'),
            'singular_name'         => _x('Project', 'plugin-custom-post-type'),
            'menu_name'             => _x('Projects', 'plugin-custom-post-type'),
            'name_admin_bar'        => _x('Project', 'plugin-custom-post-type'),
            'add_new'               => _x('Add new', 'plugin-custom-post-type'),
            'add_new_item'          => __('Add a new Project', 'plugin-custom-post-type'),
            'new_item'              => __('New Project', 'plugin-custom-post-type'),
            'edit_item'             => __('Edit Project', 'plugin-custom-post-type'),
            'view_item'             => __('View Project', 'plugin-custom-post-type'),
            'all_items'             => __('All Projects', 'plugin-custom-post-type'),
            'search_items'          => __('Search Projects', 'plugin-custom-post-type'),
            'parent_item_colon'     => __('Parent Project:', 'plugin-custom-post-type'),
            'not_found'             => __('No projects found', 'plugin-custom-post-type'),
            'not_found_in_trash'    => __('No projects found in trash', 'plugin-custom-post-type'),
            'insert_into_item'      => __('Insert into project', 'plugin-custom-post-type'),
            'uploaded_to_this_item' => __('Uploaded to this project', 'plugin-custom-post-type'),
            'filter_items_list'     => __('Filter projects list', 'plugin-custom-post-type'),
            'items_list_navigation' => __('Projects list navigation', 'plugin-custom-post-type'),
            'items_list'            => __('Projects list', 'plugin-custom-post-type'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'excerpt', 'custom-fields', 'editor' ),
        'delete_with_user'   => true,
        'can_export'         => true,
        'show_in_rest'       => true,
        'taxonomies'  => array( 'category', 'post_tag',  ) //Enable Tags, Categories
    ));

    /**
     * Status
     */
    register_post_status('actived', array(
        'label'                     => _x('Actived', 'plugin-custom-post-type'),
        'public'                    => true,
        'label_count'               => _n_noop('Actived <span class="count">(%s)</span>', 'Actived <span class="count">(%s)</span>', 'plugin-custom-post-type'),
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'show_in_metabox_dropdown'  => true,
        'show_in_inline_dropdown'   => true,
        'exclude_from_search'       => false,
    ));
    register_post_status('completed', array(
        'label'                     => _x('Completed', 'plugin-custom-post-type'),
        'public'                    => true,
        'label_count'               => _n_noop('Completed <span class="count">(%s)</span>', 'Completed <span class="count">(%s)</span>', 'plugin-custom-post-type'),
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'show_in_metabox_dropdown'  => true,
        'show_in_inline_dropdown'   => true,
        'exclude_from_search'       => false,
    ));
    register_post_status('discarded', array(
        'label'                     => _x('Discarded', 'plugin-custom-post-type'),
        'public'                    => true,
        'label_count'               => _n_noop('Discarded <span class="count">(%s)</span>', 'Discarded <span class="count">(%s)</span>', 'plugin-custom-post-type'),
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'show_in_metabox_dropdown'  => true,
        'show_in_inline_dropdown'   => true,
        'exclude_from_search'       => false,
    ));
}
add_action('init', 'register_custom_post_type_and_status');

function my_custom_status_add_in_quick_edit()
{
    echo "<script>
	jQuery(document).ready( function() {
		jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"actived\">Actived</option>' ); 
        jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"completed\">Completed</option>' ); 
        jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"discarded\">Discarded</option>' );      
	}); 
	</script>";
}
add_action('admin_footer-edit.php', 'my_custom_status_add_in_quick_edit');
function my_custom_status_add_in_post_page()
{
    echo "<script>
	jQuery(document).ready( function() {        
		jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"actived\">Actived</option>' ); 
        jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"completed\">Completed</option>' ); 
        jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"discarded\">Discarded</option>' );   
	});
	</script>";
}
add_action('admin_footer-post.php', 'my_custom_status_add_in_post_page');
add_action('admin_footer-post-new.php', 'my_custom_status_add_in_post_page');
