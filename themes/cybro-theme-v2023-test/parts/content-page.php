<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://www.cybroservices.com
 *
 * @package Cybro Services Theme
 * @subpackage Cybro Services Theme v2023
 * @since 2023
 */

$menu_items = wp_get_nav_menu_items('your-menu-slug');

?>



<div id="banner">
    <img src="images/banner-default.png" alt="Banner Image">
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div>
	
</article>
