<?php
/*
 * Template Name: Template Home Slide
 */
?>
<?php

$aventura_top_email         =   ((!isset($aventura_options['aventura_logo_top_email'])) || empty($aventura_options['aventura_logo_top_email'])) ? '' : $aventura_options['aventura_logo_top_email'];
$aventura_top_phone         =   ((!isset($aventura_options['aventura_logo_top_phone'])) || empty($aventura_options['aventura_logo_top_phone'])) ? '' : $aventura_options['aventura_logo_top_phone'];
$aventura_top_address       =   ((!isset($aventura_options['aventura_logo_top_address'])) || empty($aventura_options['aventura_logo_top_address'])) ? '' : $aventura_options['aventura_logo_top_address'];
$aventura_top_randl         =   ((!isset($aventura_options['aventura_logo_top_randl'])) || empty($aventura_options['aventura_logo_top_randl'])) ? '' : $aventura_options['aventura_logo_top_randl'];

$aventura_logo_type         =   aventura_metabox( 'aventura_home_slide_logo_type','','','image' );
$aventura_logo_text         =   aventura_metabox( 'aventura_home_slide_logo_text','','','' );
$aventura_logo_image        =   aventura_metabox( 'aventura_home_slide_logo_image','','','' );
$aventura_slide             =   aventura_metabox( 'aventura_home_slide_revolution','','','' );

$aventura_search_option     =   aventura_metabox( 'aventura_home_slide_search_option','','','show' );

$aventura_field_name_option =   aventura_metabox( 'aventura_home_slide_search_field_name_option','','','show' );
$aventura_field_name_label  =   aventura_metabox( 'aventura_home_slide_search_field_name_label','','','' );

$aventura_field_destination_option =   aventura_metabox( 'aventura_home_slide_search_field_destination_option','','','show' );
$aventura_field_destination_label  =   aventura_metabox( 'aventura_home_slide_search_field_destination_label','','','' );

$aventura_field_date_option =   aventura_metabox( 'aventura_home_slide_search_field_date_option','','','show' );
$aventura_field_date_label  =   aventura_metabox( 'aventura_home_slide_search_field_date_label','','','' );

$aventura_field_duration_option =   aventura_metabox( 'aventura_home_slide_search_field_duration_option','','','show' );
$aventura_field_duration_label  =   aventura_metabox( 'aventura_home_slide_search_field_duration_label','','','' );

$aventura_field_category_option =   aventura_metabox( 'aventura_home_slide_search_field_category_option','','','hide' );
$aventura_field_category_label  =   aventura_metabox( 'aventura_home_slide_search_field_category_label','','','' );

$aventura_field_language_option =   aventura_metabox( 'aventura_home_slide_search_field_language_option','','','hide' );
$aventura_field_language_label  =   aventura_metabox( 'aventura_home_slide_search_field_language_label','','','' );

$aventura_field_search_button   =   aventura_metabox( 'aventura_home_slide_search_button','','','' );

