<?php
/*
Plugin Name: Product of the Day
Description: A simple plugin to display a random "Product of the Day".
Version: 1.0
Author: Marvin Aoanan
*/

// Register a custom post type for Products
function create_product_post_type() {
    register_post_type('product', array(
        'public' => true,
        'label'  => 'Products',
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('post_tag'),
    ));
}
add_action('init', 'create_product_post_type');

// Create a shortcode to display "Product of the Day"
function product_of_the_day_shortcode() {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 1,
        'orderby' => 'rand',
        'tag' => 'potd', // Use the tag slug here
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output = '<div id="potd" class="product-of-the-day">';
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<h4 class="potd-title">' . get_the_title() . '</h4>';
            $output .= '<div class="potd-description">' . get_the_content() . '</div>';
            $output .= '<div class="potd-image">' . get_the_post_thumbnail() . '</div>';
            // You can add a CTA button here.
        }
        $output .= '</div>';
    } else {
        $output = 'No product of the day found.';
    }

    return $output;
}
add_shortcode('product_of_the_day', 'product_of_the_day_shortcode');

