"use strict";

/*
 * Change Input number Value
 */
(function() {

    window.inputNumber = function(el) {

        var min = el.data('min') || '0';
        var max = el.data('max') || '0';

        var els = {};

        /*els.dec = el.prev();*/
        /*els.inc = el.next();*/
        els.dec = el.parent().find('.input-number-decrement');
        els.inc = el.parent().find('.input-number-increment');

        el.each(function() {
            init(jQuery(this));
        });

        function init(el) {

            els.dec.on('click', function(){
                decrement();
                aventura_check_tour_available_people();
                aventura_update_tour_price( jQuery(this).parent().find('.input-number') );
            });
            els.inc.on('click', function(){
                increment();
                aventura_check_tour_available_people();
                aventura_update_tour_price( jQuery(this).parent().find('.input-number') );
            });

            function decrement() {
                var value = el[0].value;
                value--;
                if(!min || value >= min) {
                    el.parent().find('.input-number').attr("value", value);
                    el[0].value = value;
                }
            }

            function increment() {
                var value = el[0].value;
                value++;
                if(!max || value <= max) {
                    el.parent().find('.input-number').attr("value", value);
                    el[0].value = value;
                }
            }
        }
    }
})();

/* check allow people */

function aventura_check_allow_select_people(){
    var booking_form = jQuery('.tz-tour-booking');
    if ( booking_form.find('input.date-pick').length && booking_form.find('select[name="departure_time"]').length ) {

        var tour_date = booking_form.find('input[name="date"]').val();
        var tour_time = booking_form.find('select[name="departure_time"]').val();

        if(tour_date && tour_time){
            // booking_form.find('select[name="price_combo"]').parent().parent().removeClass('disabled');
            // booking_form.find('input[name="number_adults"]').parent().parent().parent().removeClass('disabled');
            // booking_form.find('input[name="number_children"]').parent().parent().parent().removeClass('disabled');
            // booking_form.find('button.book-now').removeClass('disabled');
            aventura_tour_check_availability_ajax();

        }else{
            booking_form.find('select[name="price_combo"]').parent().parent().addClass('disabled');
            booking_form.find('input[name="number_adults"]').parent().parent().parent().addClass('disabled');
            booking_form.find('input[name="number_children"]').parent().parent().parent().addClass('disabled');
            booking_form.find('p.our-of-stock-message').css('display','none');
            booking_form.find('p.book-message').css('display','none');
            booking_form.find('button.book-now').addClass('disabled');
        }
    }else if( booking_form.find('input.date-pick').length ){
        var tour_date = booking_form.find('input[name="date"]').val();
        if(tour_date){
            aventura_tour_check_availability_ajax();
        }else{
            booking_form.find('select[name="price_combo"]').parent().parent().addClass('disabled');
            booking_form.find('input[name="number_adults"]').parent().parent().parent().addClass('disabled');
            booking_form.find('input[name="number_children"]').parent().parent().parent().addClass('disabled');
            booking_form.find('p.our-of-stock-message').css('display','none');
            booking_form.find('p.book-message').css('display','none');
            booking_form.find('button.book-now').addClass('disabled');
        }
    }else if( booking_form.find('select[name="departure_time"]').length ){
        var tour_time = booking_form.find('select[name="departure_time"]').val();
        if(tour_time){
            aventura_tour_check_availability_ajax();
        }else{
            booking_form.find('select[name="price_combo"]').parent().parent().addClass('disabled');
            booking_form.find('input[name="number_adults"]').parent().parent().parent().addClass('disabled');
            booking_form.find('input[name="number_children"]').parent().parent().parent().addClass('disabled');
            booking_form.find('p.our-of-stock-message').css('display','none');
            booking_form.find('p.book-message').css('display','none');
            booking_form.find('button.book-now').addClass('disabled');
        }
    }else{
        booking_form.find('p.require-date-time-message').css('display','none');
    }
}

