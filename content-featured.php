<?php
/**
 * The default template for displaying content
 *
 * @package Moka
 * @since Moka 1.0
 */
?>

<li class="featured">

	<div class="featured-entry-wrap">

		<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'moka' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- end .entry-thumbnail -->
		<?php endif; ?>

		<div class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</div><!-- .entry-header -->

	</div><!-- end .featured-entry-wrap -->
</li>