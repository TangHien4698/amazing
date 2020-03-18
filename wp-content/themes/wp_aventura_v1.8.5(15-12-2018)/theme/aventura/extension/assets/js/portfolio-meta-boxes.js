/*global jQuery: false, themeprefix: false */

jQuery(document).ready(function(){
    "use strict";

    var $aventura_checkpage = jQuery('#page_template').val();
    switch ($aventura_checkpage){
        case 'template-homeslide.php':
            jQuery('#aventura_home_slide_option').slideDown();
            jQuery('#aventura_page_default_option').slideUp();
            jQuery('#aventura_page_general_options').slideUp();
            jQuery('#aventura_header_footer_page_options').slideUp();
            jQuery('#aventura_newsletter_page_options').slideUp();
            jQuery('#aventura_breadcrumb_page_options').slideUp();
            break;
        case 'template-homepage.php':
            jQuery('#aventura_home_slide_option').slideUp();
            jQuery('#aventura_page_default_option').slideUp();
            jQuery('#aventura_page_general_options').slideUp();
            jQuery('#aventura_header_footer_page_options').slideDown();
            jQuery('#aventura_newsletter_page_options').slideDown();
            jQuery('#aventura_breadcrumb_page_options').slideUp();
            break;
        case 'template-login.php':
            jQuery('#aventura_home_slide_option').slideUp();
            jQuery('#aventura_page_default_option').slideUp();
            jQuery('#aventura_page_general_options').slideUp();
            jQuery('#aventura_header_footer_page_options').slideDown();
            jQuery('#aventura_newsletter_page_options').slideDown();
            jQuery('#aventura_breadcrumb_page_options').slideDown();
            break;
        default :
            jQuery('#aventura_home_slide_option').slideUp();
            jQuery('#aventura_page_default_option').slideDown();
            jQuery('#aventura_page_general_options').slideDown();
            jQuery('#aventura_header_footer_page_options').slideDown();
            jQuery('#aventura_newsletter_page_options').slideDown();
            jQuery('#aventura_breadcrumb_page_options').slideDown();
            break;
    }

    jQuery('#page_template').change(function(){
        var $aventura_page_value = jQuery(this).val();
        switch ($aventura_page_value){
            case 'template-homeslide.php':
                jQuery('#aventura_home_slide_option').slideDown();
                jQuery('#aventura_page_default_option').slideUp();
                jQuery('#aventura_page_general_options').slideUp();
                jQuery('#aventura_header_footer_page_options').slideUp();
                jQuery('#aventura_newsletter_page_options').slideUp();
                jQuery('#aventura_breadcrumb_page_options').slideUp();
                break;
            case 'template-homepage.php':
                jQuery('#aventura_home_slide_option').slideUp();
                jQuery('#aventura_page_default_option').slideUp();
                jQuery('#aventura_page_general_options').slideUp();
                jQuery('#aventura_header_footer_page_options').slideDown();
                jQuery('#aventura_newsletter_page_options').slideDown();
                jQuery('#aventura_breadcrumb_page_options').slideUp();
                break;
            case 'template-login.php':
                jQuery('#aventura_home_slide_option').slideUp();
                jQuery('#aventura_page_default_option').slideUp();
                jQuery('#aventura_page_general_options').slideUp();
                jQuery('#aventura_header_footer_page_options').slideDown();
                jQuery('#aventura_newsletter_page_options').slideDown();
                jQuery('#aventura_breadcrumb_page_options').slideDown();
                break;
            default :
                jQuery('#aventura_home_slide_option').slideUp();
                jQuery('#aventura_page_default_option').slideDown();
                jQuery('#aventura_page_general_options').slideDown();
                jQuery('#aventura_header_footer_page_options').slideDown();
                jQuery('#aventura_newsletter_page_options').slideDown();
                jQuery('#aventura_breadcrumb_page_options').slideDown();
                break;
        }
    });

    // Tour type

    var $tour_type = jQuery('#aventura_tour_type').val();
    if($tour_type == 'daily') {
        jQuery('#aventura_departure_date').parent().parent().slideUp();
        jQuery('#aventura_tour_start_date').parent().parent().slideDown();
        jQuery('#aventura_tour_end_date').parent().parent().slideDown();
        jQuery('#aventura_available_days').parent().parent().slideDown();
        jQuery('#aventura_tour_external_note').parent().parent().slideUp();
        jQuery('#aventura_tour_external_button').parent().parent().slideUp();
        jQuery('#aventura_tour_external_link').parent().parent().slideUp();
    }else if($tour_type == 'external') {
        jQuery('#aventura_departure_date').parent().parent().slideUp();
        jQuery('#aventura_tour_start_date').parent().parent().slideUp();
        jQuery('#aventura_tour_end_date').parent().parent().slideUp();
        jQuery('#aventura_available_days').parent().parent().slideUp();
        jQuery('#aventura_tour_external_note').parent().parent().slideDown();
        jQuery('#aventura_tour_external_button').parent().parent().slideDown();
        jQuery('#aventura_tour_external_link').parent().parent().slideDown();
    }else{
        jQuery('#aventura_departure_date').parent().parent().slideDown();
        jQuery('#aventura_tour_start_date').parent().parent().slideUp();
        jQuery('#aventura_tour_end_date').parent().parent().slideUp();
        jQuery('#aventura_available_days').parent().parent().slideUp();
        jQuery('#aventura_tour_external_note').parent().parent().slideUp();
        jQuery('#aventura_tour_external_button').parent().parent().slideUp();
        jQuery('#aventura_tour_external_link').parent().parent().slideUp();
    }

    jQuery('#aventura_tour_type').change(function(){
        if(jQuery(this).val() == 'daily') {
            jQuery('#aventura_departure_date').parent().parent().slideUp();
            jQuery('#aventura_tour_start_date').parent().parent().slideDown();
            jQuery('#aventura_tour_end_date').parent().parent().slideDown();
            jQuery('#aventura_available_days').parent().parent().slideDown();
            jQuery('#aventura_tour_external_note').parent().parent().slideUp();
            jQuery('#aventura_tour_external_button').parent().parent().slideUp();
            jQuery('#aventura_tour_external_link').parent().parent().slideUp();
        }else if(jQuery(this).val() == 'external') {
            jQuery('#aventura_departure_date').parent().parent().slideUp();
            jQuery('#aventura_tour_start_date').parent().parent().slideUp();
            jQuery('#aventura_tour_end_date').parent().parent().slideUp();
            jQuery('#aventura_available_days').parent().parent().slideUp();
            jQuery('#aventura_tour_external_note').parent().parent().slideDown();
            jQuery('#aventura_tour_external_button').parent().parent().slideDown();
            jQuery('#aventura_tour_external_link').parent().parent().slideDown();
        }else{
            jQuery('#aventura_departure_date').parent().parent().slideDown();
            jQuery('#aventura_tour_start_date').parent().parent().slideUp();
            jQuery('#aventura_tour_end_date').parent().parent().slideUp();
            jQuery('#aventura_available_days').parent().parent().slideUp();
            jQuery('#aventura_tour_external_note').parent().parent().slideUp();
            jQuery('#aventura_tour_external_button').parent().parent().slideUp();
            jQuery('#aventura_tour_external_link').parent().parent().slideUp();
        }
    });

    /* Tour Booking Head */
    var $tour_booking_head = jQuery('#aventura_tour_booking_head_option').val();
    if($tour_booking_head == 'custom') {
        jQuery('#aventura_tour_booking_head_display').parent().parent().slideDown();
    }else{
        jQuery('#aventura_tour_booking_head_display').parent().parent().slideUp();
    }

    jQuery('#aventura_tour_booking_head_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#aventura_tour_booking_head_display').parent().parent().slideDown();
        }else{
            jQuery('#aventura_tour_booking_head_display').parent().parent().slideUp();
        }
    });

    /* Tour Booking Form */
    var $tour_booking_form = jQuery('#aventura_tour_booking_form_option').val();
    if($tour_booking_form == 'custom') {
        jQuery('#aventura_tour_booking_form_display').parent().parent().slideDown();
    }else{
        jQuery('#aventura_tour_booking_form_display').parent().parent().slideUp();
    }

    jQuery('#aventura_tour_booking_form_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#aventura_tour_booking_form_display').parent().parent().slideDown();
        }else{
            jQuery('#aventura_tour_booking_form_display').parent().parent().slideUp();
        }
    });

    /* Tour Contact */
    var $tour_contact = jQuery('#aventura_tour_contact_option').val();
    if($tour_contact == 'custom') {
        jQuery('#aventura_tour_contact_display').parent().parent().slideDown();
    }else{
        jQuery('#aventura_tour_contact_display').parent().parent().slideUp();
    }

    jQuery('#aventura_tour_contact_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#aventura_tour_contact_display').parent().parent().slideDown();
        }else{
            jQuery('#aventura_tour_contact_display').parent().parent().slideUp();
        }
    });

    /* Tour Contact */
    var $tour_manager_people = jQuery('#aventura_tour_manager_people').prop('checked');
    if($tour_manager_people){
        jQuery('#aventura_tour_total_people').parent().parent().slideDown();
    }else{
        jQuery('#aventura_tour_total_people').parent().parent().slideUp();
    }

    jQuery('#aventura_tour_manager_people').change(function(){
        if(jQuery(this).prop('checked')) {
            jQuery('#aventura_tour_total_people').parent().parent().slideDown();
        }else{
            jQuery('#aventura_tour_total_people').parent().parent().slideUp();
        }
    });

    var $aventura_logo_type = jQuery('#aventura_home_slide_logo_type').val();
    if($aventura_logo_type == 'image') {
        jQuery('#aventura_home_slide_logo_text').parent().parent().slideUp();
        jQuery('input[name$="aventura_home_slide_logo_image"]').parent().parent().slideDown();
    }else{
        jQuery('#aventura_home_slide_logo_text').parent().parent().slideDown();
        jQuery('input[name$="aventura_home_slide_logo_image"]').parent().parent().slideUp();
    }

    jQuery('#aventura_home_slide_logo_type').change(function(){
        if(jQuery(this).val() == 'image') {
            jQuery('#aventura_home_slide_logo_text').parent().parent().slideUp();
            jQuery('input[name$="aventura_home_slide_logo_image"]').parent().parent().slideDown();
        }else{
            jQuery('#aventura_home_slide_logo_text').parent().parent().slideDown();
            jQuery('input[name$="aventura_home_slide_logo_image"]').parent().parent().slideUp();
        }
    });

    var $aventura_search_option = jQuery('#aventura_home_slide_search_option').val();
    if($aventura_search_option == 'show') {
        jQuery('#aventura_home_slide_search_field_name_option').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_destination_option').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_destination_label').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_date_option').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_date_label').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_duration_option').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_duration_label').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_category_option').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_category_label').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_language_option').parent().parent().slideDown();
        jQuery('#aventura_home_slide_search_field_language_label').parent().parent().slideDown();
    }else{
        jQuery('#aventura_home_slide_search_field_name_option').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_name_label').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_destination_option').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_destination_label').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_date_option').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_date_label').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_duration_option').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_duration_label').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_category_option').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_category_label').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_language_option').parent().parent().slideUp();
        jQuery('#aventura_home_slide_search_field_language_label').parent().parent().slideUp();
    }

    jQuery('#aventura_home_slide_search_option').change(function(){
        if(jQuery(this).val() == 'show') {
            jQuery('#aventura_home_slide_search_field_name_option').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_name_label').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_destination_option').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_destination_label').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_date_option').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_date_label').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_duration_option').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_duration_label').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_category_option').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_category_label').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_language_option').parent().parent().slideDown();
            jQuery('#aventura_home_slide_search_field_language_label').parent().parent().slideDown();
        }else{
            jQuery('#aventura_home_slide_search_field_name_option').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_name_label').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_destination_option').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_destination_label').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_date_option').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_date_label').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_duration_option').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_duration_label').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_category_option').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_category_label').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_language_option').parent().parent().slideUp();
            jQuery('#aventura_home_slide_search_field_language_label').parent().parent().slideUp();
        }
    });

    var $aventura_header_option = jQuery('#aventura_header_page_option').val();
    if($aventura_header_option == 'custom') {
        jQuery('#aventura_header_page_type').parent().parent().slideDown();

    }else{
        jQuery('#aventura_header_page_type').parent().parent().slideUp();
    }

    jQuery('#aventura_header_page_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#aventura_header_page_type').parent().parent().slideDown();

        }else{
            jQuery('#aventura_header_page_type').parent().parent().slideUp();
        }
    });

    var $aventura_footer_option = jQuery('#aventura_footer_page_option').val();
    if($aventura_footer_option == 'custom') {
        jQuery('#aventura_footer_page_type').parent().parent().slideDown();

    }else{
        jQuery('#aventura_footer_page_type').parent().parent().slideUp();
    }

    jQuery('#aventura_footer_page_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#aventura_footer_page_type').parent().parent().slideDown();

        }else{
            jQuery('#aventura_footer_page_type').parent().parent().slideUp();
        }
    });

    var $aventura_breadcrumb_option = jQuery('#aventura_breadcrumb_page_option').val();
    if($aventura_breadcrumb_option == 'custom') {
        jQuery('#aventura_breadcrumb_page_show').parent().parent().slideDown();
        jQuery('input[name="aventura_breadcrumb_page_bgimage"]').parent().parent().slideDown();
        jQuery('#aventura_breadcrumb_page_title').parent().parent().slideDown();
        jQuery('#aventura_breadcrumb_page_path').parent().parent().slideDown();
        jQuery('#aventura_breadcrumb_page_padding_top').parent().parent().slideDown();
        jQuery('#aventura_breadcrumb_page_padding_bottom').parent().parent().slideDown();

    }else{
        jQuery('#aventura_breadcrumb_page_show').parent().parent().slideUp();
        jQuery('input[name="aventura_breadcrumb_page_bgimage"]').parent().parent().slideUp();
        jQuery('#aventura_breadcrumb_page_title').parent().parent().slideUp();
        jQuery('#aventura_breadcrumb_page_path').parent().parent().slideUp();
        jQuery('#aventura_breadcrumb_page_padding_top').parent().parent().slideUp();
        jQuery('#aventura_breadcrumb_page_padding_bottom').parent().parent().slideUp();
    }

    jQuery('#aventura_breadcrumb_page_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#aventura_breadcrumb_page_show').parent().parent().slideDown();
            jQuery('input[name="aventura_breadcrumb_page_bgimage"]').parent().parent().slideDown();
            jQuery('#aventura_breadcrumb_page_title').parent().parent().slideDown();
            jQuery('#aventura_breadcrumb_page_path').parent().parent().slideDown();
            jQuery('#aventura_breadcrumb_page_padding_top').parent().parent().slideDown();
            jQuery('#aventura_breadcrumb_page_padding_bottom').parent().parent().slideDown();

        }else{
            jQuery('#aventura_breadcrumb_page_show').parent().parent().slideUp();
            jQuery('input[name="aventura_breadcrumb_page_bgimage"]').parent().parent().slideUp();
            jQuery('#aventura_breadcrumb_page_title').parent().parent().slideUp();
            jQuery('#aventura_breadcrumb_page_path').parent().parent().slideUp();
            jQuery('#aventura_breadcrumb_page_padding_top').parent().parent().slideUp();
            jQuery('#aventura_breadcrumb_page_padding_bottom').parent().parent().slideUp();
        }
    });
});

