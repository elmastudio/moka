<?php
/**
 * Moka functions and definitions
 *
 * @package Moka
 * @since Moka 1.0
 */

 /*-----------------------------------------------------------------------------------*/
/* Sets up the content width value based on the theme's design.
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 720;

/*-----------------------------------------------------------------------------------*/
/* Sets up theme defaults and registers support for various WordPress features.
/*-----------------------------------------------------------------------------------*/

function moka_setup() {

	// Make Moka available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'moka', get_template_directory() . '/languages' );

	// Remove support form block widget screens.
	remove_theme_support( 'widgets-block-editor' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for wider content.
	add_theme_support( 'align-wide' );

	// Add support for editor font sizes.


	// Disable custom editor font sizes.
	add_theme_support('disable-custom-font-sizes');

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'editor-style.css', moka_font_url() ) );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Load up the Moka theme options page and related code.
	require( get_template_directory() . '/inc/theme-options.php' );

	// This theme supports gallery and image post formats by default.
	add_theme_support( 'post-formats', array (
		'gallery', 'image',  'link',  'quote'
	) );

	// This theme uses wp_nav_menu().


	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'moka_custom_background_args', array(
		'default-color'	=> 'fff',
		'default-image'	=> '',
	) ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	//  Adding several sizes for Post Thumbnails
	add_image_size( 'recentposts-widget-img', 300, 300, true );
	add_image_size( 'recent-img', 360, 480, true );
	add_image_size( 'slider-img', 1070, 600, true );

}
add_action( 'after_setup_theme', 'moka_setup' );


/*-----------------------------------------------------------------------------------*/
/*  Adjust content_width value for front page and image templates.
/*-----------------------------------------------------------------------------------*/

function moka_adjust_content_width() {
		global $content_width;

		if ( is_page_template( 'page-templates/front-page.php' ) )
				$content_width = 1070;

		if ( is_page_template( 'page-templates/front-page-slider.php' ) )
				$content_width = 1070;

		if ( is_page_template( 'page-templates/full-width.php' ) )
				$content_width = 1070;

	if ( is_single() )
				$content_width = 1070;

		if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 1070;
	}
}
add_action( 'template_redirect', 'moka_adjust_content_width' );


/*-----------------------------------------------------------------------------------*/
/*  Register Lato Google font for Moka
/*-----------------------------------------------------------------------------------*/

function moka_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'moka' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:400,700,900,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}


/*-----------------------------------------------------------------------------------*/
/*  Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/

function moka_scripts() {
	global $wp_styles;

	// Loads JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

	// Loads JavaScript for scalable videos
	wp_enqueue_script( 'moka-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1' );

	// Loads Script for Featured Post Slider
	wp_enqueue_style( 'moka-flex-slider-style', get_template_directory_uri() . '/js/flex-slider/flexslider.css' );
	wp_enqueue_script( 'moka-flex-slider', get_template_directory_uri() . '/js/flex-slider/jquery.flexslider-min.js', array( 'jquery' ) );

	// Loads Custom Moka JavaScript functionality
	wp_enqueue_script( 'moka-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-10-15' );

	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'moka-lato', moka_font_url(), array(), null );

	// Loads main stylesheet.
	wp_enqueue_style( 'moka-style', get_stylesheet_uri(), array(), '2013-10-15' );

}
add_action( 'wp_enqueue_scripts', 'moka_scripts' );


/*-----------------------------------------------------------------------------------*/
/* Load block editor styles.
/*-----------------------------------------------------------------------------------*/
function moka_block_editor_styles() {
 wp_enqueue_style( 'moka-block-editor-styles', get_template_directory_uri() . '/block-editor.css');
 wp_enqueue_style( 'moka-fonts', moka_font_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'moka_block_editor_styles' );


/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/

function moka_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'moka_page_menu_args' );


/*-----------------------------------------------------------------------------------*/
/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item';
		}
	}

	return $items;
}

