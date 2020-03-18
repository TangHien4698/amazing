<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $aventura_booking_sidebar,$aventura_type,$aventura_sidebar_class,$aventura_discount;

?>

<div class="tz-tour-title">
    <div class="container">
        <div class="row">
            <?php if( $aventura_booking_sidebar == 'left' || $aventura_type == 'booking_left' ){ ?>
                <!--Sidebar Filter Left -->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"></div>
                <!--End Sidebar Filter Left -->
            <?php } ?>
            <div class="<?php echo esc_attr($aventura_sidebar_class); ?> tz-position">
                <div class="tz-control-nav"></div>
                <div class="title">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                    <?php if( $aventura_discount != '' && $aventura_discount != 0 ){ ?>
                        <div class="discount"><?php echo  esc_html($aventura_discount).esc_html__('% Off','aventura');?></div>
                    <?php } ?>
                </div>
                <div class="tz-tour-review">
                    <?php
                    if( class_exists( 'Comment_Rating_Output' ) ):
                        $average_rating = get_post_meta( get_the_ID(), 'tz-average-rating', true );
                        if ( empty( $average_rating ) ) {
                            $average_rating = 0;
                        }
                        echo '<div class="tz-average-rating"><div class="tz-rating tz-rating-' . esc_attr($average_rating) . '"></div></div>';
                    endif;
                    ?>
                </div>
            </div>
            <?php if( $aventura_booking_sidebar == 'right' && $aventura_type != 'booking_left' && $aventura_type != 'booking_none' ){ ?>
                <!--Sidebar Filter right -->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"></div>
                <!--End Sidebar Filter right -->
            <?php } ?>
        </div>
    </div>
</div>
