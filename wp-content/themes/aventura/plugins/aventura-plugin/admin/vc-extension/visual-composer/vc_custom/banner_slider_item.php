<?php
$args = array(
    "tz_type"               => "2",
    "tz_tour_post"          => "",
    "tz_title"              => "",
    "tz_country"            => "",
    "tz_description"        => "",
    "tz_price"              => "",
    "tz_link"               => "",
    "tz_button"             => "",

);
extract(shortcode_atts($args, $atts));
$tz_tour_array = explode(", ", $tz_tour_post);
$tz_tour_args = array(
    'post_type'             => 'tour',
    'posts_per_page'        => -1,
    'ignore_sticky_posts'   => 1,
    'post__in'              => $tz_tour_array,
);

?>
<?php if($tz_type == '2'){ ?>
    <div class="tzBannerItem">
        <?php if($tz_title != ''){ ?>
            <h3 class="tzBannerTitle"><?php echo esc_html($tz_title); ?></h3>
        <?php }
         if($tz_country != ''){ ?>
            <span class="tzBannerCountry"><?php echo esc_html($tz_country); ?></span>
        <?php }
        if($tz_description != ''){ ?>
            <p><?php echo esc_html($tz_description); ?></p>
        <?php }
        if($tz_price != ''){ ?>
            <span class="tzBannerPrice">
                <?php
                echo aventura_price($tz_price);
                ?>
                <small><?php echo esc_html__('avg/person','aventura-plugin'); ?></small>
            </span>
        <?php }
        if($tz_button != ''){
        ?>
            <a href="<?php echo esc_html($tz_link); ?>" class="tzBannerButton"><?php echo esc_html($tz_button);?></a>
        <?php } ?>
    </div>
<?php }elseif($tz_type == 1){?>
    <?php
    $tz_tour_query = new WP_Query($tz_tour_args);
    if($tz_tour_query -> have_posts()): while ($tz_tour_query -> have_posts()) : $tz_tour_query -> the_post();

        $aventura_discount      =   aventura_metabox( 'aventura_tour_discount','','','0' );
        $aventura_duration      =   aventura_metabox( 'aventura_tour_duration','','','' );
        $aventura_date          =   aventura_metabox( 'aventura_departure_date','','','' );
        $aventura_address       =   aventura_metabox( 'address','','','' );
        $aventura_adult_price   =   aventura_metabox( 'aventura_adult_price','','','0' );
        $aventura_child_price   =   aventura_metabox( 'aventura_child_price','','','0' );
        $aventura_destination   =   aventura_metabox( 'aventura_tour_destination','','','' );

        ?>
    <div class="tzBannerItem">
        <h3 class="tzBannerTitle"><?php the_title(); ?></h3>
        <?php if($aventura_address != ''){ ?>
            <span class="tzBannerCountry"><?php echo esc_html($aventura_address); ?></span>
        <?php } ?>
        <?php the_excerpt(); ?>

        <?php
        if($aventura_adult_price != '' || $aventura_child_price != ''):
            ?>
            <span class="tzBannerPrice">
                <?php
                if($aventura_adult_price != ''){
                    echo aventura_price($aventura_adult_price);
                }elseif($aventura_child_price != ''){
                    echo aventura_price($aventura_child_price);
                }
                ?>
                <small><?php echo esc_html__('avg/person','aventura-plugin'); ?></small>
            </span>
        <?php endif;?>
        <?php
        if($tz_button != ''){?>
            <a href="<?php echo esc_html($tz_link); ?>" class="tzBannerButton"><?php echo esc_html($tz_button);?></a>
        <?php } ?>
    </div>
        <?php endwhile; endif; ?>
<?php } ?>




