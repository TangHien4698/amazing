<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * functions to manage order
 */
if ( ! class_exists( 'Aventura_Tour_Order_List_Table') ) :
    class Aventura_Tour_Order_List_Table extends WP_List_Table {

        function __construct() {
            global $status, $page;
            parent::__construct( array(
                'singular'  => '_order',     //singular name of the listed records
                'plural'    => 'tour_orders',    //plural name of the listed records
                'ajax'      => false        //does this table support ajax?
            ) );
        }

        function column_default( $aventura_item, $aventura_column_name ) {
            switch( $aventura_column_name ) {
                case 'id':
                case 'created':
                case 'total_price':
                    return $aventura_item[ $aventura_column_name ];
                default:
                    return print_r( $aventura_item, true ); //Show the whole array for troubleshooting purposes
            }
        }

        function column_time( $aventura_item ) {
            if ( empty( $aventura_item['time'] ) || '00:00:00' == $aventura_item['time'] ) return '';
            return $aventura_item['time'];
        }

        function column_date( $aventura_item ) {
            if ( empty( $aventura_item['date_from'] ) || '0000-00-00' == $aventura_item['date_from'] ) return '';
            return $aventura_item['date_from'];
        }

        function column_customer_name( $aventura_item ) {
            //Build row actions
            $aventura_link_pattern = 'edit.php?post_type=%1s&page=%2$s&action=%3$s&order_id=%4$s';
            $aventura_actions = array(
                'edit'      => '<a href="' . esc_url( sprintf( $aventura_link_pattern, sanitize_text_field( $_REQUEST['post_type'] ), 'tour_orders', 'edit', $aventura_item['id'] ) ) . '">Edit</a>',
                'delete'    => '<a href="' . esc_url( sprintf( $aventura_link_pattern, sanitize_text_field( $_REQUEST['post_type'] ), 'tour_orders', 'delete', $aventura_item['id'] . '&_wpnonce=' . wp_create_nonce( 'order_delete' ) ) ) . '">Delete</a>',
            );
            $aventura_content = '<a href="' . esc_url( sprintf( $aventura_link_pattern, sanitize_text_field( $_REQUEST['post_type'] ), 'tour_orders', 'edit', $aventura_item['id'] ) ) . '">' . esc_html( $aventura_item['first_name'] . ' ' . $aventura_item['last_name'] ) . '</a>';
            //Return the title contents
            return sprintf( '%1$s %2$s', $aventura_content , $this->row_actions( $aventura_actions ) );
        }

        function column_tour_name( $aventura_item ) {
            return '<a href="' . esc_url( get_edit_post_link( $aventura_item['post_id'] ) ) . '">' . esc_html( $aventura_item['tour_name'] ) . '</a>';
        }

        function column_status( $aventura_item ) {
            switch( $aventura_item['status'] ) {
                case 'pending':
                    return esc_html__( 'Pending', 'aventura' );
                case 'new':
                    return esc_html__( 'New', 'aventura' );
                case 'confirmed':
                    return esc_html__( 'Confirmed', 'aventura' );
                case 'cancelled':
                    return esc_html__( 'Cancelled', 'aventura' );
            }
            return $aventura_item['status'];
        }

        function column_cb( $aventura_item ) {
            return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], $aventura_item['id'] );
        }

        function get_columns() {
            $aventura_columns = array(
                'cb'                => '<input type="checkbox" />', //Render a checkbox instead of text
                'id'                => esc_html__( 'ID', 'aventura' ),
                'customer_name'     => esc_html__( 'Customer Name', 'aventura' ),
                'time'         => esc_html__( 'Time', 'aventura' ),
                'date'         => esc_html__( 'Date', 'aventura' ),
                'tour_name'=> esc_html__( 'Tour Name', 'aventura' ),
                'total_price'       => esc_html__( 'Price', 'aventura' ),
                'created'           => esc_html__( 'Created Date', 'aventura' ),
                'status'            => esc_html__( 'Status', 'aventura' ),
            );
            return $aventura_columns;
        }

        function get_sortable_columns() {
            $aventura_sortable_columns = array(
                'id'           => array( 'id', false ),
                'time'    => array( 'time', false ),
                'date'    => array( 'date', false ),
                'tour_name'    => array( 'tour_name', false ),
                'status'       => array( 'status', false ),
            );
            return $aventura_sortable_columns;
        }

        function get_bulk_actions() {
            $aventura_actions = array(
                'bulk_delete'    => 'Delete',
                'bulk_mark_new'    => 'Mark as New',
                'bulk_mark_confirmed'    => 'Mark as Confirmed',
                'bulk_mark_cancelled'    => 'Mark as Cancelled',
            );
            return $aventura_actions;
        }

        function process_bulk_action() {
            global $wpdb;
            //Detect when a bulk action is being triggered...

            if ( isset( $_POST['_wpnonce'] ) && ! empty( $_POST['_wpnonce'] ) ) {

                $aventura_nonce  = filter_input( INPUT_POST, '_wpnonce', FILTER_SANITIZE_STRING );
                $aventura_action = 'bulk-' . $this->_args['plural'];

                if ( ! wp_verify_nonce( $aventura_nonce, $aventura_action ) )
                    wp_die( 'Sorry, your nonce did not verify' );
            }

            if ( 'bulk_delete'===$this->current_action() ) {
                $aventura_selected_ids = $_GET[ $this->_args['singular'] ];
                $aventura_how_many = count($aventura_selected_ids);
                $aventura_placeholders = array_fill(0, $aventura_how_many, '%d');
                $aventura_format = implode(', ', $aventura_placeholders);

                $aventura_current_user_id = get_current_user_id();
                $aventura_post_table_name  = esc_sql( $wpdb->prefix . 'posts' );
                $aventura_sql = '';

                if ( current_user_can( 'manage_options' ) ) {
                    $aventura_sql = sprintf( 'DELETE aventura_order, aventura_bookings FROM %1$s AS aventura_order
				LEFT JOIN %2$s AS aventura_bookings ON aventura_order.id = aventura_bookings.order_id
				WHERE aventura_order.id IN (%3$s)', $wpdb->prefix . 'aventura_order', $wpdb->prefix . 'aventura_tour_bookings', "$aventura_format" );
                } else {
                    $aventura_sql = sprintf( 'DELETE aventura_order, aventura_bookings FROM %1$s AS aventura_order
				LEFT JOIN %2$s AS aventura_bookings ON aventura_order.id = aventura_bookings.order_id
				INNER JOIN %4$s as tour ON aventura_order.post_id=tour.ID
				WHERE aventura_order.id IN (%3$s) AND tour.post_author = %5$d', $wpdb->prefix . 'aventura_order', $wpdb->prefix . 'aventura_tour_bookings', "$aventura_format", $aventura_post_table_name, $aventura_current_user_id );
                }

                $wpdb->query( $wpdb->prepare( $aventura_sql, $aventura_selected_ids ) );
                // wp_redirect( admin_url( 'edit.php?post_type=tour&page=tour_orders&bulk_delete=true&items=' . $aventura_how_many) );
            } elseif ( 'bulk_mark_new'===$this->current_action() || 'bulk_mark_confirmed'===$this->current_action() || 'bulk_mark_cancelled'===$this->current_action() ) {
                $aventura_selected_ids = $_GET[ $this->_args['singular'] ];
                $aventura_how_many = count($aventura_selected_ids);
                $aventura_placeholders = array_fill(0, $aventura_how_many, '%d');
                $aventura_format = implode(', ', $aventura_placeholders);
                $aventura_current_user_id = get_current_user_id();
                $aventura_post_table_name  = esc_sql( $wpdb->prefix . 'posts' );
                $aventura_sql = '';
                switch( $this->current_action() ) {
                    case 'bulk_mark_new':
                        $aventura_status = 'new';
                        break;
                    case 'bulk_mark_confirmed':
                        $aventura_status = 'confirmed';
                        break;
                    case 'bulk_mark_cancelled':
                        $aventura_status = 'cancelled';
                        break;
                }
                if ( current_user_can( 'manage_options' ) ) {
                    $aventura_sql = sprintf( 'UPDATE %1$s AS aventura_order
				SET aventura_order.status="%2$s"
				WHERE aventura_order.id IN (%3$s)', $wpdb->prefix . 'aventura_order', $aventura_status, "$aventura_format" );
                } else {
                    $aventura_sql = sprintf( 'UPDATE %1$s AS aventura_order
				INNER JOIN %4$s as tour ON aventura_order.post_id=tour.ID
				SET aventura_order.status="%2$s"
				WHERE aventura_order.id IN (%3$s) AND tour.post_author = %5$d', $wpdb->prefix . 'aventura_order', $aventura_status, "$aventura_format", $aventura_post_table_name, $aventura_current_user_id );
                }
                $wpdb->query( $wpdb->prepare( $aventura_sql, $aventura_selected_ids ) );
                wp_redirect( admin_url( 'edit.php?post_type=tour&page=tour_orders&bulk_update=true&items=' . $aventura_how_many) );
            }
        }

        function prepare_items() {
            global $wpdb;
            $aventura_per_page = 10;
            $aventura_columns = $this->get_columns();
            $aventura_hidden = array();
            $aventura_sortable = $this->get_sortable_columns();

            $this->_column_headers = array( $aventura_columns, $aventura_hidden, $aventura_sortable );
            $this->process_bulk_action();

            $aventura_orderby = ( ! empty( $_REQUEST['orderby'] ) ) ? sanitize_sql_orderby( $_REQUEST['orderby'] ) : 'id'; //If no sort, default to title
            $aventura_order = ( ! empty( $_REQUEST['order'] ) ) ? sanitize_text_field( $_REQUEST['order'] ) : 'desc'; //If no order, default to desc
            $aventura_current_page = $this->get_pagenum();
            $aventura_post_table_name  = esc_sql( $wpdb->prefix . 'posts' );

            $aventura_where = "1=1";
            $aventura_where .= " AND aventura_order.post_type='tour'";
            if ( ! empty( $_REQUEST['post_id'] ) ) $aventura_where .= " AND aventura_order.post_id = '" . esc_sql( $_REQUEST['post_id'] ) . "'";
            if ( ! empty( $_REQUEST['date'] ) ) $aventura_where .= " AND aventura_order.date_from = '" . esc_sql( $_REQUEST['date'] ) . "'";
            if ( ! empty( $_REQUEST['booking_no'] ) ) $aventura_where .= " AND aventura_order.booking_no = '" . esc_sql( $_REQUEST['booking_no'] ) . "'";
            if ( isset( $_REQUEST['status'] ) ) $aventura_where .= " AND aventura_order.status = '" . esc_sql( $_REQUEST['status'] ) . "'";
            if ( ! current_user_can( 'manage_options' ) ) { $aventura_where .= " AND tour.post_author = '" . get_current_user_id() . "' "; }

            $aventura_sql = $wpdb->prepare( 'SELECT aventura_order.*, tour.ID as post_id, tour.post_title as tour_name FROM %1$s as aventura_order
						INNER JOIN %2$s as tour ON aventura_order.post_id=tour.ID
						WHERE ' . $aventura_where . ' ORDER BY %3$s %4$s
						LIMIT %5$s, %6$s' , $wpdb->prefix . 'aventura_order', $aventura_post_table_name, $aventura_orderby, $aventura_order, $aventura_per_page * ( $aventura_current_page - 1 ), $aventura_per_page );
            $aventura_data = $wpdb->get_results( $aventura_sql, ARRAY_A );

            $aventura_sql = sprintf( 'SELECT COUNT(*) FROM %1$s as aventura_order INNER JOIN %2$s as tour ON aventura_order.post_id=tour.ID WHERE %3$s' , $wpdb->prefix . 'aventura_order', $aventura_post_table_name, $aventura_where );
            $aventura_total_items = $wpdb->get_var( $aventura_sql );

            $this->items = $aventura_data;
            $this->set_pagination_args( array(
                'total_items' => $aventura_total_items,                  //WE have to calculate the total number of items
                'per_page'    => $aventura_per_page,                     //WE have to determine how many items to show on a page
                'total_pages' => ceil( $aventura_total_items/$aventura_per_page )   //WE have to calculate the total number of pages
            ) );
        }
    }
endif;

/*
 * add order list page to menu
 */
if ( ! function_exists( 'aventura_tour_order_add_menu_items' ) ) {
    function aventura_tour_order_add_menu_items() {
        //add tour orders list page
        $aventura_page = add_submenu_page( 'edit.php?post_type=tour', 'Tour Orders', 'Orders', 'manage_options', 'tour_orders', 'aventura_tour_order_render_pages' );
        add_action( 'admin_print_scripts-' . $aventura_page, 'aventura_tour_order_admin_enqueue_scripts' );
    }
}

/*
 * order admin main actions
 */
if ( ! function_exists( 'aventura_tour_order_render_pages' ) ) {
    function aventura_tour_order_render_pages() {
        if ( ( ! empty( $_REQUEST['action'] ) ) && ( ( 'add' == $_REQUEST['action'] ) || ( 'edit' == $_REQUEST['action'] ) ) ) {
            aventura_tour_order_render_manage_page();
        } elseif ( ( ! empty( $_REQUEST['action'] ) ) && ( 'delete' == $_REQUEST['action'] ) ) {
            aventura_tour_order_delete_action();
        } else {
            aventura_tour_order_render_list_page();
        }
    }
}

/*
 * render order list page
 */
if ( ! function_exists( 'aventura_tour_order_render_list_page' ) ) {
    function aventura_tour_order_render_list_page() {
        global $wpdb;
        $aventura_order_table = new Aventura_Tour_Order_List_Table();
        $aventura_order_table->prepare_items();

        ?>

        <div class="wrap">

            <h2><?php echo esc_html__('Tour Orders','aventura') ?> <a href="edit.php?post_type=tour&amp;page=tour_orders&amp;action=add" class="add-new-h2"><?php echo esc_html__('Add New','aventura') ?></a></h2>
            <?php if ( isset( $_REQUEST['bulk_delete'] ) && isset( $_REQUEST['items'] ) ) echo '<div id="message" class="updated below-h2"><p>' . esc_html( sprintf( esc_html__( '%d orders deleted', 'aventura' ), $_REQUEST['items'] ) ) . '</p></div>'?>
            <?php if ( isset( $_REQUEST['bulk_update'] ) && isset( $_REQUEST['items'] ) ) echo '<div id="message" class="updated below-h2"><p>' . esc_html( sprintf( esc_html__( '%d orders updated', 'aventura' ), $_REQUEST['items'] ) ) . '</p></div>'?>
            <select id="tour_filter">
                <option></option>
                <?php
                $aventura_args = array(
                    'post_type'         => 'tour',
                    'posts_per_page'    => -1,
                    'orderby'           => 'title',
                    'order'             => 'ASC'
                );
                if ( ! current_user_can( 'manage_options' ) ) {
                    $aventura_args['author'] = get_current_user_id();
                }
                $aventura_tour_query = new WP_Query( $aventura_args );

                if ( $aventura_tour_query->have_posts() ) {
                    while ( $aventura_tour_query->have_posts() ) {
                        $aventura_tour_query->the_post();
                        $aventura_selected = '';
                        $aventura_id = $aventura_tour_query->post->ID;
                        if ( ! empty( $_REQUEST['post_id'] ) && ( $_REQUEST['post_id'] == $aventura_id ) ) $aventura_selected = ' selected ';
                        echo '<option ' . esc_attr( $aventura_selected ) . 'value="' . esc_attr( $aventura_id ) .'">' . wp_kses_post( get_the_title( $aventura_id ) ) . '</option>';
                    }
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
            </select>
            <input type="text" id="date_filter" name="date" placeholder="<?php echo esc_html__( 'Filter by Date', 'aventura' ) ?>" value="<?php if ( ! empty( $_REQUEST['date'] ) ) echo esc_attr( $_REQUEST['date'] ); ?>">
            <input type="text" id="booking_no_filter" name="booking_no" placeholder="<?php echo esc_html__( 'Filter by Booking No', 'aventura' ) ?>" value="<?php if ( ! empty( $_REQUEST['booking_no'] ) ) echo esc_attr( $_REQUEST['booking_no'] ); ?>">
            <select name="status" id="status_filter">
                <option value=""><?php echo esc_html__( 'select a status', 'aventura' ) ?></option>
                <?php
                $aventura_statuses = array( 'new' => esc_html__( 'New', 'aventura' ), 'confirmed' => esc_html__( 'Confirmed', 'aventura' ), 'cancelled' => esc_html__( 'Cancelled', 'aventura' ), 'pending' => esc_html__( 'Pending', 'aventura' ) );
                foreach( $aventura_statuses as $aventura_key=>$aventura_status ) { ?>
                    <option value="<?php echo esc_attr( $aventura_key ) ?>" <?php selected( $aventura_key, isset( $_REQUEST['status'] ) ? esc_attr( $_REQUEST['status'] ) : '' ); ?>><?php echo esc_attr( $aventura_status ) ?></option>
                <?php } ?>
            </select>
            <input type="button" name="order_filter" id="tour-order-filter" class="button" value="Filter">
            <a href="edit.php?post_type=tour&amp;page=tour_orders" class="button-secondary"><?php echo esc_html__( 'Show All', 'aventura' ) ?></a>
            <form id="accomo-orders-filter" method="get">
                <input type="hidden" name="post_type" value="<?php echo esc_attr( $_REQUEST['post_type'] ) ?>" />
                <input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ) ?>" />
                <?php $aventura_order_table->display() ?>
            </form>

        </div>
        <style>#date_filter, #date_to_filter {width:150px;}</style>
        <?php
    }
}

/*
 * render order detail page
 */
if ( ! function_exists( 'aventura_tour_order_render_manage_page' ) ) {
    function aventura_tour_order_render_manage_page() {
        global $wpdb, $aventura_options;
        if ( ! empty( $_POST['save'] ) ) {
            aventura_tour_order_save_action();
            return;
        }

        $aventura_order_data = array();
        $aventura_tour_data = array();

        if ( 'edit' == $_REQUEST['action'] ) {

            if ( empty( $_REQUEST['order_id'] ) ) {
                echo "<h2>" . esc_html__( "You attempted to edit an item that doesn't exist. Perhaps it was deleted?" , "aventura" ) . "</h2>";
                return;
            }

            $aventura_order_id = $_REQUEST['order_id'];
            $aventura_post_table_name = $wpdb->prefix . 'posts';

            $aventura_order = new Aventura_Tour_Order( $aventura_order_id );
            $aventura_order_data = $aventura_order->aventura_get_order_info();
            $aventura_tour_data = $aventura_order->aventura_get_tours();

            if ( empty( $aventura_order_data ) ) {
                echo "<h2>" . esc_html__( "You attempted to edit an item that doesn't exist. Perhaps it was deleted?" , "aventura" ) . "</h2>";
                return;
            }
        }

        $aventura_default_order_data = aventura_order_default_order_data();
        $aventura_order_data = array_replace( $aventura_default_order_data , $aventura_order_data );
        $aventura_site_currency_symbol = ((!isset($aventura_options['aventura_currency_options'])) || empty($aventura_options['aventura_currency_options'])) ? 'USD' : $aventura_options['aventura_currency_options'];;

        ?>

        <div class="wrap">
            <?php $aventura_page_title = ( 'edit' == $_REQUEST['action'] ) ? esc_html__('Edit Tour Order','aventura'). '<a href="edit.php?post_type=tour&amp;page=tour_orders&amp;action=add" class="add-new-h2">'. esc_html__('Add New','aventura') .'</a>' : esc_html__('Add New Tour Order','aventura'); ?>
            <h2><?php echo wp_kses_post( $aventura_page_title ); ?></h2>
            <?php if ( isset( $_REQUEST['updated'] ) ) echo '<div id="message" class="updated below-h2"><p>'. esc_html__('Order saved','aventura') .'</p></div>'?>
            <form method="post" id="order-form" class="tour-order-form" onsubmit="return manage_order_validateForm();" data-message="<?php echo esc_attr( esc_html__( 'Please select a tour', 'aventura' ) ) ?>">
                <input type="hidden" name="id" value="<?php echo esc_attr( $aventura_order_data['id'] ); ?>">
                <div class="row postbox">
                    <div class="one-half">
                        <h3><?php echo esc_html__( 'Order Detail', 'aventura' ) ?></h3>
                        <table class="ct_admin_table ct_order_manage_table">
                            <tr>
                                <th><?php echo esc_html__( 'Tour', 'aventura' ) ?></th>
                                <td>
                                    <select name="post_id" id="post_id">
                                        <option></option>
                                        <?php
                                        $aventura_args = array(
                                            'post_type'         => 'tour',
                                            'posts_per_page'    => -1,
                                            'orderby'           => 'title',
                                            'order'             => 'ASC'
                                        );
                                        if ( ! current_user_can( 'manage_options' ) ) {
                                            $aventura_args['author'] = get_current_user_id();
                                        }
                                        $aventura_tour_query = new WP_Query( $aventura_args );

                                        if ( $aventura_tour_query->have_posts() ) {
                                            while ( $aventura_tour_query->have_posts() ) {
                                                $aventura_tour_query->the_post();
                                                $aventura_selected = '';
                                                $aventura_id = $aventura_tour_query->post->ID;
                                                if ( $aventura_order_data['post_id'] == $aventura_id ) $aventura_selected = ' selected ';
                                                echo '<option ' . esc_attr( $aventura_selected ) . 'value="' . esc_attr( $aventura_id ) .'">' . wp_kses_post( get_the_title( $aventura_id ) ) . '</option>';
                                            }
                                        }
                                        wp_reset_postdata();
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Time', 'aventura' ) ?></th>
                                <td><input type="text" name="time" id="time" value="<?php echo esc_attr( $aventura_order_data['time'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Date', 'aventura' ) ?></th>
                                <td><input type="text" name="date_from" id="date" value="<?php echo esc_attr( $aventura_order_data['date_from'] ) ?>"></td>
                            </tr>
                            <?php
                            if( $aventura_order_data['price_combo'] != '0'){?>
                                <tr>
                                    <th><?php echo esc_html__( 'Name Combo', 'aventura' ) ?></th>
                                    <td><input type="text" name="name_combo" value="<?php echo esc_attr( $aventura_order_data['name_combo'] ) ?>"></td>
                                </tr>

                                <tr>
                                    <th><?php echo esc_html__( 'People Combo', 'aventura' ) ?></th>
                                    <td><input type="text" name="people_combo" value="<?php echo esc_attr( $aventura_order_data['people_combo'] ) ?>"></td>
                                </tr>

                                <tr>
                                    <th><?php echo esc_html__( 'Price Combo', 'aventura' ) ?></th>
                                    <td><input type="text" name="price_combo" value="<?php echo esc_attr( $aventura_order_data['price_combo'] ) ?>"> <?php echo esc_html( $aventura_site_currency_symbol ) ?></td>
                                </tr>
                                <?php
                            }else{ ?>
                                <tr>
                                    <th><?php echo esc_html__( 'Total Adults', 'aventura' ) ?></th>
                                    <td><input type="number" name="total_adults" value="<?php echo esc_attr( $aventura_order_data['total_adults'] ) ?>"></td>
                                </tr>
                                <tr>
                                    <th><?php echo esc_html__( 'Total Children', 'aventura' ) ?></th>
                                    <td><input type="number" name="total_kids" value="<?php echo esc_attr( $aventura_order_data['total_kids'] ) ?>"></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th><?php echo esc_html__( 'Total Price', 'aventura' ) ?></th>
                                <td><input type="text" name="total_price" value="<?php echo esc_attr( $aventura_order_data['total_price'] ) ?>"> <?php echo esc_html( $aventura_site_currency_symbol ) ?></td>
                            </tr>

                            <tr>
                                <th><?php echo esc_html__( 'Payment Method', 'aventura' ) ?></th>
                                <td>
                                    <select name="payment_method">
                                        <?php $aventura_payment_methods = array( 'cash' => esc_html__( 'Payment by cash', 'aventura' ), 'paypal' => esc_html__( 'Payment by paypal', 'aventura' ), 'cc' => esc_html__( 'Payment by credit card', 'aventura' ));
                                        if ( ! isset( $aventura_order_data['payment_method'] ) ) {
                                            $aventura_order_data['payment_method'] = '';
                                        }
                                        ?>
                                        <?php foreach ( $aventura_payment_methods as $aventura_method_key => $aventura_method_name) { ?>
                                            <option value="<?php echo esc_attr( $aventura_method_key ) ?>" <?php selected( $aventura_method_key, $aventura_order_data['payment_method'] ); ?>><?php echo esc_html( $aventura_method_name ) ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th><?php echo esc_html__( 'Status', 'aventura' ) ?></th>
                                <td>
                                    <select name="status">
                                        <?php $aventura_statuses = array( 'new' => esc_html__( 'New', 'aventura' ), 'confirmed' => esc_html__( 'Confirmed', 'aventura' ), 'cancelled' => esc_html__( 'Cancelled', 'aventura' ), 'pending' => esc_html__( 'Pending', 'aventura' ) );
                                        if ( ! isset( $aventura_order_data['status'] ) ) {
                                            $aventura_order_data['status'] = 'new';
                                        }
                                        ?>
                                        <?php foreach ( $aventura_statuses as $aventura_key => $aventura_content) { ?>
                                            <option value="<?php echo esc_attr( $aventura_key ) ?>" <?php selected( $aventura_key, $aventura_order_data['status'] ); ?>><?php echo esc_html( $aventura_content ) ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="one-half">
                        <h3><?php echo esc_html__( 'Customer Infomation', 'aventura' ) ?></h3>
                        <table  class="ct_admin_table ct_order_manage_table">
                            <tr>
                                <th><?php echo esc_html__( 'First Name', 'aventura' ) ?></th>
                                <td><input type="text" name="first_name" value="<?php echo esc_attr( $aventura_order_data['first_name'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Last Name', 'aventura' ) ?></th>
                                <td><input type="text" name="last_name" value="<?php echo esc_attr( $aventura_order_data['last_name'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Email', 'aventura' ) ?></th>
                                <td><input type="email" name="email" value="<?php echo esc_attr( $aventura_order_data['email'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Phone', 'aventura' ) ?></th>
                                <td><input type="text" name="phone" value="<?php echo esc_attr( $aventura_order_data['phone'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Address', 'aventura' ) ?></th>
                                <td><input type="text" name="address" value="<?php echo esc_attr( $aventura_order_data['address'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'City', 'aventura' ) ?></th>
                                <td><input type="text" name="city" value="<?php echo esc_attr( $aventura_order_data['city'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'State', 'aventura' ) ?></th>
                                <td><input type="text" name="state" value="<?php echo esc_attr( $aventura_order_data['state'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Postal Code', 'aventura' ) ?></th>
                                <td><input type="text" name="zip" value="<?php echo esc_attr( $aventura_order_data['zip'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Country', 'aventura' ) ?></th>
                                <td><input type="text" name="country" value="<?php echo esc_attr( $aventura_order_data['country'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Order notes', 'aventura' ) ?></th>
                                <td><textarea name="order_notes"><?php echo esc_textarea( stripslashes( $aventura_order_data['order_notes'] ) ) ?></textarea></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Booking No', 'aventura' ) ?></th>
                                <td><input type="text" name="booking_no" value="<?php echo esc_attr( $aventura_order_data['booking_no'] ) ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html__( 'Pin Code', 'aventura' ) ?></th>
                                <td><input type="text" name="pin_code" value="<?php echo esc_attr( $aventura_order_data['pin_code'] ) ?>"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <input type="hidden" name="tour_booking_id" value="<?php echo esc_attr( ( empty( $aventura_tour_data ) || empty( $aventura_tour_data['id'] ) ) ? '' : $aventura_tour_data['id'] ); ?>">
                <input type="submit" class="button-primary button_save_order" name="save" value="Save order">
                <a href="edit.php?post_type=tour&amp;page=tour_orders" class="button-secondary"><?php echo esc_html__('Cancel','aventura'); ?></a>
                <?php wp_nonce_field('aventura_orders_detail','order_save'); ?>
            </form>
        </div>
        <?php
    }
}

/*
 * order delete action
 */
if ( ! function_exists( 'aventura_tour_order_delete_action' ) ) {
    function aventura_tour_order_delete_action() {
        global $wpdb;
        // data validation
        if ( empty( $_REQUEST['order_id'] ) ) {
            print esc_html__( 'Sorry, you tried to remove nothing.', 'aventura' );
            exit;
        }

        // nonce check
        if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'order_delete' ) ) {
            print esc_html__( 'Sorry, your nonce did not verify.', 'aventura' );
            exit;
        }

        // check ownership if user is not admin
        if ( ! current_user_can( 'manage_options' ) ) {
            $aventura_sql = $wpdb->prepare( 'SELECT aventura_order.post_id FROM %1$s as aventura_order WHERE aventura_order.id = %2$d' , $wpdb->prefix . 'aventura_order', $_REQUEST['order_id'] );
            $aventura_post_id = $wpdb->get_var( $aventura_sql );
            $aventura_post_author_id = get_post_field( 'post_author', $aventura_post_id );
            if ( get_current_user_id() != $aventura_post_author_id ) {
                print esc_html__( 'You don\'t have permission to remove other\'s item.', 'aventura' );
                exit;
            }
        }

        // do action
        $aventura_sql = sprintf( 'DELETE aventura_order, aventura_bookings FROM %1$s AS aventura_order
		LEFT JOIN %2$s AS aventura_bookings ON aventura_order.id = aventura_bookings.order_id
		WHERE aventura_order.id = %3$s', $wpdb->prefix . 'aventura_order', $wpdb->prefix . 'aventura_tour_bookings', '%d' );
        $wpdb->query( $wpdb->prepare( $aventura_sql, $_REQUEST['order_id'] ) );
        wp_redirect( admin_url( 'edit.php?post_type=tour&page=tour_orders') );
        exit;
    }
}

/*
 * order save action
 */
if ( ! function_exists( 'aventura_tour_order_save_action' ) ) {
    function aventura_tour_order_save_action() {
        //validation
        if ( ! isset( $_POST['order_save'] ) || ! wp_verify_nonce( $_POST['order_save'], 'aventura_orders_detail' ) ) {
            print esc_html__( 'Sorry, your nonce did not verify.', 'aventura' );
            exit;
        }

        if ( empty( $_POST['post_id'] ) || 'tour' != get_post_type( $_POST['post_id'] ) ) {
            print esc_html__( 'Invalide Tour ID.', 'aventura' );
            exit;
        }

        global $wpdb;
        $aventura_default_order_data = aventura_order_default_order_data( 'update' );

        $aventura_order_data = array();
        foreach ( $aventura_default_order_data as $aventura_table_field => $aventura_def_value ) {
            if ( isset( $_POST[ $aventura_table_field ] ) ) {
                $aventura_order_data[ $aventura_table_field ] = $_POST[ $aventura_table_field ];
                if ( ! is_array( $_POST[ $aventura_table_field ] ) ) {
                    $aventura_order_data[ $aventura_table_field ] = sanitize_text_field( $aventura_order_data[ $aventura_table_field ] );
                } else {
                    $aventura_order_data[ $aventura_table_field ] = serialize( $aventura_order_data[ $aventura_table_field ] );
                }
            }
        }

        $aventura_order_data = array_replace( $aventura_default_order_data, $aventura_order_data );
        $aventura_order_data['post_id'] = $aventura_order_data['post_id'];
        if ( empty( $_POST['id'] ) ) {
            //insert
            $aventura_order_data['created'] = date( 'Y-m-d H:i:s' );
            $aventura_order_data['post_type'] = 'tour';
            $wpdb->insert( $wpdb->prefix . 'aventura_order', $aventura_order_data );
            $aventura_order_id = $wpdb->insert_id;

        } else {
            //update
            $wpdb->update( $wpdb->prefix . 'aventura_order', $aventura_order_data, array( 'id' => sanitize_text_field( $_POST['id'] ) ) );
            $aventura_order_id = sanitize_text_field( $_POST['id'] );

        }

        $aventura_tour_data = array(
            'tour_id' => $aventura_order_data['post_id'],
            'tour_time' => $aventura_order_data['time'],
            'tour_date' => $aventura_order_data['date_from'],
            'adults' => $aventura_order_data['total_adults'],
            'kids' => $aventura_order_data['total_kids'],
            'total_price' => $aventura_order_data['total_price'],
            'order_id' => $aventura_order_id,
        );

        // update tour booking table
        $aventura_sql = 'DELETE FROM ' . $wpdb->prefix . 'aventura_tour_bookings' . ' WHERE order_id=%d';
        $wpdb->query( $wpdb->prepare( $aventura_sql, $aventura_order_id ) );
        $aventura_format = array( '%d', '%s', '%d', '%d', '%f', '%d' );
        if ( ! empty( $_POST['tour_booking_id'] ) ) {
            $aventura_tour_data['id'] = $_POST['tour_booking_id'];
            $aventura_format[] = '%d';
        }
        $wpdb->insert( $wpdb->prefix . 'aventura_tour_bookings', $aventura_tour_data, $aventura_format ); // add additional services

        wp_redirect( admin_url( 'edit.php?post_type=tour&page=tour_orders&action=edit&test=1&order_id=' . $aventura_order_id . '&updated=true') );
        exit;
    }
}

/*
 * order admin enqueue script action
 */
if ( ! function_exists( 'aventura_tour_order_admin_enqueue_scripts' ) ) {
    function aventura_tour_order_admin_enqueue_scripts() {

        // support select2
        wp_enqueue_style( 'rwmb_select2', RWMB_URL . 'css/select2/select2.css', array(), '3.2' );
        wp_enqueue_script( 'rwmb_select2', RWMB_URL . 'js/select2/select2.min.js', array(), '3.2', true );


        // datepicker
        $aventura_url = RWMB_URL . 'css/jqueryui';
        wp_register_style( 'jquery-ui-core', "{$aventura_url}/jquery.ui.core.css", array(), '1.8.17' );
        wp_register_style( 'jquery-ui-theme', "{$aventura_url}/jquery.ui.theme.css", array(), '1.8.17' );
        wp_enqueue_style( 'jquery-ui-datepicker', "{$aventura_url}/jquery.ui.datepicker.css", array( 'jquery-ui-core', 'jquery-ui-theme' ), '1.8.17' );

        // Load localized scripts
        $aventura_locale = str_replace( '_', '-', get_locale() );
        $aventura_file_path = 'jqueryui/datepicker-i18n/jquery.ui.datepicker-' . $aventura_locale . '.js';
        $aventura_deps = array( 'jquery-ui-datepicker' );
        if ( file_exists( RWMB_DIR . 'js/' . $aventura_file_path ) )
        {
            wp_register_script( 'jquery-ui-datepicker-i18n', RWMB_URL . 'js/' . $aventura_file_path, $aventura_deps, '1.8.17', true );
            $aventura_deps[] = 'jquery-ui-datepicker-i18n';
        }

        wp_enqueue_script( 'rwmb-date', RWMB_URL . 'js/' . 'date.js', $aventura_deps, RWMB_VER, true );
        wp_localize_script( 'rwmb-date', 'RWMB_Date', array( 'lang' => $aventura_locale ) );
        wp_enqueue_script( 'jquery-ui-sortable' );

        wp_enqueue_style('jquery-ui-timepicker-style', get_template_directory_uri() . '/extension/assets/css/jquery.ui.timepicker.css');
        wp_enqueue_script('jquery-ui-timepicker-script', get_template_directory_uri() . '/extension/assets/js/jquery.ui.timepicker.js', array(), false, true );

        // custom style and js
        wp_enqueue_style( 'aventura-order-admin-style' , get_template_directory_uri() . '/extension/assets/css/admin-styles.css' );
        wp_enqueue_script('aventura-order-admin-script', get_template_directory_uri() . '/extension/assets/js/order-admin.js', array('jquery'), false, true );
    }
}
add_action( 'admin_menu', 'aventura_tour_order_add_menu_items' );