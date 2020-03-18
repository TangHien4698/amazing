/**
 * v4.X TinyMCE specific functions. (from wordpress 3.9)
 */

(function() {

    tinymce.PluginManager.add('ct_shortcode', function(editor, url) {

        editor.addButton('ct_shortcode_button', {

            type  : 'menubutton',
            title  : 'Aventura Shortcode',
            style : 'background-image: url("' + url + '/aventura.png' + '"); background-repeat: no-repeat; background-position: 2px 2px;"',
            icon  : true,
            menu  : [
                { text: 'Basic',
                    menu : [
                        { text : 'Image', onclick: function() {
                            create_image();
                            jQuery.fancybox({
                                'type' : 'inline',
                                'title' : 'Add image',
                                'href' : '#create_image',
                                helpers:  {
                                    title : {
                                        type : 'over',
                                        position:'top'
                                    }
                                }
                            });
                        }
                        },
                        { text : 'Vimeo', onclick: function () {
                            create_vimeo() ;
                            jQuery.fancybox({
                                'type'    : 'inline',
                                'title'   : 'Add vimeo',
                                'href'    : '#create_vimeo',
                                helpers: {
                                    title : {
                                        type     : 'over',
                                        position : 'top'
                                    }
                                }
                            });
                        }
                        },
                        { text : 'Youtube', onclick : function() {
                            create_youtube();
                            jQuery.fancybox({
                                'type' : 'inline',
                                'title' : 'Add youtube',
                                'href' : '#create_youtube',
                                helpers:  {
                                    title : {
                                        type : 'over',
                                        position:'top'
                                    }
                                }
                            });
                        }
                        },
                    ]
                },
                { text: 'Tour Pages',
                    menu : [
                        { text : 'Tour Cart Page', onclick: function() {editor.insertContent('[tour_cart]');} },
                        { text : 'Tour CheckOut Page', onclick: function() {editor.insertContent('[tour_checkout]');} },
                        { text : 'Tour Booking Confirmation Page', onclick: function() {editor.insertContent('[tour_confirm]');} },
                        { text : 'Wishlist Page', onclick: function() {editor.insertContent('[tour_wishlist]');} },
                    ]
                }
            ]

        });

    });

})();

function create_image() {

    if ( jQuery('#create_image').length ) {
        jQuery('#create_image').remove();
    }
    var $html_image = jQuery('<div id="create_image">\
        <div class="create_content">\
            <div class="create_image_item">\
                <input type="text" class="image-upload-value" value="">\
                <button class="tzupload-image">Upload Image</button>\
                <button class="tz-remove"></button>\
            </div>\
        </div>\
        <button id="tz-new-image" class="tz-new" >Add New</button>\
        <button class="button-shortocde" id="tz-insert-img">Add shortcode</button>\
        </div>\
    </div>');
    $html_image.appendTo('body');
    upload();
    jQuery('#tz-new-image').on('click', function (event){
        event.preventDefault();
        var image_item = jQuery('.create_image_item').first().clone();
        image_item.find('input').val('');
        image_item.find('.tz-remove').addClass('tz-remove-block tz-remove-img');
        jQuery('.create_content').append(image_item);
        jQuery('.tz-remove-img').on('click',function(){
            jQuery(this).parent().remove();
        });
        upload();
    });
    // insert image
    jQuery('#tz-insert-img').on('click', function(){
        var $viewshortcode = ''
        jQuery('.image-upload-value').each(function(){
            var $image_src = jQuery(this).val();
            $viewshortcode += '[image src="'+$image_src+'"]';
        });
        tinyMCE.activeEditor.execCommand('mceInsertContent',0,$viewshortcode);
        jQuery.fancybox.close();
        jQuery('#create_image').remove();
    });
}

function upload(){
    var file_frame;
    jQuery('.tzupload-image').on('click', function( event ){
        event.preventDefault();
        // If the media frame already exists, reopen it.
        if ( file_frame ) {
            file_frame.open();
            return;
        }
        var $value_image = jQuery(this);
        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery( this ).data( 'uploader_title' ),
            button: {
                text: jQuery( this ).data( 'uploader_button_text' )
            },
            multiple: false // Set to true to allow multiple files to be selected
        });
        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first();
            $value_image.prev().val(attachment.attributes.url)
        });
        // Finally, open the modal
        file_frame.open();
    });
}

function create_vimeo() {
    if ( jQuery('#create_vimeo').length ) {
        jQuery('#create_vimeo').remove();
    }
    var $html_vimeo = jQuery('<div id="create_vimeo">\
                                    <div>\
                                    <input id="vimeo_id" type="text" value="" name="text" placeholder="ID" class="vimeo-attrs"/>\
                                    <span class="shortcode-eg">Eg: 1174512</span>\
                                    </div>\
                                    <div>\
                                    <input id="vimeo_width" name="width" type="text" value="" placeholder="Width" class="vimeo-attrs"/>\
                                    <span class="shortcode-eg">Eg: 100%</span>\
                                    </div>\
                                    <input id="vimeo_height" type="text" name="height" value="" placeholder="Height" class="vimeo-attrs"/>\
                                    <span class="shortcode-eg">Eg: 450px</span>\
                                    <div>\
                                    <button id="btn-insert-vimeo" class="button-shortocde" >Add shortcode</button>\
                                    </div>\
                                </div>');
    $html_vimeo.appendTo('body');

    jQuery('#btn-insert-vimeo').click(function () {
        var $width    = jQuery('#vimeo_width').val();
        var $height   = jQuery('#vimeo_height').val();
        var $content  = jQuery('#vimeo_id').val();
        var shortcode = '[vimeo width="'+$width+'" height="'+$height+'"]'+$content+'[/vimeo]';
        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
        jQuery.fancybox.close();
        jQuery('#create_vimeo').remove();
        return false;

    });
}

function create_youtube() {
    if ( jQuery('#create_youtube').length ) {
        jQuery('#create_youtube').remove();
    }
    var $html_youtube = jQuery('<div id="create_youtube" class="oscitas-container">\
                                    <div>\
                                    <input id="youtube_id" type="text" value="" name="text" placeholder="ID" class="youtube-attrs"/>\
                                    <span class="shortcode-eg">Eg: XSGBVzeBUbk</span>\
                                    </div>\
                                    <div>\
                                    <input id="youtube_width" name="width" type="text" value="" placeholder="Width" class="youtube-attrs"/>\
                                    <span class="shortcode-eg">Eg: 100%</span>\
                                    </div>\
                                    <input id="youtube_height" type="text" name="height" value="" placeholder="Height" class="youtube-attrs"/>\
                                    <span class="shortcode-eg">Eg: 450px</span>\
                                    <div>\
                                    <button id="btn-insert-youtube" class="button-shortocde" >Add shortcode</button>\
                                    </div>\
                                </div>');
    $html_youtube.appendTo('body');

    jQuery('#btn-insert-youtube').on('click',function () {
        var $width    = jQuery('#youtube_width').val();
        var $height   = jQuery('#youtube_height').val();
        var $content  = jQuery('#youtube_id').val();
        var shortcode = '[youtube width="'+$width+'" height="'+$height+'"]'+$content+'[/youtube]';
        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
        jQuery.fancybox.close();
        jQuery('#create_youtube').remove();
        return false;

    });
}