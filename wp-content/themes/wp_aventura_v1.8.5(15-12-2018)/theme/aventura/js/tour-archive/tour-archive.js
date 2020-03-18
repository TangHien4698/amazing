"use strict";

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

/*  Creat Cookie  */
function aventura_createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

/*  Read Cookie  */
function aventura_readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

/*  Delete Cookie  */
function aventura_eraseCookie(name) {
    aventura_createCookie(name,"",-1);
}

function aventura_tour_page_init(){

    var window_width        = Math.floor(jQuery(window).width());
    var desktopCol          = jQuery ('.tz-tour-archive').attr('data-desktop');
    var tabletCol           = jQuery ('.tz-tour-archive').attr('data-tablet');
    var mobilelandscapeCol  = jQuery ('.tz-tour-archive').attr('data-mobilelandscape');
    var mobileCol           = jQuery ('.tz-tour-archive').attr('data-mobile');
    if (window_width>1200){
        var cols = desktopCol;
    }
    if ((768 < window_width) && (window_width<= 1200) ){
        var cols = tabletCol;
    }
    if ((480 <= window_width) && (window_width<= 768) ){
        var cols = mobilelandscapeCol;
    }
    if (window_width < 480){
        var cols = mobileCol;
    }

    var tour_layouts = aventura_readCookie('tour_layout');

    if(tour_layouts === 'list'){
        var cols_layout = 1;
        jQuery('.tour-masonry').addClass('tour-layout-list');
    } else{
        var cols_layout = cols;
    }

    var container_width = jQuery('.tour-masonry').width();
    var item_width = Math.floor((container_width-1)/cols_layout);
    jQuery('.tz-tour-item').css({
        width:item_width+'px'
    });

    var $grid = jQuery('.tour-masonry').imagesLoaded( function() {
        $grid.masonry({
            itemSelector: '.tz-tour-item',
            percentPosition: true,
            columnWidth: item_width
        });
        aventura_ResizeImage(jQuery('.tz-thumb'));
    });
    jQuery('.tz-tour-item').css({
        opacity:1
    });
}

var tz_resizeTimer = null;
jQuery(window).load(function() {
    var container_width = jQuery('.tour-masonry').width();
    var tour_type           = jQuery ('.tz-tour-archive').attr('data-type');
    var tour_layouts = aventura_readCookie('tour_layout');

    if( tour_type != 'list-grid' ){
        aventura_eraseCookie('tour_layout');
    }
    if(tour_layouts==='list') {
        jQuery('.tour-layout-list-btn').addClass('active');
        jQuery('.tour-layout-grid-btn').removeClass('active');
    }
    if( jQuery(window).width() < 481 ){
        aventura_eraseCookie('tour_layout');
        jQuery('.tour-masonry').removeClass('tour-layout-list');
    }

    if (tz_resizeTimer) clearTimeout(tz_resizeTimer);
    tz_resizeTimer = setTimeout("aventura_tour_page_init()", 100);

});

jQuery(window).resize(function() {

    var container_width = jQuery('.tour-masonry').width();
    var tour_type           = jQuery ('.tz-tour-archive').attr('data-type');
    var tour_layouts = aventura_readCookie('tour_layout');

    if( tour_type != 'list-grid' ){
        aventura_eraseCookie('tour_layout');
    }
    if(tour_layouts==='list') {
        jQuery('.tour-layout-list-btn').addClass('active');
        jQuery('.tour-layout-grid-btn').removeClass('active');
    }
    if( jQuery(window).width() < 481 ){
        aventura_eraseCookie('tour_layout');
        jQuery('.tour-masonry').removeClass('tour-layout-list');
    }

    if (tz_resizeTimer) clearTimeout(tz_resizeTimer);
    tz_resizeTimer = setTimeout("aventura_tour_page_init()", 100);
});

