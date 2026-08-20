<?php
/**
 * The template for displaying image post content
 *
 * @package Moka
 * @since Moka 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="entry-details">
			<div class="entry-date">
				<a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date(); ?></a>
			</div><!-- end .entry-date -->
			<?php if ( comments_open() ) : ?>
				<div class="entry-comments">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'comment 0', 'moka' ) . '</span>', __( 'comment 1', 'moka' ), __( 'comments %', 'moka' ) ); ?>
				</div><!-- end .entry-comments -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'moka' ), '<div class="entry-edit">', '</div>' ); ?>
		</div><!--end .entry-details -->
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'moka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!--end .entry-header -->

	<?php if ( is_search() && ! get_post_format() ) : // Only display excerpts for archives and search. ?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- end .entry-content -->

	<?php else : ?>

	<div class="entry-content clearfix">
		<?php // Show Excerpt via Theme Options
			$options = get_option('moka_theme_options');
			if( $options['show-excerpt'] && ! get_post_format() && ! is_sticky() ) : ?>
				<?php the_excerpt(); ?>
		<?php else : ?>
				<?php the_content('Read More', 'moka'); ?>
		<?php endif; ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'moka' ), 'after' => '</div>' ) ); ?>
	</div><!-- end .entry-content -->

	<?php endif; ?>

	<footer class="entry-footer clearfix">
		<?php // Include Share-Btns
		if( $options['share-posts'] ) : ?>
			<?php get_template_part( 'share'); ?>
		<?php endif; ?>
		<div class="entry-cats"><span><?php _e('Filed under: ', 'moka') ?></span><?php the_category(', '); ?></div>
	</footer><!-- end .entry-footer -->

</article><!-- end post -<?php the_ID(); ?> -->