<?php
/**
 * ReduxFramework Config File
 * TemPlaza Plazart Default Theme
 */
if ( ! class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$aventura_opt_name = "aventura_options";

/*  Get All Menu    */
$aventura_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
global $aventura_menuArray;
$aventura_menuArray = array(
    'choose'        => esc_html__('Choose Menu','aventura'),
);
if( isset($aventura_menus) && !empty($aventura_menus) ){
    foreach ( $aventura_menus as $aventura_menu ) {
        $aventura_menuArray[$aventura_menu->slug] = $aventura_menu->name;
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * */

$aventura_theme = wp_get_theme(); // For use with some settings. Not necessary.

$aventura_args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $aventura_opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $aventura_theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $aventura_theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => false,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'aventura'),
    'page_title'           => esc_html__('Theme Options', 'aventura'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);
Redux::setArgs( $aventura_opt_name, $aventura_args );
/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$aventura_tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => esc_html__( 'Theme Information 1', 'aventura' ),
        'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'aventura' )
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => esc_html__( 'Theme Information 2', 'aventura' ),
        'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'aventura' )
    )
);
Redux::setHelpTab( $aventura_opt_name, $aventura_tabs );

// Set the help sidebar
$aventura_content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'aventura' );
Redux::setHelpSidebar( $aventura_opt_name, $aventura_content );


/*
 * <--- END HELP TABS
 */

/* EXT LOADER */
if(!function_exists('redux_register_custom_extension_loader')) :
    function redux_register_custom_extension_loader($ReduxFramework) {
        $path = dirname( __FILE__ ) . '/';
//        var_dump($path);
        $folders = scandir( $path, 1 );
        foreach($folders as $folder) {
            if ($folder === '.' or $folder === '..' or !is_dir($path . $folder) ) {
                continue;
            }
            $extension_class = 'ReduxFramework_Extension_' . $folder;
            if( !class_exists( $extension_class ) ) {
                // In case you wanted override your override, hah.
                $class_file = $path . $folder . '/extension_' . $folder . '.php';
                $class_file = apply_filters( 'redux/extension/'.$ReduxFramework->args['opt_name'].'/'.$folder, $class_file );
                if( $class_file ) {
                    require_once( $class_file );
                    $extension = new $extension_class( $ReduxFramework );
                }
            }
        }
    }
    // Modify {$redux_opt_name} to match your opt_name
    add_action("redux/extensions/".$aventura_opt_name ."/before", 'redux_register_custom_extension_loader', 0);
endif;

/*
 * ---> START SECTIONS
 */

