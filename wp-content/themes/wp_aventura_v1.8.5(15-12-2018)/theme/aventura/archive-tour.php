<?php
//global $aventura_options,$aventura_post_id,$aventura_wishlist_url,$aventura_wishlist;
global $aventura_options,$aventura_post_id,$aventura_wishlist_url,$aventura_wishlist,$aventura_count,$aventura_category_filter,$aventura_language_filter,$aventura_price_filter_jquery,$aventura_destination_filter,$aventura_order_by,$aventura_order,$aventura_list_grid_type,$aventura_type;

get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

$aventura_sidebar_min_price              = isset( $aventura_options['aventura_filter_sidebar_min_price'] ) ? $aventura_options['aventura_filter_sidebar_min_price']:'0';
$aventura_sidebar_max_price              = isset( $aventura_options['aventura_filter_sidebar_max_price'] ) ? $aventura_options['aventura_filter_sidebar_max_price']:'10000';

/*  Demo    */
$aventura_type = '';
if(isset($_GET['type']) && $_GET['type'] != ''){
    $aventura_type = $_GET['type'];
}

/*  Check Url Taxonomy  */
$aventura_tax_category = '';
if( is_tax( 'tour-category') ){
    $aventura_term_slug = get_query_var( 'term' );
    $aventura_taxonomy_name = get_query_var( 'taxonomy' );
    $aventura_current_term = get_term_by( 'slug', $aventura_term_slug, $aventura_taxonomy_name );

    $aventura_tax_category =  $aventura_current_term->term_id;
}

$aventura_tax_language = '';
if( is_tax('tour-language') ){
    $aventura_term_slug = get_query_var( 'term' );
    $aventura_taxonomy_name = get_query_var( 'taxonomy' );
    $aventura_current_term = get_term_by( 'slug', $aventura_term_slug, $aventura_taxonomy_name );

    $aventura_tax_language =  $aventura_current_term->term_id;
}

$aventura_wishlist = array();
if ( is_user_logged_in() ) {
    $aventura_user_id = get_current_user_id();
    $aventura_wishlist = get_user_meta( $aventura_user_id, 'wishlist', true );
}
if ( ! is_array( $aventura_wishlist ) ) $aventura_wishlist = array();

$aventura_wishlist_url = aventura_get_tour_wishlist_page();

$aventura_order_array = array( 'ASC', 'DESC' );
$aventura_order_by_array = array(
    '' => '',
    'name' => 'name',
    'price' => 'price',
    'rating' => 'rating',
    'popularity' => 'popularity'
);
$aventura_order_defaults = array(
    'price' => 'ASC',
    'rating' => 'DESC'
);

$aventura_s          = isset($_REQUEST['s']) ? sanitize_text_field( $_REQUEST['s'] ) : '';
$aventura_date       = isset($_REQUEST['date']) ? sanitize_text_field( $_REQUEST['date'] ) : '';
$aventura_tour_length       = isset($_REQUEST['tour_length']) ? sanitize_text_field( $_REQUEST['tour_length'] ) : '';

$aventura_order_by   = ( isset( $_REQUEST['order_by'] ) && array_key_exists( $_REQUEST['order_by'], $aventura_order_by_array ) ) ? sanitize_text_field( $_REQUEST['order_by'] ) : '';
$aventura_order      = ( isset( $_REQUEST['order'] ) && in_array( $_REQUEST['order'], $aventura_order_array ) ) ? sanitize_text_field( $_REQUEST['order'] ) : 'DESC';

$aventura_price_filter   = ( isset( $_REQUEST['price_filter'] ) && is_array( $_REQUEST['price_filter'] ) ) ? $_REQUEST['price_filter'] : array();
$aventura_rating_filter  = ( isset( $_REQUEST['rating_filter'] ) && is_array( $_REQUEST['rating_filter'] ) ) ? $_REQUEST['rating_filter'] : array();

if( $aventura_tax_category == '' ){
    $aventura_category_filter = ( isset( $_REQUEST['tour_categories'] ) && is_array( $_REQUEST['tour_categories'] ) ) ? $_REQUEST['tour_categories'] : array();
}else{
    $aventura_category_filter = array($aventura_tax_category);
}
if( $aventura_tax_language == '' ){
    $aventura_language_filter = ( isset( $_REQUEST['tour_languages'] ) && is_array( $_REQUEST['tour_languages'] ) ) ? $_REQUEST['tour_languages'] : array();
}else{
    $aventura_language_filter = array($aventura_tax_language);
}
$aventura_destination_filter = ( isset( $_REQUEST['tour_destination'] ) && is_array( $_REQUEST['tour_destination'] ) ) ? $_REQUEST['tour_destination'] : array();