get_header();
?>
<div class="tz-home-slide">
    <div class="tz-home-left">
        <div class="tz-home-left-box">
            <div class="tz-home-logo">
                <a class="tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                    <?php
                    if($aventura_logo_type == 'text'):
                        echo esc_html($aventura_logo_text);
                    else:
                        foreach($aventura_logo_image as $aventura_image) :
                            echo'<img src="'. esc_url($aventura_image['full_url']) .'" alt="'.get_bloginfo('title').'" />';
                        endforeach;
                    endif;
                    ?>
                </a>
            </div>

            <button class="navbar-toggle collapsed tz_icon_menu" type="button" data-target="#tz-main-menu" data-toggle="collapse">
                <i class="fa fa-bars"></i>
            </button>

            <nav class="nav-collapse vertical_menu">
                <?php

                if ( has_nav_menu('primary') ) :
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav navbar-nav collapse navbar-collapse main-menu',
                        'menu_id'        => 'tz-main-menu',
                        'container'      => false,
                    ) ) ;
                endif;

                ?>
            </nav>

            <div class="sidebar-home-slide">
                <?php
                if(is_active_sidebar("tz-sidebar-home-slide") ):
                    dynamic_sidebar("tz-sidebar-home-slide");
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="tz-home-right">
        <div class="tz-home-right-box">
            <div class="tz-home-head">
                <div class="top-left pull-left">
                    <?php if($aventura_top_phone != ''):?>
                        <a href="tel:<?php echo esc_url( $aventura_top_phone ); ?>">
                            <i class="fa fa-headphones"></i>
                            <?php echo esc_html('Call Center: '. $aventura_top_phone); ?>
                        </a>
                        <span>|</span>
                    <?php endif; ?>

                    <?php if($aventura_top_email != ''):?>
                        <a href="mailto:<?php echo esc_url($aventura_top_email); ?>">
                            <i class="fa fa-envelope"></i>
                            <?php echo esc_html($aventura_top_email); ?>
                        </a>
                    <?php endif; ?>

                </div>
                <div class="top-right pull-right">
                    <?php if($aventura_top_address != ''):?>
                        <a href="#">
                            <i class="fa fa-map-marker"></i>
                            <?php echo esc_html($aventura_top_address); ?>
                        </a>
                    <?php endif; ?>
                    <?php
                    if(!is_user_logged_in()):
                        if($aventura_top_randl == true):
                            ?>
                            <span>|</span>
                            <a href="<?php echo wp_login_url(); ?>">
                                <i class="fa fa-sign-in"></i>
                                <?php echo esc_html__('Login','aventura') ?>
                            </a>
                        <?php if (get_option('users_can_register') == 1) : ?>
                            <span>|</span>
                            <a href="<?php echo wp_registration_url(); ?>">
                                <i class="fa fa-user"></i>
                                <?php echo esc_html__('Register','aventura') ?>
                            </a>
                            <?php
                            endif;
                        endif;
                    else:
                        if($aventura_top_randl == true):
                            ?>
                            <span>|</span>
                            <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                <i class="fa fa-sign-out"></i>
                                <?php echo esc_html__('Logout','aventura'); ?>
                            </a>
                        <?php
                        endif;
                    endif;
                    ?>
                </div>
            </div>
            <div class="tz-home-content">
                <?php
                if($aventura_slide != ''):
                    putRevSlider($aventura_slide);
                endif;
                ?>
            </div>

            <?php
            if($aventura_search_option == 'show'):
            ?>
            <div class="tz-home-search">
                <span class="tz-search-tour-mobile"><?php echo esc_html__('Search Tour','aventura')?><i class="fa fa-angle-double-up"></i></span>
                <form class="tzElement_search_form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="tzElement_search_field">
                        <input type="hidden" name="post_type" value="tour">

                        <?php if($aventura_field_name_option == 'show'):?>
                            <div class="form-group form-name">
                                <label>
                                    <?php
                                    if($aventura_field_name_label != ''):
                                        echo esc_html($aventura_field_name_label);
                                    else:
                                        esc_html_e( 'Keywords', 'aventura' );
                                    endif;
                                    ?>
                                </label>
                                <div class="field-box">
                                    <input type="text" class="form-control" name="s" placeholder="<?php echo esc_attr__( 'Enter a keyword here','aventura' ) ?>">
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($aventura_field_destination_option == 'show'):?>

                            <div class="form-group form-destination">
                                <label>
                                    <?php
                                    if($aventura_field_destination_label != ''):
                                        echo esc_html($aventura_field_destination_label);
                                    else:
                                        esc_html_e( 'Destination', 'aventura' );
                                    endif;
                                    ?>
                                </label>

                                <div class="field-box">
                                    <select name="tour_destination[]">
                                        <option value=""><?php echo esc_html__('Any','aventura' ); ?></option>
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

                        <?php endif; ?>

                        <?php if($aventura_field_date_option == 'show'):?>
                            <div class="form-group form-date">
                                <label>
                                    <?php
                                    if($aventura_field_date_label != ''):
                                        echo esc_html($aventura_field_date_label);
                                    else:
                                        esc_html_e( 'Departure Date', 'aventura' );
                                    endif;
                                    ?>
                                </label>

                                <div class="field-box">
                                    <input class="date-pick form-control" placeholder="Any" data-date-format="mm/dd/yyyy" type="text" name="date">
                                </div>

                            </div>
                        <?php endif;?>

                        <?php if($aventura_field_duration_option == 'show'): ?>
                            <div class="form-group form-duration">
                                <label>
                                    <?php
                                    if($aventura_field_duration_label != ''):
                                        echo esc_html($aventura_field_duration_label);
                                    else:
                                        esc_html_e( 'Duration', 'aventura' );
                                    endif;
                                    ?>
                                </label>
                                <div class="field-box">
                                    <select name="tour_length">
                                        <option  value=""><?php esc_html_e('Any','aventura' ); ?></option>
                                        <option  value="1"><?php esc_html_e('1 Day','aventura' ); ?></option>
                                        <option  value="2"><?php esc_html_e('2 Days','aventura' ); ?></option>
                                        <option  value="3"><?php esc_html_e('3 Days','aventura' ); ?></option>
                                        <option  value="4"><?php esc_html_e('4 Days','aventura' ); ?></option>
                                        <option  value="5"><?php esc_html_e('5 Days','aventura' ); ?></option>
                                        <option  value="6"><?php esc_html_e('6 Days','aventura' ); ?></option>
                                        <option  value="7"><?php esc_html_e('7 Days','aventura' ); ?></option>
                                        <option  value="8"><?php esc_html_e('8 Days','aventura' ); ?></option>
                                        <option  value="9"><?php esc_html_e('9 Days','aventura' ); ?></option>
                                        <option  value="10"><?php esc_html_e('10 Days','aventura' ); ?></option>
                                        <option  value="11"><?php esc_html_e('11 Days','aventura' ); ?></option>
                                        <option  value="12"><?php esc_html_e('12 Days','aventura' ); ?></option>
                                        <option  value="13"><?php esc_html_e('13 Days','aventura' ); ?></option>
                                        <option  value="14"><?php esc_html_e('14 Days','aventura' ); ?></option>
                                        <option  value="15"><?php esc_html_e('15 Days','aventura' ); ?></option>
                                    </select>
                                </div>

                            </div>

                        <?php endif; ?>

                        <?php if($aventura_field_category_option == 'show'): ?>

                            <div class="form-group form-category">
                                <label>
                                    <?php
                                    if($aventura_field_category_label != ''):
                                        echo esc_html($aventura_field_category_label);
                                    else:
                                        esc_html_e( 'Category', 'aventura' );
                                    endif;
                                    ?>
                                </label>

                                <div class="field-box">
                                    <select name="tour_categories[]">
                                        <option  value=""><?php esc_html_e('Any','aventura' ); ?></option>
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

                        <?php endif; ?>
                        <?php if($aventura_field_language_option == 'show'): ?>
                            <div class="form-group form-language">
                                <label>
                                    <?php
                                    if($aventura_field_language_label != ''):
                                        echo esc_html($aventura_field_language_label);
                                    else:
                                        esc_html_e( 'Language', 'aventura' );
                                    endif;
                                    ?>
                                </label>
                                <div class="field-box">
                                    <select name="tour_languages[]">
                                        <option  value=""><?php esc_html_e('Any','aventura' ); ?></option>
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
                        <?php endif;?>

                    </div>

                    <div class="tzElement_search_submit">
                        <button type="submit" class="btn btn-default tz-search-btn">
                            <?php
                            if($aventura_field_search_button != ''):
                                echo esc_html($aventura_field_search_button);
                            else:
                                esc_html_e('Search','aventura' );
                            endif;
                            ?>
                        </button>
                    </div>
                </form>
            </div>

            <?php
            endif;
            ?>
        </div>
    </div>
</div>

<?php
if (have_posts()):
    while (have_posts()):the_post();
        the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aventura' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'aventura' ) . ' </span>%',
            'separator'   => '<span class="screen-reader-text">, </span>',
        ) );
    endwhile;
endif;
?>

<?php
get_footer();
?>