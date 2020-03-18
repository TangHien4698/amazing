<?php
/*
Plugin Name: TZ Instagram Widget
Description: A WordPress widget for showing your latest Instagram photos.
Version: 1.0
Author: templaza
Author URI: http://templaza.com
Text Domain: tz-instagram-widget
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/

function tziw_init() {

	// define some constants
	define( 'TZ_INSTAGRAM_WIDGET_JS_URL', plugins_url( '/assets/js', __FILE__ ) );
	define( 'TZ_INSTAGRAM_WIDGET_CSS_URL', plugins_url( '/assets/css', __FILE__ ) );
	define( 'TZ_INSTAGRAM_WIDGET_IMAGES_URL', plugins_url( '/assets/images', __FILE__ ) );
	define( 'TZ_INSTAGRAM_WIDGET_PATH', dirname( __FILE__ ) );
	define( 'TZ_INSTAGRAM_WIDGET_BASE', plugin_basename( __FILE__ ) );
	define( 'TZ_INSTAGRAM_WIDGET_FILE', __FILE__ );

	// load language files
	load_plugin_textdomain( 'wp-instagram-widget', false, dirname( TZ_INSTAGRAM_WIDGET_BASE ) . '/assets/languages/' );

}
add_action( 'init', 'tziw_init' );

function tz_iw_css_and_js() {

	wp_register_style('your_css', TZ_INSTAGRAM_WIDGET_CSS_URL.'/tz_iw_style.css');
	wp_enqueue_style('your_css');

}
add_action( 'wp_enqueue_scripts','tz_iw_css_and_js');


function tziw_widget() {
	register_widget( 'tz_instagram_widget' );
}
add_action( 'widgets_init', 'tziw_widget' );

class tz_instagram_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'tz-instagram-feed',
			__( 'TZ Instagram', 'tz-instagram-widget' ),
			array( 'classname' => 'tz-instagram-feed', 'description' => esc_html__( 'Displays your latest Instagram photos', 'tz-instagram-widget' ) )
		);
	}

	function widget( $args, $instance ) {

		$font_icon  = 	empty( $instance['font_icon'] ) ? '' : $instance['font_icon'];
		$title 		=	empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$layout 	=	empty( $instance['layout'] ) ? 'style1' : $instance['layout'];
		$username 	=	empty( $instance['username'] ) ? '' : $instance['username'];
		$limit 		=	empty( $instance['number'] ) ? 9 : $instance['number'];
		$size 		=	empty( $instance['size'] ) ? 'large' : $instance['size'];
		$target 	=	empty( $instance['target'] ) ? '_self' : $instance['target'];
		$link 		=	empty( $instance['link'] ) ? '' : $instance['link'];

		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			$tz_font_icon = '';
			if ( !empty( $font_icon ) ) :
				$tz_font_icon = '<i class="fa '.$font_icon.'"></i>';
			endif;
			echo $args['before_title'] . $tz_font_icon . wp_kses_post( $title ) . $args['after_title'];

		};

		do_action( 'wpiw_before_widget', $instance );

		if ( $username != '' ) {

			$media_array = $this->scrape_instagram( $username, $limit );

			if ( is_wp_error( $media_array ) ) {

				echo wp_kses_post( $media_array->get_error_message() );

			} else {

				// filter for images only?
				if ( $images_only = apply_filters( 'wpiw_images_only', FALSE ) )
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );

				// filters for custom classes
				$ulclass = apply_filters( 'wpiw_list_class', 'instagram-pics instagram-size-' . $size );
				$liclass = apply_filters( 'wpiw_item_class', '' );
				$aclass = apply_filters( 'wpiw_a_class', '' );
				$imgclass = apply_filters( 'wpiw_img_class', '' );

				if ( $layout == 'style1' ) :

			?>
					<ul class="<?php echo esc_attr( $ulclass ); ?>">

						<?php
							foreach ( $media_array as $item ) {
								// copy the else line into a new file (parts/tz-instagram-widget.php) within your theme and customise accordingly
								if ( locate_template( 'parts/wp-instagram-widget.php' ) != '' ) {
									include locate_template( 'parts/wp-instagram-widget.php' );
								} else {
									echo '<li class="'. esc_attr( $liclass ) .'"><a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"  class="'. esc_attr( $aclass ) .'"><img src="'. esc_url( $item[$size] ) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"  class="'. esc_attr( $imgclass ) .'"/></a></li>';
								}
							}
						?>

					</ul>

				<?php else: ?>

				<div class="tz-instagram-content">

					<?php $count = 1; $total = count( $media_array ); foreach ( $media_array as $item ) : ?>

					<?php if ( $count==1 ) { $j=1;?>

					<div class="tz-instagram-footer">
						<div class="tz-instagram-footer-0">
							<div class="tz-featured-thumb">

								<?php

								// copy the else line into a new file (parts/wp-instagram-widget.php) within your theme and customise accordingly
								if ( locate_template( 'parts/wp-instagram-widget.php' ) != '' ) {
									get_template_part( 'parts/wp-instagram-widget' );
								} else {
									echo '<a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"><img src="'. esc_url( $item[$size] ) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"/></a>';
								}

								?>

							</div>
						</div>
						<?php } ?>

						<?php if($count%3==1 & $count>3) { $j=1; ?>

						<div class="tz-instagram-footer">
							<div class="tz-instagram-footer-0">
								<div class="tz-featured-thumb">

									<?php

									// copy the else line into a new file (parts/wp-instagram-widget.php) within your theme and customise accordingly
									if ( locate_template( 'parts/wp-instagram-widget.php' ) != '' ) {
										get_template_part( 'parts/wp-instagram-widget' );
									} else {
										echo '<a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"><img src="'. esc_url( $item[$size] ) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"/></a>';
									}

									?>

								</div>
							</div>
							<?php } elseif( $count!=1 ) { ?>
								<div class="tz-instagram-footer-<?php echo ($j);?>">
									<div class="tz-featured-thumb">

										<?php

										// copy the else line into a new file (parts/wp-instagram-widget.php) within your theme and customise accordingly
										if ( locate_template( 'parts/wp-instagram-widget.php' ) != '' ) {
											get_template_part( 'parts/wp-instagram-widget' );
										} else {
											echo '<a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"><img src="'. esc_url( $item[$size] ) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"/></a>';
										}

										?>

									</div>
								</div>

								<?php $j++; } if($count%3==0 || $count==$total){ ?>

						</div>

					<?php } $count++; ?>

					<?php endforeach; ?>

				</div>

			<?php

				endif;
			}
		}

		$linkclass = apply_filters( 'wpiw_link_class', 'clear' );

		if ( $link != '' ) {
			?><p class="<?php echo esc_attr( $linkclass ); ?>"><a href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>"><?php echo wp_kses_post( $link ); ?></a></p><?php
		}

		do_action( 'wpiw_after_widget', $instance );

		echo $args['after_widget'];
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
				'font_icon' =>  'fa-camera-retro',
				'title' 	=>	esc_html__( 'Instagram', 'tz-instagram-widget' ),
				'layout'	=>	'style1',
				'username' 	=>	'',
				'size' 		=>	'large',
				'link' 		=>	esc_html__( 'Follow Me!', 'tz-instagram-widget' ),
				'number' 	=>	9,
				'target' 	=>	'_self'
			)
		);

		$font_icon  = 	$instance['font_icon'];
		$title 		=	$instance['title'];
		$layout 	=	$instance['layout'];
		$username 	=	$instance['username'];
		$number 	=	absint( $instance['number'] );
		$size 		=	$instance['size'];
		$target 	=	$instance['target'];
		$link 		=	$instance['link'];

		?>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'font_icon' ) ); ?>"><?php esc_html_e( 'Font icon', 'tz-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'font_icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'font_icon' ) ); ?>" type="text" value="<?php echo esc_attr( $font_icon ); ?>" /></label></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'tz-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Choose style', 'tz-instagram-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" class="widefat">
				<option value="style1" <?php selected( 'style1', $layout ) ?>><?php esc_html_e( 'Sidebar', 'tz-instagram-widget' ); ?></option>
				<option value="style2" <?php selected( 'style2', $layout ) ?>><?php esc_html_e( 'Sidebar Footer', 'tz-instagram-widget' ); ?></option>
			</select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( '@username or #tag:', 'tz-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" /></label></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'tz-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" /></label></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'tz-instagram-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
				<option value="thumbnail" <?php selected( 'thumbnail', $size ) ?>><?php esc_html_e( 'Thumbnail', 'tz-instagram-widget' ); ?></option>
				<option value="small" <?php selected( 'small', $size ) ?>><?php esc_html_e( 'Small', 'tz-instagram-widget' ); ?></option>
				<option value="large" <?php selected( 'large', $size ) ?>><?php esc_html_e( 'Large', 'tz-instagram-widget' ); ?></option>
				<option value="original" <?php selected( 'original', $size ) ?>><?php esc_html_e( 'Original', 'tz-instagram-widget' ); ?></option>
			</select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php esc_html_e( 'Open links in', 'tz-instagram-widget' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" class="widefat">
				<option value="_self" <?php selected( '_self', $target ) ?>><?php esc_html_e( 'Current window (_self)', 'tz-instagram-widget' ); ?></option>
				<option value="_blank" <?php selected( '_blank', $target ) ?>><?php esc_html_e( 'New window (_blank)', 'tz-instagram-widget' ); ?></option>
			</select>
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link text', 'tz-instagram-widget' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" /></label></p>

		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance	= 	$old_instance;

		$instance['font_icon']  = 	strip_tags( $new_instance['font_icon'] );
		$instance['title']		=	strip_tags( $new_instance['title'] );
		$instance['layout']		=	( ( $new_instance['layout'] == 'style1' || $new_instance['layout'] == 'style2' ) ? $new_instance['layout'] : 'style1' );
		$instance['username']	= 	trim( strip_tags( $new_instance['username'] ) );
		$instance['number'] 	= 	! absint( $new_instance['number'] ) ? 9 : $new_instance['number'];
		$instance['size'] 		= 	( ( $new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'large' || $new_instance['size'] == 'small' || $new_instance['size'] == 'original' ) ? $new_instance['size'] : 'large' );
		$instance['target'] 	= 	( ( $new_instance['target'] == '_self' || $new_instance['target'] == '_blank' ) ? $new_instance['target'] : '_self' );
		$instance['link'] 		= 	strip_tags( $new_instance['link'] );
		return $instance;
	}

	// based on https://gist.github.com/cosmocatalano/4544576
//	function scrape_instagram( $username, $slice = 9 ) {
//
//		$username = strtolower( $username );
//		$username = str_replace( '@', '', $username );
//
//		if ( false === ( $instagram = get_transient( 'instagram-a1-'.sanitize_title_with_dashes( $username ) ) ) ) {
//
//			$remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );
//
//			if ( is_wp_error( $remote ) )
//				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'tz-instagram-widget' ) );
//
//			if ( 200 != wp_remote_retrieve_response_code( $remote ) )
//				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'tz-instagram-widget' ) );
//
//			$shards = explode( 'window._sharedData = ', $remote['body'] );
//			$insta_json = explode( ';</script>', $shards[1] );
//			$insta_array = json_decode( $insta_json[0], TRUE );
//
//			if ( ! $insta_array )
//				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'tz-instagram-widget' ) );
//
//			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
//				$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
//			} else {
//				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'tz-instagram-widget' ) );
//			}
//
//			if ( ! is_array( $images ) )
//				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'tz-instagram-widget' ) );
//
//			$instagram = array();
//
//			foreach ( $images as $image ) {
//
//				$image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['thumbnail_src'] );
//				$image['display_src'] = preg_replace( '/^https?\:/i', '', $image['display_src'] );
//
//				// handle both types of CDN url
//				if ( (strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
//					$image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
//					$image['small'] = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
//				} else {
//					$urlparts = parse_url( $image['thumbnail_src'] );
//					$pathparts = explode( '/', $urlparts['path'] );
//					if ( ! preg_match('/s\d+x\d+/', $pathparts[3]) ) {
//						array_splice($pathparts, 3, 0, '');
//					}
//
//					$pathparts[3] = 's160x160';
//					$image['thumbnail'] = '//' . $urlparts['host'] . implode('/', $pathparts);
//					$pathparts[3] = 's320x320';
//					$image['small'] = '//' . $urlparts['host'] . implode('/', $pathparts);
//				}
//
//				$image['large'] = $image['thumbnail_src'];
//
//				if ( $image['is_video'] == true ) {
//					$type = 'video';
//				} else {
//					$type = 'image';
//				}
//
//				$caption = __( 'Instagram Image', 'tz-instagram-widget' );
//				if ( ! empty( $image['caption'] ) ) {
//					$caption = $image['caption'];
//				}
//
//				$instagram[] = array(
//					'description'   => $caption,
//					'link'		  	=> '//instagram.com/p/' . $image['code'],
//					'time'		  	=> $image['date'],
//					'comments'	  	=> $image['comments']['count'],
//					'likes'		 	=> $image['likes']['count'],
//					'thumbnail'	 	=> $image['thumbnail'],
//					'small'			=> $image['small'],
//					'large'			=> $image['large'],
//					'original'		=> $image['display_src'],
//					'type'		  	=> $type
//				);
//			}
//
//			// do not set an empty transient - should help catch private or empty accounts
//			if ( ! empty( $instagram ) ) {
//				$instagram = base64_encode( serialize( $instagram ) );
//				set_transient( 'instagram-a1-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
//			}
//		}
//
//		if ( ! empty( $instagram ) ) {
//
//			$instagram = unserialize( base64_decode( $instagram ) );
//			return array_slice( $instagram, 0, $slice );
//
//		} else {
//
//			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'tz-instagram-widget' ) );
//
//		}
//	}

function scrape_instagram( $username ) {

		$username = trim( strtolower( $username ) );

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
				$transient_prefix = 'h';
				break;

			default:
				$url              = 'https://instagram.com/' . str_replace( '@', '', $username );
				$transient_prefix = 'u';
				break;
		}

		if ( false === ( $instagram = get_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {

			$remote = wp_remote_get( $url );

			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'wp-instagram-widget' ) );
			}

			if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'wp-instagram-widget' ) );
			}

			$shards      = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json  = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], true );

			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'wp-instagram-widget' ) );
			}

			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
			} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'wp-instagram-widget' ) );
			}

			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'wp-instagram-widget' ) );
			}

			$instagram = array();

			foreach ( $images as $image ) {
				if ( true === $image['node']['is_video'] ) {
					$type = 'video';
				} else {
					$type = 'image';
				}

				$caption = __( 'Instagram Image', 'wp-instagram-widget' );
				if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
					$caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
				}

				$instagram[] = array(
					'description' => $caption,
					'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
					'time'        => $image['node']['taken_at_timestamp'],
					'comments'    => $image['node']['edge_media_to_comment']['count'],
					'likes'       => $image['node']['edge_liked_by']['count'],
					'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
					'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
					'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
					'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
					'type'        => $type,
				);
			} // End foreach().

			// do not set an empty transient - should help catch private or empty accounts.
			if ( ! empty( $instagram ) ) {
				$instagram = base64_encode( serialize( $instagram ) );
				set_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
			}
		}

		if ( ! empty( $instagram ) ) {

			return unserialize( base64_decode( $instagram ) );

		} else {

			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'wp-instagram-widget' ) );

		}
	}

	function images_only( $media_item ) {

		if ( $media_item['type'] == 'image' )
			return true;

		return false;
	}
}
