<?php
    if(!is_admin()):
        add_action('wp_enqueue_scripts','aventura_config_theme',99);

        function aventura_config_theme(){
            global $aventura_options;

            /* Typography Style 1 */
            $aventura_typography_1_selectors = ((!isset($aventura_options['aventura_typography_style_1_selectors'])) || empty($aventura_options['aventura_typography_style_1_selectors'])) ? '' : $aventura_options['aventura_typography_style_1_selectors'];
            $aventura_typography_1_font_family = ((!isset($aventura_options['aventura_typography_style_1_style']['font-family'])) || empty($aventura_options['aventura_typography_style_1_style']['font-family'])) ? '' : $aventura_options['aventura_typography_style_1_style']['font-family'];
            $aventura_typography_1_font_weight = ((!isset($aventura_options['aventura_typography_style_1_style']['font-weight'])) || empty($aventura_options['aventura_typography_style_1_style']['font-weight'])) ? '' : $aventura_options['aventura_typography_style_1_style']['font-weight'];
            $aventura_typography_1_font_size = ((!isset($aventura_options['aventura_typography_style_1_style']['font-size'])) || empty($aventura_options['aventura_typography_style_1_style']['font-size'])) ? '' : $aventura_options['aventura_typography_style_1_style']['font-size'];
            $aventura_typography_1_line_height = ((!isset($aventura_options['aventura_typography_style_1_style']['line-height'])) || empty($aventura_options['aventura_typography_style_1_style']['line-height'])) ? '' : $aventura_options['aventura_typography_style_1_style']['line-height'];
            $aventura_typography_1_color = ((!isset($aventura_options['aventura_typography_style_1_style']['color'])) || empty($aventura_options['aventura_typography_style_1_style']['color'])) ? '' : $aventura_options['aventura_typography_style_1_style']['color'];
            $aventura_typography_1_google = ((!isset($aventura_options['aventura_typography_style_1_style']['google'])) || empty($aventura_options['aventura_typography_style_1_style']['google'])) ? '' : $aventura_options['aventura_typography_style_1_style']['google'];
            $aventura_typography_1_text_align = ((!isset($aventura_options['aventura_typography_style_1_style']['text-align'])) || empty($aventura_options['aventura_typography_style_1_style']['text-align'])) ? '' : $aventura_options['aventura_typography_style_1_style']['text-align'];

            /* Typography Style 2 */
            $aventura_typography_2_selectors = ((!isset($aventura_options['aventura_typography_style_2_selectors'])) || empty($aventura_options['aventura_typography_style_2_selectors'])) ? '' : $$aventura_options['aventura_typography_style_2_selectors'];
            $aventura_typography_2_font_family = ((!isset($aventura_options['aventura_typography_style_2_style']['font-family'])) || empty($aventura_options['aventura_typography_style_2_style']['font-family'])) ? '' : $aventura_options['aventura_typography_style_2_style']['font-family'];
            $aventura_typography_2_font_weight = ((!isset($aventura_options['aventura_typography_style_2_style']['font-weight'])) || empty($aventura_options['aventura_typography_style_2_style']['font-weight'])) ? '' : $aventura_options['aventura_typography_style_2_style']['font-weight'];
            $aventura_typography_2_font_size = ((!isset($aventura_options['aventura_typography_style_2_style']['font-size'])) || empty($aventura_options['aventura_typography_style_2_style']['font-size'])) ? '' : $aventura_options['aventura_typography_style_2_style']['font-size'];
            $aventura_typography_2_line_height = ((!isset($aventura_options['aventura_typography_style_2_style']['line-height'])) || empty($aventura_options['aventura_typography_style_2_style']['line-height'])) ? '' : $aventura_options['aventura_typography_style_2_style']['line-height'];
            $aventura_typography_2_color = ((!isset($aventura_options['aventura_typography_style_2_style']['color'])) || empty($aventura_options['aventura_typography_style_2_style']['color'])) ? '' : $aventura_options['aventura_typography_style_2_style']['color'];
            $aventura_typography_2_google = ((!isset($aventura_options['aventura_typography_style_2_style']['google'])) || empty($aventura_options['aventura_typography_style_2_style']['google'])) ? '' : $aventura_options['aventura_typography_style_2_style']['google'];
            $aventura_typography_2_text_align = ((!isset($aventura_options['aventura_typography_style_2_style']['text-align'])) || empty($aventura_options['aventura_typography_style_2_style']['text-align'])) ? '' : $aventura_options['aventura_typography_style_2_style']['text-align'];

            /* Typography Style 3 */
            $aventura_typography_3_selectors = ((!isset($aventura_options['aventura_typography_style_3_selectors'])) || empty($aventura_options['aventura_typography_style_3_selectors'])) ? '' : $aventura_options['aventura_typography_style_3_selectors'];
            $aventura_typography_3_font_family = ((!isset($aventura_options['aventura_typography_style_3_style']['font-family'])) || empty($aventura_options['aventura_typography_style_3_style']['font-family'])) ? '' : $aventura_options['aventura_typography_style_3_style']['font-family'];
            $aventura_typography_3_font_weight = ((!isset($aventura_options['aventura_typography_style_3_style']['font-weight'])) || empty($aventura_options['aventura_typography_style_3_style']['font-weight'])) ? '' : $aventura_options['aventura_typography_style_3_style']['font-weight'];
            $aventura_typography_3_font_size = ((!isset($aventura_options['aventura_typography_style_3_style']['font-size'])) || empty($aventura_options['aventura_typography_style_3_style']['font-size'])) ? '' : $aventura_options['aventura_typography_style_3_style']['font-size'];
            $aventura_typography_3_line_height = ((!isset($aventura_options['aventura_typography_style_3_style']['line-height'])) || empty($aventura_options['aventura_typography_style_3_style']['line-height'])) ? '' : $aventura_options['aventura_typography_style_3_style']['line-height'];
            $aventura_typography_3_color = ((!isset($aventura_options['aventura_typography_style_3_style']['color'])) || empty($aventura_options['aventura_typography_style_3_style']['color'])) ? '' : $aventura_options['aventura_typography_style_3_style']['color'];
            $aventura_typography_3_google = ((!isset($aventura_options['aventura_typography_style_3_style']['google'])) || empty($aventura_options['aventura_typography_style_3_style']['google'])) ? '' : $aventura_options['aventura_typography_style_3_style']['google'];
            $aventura_typography_3_text_align = ((!isset($aventura_options['aventura_typography_style_3_style']['text-align'])) || empty($aventura_options['aventura_typography_style_3_style']['text-align'])) ? '' : $aventura_options['aventura_typography_style_3_style']['text-align'];

            /* Theme Color */

            $aventura_color_primary = ((!isset($aventura_options['aventura_theme_color_primary'])) || empty($aventura_options['aventura_theme_color_primary'])) ? '' : $aventura_options['aventura_theme_color_primary'];
            $aventura_color_button_1 = ((!isset($aventura_options['aventura_theme_color_button_1'])) || empty($aventura_options['aventura_theme_color_button_1'])) ? '' : $aventura_options['aventura_theme_color_button_1'];
            $aventura_color_button_2 = ((!isset($aventura_options['aventura_theme_color_button_2'])) || empty($aventura_options['aventura_theme_color_button_2'])) ? '' : $aventura_options['aventura_theme_color_button_2'];
            $aventura_color_icon = ((!isset($aventura_options['aventura_theme_color_icon'])) || empty($aventura_options['aventura_theme_color_icon'])) ? '' : $aventura_options['aventura_theme_color_icon'];
            $aventura_color_flag = ((!isset($aventura_options['aventura_theme_color_flag'])) || empty($aventura_options['aventura_theme_color_flag'])) ? '' : $aventura_options['aventura_theme_color_flag'];

            $aventura_custom_css = $aventura_options['aventura_custom_css_code'];
            $aventura_style='';

            if($aventura_typography_1_selectors != '' && ( $aventura_typography_1_font_family != '' || $aventura_typography_1_font_weight != '' || $aventura_typography_1_font_size != '' || $aventura_typography_1_line_height != '' || $aventura_typography_1_text_align != '' || $aventura_typography_1_color != '')):
                $aventura_style .= $aventura_typography_1_selectors .'{';
                if($aventura_typography_1_font_family !=''):
                    $aventura_style .='font-family:'. $aventura_typography_1_font_family .';';
                endif;
                if($aventura_typography_1_font_weight !=''):
                    $aventura_style .='font-weight:'. $aventura_typography_1_font_weight .';';
                endif;
                if($aventura_typography_1_font_size !=''):
                    $aventura_style .='font-size:'. $aventura_typography_1_font_size .';';
                endif;
                if($aventura_typography_1_line_height !=''):
                    $aventura_style .='line-height:'. $aventura_typography_1_line_height .';';
                endif;
                if($aventura_typography_1_text_align !=''):
                    $aventura_style .='text-align:'. $aventura_typography_1_text_align .';';
                endif;
                if($aventura_typography_1_color !=''):
                    $aventura_style .='color:'. $aventura_typography_1_color .';';
                endif;
                $aventura_style .='}';
            endif;

            if($aventura_typography_2_selectors != '' && ( $aventura_typography_2_font_family != '' || $aventura_typography_2_font_weight != '' || $aventura_typography_2_font_size != '' || $aventura_typography_2_line_height != '' || $aventura_typography_2_text_align != '' || $aventura_typography_2_color != '')):
                $aventura_style .= $aventura_typography_2_selectors .'{';
                if($aventura_typography_2_font_family !=''):
                    $aventura_style .='font-family:'. $aventura_typography_2_font_family .';';
                endif;
                if($aventura_typography_2_font_weight !=''):
                    $aventura_style .='font-weight:'. $aventura_typography_2_font_weight .';';
                endif;
                if($aventura_typography_2_font_size !=''):
                    $aventura_style .='font-size:'. $aventura_typography_2_font_size .';';
                endif;
                if($aventura_typography_2_line_height !=''):
                    $aventura_style .='line-height:'. $aventura_typography_2_line_height .';';
                endif;
                if($aventura_typography_2_text_align !=''):
                    $aventura_style .='text-align:'. $aventura_typography_2_text_align .';';
                endif;
                if($aventura_typography_2_color !=''):
                    $aventura_style .='color:'. $aventura_typography_2_color .';';
                endif;
                $aventura_style .='}';
            endif;

            if($aventura_typography_3_selectors != '' && ( $aventura_typography_3_font_family != '' || $aventura_typography_3_font_weight != '' || $aventura_typography_3_font_size != '' || $aventura_typography_3_line_height != '' || $aventura_typography_3_text_align != '' || $aventura_typography_3_color != '')):
                $aventura_style .= $aventura_typography_3_selectors .'{';
                if($aventura_typography_3_font_family !=''):
                    $aventura_style .='font-family:'. $aventura_typography_3_font_family .';';
                endif;
                if($aventura_typography_3_font_weight !=''):
                    $aventura_style .='font-weight:'. $aventura_typography_3_font_weight .';';
                endif;
                if($aventura_typography_3_font_size !=''):
                    $aventura_style .='font-size:'. $aventura_typography_3_font_size .';';
                endif;
                if($aventura_typography_3_line_height !=''):
                    $aventura_style .='line-height:'. $aventura_typography_3_line_height .';';
                endif;
                if($aventura_typography_3_text_align !=''):
                    $aventura_style .='text-align:'. $aventura_typography_3_text_align .';';
                endif;
                if($aventura_typography_3_color !=''):
                    $aventura_style .='color:'. $aventura_typography_3_color .';';
                endif;
                $aventura_style .='}';
            endif;

            if($aventura_color_primary != ''):
                /* background color */
                $aventura_style .= '.tz-top,
                .tzElement_Destination.type-1 .destination-top .view-more,
                .tzElement_Destination.type-1 .destination-slider .distination-item .content .tz-view-more,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button a,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .tz-wishlist a.btn-remove-wishlist,
                .tzElement_Banner_Container .tzBannerItemOverlay .tzBannerSlider .tzBannerItem .tzBannerButton,
                .tzElement_Articles .Articles-top .view-more,
                .tzElement_Articles .tzArticle-item:hover .info,
                .tzElement_FeaturedTour.type-2 .tzTour-top .view-more,
                .tzElement_About .tzContent_About .button-about,
                .tz-home-slide .tz-home-right .tz-home-right-box .tz-home-search form.tzElement_search_form .tzElement_search_submit .tz-search-btn:hover,
                .tzElement_LatestTour.type-2 .tzLatest-top,
                .tz-tour-archive .tz-tour-sort .styled-select-filters .select-styled:hover::after,
                .tz-tour-archive .tz-tour-sort .styled-select-filters .select-styled:active::after,
                .tz-tour-archive .tz-tour-sort .styled-select-filters .select-styled:focus::after,
                .tz-tour-archive .tz-tour-sort .styled-select-filters .select-styled.active::after,
                .tz-tour-archive .tz-tour-sort .type-btn:hover,
                .tz-tour-archive .tz-tour-sort .type-btn.active,
                .tz-tour-archive .tz-tour-pagination ul li span.current,
                .tz-tour-archive .tz-tour-pagination ul li a:hover,
                .tz-tour-archive .tz-sidebar-filter .filter-item .filter-btn,
                .tz-tour-archive .tz-sidebar-filter .filter-item ul li label.checked,
                .tz-tour-archive .tz-sidebar-filter .filter-item ul li label:hover,
                .tz-tour-archive .tz-sidebar-filter .filter-item h5::after,
                .tz-tour-single .tz-tour-head .tz-tour-thumbnail .flex-control-paging li a::before,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-booking-head .tz-tour-contact-number,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input.wpcf7-submit,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews  .comment-form input.submit,
                .tzElement_Destination.type-4 .distination-item .content .tz-view-more,
                .tz-blog .blog-wrapper .tz-blog-item .tz-sticky-post,
                .navigation span.current,
                .navigation a:hover,
                .tz-sidebar .widget.widget_newsletterwidget .tnp-widget form .tnp-field-button input,
                .tz-sidebar .widget.widget_tag_cloud .tagcloud a:hover,
                .tz-blog-single .tzComments .comments-area .comment-respond .comment-form .form-submit .submit,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .readmore,
                .tz_page_content .tz-about-text::after,
                .tz_page_content #tz-button .vc_btn3,
                .wpcf7-form input.wpcf7-submit,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .tz-tour-price,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .book-now,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .readmore,
                .tz-reviews-ajax-content .reviews a.permalink,
                .tz-tour-cart .actions a:hover,
                .tz-tour-cart .book-now-btn:hover,
                .tz-tour-checkout .tz_payment .tz_paypal .book-now-btn,
                .tz-newsletter,
                .tz-top-slider .tz-top-search-wrap .tz-top-search form.tzElement_search_form .tzElement_search_submit .tz-search-btn,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-button a,
                .tzElement_FeaturedTour.type-5 .tzTour .tzTour-item .tzTour-item-box .tzTour-info .tz-button a,
                .tz-newsletter.tz-newsletter-type-2 .newsletter-right form .tnp-field-button input.tnp-button,
                .tzBranchs .tzBranchs-wrapper .tz-blog-item .tzBranchs-column.tzBranchs-info a.view-more,
                .tzBranchs-single .tz-blog-single-item .tzBranchs-bottom .tzBranchs-contact .tzBranchs-contact-box .tzBranchs-info,
                .tzBranchs-single .tzComments .comments-area .comment-respond .comment-form .form-submit .submit,
                .tz-shop-detail-wrapper .tz-shop-content div.product div.summary form.cart .button,
                .tz-shop-detail-wrapper .tz-shop-content div.product .panel #reviews #review_form #respond form.comment-form .form-submit input,
                .woocommerce .products ul.products li .tz-shop-product-thumb .tz-shop-product-button a.button,
                .woocommerce form.woocommerce-cart-form table.shop_table tbody tr td.actions .button,
                .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a.checkout-button,
                .woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment .place-order button#place_order,
                .tz-shop-wrapper .tz-shop-content ul.products li .tz-shop-product-thumb .tz-shop-product-button a.button,
                .tz-shop-wrapper .tz-shop-content nav.woocommerce-pagination ul.page-numbers li span.page-numbers.current,
                .tz-shop-wrapper .tz-shop-content nav.woocommerce-pagination ul.page-numbers li a.page-numbers:hover,
                .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount button.button,
                .tz-sidebar .widget.widget_product_search form.woocommerce-product-search button[type="submit"],
                .tz-destination-single .destination-tour h3 a,
                .tz-destination-single .destination-tour:after,
                .tz-tour-single .tz-tour-head .tz-tour-title .flex-control-paging li a:before,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary form.cart .button,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary .xoo-qv-plink a';
                $aventura_style .='{background-color:'. $aventura_color_primary .'}';



                /* background opacity */
                $aventura_style .= '.tzElement_Hotline .tzHotlineOverlay,
                .tzOur-team .tzOur-teamItem:hover .tz-bg a .tz-overlay::after';
                $aventura_style .='{background-color:rgba('. aventura_hex2rgb($aventura_color_primary,0.8) .')}';

                /* color */
                $aventura_style .= '.tz-header nav ul.tz-nav > li > a::before,.tz-header nav ul.tz-nav > li > a::after,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-date .content p,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-destination .content p,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-price .price,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-price .price .currency-symbol,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .tz-wishlist a.btn-add-wishlist:hover i,
                .tzElement_LatestTour.type-1 .tzLatest-item .tz-info .tz-price span,
                .tz-footer .tz-footer-top .footerattr .widget.dw_twitter .dw-twitter-inner .tweet-item::after,
                .tz-footer .tz-footer-top .footerattr .widget.dw_twitter .dw-twitter-inner .tweet-item .tweet-content a,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzTour-info .tz-price .price,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzTour-info .tz-price .price .currency-symbol,
                .tz-home-slide .tz-home-left .tz-home-left-box nav.vertical_menu ul.main-menu li .icon_menu_item_mobile,
                .tz-home-slide .tz-home-left .tz-home-left-box .sidebar-home-slide aside.widget a,
                .tz-home-slide .tz-home-left .tz-home-left-box .sidebar-home-slide aside.widget .tzwidget-social a:hover,
                .tz-home-slide .tz-home-left .tz-home-left-box nav.vertical_menu ul.main-menu li ul.sub-menu li.menu-item-has-children::after,
                .tzElement_Search form.tzElement_search_form .tzElement_search_submit .tz-search-btn,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-date .content p,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-destination .content p,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-duration .content p,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .owl-nav .owl-next:hover::before,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .owl-nav .owl-prev:hover::before,
                .tz-blog-single .tz-blog-thumbnail .content .tz-blog-meta span i,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-price .price,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-price .price,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tz-tour-archive .tz-sidebar-filter .filter-item.search_results p i,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-title h4 a:hover,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews ol li .comment-content .content a,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews  .comment-form a,
                .tz-blog .blog-wrapper .tz-blog-item .tz-blog-content .tz-blog-title a:hover,
                .tz-blog .blog-wrapper .tz-blog-item .tz-blog-content .tz-blog-meta span i,
                .tz-blog .blog-wrapper .tz-blog-item .tz-blog-content .tz-blog-meta span a:hover,
                .tz-sidebar .widget.tz-recent-w ul li .tz-recent-content span i,
                .tz-sidebar .widget.widget_archive ul li,
                .tz-blog-single .tz-blog-thumbnail .content .tz-blog-meta span i,
                .tz-blog-single .tz-blog-single-item .tz-blog-content .tz-blog-share a:hover,
                .tz-blog-single .author .author-item .author-infor .social-author a:hover,
                .tz-blog-single .relatedposts .related .related-item .related-content .title a:hover,
                .tz-blog-single .tzComments .comments-area .comment-list .comments .comment-content h5 a,
                .tz-blog-single .tzComments .comments-area .comment-list .comments .comment-content .content .comment-edit-link,
                .tz-blog-single .tzComments .comments-area .comment-list .comments .comment-content .content .comment-reply-link,
                .tz-wishlist.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-date p,
                .tz-wishlist.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-depature p,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-price .price,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tzOur-team .tzOur-teamItem .tz-content .tz-social a:hover,
                .tz_page_content .vc_pie_chart .tz-button:hover,
                .tzElement_Customer_Container .tzCustomerItem .content h3,
                .tz-tour-archive .tz-tour-content.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-date p,
                .tz-tour-archive .tz-tour-content.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-depature p,
                .tz-tour-cart table tbody tr p.total strong,
                .tz-tour-checkout .tz_order .box .box-item.total .price,
                .tparrows.tp-leftarrow:hover:before,
                .tparrows.tp-rightarrow:hover:before,
                .tzElement_Banner_Container .tzBannerItemOverlay .tzBannerSlider .owl-nav .owl-prev:hover:before,
                .tzElement_Banner_Container .tzBannerItemOverlay .tzBannerSlider .owl-nav .owl-next:hover:before,
                .tz-home-slide .tz-home-right .tz-home-right-box .tz-home-content .rev_slider_wrapper ul li a:hover,
                .tzElement_Destination.type-5 .destination-slider .distination-item .tz-destination-item-child .tz-destination-item-box .content h3 a:hover,
                .tzElement_Latest_Posts .tzElement_latest_Slide .tz_latest_item .tz_latest_item_child .tz_latest_item_box .tz_latest_info h3.tz_latest_title a:hover,
                .tzElement_FeaturedTour.type-5 .tzTour .tzTour-item .tzTour-item-box .tzTour-info .tzTour-info-right span.price,
                .tz-sidebar .widget.tz-instagram-feed .clear a,
                .tzBranchs .tzBranchs-wrapper .tz-blog-item .tzBranchs-column.tzBranchs-info h3.tzBranchs-title a:hover,
                .tz-shop-detail-wrapper .tz-shop-content div.product div.summary .price span,
                .tz-shop-detail-wrapper .tz-shop-content div.product .panel #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__author,
                .woocommerce .products ul.products li span.price span,
                .woocommerce-checkout .woocommerce .woocommerce-info a,
                .woocommerce-checkout .woocommerce .woocommerce-info:before,
                .tz-shop-wrapper .tz-shop-content ul.products li span.price span,
                .tz-shop-wrapper .tz-shop-content ul.products li h2.woocommerce-loop-product__title a:hover,
                .tz-sidebar .widget ul.product_list_widget li span.amount,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .content .tour-info .tour-info-box .tour-info-column .tour-info-item i,
                .tz-tour-confirm .form_title h3 i,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-title h4 a:hover,
                .woocommerce .products ul.products li h2.woocommerce-loop-product__title a:hover,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary .price span,
                .woocommerce .cart-collaterals .cart_totals table.shop_table tbody tr td form.woocommerce-shipping-calculator a:hover';
                $aventura_style .='{color:'. $aventura_color_primary .'}';

                $aventura_style .= '.woocommerce form.woocommerce-cart-form table.shop_table tbody tr td.product-remove a:hover';
                $aventura_style .='{color:'. $aventura_color_primary .' !important}';

                /* border color */
                $aventura_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .tz-wishlist a.btn-add-wishlist:hover,
                .tzElement_About .tzContent_About .about-us::after,
                .tz-tour-archive .tz-tour-sort .type-btn:hover,
                .tz-tour-archive .tz-tour-sort .type-btn.active,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tz-tour-archive .tz-tour-pagination ul li span.current,
                .tz-tour-archive .tz-tour-pagination ul li a:hover,
                .tz-tour-archive .tz-sidebar-filter .filter-item ul li label.checked,
                .tz-tour-archive .tz-sidebar-filter .filter-item ul li label:hover,
                .tz-blog .blog-wrapper .tz-blog-item .tz-blog-content::after,
                .navigation a:hover,
                .tz-sidebar .widget h3.title-widget::after,
                .tz-blog-single .relatedposts::after,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tzElement_Customer_Container .owl-dots .owl-dot.active span,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form input:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form select:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form textarea:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form input:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form select:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form textarea:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form input:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form select:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form textarea:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form select:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form textarea:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form select:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form textarea:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form select:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form textarea:focus,
                .tz-tour-cart table thead tr th,
                .tz-tour-checkout .form_content .form-group input:hover,
                .tz-tour-checkout .form_content .form-group select:hover,
                .tz-tour-checkout .form_content .form-group input:active,
                .tz-tour-checkout .form_content .form-group select:active,
                .tz-tour-checkout .form_content .form-group input:focus,
                .tz-tour-checkout .form_content .form-group select:focus,
                .woocommerce form.woocommerce-cart-form table.shop_table thead tr th,
                .woocommerce-checkout .woocommerce .woocommerce-info,
                .tz-tour-confirm .form_title,
                .tz-shop-wrapper .tz-shop-content nav.woocommerce-pagination ul.page-numbers li span.page-numbers.current,
                .tz-shop-wrapper .tz-shop-content nav.woocommerce-pagination ul.page-numbers li a.page-numbers:hover';
                $aventura_style .='{border-color:'. $aventura_color_primary .'}';

                $aventura_style .= '.tz-blog .blog-wrapper .tz-blog-item .tz-sticky-post::before,
                .tz-blog .blog-wrapper .tz-blog-item .tz-sticky-post::after,
                .tz-shop-detail-wrapper .tz-shop-content div.product .woocommerce-tabs ul.tabs li.active';
                $aventura_style .='{border-top-color:'. $aventura_color_primary .'}';

                $aventura_style .= '.tz-sidebar .widget.widget_search form input.Tzsearchform';
                $aventura_style .='{border-color:rgba('. aventura_hex2rgb($aventura_color_primary,0.3) .')}';

                /* hover */
                $aventura_brightness = -0.9; // 90% darker
                $aventura_color_hover = aventura_colourBrightness($aventura_color_primary,$aventura_brightness);
                $aventura_style .= '.tzElement_Destination.type-1 .destination-top .view-more:hover,
                .tzElement_Destination.type-1 .destination-slider .distination-item .content .tz-view-more:hover,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button a:hover,
                .tzElement_Banner_Container .tzBannerItemOverlay .tzBannerSlider .tzBannerItem .tzBannerButton:hover,
                .tzElement_Articles .Articles-top .view-more:hover,
                .tzElement_FeaturedTour.type-2 .tzTour-top .view-more:hover,
                .tzElement_About .tzContent_About .button-about:hover,
                .tz-tour-archive .tz-sidebar-filter .filter-item .filter-btn:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input.wpcf7-submit:hover,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews  .comment-form input.submit:hover,
                .tzElement_Destination.type-4 .distination-item .content .tz-view-more:hover,
                .tz-sidebar .widget.widget_newsletterwidget .tnp-widget form .tnp-field-button input:hover,
                .tz-blog-single .tzComments .comments-area .comment-respond .comment-form .form-submit .submit:hover,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .readmore:hover,
                .tz_page_content #tz-button .vc_btn3:hover,
                .wpcf7-form input.wpcf7-submit:hover,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .book-now:hover,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .readmore:hover,
                .tz-reviews-ajax-content .reviews a.permalink:hover,
                .tz-tour-checkout .tz_payment .tz_paypal .book-now-btn:hover,
                .tz-top-slider .tz-top-search-wrap .tz-top-search form.tzElement_search_form .tzElement_search_submit .tz-search-btn:hover,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-button a:hover,
                .tzElement_FeaturedTour.type-5 .tzTour .tzTour-item .tzTour-item-box .tzTour-info .tz-button a:hover,
                .tz-newsletter.tz-newsletter-type-2 .newsletter-right form .tnp-field-button input.tnp-button:hover,
                .tzBranchs .tzBranchs-wrapper .tz-blog-item .tzBranchs-column.tzBranchs-info a.view-more:hover,
                .tzBranchs-single .tzComments .comments-area .comment-respond .comment-form .form-submit .submit:hover,
                .tz-shop-detail-wrapper .tz-shop-content div.product .panel #reviews #review_form #respond form.comment-form .form-submit input:hover,
                .woocommerce .products ul.products li .tz-shop-product-thumb .tz-shop-product-button a.button:hover,
                .tz-shop-detail-wrapper .tz-shop-content div.product div.summary form.cart .button:hover,
                .woocommerce form.woocommerce-cart-form table.shop_table tbody tr td.actions .button:hover,
                .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a.checkout-button:hover,
                .woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment .place-order button#place_order:hover,
                .tz-shop-wrapper .tz-shop-content ul.products li .tz-shop-product-thumb .tz-shop-product-button a.button:hover,
                .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount button.button:hover,
                .tz-sidebar .widget.widget_product_search form.woocommerce-product-search button[type="submit"]:hover,
                .tz-destination-single .destination-tour h3 a:hover,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary form.cart .button:hover,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary .xoo-qv-plink a:hover';
                $aventura_style .='{background-color:'. $aventura_color_hover .'}';
            endif;

            if($aventura_color_button_1 != ''):
                /* background color */
                $aventura_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .review,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .review,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .view,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .view,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .review,
                .tz-tour-archive .range-slider .incl-range,
                a.xoo-qv-button,
                .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .price_slider.ui-slider-horizontal .ui-slider-range';
                $aventura_style .='{background-color:'. $aventura_color_button_1 .'}';

                /* hover */
                $aventura_brightness_1 = -0.85; // 90% darker
                $aventura_color_hover_1 = aventura_colourBrightness($aventura_color_button_1,$aventura_brightness_1);
                $aventura_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .review:hover,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .review:hover,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .review:hover,
                a.xoo-qv-button:hover';

                $aventura_style .='{background-color:'. $aventura_color_hover_1 .'}';
            endif;


            if($aventura_color_button_2 != ''):
                /* background color */
                $aventura_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .booking,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzImg-tour .tz-thumb .tz-tour-sold-out,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzImg-tour .tz-thumb .tz-tour-sold-out,
                .tzElement_FeaturedTour.type-5 .tzTour .tzTour-item .tzTour-item-box .tzImg-tour .tz-thumb .tz-tour-sold-out,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-thumb .tz-tour-sold-out,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-thumb .tz-tour-sold-out,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .booking,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .booking,
                 .tz-tour-single .tz-tour-content .tz-tour-booking .btn-external,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .book-now,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-button .booking,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-button .tz-price,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .booking,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-button a.more-tour';
                $aventura_style .='{background-color:'. $aventura_color_button_2 .'}';

                /* hover */
                $aventura_brightness_2 = -0.9; // 90% darker
                $aventura_color_hover_2 = aventura_colourBrightness($aventura_color_button_2,$aventura_brightness_2);
                $aventura_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .booking:hover,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .booking:hover,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .booking:hover,
                 .tz-tour-single .tz-tour-content .tz-tour-booking .btn-external:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .book-now:hover,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-button .booking:hover,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .booking:hover,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-button a.more-tour:hover';

                $aventura_style .='{background-color:'. $aventura_color_hover_2 .'}';
            endif;

            if($aventura_color_icon != ''):
                /* color */
                $aventura_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-title span i,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-destination .icon,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzTour-info .tz-title span i,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-date .icon,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-destination .icon,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-duration .icon,
                .tzElement_LatestTour.type-2 .latest-slider .tzLatest-item .tz-info .tz-title span i,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-title span i,
                .tz-tour-archive .tz-tour-content.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-date .icon,
                .tz-tour-archive .tz-tour-content.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-depature .icon,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-date .icon,
                .tz-tour-single .tz-tour-other .tz-tour-item .other-title span i,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-title span i,
                .tz-wishlist.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-date .icon,
                .tz-wishlist.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-depature .icon,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-address i,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-duration i,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-price i';
                $aventura_style .='{color:'. $aventura_color_icon .'}';

                /* background color */
                $aventura_style .= '.tz-tour-archive .tz-sidebar-filter .filter-item.search-filter .form-group .departure-date::after,
                .tz-tour-archive .tz-sidebar-filter .filter-item .select-styled::after,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .book-departure-date::after,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .st_adults_children .input-number-ticket .input-number-decrement,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .st_adults_children .input-number-ticket .input-number-increment,
                .tz-tour-cart table tbody tr .input-number-ticket .input-number-decrement,
                .tz-tour-cart table tbody tr .input-number-ticket .input-number-increment,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-title .trend,
                .tz-tour-archive .tz-sidebar-filter .filter-item .select-styled:after,
                .tz-tour-archive .tz-sidebar-filter .filter-item.search-filter .form-group .departure-date:after,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .book-departure-date::after,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .st_adults_children .input-number-ticket .input-number-decrement,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .st_adults_children .input-number-ticket .input-number-increment,
                .tz-tour-archive input[type=range]::-moz-range-thumb';
                $aventura_style .='{background-color:'. $aventura_color_icon .'}';

                $aventura_style .= '.tz-tour-archive input[type=range]::-webkit-slider-thumb';
                $aventura_style .='{background-color:'. $aventura_color_icon .'}';

                $aventura_style .= '.tz-tour-archive input[type=range]::-ms-thumb';
                $aventura_style .='{background-color:'. $aventura_color_icon .'}';

            endif;

            if($aventura_color_flag != ''):
                /* background color */
                $aventura_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzImg-tour .discount,
                .tzElement_LatestTour.type-1 .tzLatest-item .tz-thumb .discount,
                .tzElement_LatestTour.type-2 .tzLatest-top .view-more,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzImg-tour .discount,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .discount span,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .discount span,
                .tz-tour-single .tz-tour-other .tz-tour-item .other-discount span,
                .tz-wishlist .tz-tour-item .item-content .discount span';
                $aventura_style .='{background-color:'. $aventura_color_flag .'}';

                $aventura_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzImg-tour .discount::before,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzImg-tour .discount::after,
                .tzElement_LatestTour.type-1 .tzLatest-item .tz-thumb .discount::before,
                .tzElement_LatestTour.type-1 .tzLatest-item .tz-thumb .discount::after,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzImg-tour .discount::before,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzImg-tour .discount::after,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .discount::before,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .discount::after,
                .tz-tour-single .tz-tour-other .tz-tour-item .other-discount::before,
                .tz-tour-single .tz-tour-other .tz-tour-item .other-discount::after,
                .tz-wishlist .tz-tour-item .item-content .discount::before,
                .tz-wishlist .tz-tour-item .item-content .discount::after,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .discount:before,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .discount:after';
                $aventura_style .='{border-left-color:'. $aventura_color_flag .'}';
            endif;

            if($aventura_custom_css !=''){
                $aventura_style .= $aventura_custom_css;
            }

            if (!empty($aventura_style)){
                if(!is_child_theme()){
                    wp_add_inline_style( 'aventura-style', $aventura_style);
                }else{
                    wp_add_inline_style( 'aventura-child-style', $aventura_style);
                }
            }

            if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
                global $aventura_options;
                $aventura_favicon = $aventura_options['aventura_favicon_upload']['url'];
                if( $aventura_favicon ){
                    echo '<link rel="shortcut icon" href="' . esc_url($aventura_favicon) . '" type="image/x-icon" />';
                }
            }
        }
    endif;
?>