/*-----------------------------------------------------------------------------------*/
/* Make new thumbnail sizes available in media library
/*-----------------------------------------------------------------------------------*/
add_filter( 'image_size_names_choose', 'moka_custom_sizes' );

function moka_custom_sizes( $sizes ) {
		return array_merge( $sizes, array(
				'moka-recent-thumbnail' => __('Recent Post Thumbs', 'moka' ),
		) );
}


/*-----------------------------------------------------------------------------------*/
/* Add Theme Customizer CSS
/*-----------------------------------------------------------------------------------*/

function moka_customize_css() {
		?>
				 <style type="text/css">
			 #site-title h1 a {color:#<?php echo get_theme_mod('header_textcolor'); ?>; background: <?php echo get_theme_mod('header_textbgcolor'); ?>;}
						 a {color: <?php echo get_theme_mod('link_color'); ?>;}
						 a:hover,
			 .entry-footer a:hover,
			 #site-nav ul li a:hover,
			.widget_nav_menu ul li a:hover,
			 #search-btn:hover,
			 .nav-next a:hover,
			 .nav-previous a:hover,
			 .previous-image a:hover,
			 .next-image a:hover {color: <?php echo get_theme_mod('linkhover_color'); ?>;}
			 #front-sidebar .widget_moka_quote p.quote-text,
			 #front-sidebar .widget_moka_about h3.about-title  {color: <?php echo get_theme_mod('bigfont_color'); ?>;}
				 </style>
		<?php
}
add_action( 'wp_head', 'moka_customize_css');


/*-----------------------------------------------------------------------------------*/
/* Sets the post excerpt length to 15 characters.
/*-----------------------------------------------------------------------------------*/

function moka_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'moka_excerpt_length' );


/*-----------------------------------------------------------------------------------*/
/* Returns a "Continue Reading" link for excerpts
/*-----------------------------------------------------------------------------------*/

function moka_excerpt_more( $more ) {
	return '&hellip; <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Read more', 'moka' ) . '</a>';
}
add_filter( 'excerpt_more', 'moka_excerpt_more' );


/*-----------------------------------------------------------------------------------*/
/* Remove inline styles printed when the gallery shortcode is used.
/*-----------------------------------------------------------------------------------*/

function moka_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'moka_remove_gallery_css' );


/**
 * Callback to change just html output on a comment.
 */
function moka_comments_callback($comment, $args, $depth){
	//checks if were using a div or ol|ul for our output
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 65 ); ?>
			</div>
			<div class="comment-content">
				<div class="comment-author">
					<?php printf( __( ' %s ', 'moka' ), sprintf( ' %s ', get_comment_author_link() ) ); ?>
				</div><!-- end .comment-author -->
					<div class="comment-text">
						<?php comment_text(); ?>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'moka' ); ?></p>
						<?php endif; ?>

						<ul class="comment-meta">
							<li class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
							/* translators: 1: date */
							printf( __( '%1$s', 'moka' ),
							get_comment_date());
						?></a></li>
							<?php if ( comments_open () ) : ?>
							<li class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply<span> to this comment</span>', 'moka' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></li>
							<?php endif; ?>

							<?php edit_comment_link( __( 'Edit', 'moka' ));?>
						</ul><!-- end .comment-meta -->
					</div><!-- end .comment-text -->
			</div><!-- end .comment-content -->
		</article><!-- end .comment -->
	<?php
}


/*-----------------------------------------------------------------------------------*/
/* Register widgetized areas
/*-----------------------------------------------------------------------------------*/