$aventura_page       = ( isset( $_REQUEST['page'] ) && ( is_numeric( $_REQUEST['page'] ) ) && ( $_REQUEST['page'] >= 1 ) ) ? sanitize_text_field( $_REQUEST['page'] ):1;
$aventura_per_page   = ( isset( $aventura_options['aventura_tour_archive_limit'] ) && is_numeric($aventura_options['aventura_tour_archive_limit']) )?$aventura_options['aventura_tour_archive_limit']:12;

$aventura_search_result = aventura_tour_get_search_result( array(
        'aventura_s'                    =>  $aventura_s,
        'aventura_date'                 =>  $aventura_date,
        'aventura_tour_length'          =>  $aventura_tour_length,
        'aventura_categories_filter'    =>  $aventura_category_filter,
        'aventura_destination_filter'   =>  $aventura_destination_filter,
        'aventura_language_filter'      =>  $aventura_language_filter,
        'aventura_price_filter'         =>  $aventura_price_filter,
        'aventura_rating_filter'        =>  $aventura_rating_filter,
        'aventura_order_by'             =>  $aventura_order_by_array[$aventura_order_by],
        'aventura_order'                =>  $aventura_order,
        'aventura_last_no'              =>  ( $aventura_page - 1 ) * $aventura_per_page,
        'aventura_per_page'             =>  $aventura_per_page )
);

$aventura_post_list = $aventura_search_result['ids'];
$aventura_count = $aventura_search_result['count']; // total_count

$aventura_price_filter_jquery   = ( isset( $_REQUEST['price_filter'] ) && is_array( $_REQUEST['price_filter'] ) ) ? $_REQUEST['price_filter'] : array( $aventura_sidebar_min_price,$aventura_sidebar_max_price);
$aventura_rating_filter_jquery  = ( isset( $_REQUEST['rating_filter'] ) && is_array( $_REQUEST['rating_filter'] ) ) ? $_REQUEST['rating_filter'] : array();

/*  Tour Archive Option */
$aventura_column_desk = $aventura_column_tablet = $aventura_column_mobilelandscape = $aventura_column_mobile = '1';

$aventura_list_grid_type               = isset( $aventura_options['aventura_tour_archive_list_grid_type'] ) ? $aventura_options['aventura_tour_archive_list_grid_type']:'list-grid';
if( $aventura_list_grid_type != 'list' && $aventura_type != 'only_list' ){
    if( $aventura_type == '2_column' ){
        $aventura_column_desk = $aventura_column_tablet = '2';
    }elseif( $aventura_type == '3_column' ){
        $aventura_column_desk = '3';
        $aventura_column_tablet = '2';
    }elseif( $aventura_type == '4_column' ){
        $aventura_column_desk = '4';
        $aventura_column_tablet = '2';
    }else{
        $aventura_column_desk               = isset( $aventura_options['aventura_grid_desk_column'] ) ? $aventura_options['aventura_grid_desk_column']:'3';
        $aventura_column_tablet             = isset( $aventura_options['aventura_grid_tablet_column'] ) ? $aventura_options['aventura_grid_tablet_column']:'2';
        $aventura_column_mobilelandscape    = isset( $aventura_options['aventura_grid_mobilelandscape_column'] ) ? $aventura_options['aventura_grid_mobilelandscape_column']:'1';
        $aventura_column_mobile             = isset( $aventura_options['aventura_grid_mobile_column'] ) ? $aventura_options['aventura_grid_mobile_column']:'1';
    }

}
$aventura_sidebar_filter                 = isset( $aventura_options['aventura_filter_sidebar'] ) ? $aventura_options['aventura_filter_sidebar']:'right';
$aventura_sidebar_results                = isset( $aventura_options['aventura_filter_sidebar_results'] ) ? $aventura_options['aventura_filter_sidebar_results']:'1';
$aventura_sidebar_price                  = isset( $aventura_options['aventura_filter_sidebar_price'] ) ? $aventura_options['aventura_filter_sidebar_price']:'1';
$aventura_sidebar_rating                 = isset( $aventura_options['aventura_filter_sidebar_rating'] ) ? $aventura_options['aventura_filter_sidebar_rating']:'1';
$aventura_sidebar_categories             = isset( $aventura_options['aventura_filter_sidebar_categories'] ) ? $aventura_options['aventura_filter_sidebar_categories']:'1';
$aventura_sidebar_destinations           = isset( $aventura_options['aventura_filter_sidebar_destinations'] ) ? $aventura_options['aventura_filter_sidebar_destinations']:'1';
$aventura_sidebar_language               = isset( $aventura_options['aventura_filter_sidebar_language'] ) ? $aventura_options['aventura_filter_sidebar_language']:'1';
$aventura_sidebar_search                 = isset( $aventura_options['aventura_filter_sidebar_search'] ) ? $aventura_options['aventura_filter_sidebar_search']:'1';

