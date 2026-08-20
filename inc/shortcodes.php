<?php
/**
 * Available Moka Custom Shortcodes
 *
 *
 * @package Moka
 * @since Moka 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Moka Shortcodes
/*-----------------------------------------------------------------------------------*/
// Enable shortcodes in widget areas
add_filter( 'widget_text', 'do_shortcode' );

// Replace WP autop formatting
if (!function_exists( "moka_remove_wpautop")) {
	function moka_remove_wpautop($content) {
		$content = do_shortcode( shortcode_unautop( $content ) );
		$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content);
		return $content;
	}
}


/*-----------------------------------------------------------------------------------*/
/* Multi Columns Shortcodes
/* Don't forget to add "_last" behind the shortcode if it is the last column.
/*-----------------------------------------------------------------------------------*/

// Two Columns
function moka_shortcode_two_columns_one( $atts, $content = null ) {
   return '<div class="two-columns-one">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one', 'moka_shortcode_two_columns_one' );

function moka_shortcode_two_columns_one_last( $atts, $content = null ) {
   return '<div class="two-columns-one last">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'two_columns_one_last', 'moka_shortcode_two_columns_one_last' );

// Three Columns
function moka_shortcode_three_columns_one($atts, $content = null) {
   return '<div class="three-columns-one">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one', 'moka_shortcode_three_columns_one' );

function moka_shortcode_three_columns_one_last($atts, $content = null) {
   return '<div class="three-columns-one last">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_one_last', 'moka_shortcode_three_columns_one_last' );

function moka_shortcode_three_columns_two($atts, $content = null) {
   return '<div class="three-columns-two">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two', 'moka_shortcode_three_columns_two' );

function moka_shortcode_three_columns_two_last($atts, $content = null) {
   return '<div class="three-columns-two last">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'three_columns_two_last', 'moka_shortcode_three_columns_two_last' );

// Four Columns
function moka_shortcode_four_columns_one($atts, $content = null) {
   return '<div class="four-columns-one">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one', 'moka_shortcode_four_columns_one' );

function moka_shortcode_four_columns_one_last($atts, $content = null) {
   return '<div class="four-columns-one last">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_one_last', 'moka_shortcode_four_columns_one_last' );

function moka_shortcode_four_columns_two($atts, $content = null) {
   return '<div class="four-columns-two">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two', 'moka_shortcode_four_columns_two' );

function moka_shortcode_four_columns_two_last($atts, $content = null) {
   return '<div class="four-columns-two last">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_two_last', 'moka_shortcode_four_columns_two_last' );

function moka_shortcode_four_columns_three($atts, $content = null) {
   return '<div class="four-columns-three">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three', 'moka_shortcode_four_columns_three' );

function moka_shortcode_four_columns_three_last($atts, $content = null) {
   return '<div class="four-columns-three last">' . moka_remove_wpautop($content) . '</div>';
}
add_shortcode( 'four_columns_three_last', 'moka_shortcode_four_columns_three_last' );


// Divide Text Shortcode
function moka_shortcode_divider($atts, $content = null) {
   return '<div class="divider"></div>';
}
add_shortcode( 'divider', 'moka_shortcode_divider' );


/*-----------------------------------------------------------------------------------*/
/* Text Highlight and Info Boxes Shortcodes
/*-----------------------------------------------------------------------------------*/

function moka_shortcode_white_box($atts, $content = null) {
   return '<div class="white-box">' . do_shortcode( moka_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'white_box', 'moka_shortcode_white_box' );

function moka_shortcode_yellow_box($atts, $content = null) {
   return '<div class="yellow-box">' . do_shortcode( moka_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'yellow_box', 'moka_shortcode_yellow_box' );

function moka_shortcode_red_box($atts, $content = null) {
   return '<div class="red-box">' . do_shortcode( moka_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'red_box', 'moka_shortcode_red_box' );

function moka_shortcode_blue_box($atts, $content = null) {
   return '<div class="blue-box">' . do_shortcode( moka_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'blue_box', 'moka_shortcode_blue_box' );

function moka_shortcode_green_box($atts, $content = null) {
   return '<div class="green-box">' . do_shortcode( moka_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'green_box', 'moka_shortcode_green_box' );

function moka_shortcode_lightgrey_box($atts, $content = null) {
   return '<div class="lightgrey-box">' . do_shortcode( moka_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'lightgrey_box', 'moka_shortcode_lightgrey_box' );

function moka_shortcode_grey_box($atts, $content = null) {
   return '<div class="grey-box">' . do_shortcode( moka_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'grey_box', 'moka_shortcode_grey_box' );

function moka_shortcode_dark_box($atts, $content = null) {
   return '<div class="dark-box">' . do_shortcode( moka_remove_wpautop($content) ) . '</div>';
}
add_shortcode( 'dark_box', 'moka_shortcode_dark_box' );


/*-----------------------------------------------------------------------------------*/
/* Buttons Shortcodes
/*-----------------------------------------------------------------------------------*/
function moka_button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target' => '',
    'color'	=> '',
    'size'	=> '',
	 'form'	=> '',
	 'font'	=> '',
    ), $atts));

	$color = ($color) ? ' '.$color. '-btn' : '';
	$size = ($size) ? ' '.$size. '-btn' : '';
	$form = ($form) ? ' '.$form. '-btn' : '';
	$font = ($font) ? ' '.$font. '-btn' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="standard-btn' .$color.$size.$form.$font. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}
add_shortcode('button', 'moka_button');

