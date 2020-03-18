<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( ! class_exists( 'Aventura_Tour_Order' ) ) {
    class Aventura_Tour_Order {
        public $order_id = '';
        public $service_data;
        public function __construct() {
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }
        public function __construct1( $order_id ) {
            $this->order_id = $order_id;
        }

        public function __construct2( $booking_no, $pin_code ) {
            $this->order_id = $this->aventura_get_order_id( $booking_no, $pin_code );
        }


        public static function aventura_get_order_id( $booking_no, $pin_code ) {
            global $wpdb;
            $order_id = $wpdb->get_var( $wpdb->prepare('SELECT aventura_order.id FROM ' . $wpdb->prefix . 'aventura_order AS aventura_order WHERE aventura_order.booking_no="' . esc_sql( $booking_no ) . '" AND aventura_order.pin_code="' . esc_sql( $pin_code ) . '"',"foo") );
            if ( empty( $order_id ) ) return false;
            return $order_id;
        }

        public function aventura_get_order_info() {
            global $wpdb;
            if ( empty( $this->order_id ) ) return false;
            $order_data = $wpdb->get_row( 'SELECT aventura_order.* FROM ' . $wpdb->prefix . 'aventura_order AS aventura_order WHERE aventura_order.id="' . esc_sql( $this->order_id ) . '"', ARRAY_A );
            if ( empty( $order_data ) ) return false;
            return $order_data;
        }

        public function aventura_get_tours() {
            global $wpdb;
            if ( empty( $this->order_id ) ) return false;
            $tour_data = $wpdb->get_row( 'SELECT aventura_bookings.* FROM ' . $wpdb->prefix . 'aventura_order AS aventura_order
											INNER JOIN ' . $wpdb->prefix . 'aventura_tour_bookings AS aventura_bookings ON aventura_bookings.order_id = aventura_order.id
											WHERE aventura_order.id="' . esc_sql( $this->order_id ) . '"', ARRAY_A );
            if ( empty( $tour_data ) ) return false;
            return $tour_data;
        }
    }
}