jQuery(document).ready(function(){
    /*  Datepicker  */
    if ( jQuery('input.date-pick').length ) {
        var lang = jQuery('input.date-pick').data('locale');
        lang = lang.replace( '_', '-' );

        var day_start_week = jQuery('input.date-pick').data('day-start-week');
        if ( lang.substring( 0, 2 ) != 'fa' ) {
            jQuery('input.date-pick').datepicker({
                startDate: "today",
                autoclose: true,
                disableTouchKeyboard: true,
                language: lang,
                weekStart: day_start_week
            });
        } else {
            var date_format = jQuery('input.date-pick').data('date-format');
            jQuery('input.date-pick').persianDatepicker({
                observer: true,
                format: date_format.toUpperCase()
            });
        }
    }

    /*  List & Grid */
    jQuery('.tour-layout-grid-btn').on('click', function(){
        var active_class = jQuery(this).hasClass('active');
        if(active_class==false){
            jQuery(this).parent().find('.type-btn').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('.tz-tour-item').removeAttr('style');
            jQuery('.tz-tour-item').removeClass('tour-list');
            jQuery('.tour-masonry').removeClass('tour-layout-list');
            jQuery('.tour-masonry').removeAttr('style');
            aventura_eraseCookie('tour_layout');
            aventura_tour_page_init();
        }
    });
    jQuery('.tour-layout-list-btn').on('click', function(){
        var active_class = jQuery(this).hasClass('active');
        if(active_class==false){
            jQuery(this).parent().find('.type-btn').removeClass('active');
            jQuery(this).addClass('active');
            aventura_createCookie('tour_layout','list',1);
            jQuery('.tour-masonry').addClass('tour-layout-list');
            jQuery('.tz-tour-item').addClass('tour-list');
            jQuery('.tz-tour-item').removeAttr('style');
            jQuery('.tour-masonry').removeAttr('style');
            aventura_tour_page_init();
        }
    });

    /*  Filter  */

    /*  Price Filter Button */
    jQuery('.price-filter-btn').on('click', function(){
        var base_url = jQuery(this).closest('.price-filter').data('base-url').replace(/&amp;/g, '&');
        var new_url = base_url;
        var arg = jQuery(this).closest('.price-filter').data('arg');
        jQuery(this).closest('.price-filter').find('.price-value').each(function(index){
            if ( jQuery(this).val() == '' ) {new_url = base_url; return false;}
            new_url += '&' + arg + '[]=' + jQuery(this).val();
        });
        if (new_url.indexOf("?") < 0) { new_url = new_url.replace(/&/, '?'); }
        window.location.href = new_url;
        return false;
    });

    /*  Rating Filter Button */
    jQuery('.rating-filter-btn').on('click', function(){
        var base_url = jQuery(this).closest('.rating-filter').data('base-url').replace(/&amp;/g, '&');
        window.location.href = base_url;
        return false;
    });

    /*  List Filter Button */
    jQuery('.list-filter input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal'
    });
    jQuery('.list-filter input').on( 'ifToggled', function() {
        var base_url = jQuery(this).closest('ul').data('base-url').replace(/&amp;/g, '&');
        var new_url = base_url;
        var arg = jQuery(this).closest('ul').data('arg');
        jQuery(this).closest('ul').find('input:checked').each(function(index){
            if ( jQuery(this).val() == -1 || jQuery(this).val() == '' ) {new_url = base_url; return false;}
            new_url += '&' + arg + '[]=' + jQuery(this).val();
        });
        if (new_url.indexOf("?") < 0) { new_url = new_url.replace(/&/, '?'); }
        window.location.href = new_url;
        return false;
    });


    /*  Sort Order by */
    jQuery('#sort_price').change( function() {
        var base_url = jQuery(this).data('base-url').replace(/&amp;/g, '&');
        if ( jQuery(this).val() === "lower" ) {
            base_url += '&order_by=price&order=ASC';
        } else if ( jQuery(this).val() === "higher" ) {
            base_url += '&order_by=price&order=DESC';
        }
        if (base_url.indexOf("?") < 0) { base_url = base_url.replace(/&/, '?'); }
        window.location.href = base_url;
        return false;
    });

    jQuery('#sort_rating').change( function() {
        var base_url = jQuery(this).data('base-url').replace( /&amp;/g, '&' );
        if ( jQuery(this).val() === "lower" ) {
            base_url += '&order_by=rating&order=ASC';
        } else if ( jQuery(this).val() === "higher" ) {
            base_url += '&order_by=rating&order=DESC';
        }
        if (base_url.indexOf("?") < 0) { base_url = base_url.replace(/&/, '?'); }
        window.location.href = base_url;
        return false;
    });

    jQuery('#sort_name').change( function() {
        var base_url = jQuery(this).data('base-url').replace( /&amp;/g, '&' );
        if ( jQuery(this).val() === "lower" ) {
            base_url += '&order_by=name&order=ASC';
        } else if ( jQuery(this).val() === "higher" ) {
            base_url += '&order_by=name&order=DESC';
        }
        if (base_url.indexOf("?") < 0) { base_url = base_url.replace(/&/, '?'); }
        window.location.href = base_url;
        return false;
    });

    jQuery('#sort_popularity').change( function() {
        var base_url = jQuery(this).data('base-url').replace( /&amp;/g, '&' );
        if ( jQuery(this).val() === "lower" ) {
            base_url += '&order_by=popularity&order=ASC';
        } else if ( jQuery(this).val() === "higher" ) {
            base_url += '&order_by=popularity&order=DESC';
        }
        if (base_url.indexOf("?") < 0) { base_url = base_url.replace(/&/, '?'); }
        window.location.href = base_url;
        return false;
    });

    /*  Add checked class   */
    jQuery(".iradio_minimal,.icheckbox_minimal").each(function(){
        if(jQuery(this).hasClass("checked")){
            jQuery(this).parent().addClass("checked");
        }
    });
});

