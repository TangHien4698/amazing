jQuery(document).ready(function() {
    "use strict";
    jQuery('.tourKind-top').on('click',function(){
        jQuery(this).parent().find('.tourKind-top').removeClass('current');
        jQuery(this).parent().find('.tourKind-item').removeClass('current');
        jQuery(this).addClass('current');
    });
    jQuery('.tourKind-item').on('click',function(){
        jQuery(this).parent().find('.tourKind-top').removeClass('current');
        jQuery(this).parent().find('.tourKind-item').removeClass('current');
        jQuery(this).addClass('current');
    });
});