function moka_widgets_init() {

	register_sidebar( array (
		'name' => __( 'Front Page Widget Area', 'moka' ),
		'id' => 'front-sidebar-1',
		'description' => __( 'Widgets will appear in a single column layout on the custom front page above the footer.', 'moka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 1', 'moka' ),
		'id' => 'footer-sidebar-1',
		'description' => __( 'Widgets will appear in the first footer column.', 'moka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 2', 'moka' ),
		'id' => 'footer-sidebar-2',
		'description' => __( 'Widgets will appear in the second footer column.', 'moka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Footer Widget Area 3', 'moka' ),
		'id' => 'footer-sidebar-3',
		'description' => __( 'Widgets will appear in the third footer column.', 'moka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Social Links Footer Widget Area', 'moka' ),
		'id' => 'footer-sidebar-4',
		'description' => __( 'Widget area to include social links widget above the footer credit text. Please note that this widget area is only intended for the Social Links widget.', 'moka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'moka_widgets_init' );


if ( ! function_exists( 'moka_content_nav' ) ) :

/*-----------------------------------------------------------------------------------*/
/* Display navigation to next/previous pages when applicable
/*-----------------------------------------------------------------------------------*/

function moka_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="clearfix">
				<div class="nav-previous"><?php next_posts_link( __( '<span>&laquo; Older Posts</span>', 'moka'  ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( '<span>Newer Posts &raquo;</span>', 'moka' ) ); ?></div>
			</nav><!-- end #nav-below -->
	<?php endif;
}

endif; // moka_content_nav


/*-----------------------------------------------------------------------------------*/
/* Extends the default WordPress body classes
/*-----------------------------------------------------------------------------------*/
function moka_body_class( $classes ) {

	if ( is_page_template( 'page-templates/front-page.php' ) )
		$classes[] = 'template-front';

	if ( is_page_template( 'page-templates/page-archive.php' ) )
		$classes[] = 'template-archive';

	if ( is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'template-fullwidth';

	return $classes;
}
add_filter( 'body_class', 'moka_body_class' );


	// Customizer additions
	require get_template_directory() . '/inc/customizer.php';

	// Grab the Moka Custom widgets.
	require( get_template_directory() . '/inc/widgets.php' );

	// Grab the Moka Custom shortcodes.
	require( get_template_directory() . '/inc/shortcodes.php' );

	// Load Jetpack compatibility file.
	require get_template_directory() . '/inc/jetpack.php';

	// Add One Click Demo Import code.
	require get_template_directory() . '/inc/demo-installer.php';

/**
 * Registrations that carry translated labels.
 *
 * WordPress 6.7 loads translations at init, so a __() call during
 * after_setup_theme is too early and logs a notice on every request.
 * These moved out of the setup function unchanged; only the hook differs.
 */
function moka_i18n_setup() {
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'moka' ),
			'shortName' => __( 'S', 'moka' ),
			'size' => 13,
			'slug' => 'small'
		),
		array(
			'name' => __( 'regular', 'moka' ),
			'shortName' => __( 'M', 'moka' ),
			'size' => 17,
			'slug' => 'regular'
		),
		array(
			'name' => __( 'large', 'moka' ),
			'shortName' => __( 'L', 'moka' ),
			'size' => 19,
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'moka' ),
			'shortName' => __( 'XL', 'moka' ),
			'size' => 23,
			'slug' => 'larger'
		)
	) );

	register_nav_menus( array (
		'primary' => __( 'Primary Navigation', 'moka' ),
	) );
}
add_action( 'init', 'moka_i18n_setup' );

/* __php8_option_defaults: never let the theme options be false or miss a key (PHP 8). */
function moka_php8_option_defaults( $options = array() ) {
	$fallback = array_fill_keys( array( 'share-posts', 'custom_footertext', 'share-singleposts', 'show-excerpt', 'custom_logo', 'custom_logo_width', 'custom_logo_height', 'sidebar-fixed', 'custom-css' ), '' );
	if ( function_exists( 'moka_get_default_theme_options' ) ) {
		$fallback = array_merge( $fallback, (array) moka_get_default_theme_options() );
	}
	return wp_parse_args( is_array( $options ) ? $options : array(), $fallback );
}
add_filter( 'default_option_moka_theme_options', 'moka_php8_option_defaults' );
add_filter( 'option_moka_theme_options', 'moka_php8_option_defaults' );
