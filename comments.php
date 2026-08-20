<?php
/**
 * The template for displaying Comments.
 *
 * @package Moka
 * @since Moka 1.0
 */
?>

	<div id="comments" class="comments-area">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'moka' ); ?></p>
	</div><!-- #comments .comments-area -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _n( '1 Comment so far', '%1$s Comments', get_comments_number(), 'moka' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h3>

		<ol class="commentlist">
		<?php
			wp_list_comments( array(
				'avatar_size'	=> 65,
				'style'     	=> 'li',
				'short_ping'	=> true,
				'format'    	=> 'html5',
				'callback' => 'moka_comments_callback',
			) );
		?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="nav-comments">
			<div class="nav-previous"><?php previous_comments_link( __( '<span>&larr; Older</span>', 'moka' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( '<span>Newer &rarr;</span>', 'moka' ) ); ?></div>
		</nav><!-- end #comment-nav -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are no comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'moka' ); ?></p>
	<?php endif; ?>

	<?php comment_form (
		array(
			'title_reply' =>__( '<h3 id="reply-title">Leave a Reply</h3>', 'moka'),
			'comment_notes_before' =>(''),
			'comment_notes_after' =>(''),
			'comment_field'  => '<p class="comment-form-comment"><label for="comment">' . _x( 'Write your message here... <span class="required">*</span>', 'noun', 'moka' ) . 			'</label><br/><textarea id="comment" name="comment" rows="8"></textarea></p>',
			'label_submit'	=> __( 'Post Comment', 'moka' ))
		);
	?>

	</div><!-- #comments .comments-area -->
