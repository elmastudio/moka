<?php
/**
 * The themes Header file.
 *
 * Displays all of the <head> section and everything up till <div id="main-wrap">
 *
 * @package Moka
 * @since Moka 1.0
 */
 ?><!DOCTYPE html>
<html id="doc" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">
	<div class="search-overlay">
		<div class="search-wrap">
			<?php get_template_part( 'search-main' ); ?>
			<div class="search-close"><?php _e('Close Search', 'moka') ?></div>
			<p class="search-info"><?php _e('Type your search terms above and press return to see the search results.', 'moka') ?></p>
		</div><!-- end .search-wrap -->
	</div><!-- end .search-overlay -->


<div id="sidebar-wrap">
	<div id="sidebar">
	<header id="masthead" class="clearfix" role="banner">
		<div id="site-title">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( '' != get_bloginfo('description') ) : ?>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div><!-- end #site-title -->
	</header><!-- end #masthead -->

	<a href="#nav-mobile" id="mobile-menu-btn"><span><?php _e('Menu', 'moka') ?></span></a>
	<nav id="site-nav" class="clearfix">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'false') ); ?>
		<div id="search-btn"><?php _e('Search', 'moka') ?></div>
	</nav><!-- end #site-nav -->

	</div><!-- end #sidebar -->
</div><!-- end #sidebar-wrap -->

<div id="main-wrap">