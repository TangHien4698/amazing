<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

global $aventura_options;
$aventura_shop_detail_sidebar = ((!isset($aventura_options['aventura_shop_detail_sidebar'])) || empty($aventura_options['aventura_shop_detail_sidebar'])) ? 'none' : $aventura_options['aventura_shop_detail_sidebar'];

$aventura_shop_detail_class = 'tz-shop-detail-wrapper';
if($aventura_shop_detail_sidebar == 'right'){
	$aventura_shop_detail_class .= ' tz-shop-detail-sidebar-right';
}elseif($aventura_shop_detail_sidebar == 'left'){
	$aventura_shop_detail_class .= ' tz-shop-detail-sidebar-left';
}else{
	$aventura_shop_detail_class .= ' tz-shop-detail-sidebar-none';
}

?>
<div class="<?php echo esc_attr($aventura_shop_detail_class);?>">
	<div class="container">

		<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
		?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
		?>

		<?php
		if($aventura_shop_detail_sidebar == 'right' || $aventura_shop_detail_sidebar == 'left') {
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action('woocommerce_sidebar');
		}
		?>

	</div>
</div>
<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