function aventura_tour_check_availability_ajax(){
    var booking_form = jQuery('.tz-tour-booking');
    var tour_id = booking_form.find('input[name="tour_id"]').val();
    var tour_date = booking_form.find('input[name="date"]').val();
    var tour_time = booking_form.find('select[name="departure_time"]').val();

    jQuery.ajax({
        url: aventura_ajax.url,
        type: 'POST',
        data: ({
            action: 'aventura_tour_check_availability_ajax',
            tour_id: tour_id,
            tour_date: tour_date,
            tour_time: tour_time
        }),
        success: function(response){
            if (response.success == 1) {
                // console.log(response.booked);
                var info_tour = response.booked;
                // console.log(info_tour[2]);
                var booking_form = jQuery('.tz-tour-booking');
                if(info_tour[0] == '1'){
                    booking_form.find('input[name="people_available"]').val(info_tour[2]);
                    booking_form.find('select[name="price_combo"]').parent().parent().removeClass('disabled');
                    booking_form.find('input[name="number_adults"]').parent().parent().parent().removeClass('disabled');
                    booking_form.find('input[name="number_children"]').parent().parent().parent().removeClass('disabled');
                    booking_form.find('p.our-of-stock-message').css('display','none');
                    booking_form.find('p.book-message').css('display','none');
                    booking_form.find('button.book-now').removeClass('disabled');

                    aventura_check_tour_available_people();
                }else{
                    booking_form.find('select[name="price_combo"]').parent().parent().addClass('disabled');
                    booking_form.find('input[name="number_adults"]').parent().parent().parent().addClass('disabled');
                    booking_form.find('input[name="number_children"]').parent().parent().parent().addClass('disabled');
                    booking_form.find('p.our-of-stock-message').css('display','block');
                    booking_form.find('p.book-message').css('display','none');
                    booking_form.find('button.book-now').addClass('disabled');
                }

            } else {
                alert(response.message);
            }
        }
    });
}

/* check tour available people */

function aventura_check_tour_available_people(){
    var booking_form = jQuery('.tz-tour-booking');
    if( booking_form.find('input[name="people_available"]').length ) {

        var people_available = '';
        people_available = parseInt(booking_form.find('input[name="people_available"]').val());

        var combo_option = '';
        if (booking_form.find("#price_combo").length) {
            combo_option = booking_form.find("#price_combo option:selected").val();
            var peole_combo = booking_form.find("#price_combo option:selected").data("people-combo");
        }

        /* Adult Number */
        var adults_number = 0;
        if (booking_form.find('input[name="number_adults"]').length) {
            adults_number = parseInt(booking_form.find('input[name="number_adults"]').val());
        }

        /* Kids Number */
        var kids_number = 0;
        if (booking_form.find('input[name="number_children"]').length) {
            kids_number = parseInt(booking_form.find('input[name="number_children"]').val());
        }

        if (combo_option == '' || combo_option == 'custom') {
            if (people_available < adults_number + kids_number) {
                booking_form.find('.book-number-available').html(people_available);
                booking_form.find('p.book-message').css('display','block');
                booking_form.find('button.book-now').addClass('disabled');
            } else {
                booking_form.find('p.book-message').css('display','none');
                booking_form.find('button.book-now').removeClass('disabled');
            }
        } else {
            if (people_available < peole_combo) {
                booking_form.find('.book-number-available').html(people_available);
                booking_form.find('p.book-message').css('display','block');
                booking_form.find('button.book-now').addClass('disabled');
            } else {
                booking_form.find('p.book-message').css('display','none');
                booking_form.find('button.book-now').removeClass('disabled');
            }
        }
    }
}