/*
 *  As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

// -> START option background

Redux::setSection( $aventura_opt_name, array(
    'id'               => 'aventura_TemPlaza',
    'title'            => esc_html__( 'Aventura 1.0', 'aventura' ),
    'desc'             => esc_html__('Aventura – Travelling WordPress Theme, coming with elegant and modest appearance, will be a meaningful WordPress theme for Travelling, Journey Blog. Its stunning beauty, fashionable clean look and proper execution, accompanying with making use of Visual Composer, Aventura and Revolution Slider plugin, will help you to own an awesome travelling site for your journey. Aventura will adapt automatically to the screen size of the device and display all the content in an intuitive and simple way.','aventura'),
    'customizer_width' => '400px',
    'icon'             => '',
));

// -> END option background

// -> START General Options

    Redux::setSection( $aventura_opt_name, array(
        'title'            => esc_html__( 'General Options', 'aventura' ),
        'id'               => 'aventura_general',
        'desc'             => esc_html__( 'General all config', 'aventura' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-th-large',
    ));

//Favicon Config

    Redux::setSection( $aventura_opt_name, array(
        'title'      => esc_html__( 'Favicon', 'aventura' ),
        'id'         => 'aventura_favicon_config',
        'desc'       => '',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'aventura_favicon_upload',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Upload Favicon Image', 'aventura' ),
                'subtitle' => esc_html__( 'Favicon image for your website', 'aventura' ),
                'desc'     => '',
                'default'  => false,
            ),
        )
    ));

//Loading config
    Redux::setSection( $aventura_opt_name, array(
        'title'      => esc_html__( 'Loading config', 'aventura' ),
        'id'         => 'aventura_general_loading',
        'desc'       => '',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'aventura_general_show_loading',
                'type'     => 'switch',
                'title'    => esc_html__( 'Loading On/Off', 'aventura' ),
                'default'  => false,
            ),
            array(
                'id'       => 'aventura_general_image_loading',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Upload image loading', 'aventura' ),
                'subtitle' => esc_html__( 'Upload image .gif', 'aventura' ),
                'default'  => '',
                'required' => array( 'aventura_general_show_loading', '=', true ),
            ),
        )
    ));

// -> START Background Options

    Redux::setSection( $aventura_opt_name, array(
        'title'            => esc_html__( 'Background', 'aventura' ),
        'id'               => 'aventura_background',
        'desc'             => esc_html__( 'Background all config', 'aventura' ),
        'customizer_width' => '400px',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'aventura_background_body',
                'output'   => '#bd',
                'type'     => 'background',
                'clone'    => 'true',
                'title'    => esc_html__( 'Body background', 'aventura' ),
                'subtitle' => esc_html__( 'Body background with image, color, etc.', 'aventura' ),
                'hint'     => array(
                    'content' => 'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
                )
            ),
        ),
    ));

// -> END Background Options

    // -> END General Options

// -> START Header Options
    Redux::setSection( $aventura_opt_name, array(
        'title'            => esc_html__( 'Header', 'aventura' ),
        'id'               => 'aventura_header',
        'desc'             => esc_html__( 'Header all config', 'aventura' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-arrow-up',
    ));

// Header Select Type
    Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Header Select Type', 'aventura' ),
    'id'         => 'aventura_header_select_type',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_header_type_select',
            'type'     => 'select',
            'title'    => esc_html__( 'Header Type', 'aventura' ),
            'subtitle' => esc_html__( 'select type for header', 'aventura' ),
            'options'  => array(
                '0'    => esc_html__('Header Type 1','aventura'),
                '1'    => esc_html__('Header Type 2','aventura'),
                '2'    => esc_html__('Header Type 3','aventura'),
                '3'    => esc_html__('Header Type 4','aventura'),
                '4'    => esc_html__('Header Type 5','aventura'),
            ),
            'default'  => '0'
        ),

        array(
            'id'       => 'aventura_header_type_1_preview',
            'type'    => 'image_select',
            'title'    => '',
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 1','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-1.jpg'
                ),
            ),
            'required' => array(
                array('aventura_header_type_select','equals','0'),
            ),
        ),
        array(
            'id'       => 'aventura_header_type_2_preview',
            'type'    => 'image_select',
            'title'    => '',
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 2','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-2.jpg'
                ),
            ),
            'required' => array(
                array('aventura_header_type_select','equals','1'),
            ),
        ),
        array(
            'id'       => 'aventura_header_type_3_preview',
            'type'    => 'image_select',
            'title'    => '',
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 3','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-3.jpg'
                ),
            ),
            'required' => array(
                array('aventura_header_type_select','equals','2'),
            ),
        ),
        array(
            'id'       => 'aventura_header_type_4_preview',
            'type'    => 'image_select',
            'title'    => '',
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 4','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-4.jpg'
                ),
            ),
            'required' => array(
                array('aventura_header_type_select','equals','3'),
            ),
        ),
        array(
            'id'       => 'aventura_header_type_5_preview',
            'type'    => 'image_select',
            'title'    => '',
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 5','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-5.jpg'
                ),
            ),
            'required' => array(
                array('aventura_header_type_select','equals','4'),
            ),
        ),
    )

));

// Header Type 1 Options
Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Header Type 1 Options', 'aventura' ),
    'id'         => 'aventura_header_type_1_options',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_header_type_1_options_preview',
            'type'    => 'image_select',
            'title'    => esc_html__('Header Type 1 Preview','aventura'),
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 1','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-1.jpg'
                ),
            ),
        ),

        array(
            'id'       => 'aventura_header_type_1_menu_locations',
            'type'     => 'select',
            'title'    => esc_html__( 'Menu Location', 'aventura' ),
            'subtitle' => '',
            'desc'     => esc_html__( 'Select Menu Location. Defaut: Primary Menu', 'aventura' ),
            'data'     => 'menu_locations'
        ),

        array(
            'id'       => 'aventura_header_type_1_top_display',
            'type'     => 'switch',
            'title'    => esc_html__( 'Header Top Display', 'aventura' ),
            'default'  => false,
        ),
        array(
            'id'       => 'aventura_header_type_1_top_email',
            'type'     => 'text',
            'title'    => esc_html__( 'Email', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__('info@aventura.com ','aventura'),
            'placeholder' => esc_html__('info@aventura.com ','aventura'),
            'required' => array( 'aventura_header_type_1_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_1_top_phone',
            'type'     => 'text',
            'title'    => esc_html__( 'Phone', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__('+1-888-66-5555','aventura'),
            'placeholder' => esc_html__('+1-888-66-5555','aventura'),
            'required' => array( 'aventura_header_type_1_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_1_top_address',
            'type'     => 'text',
            'title'    => esc_html__( 'Address', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__('8 Boulevard du Palais, 75001 Paris, France','aventura'),
            'placeholder' => esc_html__('8 Boulevard du Palais, 75001 Paris, France','aventura'),
            'required' => array( 'aventura_header_type_1_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_1_top_menu',
            'type'     => 'select',
            'title'    => esc_html__( 'Choose Menu', 'aventura' ),
            'desc'     => esc_html__( 'This option is used to add a navigation or a custom link created in Appearance > Menus to the top bar', 'aventura' ),
            'default'  => 'choose',
            'options'  => $aventura_menuArray,
            'required' => array( 'aventura_header_type_1_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_1_top_randl',
            'type'     => 'switch',
            'title'    => esc_html__( 'Register/Login', 'aventura' ),
            'desc'     => '',
            'default'  => true,
            'required' => array( 'aventura_header_type_1_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_1_logo_option',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo Type', 'aventura' ),
            'subtitle' => esc_html__( 'select type for logo', 'aventura' ),
            'default'  => 'logo_image',
            'options'  => array(
                'logo_text'    => esc_html__('Logo Text','aventura'),
                'logo_image'  => esc_html__('Logo Image','aventura'),
            )
        ),
        array(
            'id'       => 'aventura_header_type_1_logo_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Upload Logo Image', 'aventura' ),
            'subtitle' => esc_html__( 'logo image for your website', 'aventura' ),
            'desc'     => '',
            'default'  => false,
            'required' => array( 'aventura_header_type_1_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'             => 'aventura_header_type_1_logo_size',
            'type'           => 'dimensions',
            'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title'          => esc_html__( 'Set width/height for logo image', 'aventura' ),
            'subtitle'       => '',
            'default'        => array(
                'width'  => '',
                'height' => '',
            ),
            'output'         => array('.tz_logo img'),
            'required' => array( 'aventura_header_type_1_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'       => 'aventura_header_type_1_logo_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Logo Text', 'aventura' ),
            'subtitle' => esc_html__( 'logo text for your website', 'aventura' ),
            'desc'     => esc_html__( '', 'aventura' ),
            'output'   => '',
            'default'  => esc_html__('Aventura','aventura'),
            'placeholder' => esc_html__('Aventura','aventura'),
            'required' => array( 'aventura_header_type_1_logo_option', '=', array( 'logo_text' ) )
        ),
        array(
            'id'       => 'aventura_header_type_1_logo_text_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Color Logo Text', 'aventura' ),
            'desc'     => '',
            'output'   => '.tz_logo .tz-logo-text',
            'default'  => '#000',
            'placeholder' => esc_html__( 'Aventura', 'aventura' ),
            'required' => array( 'aventura_header_type_1_logo_option', '=', array( 'logo_text' ) )
        ),

    )
));

// Header Type 2 Options
Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Header Type 2 Options', 'aventura' ),
    'id'         => 'aventura_header_type_2_options',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_header_type_2_options_preview',
            'type'    => 'image_select',
            'title'    => esc_html__('Header Type 2 Preview','aventura'),
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 2','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-2.jpg'
                ),
            ),
        ),

        array(
            'id'       => 'aventura_header_type_2_menu_locations',
            'type'     => 'select',
            'title'    => esc_html__( 'Menu Location', 'aventura' ),
            'subtitle' => '',
            'desc'     => esc_html__( 'Select Menu Location. Defaut: Primary Menu', 'aventura' ),
            'data'     => 'menu_locations'
        ),

        array(
            'id'       => 'aventura_header_type_2_logo_option',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo Type', 'aventura' ),
            'subtitle' => esc_html__( 'select type for logo', 'aventura' ),
            'default'  => 'logo_image',
            'options'  => array(
                'logo_text'    => esc_html__('Logo Text','aventura'),
                'logo_image'  => esc_html__('Logo Image','aventura'),
            )
        ),
        array(
            'id'       => 'aventura_header_type_2_logo_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Upload Logo Image', 'aventura' ),
            'subtitle' => esc_html__( 'logo image for your website', 'aventura' ),
            'desc'     => '',
            'default'  => false,
            'required' => array( 'aventura_header_type_2_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'             => 'aventura_header_type_2_logo_size',
            'type'           => 'dimensions',
            'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title'          => esc_html__( 'Set width/height for logo image', 'aventura' ),
            'subtitle'       => '',
            'default'        => array(
                'width'  => '',
                'height' => '',
            ),
            'output'         => array('.tz_logo img'),
            'required' => array( 'aventura_header_type_2_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'       => 'aventura_header_type_2_logo_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Logo Text', 'aventura' ),
            'subtitle' => esc_html__( 'logo text for your website', 'aventura' ),
            'desc'     => esc_html__( '', 'aventura' ),
            'output'   => '',
            'default'  => esc_html__('Aventura','aventura'),
            'placeholder' => esc_html__('Aventura','aventura'),
            'required' => array( 'aventura_header_type_2_logo_option', '=', array( 'logo_text' ) )
        ),
        array(
            'id'       => 'aventura_header_type_2_logo_text_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Color Logo Text', 'aventura' ),
            'desc'     => '',
            'output'   => '.tz_logo .tz-logo-text',
            'default'  => '#000',
            'placeholder' => esc_html__( 'Aventura', 'aventura' ),
            'required' => array( 'aventura_header_type_2_logo_option', '=', array( 'logo_text' ) )
        ),

    )
));

// Header Type 3 Options
Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Header Type 3 Options', 'aventura' ),
    'id'         => 'aventura_header_type_3_options',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_header_type_3_options_preview',
            'type'    => 'image_select',
            'title'    => esc_html__('Header Type 3 Preview','aventura'),
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 3','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-3.jpg'
                ),
            ),
        ),

        array(
            'id'       => 'aventura_header_type_3_menu_locations',
            'type'     => 'select',
            'title'    => esc_html__( 'Menu Location', 'aventura' ),
            'subtitle' => '',
            'desc'     => esc_html__( 'Select Menu Location. Defaut: Primary Menu', 'aventura' ),
            'data'     => 'menu_locations'
        ),

        array(
            'id'       => 'aventura_header_type_3_top_display',
            'type'     => 'switch',
            'title'    => esc_html__( 'Header Top Display', 'aventura' ),
            'default'  => false,
        ),
        array(
            'id'       => 'aventura_header_type_3_top_email',
            'type'     => 'text',
            'title'    => esc_html__( 'Email', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__('info@aventura.com ','aventura'),
            'placeholder' => esc_html__('info@aventura.com ','aventura'),
            'required' => array( 'aventura_header_type_3_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_3_top_phone',
            'type'     => 'text',
            'title'    => esc_html__( 'Phone', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__('+1-888-66-5555','aventura'),
            'placeholder' => esc_html__('+1-888-66-5555','aventura'),
            'required' => array( 'aventura_header_type_3_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_3_top_address',
            'type'     => 'text',
            'title'    => esc_html__( 'Address', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__('8 Boulevard du Palais, 75001 Paris, France','aventura'),
            'placeholder' => esc_html__('8 Boulevard du Palais, 75001 Paris, France','aventura'),
            'required' => array( 'aventura_header_type_3_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_3_top_menu',
            'type'     => 'select',
            'title'    => esc_html__( 'Choose Menu', 'aventura' ),
            'desc'     => esc_html__( 'This option is used to add a navigation or a custom link created in Appearance > Menus to the top bar', 'aventura' ),
            'default'  => 'choose',
            'options'  => $aventura_menuArray,
            'required' => array( 'aventura_header_type_3_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_3_top_randl',
            'type'     => 'switch',
            'title'    => esc_html__( 'Register/Login', 'aventura' ),
            'desc'     => '',
            'default'  => true,
            'required' => array( 'aventura_header_type_3_top_display', '=', true ),
        ),
        array(
            'id'       => 'aventura_header_type_3_logo_option',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo Type', 'aventura' ),
            'subtitle' => esc_html__( 'select type for logo', 'aventura' ),
            'default'  => 'logo_image',
            'options'  => array(
                'logo_text'    => esc_html__('Logo Text','aventura'),
                'logo_image'  => esc_html__('Logo Image','aventura'),
            )
        ),
        array(
            'id'       => 'aventura_header_type_3_logo_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Upload Logo Image', 'aventura' ),
            'subtitle' => esc_html__( 'logo image for your website', 'aventura' ),
            'desc'     => '',
            'default'  => false,
            'required' => array( 'aventura_header_type_3_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'             => 'aventura_header_type_3_logo_size',
            'type'           => 'dimensions',
            'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title'          => esc_html__( 'Set width/height for logo image', 'aventura' ),
            'subtitle'       => '',
            'default'        => array(
                'width'  => '',
                'height' => '',
            ),
            'output'         => array('.tz_logo img'),
            'required' => array( 'aventura_header_type_3_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'       => 'aventura_header_type_3_logo_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Logo Text', 'aventura' ),
            'subtitle' => esc_html__( 'logo text for your website', 'aventura' ),
            'desc'     => esc_html__( '', 'aventura' ),
            'output'   => '',
            'default'  => esc_html__('Aventura','aventura'),
            'placeholder' => esc_html__('Aventura','aventura'),
            'required' => array( 'aventura_header_type_3_logo_option', '=', array( 'logo_text' ) )
        ),
        array(
            'id'       => 'aventura_header_type_3_logo_text_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Color Logo Text', 'aventura' ),
            'desc'     => '',
            'output'   => '.tz_logo .tz-logo-text',
            'default'  => '#000',
            'placeholder' => esc_html__( 'Aventura', 'aventura' ),
            'required' => array( 'aventura_header_type_3_logo_option', '=', array( 'logo_text' ) )
        ),

    )
));

// Header Type 4 Options
Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Header Type 4 Options', 'aventura' ),
    'id'         => 'aventura_header_type_4_options',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_header_type_4_options_preview',
            'type'    => 'image_select',
            'title'    => esc_html__('Header Type 4 Preview','aventura'),
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 4','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-4.jpg'
                ),
            ),
        ),

        array(
            'id'       => 'aventura_header_type_4_menu_locations',
            'type'     => 'select',
            'title'    => esc_html__( 'Menu Location', 'aventura' ),
            'subtitle' => '',
            'desc'     => esc_html__( 'Select Menu Location. Defaut: Primary Menu', 'aventura' ),
            'data'     => 'menu_locations'
        ),

        array(
            'id'       => 'aventura_header_type_4_logo_option',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo Type', 'aventura' ),
            'subtitle' => esc_html__( 'select type for logo', 'aventura' ),
            'default'  => 'logo_image',
            'options'  => array(
                'logo_text'    => esc_html__('Logo Text','aventura'),
                'logo_image'  => esc_html__('Logo Image','aventura'),
            )
        ),
        array(
            'id'       => 'aventura_header_type_4_logo_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Upload Logo Image', 'aventura' ),
            'subtitle' => esc_html__( 'logo image for your website', 'aventura' ),
            'desc'     => '',
            'default'  => false,
            'required' => array( 'aventura_header_type_4_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'             => 'aventura_header_type_4_logo_size',
            'type'           => 'dimensions',
            'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title'          => esc_html__( 'Set width/height for logo image', 'aventura' ),
            'subtitle'       => '',
            'default'        => array(
                'width'  => '',
                'height' => '',
            ),
            'output'         => array('.tz_logo img'),
            'required' => array( 'aventura_header_type_4_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'       => 'aventura_header_type_4_logo_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Logo Text', 'aventura' ),
            'subtitle' => esc_html__( 'logo text for your website', 'aventura' ),
            'desc'     => esc_html__( '', 'aventura' ),
            'output'   => '',
            'default'  => esc_html__('Aventura','aventura'),
            'placeholder' => esc_html__('Aventura','aventura'),
            'required' => array( 'aventura_header_type_4_logo_option', '=', array( 'logo_text' ) )
        ),
        array(
            'id'       => 'aventura_header_type_4_logo_text_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Color Logo Text', 'aventura' ),
            'desc'     => '',
            'output'   => '.tz_logo .tz-logo-text',
            'default'  => '#000',
            'placeholder' => esc_html__( 'Aventura', 'aventura' ),
            'required' => array( 'aventura_header_type_4_logo_option', '=', array( 'logo_text' ) )
        ),

    )
));

// Header Type 5 Options
Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Header Type 5 Options', 'aventura' ),
    'id'         => 'aventura_header_type_5_options',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_header_type_5_options_preview',
            'type'    => 'image_select',
            'title'    => esc_html__('Header Type 5 Preview','aventura'),
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 5','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/header-5.jpg'
                ),
            ),
        ),

        array(
            'id'       => 'aventura_header_type_5_revolution_slider',
            'type'     => 'text',
            'title'    => esc_html__( 'Alias Of Revolution Slider', 'aventura' ),
            'desc'     => esc_html__('Insert the alias of slider revolution here','aventura'),
            'default'  => '',
        ),

        array(
            'id'       => 'aventura_header_type_5_search_options',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Search Box Option', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide search box section.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '2'
        ),

        // Field Name
        array(
            'id'       => 'aventura_header_type_5_field_name_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Field Name Option', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide field name of search box.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_header_type_5_search_options', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_header_type_5_field_name_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Field Name Label', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__( 'Keywords', 'aventura' ),
            'required' => array( 'aventura_header_type_5_field_name_option', '=', '1' ),
        ),

        // Field Destination
        array(
            'id'       => 'aventura_header_type_5_field_destination_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Field Destination Option', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide field Destination of search box.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_header_type_5_search_options', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_header_type_5_field_destination_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Field Destination Label', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__( 'Destination', 'aventura' ),
            'required' => array( 'aventura_header_type_5_field_destination_option', '=', '1' ),
        ),

        // Field Date
        array(
            'id'       => 'aventura_header_type_5_field_date_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Field Date Option', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide field Date of search box.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_header_type_5_search_options', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_header_type_5_field_date_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Field Date Label', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__( 'Date', 'aventura' ),
            'required' => array( 'aventura_header_type_5_field_date_option', '=', '1' ),
        ),

        // Field Duration
        array(
            'id'       => 'aventura_header_type_5_field_duration_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Field Duration Option', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide field duration of search box.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_header_type_5_search_options', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_header_type_5_field_duration_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Field Duration Label', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__( 'Category', 'aventura' ),
            'required' => array( 'aventura_header_type_5_field_duration_option', '=', '1' ),
        ),

        // Field Category
        array(
            'id'       => 'aventura_header_type_5_field_category_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Field Category Option', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide field category of search box.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_header_type_5_search_options', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_header_type_5_field_category_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Field Category Label', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__( 'Category', 'aventura' ),
            'required' => array( 'aventura_header_type_5_field_category_option', '=', '1' ),
        ),

        // Field Language
        array(
            'id'       => 'aventura_header_type_5_field_language_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Field Language Option', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide field language of search box.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_header_type_5_search_options', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_header_type_5_field_language_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Field Language Label', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__( 'Language', 'aventura' ),
            'required' => array( 'aventura_header_type_5_field_language_option', '=', '1' ),
        ),

        // Button Search
        array(
            'id'       => 'aventura_header_type_5_search_button',
            'type'     => 'text',
            'title'    => esc_html__( 'Button Search', 'aventura' ),
            'desc'     => '',
            'default'  => esc_html__( 'Search', 'aventura' ),
            'required' => array( 'aventura_header_type_5_search_options', '=', '1' ),
        ),

        array(
            'id'       => 'aventura_header_type_5_menu_locations',
            'type'     => 'select',
            'title'    => esc_html__( 'Menu Location', 'aventura' ),
            'subtitle' => '',
            'desc'     => esc_html__( 'Select Menu Location. Defaut: Primary Menu', 'aventura' ),
            'data'     => 'menu_locations'
        ),

        array(
            'id'       => 'aventura_header_type_5_logo_option',
            'type'     => 'select',
            'title'    => esc_html__( 'Logo Type', 'aventura' ),
            'subtitle' => esc_html__( 'select type for logo', 'aventura' ),
            'default'  => 'logo_image',
            'options'  => array(
                'logo_text'    => esc_html__('Logo Text','aventura'),
                'logo_image'  => esc_html__('Logo Image','aventura'),
            )
        ),
        array(
            'id'       => 'aventura_header_type_5_logo_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Upload Logo Image', 'aventura' ),
            'subtitle' => esc_html__( 'logo image for your website', 'aventura' ),
            'desc'     => '',
            'default'  => false,
            'required' => array( 'aventura_header_type_5_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'             => 'aventura_header_type_5_logo_size',
            'type'           => 'dimensions',
            'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title'          => esc_html__( 'Set width/height for logo image', 'aventura' ),
            'subtitle'       => '',
            'default'        => array(
                'width'  => '',
                'height' => '',
            ),
            'output'         => array('.tz_logo img'),
            'required' => array( 'aventura_header_type_5_logo_option', '=', array( 'logo_image' ) )
        ),
        array(
            'id'       => 'aventura_header_type_5_logo_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Logo Text', 'aventura' ),
            'subtitle' => esc_html__( 'logo text for your website', 'aventura' ),
            'desc'     => esc_html__( '', 'aventura' ),
            'output'   => '',
            'default'  => esc_html__('Aventura','aventura'),
            'placeholder' => esc_html__('Aventura','aventura'),
            'required' => array( 'aventura_header_type_5_logo_option', '=', array( 'logo_text' ) )
        ),
        array(
            'id'       => 'aventura_header_type_5_logo_text_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Color Logo Text', 'aventura' ),
            'desc'     => '',
            'output'   => '.tz_logo .tz-logo-text',
            'default'  => '#000',
            'placeholder' => esc_html__( 'Aventura', 'aventura' ),
            'required' => array( 'aventura_header_type_5_logo_option', '=', array( 'logo_text' ) )
        ),

    )
));

// -> END Header Options

// -> START Breadcrumbs Options

Redux::setSection( $aventura_opt_name, array(
    'title'             => esc_html__( 'Breadcrumbs', 'aventura' ),
    'id'                => 'aventura_breadcrumbs',
    'desc'              => '',
    'customizer_width'  => '400px',
    'icon'              => 'el el-caret-right',
    'fields'            => array(

        array(
            'id'       => 'aventura_breadcrumbs_options',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Breadcrumbs Options', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide breadcrumb section.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_breadcrumb_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Image Background', 'aventura' ),
            'subtitle' => esc_html__( 'Image background for your breadcrumb', 'aventura' ),
            'required' => array( 'aventura_breadcrumbs_options', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_breadcrumbs_title',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Title', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide title of breadcrumb section.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_breadcrumbs_options', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_breadcrumbs_link',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Breadcrumb', 'aventura' ),
            'subtitle' => esc_html__( 'Show or hide breadcrumb.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_breadcrumbs_options', '=', '1' ),
        ),

        array(
            'id'       => 'aventura_breadcrumb_margin',
            'type'     => 'spacing',
            'output'   => array( '.tz-Breadcrumb .tzOverlayBreadcrumb' ),
            'mode'     => 'padding',
            'right'    => false,     // Disable the right
            'left'     => false,     // Disable the left
            'units'    => array( 'em', 'px', '%' ),
            'title'    => esc_html__( 'Breadcrumb Padding', 'aventura' ),
            'subtitle' => esc_html__( 'Controls the top/bottom padding for breadcrumb.', 'aventura' ),
            'desc'     => esc_html__( 'Enter values including any valid CSS unit, ex: 55px, 40px.', 'aventura' ),
            'default'  => array(
                'margin-top'    => '0',
                'margin-bottom' => '0',
            )
        )

    )
));

// -> END Breadcrumbs Options

// -> START Newsletter Options
Redux::setSection( $aventura_opt_name, array(
    'title'            => esc_html__( 'Newsletter', 'aventura' ),
    'id'               => 'aventura_newsletter',
    'desc'             => esc_html__( 'Newsletter all config', 'aventura' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-envelope',
    'fields'            => array(
        array(
            'id'       => 'aventura_newsletter_type_select',
            'type'     => 'select',
            'title'    => esc_html__( 'Newsletter Type', 'aventura' ),
            'subtitle' => esc_html__( 'select type for newsletter', 'aventura' ),
            'options'  => array(
                '0'    => esc_html__('Newsletter Type 1','aventura'),
                '1'    => esc_html__('Newsletter Type 2','aventura'),
                '2'    => esc_html__('Hide Newsletter','aventura'),
            ),
            'default'  => '0'
        ),

        array(
            'id'       => 'aventura_newsletter_type_1_preview',
            'type'    => 'image_select',
            'title'    => '',
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Newsletter Type 1','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/newsletter-type-1.jpg'
                ),
            ),
            'required' => array('aventura_newsletter_type_select','equals','0'),
        ),
        array(
            'id'       => 'aventura_newsletter_type_2_preview',
            'type'    => 'image_select',
            'title'    => '',
            'subtitle' => '',
            'options'  => array(
                '0' => array(
                    'alt' => esc_html__('Newsletter Type 2','aventura'),
                    'img' => get_template_directory_uri()  . '/extension/assets/images/newsletter-type-2.jpg'
                ),
            ),
            'required' => array('aventura_newsletter_type_select','equals','1'),
        ),

        array(
            'id'       => 'aventura_newsletter_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Title', 'aventura' ),
            'desc'     => esc_html__( '', 'aventura' ),
            'default'  => esc_html__('Submit your newsletter','aventura'),
            'required' => array('aventura_newsletter_type_select','equals',array('0','1')),
        ),

        array(
            'id'       => 'aventura_newsletter_subtitle',
            'type'     => 'text',
            'title'    => esc_html__( 'Subtitle', 'aventura' ),
            'desc'     => esc_html__( '', 'aventura' ),
            'default'  => esc_html__('Register now! We will send you best offers for your trip.','aventura'),
            'required' => array('aventura_newsletter_type_select','equals',array('0','1')),
        ),

        array(
            'id'       => 'aventura_newsletter_background',
            'type'     => 'background',
            'title'    => esc_html__('Background Option', 'aventura'),
            'output'   => '.tz-newsletter',
            'desc'     => esc_html__('Option background for newsletter section', 'aventura'),
            'required' => array('aventura_newsletter_type_select','equals',array('0','1')),
        )
    )
));

// -> END Newsletter Options

// -> START Footer Options
    Redux::setSection( $aventura_opt_name, array(
        'title'            => esc_html__( 'Footer', 'aventura' ),
        'id'               => 'aventura_footer',
        'desc'             => esc_html__( 'Footer all config', 'aventura' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-arrow-down'
    ));

//Footer Content

    Redux::setSection( $aventura_opt_name, array(
        'title'      => esc_html__( 'Footer Content', 'aventura' ),
        'id'         => 'aventura_footer_content',
        'desc'       => '',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'aventura_footer_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Type', 'aventura' ),
                'subtitle' => esc_html__( 'Select type of footer', 'aventura' ),
                'options'  => array(
                    '0'    => esc_html__('Type 1','aventura'),
                    '1'    => esc_html__('Type 2','aventura'),
                ),
                'default'  => '0',
            ),

            array(
                'id'       => 'aventura_footer_type_1_preview',
                'type'    => 'image_select',
                'title'    => '',
                'subtitle' => '',
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer Type 1','aventura'),
                        'img' => get_template_directory_uri()  . '/extension/assets/images/footer-type-1.jpg'
                    ),
                ),
                'required' => array(
                    array('aventura_footer_type','equals','0'),
                ),
            ),
            array(
                'id'       => 'aventura_footer_type_2_preview',
                'type'    => 'image_select',
                'title'    => '',
                'subtitle' => '',
                'options'  => array(
                    '2' => array(
                        'alt' => esc_html__('Footer Type 2','aventura'),
                        'img' => get_template_directory_uri()  . '/extension/assets/images/footer-type-2.jpg'
                    ),
                ),
                'required' => array(
                    array('aventura_footer_type','equals','1'),
                ),
            ),

            array(
                'id'       => 'aventura_footer_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer Type 2 Background', 'aventura'),
                'output'   => '.tz-footer.tz-footer-type-2',
                'desc'     => esc_html__('Option background for footer type 2', 'aventura'),
            ),

            array(
                'id'       => 'aventura_footer_column_col',
                'type'     => 'select',
                'title'    => esc_html__( 'Number of Footer Columns', 'aventura' ),
                'subtitle' => esc_html__( 'Controls the number of columns in the footer', 'aventura' ),
                'options'  => array(
                    '0'    => esc_html__('No Footer','aventura'),
                    '1'    => esc_html__('Footer 1 Column','aventura'),
                    '2'    => esc_html__('Footer 2 Column','aventura'),
                    '3'    => esc_html__('Footer 3 Column','aventura'),
                    '4'    => esc_html__('Footer 4 Column','aventura'),
                ),
                'default'  => '4',
            ),

            array(
                'id'       => 'aventura_footer_0column_preview',
                'type'    => 'image_select',
                'title'    => '',
                'subtitle' => '',
                'options'  => array(
                    '0' => array(
                        'alt' => esc_html__('No Footer','aventura'),
                        'img' => get_template_directory_uri()  . '/extension/assets/images/no-footer.jpg'
                    ),
                ),
                'required' => array(
                    array('aventura_footer_column_col','equals','0'),
                ),
            ),
            array(
                'id'       => 'aventura_footer_1column_preview',
                'type'    => 'image_select',
                'title'    => '',
                'subtitle' => '',
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column','aventura'),
                        'img' => get_template_directory_uri()  . '/extension/assets/images/footer_1col.jpg'
                    ),
                ),
                'required' => array(
                    array('aventura_footer_column_col','equals','1'),
                ),
            ),
            array(
                'id'       => 'aventura_footer_2column_preview',
                'type'    => 'image_select',
                'title'    => '',
                'subtitle' => '',
                'options'  => array(
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Column','aventura'),
                        'img' => get_template_directory_uri()  . '/extension/assets/images/footer_2col.jpg'
                    ),
                ),
                'required' => array(
                    array('aventura_footer_column_col','equals','2'),
                ),
            ),
            array(
                'id'       => 'aventura_footer_3column_preview',
                'type'    => 'image_select',
                'title'    => '',
                'subtitle' => '',
                'options'  => array(
                    '0' => array(
                        'alt' => esc_html__('Footer 3 Column','aventura'),
                        'img' => get_template_directory_uri()  . '/extension/assets/images/footer_3col.jpg'
                    ),
                ),
                'required' => array(
                    array('aventura_footer_column_col','equals','3'),
                ),
            ),
            array(
                'id'       => 'aventura_footer_4column_preview',
                'type'    => 'image_select',
                'title'    => '',
                'subtitle' => '',
                'options'  => array(
                    '0' => array(
                        'alt' => esc_html__('Footer 4 Column','aventura'),
                        'img' => get_template_directory_uri()  . '/extension/assets/images/footer_4col.jpg'
                    ),
                ),
                'required' => array(
                    array('aventura_footer_column_col','equals','4'),
                ),
            ),

            array(
                'id'       => 'aventura_footer_column_w1',
                'type'          => 'slider',
                'title'         => esc_html__( 'Footer width 1', 'aventura' ),
                'subtitle'      => esc_html__( 'Select the number of columns to display in the footer', 'aventura' ),
                'desc'          => esc_html__( 'Min: 1, max: 12, default value: 1', 'aventura' ),
                'default'       => 1,
                'min'           => 1,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label',
                'required' => array(
                    array('aventura_footer_column_col','equals','1','2','3','4'),
                    array('aventura_footer_column_col','!=','0'),
                )
            ),

            array(
                'id'       => 'aventura_footer_column_w2',
                'type'          => 'slider',
                'title'         => esc_html__( 'Footer width 2', 'aventura' ),
                'subtitle'      => esc_html__( 'Select the number of columns to display in the footer', 'aventura' ),
                'desc'          => esc_html__( 'Min: 1, max: 12, default value: 1', 'aventura' ),
                'default'       => 1,
                'min'           => 1,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label',
                'required' => array(
                    array('aventura_footer_column_col','equals','2','3','4'),
                    array('aventura_footer_column_col','!=','1'),
                    array('aventura_footer_column_col','!=','0'),
                )
            ),

            array(
                'id'       => 'aventura_footer_column_w3',
                'type'          => 'slider',
                'title'         => esc_html__( 'Footer width 3', 'aventura' ),
                'subtitle'      => esc_html__( 'Select the number of columns to display in the footer', 'aventura' ),
                'desc'          => esc_html__( 'Min: 1, max: 12, default value: 1', 'aventura' ),
                'default'       => 1,
                'min'           => 1,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label',
                'required' => array(
                    array('aventura_footer_column_col','equals','3','4'),
                    array('aventura_footer_column_col','!=','1'),
                    array('aventura_footer_column_col','!=','2'),
                    array('aventura_footer_column_col','!=','0'),
                )
            ),
            array(
                'id'       => 'aventura_footer_column_w4',
                'type'          => 'slider',
                'title'         => esc_html__( 'Footer width 4', 'aventura' ),
                'subtitle'      => esc_html__( 'Select the number of columns to display in the footer', 'aventura' ),
                'desc'          => esc_html__( 'Min: 1, max: 12, default value: 1', 'aventura' ),
                'default'       => 1,
                'min'           => 1,
                'step'          => 1,
                'max'           => 12,
                'display_value' => 'label',
                'required' => array(
                    array('aventura_footer_column_col','equals','4'),
                    array('aventura_footer_column_col','!=','1'),
                    array('aventura_footer_column_col','!=','2'),
                    array('aventura_footer_column_col','!=','3'),
                    array('aventura_footer_column_col','!=','0'),
                )
            ),

            array(
                'id'       => 'aventura_footer_type_1_logo',
                'type'     => 'media',
                'title'    => esc_html__('Footer Logo Type 1', 'aventura'),
                'subtitle' => esc_html__('Upload logo for footer type 1', 'aventura'),
                'required' => array(
                    array('aventura_footer_type','equals','0'),
                ),
            ),

            array(
                'id'       => 'aventura_footer_type_2_logo',
                'type'     => 'media',
                'title'    => esc_html__('Footer Logo Type 2', 'aventura'),
                'subtitle' => esc_html__('Upload logo for footer type 2', 'aventura'),
                'required' => array(
                    array('aventura_footer_type','equals','1'),
                ),
            ),
        )

    ));

// Copyright

    Redux::setSection( $aventura_opt_name, array(
        'title'      => esc_html__( 'Footer Bottom', 'aventura' ),
        'id'         => 'aventura_footer_bottom',
        'desc'       => '',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'         => 'aventura_footer_copyright_editor',
                'type'       => 'editor',
                'title'      => esc_html__( 'Copyright', 'aventura' ),
                'full_width' => true,
                'default' => esc_html__('Copyright &amp; Templaza','aventura'),
            ),
            array(
                'id'       => 'aventura_footer_link',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Menu', 'aventura' ),
                'desc'     => esc_html__( 'Show/Hide Footer Menu', 'aventura' ),
                'default'  => true,
            ),
        )
    ));

// -> END Footer Options

// -> START Breadcrumbs Options

Redux::setSection( $aventura_opt_name, array(
    'title'             => esc_html__( 'Theme Color', 'aventura' ),
    'id'                => 'aventura_theme_color',
    'desc'              => '',
    'customizer_width'  => '400px',
    'icon'              => 'el el-brush',
    'fields'            => array(

        array(
            'id'       => 'aventura_theme_color_primary',
            'type'     => 'color',
            'title'    => esc_html__('Color Primary', 'aventura'),
            'subtitle' => esc_html__('Pick a color primary for the theme (default: #dc8051).', 'aventura'),
            'default'  => '#dc8051',
            'validate' => 'color',
        ),

        array(
            'id'       => 'aventura_theme_color_button_1',
            'type'     => 'color',
            'title'    => esc_html__('Color Button 1', 'aventura'),
            'subtitle' => esc_html__('Pick a color for the button review (default: #bbcd77).', 'aventura'),
            'default'  => '#bbcd77',
            'validate' => 'color',
        ),

        array(
            'id'       => 'aventura_theme_color_button_2',
            'type'     => 'color',
            'title'    => esc_html__('Color Button 2', 'aventura'),
            'subtitle' => esc_html__('Pick a color for the button book (default: #e36252).', 'aventura'),
            'default'  => '#e36252',
            'validate' => 'color',
        ),

        array(
            'id'       => 'aventura_theme_color_icon',
            'type'     => 'color',
            'title'    => esc_html__('Color Icon', 'aventura'),
            'subtitle' => esc_html__('Pick a color for the icon. Color default: #fdb714 (yellow).', 'aventura'),
            'default'  => '#fdb714',
            'validate' => 'color',
        ),

        array(
            'id'       => 'aventura_theme_color_flag',
            'type'     => 'color',
            'title'    => esc_html__('Color Flag', 'aventura'),
            'subtitle' => esc_html__('Pick a color for the flag. Color default: #f7941d (yellow dark).', 'aventura'),
            'default'  => '#f7941d',
            'validate' => 'color',
        ),
    )
));

// -> END Breadcrumbs Options

// -> START Typography Options

    Redux::setSection( $aventura_opt_name, array(
        'title'            => esc_html__( 'Typography', 'aventura' ),
        'id'               => 'aventura_typography',
        'desc'             => esc_html__( 'Typography all config', 'aventura' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-fontsize'
    ));

    Redux::setSection( $aventura_opt_name, array(
        'title'      => esc_html__( 'Typography Style 1', 'aventura' ),
        'id'         => 'aventura_typography_style_1',
        'desc'       => '',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'=>'aventura_typography_style_1_selectors',
                'type' => 'textarea',
                'title' => esc_html__('Selectors', 'aventura'),
                'subtitle' => '',
                'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'aventura'),
                'validate' => 'html_custom',
                'default' => '',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
            array(
                'id'       => 'aventura_typography_style_1_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Typography Style', 'aventura' ),
                'subtitle' => '',
                'google'   => true,
                'default'  => array(
                    'font-size'   => '14',
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => '400',
                    'color'       => '#000',
                    'google'      => true,
                    'line-height' => '24',
                ),
                'output'   => '',
            ),
        )
    ));

    Redux::setSection( $aventura_opt_name, array(
        'title'      => esc_html__( 'Typography Style 2', 'aventura' ),
        'id'         => 'aventura_typography_style_2',
        'desc'       => '',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'=>'aventura_typography_style_2_selectors',
                'type' => 'textarea',
                'title' => esc_html__('Selectors', 'aventura'),
                'subtitle' => '',
                'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'aventura'),
                'validate' => 'html_custom',
                'default' => '',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
            array(
                'id'       => 'aventura_typography_style_2_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Typography Style', 'aventura' ),
                'subtitle' => '',
                'google'   => true,
                'default'  => array(
                    'font-size'   => '14',
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                    'color'       => '#000',
                ),
                'output'   => '',
            ),
        )
    ));

    Redux::setSection( $aventura_opt_name, array(
        'title'      => esc_html__( 'Typography Style 3', 'aventura' ),
        'id'         => 'aventura_typography_style_3',
        'desc'       => esc_html__( '', 'aventura' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'=>'aventura_typography_style_3_selectors',
                'type' => 'textarea',
                'title' => esc_html__('Selectors', 'aventura'),
                'subtitle' => '',
                'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'aventura'),
                'validate' => 'html_custom',
                'default' => '',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'strong' => array()
                )
            ),
            array(
                'id'       => 'aventura_typography_style_3_style',
                'type'     => 'typography',
                'title'    => esc_html__( 'Typography Style', 'aventura' ),
                'subtitle' => '',
                'google'   => true,
                'default'  => array(
                    'font-size'   => '14',
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                    'color'       => '#000',
                ),
                'output'   => '',
            ),
        )
    ));

// -> END Typography Options

// -> START Blog Options

    Redux::setSection( $aventura_opt_name, array(
        'title'            => esc_html__( 'Blog', 'aventura' ),
        'id'               => 'aventura_blog',
        'desc'             => esc_html__( 'Blog all config', 'aventura' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-bold',
    ));

//Blog General

    Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Blog General', 'aventura' ),
    'id'         => 'aventura_blog_general',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'aventura_blog_general_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Sidebar Blog', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => array(
                    'alt' => esc_html__('None Sidebar','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                '2' => array(
                    'alt' => esc_html__('Sidebar Left','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                '3' => array(
                    'alt' => esc_html__('Sidebar Right','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            ),
            'default'  => 3,
        ),
        array(
            'id'       => 'aventura_blog_general_title',
            'type'     => 'switch',
            'title'    => esc_html__( 'Blog Title', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Blog Title', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_general_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Blog Date', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Blog Date', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_general_author',
            'type'     => 'switch',
            'title'    => esc_html__( 'Blog Author', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Blog Author', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_general_tag',
            'type'     => 'switch',
            'title'    => esc_html__( 'Blog Category', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Blog Category', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_general_cat',
            'type'     => 'switch',
            'title'    => esc_html__( 'Blog Category', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Blog Category', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_general_content',
            'type'     => 'switch',
            'title'    => esc_html__( 'Blog Content', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Blog Content/Description', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_general_pagination',
            'type'     => 'switch',
            'title'    => esc_html__( 'Pagination', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide pagination', 'aventura' ),
            'default'  => 1,
        ),
    )
));

//Blog Single

    Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Blog Single', 'aventura' ),
    'id'         => 'aventura_blog_single',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_blog_single_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Sidebar', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => array(
                    'alt' => esc_html__('None Sidebar','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                '2' => array(
                    'alt' => esc_html__('Sidebar Left','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                '3' => array(
                    'alt' => esc_html__('Sidebar Right','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            ),
            'default'  => 3,
        ),

        array(
            'id'       => 'aventura_blog_single_title',
            'type'     => 'switch',
            'title'    => esc_html__( 'Title', 'aventura' ),
            'subtitle' => esc_html__( 'Show/hide blog title', 'aventura' ),
            'default'  => 1,
        ),

        array(
            'id'       => 'aventura_blog_single_date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Date', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Single Date', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_single_author',
            'type'     => 'switch',
            'title'    => esc_html__( 'Author', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Single Author', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_single_cat',
            'type'     => 'switch',
            'title'    => esc_html__( 'Category', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Single Category', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_single_tag',
            'type'     => 'switch',
            'title'    => esc_html__( 'Tag', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Single Tag', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_single_share',
            'type'     => 'switch',
            'title'    => esc_html__( 'Share', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Single Share', 'aventura' ),
            'default'  => 1,
        ),
        array(
            'id'       => 'aventura_blog_single_related',
            'type'     => 'switch',
            'title'    => esc_html__( 'Related', 'aventura' ),
            'subtitle' => esc_html__( 'Show/Hide Single Related', 'aventura' ),
            'default'  => 1,
        ),
    )
));

// -> END Blog Options

// -> START Booking Options

Redux::setSection( $aventura_opt_name, array(
    'title'             => esc_html__( 'Booking Options', 'aventura' ),
    'id'                => 'aventura_booking',
    'desc'              => '',
    'customizer_width'  => '400px',
    'icon'              => 'el el-address-book',
    'fields'            => array(

        array(
            'id'                => 'aventura_woocommerce_integration',
            'type'              => 'switch',
            'title'             => esc_html__('Woocommerce Integration', 'aventura'),
            'description'       => esc_html__('If enable this option, you can use all WooCommerce features including Payment Gateways, Cart and Checkout system.', 'aventura'),
            'default'           => false
        ),
        array(
            'id'       => 'aventura_currency_options',
            'type'     => 'select',
            'title'    => esc_html__( 'Currency Options', 'aventura' ),
            'options'  => array(
                'ALL' => esc_html__('Albanian Lek (L)','aventura'),
                'DZD' => esc_html__('Algerian Dinar (د.ج)','aventura'),
                'AFN' => esc_html__('Afghan Afghani (؋)','aventura'),
                'ARS' => esc_html__('Argentine Peso ($)','aventura'),
                'AUD' => esc_html__('Australian Dollar ($)','aventura'),
                'AZN' => esc_html__('Azerbaijani Manat (AZN)','aventura'),
                'BSD' => esc_html__('Bahamian Dollar ($)','aventura'),
                'BHD' => esc_html__('Bahraini Dinar (.د.ب)','aventura'),
                'BBD' => esc_html__('Barbadian Dollar ($)','aventura'),
                'BDT' => esc_html__('Bangladeshi taka (৳ )','aventura'),
                'BYR' => esc_html__('Belarusian Ruble (Br)','aventura'),
                'BZD' => esc_html__('Belize Dollar ($)','aventura'),
                'BMD' => esc_html__('Bermudian Dollar ($)','aventura'),
                'BOB' => esc_html__('Bolivian Boliviano (Bs.)','aventura'),
                'BAM' => esc_html__('Bosnia and Herzegovina Convertible Mark (KM)','aventura'),
                'BWP' => esc_html__('Botswana Pula (P)','aventura'),
                'BGN' => esc_html__('Bulgarian Lev (лв.)','aventura'),
                'BRL' => esc_html__('Brazilian Real (R$)','aventura'),
                'GBP' => esc_html__('British Pound (£)','aventura'),
                'BND' => esc_html__('Brunei Dollar ($)','aventura'),
                'KHR' => esc_html__('Cambodian Riel (៛)','aventura'),
                'CAD' => esc_html__('Canadian dollar ($)','aventura'),
                'KYD' => esc_html__('Cayman Islands Dollar ($)','aventura'),
                'CLP' => esc_html__('Chilean Peso ($)','aventura'),
                'CNY' => esc_html__('Chinese Yuan (¥)','aventura'),
                'COP' => esc_html__('Colombian Peso ($)','aventura'),
                'CRC' => esc_html__('Costa Rican colón (₡)','aventura'),
                'HRK' => esc_html__('Croatian Kuna (Kn)','aventura'),
                'CUP' => esc_html__('Cuban Peso ($)','aventura'),
                'CZK' => esc_html__('Czech Koruna (Kč)','aventura'),
                'DOP' => esc_html__('Dominican Peso (RD$)','aventura'),
                'XCD' => esc_html__('East Caribbean Dollar ($)','aventura'),
                'EGP' => esc_html__('Egyptian Pound (EGP)','aventura'),
                'EUR' => esc_html__('Euro Member Countries (€)','aventura'),
                'FKP' => esc_html__('Falkland Islands Pound (£)','aventura'),
                'FJD' => esc_html__('Fijian Dollar ($)','aventura'),
                'GHC' => esc_html__('Ghana Cedi (₵)','aventura'),
                'GIP' => esc_html__('Gibraltar Pound (£)','aventura'),
                'GTQ' => esc_html__('Guatemalan Quetzal (Q)','aventura'),
                'GGP' => esc_html__('Guernsey Pound (£)','aventura'),
                'GYD' => esc_html__('Guyanese Dollar ($)','aventura'),
                'GEL' => esc_html__('Georgian Lari (ლ)','aventura'),
                'HNL' => esc_html__('Honduran Lempira (L)','aventura'),
                'HKD' => esc_html__('Hong Kong Dollar ($)','aventura'),
                'HUF' => esc_html__('Hungarian Forint (Ft)','aventura'),
                'ISK' => esc_html__('Icelandic Fróna (kr.)','aventura'),
                'INR' => esc_html__('Indian Rupee (₹)','aventura'),
                'IDR' => esc_html__('Indonesian Rupiah (Rp)','aventura'),
                'IRR' => esc_html__('Iranian Rial (﷼)','aventura'),
                'ILS' => esc_html__('Israeli New Shekel (₪)','aventura'),
                'JMD' => esc_html__('Jamaican Dollar ($)','aventura'),
                'JPY' => esc_html__('Japanese Yen (¥)','aventura'),
                'JEP' => esc_html__('Jersey Pound (£)','aventura'),
                'KZT' => esc_html__('Kazakhstani tenge (KZT)','aventura'),
                'KPW' => esc_html__('North Korean won (₩)','aventura'),
                'KRW' => esc_html__('South Korean won (₩)','aventura'),
                'KGS' => esc_html__('Kyrgyzstani som (сом)','aventura'),
                'KES' => esc_html__('Kenyan shilling (KSh)','aventura'),
                'LAK' => esc_html__('Lao kip (₭)','aventura'),
                'LBP' => esc_html__('Lebanese pound (ل.ل)','aventura'),
                'LRD' => esc_html__('Liberian dollar ($)','aventura'),
                'MKD' => esc_html__('Macedonian denar (ден)','aventura'),
                'MYR' => esc_html__('Malaysian ringgit (RM)','aventura'),
                'MUR' => esc_html__('Mauritian rupee (₨)','aventura'),
                'MXN' => esc_html__('Mexican peso ($)','aventura'),
                'MNT' => esc_html__('Mongolian tögrög (₮)','aventura'),
                'MAD' => esc_html__('Moroccan dirham (د.م.)','aventura'),
                'MZN' => esc_html__('Mozambican metical (MT)','aventura'),
                'NAD' => esc_html__('Namibian dollar ($)','aventura'),
                'NPR' => esc_html__('Nepalese rupee (₨)','aventura'),
                'ANG' => esc_html__('Netherlands Antillean guilder (ƒ)','aventura'),
                'NZD' => esc_html__('New Zealand dollar ($)','aventura'),
                'NIO' => esc_html__('Nicaraguan córdoba (C$)','aventura'),
                'NGN' => esc_html__('Nigerian naira (₦)','aventura'),
                'NOK' => esc_html__('Norwegian krone (kr)','aventura'),
                'OMR' => esc_html__('Omani rial (ر.ع.)','aventura'),
                'PKR' => esc_html__('Pakistani rupee (₨)','aventura'),
                'PAB' => esc_html__('Panamanian balboa (B/.)','aventura'),
                'PYG' => esc_html__('Paraguayan guaraní (₲)','aventura'),
                'PEN' => esc_html__('Peruvian nuevo sol (S/.)','aventura'),
                'PHP' => esc_html__('Philippine peso (₱)','aventura'),
                'PLN' => esc_html__('Polish złoty (zł)','aventura'),
                'QAR' => esc_html__('Qatari riyal (ر.ق)','aventura'),
                'RON' => esc_html__('Romanian leu (lei)','aventura'),
                'RUB' => esc_html__('Russian ruble (₽)','aventura'),
                'SHP' => esc_html__('Saint Helena pound (£)','aventura'),
                'SAR' => esc_html__('Saudi riyal (ر.س)','aventura'),
                'RSD' => esc_html__('Serbian dinar (дин.)','aventura'),
                'SCR' => esc_html__('Seychellois rupee (₨)','aventura'),
                'SGD' => esc_html__('Singapore dollar ($)','aventura'),
                'SBD' => esc_html__('Solomon Islands dollar ($)','aventura'),
                'SOS' => esc_html__('Somali shilling (Sh)','aventura'),
                'ZAR' => esc_html__('South African rand (R)','aventura'),
                'LKR' => esc_html__('Sri Lankan rupee (රු)','aventura'),
                'SEK' => esc_html__('Swedish krona (kr)','aventura'),
                'CHF' => esc_html__('Swiss franc (CHF)','aventura'),
                'SRD' => esc_html__('Surinamese dollar ($)','aventura'),
                'SYP' => esc_html__('Syrian pound (ل.س)','aventura'),
                'TWD' => esc_html__('New Taiwan dollar (NT$)','aventura'),
                'THB' => esc_html__('Thai baht (฿)','aventura'),
                'TTD' => esc_html__('Trinidad and Tobago dollar ($)','aventura'),
                'TRL' => esc_html__('Turkish lira (₺)','aventura'),
                'UAH' => esc_html__('Ukrainian hryvnia (₴)','aventura'),
                'AED' => esc_html__('United Arab Emirates dirham (د.إ)','aventura'),
                'USD' => esc_html__('United States dollar ($)','aventura'),
                'UYU' => esc_html__('Uruguayan peso ($)','aventura'),
                'UZS' => esc_html__('Uzbekistani som (UZS)','aventura'),
                'VEF' => esc_html__('Venezuelan bolívar (Bs F)','aventura'),
                'VND' => esc_html__('Vietnamese đồng (₫)','aventura'),
                'YER' => esc_html__('Yemeni rial (﷼)','aventura'),
            ),
            'default'  => esc_html__('USD','aventura'),
            'required' => array( 'aventura_woocommerce_integration', '=', false ),
        ),
        array(
            'id'       => 'aventura_currency_symbol_position',
            'type'     => 'select',
            'title'    => esc_html__( 'Currency Symbol Position', 'aventura' ),
            'subtitle' => esc_html__( "Select a Curency Symbol Position for Frontend", 'aventura' ),
            'desc'     => '',
            'options'  => array(
                'left' => esc_html__( 'Left ($99.99)', 'aventura' ),
                'right' => esc_html__( 'Right (99.99$)', 'aventura' ),
                'left_space' => esc_html__( 'Left with space ($ 99.99)', 'aventura' ),
                'right_space' => esc_html__( 'Right with space (99.99 $)', 'aventura' )
            ),
            'required' => array( 'aventura_woocommerce_integration', '=', false ),
            'default'  => 'left'
        ),
        array(
            'id'       => 'aventura_currency_decimal_prec',
            'type'     => 'select',
            'title'    => esc_html__( 'Decimal Precision', 'aventura' ),
            'subtitle' => esc_html__( 'Please choose desimal precision', 'aventura' ),
            'desc'     => '',
            'required' => array( 'aventura_woocommerce_integration', '=', false ),
            'options'  => array(
                '0' => '0',
                '1' => '1',
                '2' => '2',
                '3' => '3',
            ),
            'default'  => '2'
        ),
        array(
            'id'       => 'aventura_currency_thousands_sep',
            'type'     => 'text',
            'title'    => esc_html__( 'Thousand Separate', 'aventura' ),
            'subtitle' => esc_html__( 'This sets the thousand separator of displayed prices.', 'aventura' ),
            'default'  => ',',
            'required' => array( 'aventura_woocommerce_integration', '=', false ),
        ),
        array(
            'id'       => 'aventura_currency_decimal_sep',
            'type'     => 'text',
            'title'    => esc_html__( 'Decimal Separate', 'aventura' ),
            'subtitle' => esc_html__( 'This sets the decimal separator of displayed prices.', 'aventura' ),
            'default'  => '.',
            'required' => array( 'aventura_woocommerce_integration', '=', false ),
        ),
    )
));

// -> END Booking Options

// -> START Payment Options

Redux::setSection( $aventura_opt_name, array(
    'title'             => esc_html__( 'Payment', 'aventura' ),
    'id'                => 'aventura_payment',
    'desc'              => '',
    'customizer_width'  => '400px',
    'icon'              => 'el el-credit-card',
    'fields'            => array(

        array(
            'id' => 'aventura_payment_in_cash',
            'type' => 'switch',
            'title' => esc_html__('Payment In Cash', 'aventura'),
            'subtitle' => esc_html__('Enable payment in cash at company.', 'aventura'),
            'default' => false
        ),

        array(
            'id' => 'aventura_pay_paypal',
            'type' => 'switch',
            'title' => esc_html__('PayPal Integration', 'aventura'),
            'subtitle' => esc_html__('Enable payment through PayPal in booking step.', 'aventura'),
            'default' => false
        ),

        array(
            'id' => 'aventura_credit_card',
            'type' => 'switch',
            'title' => esc_html__('Credit Card Payment', 'aventura'),
            'subtitle' => esc_html__('Enable Credit Card payment through PayPal in booking step. Please note your paypal account should be business pro.', 'aventura'),
            'default' => false,
            'required' => array( 'aventura_pay_paypal', '=', true )
        ),

        array(
            'title' => esc_html__('Sandbox Mode', 'aventura'),
            'subtitle' => esc_html__('Enable PayPal sandbox for testing.', 'aventura'),
            'id' => 'aventura_paypal_sandbox',
            'default' => false,
            'required' => array( 'aventura_pay_paypal', '=', true ),
            'type' => 'switch'),

        array(
            'title' => esc_html__('PayPal API Username', 'aventura'),
            'subtitle' => esc_html__('Your PayPal Account API Username.', 'aventura'),
            'id' => 'aventura_paypal_api_username',
            'default' => '',
            'required' => array( 'aventura_pay_paypal', '=', true ),
            'type' => 'text'),

        array(
            'title' => esc_html__('PayPal API Password', 'aventura'),
            'subtitle' => esc_html__('Your PayPal Account API Password.', 'aventura'),
            'id' => 'aventura_paypal_api_password',
            'default' => '',
            'required' => array( 'aventura_pay_paypal', '=', true ),
            'type' => 'text'),

        array(
            'title' => esc_html__('PayPal API Signature', 'aventura'),
            'subtitle' => esc_html__('Your PayPal Account API Signature.', 'aventura'),
            'id' => 'aventura_paypal_api_signature',
            'default' => '',
            'required' => array( 'aventura_pay_paypal', '=', true ),
            'type' => 'text'),
    )
));

// -> END Payment Options

// -> START Email Confirm Options

Redux::setSection( $aventura_opt_name, array(
    'title'             => esc_html__( 'Email confirm', 'aventura' ),
    'id'                => 'aventura_email_confirm',
    'desc'              => '',
    'customizer_width'  => '400px',
    'icon'              => 'el el-envelope',
));

//Email confirm send to customer

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Email Customer', 'aventura' ),
    'id'         => 'aventura_email_confirm_customer',
    'subsection' => true,
    'fields'     => array(
        array(
            'title' => esc_html__('Subject', 'aventura'),
            'subtitle' => esc_html__('Subject of email confirm send to customer.','aventura'),
            'id' => 'aventura_email_confirm_subject_customer',
            'default' => '',
            'type' => 'text'
        ),

        array(
            'title' => esc_html__('Content', 'aventura'),
            'subtitle' => esc_html__('Content of email confirm send to customer.','aventura'),
            'id' => 'aventura_email_confirm_description_customer',
            'default' => '',
            'type' => 'editor'
        ),

        array(
            'title' => esc_html__('Order and Billing address option', 'aventura'),
            'subtitle' => 'For email to customer',
            'id' => 'aventura_email_confirm_customer_order_and_billing',
            'default' => true,
            'type' => 'switch'
        ),

        array(
            'id'       => 'aventura_email_confirm_customer_order_billing_position',
            'type'     => 'select',
            'title'    => esc_html__( ' Position of Order and Billing Adress', 'aventura' ),
            'subtitle' => '',
            'default'  => 'after',
            'options'  => array(
                'after'      => esc_html__('After Content','aventura'),
                'before'     => esc_html__('Before Content','aventura'),
            ),
            'required' => array( 'aventura_email_confirm_customer_order_and_billing', '=', true ),
        ),
    ),
) );

//Email confirm send to customer

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Email Admin', 'aventura' ),
    'id'         => 'aventura_email_confirm_admin',
    'subsection' => true,
    'fields'     => array(
        array(
            'title' => esc_html__('Email option', 'aventura'),
            'subtitle' => '',
            'id' => 'aventura_email_confirm_to_admin',
            'default' => false,
            'type' => 'switch'
        ),

        array(
            'title' => esc_html__('Subject', 'aventura'),
            'subtitle' => esc_html__('Subject of email confirm send to Admin.','aventura'),
            'id' => 'aventura_email_confirm_subject_admin',
            'default' => '',
            'type' => 'text',
            'required' => array( 'aventura_email_confirm_to_admin', '=', true ),
        ),

        array(
            'title' => esc_html__('Content', 'aventura'),
            'subtitle' => esc_html__('Content of email confirm send to Admin.','aventura'),
            'id' => 'aventura_email_confirm_description_admin',
            'default' => '',
            'type' => 'editor',
            'required' => array( 'aventura_email_confirm_to_admin', '=', true ),
        ),

        array(
            'title' => esc_html__('Order and Billing address option', 'aventura'),
            'subtitle' => 'For email to admin',
            'id' => 'aventura_email_confirm_admin_order_and_billing',
            'default' => true,
            'type' => 'switch'
        ),

        array(
            'id'       => 'aventura_email_confirm_admin_order_billing_position',
            'type'     => 'select',
            'title'    => esc_html__( ' Position of Order and Billing Adress', 'aventura' ),
            'subtitle' => '',
            'default'  => 'after',
            'options'  => array(
                'after'      => esc_html__('After Content','aventura'),
                'before'     => esc_html__('Before Content','aventura'),
            ),
            'required' => array( 'aventura_email_confirm_admin_order_and_billing', '=', true ),
        ),
    ),
) );

// -> END Email Confirm Options

// -> START Tour Detail Options

Redux::setSection( $aventura_opt_name, array(
    'title'            => esc_html__( 'Tour Setting', 'aventura' ),
    'id'               => 'aventura_tour',
    'desc'             => esc_html__( 'Tour all config', 'aventura' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-flag',
));

//Blog General

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'General', 'aventura' ),
    'id'         => 'aventura_tour_page_setting',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'tour_cart_page',
            'type'     => 'select',
            'title'    => esc_html__('Tour Cart Page', 'aventura'),
            'subtitle' => esc_html__('This sets the base page of your tour booking. Please add [tour_cart] shortcode in the page content.', 'aventura'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc','aventura'),
                'sort_column' => esc_html__('post_title','aventura'),
            ),
        ),
        array(
            'id'       => 'tour_checkout_page',
            'type'     => 'select',
            'title'    => esc_html__('Tour Checkout Page', 'aventura'),
            'subtitle' => esc_html__('This sets the tour Checkout Page. Please add [tour_checkout] shortcode in the page content.', 'aventura'),
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc','aventura'),
                'sort_column' => esc_html__('post_title','aventura'),
            ),
        ),
        array(
            'id'       => 'tour_thankyou_page',
            'type'     => 'select',
            'title'    => esc_html__('Tour Booking Confirmation Page', 'aventura'),
            'subtitle' => esc_html__('This sets the tour booking confirmation Page. Please add [tour_confirm] shortcode in the page content.', 'aventura'),
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc','aventura'),
                'sort_column' => esc_html__('post_title','aventura'),
            ),
        ),
        array(
            'id'       => 'tour_thankyou_text_1',
            'type'     => 'text',
            'title'    => esc_html__('Tour Booking Confirmation Text', 'aventura'),
            'subtitle' => esc_html__('This sets confirmation text1.', 'aventura'),
            'default'  => esc_html__('Lorem ipsum dolor sit amet, nostrud nominati vis ex, essent conceptam eam ad. Cu etiam comprehensam nec. Cibo delicata mei an, eum porro legere no. Te usu decore omnium, quem brute vis at, ius esse officiis legendos cu. Dicunt voluptatum at cum. Vel et facete equidem deterruisset, mei graeco cetero labores et. Accusamus inciderint eu mea.','aventura'),
        ),
        array(
            'id'       => 'tour_wishlist_page',
            'type'     => 'select',
            'title'    => esc_html__('Wishlist Page', 'aventura'),
            'subtitle' => '',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc','aventura'),
                'sort_column' => esc_html__('post_title','aventura'),
            ),
        ),
    ),
) );

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Contact', 'aventura' ),
    'id'         => 'aventura_tour_detail_contact',
    'desc'       => esc_html__( '', 'aventura' ),
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_tour_detail_contact_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Display Option', 'aventura' ),
            'subtitle' => esc_html__( 'Controls the site layout.', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_tour_detail_contact_description',
            'type'     => 'editor',
            'title'    => esc_html__( 'Description', 'aventura' ),
            'default'  => false,
            'required' => array( 'aventura_tour_detail_contact_option', '=', '1' ),
        ),
        array(
            'id'    => 'aventura_tour_detail_contact_form',
            'type'  => 'select',
            'title' => esc_html__( 'Select Form Contact', 'aventura' ),
            'data'  => 'posts',
            'args'  => array(
                'post_type'      => 'wpcf7_contact_form',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 'aventura_tour_detail_contact_option', '=', '1' ),
        )
    )
));

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Tour Detail', 'aventura' ),
    'id'         => 'aventura_tour_detail',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'    => 'aventura_tour_detail_booking_sidebar',
            'type'  => 'image_select',
            'title' => esc_html__( 'Select Booking Sidebar', 'aventura' ),
            'default'  => 'right',
            'options'  => array(
                'none' => array(
                    'alt' => esc_html__('None','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),

        array(
            'id'       => 'aventura_tour_detail_booking_head',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Booking Head', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'required' => array( 'aventura_tour_detail_booking_sidebar', '=', array('right','left') ),
            'default'  => '1'
        ),

        array(
            'id'       => 'aventura_tour_detail_phone',
            'type'     => 'text',
            'title'    => esc_html__( 'Call Center', 'aventura' ),
            'subtitle' => esc_html__( 'Telephone number', 'aventura' ),
            'default'  => '',
            'required' => array( 'aventura_tour_detail_booking_head', '=', '1' ),
        ),

        array(
            'id'       => 'aventura_tour_detail_price_box',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Price Box', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'required' => array( 'aventura_tour_detail_booking_head', '=', '1' ),
            'default'  => '1'
        ),

        array(
            'id'       => 'aventura_tour_detail_form_booking',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Booking Form', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'required' => array( 'aventura_tour_detail_booking_sidebar', '=', array('right','left') ),
            'default'  => '1'
        ),

        array(
            'id'       => 'aventura_tour_detail_first_name',
            'type'     => 'button_set',
            'title'    => esc_html__( 'First Name', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_tour_detail_first_name_label',
            'type'     => 'text',
            'title'    => esc_html__( 'First Name Label', 'aventura' ),
            'default'  => esc_html__( 'First Name', 'aventura' ),
            'required' => array( 'aventura_tour_detail_first_name', '=', array('1') ),
        ),
        array(
            'id'       => 'aventura_tour_detail_last_name',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Last Name', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_tour_detail_last_name_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Last Name Label', 'aventura' ),
            'default'  => esc_html__( 'Last Name', 'aventura' ),
            'required' => array( 'aventura_tour_detail_last_name', '=', array('1') ),
        ),
        array(
            'id'       => 'aventura_tour_detail_email',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Email', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_tour_detail_email_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Email Label', 'aventura' ),
            'default'  => esc_html__( 'Email', 'aventura' ),
            'required' => array( 'aventura_tour_detail_email', '=', array('1') ),
        ),
        array(
            'id'       => 'aventura_tour_detail_field_phone',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Phone', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_tour_detail_field_phone_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Phone Label', 'aventura' ),
            'default'  => esc_html__( 'Phone', 'aventura' ),
            'required' => array( 'aventura_tour_detail_field_phone', '=', array('1') ),
        ),
        array(
            'id'       => 'aventura_tour_detail_field_time',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Departure Time', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
            'default'  => '1'
        ),

        array(
            'id'       => 'aventura_tour_detail_departure_time_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Departure Time Label', 'aventura' ),
            'default'  => esc_html__( 'Departure Time', 'aventura' ),
            'required' => array( 'aventura_tour_detail_field_time', '=', array('1') ),
        ),

        array(
            'id'       => 'aventura_tour_detail_departure_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Departure Date Label', 'aventura' ),
            'default'  => esc_html__( 'Departure Date', 'aventura' ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
        ),

        array(
            'id'       => 'aventura_tour_detail_adults_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Adults Label', 'aventura' ),
            'default'  => esc_html__( 'Adults', 'aventura' ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_tour_detail_max_adults',
            'type'     => 'text',
            'title'    => esc_html__( 'Max Adults', 'aventura' ),
            'subtitle' => esc_html__( 'Number is accepted here, not text', 'aventura' ),
            'validate' => 'numeric',
            'default'  => '5',
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_tour_detail_children_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Children Label', 'aventura' ),
            'default'  => esc_html__( 'Children', 'aventura' ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_tour_detail_max_kids',
            'type'     => 'text',
            'title'    => esc_html__( 'Max Kids', 'aventura' ),
            'subtitle' => esc_html__( 'Number is accepted here, not text', 'aventura' ),
            'validate' => 'numeric',
            'default'  => '2',
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_tour_detail_button_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Button Booking Text', 'aventura' ),
            'default'  => esc_html__( 'Booking Now', 'aventura' ),
            'required' => array( 'aventura_tour_detail_form_booking', '=', '1' ),
        ),
        array(
            'id'       => 'aventura_tour_detail_itinerary_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Itinerary Tab', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_tour_detail_location_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Location Tab', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_tour_detail_reviews_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Reviews Tab', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'aventura_tour_detail_other_option',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Tour Other', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '2' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1'
        )
    )
));

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'List & Grid', 'aventura' ),
    'id'         => 'aventura_tour_archive',
    'desc'       => '',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'aventura_tour_archive_title_trim_words',
            'type'     => 'text',
            'title'    => esc_html__( 'Title Trim Words', 'aventura' ),
            'subtitle' => esc_html__( 'Limited number words of title.Full title if leave it blank.The value is number', 'aventura' ),
            'default'  => ''
        ),
        array(
            'id'    => 'aventura_tour_archive_sort',
            'type'  => 'checkbox',
            'title' => esc_html__( 'Sort Option', 'aventura' ),
            'options'  => array(
                'name'        => esc_html__( 'Name', 'aventura' ),
                'price'       => esc_html__( 'Price', 'aventura' ),
                'rating'      => esc_html__( 'Rating', 'aventura' ),
                'popularity'  => esc_html__( 'Popularity', 'aventura' )
            ),
            'default' => array(
                'name' => '1',
                'price' => '1',
                'rating' => '1',
                'popularity' => '1'
            )
        ),
        array(
            'id'       => 'aventura_tour_archive_limit',
            'type'     => 'spinner',
            'title'    => esc_html__('Limit Tour Per Page', 'aventura'),
            'subtitle' => '',
            'default'  => '12',
            'min'      => '5',
            'step'     => '1',
            'max'      => '100',
            'required' => array( 'aventura_tour_archive_list_grid_type', '=', array('list-grid','grid') )
        ),
        array(
            'id'    => 'aventura_tour_archive_list_grid_type',
            'type'     => 'select',
            'title'    => esc_html__( 'Content Type', 'aventura' ),
            'subtitle' => '',
            'default'  => 'list-grid',
            'options'  => array(
                'list-grid'    => esc_html__('List & Grid','aventura'),
                'list'          => esc_html__('Only List','aventura'),
                'grid'          => esc_html__('Only Grid','aventura'),
            )
        ),
        array(
            'id'       => 'aventura_grid_desk_column',
            'type'     => 'spinner',
            'title'    => esc_html__('Grid Desktop Column', 'aventura'),
            'subtitle' => esc_html__('Number of column on desktop (width > 1200px) ','aventura'),
            'default'  => '3',
            'min'      => '2',
            'step'     => '1',
            'max'      => '12',
            'required' => array( 'aventura_tour_archive_list_grid_type', '=', array('list-grid','grid') )
        ),
        array(
            'id'       => 'aventura_grid_tablet_column',
            'type'     => 'spinner',
            'title'    => esc_html__('Grid Tablet Column', 'aventura'),
            'subtitle' => esc_html__('Number of column on tablet (width > 1200px) ','aventura'),
            'default'  => '2',
            'min'      => '1',
            'step'     => '1',
            'max'      => '12',
            'required' => array( 'aventura_tour_archive_list_grid_type', '=', array('list-grid','grid') )
        ),
        array(
            'id'       => 'aventura_grid_mobilelandscape_column',
            'type'     => 'spinner',
            'title'    => esc_html__('Grid Mobile Landscape Column', 'aventura'),
            'subtitle' => esc_html__('Number of column on mobile landscape (480px < width < 768px) ','aventura'),
            'default'  => '1',
            'min'      => '1',
            'step'     => '1',
            'max'      => '12',
            'required' => array( 'aventura_tour_archive_list_grid_type', '=', array('list-grid','grid') )
        ),
        array(
            'id'       => 'aventura_grid_mobile_column',
            'type'     => 'spinner',
            'title'    => esc_html__('Grid Mobile Column', 'aventura'),
            'subtitle' => esc_html__('Number of column on mobile (width < 480px) ','aventura'),
            'default'  => '1',
            'min'      => '1',
            'step'     => '1',
            'max'      => '12',
            'required' => array( 'aventura_tour_archive_list_grid_type', '=', array('list-grid','grid') )
        ),
        array(
            'id'    => 'aventura_filter_sidebar',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Sidebar Filter', 'aventura' ),
            'subtitle' => '',
            'default'  => 'right',
            'options'  => array(
                'none' => array(
                    'alt' => esc_html__('None','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_results',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Filter Results', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_filter_sidebar', '=', array('left','right') )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_price',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Filter Price', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_filter_sidebar', '=', array('left','right') )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_title_price',
            'type'     => 'text',
            'title'    => esc_html__( 'Filter Price Title', 'aventura' ),
            'subtitle' => '',
            'default'  => esc_html__( 'Price', 'aventura' ),
            'required' => array( 'aventura_filter_sidebar_price', '=', '1' )
        ),

        array(
            'id'       => 'aventura_filter_sidebar_min_price',
            'type'     => 'text',
            'title'    => esc_html__( 'Filter Min Price', 'aventura' ),
            'subtitle' => '',
            'validate' => 'numeric',
            'default'  => '0',
            'required' => array( 'aventura_filter_sidebar_price', '=', '1' )
        ),

        array(
            'id'       => 'aventura_filter_sidebar_max_price',
            'type'     => 'text',
            'title'    => esc_html__( 'Filter Max Price', 'aventura' ),
            'subtitle' => '',
            'validate' => 'numeric',
            'default'  => '10000',
            'required' => array( 'aventura_filter_sidebar_price', '=', '1' )
        ),

        array(
            'id'       => 'aventura_filter_sidebar_rating',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Filter User Rating', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_filter_sidebar', '=', array('left','right') )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_title_rating',
            'type'     => 'text',
            'title'    => esc_html__( 'Filter Rating Title', 'aventura' ),
            'subtitle' => '',
            'default'  => esc_html__( 'User Rating', 'aventura' ),
            'required' => array( 'aventura_filter_sidebar_rating', '=', '1' )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_categories',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Filter Tour Categories', 'aventura' ),
            'subtitle' => esc_html__( 'Categories tour here, not listed  categories with 0 tour', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_filter_sidebar', '=', array('left','right') )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_title_categories',
            'type'     => 'text',
            'title'    => esc_html__( 'Filter Categories Title', 'aventura' ),
            'subtitle' => '',
            'default'  => esc_html__( 'Tour Categories', 'aventura' ),
            'required' => array( 'aventura_filter_sidebar_categories', '=', '1' )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_destinations',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Filter Tour Destinations', 'aventura' ),
            'subtitle' => esc_html__( 'Destinations tour here, not listed  categories with 0 tour', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_filter_sidebar', '=', array('left','right') )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_title_destinations',
            'type'     => 'text',
            'title'    => esc_html__( 'Filter Destinations Title', 'aventura' ),
            'subtitle' => esc_html__( '', 'aventura' ),
            'default'  => esc_html__( 'Tour Destinations', 'aventura' ),
            'required' => array( 'aventura_filter_sidebar_destinations', '=', '1' )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_language',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Filter Tour Language', 'aventura' ),
            'subtitle' => esc_html__( 'Language tour here, not listed  categories with 0 tour', 'aventura' ),
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_filter_sidebar', '=', array('left','right') )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_title_language',
            'type'     => 'text',
            'title'    => esc_html__( 'Filter Language Title', 'aventura' ),
            'subtitle' => '',
            'default'  => esc_html__( 'Host Language', 'aventura' ),
            'required' => array( 'aventura_filter_sidebar_language', '=', '1' )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_search',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Filter Search Form', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
            'required' => array( 'aventura_filter_sidebar', '=', array('left','right') )
        ),
        array(
            'id'       => 'aventura_filter_sidebar_title_search',
            'type'     => 'text',
            'title'    => esc_html__( 'Search Form Title', 'aventura' ),
            'subtitle' => '',
            'default'  => esc_html__( 'Search', 'aventura' ),
            'required' => array( 'aventura_filter_sidebar_search', '=', '1' )
        ),
    )
));

// -> END Tour Detail Options

// -> START Branchs Options

Redux::setSection( $aventura_opt_name, array(
    'title'            => esc_html__( 'Branch Setting', 'aventura' ),
    'id'               => 'aventura_branchs_setting',
    'desc'             => esc_html__( 'Branchs all config', 'aventura' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-network',
));

// Branchs List

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Branch List', 'aventura' ),
    'id'         => 'aventura_branchs_list_setting',
    'desc'       => esc_html__( '', 'aventura' ),
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_branchs_per_page',
            'type'     => 'text',
            'title'    => esc_html__( 'Branch pages show at most', 'aventura' ),
            'subtitle' => '',
            'validate' => 'numeric',
            'default'  => '8'
        ),

        array(
            'id'    => 'aventura_branchs_list_sidebar',
            'type'  => 'image_select',
            'title' => esc_html__( 'Sidebar Option', 'aventura' ),
            'default'  => 'right',
            'options'  => array(
                'none' => array(
                    'alt' => esc_html__('None','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),
    )
));

// Branchs Detail

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Branch Detail', 'aventura' ),
    'id'         => 'aventura_branchs_detail_setting',
    'desc'       => esc_html__( '', 'aventura' ),
    'subsection' => true,
    'fields'     => array(

        array(
            'id'    => 'aventura_branchs_detail_sidebar',
            'type'  => 'image_select',
            'title' => esc_html__( 'Sidebar Option', 'aventura' ),
            'default'  => 'right',
            'options'  => array(
                'none' => array(
                    'alt' => esc_html__('None','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),

        array(
            'id'       => 'aventura_branchs_detail_map',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Map Option', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
        ),

        array(
            'id'       => 'aventura_branchs_detail_image',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Image Option', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
        ),

        array(
            'id'       => 'aventura_branchs_detail_info',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Info Option', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
        ),

        array(
            'id'       => 'aventura_branchs_detail_content',
            'type'     => 'button_set',
            'title'    => esc_html__( 'Content Option', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '1' => esc_html__('Show','aventura'),
                '0' => esc_html__('Hide','aventura'),
            ),
            'default'  => '1',
        ),
    )
));

// -> END Branchs Options

// -> START Shop Options

Redux::setSection( $aventura_opt_name, array(
    'title'            => esc_html__( 'Shop Setting', 'aventura' ),
    'id'               => 'aventura_shop_setting',
    'desc'             => esc_html__( 'Shop all config', 'aventura' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-shopping-cart',
));

// Shop List

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Shop List', 'aventura' ),
    'id'         => 'aventura_shop_list_setting',
    'desc'       => esc_html__( '', 'aventura' ),
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_shop_breadcrumb_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Breacrumb Image', 'aventura' ),
            'subtitle' => esc_html__( 'Image background for your breadcrumb shop', 'aventura' )
        ),

        array(
            'id'       => 'aventura_shop_products_per_page',
            'type'     => 'text',
            'title'    => esc_html__( 'Products Per Page', 'aventura' ),
            'subtitle' => '',
            'validate' => 'numeric',
            'default'  => '6'
        ),

        array(
            'id'    => 'aventura_shop_columns',
            'type'  => 'image_select',
            'title' => esc_html__( 'Number Of Shop Columns', 'aventura' ),
            'default'  => '3',
            'options'  => array(
                '2' => array(
                    'alt' => esc_html__('2 column','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2-col-portfolio.png'
                ),
                '3' => array(
                    'alt' => esc_html__('3 column','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/3-col-portfolio.png'
                ),
                '4' => array(
                    'alt' => esc_html__('4 column','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/4-col-portfolio.png'
                )
            )
        ),

        array(
            'id'    => 'aventura_shop_list_sidebar',
            'type'  => 'image_select',
            'title' => esc_html__( 'Sidebar Shop Option', 'aventura' ),
            'default'  => 'right',
            'options'  => array(
                'none' => array(
                    'alt' => esc_html__('None','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),
    )
));

// Shop Detail

Redux::setSection( $aventura_opt_name, array(
    'title'      => esc_html__( 'Shop Detail', 'aventura' ),
    'id'         => 'aventura_shop_detail_setting',
    'desc'       => esc_html__( '', 'aventura' ),
    'subsection' => true,
    'fields'     => array(

        array(
            'id'       => 'aventura_shop_detail_breadcrumb_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Breacrumb Image', 'aventura' ),
            'subtitle' => esc_html__( 'Image background for your breadcrumb shop detail', 'aventura' )
        ),

        array(
            'id'    => 'aventura_shop_detail_sidebar',
            'type'  => 'image_select',
            'title' => esc_html__( 'Sidebar Shop Option', 'aventura' ),
            'default'  => 'right',
            'options'  => array(
                'none' => array(
                    'alt' => esc_html__('None','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right','aventura'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),

        array(
            'id'       => 'aventura_shop_nav_thumbs_option',
            'type'     => 'select',
            'title'    => esc_html__( 'Nav Thumbs Type', 'aventura' ),
            'subtitle' => '',
            'options'  => array(
                '0'    => esc_html__('Vertical','aventura'),
                '1'    => esc_html__('Horizontal','aventura'),
            ),
            'default'  => '0'
        ),

//        array(
//            'id'       => 'aventura_branchs_detail_map',
//            'type'     => 'button_set',
//            'title'    => esc_html__( 'Map Option', 'aventura' ),
//            'subtitle' => '',
//            'options'  => array(
//                '1' => esc_html__('Show','aventura'),
//                '0' => esc_html__('Hide','aventura'),
//            ),
//            'default'  => '1',
//        ),
//
//        array(
//            'id'       => 'aventura_branchs_detail_image',
//            'type'     => 'button_set',
//            'title'    => esc_html__( 'Image Option', 'aventura' ),
//            'subtitle' => '',
//            'options'  => array(
//                '1' => esc_html__('Show','aventura'),
//                '0' => esc_html__('Hide','aventura'),
//            ),
//            'default'  => '1',
//        ),
//
//        array(
//            'id'       => 'aventura_branchs_detail_info',
//            'type'     => 'button_set',
//            'title'    => esc_html__( 'Info Option', 'aventura' ),
//            'subtitle' => '',
//            'options'  => array(
//                '1' => esc_html__('Show','aventura'),
//                '0' => esc_html__('Hide','aventura'),
//            ),
//            'default'  => '1',
//        ),
//
//        array(
//            'id'       => 'aventura_branchs_detail_content',
//            'type'     => 'button_set',
//            'title'    => esc_html__( 'Content Option', 'aventura' ),
//            'subtitle' => '',
//            'options'  => array(
//                '1' => esc_html__('Show','aventura'),
//                '0' => esc_html__('Hide','aventura'),
//            ),
//            'default'  => '1',
//        ),
    )
));

// -> END Shop Options

// -> START 404 Options

    Redux::setSection( $aventura_opt_name, array(
        'title'            => esc_html__( '404 Options', 'aventura' ),
        'id'               => 'aventura_404',
        'desc'             => esc_html__( '404 page all config', 'aventura' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-warning-sign',
        'fields'     => array(
            array(
                'id'       => 'aventura_404_title',
                'type'     => 'text',
                'title'    => esc_html__( '404 Title', 'aventura' ),
                'default'  => false,
            ),
            array(
                'id'       => 'aventura_404_editor',
                'type'     => 'editor',
                'title'    => esc_html__( '404 Content', 'aventura' ),
                'default'  => false,
            ),
        )
    ));

// -> END 404 Options

// -> START Login And Register Page

Redux::setSection( $aventura_opt_name, array(
    'title'            => esc_html__( 'Login And Register', 'aventura' ),
    'id'               => 'aventura_login_and_register',
    'desc'             => esc_html__( 'Login and register all config', 'aventura' ),
    'customizer_width' => '400px',
    'icon'             => 'el el-unlock',
    'fields'     => array(

        array(
            'id'       => 'aventura_login_page',
            'type'     => 'select',
            'title'    => esc_html__('Login Page', 'aventura'),
            'subtitle' => esc_html__('Select a Page login. You can leave this field blank if you don\'t need custom Login Page.', 'aventura'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc','aventura'),
                'sort_column' => esc_html__('post_title','aventura'),
            ),
        ),

        array(
            'id'       => 'aventura_login_redirect_page',
            'type'     => 'select',
            'title'    => esc_html__('Page to Redirect to on login', 'aventura'),
            'subtitle' => esc_html__('Select a Page to Redirect to on login.', 'aventura'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc','aventura'),
                'sort_column' => esc_html__('post_title','aventura'),
            ),
        ),

        array(
            'id'       => 'aventura_register_page',
            'type'     => 'select',
            'title'    => esc_html__('Register Page', 'aventura'),
            'subtitle' => esc_html__('Select a page register. You can leave this field blank if you don\'t need custom Register Page.', 'aventura'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc','aventura'),
                'sort_column' => esc_html__('post_title','aventura'),
            ),
        ),

        array(
            'id'       => 'aventura_lostpassword_page',
            'type'     => 'select',
            'title'    => esc_html__('Lost Password Page', 'aventura'),
            'subtitle' => esc_html__('Select a page lost password. You can leave this field blank if you don\'t need custom Lost Password Page.', 'aventura'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc','aventura'),
                'sort_column' => esc_html__('post_title','aventura'),
            ),
        ),

        array(
            'id'       => 'aventura_login_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Upload Image', 'aventura' ),
            'subtitle' => esc_html__( 'Upload image for page Login/Register', 'aventura' ),
            'desc'     => '',
            'default'  => false,
        ),

    )
));

// -> END 404 Options

// -> START Custom Css Options

    Redux::setSection( $aventura_opt_name, array(
        'title'            => esc_html__( 'Custom Css', 'aventura' ),
        'id'               => 'aventura_custom_css',
        'customizer_width' => '400px',
        'icon'             => 'el el-css',
        'fields'     => array(
            array(
                'id'       => 'aventura_custom_css_code',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS CODE', 'aventura' ),
                'desc'     => esc_html__( 'Enter your CSS code in the field below. Do not include any tags or HTML in the field. Custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed. Don\'t URL encode image or svg paths. Contents of this field will be auto encoded.', 'aventura' ),
                'subtitle' => esc_html__( 'Select type color theme', 'aventura' ),
                'mode'     => 'css',
                'theme'    => 'chrome',
                'default'  => ''
            ),
        )
    ));

// -> END Custom Css Options
/*
 * <--- END SECTIONS
 */
// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
add_filter('redux/options/' . $aventura_opt_name . '/compiler', 'aventura_compiler_action', 10, 3);

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if ( ! function_exists( 'aventura_compiler_action' ) ) {
    function aventura_compiler_action( $aventura_options, $aventura_css, $aventura_changed_values ) {
        echo '<h1>'. esc_html('The compiler hook has run!','aventura') .'</h1>';
        echo "<pre>";
        print_r( $aventura_changed_values ); // Values that have changed since the last save
        echo "</pre>";
        print_r($aventura_options); //Option values
        print_r($aventura_css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}
