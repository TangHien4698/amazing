"use strict";

jQuery(window).load(function(){

    jQuery('#tzloadding').remove();

    jQuery('.tz_icon_search').on('click',function(){
        jQuery(this).parent().find('.tz-header-search-form').addClass('tz-header-search-form-show');
        //jQuery('.tz-header-search-form').addClass('tz-header-search-form-show');
        jQuery(this).css('display','none');
        jQuery(this).parent().find('.tz_icon_close').css('display','block');
    });
    jQuery('.icon_close').on('click',function(){
        jQuery(this).parent().find('.tz-header-search-form').removeClass('tz-header-search-form-show');
        jQuery(this).parent().find('.tz_icon_search').css('display','block');
        jQuery(this).css('display','none');
    });

    /*  JS Scroll Menu  */
    jQuery(window).scroll(function(){
        "use strict";

        var $_scrollTop     = jQuery(window).scrollTop();

        var tz_top          = jQuery('.tz-top');
        var $_height_top    = 0;
        if( tz_top.length ){
            $_height_top    = tz_top.height();
        }

        var tz_top_slider          = jQuery('.tz-top-slider');
        var $_height_top_slider    = 0;
        if( tz_top_slider.length ){
            $_height_top_slider    = tz_top_slider.height();
        }

        var header          = jQuery('.tz-header');
        var $_height_header = 0;
        if( header.length ){
            $_height_header = header.height();
        }

        var h_scroll        = Math.floor($_height_header + $_height_top + 150);
        var h_scroll_5      = Math.floor($_height_header + $_height_top_slider + 150);


        if ($_scrollTop > 0) {
            jQuery('.header-type-2').addClass('tz-headereff');
        } else {
            jQuery('.header-type-2').removeClass('tz-headereff');
        }

        if($_scrollTop > h_scroll){
            jQuery('.header-type-1.scroll').addClass("active");
        }else{
            jQuery('.header-type-1.scroll').removeClass("active");
        }
        if($_scrollTop > $_height_top){
            /*jQuery('.tz-header').addClass('tz-headereff');*/
            jQuery('.header-type-3').addClass('tz-headereff');
            jQuery('.header-type-4').addClass('tz-headereff');
        }else{
            /*jQuery('.tz-header').removeClass('tz-headereff');*/
            jQuery('.header-type-3').removeClass('tz-headereff');
            jQuery('.header-type-4').removeClass('tz-headereff');
        }

        if($_scrollTop > h_scroll_5){
            jQuery('.header-type-1.scroll').addClass("active");
        }else{
            jQuery('.header-type-1.scroll').removeClass("active");
        }
    });

    /* jQuery(".tnp-email").attr("placeholder", "Your email..");*/

    /* Add wishlist load more button click action on search result page  */
    if( jQuery('.btn-add-wishlist').length ){
        jQuery('.btn-add-wishlist').on( 'click', function(e) {
            e.preventDefault();
            var $t = jQuery(this);
            jQuery.ajax({
                url: aventura_ajax.url,
                type: "POST",
                data: {
                    'action' : 'add_to_wishlist',
                    'post_id' : jQuery(this).data('post-id')
                },
                success: function(response){
                    if (response.success == 1) {
                        $t.hide();
                        $t.siblings('.btn-remove-wishlist').show();
                        alert(response.result);
                    } else {
                        alert(response.result);
                    }
                }
            });
            return false;
        });
    }

    /* Remove wishlist load more button click action on search result page  */
    if( jQuery('.btn-remove-wishlist').length ){
        jQuery('.btn-remove-wishlist').on( 'click', function(e) {
            e.preventDefault();
            var $t = jQuery(this);
            jQuery.ajax({
                url: aventura_ajax.url,
                type: "POST",
                data: {
                    'action' : 'add_to_wishlist',
                    'post_id' : jQuery(this).data('post-id'),
                    'remove' : 1
                },
                success: function(response){
                    if (response.success == 1) {
                        $t.hide();
                        $t.siblings('.btn-add-wishlist').show();
                        alert(response.result);
                    } else {
                        alert(response.result);
                    }
                }
            });
            return false;
        });
    }
    //Menu Button Mobile
    var $menu_item_has_children =   jQuery('.tz-header .menu-item-has-children');

    if ( $menu_item_has_children.length ) {

        jQuery('.menu-item-has-children > a').after( "<span class='icon_menu_item_mobile'></span>" );

        var $icon_menu_item_mobile  =   jQuery('.icon_menu_item_mobile');

        $icon_menu_item_mobile.each(function () {

            jQuery(this).on( "click", function() {

                var has_class_item_active_mobile    =   jQuery(this).hasClass('icon_menu_item_mobile_active');

                jQuery(this).toggleClass('icon_menu_item_mobile_active', 400);
                jQuery(this).parent().children('.sub-menu,.dropdown-mega').slideToggle("400");
            })
        })

    }

});

jQuery(document).ready(function(){
    jQuery('.blank > a').on('click',function(e){
        e.preventDefault();
        return false;
    });
});