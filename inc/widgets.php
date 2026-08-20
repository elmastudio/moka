<?php
/**
 * Available Moka Custom Widgets
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Moka
 * @since Moka 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Moka Social Links Widget
/*-----------------------------------------------------------------------------------*/

 class moka_sociallinks extends WP_Widget {

	public function __construct() {
		parent::__construct( 'moka_sociallinks', __( 'Social Links (Moka)', 'moka' ), array(
			'classname'   => 'widget_moka_sociallinks',
			'description' => __( 'Show icons with links to your social profiles', 'moka' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$googleplus = $instance['googleplus'];
		$appnet = $instance['appnet'];
		$flickr = $instance['flickr'];
		$instagram = $instance['instagram'];
		$picasa = $instance['picasa'];
		$fivehundredpx = $instance['fivehundredpx'];
		$youtube = $instance['youtube'];
		$vimeo = $instance['vimeo'];
		$dribbble = $instance['dribbble'];
		$ffffound = $instance['ffffound'];
		$pinterest = $instance['pinterest'];
		$behance = $instance['behance'];
		$deviantart = $instance['deviantart'];
		$squidoo = $instance['squidoo'];
		$slideshare = $instance['slideshare'];
		$lastfm = $instance['lastfm'];
		$grooveshark = $instance['grooveshark'];
		$soundcloud = $instance['soundcloud'];
		$foursquare = $instance['foursquare'];
		$github = $instance['github'];
		$linkedin = $instance['linkedin'];
		$xing = $instance['xing'];
		$wordpress = $instance['wordpress'];
		$tumblr = $instance['tumblr'];
		$rss = $instance['rss'];
		$rsscomments = $instance['rsscomments'];

		echo $before_widget; ?>
		<?php if($title != '')
			echo '<h3 class="widget-title"><span>'.$title.'</span></h3>'; ?>

        <ul class="sociallinks">
			<?php
			if($twitter != ''){
				echo '<li><a href="'.esc_url( $twitter ).'" class="twitter" title="' . __( 'Twitter', 'moka' ) . '">' . __( 'Twitter', 'moka' ) . '</a></li>';
			}
			?>

			<?php
			if($facebook != '') {
				echo '<li><a href="'.esc_url( $facebook ).'" class="facebook" title="' . __( 'Facebook', 'moka' ) . '">' . __( 'Facebook', 'moka' ) . '</a></li>';
			}
			?>

			<?php
			if($googleplus != '') {
				echo '<li><a href="'.esc_url( $googleplus ).'" class="googleplus" title="' . __( 'Google+', 'moka' ) . '">' . __( 'Google+', 'moka' ) . '</a></li>';
			}
			?>

			<?php
			if($appnet != '') {
				echo '<li><a href="'.esc_url( $appnet ).'" class="appnet" title="' . __( 'App.net', 'moka' ) . '">' . __( 'App.net', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($flickr != '') {
				echo '<li><a href="'.esc_url( $flickr ).'" class="flickr" title="' . __( 'Flickr', 'moka' ) . '">' . __( 'Flickr', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($instagram != '') {
				echo '<li><a href="'.esc_url( $instagram ).'" class="instagram" title="' . __( 'Instagram', 'moka' ) . '">' . __( 'Instagram', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($picasa != '') {
				echo '<li><a href="'.esc_url( $picasa ).'" class="picasa" title="' . __( 'Picasa', 'moka' ) . '">' . __( 'Picasa', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($fivehundredpx != '') {
				echo '<li><a href="'.esc_url( $fivehundredpx ).'" class="fivehundredpx" title="' . __( '500px', 'moka' ) . '">' . __( '500px', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($youtube != '') {
				echo '<li><a href="'.esc_url( $youtube ).'" class="youtube" title="' . __( 'YouTube', 'moka' ) . '">' . __( 'YouTube', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($vimeo != '') {
				echo '<li><a href="'.esc_url( $vimeo ).'" class="vimeo" title="' . __( 'Vimeo', 'moka' ) . '">' . __( 'Vimeo', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($dribbble != '') {
				echo '<li><a href="'.esc_url( $dribbble ).'" class="dribbble" title="' . __( 'Dribbble', 'moka' ) . '">' . __( 'Dribbble', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($ffffound != '') {
				echo '<li><a href="'.esc_url( $ffffound ).'" class="ffffound" title="' . __( 'Ffffound', 'moka' ) . '">' . __( 'Ffffound', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($pinterest != '') {
				echo '<li><a href="'.esc_url( $pinterest ).'" class="pinterest" title="' . __( 'Pinterest', 'moka' ) . '">' . __( 'Pinterest', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($behance != '') {
				echo '<li><a href="'.esc_url( $behance ).'" class="behance" title="' . __( 'Behance Network', 'moka' ) . '">' . __( 'Behance Network', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($deviantart != '') {
				echo '<li><a href="'.esc_url( $deviantart ).'" class="deviantart" title="' . __( 'deviantART', 'moka' ) . '">' . __( 'deviantART', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($squidoo != '') {
				echo '<li><a href="'.esc_url( $squidoo ).'" class="squidoo" title="' . __( 'Squidoo', 'moka' ) . '">' . __( 'Squidoo', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($slideshare != '') {
				echo '<li><a href="'.esc_url( $slideshare ).'" class="slideshare" title="' . __( 'Slideshare', 'moka' ) . '">' . __( 'Slideshare', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($lastfm != '') {
				echo '<li><a href="'.esc_url( $lastfm ).'" class="lastfm" title="' . __( 'Lastfm', 'moka' ) . '">' . __( 'Lastfm', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($grooveshark != '') {
				echo '<li><a href="'.esc_url( $grooveshark ).'" class="grooveshark" title="' . __( 'Grooveshark', 'moka' ) . '">' . __( 'Grooveshark', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($soundcloud != '') {
				echo '<li><a href="'.esc_url( $soundcloud ).'" class="soundcloud" title="' . __( 'Soundcloud', 'moka' ) . '">' . __( 'Soundcloud', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($foursquare != '') {
				echo '<li><a href="'.esc_url( $foursquare ).'" class="foursquare" title="' . __( 'Foursquare', 'moka' ) . '">' . __( 'Foursquare', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($github != '') {
				echo '<li><a href="'.esc_url( $github ).'" class="github" title="' . __( 'GitHub', 'moka' ) . '">' . __( 'GitHub', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($linkedin != '') {
				echo '<li><a href="'.esc_url( $linkedin ).'" class="linkedin" title="' . __( 'LinkedIn', 'moka' ) . '">' . __( 'LinkedIn', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($xing != '') {
				echo '<li><a href="'.esc_url( $xing ).'" class="xing" title="' . __( 'Xing', 'moka' ) . '">' . __( 'Xing', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($wordpress != '') {
				echo '<li><a href="'.esc_url( $wordpress ).'" class="wordpress" title="' . __( 'WordPress', 'moka' ) . '">' . __( 'WordPress', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($tumblr != '') {
				echo '<li><a href="'.esc_url( $tumblr ).'" class="tumblr" title="' . __( 'Tumblr', 'moka' ) . '">' . __( 'Tumblr', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($rss != '') {
				echo '<li><a href="'.$rss.'" class="rss" title="' . __( 'RSS Feed', 'moka' ) . '">' . __( 'RSS Feed', 'moka' ) . '</a></li>';
			}
			?>

			<?php if($rsscomments != '') {
				echo '<li><a href="'.$rsscomments.'" class="rsscomments" title="' . __( 'RSS Comments', 'moka' ) . '">' . __( 'RSS Comments', 'moka' ) . '</a></li>';
			}
			?>
		</ul><!-- end .sociallinks -->

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
		$title = esc_attr($instance['title']);
		$twitter = esc_attr($instance['twitter']);
		$facebook = esc_attr($instance['facebook']);
		$googleplus = esc_attr($instance['googleplus']);
		$appnet = esc_attr($instance['appnet']);
		$flickr = esc_attr($instance['flickr']);
		$instagram = esc_attr($instance['instagram']);
		$picasa = esc_attr($instance['picasa']);
		$fivehundredpx = esc_attr($instance['fivehundredpx']);
		$youtube = esc_attr($instance['youtube']);
		$vimeo = esc_attr($instance['vimeo']);
		$dribbble = esc_attr($instance['dribbble']);
		$ffffound = esc_attr($instance['ffffound']);
		$pinterest = esc_attr($instance['pinterest']);
		$behance = esc_attr($instance['behance']);
		$deviantart = esc_attr($instance['deviantart']);
		$squidoo = esc_attr($instance['squidoo']);
		$slideshare = esc_attr($instance['slideshare']);
		$lastfm = esc_attr($instance['lastfm']);
		$grooveshark = esc_attr($instance['grooveshark']);
		$soundcloud = esc_attr($instance['soundcloud']);
		$foursquare = esc_attr($instance['foursquare']);
		$github = esc_attr($instance['github']);
		$linkedin = esc_attr($instance['linkedin']);
		$xing = esc_attr($instance['xing']);
		$wordpress = esc_attr($instance['wordpress']);
		$tumblr = esc_attr($instance['tumblr']);
		$rss = esc_attr($instance['rss']);
		$rsscomments = esc_attr($instance['rsscomments']);

		?>

		 <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php _e('Google+ URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('googleplus'); ?>" value="<?php echo $googleplus; ?>" class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" />
        </p>

		  <p>
            <label for="<?php echo $this->get_field_id('appnet'); ?>"><?php _e('App.net URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('appnet'); ?>" value="<?php echo $appnet; ?>" class="widefat" id="<?php echo $this->get_field_id('appnet'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo $flickr; ?>" class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" />
        </p>

		 <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('picasa'); ?>"><?php _e('Picasa URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('picasa'); ?>" value="<?php echo $picasa; ?>" class="widefat" id="<?php echo $this->get_field_id('picasa'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('fivehundredpx'); ?>"><?php _e('500px URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('fivehundredpx'); ?>" value="<?php echo $fivehundredpx; ?>" class="widefat" id="<?php echo $this->get_field_id('fivehundredpx'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo $youtube; ?>" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('vimeo'); ?>" value="<?php echo $vimeo; ?>" class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php echo $dribbble; ?>" class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('ffffound'); ?>"><?php _e('Ffffound URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('ffffound'); ?>" value="<?php echo $ffffound; ?>" class="widefat" id="<?php echo $this->get_field_id('ffffound'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $pinterest; ?>" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('behance'); ?>"><?php _e('Behance Network URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('behance'); ?>" value="<?php echo $behance; ?>" class="widefat" id="<?php echo $this->get_field_id('behance'); ?>" />
        </p>

		 <p>
            <label for="<?php echo $this->get_field_id('deviantart'); ?>"><?php _e('deviantART URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('deviantart'); ?>" value="<?php echo $deviantart; ?>" class="widefat" id="<?php echo $this->get_field_id('deviantart'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('squidoo'); ?>"><?php _e('Squidoo URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('squidoo'); ?>" value="<?php echo $squidoo; ?>" class="widefat" id="<?php echo $this->get_field_id('squidoo'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('slideshare'); ?>"><?php _e('Slideshare URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('slideshare'); ?>" value="<?php echo $slideshare; ?>" class="widefat" id="<?php echo $this->get_field_id('slideshare'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('lastfm'); ?>"><?php _e('Last.fm URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('lastfm'); ?>" value="<?php echo $lastfm; ?>" class="widefat" id="<?php echo $this->get_field_id('lastfm'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('grooveshark'); ?>"><?php _e('Grooveshark URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('grooveshark'); ?>" value="<?php echo $grooveshark; ?>" class="widefat" id="<?php echo $this->get_field_id('grooveshark'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('soundcloud'); ?>"><?php _e('Soundcloud URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('soundcloud'); ?>" value="<?php echo $soundcloud; ?>" class="widefat" id="<?php echo $this->get_field_id('soundcloud'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('foursquare'); ?>"><?php _e('Foursquare URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('foursquare'); ?>" value="<?php echo $foursquare; ?>" class="widefat" id="<?php echo $this->get_field_id('foursquare'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('github'); ?>"><?php _e('GitHub URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('github'); ?>" value="<?php echo $github; ?>" class="widefat" id="<?php echo $this->get_field_id('github'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $linkedin; ?>" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('xing'); ?>"><?php _e('Xing URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('xing'); ?>" value="<?php echo $xing; ?>" class="widefat" id="<?php echo $this->get_field_id('xing'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('wordpress'); ?>"><?php _e('WordPress URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('wordpress'); ?>" value="<?php echo $wordpress; ?>" class="widefat" id="<?php echo $this->get_field_id('wordpress'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php _e('Tumblr URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('tumblr'); ?>" value="<?php echo $tumblr; ?>" class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS-Feed URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $rss; ?>" class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" />
        </p>

		<p>
            <label for="<?php echo $this->get_field_id('rsscomments'); ?>"><?php _e('RSS for Comments URL:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('rsscomments'); ?>" value="<?php echo $rsscomments; ?>" class="widefat" id="<?php echo $this->get_field_id('rsscomments'); ?>" />
        </p>

		<?php
	}
}

register_widget('moka_sociallinks');


/*-----------------------------------------------------------------------------------*/
/* Moka Recent Posts Widget
/*-----------------------------------------------------------------------------------*/

class moka_recentposts extends WP_Widget {
	
	public function __construct() {
		parent::__construct( 'moka_recentposts', __( 'Recent Posts by Category (Moka)', 'moka' ), array(
			'classname'   => 'widget_moka_recentposts',
			'description' => __( 'A number of Recent Posts filtered by category', 'moka' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$postnumber = $instance['postnumber'];
		$cat = apply_filters('widget_title', $instance['cat']);

		echo $before_widget; ?>
		<?php if($title != '')
			echo '<h3 class="rp-widget-title">' . $title.  '</h3>'; ?>

				<?php
				global $post;
				$moka_post = $post;

				// get the category IDs and the number of posts and place them in an array
				if($cat) {
					$args = array(
						'posts_per_page' => $postnumber,
						'cat' => $cat,
					);
				} else {
					$args = array(
						'posts_per_page' => $postnumber,
					);
				}

				$myposts = get_posts( $args );
				foreach( $myposts as $post ) : setup_postdata($post); ?>

				<div class="rp-wrap">
					<?php if ( '' != get_the_post_thumbnail() ) : ?>
						<div class="entry-thumbnail">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'moka' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div><!-- end .entry-thumbnail -->
					<?php endif; ?>

					<header class="entry-header">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'moka' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					</header><!--end .entry-header -->

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div><!-- end .entry-content -->

					<footer class="entry-footer clearfix">
						<div class="entry-date"><a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date('M d, y'); ?></a></div>
						<?php if ( comments_open() ) : ?>
						<div class="entry-comments">
							<?php comments_popup_link( '<span class="leave-reply">' . __( 'comment 0', 'moka' ) . '</span>', __( 'comment 1', 'moka' ), __( 'comments %', 'moka' ) ); ?>
						</div><!-- end .rp-entry-comments -->
						<?php endif; // comments_open() ?>
						<?php edit_post_link( __( 'Edit', 'moka' ), '<div class="entry-edit">', '</div>' ); ?>
					</footer><!-- end .entry-footer -->
				</div><!-- end .rp-wrap -->

					<?php endforeach; ?>
					<?php $post = $moka_post; ?>

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
   		$title = esc_attr($instance['title']);
   		$postnumber = esc_attr($instance['postnumber']);
		$cat = esc_attr($instance['cat']);
		?>

		 <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>

		 <p>
            <label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php _e('Number of posts, choose between 4, 8 or 12:','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('postnumber'); ?>" value="<?php echo $postnumber; ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category ID numbers (to choose which categories to include):','moka'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('cat'); ?>" value="<?php echo $cat; ?>" class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" />
        </p>

		<?php
	}
}

register_widget('moka_recentposts');


/*-----------------------------------------------------------------------------------*/
/* Include Moka Big Quote Widget
/*-----------------------------------------------------------------------------------*/

class moka_quote extends WP_Widget {
	
	public function __construct() {
		parent::__construct( 'moka_quote', __( 'Big Quote (Moka)', 'moka' ), array(
			'classname'   => 'widget_moka_quote',
			'description' => __( 'Widget to include a big quote or slogan on the Front Page (please use for Front Page Widget Area only).', 'moka' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$quotetext = $instance['quotetext'];
		$quoteauthor = $instance['quoteauthor'];

		echo $before_widget; ?>

			<p class="quote-text"><?php echo ( $quotetext ); ?></p>
			<?php if($quoteauthor != '') {
				echo '<p class="quote-author"> ' . ( $quoteauthor ) . ' </p>';
			}
			?>

	   <?php
	   echo $after_widget;

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();
	   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
		$quotetext = esc_attr($instance['quotetext']);
		$quoteauthor = esc_attr($instance['quoteauthor']);
		?>

		<p>
			<label for="<?php echo $this->get_field_id('quotetext'); ?>"><?php _e('Quote Text:','moka'); ?></label>
			<textarea name="<?php echo $this->get_field_name('quotetext'); ?>" class="widefat" rows="8" cols="12" id="<?php echo $this->get_field_id('quotetext'); ?>"><?php echo( $quotetext ); ?></textarea>
        </p>

         <p>
			 <label for="<?php echo $this->get_field_id('quoteauthor'); ?>"><?php _e('Quote Author:','moka'); ?></label>
			 <input type="text" name="<?php echo $this->get_field_name('quoteauthor'); ?>" value="<?php echo $quoteauthor; ?>" class="widefat" id="<?php echo $this->get_field_id('quoteauthor'); ?>" />
        </p>

		<?php
	}
}

register_widget('moka_quote');


/*-----------------------------------------------------------------------------------*/
/* Include Moka About Widget
/*-----------------------------------------------------------------------------------*/

class moka_about extends WP_Widget {
	
	public function __construct() {
		parent::__construct( 'moka_about', __( 'About (Moka)', 'moka' ), array(
			'classname'   => 'widget_moka_about',
			'description' => __( 'About widget to include a picture and intro text on the Front Page (please use for Front Page Widget Area only)', 'moka' ),
		) );
	}

	public function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$imageurl = $instance['imageurl'];
		$imagewidth = $instance['imagewidth'];
		$imageheight = $instance['imageheight'];
		$abouttext = $instance['abouttext'];
		$aboutlinks = $instance['aboutlinks'];

		echo $before_widget; ?>

			<div class="about-image">
				<img src="<?php echo $imageurl; ?>" width="<?php echo $imagewidth; ?>" height="<?php echo $imageheight; ?>" class="about-img">
			</div><!-- end .about-image -->
			<div class="about-info">
				<?php if($title != '') echo '<h3 class="about-title">'.$title.'</h3>'; ?>
				<p class="about-text"><?php echo $abouttext; ?></p>
				<p class="about-links"><?php echo $aboutlinks; ?></p>
			</div><!-- end .about-image -->


	   <?php
	   echo $after_widget;
   }

   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {
		$title = esc_attr($instance['title']);
		$imageurl = esc_attr($instance['imageurl']);
		$imagewidth = esc_attr($instance['imagewidth']);
		$imageheight = esc_attr($instance['imageheight']);
		$abouttext = esc_attr($instance['abouttext']);
		$aboutlinks = esc_attr($instance['aboutlinks']);
		?>

		 <p>
			 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','moka'); ?></label>
			 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>

		 <p>
			 <label for="<?php echo $this->get_field_id('imageurl'); ?>"><?php _e('Image URL:','moka'); ?></label>
			 <input type="text" name="<?php echo $this->get_field_name('imageurl'); ?>" value="<?php echo $imageurl; ?>" class="widefat" id="<?php echo $this->get_field_id('imageurl'); ?>" />
        </p>

		 <p>
			 <label for="<?php echo $this->get_field_id('imagewidth'); ?>"><?php _e('Image Width (e.g. 517):','moka'); ?></label>
			 <input type="text" name="<?php echo $this->get_field_name('imagewidth'); ?>" value="<?php echo $imagewidth; ?>" class="widefat" id="<?php echo $this->get_field_id('imagewidth'); ?>" />
        </p>

		 <p>
			 <label for="<?php echo $this->get_field_id('imageheight'); ?>"><?php _e('Image Height (e.g. 517):','moka'); ?></label>
			 <input type="text" name="<?php echo $this->get_field_name('imageheight'); ?>" value="<?php echo $imageheight; ?>" class="widefat" id="<?php echo $this->get_field_id('imageheight'); ?>" />
        </p>

		<p>
			<label for="<?php echo $this->get_field_id('abouttext'); ?>"><?php _e('About Text:','moka'); ?></label>
			<textarea name="<?php echo $this->get_field_name('abouttext'); ?>" class="widefat" rows="12" cols="20" id="<?php echo $this->get_field_id('abouttext'); ?>"><?php echo( $abouttext ); ?></textarea>
        </p>

         <p>
			 <label for="<?php echo $this->get_field_id('aboutlinks'); ?>"><?php _e('Additional Info / Links:','moka'); ?></label>
			 <input type="text" name="<?php echo $this->get_field_name('aboutlinks'); ?>" value="<?php echo $aboutlinks; ?>" class="widefat" id="<?php echo $this->get_field_id('aboutlinks'); ?>" />
        </p>

		<?php
	}
}

register_widget('moka_about');








