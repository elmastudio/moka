<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Moka
 * @since Moka 1.0
 */

get_header(); ?>

		<div id="primary" class="site-content" role="main">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- end #primary -->


<?php get_footer(); ?>