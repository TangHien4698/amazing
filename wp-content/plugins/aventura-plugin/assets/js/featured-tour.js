"use strict";
function aventura_resize_image(obj){
    var widthStage;
    var heightStage ;
    var widthImage;
    var heightImage;
    var width1;
    obj.each(function (i,el){

        heightStage = jQuery(this).height();
        widthStage = jQuery (this).width();

        var img_url = jQuery(this).find('img').attr('src');
        var img_resize = jQuery(this);
        var image = new Image();
        image.src = img_url;

        image.onload = function()
        {
            widthImage = this.naturalWidth;
            heightImage = this.naturalHeight;

            var tzimg	=	new resizeImage(widthImage, heightImage, widthStage, heightStage);
            if (jQuery('.rtl').length) {
                img_resize.find('img').css ({ top: tzimg.top, right: tzimg.left, width: tzimg.width, height: tzimg.height });
            }else{
                img_resize.find('img').css ({ top: tzimg.top, left: tzimg.left, width: tzimg.width, height: tzimg.height });
            }
        }

    });
}
jQuery(document).ready(function () {

    /*  Form Booking Ajax  */
    jQuery('.book-now-ajax-btn').each(function() {
        jQuery(this).on('click', function (e) {
            e.preventDefault();
            jQuery(this).find(".loading-ajax").addClass("active");
            var post_id = jQuery(this).data('post-id'),
                people_available = jQuery(this).data('people-available'),
                tour_type = jQuery(this).data('tour-type'),
                max_adults = jQuery(this).data('max-adults'),
                max_kids = jQuery(this).data('max-kids'),
                adults_price = jQuery(this).data('adults-price'),
                child_price = jQuery(this).data('child-price'),
                discount = jQuery(this).data('discount'),
                available = jQuery(this).data('available-days'),
                start_date = jQuery(this).data('start-date'),
                end_date = jQuery(this).data('end-date'),
                departure_time  = jQuery(this).data('departure-time');
            jQuery.ajax({
                url: aventura_ajax.url,
                type: 'POST',
                data: ({
                    action: 'aventura_ajax_booking_form',
                    post_id: post_id,
                    people_available: people_available,
                    tour_type: tour_type,
                    max_adults: max_adults,
                    max_kids: max_kids,
                    adults_price: adults_price,
                    child_price: child_price,
                    discount: discount,
                    available: available,
                    start_date: start_date,
                    end_date: end_date,
                    departure_time: departure_time
                }),
                success: function (data) {
                    jQuery(".loading-ajax").removeClass("active");
                    jQuery('.tz-form-booking-ajax-content').html(data).fadeIn();

                    /*  Close Lightbox Booking  */
                    jQuery(".tz-close-form-booking").on("click", function () {
                        jQuery(this).parents(".tz-form-booking-ajax-content").fadeOut();
                    });

                    aventura_check_allow_select_people();

                    /*  Change Input Number  */
                    jQuery('#booking-form').on('change', 'input[name="number_adults"], input[name="number_children"]', function () {
                        aventura_update_tour_price(jQuery(this));
                    });
                    jQuery('#booking-form').on('change', 'select[name="price_combo"]', function(){
                        aventura_check_tour_available_people();
                        aventura_update_combo_tour_price(jQuery(this));
                    });
                    jQuery('.input-number').each(function () {
                        inputNumber(jQuery(this));
                    });

                    jQuery('input.date-pick,select[name="departure_time"]').on('change',function(e) {
                        e.preventDefault();
                        aventura_check_allow_select_people();
                    });

                    /*  Datepicker  */
                    var tour_data = jQuery(".tz-tour-data");
                    var available_days = '';
                    if (tour_data.data("available-days") != null) {
                        available_days = tour_data.data("available-days");
                    }
                    var today = new Date();
                    var tour_start_date = new Date(tour_data.data("start-date"));
                    var tour_end_date = new Date(tour_data.data("end-date"));
                    var available_first_date = tour_end_date;
                    today.setHours(0, 0, 0, 0);
                    tour_start_date.setHours(0, 0, 0, 0);
                    tour_end_date.setHours(0, 0, 0, 0);

                    if (today > tour_start_date) {
                        tour_start_date = today;
                    }

                    function DisableDays(date) {
                        if (available_days.length == 0) {
                            if (available_first_date >= date && date >= tour_start_date) {
                                available_first_date = date;
                            }
                            return true;
                        }
                        var day = date.getDay();
                        if (jQuery.inArray(day.toString(), available_days) >= 0) {
                            if (available_first_date >= date && date >= tour_start_date) {
                                available_first_date = date;
                            }
                            return true;
                        } else {
                            return false;
                        }
                    }

                    if (jQuery('input.date-pick').length) {

                        var lang = jQuery('input.date-pick').data('locale');
                        lang = lang.replace( '_', '-' );
                        // alert(lang);

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
                        // jQuery('input[name="date"]').datepicker('setDate', available_first_date);
                    }

                    var validation_rules = {};
                    if (jQuery('input.date-pick').length) {
                        validation_rules.date = {required: true};
                    }
                    if( jQuery('select[name="departure_time"]').length ){
                        validation_rules.departure_time = { required: true};
                    }
                    /*validation form*/
                    jQuery('#booking-form').validate({
                        rules: validation_rules
                    });
                },
                error: function () {
                    console.log("Error");
                }
            });
        });
    });

    /*  Show Review Ajax  */
    jQuery('.review-ajax-btn').each(function() {
        jQuery(this).on('click', function (e) {
            e.preventDefault();
            jQuery(this).find(".loading-ajax").addClass("active");
            var post_id = jQuery(this).data('post-id');
            jQuery.ajax({
                url: aventura_ajax.url,
                type: 'POST',
                data: ({
                    action: 'aventura_review_lightbox',
                    post_id: post_id
                }),
                success: function (data) {
                    jQuery(".loading-ajax").removeClass("active");
                    jQuery('.tz-reviews-ajax-content').html(data).fadeIn();

                    /*  Close Lightbox Preview  */
                    jQuery(".tz-close-preview").on("click", function () {
                        jQuery(this).parents(".tz-reviews-ajax-content").fadeOut();
                    });

                },
                error: function () {
                    console.log("Error");
                }
            });
        });
    });
});

jQuery(window).load(function(){
    var $aventura_tour = jQuery(".tzTour-item");
    if($aventura_tour.length){
        $aventura_tour.each(function () {
            var $aventura_heightImage = jQuery(this).height();
            jQuery(this).find(".tz-thumb-fix").css('height',$aventura_heightImage);
        })
    }

    jQuery('.tzTour-item .tz-thumb-fix').each(function () {
        aventura_resize_image(jQuery(this));
    });
});



