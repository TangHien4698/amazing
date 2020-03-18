<?php
function tzaventura_searchtour($atts) {
    $tz_name_option = $tz_name_label = $tz_destination_option = $tz_destination_label = $tz_date_option = $tz_date_label = $tz_duration_option = $tz_duration_label = $tz_category_option = $tz_category_label = $tz_language_option = $tz_language_label = $tz_button = '';
    extract(shortcode_atts(array(
        'tz_name_option'        => 'show',
        'tz_name_label'         => '',
        'tz_destination_option' => 'show',
        'tz_destination_label'  => '',
        'tz_date_option'        => 'show',
        'tz_date_label'         => '',
        'tz_duration_option'    => 'show',
        'tz_duration_label'     => '',
        'tz_category_option'    => 'hide',
        'tz_category_label'     => '',
        'tz_language_option'    => 'hide',
        'tz_language_label'     => '',
        'tz_button'             => '',
    ),$atts));
    ob_start();

    wp_enqueue_style( 'bootstrap-datepicker');
    wp_enqueue_script('bootstrap-datepicker');
    wp_enqueue_script('bootstrap-datepicker-localization');

    $aventura_day_start_week = get_option('start_of_week');

    ?>
    <div class="tzElement_Search">
        <form class="tzElement_search_form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="tzElement_search_field">
                <input type="hidden" name="post_type" value="tour">
                <?php
                if ($tz_name_option == 'show') {
                    ?>
                    <div class="form-group form-name">
                        <label>
                            <?php
                            if($tz_name_label != ''){
                                echo esc_html($tz_name_label);
                            }else{
                                esc_html_e( 'Keywords', 'aventura-plugin' );
                            }
                            ?>
                        </label>
                        <div class="field-box">
                            <input type="text" class="form-control" name="s" placeholder="<?php echo esc_attr__( 'Enter a keyword here','aventura-plugin' ) ?>">
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if ($tz_destination_option == 'show') {
                    ?>
                    <div class="form-group form-destination">
                        <label>
                            <?php
                            if($tz_destination_label != ''){
                                echo esc_html($tz_destination_label);
                            }else{
                                esc_html_e( 'Destination', 'aventura-plugin' );
                            }
                            ?>
                        </label>

                        <div class="field-box">
                            <select name="tour_destination[]">
                                <option value=""><?php echo esc_html__('Any','aventura-plugin' ); ?></option>
                                <?php

                                $aventura_args_destinations = array(
                                    'post_type'         => 'destination',
                                    'post_status'       => 'publish',
                                    'orderby'           => 'name',
                                    'order'             => 'ASC',
                                    'posts_per_page'    => -1
                                );

                                // The Query
                                $aventura_destinations_query = new WP_Query( $aventura_args_destinations );
                                // The Loop
                                if ( $aventura_destinations_query->have_posts() ) {
                                    while ( $aventura_destinations_query->have_posts() ) {
                                        $aventura_destinations_query->the_post();
                                        echo '<option  value="'.get_the_ID().'">'.get_the_title().'</option>';
                                    }
                                    /* Restore original Post Data */
                                    wp_reset_postdata();
                                } else {
                                    // no posts found
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if ($tz_date_option == 'show') {
                    ?>
                    <div class="form-group form-date">
                        <label>
                            <?php
                            if($tz_date_label != ''){
                                echo esc_html($tz_date_label);
                            }else{
                                esc_html_e( 'Departure Date', 'aventura-plugin' );
                            }
                            ?>
                        </label>

                        <div class="field-box">
                            <input class="date-pick form-control" data-locale="<?php echo esc_attr(get_locale()); ?>" data-day-start-week= "<?php echo esc_attr($aventura_day_start_week);?>" placeholder="<?php echo esc_attr__('Any','aventura-plugin');?>" data-date-format="mm/dd/yyyy" type="text" name="date">
                        </div>

                    </div>
                    <?php
                }
                ?>

                <?php
                if ($tz_duration_option == 'show') {
                    ?>
                    <div class="form-group form-duration">
                        <label>
                            <?php
                            if($tz_duration_label != ''){
                                echo esc_html($tz_duration_label);
                            }else{
                                esc_html_e( 'Duration', 'aventura-plugin' );
                            }
                            ?>
                        </label>
                        <div class="field-box">
                            <select name="tour_length">
                                <option  value=""><?php esc_html_e('Any','aventura-plugin' ); ?></option>
                                <option  value="1"><?php esc_html_e('1 Day','aventura-plugin' ); ?></option>
                                <option  value="2"><?php esc_html_e('2 Days','aventura-plugin' ); ?></option>
                                <option  value="3"><?php esc_html_e('3 Days','aventura-plugin' ); ?></option>
                                <option  value="4"><?php esc_html_e('4 Days','aventura-plugin' ); ?></option>
                                <option  value="5"><?php esc_html_e('5 Days','aventura-plugin' ); ?></option>
                                <option  value="6"><?php esc_html_e('6 Days','aventura-plugin' ); ?></option>
                                <option  value="7"><?php esc_html_e('7 Days','aventura-plugin' ); ?></option>
                                <option  value="8"><?php esc_html_e('8 Days','aventura-plugin' ); ?></option>
                                <option  value="9"><?php esc_html_e('9 Days','aventura-plugin' ); ?></option>
                                <option  value="10"><?php esc_html_e('10 Days','aventura-plugin' ); ?></option>
                                <option  value="11"><?php esc_html_e('11 Days','aventura-plugin' ); ?></option>
                                <option  value="12"><?php esc_html_e('12 Days','aventura-plugin' ); ?></option>
                                <option  value="13"><?php esc_html_e('13 Days','aventura-plugin' ); ?></option>
                                <option  value="14"><?php esc_html_e('14 Days','aventura-plugin' ); ?></option>
                                <option  value="15"><?php esc_html_e('15 Days','aventura-plugin' ); ?></option>
                            </select>
                        </div>

                    </div>
                    <?php
                }
                ?>

                <?php
                if ($tz_category_option == 'show') {
                    ?>
                    <div class="form-group form-category">
                        <label>
                            <?php
                            if($tz_category_label != ''){
                                echo esc_html($tz_category_label);
                            }else{
                                esc_html_e( 'Category', 'aventura-plugin' );
                            }
                            ?>
                        </label>

                        <div class="field-box">
                            <select name="tour_categories[]">
                                <option  value=""><?php esc_html_e('Any','aventura-plugin' ); ?></option>
                                <?php
                                $aventura_all_tour_categoies = get_terms( 'tour-category', array('hide_empty' => 0) );
                                if ( ! empty( $aventura_all_tour_categoies ) ) :
                                    foreach ( $aventura_all_tour_categoies as $aventura_tour_category ) {
                                        echo '<option  value="' . esc_attr( $aventura_tour_category->term_id ) . '">'. esc_html( $aventura_tour_category->name ) .'</option>';
                                    }
                                endif;?>
                                ?>
                            </select>
                        </div>

                    </div>
                    <?php
                }
                ?>

                <?php
                if ($tz_language_option == 'show') {
                    ?>
                    <div class="form-group form-language">
                        <label>
                            <?php
                            if($tz_language_label != ''){
                                echo esc_html($tz_language_label);
                            }else{
                                esc_html_e( 'Language', 'aventura-plugin' );
                            }
                            ?>
                        </label>
                        <div class="field-box">
                            <select name="tour_languages[]">
                                <option  value=""><?php esc_html_e('Any','aventura-plugin' ); ?></option>
                                <?php
                                $aventura_all_tour_languages = get_terms( 'tour-language', array('hide_empty' => 0) );
                                if ( ! empty( $aventura_all_tour_languages ) ) :
                                    foreach ( $aventura_all_tour_languages as $aventura_tour_language ) {
                                        echo '<option  value="' . esc_attr( $aventura_tour_language->term_id ) . '">'. esc_html( $aventura_tour_language->name ) .'</option>';
                                    }
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="tzElement_search_submit">
                <button type="submit" class="btn btn-default tz-search-btn">
                    <?php
                    if($tz_button != ''){
                        echo esc_html($tz_button);
                    }else{
                        esc_html_e('Search','aventura-plugin' );
                    }
                    ?>
                </button>
            </div>
        </form>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                "use strict";

                //var lang = '<?php //echo substr(str_replace( '_', '-', get_locale()), 0, 2) ?>//';

                if ( jQuery('input.date-pick').length ) {

                    var lang = jQuery('input.date-pick').data('locale');
                    lang = lang.replace( '_', '-' );
                    var day_start_week = jQuery('input.date-pick').data('day-start-week');

                    jQuery('input.date-pick').datepicker({
                        startDate: "today",
                        language: lang,
                        autoclose: true,
                        weekStart: day_start_week,
                        disableTouchKeyboard: true
                    });
                }
            });
        </script>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('tz-search-tour','tzaventura_searchtour');
?>