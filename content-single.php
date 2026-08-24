<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Moka
 * @since Moka 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' != get_the_post_thumbnail() && ! post_password_required() && ! has_post_format('image') && ! has_post_format('gallery') ) : ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail(); ?>
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
		<h1 class="entry-title"><?php the_title(); ?></a></h1>
	</header><!--end .entry-header -->

	<div class="entry-content clearfix">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'moka' ), 'after' => '</div>' ) ); ?>
	</div><!-- end .entry-content -->

	<footer class="entry-footer clearfix">
		<?php // Include Share-Btns
		$options = get_option('moka_theme_options');
		if ( ! empty( $options['share-singleposts'] ) || ! empty( $options['share-posts'] ) ) : ?>
			<?php get_template_part( 'share'); ?>
		<?php endif; ?>
		<div class="entry-cats"><span><?php _e('Filed under: ', 'moka') ?></span><?php the_category(', '); ?></div>
		<?php $tags_list = get_the_tag_list();
		if ( $tags_list ): ?>
		<div class="entry-tags"><span><?php _e('Tagged: ', 'moka') ?></span><?php the_tags('<ul><li>',', ','</li></ul>'); ?></div>
		<?php endif; // get_the_tag_list() ?>

		<?php if ( get_the_author_meta( 'description' ) && ! get_post_format() ) : // If a user filled out their author bio, show it on standard posts ?>
		<div class="author-wrap">
		<h4 class="author-headline"><?php _e('About the Author', 'moka') ?></h4>
			<div class="author-info">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'moka_author_bio_avatar_size', 75 ) ); ?>
				<h6><?php printf( __( 'Posted by %s', 'moka' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='author'>" . get_the_author() . "</a>" ); ?></h6 >
				<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
			</div><!-- end .author-info -->
		</div><!-- end .author-wrap -->
	<?php endif; ?>

	</footer><!-- end .entry-meta -->

</article><!-- end .post-<?php the_ID(); ?> -->

	<nav id="nav-single" class="clearfix">
		<div class="nav-next"><?php next_post_link( '%link', __( '<span>Next Post  &raquo;</span>', 'moka' ) ); ?></div>
		<div class="nav-previous"><?php previous_post_link( '%link', __( '<span>&laquo; Previous Post</span>', 'moka' ) ); ?></div>
	</nav><!-- #nav-single -->