/*  Price Filter    */
if ( jQuery( ".price-filter" ).length ) {

    var rangeOne = document.querySelector('input[name="rangeOne"]'),
        rangeTwo = document.querySelector('input[name="rangeTwo"]'),
        outputOne = document.querySelector('.outputOne'),
        outputTwo = document.querySelector('.outputTwo'),
        inclRange = document.querySelector('.incl-range'),
        currency = document.querySelector('.range-currency'),
        updateView = function () {
            if (this.getAttribute('name') === 'rangeOne') {
                outputOne.value = this.value;
                outputOne.style.left = this.value / this.getAttribute('max') * 100 + '%';
            } else {
                outputTwo.style.left = this.value / this.getAttribute('max') * 100 + '%';
                outputTwo.value = this.value
            }
            if (parseInt(rangeOne.value) > parseInt(rangeTwo.value)) {
                inclRange.style.width = (rangeOne.value - rangeTwo.value) / this.getAttribute('max') * 100 + '%';
                inclRange.style.left = rangeTwo.value / this.getAttribute('max') * 100 + '%';
            } else {
                inclRange.style.width = (rangeTwo.value - rangeOne.value) / this.getAttribute('max') * 100 + '%';
                inclRange.style.left = rangeOne.value / this.getAttribute('max') * 100 + '%';
            }
        };

    document.addEventListener('DOMContentLoaded', function () {
        //console.log(currency);
        updateView.call(rangeOne);
        updateView.call(rangeTwo);
        jQuery('input[type="range"]').on('mouseup', function() {
            this.blur();
        }).on('mousedown input', function () {
            updateView.call(this);
        });
    });

}
/*  End Price Filter    */

/*  Rating Filter   */
var starClicked = false;
jQuery(function() {

    jQuery('.star').on('click',function() {

        jQuery(this).children('.selected').addClass('is-animated');
        jQuery(this).children('.selected').addClass('pulse');

        var target = this;

        setTimeout(function() {
            jQuery(target).children('.selected').removeClass('is-animated');
            jQuery(target).children('.selected').removeClass('pulse');
        }, 1000);

        starClicked = true;
    });

    jQuery('.half').on('click',function() {
        if (starClicked == true) {
            setHalfStarState(this)
        }
        jQuery(this).closest('.rating-content').find('.rating-score').val(jQuery(this).data('value'));

        var data_value = jQuery(this).data('value');
        var rating_value = '';
        var base_url = jQuery(this).closest('.rating-filter').data('base-url').replace(/&amp;/g, '&');
        var new_url = base_url;
        if( data_value == 0.5 ){
            rating_value = 5;
        }else if( data_value == 1.5 ){
            rating_value = 15;
        }else if( data_value == 2.5 ){
            rating_value = 25;
        }else if( data_value == 3.5 ){
            rating_value = 35;
        }else if( data_value == 4.5 ){
            rating_value = 45;
        }else if( data_value == 5 ){
            rating_value = 50;
        }else{
            rating_value = data_value;
        }
        var arg = jQuery(this).closest('.rating-filter').data('arg');
        if ( rating_value == '' ) {new_url = base_url; return false;}
        new_url += '&' + arg + '[]=' + rating_value;
        if (new_url.indexOf("?") < 0) { new_url = new_url.replace(/&/, '?'); }
        window.location.href = new_url;
        return false;
    });

    jQuery('.full').on('click',function() {
        if (starClicked == true) {
            setFullStarState(this)
        }
        jQuery(this).closest('.rating-content').find('.rating-score').val(jQuery(this).data('value'));

        var data_value = jQuery(this).data('value');
        var rating_value = '';
        var base_url = jQuery(this).closest('.rating-filter').data('base-url').replace(/&amp;/g, '&');
        var new_url = base_url;
        if( data_value == 0.5 ){
            rating_value = 5;
        }else if( data_value == 1.5 ){
            rating_value = 15;
        }else if( data_value == 2.5 ){
            rating_value = 25;
        }else if( data_value == 3.5 ){
            rating_value = 35;
        }else if( data_value == 4.5 ){
            rating_value = 45;
        }else if( data_value == 5 ){
            rating_value = 50;
        }else{
            rating_value = data_value;
        }
        var arg = jQuery(this).closest('.rating-filter').data('arg');
        if ( rating_value == '' ) {new_url = base_url; return false;}
        new_url += '&' + arg + '[]=' + rating_value;
        if (new_url.indexOf("?") < 0) { new_url = new_url.replace(/&/, '?'); }
        window.location.href = new_url;
        return false;
    });

    jQuery('.half').hover(function() {
        if (starClicked == false) {
            setHalfStarState(this)
        }
    }, function(){
        if (starClicked == false) {
            jQuery(this).removeClass('star-colour');
        }
    });

    jQuery('.full').hover(function() {
        if (starClicked == false) {
            setFullStarState(this)
        }
    }, function(){
        if (starClicked == false) {
            jQuery(this).removeClass('star-colour');
            jQuery(this).parent().removeClass('animate');
            jQuery(this).siblings('.half').removeClass('star-colour');
        }

    });

});
function updateStarState(target) {
    jQuery(target).parent().prevAll().addClass('animate');
    jQuery(target).parent().prevAll().children().addClass('star-colour');

    jQuery(target).parent().nextAll().removeClass('animate');
    jQuery(target).parent().nextAll().children().removeClass('star-colour');
}

