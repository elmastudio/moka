<?php
/**
 * Moka Theme Options
 *
 * @subpackage Moka
 * @since Moka 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Properly enqueue styles and scripts for our theme options page.
/*
/* This function is attached to the admin_enqueue_scripts action hook.
/*
/* @param string $hook_suffix The action passes the current page to the function.
/* We don't do anything if we're not on our theme options page.
/*-----------------------------------------------------------------------------------*/

function moka_admin_enqueue_scripts( $hook_suffix ) {
	if ( $hook_suffix != 'appearance_page_theme_options' )
		return;

	wp_enqueue_style( 'moka-theme-options', get_template_directory_uri() . '/inc/theme-options.css', false, '2013-12-12' );
}
add_action( 'admin_enqueue_scripts', 'moka_admin_enqueue_scripts' );

/*-----------------------------------------------------------------------------------*/
/* Register the form setting for our moka_options array.
/*
/* This function is attached to the admin_init action hook.
/*
/* This call to register_setting() registers a validation callback, moka_theme_options_validate(),
/* which is used when the option is saved, to ensure that our option values are complete, properly
/* formatted, and safe.
/*
/* We also use this function to add our theme option if it doesn't already exist.
/*-----------------------------------------------------------------------------------*/

function moka_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === moka_get_theme_options() )
		add_option( 'moka_theme_options', moka_get_default_theme_options() );

	register_setting(
		'moka_options',       // Options group, see settings_fields() call in theme_options_render_page()
		'moka_theme_options', // Database option, see moka_get_theme_options()
		'moka_theme_options_validate' // The sanitization callback, see moka_theme_options_validate()
	);
}
add_action( 'admin_init', 'moka_theme_options_init' );


/*-----------------------------------------------------------------------------------*/
/* Add our theme options page to the admin menu.
/*
/* This function is attached to the admin_menu action hook.
/*-----------------------------------------------------------------------------------*/

function moka_theme_options_add_page() {
	add_theme_page(
		__( 'Theme Options', 'moka' ), // Name of page
		__( 'Theme Options', 'moka' ), // Label in menu
		'edit_theme_options',                  // Capability required
		'theme_options',                       // Menu slug, used to uniquely identify the page
		'theme_options_render_page'            // Function that renders the options page
	);
}
add_action( 'admin_menu', 'moka_theme_options_add_page' );


/*-----------------------------------------------------------------------------------*/
/* Returns the default options for Moka
/*-----------------------------------------------------------------------------------*/

function moka_get_default_theme_options() {
	$default_theme_options = array(
		'custom_logo' => '',
		'custom_logo_width' => '',
		'custom_logo_height' => '',
		'custom_footertext' => '',
		'sidebar-fixed' => '',
		'show-excerpt' => '',
		'share-posts' => '',
		'share-singleposts' => '',
		'custom-css' => '',
	);

	return apply_filters( 'moka_default_theme_options', $default_theme_options );
}

/*-----------------------------------------------------------------------------------*/
/* Returns the options array for Moka
/*-----------------------------------------------------------------------------------*/

function moka_get_theme_options() {
	return get_option( 'moka_theme_options' );
}

/*-----------------------------------------------------------------------------------*/
/* Returns the options array for Moka
/*-----------------------------------------------------------------------------------*/

