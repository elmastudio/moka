<?php
/**
 * Template Name: Front Page Slider
 *
 * Description: A page template for a Custom Front Page with Featured Post Slider
 *
 * @package Moka
 * @since Moka 1.1
 */

get_header(); ?>

<div id="primary" class="site-content" role="main">

	<?php get_template_part('content', 'slider'); ?>

	<?php if ( get_theme_mod( 'recentposts_front' ) != 0 ) : ?>
	<div class="front-recent clearfix">
		<?php $query2 = new WP_Query( array (
            'post_type' => 'post',
            'posts_per_page' => get_theme_mod( 'recentposts_front' ),
            'post__not_in' => get_option( 'sticky_posts' ),
            'tax_query' => array(
				array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-quote', 'post-format-link' ),
				'operator' => 'NOT IN'
				)
			)
        ) );
        	// Start the Loop.
			while ($query2->have_posts()) : $query2->the_post();
		?>
			<?php get_template_part( 'content', 'recent'); ?>
	   <?php endwhile; // end of the loop. ?>

	   <?php wp_reset_postdata(); // reset the query ?>

	</div><!-- end .front-recent -->
	<?php endif; // if 0 recent posts ?>

</div><!-- end #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>