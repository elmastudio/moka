 <?php
/**
 * The template for displaying the footer.
 *
 * @package Moka
 * @since Moka 1.0
 */
?>

	<footer id="colophon" class="site-footer clearfix">

		<?php get_sidebar( 'footer' ); ?>

		<div id="site-info">

		<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) : ?>
			<div id="sidebar-footer-four" class="widget-area">
				<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

		<?php
		$options = get_option('moka_theme_options');
			if ( ! empty( $options['custom_footertext'] ) ){
				echo ('<ul class="credit"<li class="copyright">');
				echo stripslashes($options['custom_footertext']);
				echo ('</li></ul>');
		} else { ?>
			<ul class="credit" role="contentinfo">
				<li class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ); ?>"><?php bloginfo(); ?></a></li>
				<?php
					/* Include Privacy Policy link. */
					if ( function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '<li>', '</li>', 'moka');
					}
				?>
				<li class="wp-credit"><?php _e('Proudly powered by', 'moka') ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'moka' ) ); ?>" ><?php _e('WordPress.', 'moka') ?></a></li>
				<li><?php printf( __( 'Theme: %1$s by %2$s', 'moka' ), 'Moka', '<a href="https://www.elmastudio.de/en/" title="Elmastudio WordPress Themes">Elmastudio</a>' ); ?></li>
			</ul><!-- end .credit -->
		<?php } ?>

		</div><!-- end #site-info -->

	</footer><!-- end #colophon -->
	</div><!-- end #main-wrap -->
</div><!-- end #container -->

<?php // Includes Twitter and Google+ button code if the share post option is active.
	$options = get_option('moka_theme_options');
	if ( ! empty( $options['share-singleposts'] ) || ! empty( $options['share-posts'] ) ) : ?>
	<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>
	<script type="text/javascript">
	(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
	</script>

	<script type="text/javascript">
(function() {
		window.PinIt = window.PinIt || { loaded:false };
		if (window.PinIt.loaded) return;
		window.PinIt.loaded = true;
		function async_load(){
				var s = document.createElement("script");
				s.type = "text/javascript";
				s.async = true;
				s.src = "https://assets.pinterest.com/js/pinit.js";
				var x = document.getElementsByTagName("script")[0];
				x.parentNode.insertBefore(s, x);
		}
		if (window.attachEvent)
				window.attachEvent("onload", async_load);
		else
				window.addEventListener("load", async_load, false);
})();
</script>

<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
