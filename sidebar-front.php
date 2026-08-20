<?php
/**
 * The sidebar containing the front page widget area
 *
 * If no active widgets are in the sidebar, hide the sidebar completely.
 *
 * @package Moka
 * @since Moka 1.0
 */
?>

<?php
	/* Check if any of the front widget area have widgets.
	 *
	 * If none of the footer widget areas have widgets, let's bail early.
	 */
	 if ( ! is_active_sidebar( 'front-sidebar-1' ) )
	return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="front-sidebar-wrap" class="clearfix">

	<?php if ( is_active_sidebar( 'front-sidebar-1' ) ) : ?>
		<div id="front-sidebar" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'front-sidebar-1' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

</div><!-- end .front-sidebar-wrap -->