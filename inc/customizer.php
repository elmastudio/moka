<?php
/**
 * moka Theme Customizer
 *
 * @package Moka
 * @since Moka 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function moka_customize_register( $wp_customize ) {

	$wp_customize->get_section( 'colors' )->description			 = __( 'Customize your title background and text color, your link and link hover color, background color and big widget font colors.', 'moka' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->add_section( 'moka_theme_options', array(
		'title'         => __( 'Front Page Settings', 'moka' ),
		'priority'      => 135,
	) );

	// Add the custom settings and controls.
	$wp_customize->add_setting( 'recentposts_front', array(
		'default'       => '3',
	) );

	$wp_customize->add_setting( 'header_textcolor' , array(
    	'default'     => '#ffffff',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'header_textbgcolor' , array(
    	'default'     => '#161616',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'link_color' , array(
    	'default'     => '#363636',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'linkhover_color' , array(
    	'default'     => '#b6b6b6',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_setting( 'bigfont_color' , array(
    	'default'     => '#161616',
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( 'recentposts_front', array(
		'label'         => __( 'Number of Recent Posts', 'moka' ),
		'section'       => 'moka_theme_options',
		'type'          => 'text',
		'priority'      => 1,
		'description'	=> __( 'Define the number of recent posts you want to show in the 3-column recent posts area on the custom Moka front page. The number can be 0, 3, 6, 9 or 12.', 'moka' ),
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
		'label'        => __( 'Site Title Color', 'moka' ),
		'section'    => 'colors',
		'settings'   => 'header_textcolor',
	) ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textbgcolor', array(
		'label'        => __( 'Site Title Background Color', 'moka' ),
		'section'    => 'colors',
		'settings'   => 'header_textbgcolor',
	) ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'        => __( 'Link Color', 'moka' ),
		'section'    => 'colors',
		'settings'   => 'link_color',
	) ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'linkhover_color', array(
		'label'        => __( 'Link Hover Color', 'moka' ),
		'section'    => 'colors',
		'settings'   => 'linkhover_color',
	) ) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bigfont_color', array(
		'label'        => __( 'Big Font Color (in Widgets)', 'moka' ),
		'section'    => 'colors',
		'settings'   => 'bigfont_color',
	) ) );

}
add_action( 'customize_register', 'moka_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function moka_customize_preview_js() {
	wp_enqueue_script( 'moka-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131212', true );
}
add_action( 'customize_preview_init', 'moka_customize_preview_js' );