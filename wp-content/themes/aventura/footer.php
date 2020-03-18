<?php
//Global variable redux
global $aventura_options;
$aventura_footer_theme_type    =   ((!isset($aventura_options ["aventura_footer_type"])) || empty($aventura_options ["aventura_footer_type"])) ? '0' : $aventura_options ["aventura_footer_type"];
$aventura_footer_col     =   ((!isset($aventura_options ["aventura_footer_column_col"])) || empty($aventura_options ["aventura_footer_column_col"])) ? '4' : $aventura_options ["aventura_footer_column_col"];
$aventura_footer_widthl  =   ((!isset($aventura_options ["aventura_footer_column_w1"])) || empty($aventura_options ["aventura_footer_column_w1"])) ? '3' : $aventura_options ["aventura_footer_column_w1"];
$aventura_footer_width2  =   ((!isset($aventura_options ["aventura_footer_column_w2"])) || empty($aventura_options ["aventura_footer_column_w2"])) ? '2' : $aventura_options ["aventura_footer_column_w2"];
$aventura_footer_width3  =   ((!isset($aventura_options ["aventura_footer_column_w3"])) || empty($aventura_options ["aventura_footer_column_w3"])) ? '4' : $aventura_options ["aventura_footer_column_w3"];
$aventura_footer_width4  =   ((!isset($aventura_options ["aventura_footer_column_w4"])) || empty($aventura_options ["aventura_footer_column_w4"])) ? '3' : $aventura_options ["aventura_footer_column_w4"];
$aventura_copyright      =   ((!isset($aventura_options ["aventura_footer_copyright_editor"])) || empty($aventura_options ["aventura_footer_copyright_editor"])) ? '' : $aventura_options ["aventura_footer_copyright_editor"];
$aventura_footer_logo_type_1 =   ((!isset($aventura_options ["aventura_footer_type_1_logo"]['url'])) || empty($aventura_options ["aventura_footer_type_1_logo"]['url'])) ? '' : $aventura_options ["aventura_footer_type_1_logo"]['url'];
$aventura_footer_logo_type_2 =   ((!isset($aventura_options ["aventura_footer_type_2_logo"]['url'])) || empty($aventura_options ["aventura_footer_type_2_logo"]['url'])) ? '' : $aventura_options ["aventura_footer_type_2_logo"]['url'];
$aventura_footer_link    =   ((!isset($aventura_options ["aventura_footer_link"])) || empty($aventura_options ["aventura_footer_link"])) ? '' : $aventura_options ["aventura_footer_link"];

$aventura_footer_page_option = aventura_metabox('aventura_footer_page_option','','','default');
$aventura_footer_page_select = aventura_metabox('aventura_footer_page_type','','','0');
$aventura_footer_type = '';

if(is_page() && $aventura_footer_page_option == 'custom'):
    $aventura_footer_type = $aventura_footer_page_select;
else:
    $aventura_footer_type = $aventura_footer_theme_type;
endif;

$aventura_footer_class = '';
if( $aventura_footer_type == '1'){
    $aventura_footer_class = 'tz-footer-type-2';
}else{
    $aventura_footer_class = 'tz-footer-type-1';
}

$aventura_footer_logo = '';
if($aventura_footer_type == '1'){
    $aventura_footer_logo = $aventura_footer_logo_type_2;
}else{
    $aventura_footer_logo = $aventura_footer_logo_type_1;
}

?>
<?php if( !is_page_template('template-homeslide.php')):?>
    <?php get_template_part('template_inc/inc','newsletter'); ?>
    <footer class="tz-footer <?php echo esc_attr($aventura_footer_class)?>">
        <?php
        if(is_active_sidebar("tz-plazart-footer-1") || is_active_sidebar("tz-plazart-footer-2") || is_active_sidebar("tz-plazart-footer-3") || is_active_sidebar("tz-plazart-footer-4") ){?>
        <div class="tz-footer-top">
            <div class="container">
                <div class="row">
                    <?php
                    for( $aventura_i=0; $aventura_i < $aventura_footer_col; $aventura_i++ ):
                        $aventura_j = $aventura_i +1;
                        if($aventura_i==0){
                            $aventura_col = $aventura_footer_widthl;
                        }elseif($aventura_i==1){
                            $aventura_col = $aventura_footer_width2;
                        }elseif($aventura_i==2){
                            $aventura_col = $aventura_footer_width3;
                        }elseif($aventura_i==3){
                            $aventura_col = $aventura_footer_width4;
                        }

                        ?>
                        <div class="col-md-<?php echo esc_attr($aventura_col); ?> col-sm-6 footerattr">
                            <?php
                            if(is_active_sidebar("tz-plazart-footer-".$aventura_j) ):
                                dynamic_sidebar("tz-plazart-footer-".$aventura_j);
                            endif;
                            ?>
                        </div><!--end class footermenu-->
                        <?php
                    endfor;
                    ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="tz-footer-bottom">
            <div class="container">
                <div class="tz-footer-bottom-box">
                    <div class="row">
                        <div class="tz-copyright col-md-4">
                            <?php if($aventura_copyright != ''):
                                echo ent2ncr($aventura_copyright);
                            else:
                                echo esc_html__('Copyright Aventura, All Right Reserved','aventura');
                            endif;
                            ?>
                        </div>
                        <div class="tz-footer-logo col-md-4">
                            <?php if($aventura_footer_logo != ''):?>

                                <img src="<?php echo esc_attr($aventura_footer_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('title'))?>"/>
                            <?php else: ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()).'/images/logo-2.png';?>" alt="<?php echo esc_attr(get_bloginfo('title'))?>"/>
                            <?php endif; ?>
                        </div>
                        <?php
                        if($aventura_footer_link == true){
                            ?>
                            <div class="tz-footer-link col-md-4">
                                <?php
                                // footer-menu
                                if (has_nav_menu('footer-menu')) {
                                    wp_nav_menu(array(
                                        'theme_location' => 'footer-menu',
                                        'menu_class' => '',
                                        'menu_id' => '',
                                        'container' => false
                                    ));
                                }
//                                if(is_active_sidebar('tz-plazart-link-footer')):
//                                    dynamic_sidebar("tz-plazart-link-footer");
//                                endif;
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="tz-form-booking-ajax-content"></div>
    <div class="tz-reviews-ajax-content"></div>
<?php endif;?>
<?php wp_footer(); ?>
</body>
</html>
