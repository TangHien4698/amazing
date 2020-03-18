<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class aventura_WC_Widget_Cart extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_shopping_cart';
		$this->widget_description =  esc_html__( "Display the user's Cart in the sidebar.", 'aventura' );
		$this->widget_id          = 'woocommerce_widget_cart';
		$this->widget_name        =  esc_html__( 'WooCommerce Cart', 'aventura' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   =>  esc_html__( 'Cart', 'aventura' ),
				'label' =>  esc_html__( 'Title', 'aventura' )
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' =>  esc_html__( 'Hide if cart is empty', 'aventura' )
			)
		);

		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $aventura_args
	 * @param array $aventura_instance
	 */
	public function widget( $aventura_args, $aventura_instance ) {

		$aventura_hide_if_empty = empty( $aventura_instance['hide_if_empty'] ) ? 0 : 1;

		$this->widget_start( $aventura_args, $aventura_instance );

		if ( $aventura_hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		echo '<div class="widget_shopping_cart_content"></div>';

		if ( $aventura_hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $aventura_args );
	}
}