/*  Get Price Value   */
function aventura_update_tour_price( obj ) {
    var booking_form    = obj.closest('.tz-tour-booking');
    var tour_data       = booking_form.find(".tz-tour-data");
    var adults_price    = tour_data.data("adults-price");
    var child_price     = tour_data.data("child-price");
    var discount_price  = tour_data.data("discount");
    var decimal_prec    = tour_data.data("decimal-prec");
    var decimal_sep     = tour_data.data("decimal-sep");
    var thousands_sep   = tour_data.data("thousands-sep");
    var adults_number   = parseInt( booking_form.find('input[name="number_adults"]').val() );

    /* Adult Number */
    var adults_number   = 0;
    if ( booking_form.find('input[name="number_adults"]').length ) {
        adults_number   = parseInt( booking_form.find('input[name="number_adults"]').val() );
    }

    /* Kids Number */
    var kids_number     = 0;
    if ( booking_form.find('input[name="number_children"]').length ) {
        kids_number = parseInt( booking_form.find('input[name="number_children"]').val() );
    }

    if( adults_number >= 0 && kids_number >= 0 ){

        /*  Get price   */
        var total_adults_price = +(adults_price * adults_number).toFixed(2);
        var total_child_price = +(child_price * kids_number).toFixed(2);
        var total_all_price = +(total_adults_price + total_child_price).toFixed(2);

        /*  format price   */
        total_adults_price = aventura_number_format(total_adults_price,decimal_prec,decimal_sep,thousands_sep);
        total_child_price = aventura_number_format(total_child_price,decimal_prec,decimal_sep,thousands_sep);
        total_all_price = aventura_number_format(total_all_price,decimal_prec,decimal_sep,thousands_sep);

        /*  replace text   */
        var text_adults_price = booking_form.find('.total_price_adults').text().replace(/[\d\.\,]+/g, total_adults_price);
        var text_child_price = booking_form.find('.total_price_children').text().replace(/[\d\.\,]+/g, total_child_price);
        var text_all_price = booking_form.parents().find('.total_all_price').text().replace(/[\d\.\,]+/g, total_all_price);

        /*  Get text   */
        booking_form.find('.total_price_adults').text(text_adults_price);
        booking_form.find('.total_price_children').text(text_child_price);
        booking_form.parents().find('.total_all_price').text(text_all_price);
    }
}

/*  Get Combo Tour Price Value   */
function aventura_update_combo_tour_price( obj ) {
    var booking_form    = obj.closest('.tz-tour-booking');
    var tour_data       = booking_form.find(".tz-tour-data");
    var name_combo      = obj.find(":selected").text();
    var peole_combo     = obj.find(":selected").data("people-combo");
    var price_new       = obj.find(":selected").val();
    var price_old       = parseInt( tour_data.data("adults-price") );
    var discount_price  = tour_data.data("discount");
    var decimal_prec    = tour_data.data("decimal-prec");
    var decimal_sep     = tour_data.data("decimal-sep");
    var thousands_sep   = tour_data.data("thousands-sep");

    booking_form.find(".name_combo").val(name_combo);
    booking_form.find(".people_combo").val(peole_combo);
    if( price_new != 'custom' ){
        price_new = parseInt(price_new);
        if( price_new >= 0 ){
            /*  format price   */
            price_new = aventura_number_format(price_new,decimal_prec,decimal_sep,thousands_sep);
            /*  replace text   */
            var text_all_price = booking_form.parents().find('.total_all_price').text().replace(/[\d\.\,]+/g, price_new);
            /*  Get text   */
            booking_form.parents().find('.total_all_price').text(text_all_price);
        }
        booking_form.find(".form-group.has_combo").slideUp();
        var text_all_price_0 = booking_form.find(".form-group.has_combo .total_price_adults").text().replace(/[\d\.\,]+/g, aventura_number_format('0',decimal_prec,decimal_sep,thousands_sep));
        booking_form.find(".form-group.has_combo .input-number").val('0');
        // booking_form.find(".form-group.has_combo input[name='price_adults']").val('0');
        booking_form.find(".form-group.has_combo .total_price_adults").text(text_all_price_0);
    }else{
        booking_form.find(".form-group.has_combo").slideDown();
        /*  format price   */
        price_old = aventura_number_format(price_old,decimal_prec,decimal_sep,thousands_sep);
        /*  replace text   */
        var text_all_price_old = booking_form.parents().find('.total_all_price').text().replace(/[\d\.\,]+/g, price_old);
        /*  Get text   */
        booking_form.parents().find('.total_all_price').text(text_all_price_old);
    }
}

/*  Number Format   */
function aventura_number_format (number, decimals, dec_point, thousands_sep) {
    /* Strip all characters but numerical ones.*/
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    /* Fix for IE parseFloat(0.55).toFixed(0) = 0;*/
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}