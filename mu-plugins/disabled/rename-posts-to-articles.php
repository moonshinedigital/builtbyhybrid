<?
/**
 * Plugin Name: Rename Posts to Articles
 * Description: Renames all labels and links related to 'Posts' to 'Articles' in admin.
 *
 * @package null
 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly.

/**
 * Set new post menu labels.
 */
function change_post_menu_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = 'Articles';
    $submenu['edit.php'][5][0] = 'Articles';
    $submenu['edit.php'][10][0] = 'Add Articles';
    $submenu['edit.php'][15][0] = 'Topic'; // Change name for categories
    echo '';
}

/**
 * Set new post object labels.
 */
function change_post_object_label()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Articles';
    $labels->singular_name = 'Article';
    $labels->name_admin_bar = 'Article';
    $labels->add_new = 'Add Article';
    $labels->add_new_item = 'Add Article';
    $labels->edit_item = 'Edit Article';
    $labels->new_item = 'Article';
    $labels->view_item = 'View Article';
    $labels->search_items = 'Search Articles';
    $labels->not_found = 'No articles found';
    $labels->not_found_in_trash = 'No articles found in Trash';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');
