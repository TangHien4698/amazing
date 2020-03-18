<?php
global $aventura_options;
$aventura_breadcrumb_options   = ((!isset($aventura_options['aventura_breadcrumbs_options'])) || empty($aventura_options['aventura_breadcrumbs_options'])) ? '1' : $aventura_options['aventura_breadcrumbs_options'];
$aventura_bg_image             = ((!isset($aventura_options['aventura_breadcrumb_image'])) || empty($aventura_options['aventura_breadcrumb_image'])) ? '' : $aventura_options['aventura_breadcrumb_image'];
$aventura_title                = ((!isset($aventura_options['aventura_breadcrumbs_title'])) || empty($aventura_options['aventura_breadcrumbs_title'])) ? '1' : $aventura_options['aventura_breadcrumbs_title'];
$aventura_breadcrumb           = ((!isset($aventura_options['aventura_breadcrumbs_link'])) || empty($aventura_options['aventura_breadcrumbs_link'])) ? '1' : $aventura_options['aventura_breadcrumbs_link'];
$aventura_shop_bg_image        = ((!isset($aventura_options['aventura_shop_breadcrumb_image'])) || empty($aventura_options['aventura_shop_breadcrumb_image'])) ? '' : $aventura_options['aventura_shop_breadcrumb_image'];
$aventura_shop_detail_bg_image        = ((!isset($aventura_options['aventura_shop_detail_breadcrumb_image'])) || empty($aventura_options['aventura_shop_detail_breadcrumb_image'])) ? '' : $aventura_options['aventura_shop_detail_breadcrumb_image'];

$aventura_page_breadcrumb                   = aventura_metabox('aventura_breadcrumb_page_option','','','default');
$aventura_page_breadcrumb_options           = aventura_metabox('aventura_breadcrumb_page_show','','','1');
$aventura_page_bgimage                      = aventura_metabox('aventura_breadcrumb_page_bgimage','','','');
$aventura_page_breadcrumb_title             = aventura_metabox('aventura_breadcrumb_page_title','','','1');
$aventura_page_breadcrumb_path              = aventura_metabox('aventura_breadcrumb_page_path','','','1');
$aventura_page_breadcrumb_padding_top       = aventura_metabox('aventura_breadcrumb_page_padding_top','','','');
$aventura_page_breadcrumb_padding_bottom    = aventura_metabox('aventura_breadcrumb_page_padding_bottom','','','');

$aventura_breadcrumb_display = '';
$aventura_breadcrumb_style = '';
$aventura_breadcrumb_padding_style = '';
$aventura_breadcrumb_title = '';
$aventura_breadcrumb_path = '';

if(is_page() && $aventura_page_breadcrumb == 'custom'):
    $aventura_breadcrumb_display = $aventura_page_breadcrumb_options;


    if($aventura_page_bgimage != ''):
        foreach( $aventura_page_bgimage as $aventura_image ):
            $aventura_breadcrumb_style = 'style="background-image: url(' . $aventura_image["full_url"] .')"';
        endforeach;
    endif;

    if($aventura_page_breadcrumb_padding_top != '' || $aventura_page_breadcrumb_padding_bottom != ''):
        $aventura_breadcrumb_padding_style .= 'style="';

        if($aventura_page_breadcrumb_padding_top != ''):
            $aventura_breadcrumb_padding_style .= 'padding-top:' . $aventura_page_breadcrumb_padding_top . 'px;';
        endif;
        if($aventura_page_breadcrumb_padding_bottom != ''):
            $aventura_breadcrumb_padding_style .= 'padding-bottom:' . $aventura_page_breadcrumb_padding_bottom . 'px;';
        endif;
        $aventura_breadcrumb_padding_style .= '"';
    endif;

    $aventura_breadcrumb_title = $aventura_page_breadcrumb_title;
    $aventura_breadcrumb_path = $aventura_page_breadcrumb_path;

else:

    $aventura_breadcrumb_display = $aventura_breadcrumb_options;
    if( class_exists('WooCommerce') && is_woocommerce()){
        if( (is_shop() || is_product_category()) && $aventura_shop_bg_image != '' ){
            $aventura_breadcrumb_style = 'style="background-image: url(' . $aventura_shop_bg_image["url"] .')"';
        }elseif(is_product() && $aventura_shop_detail_bg_image != '' ){
            $aventura_breadcrumb_style = 'style="background-image: url(' . $aventura_shop_detail_bg_image["url"] .')"';
        }else{
            if($aventura_bg_image != ''):
                $aventura_breadcrumb_style = 'style="background-image: url(' . $aventura_bg_image["url"] .')"';
            endif;
        }
    }else{
        if($aventura_bg_image != ''):
            $aventura_breadcrumb_style = 'style="background-image: url(' . $aventura_bg_image["url"] .')"';
        endif;
    }
    $aventura_breadcrumb_title = $aventura_title;
    $aventura_breadcrumb_path = $aventura_breadcrumb;

endif;

?>
<?php
if($aventura_breadcrumb_display == '1'):
    ?>
    <div class="tz-Breadcrumb" <?php echo $aventura_breadcrumb_style;?>>
        <div class="tzOverlayBreadcrumb" <?php echo $aventura_breadcrumb_padding_style;?>>
            <div class="container">
                <?php
                if($aventura_breadcrumb_title == '1'):
                    ?>
                    <h1 <?php if(is_single()): ?> class="single-breadcrumb" <?php endif; ?>>
                    <span>
                        <?php
                        if( class_exists('WooCommerce') && is_woocommerce()){
                            if(is_product()){
                                the_title();
                            }else{
                                woocommerce_page_title();
                            }
                        }else {
                            if (is_category() || is_tax('tour-language') || is_tax('tour-category') || is_tax('branchs-category')) {
                                single_cat_title();
                            } elseif (is_author()) {
                                the_author();
                            } elseif (is_search()) {
                                echo get_search_query();
                            } elseif (is_tag()) {
                                echo single_tag_title();
                            } elseif (is_home()) {
                                single_post_title();
                            } elseif (is_404()) {
                                echo esc_html__('Error 404 - Page Not Found', 'aventura');
                            } elseif (is_archive()) {
                                if (is_day()) :
                                    printf(esc_html__('Archives %s', 'aventura'), '<span>' . get_the_date() . '</span>');
                                elseif (is_month()) :
                                    printf(esc_html__('Archives %s', 'aventura'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'aventura') . '</span>'));
                                elseif (is_year()) :
                                    printf(esc_html__('Archives %s', 'aventura'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'aventura') . '</span>'));
                                else :
//                                    esc_html_e('Archives', 'aventura');
                                    echo post_type_archive_title('', false);
                                endif;
                            } else {
                                single_post_title();
                            }
                        }
                        ?>
                    </span>
                    </h1>
                    <?php
                endif;
                ?>
                <?php
                if($aventura_breadcrumb_path == '1'):
                    aventura_breadcrumbs_custom();
                endif;
                ?>

            </div><!-- end class container -->
        </div>
    </div><!-- end class tzbreadcrumb -->
<?php endif;?>