function theme_options_render_page() {
	?>
	<div class="wrap">
		<h2><?php printf( __( '%s Theme Options', 'moka' ), wp_get_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'moka_options' );
				$options = moka_get_theme_options();
				$default_options = moka_get_default_theme_options();
			?>

			<table class="form-table">
				<h3 class="title" style="margin-top:40px;"><?php _e( 'Custom Logo', 'moka' ); ?></h3>

				<tr valign="top"><th scope="row"><?php _e( 'Logo Image', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Logo Image', 'moka' ); ?></span></legend>
							<input class="regular-text" type="text" name="moka_theme_options[custom_logo]" value="<?php echo esc_attr( $options['custom_logo'] ); ?>" />
						<br/><label class="description" for="moka_theme_options[custom_logo]"><?php _e('Upload your own logo image with a max width of 200px and a flexible height (e.g. 200x80px) using the ', 'moka'); ?><a href="<?php echo home_url(); ?>/wp-admin/media-new.php" target="_blank"><?php _e('WordPress Media Uploader', 'moka'); ?></a><?php _e('. Then copy your logo image file URL and insert the URL here. If you want to include a Retina-optimized logo image, just prepare the image 2x the actual size (e.g. 400x160px), but still type in the 200 and 80 as width and height value below.', 'moka'); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Logo Image Width', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Logo Image Width', 'moka' ); ?></span></legend>
							<input class="short-text" type="text" name="moka_theme_options[custom_logo_width]" value="<?php echo esc_attr( $options['custom_logo_width'] ); ?>" />
						<br/><label class="description" for="moka_theme_options[custom_logo_width]"><?php _e( 'Include your custom logo width, e.g. 200 (value only, no unit). The maximum logo image width is 200px.', 'moka' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Logo Image Height', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Logo Image Height', 'moka' ); ?></span></legend>
							<input class="short-text" type="text" name="moka_theme_options[custom_logo_height]" value="<?php echo esc_attr( $options['custom_logo_height'] ); ?>" />
						<br/><label class="description" for="moka_theme_options[custom_logo_height]"><?php _e( 'Include your custom logo height, e.g. 80 (value only, no unit)', 'moka' ); ?></label>
						</fieldset>
					</td>
				</tr>
			</table>

			<table class="form-table">
				<h3 class="title" style="margin-top:40px;"><?php _e( 'Fixed Sidebar, Post Excerpts & Footer Text', 'moka' ); ?></h3>

				<tr valign="top"><th scope="row"><?php _e( 'Sidebar Fixed Position', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Sidebar Fixed Position', 'moka' ); ?></span></legend>
							<input id="moka_theme_options[sidebar-fixed]" name="moka_theme_options[sidebar-fixed]" type="checkbox" value="1" <?php checked( '1', $options['sidebar-fixed'] ); ?> />
							<label class="description" for="moka_theme_options[sidebar-fixed]"><?php _e( 'Check this box to use the fixed positioned sidebar feature on desktop screens.', 'moka' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Post Excerpts', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Post Excerpts', 'moka' ); ?></span></legend>
							<input id="moka_theme_options[show-excerpt]" name="moka_theme_options[show-excerpt]" type="checkbox" value="1" <?php checked( '1', $options['show-excerpt'] ); ?> />
							<label class="description" for="moka_theme_options[show-excerpt]"><?php _e( 'Check this box to show automatic post excerpts on your blog page. With this option you will not need to add the more tag in posts.', 'moka' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Footer Credit Text', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Footer Credit Text', 'moka' ); ?></span></legend>
							<textarea id="moka_theme_options[custom_footertext]" class="small-text" cols="100" rows="2" name="moka_theme_options[custom_footertext]"><?php echo esc_textarea( $options['custom_footertext'] ); ?></textarea>
						<br/><label class="description" for="moka_theme_options[custom_footertext]"><?php _e( 'Customize the footer credit text. Standard HTML is allowed.', 'moka' ); ?></label>
						</fieldset>
					</td>
				</tr>

			</table>

			<table class="form-table">

				<h3 class="title" style="margin-top:40px;"><?php _e( 'Share Buttons', 'moka' ); ?></h3>

				<tr valign="top"><th scope="row"><?php _e( 'Share option for posts', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Share option for posts', 'moka' ); ?></span></legend>
							<input id="moka_theme_options[share-posts]" name="moka_theme_options[share-posts]" type="checkbox" value="1" <?php checked( '1', $options['share-posts'] ); ?> />
							<label class="description" for="moka_theme_options[share-posts]"><?php _e( 'Check this box to include share buttons (for Twitter, Facebook, Google+) on your blogs front page and on single post pages.', 'moka' ); ?></label>
						</fieldset>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php _e( 'Share option on single posts only', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Share option on single posts only', 'moka' ); ?></span></legend>
							<input id="moka_theme_options[share-singleposts]" name="moka_theme_options[share-singleposts]" type="checkbox" value="1" <?php checked( '1', $options['share-singleposts'] ); ?> />
							<label class="description" for="moka_theme_options[share-singleposts]"><?php _e( 'Check this box to include the share post buttons <strong>only</strong> on single posts (below the post content).', 'moka' ); ?></label>
						</fieldset>
					</td>
				</tr>
			</table>

				<table class="form-table">
				<h3 class="title" style="margin-top:40px;"><?php _e( 'Custom CSS', 'moka' ); ?></h3>

				<tr valign="top"><th scope="row"><?php _e( 'Include Custom CSS', 'moka' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Include Custom CSS', 'moka' ); ?></span></legend>
							<textarea id="moka_theme_options[custom-css]" class="small-text" cols="100" rows="10" name="moka_theme_options[custom-css]"><?php echo esc_textarea( $options['custom-css'] ); ?></textarea>
						<br/><label class="description" for="moka_theme_options[custom-css]"><?php _e( 'Include custom CSS styles, use !important to overwrite existing styles.', 'moka' ); ?></label>
						</fieldset>
					</td>
				</tr>

			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Sanitize and validate form input. Accepts an array, return a sanitized array.
/*-----------------------------------------------------------------------------------*/

function moka_theme_options_validate( $input ) {
	global $layout_options, $font_options;

	// Text options must be safe text with no HTML tags
	$input['custom_logo'] = wp_filter_nohtml_kses( $input['custom_logo'] );

	// Text options must be safe text with no HTML tags
	$input['custom_logo_width'] = wp_filter_nohtml_kses( $input['custom_logo_width'] );

	// Text options must be safe text with no HTML tags
	$input['custom_logo_heighth'] = wp_filter_nohtml_kses( $input['custom_logo_height'] );

	// checkbox values are either 0 or 1
	if ( ! isset( $input['share-posts'] ) )
		$input['share-posts'] = null;
	$input['share-posts'] = ( $input['share-posts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['share-singleposts'] ) )
		$input['share-singleposts'] = null;
	$input['share-singleposts'] = ( $input['share-singleposts'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show-excerpt'] ) )
		$input['show-excerpt'] = null;
	$input['show-excerpt'] = ( $input['show-excerpt'] == 1 ? 1 : 0 );

	if ( ! isset( $input['sidebar-fixed'] ) )
		$input['sidebar-fixed'] = null;
	$input['sidebar-fixed'] = ( $input['sidebar-fixed'] == 1 ? 1 : 0 );

	return $input;
}

/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for fixed position sidebar styles.
/*
/* This function is attached to the wp_head action hook.
/*-----------------------------------------------------------------------------------*/

function moka_print_sidebar_fixed_style() {
	$options = moka_get_theme_options();
	$sidebar_fixed = $options['sidebar-fixed'];

	$default_options = moka_get_default_theme_options();

	// Don't do anything if the custom logo option is empty.
	if ( $default_options['sidebar-fixed'] == $sidebar_fixed )
		return;
?>
<style type="text/css">
/* Fixed Positioned Sidebar CSS */
@media screen and (min-width: 1270px) {
#sidebar-wrap {
	position: fixed;
	top: 0;
	bottom: 0;
	height: auto;
	overflow-x: hidden;
	overflow-y: auto;
}
#sidebar {
	position: absolute;
    top: 65px;
}
.admin-bar #sidebar-wrap {
	top: 32px;
}
}
</style>
<?php
}
add_action( 'wp_head', 'moka_print_sidebar_fixed_style' );



/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for custom css styles.
/*
/* This function is attached to the wp_head action hook.
/*-----------------------------------------------------------------------------------*/

function moka_print_customcss_style() {
	$options = moka_get_theme_options();
	$customcss = $options['custom-css'];

	$default_options = moka_get_default_theme_options();

	// Don't do anything if custom CSS is empty.
	if ( $default_options['custom-css'] == $customcss )
		return;
?>
<style type="text/css">
/* Custom CSS */
<?php echo $customcss; ?>
</style>
<?php
}
add_action( 'wp_head', 'moka_print_customcss_style' );


/*-----------------------------------------------------------------------------------*/
/* Add a style block to the theme for custom logo styles.
/*
/* This function is attached to the wp_head action hook.
/*-----------------------------------------------------------------------------------*/

function moka_print_custom_logo_style() {
	$options = moka_get_theme_options();
	$custom_logo = $options['custom_logo'];
	$custom_logo_width = $options['custom_logo_width'];
	$custom_logo_height = $options['custom_logo_height'];

	$default_options = moka_get_default_theme_options();

	// Don't do anything if the custom logo option is empty.
	if ( $default_options['custom_logo'] == $custom_logo )
		return;
?>
<style type="text/css">
/* Custom Logo Image CSS */
#site-title h1 a {
	display: block;
	margin: 0;
	padding: 0;
	width: <?php echo $custom_logo_width; ?>px;
	height:<?php echo $custom_logo_height; ?>px;
	background: url(<?php echo $custom_logo; ?>) 0 0 no-repeat;
	background-size: 100%;
	text-indent: -99999px;
}
</style>
<?php
}
add_action( 'wp_head', 'moka_print_custom_logo_style' );