jQuery(window).load(function(){

    var $aventura_newsletter_option = jQuery('#aventura_newsletter_page_option').val();
    if($aventura_newsletter_option == 'custom') {
        jQuery('#aventura_newsletter_page_type').parent().parent().slideDown();
        jQuery('#aventura_newsletter_page_title').parent().parent().slideDown();
        jQuery('#aventura_newsletter_page_subtitle').parent().parent().slideDown();
        jQuery('input[name="aventura_newsletter_page_bgimage"]').parent().parent().slideDown();
        jQuery('#aventura_newsletter_page_bgcolo').parent().parent().parent().parent().slideDown();

    }else{
        jQuery('#aventura_newsletter_page_type').parent().parent().slideUp();
        jQuery('#aventura_newsletter_page_title').parent().parent().slideUp();
        jQuery('#aventura_newsletter_page_subtitle').parent().parent().slideUp();
        jQuery('input[name="aventura_newsletter_page_bgimage"]').parent().parent().slideUp();
        jQuery('#aventura_newsletter_page_bgcolo').parent().parent().parent().parent().slideUp();
    }

    jQuery('#aventura_newsletter_page_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#aventura_newsletter_page_type').parent().parent().slideDown();
            jQuery('#aventura_newsletter_page_title').parent().parent().slideDown();
            jQuery('#aventura_newsletter_page_subtitle').parent().parent().slideDown();
            jQuery('input[name="aventura_newsletter_page_bgimage"]').parent().parent().slideDown();
            jQuery('#aventura_newsletter_page_bgcolo').parent().parent().parent().parent().slideDown();

        }else{
            jQuery('#aventura_newsletter_page_type').parent().parent().slideUp();
            jQuery('#aventura_newsletter_page_title').parent().parent().slideUp();
            jQuery('#aventura_newsletter_page_subtitle').parent().parent().slideUp();
            jQuery('input[name="aventura_newsletter_page_bgimage"]').parent().parent().slideUp();
            jQuery('#aventura_newsletter_page_bgcolo').parent().parent().parent().parent().slideUp();
        }
    });
});
