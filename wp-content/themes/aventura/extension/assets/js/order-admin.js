jQuery(document).ready(function($) {
	"use strict";

	// order list page
	jQuery('#hotel_filter').select2({
		placeholder: "Filter by Hotel",
		allowClear: true,
		width: "240px"
	});
	jQuery('#date_from_filter').datepicker({ dateFormat: "yy-mm-dd" });
	jQuery('#date_to_filter').datepicker({ dateFormat: "yy-mm-dd" });

	jQuery('#hotel-order-filter').click(function(){
		var hotelId = jQuery('#hotel_filter').val();
		var dateFrom = jQuery('#date_from_filter').val();
		var dateTo = jQuery('#date_to_filter').val();
		var booking_no = jQuery('#booking_no_filter').val();
		var status = jQuery('#status_filter').val();
		var loc_url = 'edit.php?post_type=hotel&page=orders';
		if (hotelId) loc_url += '&post_id=' + hotelId;
		if (dateFrom) loc_url += '&date_from=' + dateFrom;
		if (dateTo) loc_url += '&date_to=' + dateTo;
		if (booking_no) loc_url += '&booking_no=' + booking_no;
		if (status) loc_url += '&status=' + status;
		document.location = loc_url;
	});

	// order list page
	jQuery('#tour_filter').select2({
		placeholder: "Filter by Tour",
		allowClear: true,
		width: "240px"
	});
	jQuery('#date_filter').datepicker({ dateFormat: "yy-mm-dd" });

	jQuery('#tour-order-filter').click(function(){
		var tourId = jQuery('#tour_filter').val();
		var _date = jQuery('#date_filter').val();
		var booking_no = jQuery('#booking_no_filter').val();
		var status = jQuery('#status_filter').val();
		var loc_url = 'edit.php?post_type=tour&page=tour_orders';
		if (tourId) loc_url += '&post_id=' + tourId;
		if (_date) loc_url += '&date=' + _date;
		if (booking_no) loc_url += '&booking_no=' + booking_no;
		if (status) loc_url += '&status=' + status;
		document.location = loc_url;
	});

	jQuery('.row-actions .delete a').click(function(){
		var r = confirm("It will be deleted permanetly. Do you want to delete it?");
		if(r == false) {
			return false;
		}
	});

	// order manage(add/edit) page
	jQuery('.hotel-order-form #post_id').select2({
		placeholder: "Select a Hotel",
		width: "250px"
	});
	jQuery('.tour-order-form #post_id').select2({
		placeholder: "Select a Tour",
		width: "250px"
	});
	jQuery('#date_from').datepicker({ dateFormat: "yy-mm-dd" });
	jQuery('#date_to').datepicker({ dateFormat: "yy-mm-dd" });
	jQuery('#date').datepicker({ dateFormat: "yy-mm-dd" });
	//jQuery('#time').timepicker({
	//	timeFormat: 'h:mm p',
	//	interval: 60,
	//	minTime: '10',
	//	maxTime: '6:00pm',
	//	defaultTime: '11',
	//	startTime: '10:00',
	//	dynamic: false,
	//	dropdown: true,
	//	scrollbar: true
	//});
	//var options = {
	//	twentyFour: false,  //Display 24 hour format, defaults to false
	//	title: 'Select Time', //The Wickedpicker's title,
	//};
	//jQuery('#time').wickedpicker(options);
	jQuery('#time').timepicker({});

	jQuery('#post_id').change(function(){
		jQuery.ajax({
			url: ajaxurl,
			type: "POST",
			data: {
				'action': 'hotel_order_postid_change',
				'post_id' : jQuery(this).val()
			},
			success: function(response){
				if ( response.success == 1 ) {
					jQuery( '.room_hotel_id_select' ).each(function(index){
						var value = jQuery(this).val();
						jQuery(this).html(response.room_list);
						jQuery(this).val(value);
					});
					jQuery( '.service_id_select' ).each(function(index){
						var value = jQuery(this).val();
						jQuery(this).html(response.service_list);
						jQuery(this).val(value);
					});
				}
			}
		});
	});

	toggle_remove_buttons();

	// Add more clones
	jQuery( '.add-clone' ).on( 'click', function(e){
		e.stopPropagation();
		var clone_last = jQuery(this).closest('.clone-wrapper').find( '.clone-field:last' );
		var clone_obj = clone_last.clone();
		clone_obj.insertAfter( clone_last );
		var input_obj = clone_obj.find( 'input' );

		// Reset value
		input_obj.val( '' );

		// Get the field name, and increment
		input_obj.each( function(index) {
			var name = jQuery(this).attr( 'name' ).replace( /\[(\d+)\]/, function( match, p1 )
			{
				return '[' + ( parseInt( p1 ) + 1 ) + ']';
			} );

			// Update the "name" attribute
			jQuery(this).attr( 'name', name );
		});

		var select_obj = clone_obj.find( 'select' );
		select_obj.each( function(index) {
			var name = select_obj.attr( 'name' ).replace( /\[(\d+)\]/, function( match, p1 )
			{
				return '[' + ( parseInt( p1 ) + 1 ) + ']';
			} );
			// Update the "name" attribute
			jQuery(this).attr( 'name', name );
			jQuery(this).find("option:selected").prop("selected", false);
		});

		toggle_remove_buttons();
		return false;
	} );

	// Remove clones
	jQuery( 'body' ).on( 'click', '.remove-clone', function(){
		// Remove clone only if there're 2 or more of them
		if ( jQuery(this).closest('.clone-wrapper').find('.clone-field').length <= 1 ) return false;

		jQuery(this).closest('.clone-field').remove();
		toggle_remove_buttons();
		return false;
	});

	function toggle_remove_buttons(){
		if ( jQuery('.clone-wrapper').length ) {
			jQuery('.clone-wrapper').each(function(index) {
				var button = jQuery(this).find( '.clone-field .remove-clone' );
				button.length < 2 ? button.hide() : button.show();
			});
		}
	}
});

var submitting = false;
function manage_order_validateForm() {
	"use strict";
	if ( submitting == true ) return false;
	if( '' == jQuery('#post_id').val()){
		alert(jQuery('#order-form').data('message'));
		return false;
	}
	submitting = true;
	return true;
}