<?php
/**
 * Template Name: Archive Page
 * Description: An archive page template
 *
 * @package Moka
 * @since Moka 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content" role="main">

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'archive' ); ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- end #primary -->

<?php get_footer(); ?>