function setHalfStarState(target) {
    jQuery(target).addClass('star-colour');
    jQuery(target).siblings('.full').removeClass('star-colour');
    updateStarState(target)
}

function setFullStarState(target) {
    jQuery(target).addClass('star-colour');
    jQuery(target).parent().addClass('animate');
    jQuery(target).siblings('.half').addClass('star-colour');

    updateStarState(target)
}
/*  End Rating Filter   */

/*  Select Custom   */
jQuery('select.select').each(function(){
    var $this = jQuery(this), numberOfOptions = jQuery(this).children('option').length;

    $this.addClass('select-hidden');
    $this.wrap('<div class="tz-select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option:selected').text());

    var $list = jQuery('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
        jQuery('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }

    var $listItems = $list.children('li');

    $styledSelect.on("click", function(e) {
        e.stopPropagation();
        jQuery('div.select-styled.active').not(this).each(function(){
            jQuery(this).removeClass('active').next('ul.select-options').hide();
        });
        jQuery(this).toggleClass('active').next('ul.select-options').toggle();
    });

    $listItems.on("click", function(e) {
        e.stopPropagation();
        $styledSelect.text(jQuery(this).text()).removeClass('active');
        $this.val(jQuery(this).attr('rel'));
        $list.hide();
        var sort_value = jQuery(this).attr('rel');
        var sort_type = $this.closest('.sort-btn').data('sort-type');
        var base_url = $this.closest('.sort-btn').data('base-url').replace( /&amp;/g, '&' );
        if ( sort_value === "lower" ) {
            base_url += '&order_by='+sort_type+'&order=ASC';
        } else if ( sort_value === "higher" ) {
            base_url += '&order_by='+sort_type+'&order=DESC';
        }
        if (base_url.indexOf("?") < 0) { base_url = base_url.replace(/&/, '?'); }
        window.location.href = base_url;
        return false;
    });

    jQuery(document).on("click", function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});


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

                    if( jQuery('select[name="departure_time"]').length ){
                        validation_rules.departure_time = { required: true};
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

/* Show Review Ajax */
jQuery(function($){
    $('.review-ajax-btn').each(function(){
        $(this).on('click',function(e) {
            e.preventDefault();
            $(this).find(".loading-ajax").addClass("active");
            var post_id         = $(this).data('post-id');
            $.ajax({
                url: aventura_ajax.url,
                type: 'POST',
                data: ({
                    action:         'aventura_review_lightbox',
                    post_id:        post_id
                }),
                success: function(data){
                    $(".loading-ajax").removeClass("active");
                    $('.tz-reviews-ajax-content').html(data).fadeIn();

                    /*  Close Lightbox Preview  */
                    $(".tz-close-preview").on("click",function(){
                        $(this).parents(".tz-reviews-ajax-content").fadeOut();
                    });

                },
                error: function() {
                    console.log("Error");
                }
            });
        });
    });
});
/*  End Show Review Ajax   */