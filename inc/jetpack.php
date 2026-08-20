<?php
/**
 * Jetpack Compatibility File
 *
 * @package Moka
 * @since Moka 1.1
 */


/**
 *Add theme support for Infinite Scroll.
 */
function moka_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' 		=> 'primary',
		'footer_widgets' 	=> array( 'footer-sidebar-1', 'footer-sidebar-2', 'footer-sidebar-3', ),
		'footer'    		=> 'main-wrap',
	) );
}
add_action( 'after_setup_theme', 'moka_infinite_scroll_setup' );



/**
 * Add support for the Featured Content Plugin
 */
function moka_featured_content_init() {
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'moka_get_featured_posts',
		'description'             => __( 'The featured content slider displays at the top of the Front Page Slider template.', 'moka' ),
		'max_posts'               => 10,
	) );
}
add_action( 'after_setup_theme', 'moka_featured_content_init' );


/**
 * Featured Posts
 */
function moka_has_multiple_featured_posts() {
	$featured_posts = apply_filters( 'moka_get_featured_posts', array() );
	return ( is_array( $featured_posts ) && 1 < count( $featured_posts ) );
}

function moka_get_featured_posts() {
	return apply_filters( 'moka_get_featured_posts', false );
}