jQuery(document).ready(function () {
    "use strict";

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
            jQuery(this).parent().parent().parent().toggleClass('tz-search-tour-active', 400);
            jQuery(this).parent().parent().parent().css('transition','all 0.3s ease 0s');
        });
    });
});

