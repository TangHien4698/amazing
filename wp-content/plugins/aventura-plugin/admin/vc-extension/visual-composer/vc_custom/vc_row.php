<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * @var $tz_row_type
 * @var $tz_gradient
 * @var $gradient_color_1
 * @var $gradient_color_2
 * @var $gradient_custom_color_1
 * @var $gradient_custom_color_2
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$uid = uniqid();
$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	'vc_row-gradient-' . $tz_gradient . $uid,
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

//if ( vc_shortcode_custom_css_has_property( $css, array(
//		'border',
//		'background',
//	) ) || $video_bg || $parallax
//) {
//	$css_classes[] = 'vc_row-has-fill';
//}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

if ( 'gradient' === $tz_gradient || 'gradient-custom' === $tz_gradient ) {
	$output .= '<div class="tz-gradient"></div>';
}

if( $tz_row_type == 'grid') {
	$output .= '<div class="container">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';
}else{
	$output .= wpb_js_remove_wpautop($content);
}

if ( 'gradient' === $tz_gradient || 'gradient-custom' === $tz_gradient ) {

	$tz_gradient_row_color_1 = '';
	$tz_gradient_row_color_2 = '';

	if('gradient' === $tz_gradient){
		$tz_gradient_row_color_1 = vc_convert_vc_color( $gradient_color_1 );
		$tz_gradient_row_color_2 = vc_convert_vc_color( $gradient_color_2 );
	}elseif( 'gradient-custom' === $tz_gradient ){
		$tz_gradient_row_color_1 = $gradient_custom_color_1;
		$tz_gradient_row_color_2 = $gradient_custom_color_2;
	}


	$gradient_css = array();
	$gradient_css[] = 'content: ""';
	$gradient_css[] = 'position: absolute';
	$gradient_css[] = 'top: 0';
	$gradient_css[] = 'left: 0';
	$gradient_css[] = 'width: 100%';
	$gradient_css[] = 'height: 100%';
	$gradient_css[] = 'opacity: 0.7';
	$gradient_css[] = 'border: none';
	$gradient_css[] = 'background-color: ' . $tz_gradient_row_color_1;
	$gradient_css[] = 'background-image: -webkit-linear-gradient(left, ' . $tz_gradient_row_color_1 . ' 0%, ' . $tz_gradient_row_color_2 . ' 50%,' . $tz_gradient_row_color_1 . ' 100%)';
	$gradient_css[] = 'background-image: linear-gradient(to right, ' . $tz_gradient_row_color_1 . ' 0%, ' . $tz_gradient_row_color_2 . ' 50%,' . $tz_gradient_row_color_1 . ' 100%)';
	$gradient_css[] = '-webkit-transition: all .2s ease-in-out';
	$gradient_css[] = 'transition: all .2s ease-in-out';
	$gradient_css[] = 'background-size: 200% 100%';


	echo '<style type="text/css">.vc_row-gradient-' . $tz_gradient . $uid . '{position: relative;} .vc_row-gradient-' . $tz_gradient . $uid . ' .tz-gradient::before{' . implode( ';', $gradient_css ) . ';' . '}</style>';
	$css_classes[] = 'vc_row-gradient-css-' . $uid;
	$attributes[] = 'data-vc-gradient-1="' . $tz_gradient_row_color_1 . '"';
	$attributes[] = 'data-vc-gradient-2="' . $tz_gradient_row_color_2 . '"';
}

$output .= '</div>';
$output .= $after_output;

echo $output;
