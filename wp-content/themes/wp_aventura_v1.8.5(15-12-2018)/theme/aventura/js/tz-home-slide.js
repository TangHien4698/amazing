
jQuery(document).ready(function () {
    "use strict";

    var $menu_item_has_children =   jQuery('.menu-item-has-children');

    if ( $menu_item_has_children.length ) {

        jQuery('.menu-item-has-children > a').after( "<span class='icon_menu_item_mobile'></span>" );

        var aventura_window_width = jQuery(window).width();

        if(aventura_window_width < 992 ){
            var $icon_menu_item_mobile  =   jQuery('.icon_menu_item_mobile');

            $icon_menu_item_mobile.each(function () {

                jQuery(this).on( "click", function() {

                    var has_class_item_active_mobile    =   jQuery(this).hasClass('icon_menu_item_mobile_active');

                    jQuery(this).toggleClass('icon_menu_item_mobile_active', 400);
                    jQuery(this).parent().children('.sub-menu').slideToggle("400");
                })
            })
        }
    }

    if ( jQuery('input.date-pick').length ) {
        jQuery('input.date-pick').datepicker({
            startDate: "today",
            autoclose: true,
            disableTouchKeyboard: true,
            language: aventura_variable.lang

        });
    }

    jQuery('.tz-search-tour-mobile').each(function(){
        jQuery(this).on( "click", function() {
            jQuery(this).parent().toggleClass('tz-search-tour-active', 400);
            jQuery(this).parent().css('transition','all 0.3s ease 0s');
        });
    });
});

