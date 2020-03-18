"use strict";

jQuery.noConflict();
jQuery(document).ready(function(){
    var validation_rules = {
        first_name  : { required: true},
        last_name   : { required: true},
        // company     : { required: true},
        // address     : { required: true},
        // city        : { required: true},
        // state       : { required: true},
        // zip         : { required: true},
        email       : { required: true, email: true},
        phone       : { required: true}
    };
    /*validation form */
    jQuery('#booking-form').validate({
        rules: validation_rules,
        submitHandler: function (form) {
            var booking_data = jQuery('#booking-form').serialize();
            jQuery('#overlay').fadeIn();
            jQuery.ajax({
                type: "POST",
                url: aventura_ajax.url,
                data: booking_data,
                success: function ( response ) {
                    // console.log(response);
                    // console.log(response.success);
                    if ( response.success == 1 ) {
                        if ( response.result.payment == 'paypal' ) {
                            jQuery('.book-now-btn1').before('<div class="alert alert-success">You will be redirected to paypal.<span class="close"></span></div>');
                        }
                        var confirm_url = jQuery('#booking-form').attr('action');

                        if ( confirm_url.indexOf('?') > -1 ) {
                            confirm_url = confirm_url + '&';
                        } else {
                            confirm_url = confirm_url + '?';
                        }
                        confirm_url = confirm_url + 'booking_no=' + response.result.booking_no + '&pin_code=' + response.result.pin_code;
                        // console.log(response.result.payment_info);
                        if(response.result.payment_info == 'cash' ){
                            confirm_url += '&payment_info=cash';
                        }else if ( response.result.payment_info == 'paypal' ) {
                            confirm_url += '&payment_info=paypal';
                        }
                        jQuery('.book-now-btn').hide();
                        // console.log(confirm_url);
                        window.location.href = confirm_url;
                    } else if ( response.success == -1 ) {
                        // alert( response.result );
                        window.location.href = '';
                    } else {
                        if ( response.order_id != 0 ) {
                            jQuery('#order_id').val( response.order_id );
                        }
                        // alert(response.result);
                        jQuery('#overlay').fadeOut();
                    }
                }
            });
            return false;
        }
    });
    var aventura_status = jQuery('input:radio[name=payment_info]:checked').val();
    switch (aventura_status)
    {
        case 'cash' : {
            jQuery('#cc-container').slideUp();
            jQuery('#paypal-container').slideUp();
            break;
        }
        case 'paypal' : {
            jQuery('#cc-container').slideUp();
            jQuery('#paypal-container').slideDown();
            break;
        }
        case 'cc' : {
            jQuery('#cc-container').slideDown();
            jQuery('#paypal-container').slideUp();
            break;
        }
    }

    jQuery('.form-radio-control').on('change', function(){
        if ( jQuery(this).val() === 'paypal' ){
            jQuery('#cc-container').slideUp();
            jQuery('#paypal-container').slideDown();
        } else if ( jQuery(this).val() === 'cc' ) {
            jQuery('#cc-container').slideDown();
            jQuery('#paypal-container').slideUp();
        } else if( jQuery(this).val() === 'cash') {
            jQuery('#cc-container').slideUp();
            jQuery('#paypal-container').slideUp();
        }
    });
});