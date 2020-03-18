<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $aventura_options,$aventura_order_by,$aventura_order,$aventura_list_grid_type,$aventura_type;

$aventura_sort_option                  = $aventura_options['aventura_tour_archive_sort'];
?>

<div class="tz-tour-sort">
    <?php if( isset($aventura_sort_option) && ( $aventura_sort_option ["name"] == '1' || $aventura_sort_option ["price"] == '1' || $aventura_sort_option ["rating"] == '1' || $aventura_sort_option ["popularity"] == '1' ) ){?>
        <h4><?php esc_html_e('Sort results by: ', 'aventura'); ?></h4>
        <?php if( $aventura_sort_option ["name"] == '1' ){?>
            <div class="styled-select-filters tz-select-name">
                <select class="select sort-btn" name="sort_name" id="sort_name" data-sort-type="name" data-base-url="<?php echo esc_url( remove_query_arg( array( 'order', 'order_by', 'page' ) ) ); ?>">
                    <option value="" <?php if ( $aventura_order_by != 'name' ) echo 'selected' ?>><?php echo esc_html__( 'Name', 'aventura' ) ?></option>
                    <option value="lower" <?php if ( $aventura_order_by == 'name' && $aventura_order == 'ASC' ) echo 'selected' ?>><?php echo esc_html__( 'ASC', 'aventura' ) ?></option>
                    <option value="higher" <?php if ( $aventura_order_by == 'name' && $aventura_order == 'DESC' ) echo 'selected' ?>><?php echo esc_html__( 'DESC', 'aventura' ) ?></option>
                </select>
            </div>
        <?php } ?>

        <?php if( $aventura_sort_option ["price"] == '1' ){?>
            <div class="styled-select-filters tz-select-price">
                <select class="select sort-btn" name="sort_price" id="sort_price" data-sort-type="price" data-base-url="<?php echo esc_url( remove_query_arg( array( 'order', 'order_by', 'page' ) ) ); ?>">
                    <option value="" <?php if ( $aventura_order_by != 'price' ) echo 'selected' ?>><?php echo esc_html__( 'Price', 'aventura' ) ?></option>
                    <option value="lower" <?php if ( $aventura_order_by == 'price' && $aventura_order == 'ASC' ) echo 'selected' ?>><?php echo esc_html__( 'Lowest', 'aventura' ) ?></option>
                    <option value="higher" <?php if ( $aventura_order_by == 'price' && $aventura_order == 'DESC' ) echo 'selected' ?>><?php echo esc_html__( 'Highest', 'aventura' ) ?></option>
                </select>
            </div>
        <?php } ?>

        <?php if( $aventura_sort_option ["rating"] == '1' ){?>
            <div class="styled-select-filters tz-select-rating">
                <select class="select sort-btn" name="sort_rating" id="sort_rating" data-sort-type="rating" data-base-url="<?php echo esc_url( remove_query_arg( array( 'order', 'order_by', 'page' ) ) ); ?>">
                    <option value="" <?php if ( $aventura_order_by != 'rating' ) echo 'selected' ?>><?php echo esc_html__( 'Rating', 'aventura' ) ?></option>
                    <option value="lower" <?php if ( $aventura_order_by == 'rating' && $aventura_order == 'ASC' ) echo 'selected' ?>><?php echo esc_html__( 'Lowest', 'aventura' ) ?></option>
                    <option value="higher" <?php if ( $aventura_order_by == 'rating' && $aventura_order == 'DESC' ) echo 'selected' ?>><?php echo esc_html__( 'Highest', 'aventura' ) ?></option>
                </select>
            </div>
        <?php } ?>

        <?php if( $aventura_sort_option ["popularity"] == '1' ){?>
            <div class="styled-select-filters tz-select-popularity">
                <select class="select sort-btn" name="sort_popularity" id="sort_popularity" data-sort-type="popularity" data-base-url="<?php echo esc_url( remove_query_arg( array( 'order', 'order_by', 'page' ) ) ); ?>">
                    <option value="" <?php if ( $aventura_order_by != 'popularity' ) echo 'selected' ?>><?php echo esc_html__( 'Popularity', 'aventura' ) ?></option>
                    <option value="lower" <?php if ( $aventura_order_by == 'popularity' && $aventura_order == 'ASC' ) echo 'selected' ?>><?php echo esc_html__( 'Lowest', 'aventura' ) ?></option>
                    <option value="higher" <?php if ( $aventura_order_by == 'popularity' && $aventura_order == 'DESC' ) echo 'selected' ?>><?php echo esc_html__( 'Highest', 'aventura' ) ?></option>
                </select>
            </div>
        <?php } ?>

    <?php } ?>
    <?php if( $aventura_list_grid_type == 'list-grid' && $aventura_type != 'only_list' && $aventura_type != 'only_grid' ){ ?>
        <span class="type-btn tour-layout-grid-btn active"></span>
        <span class="type-btn tour-layout-list-btn"></span>
    <?php } ?>
</div>


