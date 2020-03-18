"use strict";

jQuery.noConflict();
jQuery(document).ready(function(){

    jQuery('#tour-cart input').change(function(){
        jQuery('.update-cart-btn').removeClass('tz-btn-hide');
        jQuery('.delete-cart-btn').addClass('tz-btn-hide');
    });

    jQuery('#tour-cart select').change(function(){
        var name_combo      = jQuery(this).find(":selected").text();
        var people_combo    = jQuery(this).find(":selected").data("people-combo");
        var price_combo     = jQuery(this).find(":selected").val();

        if( price_combo != 'custom' ){
            jQuery(".cart_has_combo").css("opacity",0);
        }else{
            jQuery(".cart_has_combo").css("opacity",1);
        }
        // jQuery(this).closest('#tour-cart').find('.change_name_combo').text(name_combo);
        jQuery(this).closest('#tour-cart').find('input[name="name_combo"]').val(name_combo);
        jQuery(this).closest('#tour-cart').find('input[name="people_combo"]').val(people_combo);
        jQuery(this).closest('#tour-cart').find('input[name="price_combo"]').val(price_combo);
        jQuery('.update-cart-btn').removeClass('tz-btn-hide');
        jQuery('.delete-cart-btn').addClass('tz-btn-hide');

        aventura_check_tour_available_people_cart();
    });

    jQuery('.update-cart-btn').on("click", function(e){
        e.preventDefault();
        jQuery('input[name="action"]').val('aventura_tour_update_cart');
        jQuery.ajax({
            url: aventura_ajax.url,
            type: "POST",
            data: jQuery('#tour-cart').serialize(),
            success: function(response){
                if (response.success == 1) {
                    location.reload();
                    console.log(response.uid);
                } else {
                    alert(response.message);
                }
            }
        });
        jQuery('.delete-cart-btn').removeClass('tz-btn-hide');
        jQuery('.update-cart-btn').addClass('tz-btn-hide');
        return false;
    });

    jQuery('.delete-cart-btn').on("click", function(e){
        e.preventDefault();
        jQuery('input[name="action"]').val('aventura_tour_delete_cart');
        jQuery.ajax({
            url: aventura_ajax.url,
            type: "POST",
            data: jQuery('#tour-cart').serialize(),
            success: function(response){
                if (response.success == 1) {
                    window.location.href = jQuery('input[name="cart_delete"]').val();
                } else {
                    alert(response.message);
                }
            }
        });
    });

    var is_woocommerce_enabled = jQuery(".tour_woocommerce_enabled").data("wooenable");
    jQuery('.book-now-btn').on("click", function(e){
        e.preventDefault();
        if ( is_woocommerce_enabled == 1 ) {
            jQuery('input[name="action"]').val('aventura_add_tour_to_woo_cart');
            jQuery.ajax({
                url: aventura_ajax.url,
                type: "POST",
                data: jQuery('#tour-cart').serialize(),
                success: function(response){
                    if (response.success == 1) {
                        document.location.href=jQuery("#tour-cart").attr('action');
                    } else {
                        alert(response.message);
                    }
                }
            });
        }else{
            document.location.href=jQuery("#tour-cart").attr('action');
        }
    });

    jQuery('.input-number').each(function(){
        inputNumber(jQuery(this));
    });
});

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
                aventura_check_tour_available_people_cart();
                jQuery('.update-cart-btn').removeClass('tz-btn-hide');
                jQuery('.delete-cart-btn').addClass('tz-btn-hide');
            });
            els.inc.on('click', function(){
                increment();
                aventura_check_tour_available_people_cart();
                jQuery('.update-cart-btn').removeClass('tz-btn-hide');
                jQuery('.delete-cart-btn').addClass('tz-btn-hide');
            });

            function decrement() {
                var value = el[0].value;
                value--;
                if(!min || value >= min) {
                    el[0].value = value;
                }
            }

            function increment() {
                var value = el[0].value;
                value++;
                if(!max || value <= max) {
                    el[0].value = value++;
                }
            }
        }
    }
})();

/* check tour available people */

function aventura_check_tour_available_people_cart(){
    var booking_form    = jQuery('.tz-tour-cart');
    if(booking_form.find("#select_combo").length){
        var combo_option    = booking_form.find("#select_combo option:selected").val();
        var peole_combo     = booking_form.find("#select_combo option:selected").data("people-combo");
    }

    /* Adult Number */
    var adults_number   = 0;
    if ( booking_form.find('input[name="adults"]').length ) {
        adults_number   = parseInt( booking_form.find('input[name="adults"]').val() );
    }

    /* Kids Number */
    var kids_number     = 0;
    if ( booking_form.find('input[name="kids"]').length ) {
        kids_number = parseInt( booking_form.find('input[name="kids"]').val() );
    }

    var people_available = '';
    if( booking_form.find('input[name="people_available"]').length ){
        people_available = parseInt( booking_form.find('input[name="people_available"]').val() );
    }

    if(combo_option !== 'custom'){
        if( people_available !== '' && people_available < peole_combo){
            booking_form.find('.book-number-available').html(people_available);
            booking_form.find('p.book-message').css('display','block');
            booking_form.find('.book-now-btn').addClass('tz-btn-disable');
            booking_form.find('.delete-cart-btn').addClass('tz-btn-disable');
            booking_form.find('.update-cart-btn').addClass('tz-btn-disable');
        }else{
            booking_form.find('p.book-message').css('display','none');
            booking_form.find('.book-now-btn').removeClass('tz-btn-disable');
            booking_form.find('.delete-cart-btn').removeClass('tz-btn-disable');
            booking_form.find('.update-cart-btn').removeClass('tz-btn-disable');
        }
    }else{
        if( people_available !== '' && people_available < adults_number + kids_number ){
            booking_form.find('.book-number-available').html(people_available);
            booking_form.find('p.book-message').css('display','block');
            booking_form.find('.book-now-btn').addClass('tz-btn-disable');
            booking_form.find('.delete-cart-btn').addClass('tz-btn-disable');
            booking_form.find('.update-cart-btn').addClass('tz-btn-disable');
        }else{
            booking_form.find('p.book-message').css('display','none');
            booking_form.find('.book-now-btn').removeClass('tz-btn-disable');
            booking_form.find('.delete-cart-btn').removeClass('tz-btn-disable');
            booking_form.find('.update-cart-btn').removeClass('tz-btn-disable');
        }
    }
}