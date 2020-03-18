<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $aventura_ID;
?>

<div class="tz-tour-orther-wrap">
    <div class="tz-tour-other">
        <h3><?php esc_html_e('Other Tours','aventura') ?></h3>
        <div class="row">
            <?php
            $aventura_args = array(
                'post_type'         => 'tour', // enter your custom post type
                'post_status'       => 'publish',
                'posts_per_page'    => 3,
                'orderby'           => 'date',
                'post__not_in'      => array($aventura_ID)
            );
            $aventura_query = new WP_Query( $aventura_args ) ;
            if ( $aventura_query -> have_posts() ): while ( $aventura_query -> have_posts() ): $aventura_query -> the_post() ;

                $aventura_other_gallery     =   aventura_metabox( 'aventura_tour_gallery','',get_the_ID(),'' );
                $aventura_other_discount    =   aventura_metabox( 'aventura_tour_discount','',get_the_ID(),'' );
                $aventura_other_duration    =   aventura_metabox( 'aventura_tour_duration','',get_the_ID(),'' );
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="tz-tour-item">
                        <a class="tz-other-thumb" href="<?php the_permalink(); ?>">
                            <?php
                            echo get_the_post_thumbnail(get_the_ID(),'large');
                            ?>
                        </a>
                        <?php if( $aventura_other_discount != 0 && $aventura_other_discount != '' ){ ?>
                            <div class="other-discount"><span><?php echo  esc_html($aventura_other_discount).esc_html__('% OFF','aventura');?></span></div>
                        <?php } ?>
                        <div class="other-title">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <span class="other-duration"><i class="fa fa-clock-o"></i><?php echo  esc_html('&nbsp;'.$aventura_other_duration);?></span>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>


