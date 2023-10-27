<?php

/**
 * Functions and definitions
 *
 * @link https://www.cybroservices.com
 *
 * @package Cybro Services Theme v2023
 * @subpackage Cybro_Services_Theme_v2023
 * @since 2023
 */

// This theme requires WordPress 5.3 or later.
if (version_compare($GLOBALS['wp_version'], '5.3', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
}

function enqueue_bootstrap()
{
	
	wp_enqueue_style("bootstrapCss", get_template_directory_uri() . "/vendor/bootstrap-5/css/bootstrap.min.css");
	wp_enqueue_script("bootstrapJs", get_template_directory_uri() . "/vendor/bootstrap-5/js/bootstrap.min.js");
	wp_enqueue_style("fontawesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
}

add_action("wp_enqueue_scripts", "enqueue_bootstrap");

// enqueue custom.js
function enqueue_custom_js()
{
	wp_enqueue_script("custom-js", get_template_directory_uri() . "/js/custom.js", array("jquery"), "1.0", true);
}
//add_action("wp_enqueue_scripts", "enqueue_custom_js");

/* enqueue custom.css */
function enqueue_custom_css()
{
	wp_enqueue_style("cs-styles", get_bloginfo("stylesheet_directory") . "/style.css");
}
add_action("wp_enqueue_scripts", "enqueue_custom_css");

/* ----------------------------------------------------- */
/* Registered Menus */
/* ----------------------------------------------------- */
function register_my_menus()
{
	register_nav_menus(array(
		'primary-menu'   => 'Primary Menu',
		'secondary-menu' => 'Secondary Menu',
	));
}
add_action('after_setup_theme', 'register_my_menus');

/* ----------------------------------------------------- */
/* EOF */
/* ----------------------------------------------------- */