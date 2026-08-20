<?php
/**
 * @package Moka
 * @since Moka 1.1
 */
$featured = moka_get_featured_posts();

if ( empty( $featured ) )
	return;
?>

<div id="featured-content" class="flexslider">
	<ul class="featured-posts slides">

		<?php
		foreach ( $featured as $post ) :
			setup_postdata( $post );

			if ( '' != get_the_post_thumbnail() ) :
				// Now let's check the image.
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider-img' );

				// If it is greater than 1070 in width, let's skip
				if ( $image[1] >= 1070 ) :
		?>
					<li class="featured">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'moka' ), the_title_attribute( 'echo=0' ) ) ); ?>" class="slider-img" rel="bookmark"><?php the_post_thumbnail( 'slider-img' ); ?></a>

							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-header">
									<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									<div class="entry-details">
										<div class="entry-date">
											<a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date(); ?></a>
										</div><!-- end .entry-date -->
										<?php if ( comments_open() ) : ?>
										<div class="entry-comments">
											<?php comments_popup_link( '<span class="leave-reply">' . __( 'comment 0', 'moka' ) . '</span>', __( 'comment 1', 'moka' ), __( 'comments %', 'moka' ) ); ?>
										</div><!-- end .entry-comments -->
										<?php endif; // comments_open() ?>
									</div><!--end .entry-details -->
								</div><!-- .entry-header -->
							</div><!-- #post-## -->
					</li>
		<?php
				endif;
			endif;
		endforeach;
		wp_reset_postdata();
		?>
	</ul><!-- .featured-posts -->
</div><!-- #featured-content -->