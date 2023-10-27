<?php
/**
 * The template for displaying all page content
 *
 * @link https://www.cybroservices.com
 *
 * @package Cybro Services Theme
 * @subpackage Cybro Services Theme v2023
 * @since 2023
 */

get_header();

// Get the current page's ID
$current_page_id = get_the_ID();

// Retrieve the menu items for the specified menu (replace 'menu-name' with your actual menu name or location)
$menu_items = wp_get_nav_menu_items('Top');

// Find the current menu item
$current_menu_item = array_reduce($menu_items, function ($carry, $item) use ($current_page_id) {
    return ($item->object_id == $current_page_id) ? $item : $carry;
});

// Initialize an array to collect classes
$current_menu_ancestor_classes = array();

// Traverse the menu hierarchy to collect ancestor classes
while ($current_menu_item) {
    $current_menu_ancestor_classes = array_merge($current_menu_ancestor_classes, $current_menu_item->classes);
    $current_menu_item = array_reduce($menu_items, function ($carry, $item) use ($current_menu_item) {
        return ($item->ID == $current_menu_item->menu_item_parent) ? $item : $carry;
    });
}
foreach ($current_menu_ancestor_classes as $class) : endforeach;

?>

<div id="page-content" class="container page-content">

<?php
/* Start the Loop */
if (is_home() || is_front_page()) {
    the_content();
} else {
?>
<!-- Banner code for subpages -->
<div id="banner-<?php echo $class; ?>" class="banner banner-<?php echo $class; ?>"></div>
<?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
}
?>

</div>

<?php get_footer(); ?>
