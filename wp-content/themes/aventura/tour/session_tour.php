<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( ! class_exists( 'Aventura_Session_Cart' ) ) {
	class Aventura_Session_Cart {
		public function __construct() {
			if ( empty( $_SESSION['cart'] ) ) $_SESSION['cart'] = array();
		}

		public static function aventura_set( $aventura_uid=0, $aventura_data ) {
			if ( empty( $aventura_uid ) );
			$_SESSION['cart'][$aventura_uid] = $aventura_data;
		}
		public static function aventura_get( $aventura_uid=0 ) {
			if ( ! empty( $_SESSION['cart'] ) && ! empty( $_SESSION['cart'][$aventura_uid] ) ) return $_SESSION['cart'][$aventura_uid];
			return false;
		}
		public static function aventura_unset( $aventura_uid=0 ) {
			if ( ! empty( $_SESSION['cart'] ) && ! empty( $_SESSION['cart'][$aventura_uid] ) ) {
				unset( $_SESSION['cart'][$aventura_uid] );
			}
		}
		public function aventura_get_field( $aventura_uid=0, $aventura_field='total_price' ) {
			$aventura_cart = $this->aventura_get( $aventura_uid );
			if ( $aventura_cart && ! empty( $aventura_cart[$aventura_field] ) ) return $aventura_cart[$aventura_field];
			return 0;
		}
	}
}