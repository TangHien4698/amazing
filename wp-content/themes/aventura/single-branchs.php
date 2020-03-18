<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

global $aventura_options;
$aventura_branchs_sidebar   =   ((!isset($aventura_options['aventura_branchs_detail_sidebar'])) || empty($aventura_options['aventura_branchs_detail_sidebar'])) ? 'right' : $aventura_options['aventura_branchs_detail_sidebar'];
$aventura_branchs_map       =   ((!isset($aventura_options['aventura_branchs_detail_map'])) || empty($aventura_options['aventura_branchs_detail_map'])) ? '' : $aventura_options['aventura_branchs_detail_map'];
$aventura_branchs_image     =   ((!isset($aventura_options['aventura_branchs_detail_image'])) || empty($aventura_options['aventura_branchs_detail_image'])) ? '' : $aventura_options['aventura_branchs_detail_image'];
$aventura_branchs_info      =   ((!isset($aventura_options['aventura_branchs_detail_info'])) || empty($aventura_options['aventura_branchs_detail_info'])) ? '' : $aventura_options['aventura_branchs_detail_info'];
$aventura_branchs_content   =   ((!isset($aventura_options['aventura_branchs_detail_content'])) || empty($aventura_options['aventura_branchs_detail_content'])) ? '' : $aventura_options['aventura_branchs_detail_content'];

$aventura_branchs_class = '';
if($aventura_branchs_sidebar == 'left' || $aventura_branchs_sidebar == 'right'){
    $aventura_branchs_class = 'col-md-9';
}else{
    $aventura_branchs_class = 'col-md-12';
}

?>
<div class="tzBranchs-single">
    <div class="container">
        <div class="row">
            <?php
            if($aventura_branchs_sidebar == 'left') {
                get_sidebar();
            }
            ?>
            <div class="<?php echo esc_attr($aventura_branchs_class); ?>">
                <?php
                if(have_posts()) : while (have_posts()) : the_post();
                    $aventura_branchs_address = aventura_metabox('aventura_branchs_address','','','');
                    $aventura_branchs_phone   = aventura_metabox('aventura_branchs_phone','','','');
                    $aventura_branchs_email   = aventura_metabox('aventura_branchs_email','','','');
                    $aventura_branchs_messages = aventura_metabox('aventura_branchs_message','','','');

                    ?>

                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="tzBranchs-map">
                            <?php if($aventura_branchs_map == '1' && $aventura_branchs_address != ''):?>
                                <iframe width="100%" height="480" style="border:0" src="<?php echo esc_url('https://maps.google.com/maps?q='.$aventura_branchs_address.'&amp;ie=UTF8&amp;&amp;output=embed'); ?>" allowfullscreen></iframe>
                            <?php endif;?>
                        </div>
                        <div class="tzBranchs-bottom">
                            <?php if($aventura_branchs_image == '1' || $aventura_branchs_info == '1'):?>
                            <div class="tzBranchs-contact">
                                <div class="tzBranchs-contact-box">
                                    <?php if($aventura_branchs_image == '1' && has_post_thumbnail()):?>
                                        <div class="tzBranchs-image">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif;?>

                                    <?php if($aventura_branchs_info == '1'):?>

                                        <div class="tzBranchs-info">
                                            <?php if($aventura_branchs_address != ''): ?>
                                                <div class="tzBranchs-info-item tzBranchs-address">
                                                    <i class="fa fa-location-arrow"></i>
                                                    <div class="tzBranchs-info-content">
                                                        <?php echo esc_html($aventura_branchs_address); ?>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if($aventura_branchs_phone != ''):?>
                                                <div class="tzBranchs-info-item tzBranchs-phone">
                                                    <i class="fa fa-phone"></i>
                                                    <div class="tzBranchs-info-content">
                                                        <?php echo esc_html($aventura_branchs_phone); ?>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if($aventura_branchs_email != ''):?>
                                            <div class="tzBranchs-info-item tzBranchs-email">
                                                <i class="fa fa-envelope"></i>
                                                <div class="tzBranchs-info-content">
                                                    <?php echo esc_html($aventura_branchs_email); ?>
                                                </div>
                                            </div>
                                            <?php endif;?>
                                            <?php
                                            if($aventura_branchs_messages != ''):
                                                foreach($aventura_branchs_messages as $aventura_branchs_message):
                                                ?>
                                                    <div class="tzBranchs-info-item tzBranchs-message">
                                                        <i class="fa fa-calendar-check-o"></i>
                                                        <div class="tzBranchs-info-content">
                                                            <?php echo balanceTags($aventura_branchs_message); ?>
                                                        </div>
                                                    </div>
                                                <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </div>

                                    <?php endif;?>
                                </div>
                            </div>
                            <?php endif;?>

                            <?php if($aventura_branchs_content == '1'):?>
                            <div class="tzBranchs-content">
                                <h3><?php the_title(); ?></h3>
                                <?php
                                the_content();
                                wp_link_pages();
                                ?>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>

                    <div class="tzComments">
                        <?php comments_template( '', true ); ?>
                    </div><!-- end comments -->

                <?php endwhile; endif; ?>
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
