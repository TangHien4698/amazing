"use strict";
/*  Form Booking Ajax  */
jQuery(function($){

    $('.book-now-ajax-btn').each(function(){
        $(this).on('click',function(e) {
            e.preventDefault();
            $(this).find(".loading-ajax").addClass("active");
            var post_id         = $(this).data('post-id'),
                people_available = $(this).data('people-available'),
                tour_type       = $(this).data('tour-type'),
                max_adults      = $(this).data('max-adults'),
                max_kids        = $(this).data('max-kids'),
                adults_price    = $(this).data('adults-price'),
                child_price     = $(this).data('child-price'),
                discount        = $(this).data('discount'),
                available       = $(this).data('available-days'),
                start_date      = $(this).data('start-date'),
                end_date        = $(this).data('end-date'),
                departure_time  = $(this).data('departure-time');
            $.ajax({
                url: aventura_ajax.url,
                type: 'POST',
                data: ({
                    action:         'aventura_ajax_booking_form',
                    post_id:        post_id,
                    people_available: people_available,
                    tour_type:      tour_type,
                    max_adults:     max_adults,
                    max_kids:       max_kids,
                    adults_price:   adults_price,
                    child_price:    child_price,
                    discount:       discount,
                    available:      available,
                    start_date:     start_date,
                    end_date:       end_date,
                    departure_time: departure_time
                }),
                success: function(data){
                    $(".loading-ajax").removeClass("active");
                    $('.tz-form-booking-ajax-content').html(data).fadeIn();

                    /*  Close Lightbox Booking  */
                    $(".tz-close-form-booking").on("click",function(){
                        $(this).parents(".tz-form-booking-ajax-content").fadeOut();
                    });

                    aventura_check_allow_select_people();

                    /*  Change Input Number  */
                    $('#booking-form').on('change', 'input[name="number_adults"], input[name="number_children"]', function(){
                        aventura_check_tour_available_people();
                        aventura_update_tour_price( $(this) );
                    });
                    $('#booking-form').on('change', 'select[name="price_combo"]', function(){
                        aventura_check_tour_available_people();
                        aventura_update_combo_tour_price($(this));
                    });
                    $('.input-number').each(function(){
                        inputNumber($(this));
                    });

                    jQuery('input.date-pick,select[name="departure_time"]').on('change',function(e) {
                        e.preventDefault();
                        aventura_check_allow_select_people();
                    });


                    /*  Datepicker  */
                    var tour_data = $(".tz-tour-data");
                    var available_days = '';
                    if( tour_data.data("available-days") != null ){
                        available_days = tour_data.data("available-days");
                    }
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
                        if ( $.inArray( day.toString(), available_days ) >= 0 ) {
                            if ( available_first_date >= date && date >= tour_start_date) {
                                available_first_date = date;
                            }
                            return true;
                        } else {
                            return false;
                        }
                    }

                    if ( $('input.date-pick').length ) {
                        var lang = jQuery('input.date-pick').data('locale');
                        lang = lang.replace( '_', '-' );
                        var day_start_week = jQuery('input.date-pick').data('day-start-week');
                        $('input.date-pick').datepicker({
                            startDate: tour_start_date,
                            endDate: tour_end_date,
                            autoclose: true,
                            disableTouchKeyboard: true,
                            language: lang,
                            weekStart: day_start_week,
                            beforeShowDay: DisableDays
                        });
                        // $('input[name="date"]').datepicker( 'setDate', available_first_date );
                    }

                    var validation_rules = {};
                    if ( $('input.date-pick').length ) {
                        validation_rules.date = { required: true};
                    }
                    /*validation form*/
                    $('#booking-form').validate({
                        rules: validation_rules
                    });
                },
                error: function() {
                    console.log("Error");
                }
            });
        });
    });
});
/*  End Form Booking Ajax  */
