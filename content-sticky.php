<?php
/**
 * The default template for displaying the latest sticky post on the front page template
 *
 * @package Moka
 * @since Moka 1.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'moka' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail(); ?></a>
		</div><!-- end .entry-thumbnail -->
	<?php endif; ?>

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
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'moka' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!--end .entry-header -->

	<div class="entry-content clearfix">
		<?php global $more;
		$more = 0;
		the_content( __( 'Read More', 'moka' )); ?>
	</div><!-- end .entry-content -->

	<footer class="entry-footer clearfix">
		<?php // Include Share-Btns
		$options = get_option('moka_theme_options');
		if( $options['share-posts'] ) : ?>
			<?php get_template_part( 'share'); ?>
		<?php endif; ?>
		<div class="entry-cats"><span><?php _e('Filed under: ', 'moka') ?></span><?php the_category(', '); ?></div>
	</footer><!-- end .entry-footer -->

</article><!-- end post -<?php the_ID(); ?> -->