$aventura_sidebar_title_price            = isset( $aventura_options['aventura_filter_sidebar_title_price'] ) ? $aventura_options['aventura_filter_sidebar_title_price']:'';
$aventura_sidebar_title_rating           = isset( $aventura_options['aventura_filter_sidebar_title_rating'] ) ? $aventura_options['aventura_filter_sidebar_title_rating']:'';
$aventura_sidebar_title_categories       = isset( $aventura_options['aventura_filter_sidebar_title_categories'] ) ? $aventura_options['aventura_filter_sidebar_title_categories']:'';
$aventura_sidebar_title_destinations     = isset( $aventura_options['aventura_filter_sidebar_title_destinations'] ) ? $aventura_options['aventura_filter_sidebar_title_destinations']:'';
$aventura_sidebar_title_language         = isset( $aventura_options['aventura_filter_sidebar_title_language'] ) ? $aventura_options['aventura_filter_sidebar_title_language']:'';
$aventura_sidebar_title_search           = isset( $aventura_options['aventura_filter_sidebar_title_search'] ) ? $aventura_options['aventura_filter_sidebar_title_search']:'';

$aventura_sidebar_class = 'col-lg-9 col-md-8 col-sm-8 col-xs-12 tz-no-padding';
if( $aventura_sidebar_filter == 'none' || $aventura_type == 'no_filter' || $aventura_type == '4_column' ){
    $aventura_sidebar_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12 tz-no-padding';
}

$aventura_data_type = '';
if( $aventura_type != '' ){
    $aventura_data_type = $aventura_type;
}else{
    $aventura_data_type = $aventura_list_grid_type;
}

$aventura_day_start_week = get_option('start_of_week');

?>

    <div class="tz-tour-archive" data-type="<?php echo esc_attr($aventura_data_type); ?>" data-desktop="<?php echo esc_attr($aventura_column_desk) ?>" data-tablet="<?php echo esc_attr($aventura_column_tablet) ?>" data-mobilelandscape="<?php echo esc_attr($aventura_column_mobilelandscape) ?>" data-mobile="<?php echo esc_attr($aventura_column_mobile) ?>">
        <div class="container">
            <div class="row">
                <!--Sidebar Filter Left -->
                <?php if( $aventura_sidebar_filter == 'left' || $aventura_type == 'left_filter' ){
                    aventura_get_template('sidebar-filter.php','/tour/templates/');
                } ?><!--End Sidebar Filter Left -->

                <div class="<?php echo esc_attr($aventura_sidebar_class); ?>">
                    <?php if( is_tax( 'tour-category')  && !empty($aventura_current_term->description) ){ ?>
                        <p class="tz-tour-category-descripton">
                            <?php echo esc_html($aventura_current_term->description); ?>
                        </p>
                    <?php } ?>

                    <!--Sort Results -->
                    <?php aventura_get_template('sort-results.php','/tour/templates/'); ?>
                    <!--End Sort Results -->

                    <?php
                    if ( empty( $aventura_post_list ) ) :
                        echo '<h4 class="empty-list">' . esc_html__( 'No available tours', 'aventura' ) . '</h4>';
                    else : ?>
                        <div class="tz-tour-content tour-masonry <?php if( $aventura_list_grid_type == 'list' || $aventura_type == 'only_list' ) echo 'tour-layout-list' ?>">
                            <?php
                            foreach( $aventura_post_list as $aventura_post_obj ) :
                                $aventura_post_id = $aventura_post_obj['tour_id'];
                                aventura_get_template( 'tour-list-grid.php', '/tour/templates/');
//                                get_template_part('tour/templates/tour-list', 'grid');
                            endforeach;
                            ?>
                        </div>
                        <?php
                    endif;
                    ?>
                    <div class="tz-tour-pagination text-center">
                        <?php
                        unset( $_GET['page'] );
                        $aventura_pagenum_link = strtok( $_SERVER["REQUEST_URI"], '?' ) . '%_%';
                        $aventura_total = ceil( $aventura_count / $aventura_per_page );
                        $aventura_nav_args = array(
                            'base' => $aventura_pagenum_link, /* http://example.com/all_posts.php%_% : %_% is replaced by format (below) */
                            'total' => $aventura_total,
                            'format' => '?page=%#%',
                            'current' => $aventura_page,
                            'show_all' => false,
                            'prev_next' => true,
                            'prev_text' => '<i class="fa fa-angle-left"></i>',
                            'next_text' => '<i class="fa fa-angle-right"></i>',
                            'end_size' => 1,
                            'mid_size' => 2,
                            'type' => 'list',
                            'add_args' => $_GET,
                        );
                        echo paginate_links( $aventura_nav_args );
                        ?>
                    </div><!-- end pagination-->
                </div>
                <?php if( $aventura_sidebar_filter == 'right' && $aventura_type != 'left_filter' && $aventura_type != 'no_filter' && $aventura_type != '4_column' ){
                    aventura_get_template('sidebar-filter.php','/tour/templates/');
                } ?>
            </div>
            <!--            <div class="tz-form-booking-ajax-content"></div>-->
            <!--            <div class="tz-reviews-ajax-content"></div>-->
        </div>
    </div>
<?php get_footer(); ?>