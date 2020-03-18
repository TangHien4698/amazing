<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $aventura_options,$aventura_count,$aventura_category_filter,$aventura_language_filter,$aventura_price_filter_jquery,$aventura_destination_filter;

$aventura_sidebar_min_price              = isset( $aventura_options['aventura_filter_sidebar_min_price'] ) ? $aventura_options['aventura_filter_sidebar_min_price']:'0';
$aventura_sidebar_max_price              = isset( $aventura_options['aventura_filter_sidebar_max_price'] ) ? $aventura_options['aventura_filter_sidebar_max_price']:'10000';
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
?>

<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 tz-sidebar-filter">
    <?php if( $aventura_sidebar_results == '1' ){ ?>
        <div class="filter-item search_results">
            <p><i class="fa fa-search"></i><strong><?php echo sprintf( esc_html__( '%d', 'aventura' ), $aventura_count )?></strong><?php esc_html_e(' results found.','aventura') ?></p>
        </div>
    <?php } ?>
    <?php if( $aventura_sidebar_price == '1' ){ ?>
        <div class="filter-item price-filter" data-base-url="<?php echo esc_url( remove_query_arg( array( 'price_filter', 'page' ) ) ); ?>" data-arg="price_filter">
            <h5><?php echo esc_html($aventura_sidebar_title_price); ?></h5>
            <div class="range-slider">
                <span class="full-range"></span>
                <span class="incl-range"></span>
                <input class="range-input" name="rangeOne" value="<?php echo esc_attr($aventura_price_filter_jquery[0]); ?>" min="<?php echo esc_attr($aventura_sidebar_min_price); ?>" max="<?php echo esc_attr($aventura_sidebar_max_price); ?>" step="1" type="range">
                <input class="range-input" name="rangeTwo" value="<?php echo esc_attr($aventura_price_filter_jquery[1]); ?>" min="<?php echo esc_attr($aventura_sidebar_min_price); ?>" max="<?php echo esc_attr($aventura_sidebar_max_price); ?>" step="1" type="range">
            </div>
            <div class="get-value">
                <!--                            <input type="hidden" class="range-currency" value="--><?php //echo esc_html(aventura_getCurrency());?><!--" />-->
                <div class="price-left pull-left">
                    <span><?php echo esc_html(aventura_getCurrency());?></span>
                    <input type="text" name="price_filter[]" class="output outputOne price-value min" />
                </div>
                <div class="price-right pull-right">
                    <span><?php echo esc_html(aventura_getCurrency());?></span>
                    <input type="text" name="price_filter[]" class="output outputTwo price-value max" />
                </div>
            </div>
            <input type="button" class="filter-btn price-filter-btn" value="<?php esc_html_e('Filter','aventura'); ?>" />
        </div>
    <?php } ?>
    <?php if( $aventura_sidebar_rating == '1' ){

        $aventura_total_comments = aventura_get_all_comments_of_post_type('tour');
        if( $aventura_total_comments > 1 ){
            $aventura_total_comments_text = esc_html__(' Reviews','aventura');
        }else{
            $aventura_total_comments_text = esc_html__(' Review','aventura');
        }

        if( isset($aventura_total_comments) && $aventura_total_comments != 0 ) {
            ?>
            <div class="filter-item rating-filter"
                 data-base-url="<?php echo esc_url(remove_query_arg(array('rating_filter', 'page'))); ?>"
                 data-arg="rating_filter">
                <h5><?php echo esc_html($aventura_sidebar_title_rating); ?></h5>
                <div class="rating-content">
                    <div class="star hidden">
                        <span class="full" data-value="0"></span>
                        <span class="half" data-value="0"></span>
                    </div>
                    <div class="star">
                        <span class="full" data-value="1"></span>
                        <span class="half" data-value="0.5"></span>
                        <span class="selected"></span>
                    </div>
                    <div class="star">
                        <span class="full" data-value="2"></span>
                        <span class="half" data-value="1.5"></span>
                        <span class="selected"></span>
                    </div>
                    <div class="star">
                        <span class="full" data-value="3"></span>
                        <span class="half" data-value="2.5"></span>
                        <span class="selected"></span>
                    </div>
                    <div class="star">
                        <span class="full" data-value="4"></span>
                        <span class="half" data-value="3.5"></span>
                        <span class="selected"></span>
                    </div>
                    <div class="star">
                        <span class="full" data-value="5"></span>
                        <span class="half" data-value="4.5"></span>
                        <span class="selected"></span>
                    </div>
                    <input type="text" name="rating_filter[]" class="rating-score" hidden/>
                </div>
                <p class="rating-count"><?php echo esc_html($aventura_total_comments . $aventura_total_comments_text); ?></p>
                <input type="button" class="filter-btn rating-filter-btn"
                       value="<?php esc_html_e('All Rating', 'aventura'); ?>"/>
            </div>
            <?php
        }
    } ?>
    <?php if( $aventura_sidebar_categories == '1' && $aventura_tax_category == '' ){ ?>
        <div class="filter-item tz-filter">
            <h5><?php echo esc_html($aventura_sidebar_title_categories); ?></h5>
            <ul class="list-filter tour_category_filter" data-base-url="<?php echo esc_url( remove_query_arg( array( 'tour_categories', 'page' ) ) ); ?>" data-arg="tour_categories">
                <?php
                $aventura_all_tour_categoies = get_terms( 'tour-category', array('hide_empty' => 0) );
                if ( ! empty( $aventura_all_tour_categoies ) ) :
                    foreach ( $aventura_all_tour_categoies as $aventura_tour_category ) {
                        $aventura_term_id = $aventura_tour_category->term_id;
                        $aventura_checked = ( in_array( $aventura_term_id, $aventura_category_filter ) ) ? ' checked="checked"' : '';
                        if( $aventura_tour_category->count != 0 ){
                            echo '<li><label><input type="checkbox" name="categories_filter[]" value="' . esc_attr( $aventura_term_id ) . '"' . $aventura_checked . '>' . esc_html( $aventura_tour_category->name ) . '<span>('.$aventura_tour_category->count.')</span></label></li>';
                        }
                    }
                endif;?>
            </ul>
        </div>
    <?php } ?>
    <?php if( $aventura_sidebar_destinations == '1' ){ ?>
        <div class="filter-item tz-filter">
            <h5><?php echo esc_html($aventura_sidebar_title_destinations); ?></h5>
            <ul class="list-filter tour_destination_filter" data-base-url="<?php echo esc_url( remove_query_arg( array( 'tour_destination', 'page' ) ) ); ?>" data-arg="tour_destination">
                <?php
                $aventura_args_destinations = array(
                    'post_type'         => 'destination',
                    'post_status'       => 'publish',
                    'posts_per_page'    => '999',
                    'orderby'           => 'title',
                );

                $aventura_destinations_query = new WP_Query( $aventura_args_destinations ) ;
                if ( $aventura_destinations_query -> have_posts() ): while ( $aventura_destinations_query -> have_posts() ): $aventura_destinations_query -> the_post() ;
                    $aventura_term_id = get_the_ID();
                    $aventura_count_posts = aventura_get_post_count_by_meta('aventura_tour_destination', $aventura_term_id, 'tour');
                    $aventura_checked = ( in_array( $aventura_term_id, $aventura_destination_filter ) ) ? ' checked="checked"' : '';
                    if( $aventura_count_posts != 0 ){
                        echo '<li><label><input type="checkbox" name="destination_filter[]" value="' . esc_attr( $aventura_term_id ) . '"' . $aventura_checked . '>' . esc_html( get_the_title() ) . '</label></li>';
                    }
                endwhile;
                endif;
                ?>
            </ul>
        </div>
    <?php } ?>
    <?php if( $aventura_sidebar_language == '1' && $aventura_tax_language == '' ){ ?>
        <div class="filter-item tz-filter">
            <h5><?php echo esc_html($aventura_sidebar_title_language); ?></h5>
            <ul class="list-filter tour_language_filter" data-base-url="<?php echo esc_url( remove_query_arg( array( 'tour_languages', 'page' ) ) ); ?>" data-arg="tour_languages">
                <?php
                $aventura_all_tour_languages = get_terms( 'tour-language', array('hide_empty' => 0) );
                if ( ! empty( $aventura_all_tour_languages ) ) :
                    foreach ( $aventura_all_tour_languages as $aventura_tour_language ) {
                        $aventura_term_id = $aventura_tour_language->term_id;
                        $aventura_checked = ( in_array( $aventura_term_id, $aventura_language_filter ) ) ? ' checked="checked"' : '';
                        if( $aventura_tour_language->count != 0 ){
                            echo '<li><label><input type="checkbox" name="language_filter[]" value="' . esc_attr( $aventura_term_id ) . '"' . $aventura_checked . '>' . esc_html( $aventura_tour_language->name ) . '<span>('.$aventura_tour_language->count.')</span></label></li>';
                        }
                    }
                endif;?>
            </ul>
        </div>
    <?php } ?>
    <?php if( $aventura_sidebar_search == '1' ){ ?>
        <div class="filter-item search-filter">
            <h5><?php echo esc_html($aventura_sidebar_title_search); ?></h5>
            <form role="search" method="get" id="search-tour-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="hidden" name="post_type" value="tour">
                <div class="form-group">
                    <label><?php echo esc_html__( 'Key Word', 'aventura' ) ?></label>
                    <input type="text" id="search_terms" name="s" placeholder="<?php echo esc_html__( 'Enter Your Key Word...', 'aventura' ) ?>" value="<?php echo esc_attr( $aventura_s ) ?>">
                </div>
                <div class="form-group">
                    <label><?php esc_html_e( 'Departure Date', 'aventura' ) ?></label>
                    <div class="departure-date">
                        <input class="date-pick" data-locale="<?php echo esc_attr(get_locale()); ?>" data-date-format="mm/dd/yyyy" type="text" name="date" value="<?php echo esc_attr( $aventura_date ) ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo esc_html__( 'Tour Length', 'aventura' ) ?></label>
                    <select class="select" name="tour_length">
                        <option value="" selected><?php esc_html_e( 'Select Tour Length', 'aventura' ) ?></option>
                        <option value="1"><?php esc_html_e( '1 Day', 'aventura' ) ?></option>
                        <option value="2"><?php esc_html_e( '2 Days', 'aventura' ) ?></option>
                        <option value="3"><?php esc_html_e( '3 Days', 'aventura' ) ?></option>
                        <option value="4"><?php esc_html_e( '4 Days', 'aventura' ) ?></option>
                        <option value="5"><?php esc_html_e( '5 Days', 'aventura' ) ?></option>
                        <option value="6"><?php esc_html_e( '6 Days', 'aventura' ) ?></option>
                        <option value="7"><?php esc_html_e( '7 Days', 'aventura' ) ?></option>
                        <option value="8"><?php esc_html_e( '8 Days', 'aventura' ) ?></option>
                        <option value="9"><?php esc_html_e( '9 Days', 'aventura' ) ?></option>
                        <option value="10"><?php esc_html_e( '10 Days', 'aventura' ) ?></option>
                        <option value="11"><?php esc_html_e( '11 Days', 'aventura' ) ?></option>
                        <option value="12"><?php esc_html_e( '12 Days', 'aventura' ) ?></option>
                        <option value="13"><?php esc_html_e( '13 Days', 'aventura' ) ?></option>
                        <option value="14"><?php esc_html_e( '14 Days', 'aventura' ) ?></option>
                        <option value="15"><?php esc_html_e( '15 Days', 'aventura' ) ?></option>
                    </select>
                </div>
                <button class="btn_1 green filter-btn"><?php esc_html_e( 'Search', 'aventura' ) ?></button>
            </form>
        </div>
    <?php } ?>
</div>
