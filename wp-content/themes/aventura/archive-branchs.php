<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

global $aventura_options;
$aventura_branchs_sidebar = ((!isset($aventura_options['aventura_branchs_list_sidebar'])) || empty($aventura_options['aventura_branchs_list_sidebar'])) ? 'right' : $aventura_options['aventura_branchs_list_sidebar'];

$aventura_branchs_class = '';
if($aventura_branchs_sidebar == 'left' || $aventura_branchs_sidebar == 'right'){
    $aventura_branchs_class = 'col-md-9';
}else{
    $aventura_branchs_class = 'col-md-12';
}

?>
<div class="tzBranchs">
    <div class="container">
        <div class="row">
            <?php
            if($aventura_branchs_sidebar == 'left') {
                get_sidebar();
            }
            ?>
            <div class="tzBranchs-wrapper <?php echo esc_attr($aventura_branchs_class); ?>">
                <?php
                if(have_posts()) : while (have_posts()) : the_post();
                    $aventura_branchs_address = aventura_metabox('aventura_branchs_address','','','');
                    $aventura_branchs_phone   = aventura_metabox('aventura_branchs_phone','','','');
                    $aventura_branchs_email   = aventura_metabox('aventura_branchs_email','','','');
                    ?>
                    <div id="post-<?php the_ID();?>" <?php post_class();?>>
                        <div class="tzBranchs-column tzBranchs-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="tzBranchs-column tzBranchs-contact">
                            <span class="tzBranchs-address">
                                <i class="fa fa-location-arrow"></i>
                                <span><?php echo esc_html($aventura_branchs_address); ?></span>
                            </span>
                            <span class="tzBranchs-phone">
                                <i class="fa fa-phone"></i>
                                <span><?php echo esc_html($aventura_branchs_phone); ?></span>
                            </span>
                            <span class="tzBranchs-email">
                                <i class="fa fa-envelope"></i>
                                <span><?php echo esc_html($aventura_branchs_email); ?></span>
                            </span>
                        </div>
                        <div class="tzBranchs-column tzBranchs-info">
                            <h3 class="tzBranchs-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="tzBranchs-des">
                                <?php the_excerpt(); ?>
                            </div>
                            <a class="view-more" href="<?php the_permalink(); ?>"><?php echo esc_html__('View More','aventura');?></a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
                <?php aventura_paging_nav(); ?>
            </div>
            <?php
            if($aventura_branchs_sidebar == 'right') {
                get_sidebar();
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
