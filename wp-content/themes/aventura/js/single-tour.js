"use strict";
var tour_data = jQuery(".tz-tour-data");


jQuery(document).ready(function() {

    // if ( jQuery('input.date-pick').length || jQuery('select[name="departure_time"]').length ) {
    //
    //     if( jQuery('input.date-pick').length ){
    //         var tour_date = jQuery('input[name="date"]').val();
    //
    //         if(tour_date){
    //             jQuery('select[name="price_combo"]').parent().parent().removeClass('disabled');
    //             jQuery('input[name="number_adults"]').parent().parent().parent().removeClass('disabled');
    //             jQuery('input[name="number_children"]').parent().parent().parent().removeClass('disabled');
    //             jQuery('button.book-now').removeClass('disabled');
    //
    //         }else{
    //             jQuery('select[name="price_combo"]').parent().parent().addClass('disabled');
    //             jQuery('input[name="number_adults"]').parent().parent().parent().addClass('disabled');
    //             jQuery('input[name="number_children"]').parent().parent().parent().addClass('disabled');
    //             jQuery('button.book-now').addClass('disabled');
    //         }
    //     }
    //
    //     if( jQuery('select[name="departure_time"]').length ){
    //         var tour_time = jQuery('select[name="departure_time"]').val();
    //
    //         if(tour_time){
    //             jQuery('select[name="price_combo"]').parent().parent().removeClass('disabled');
    //             jQuery('input[name="number_adults"]').parent().parent().parent().removeClass('disabled');
    //             jQuery('input[name="number_children"]').parent().parent().parent().removeClass('disabled');
    //             jQuery('button.book-now').removeClass('disabled');
    //
    //         }else{
    //             jQuery('select[name="price_combo"]').parent().parent().addClass('disabled');
    //             jQuery('input[name="number_adults"]').parent().parent().parent().addClass('disabled');
    //             jQuery('input[name="number_children"]').parent().parent().parent().addClass('disabled');
    //             jQuery('button.book-now').addClass('disabled');
    //         }
    //     }
    // }

    aventura_check_allow_select_people();

    jQuery('#booking-form').on('change', 'input[name="number_adults"], input[name="number_children"]', function(){
        aventura_check_tour_available_people();
        aventura_update_tour_price( jQuery(this) );
    });

    jQuery(this).on('change', 'select[name="price_combo"]', function(){

        aventura_check_tour_available_people();
        aventura_update_combo_tour_price(jQuery(this));
    });

    // jQuery('select[name="price_combo"]').focus(function () {
    //     // Store the current value on focus, before it changes
    //     jQuery('input.date-pick').valid();
    // }).change(function() {
    //     alert('tsdsfsdfsfd');
    // });

    jQuery('input.date-pick,select[name="departure_time"]').on('change',function(e) {
        e.preventDefault();

        aventura_check_allow_select_people();

    });

    // var conceptName = jQuery('#combo_tours').find(":selected").text();
    var available_days = tour_data.data("available-days");
    var today = new Date();
    var tour_start_date = new Date( tour_data.data("start-date") );
    var tour_end_date = new Date( tour_data.data("end-date") );
    var available_first_date = tour_end_date;

    today.setHours(0, 0, 0, 0);
    tour_start_date.setHours(0, 0, 0, 0);
    tour_end_date.setHours(0, 0, 0, 0);

    if ( today > tour_start_date) {
        tour_start_date = today;
    }

    function DisableDays(date) {
        if ( available_days.length == 0 ) {
            if ( available_first_date >= date && date >= tour_start_date) {
                available_first_date = date;
            }
            return true;
        }
        var day = date.getDay();
        if ( jQuery.inArray( day.toString(), available_days ) >= 0 ) {
            if ( available_first_date >= date && date >= tour_start_date) {
                available_first_date = date;
            }
            return true;
        } else {
            return false;
        }
    }

    if ( jQuery('input.date-pick').length ) {

        var lang = jQuery('input.date-pick').data('locale');
        lang = lang.replace( '_', '-' );
        var day_start_week = jQuery('input.date-pick').data('day-start-week');

        jQuery('input.date-pick').datepicker({
            startDate: tour_start_date,
            endDate: tour_end_date,
            autoclose: true,
            disableTouchKeyboard: true,
            language: lang,
            weekStart: day_start_week,
            beforeShowDay: DisableDays
        });
        // jQuery('input[name="date"]').datepicker( 'setDate', available_first_date );
    }

    var validation_rules = {};

    if ( jQuery('input.date-pick').length ) {
        validation_rules.date = { required: true};
    }

    if( jQuery('select[name="departure_time"]').length ){
        validation_rules.departure_time = { required: true};
    }

    //if ( jQuery('input.input-number').length ) {
    //    validation_rules.number_adults = {
    //        required: true,
    //        number : true
    //    };
    //}

    /*validation form*/
    jQuery('#booking-form').validate({
        rules: validation_rules
    });

});

jQuery(window).load(function(){

    jQuery('.input-number').each(function(){
        inputNumber(jQuery(this));
    });

    if( jQuery('.tz-tour-gallery').length ){
        jQuery('.tz-tour-gallery').flexslider({
            animation: 'fade',
            slideDirection: "horizontal",
            slideshow: true,
            slideshowSpeed: 5000,
            animationDuration: 600,
            directionNav: false,
            controlNav: true,
            controlsContainer: jQuery(".tz-tour-title .tz-position .tz-control-nav"),
            prevText: "",
            nextText: "",
            pausePlay: false,
            pauseText: "Pause",
            playText: "Play",
            pauseOnAction: true,
            pauseOnHover: false,
            useCSS: true,
            startAt: 0,
            animationLoop: true,
            smoothHeight: true,
            randomize: true,
            itemWidth:0,
            itemMargin:0,
            minItems:0,
            maxItems:0
        });
    }
    var x = jQuery(".tz-tour-title .tz-position").offset();
    var height = jQuery(".tz-tour-title .tz-position").height();

    //if (jQuery('.rtl').length) {
    //    jQuery(".tz-tour-thumbnail .flex-control-nav").css({"right": x.left+15, "bottom" : height});
    //}else{
    jQuery(".tz-tour-thumbnail .flex-control-nav").css({"left": x.left+15, "bottom" : height});
    //}

    aventura_ResizeImage(jQuery('.tz-other-thumb'));
});
/*
 * Method reize image
 * @variables class
 */
function aventura_ResizeImage(obj){
    var widthStage;
    var heightStage ;
    var widthImage;
    var heightImage;
    obj.each(function (i,el){

        heightStage = jQuery(this).height();

        widthStage = jQuery (this).width();
        var img_url = jQuery(this).find('img').attr('src');

        var image = new Image();
        image.src = img_url;
        image.onload = function() {
        };
        widthImage = image.naturalWidth;
        heightImage = image.naturalHeight;

        var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);

        if (jQuery('.rtl').length) {
            jQuery(this).find('img').css ({ top: tzimg.top, right: tzimg.left, width: tzimg.width, height: tzimg.height });
        }else{
            jQuery(this).find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });
        }
    });
}

