<?php
/**
 * @package Aventura Plugin
 */
/*
Plugin Name: Aventura Plugin
Plugin URI: http://templaza.com/
Description: This is plugin for Templaza. This plugin allows you to create post types, taxonomies and Visual Composer's shortcodes
Version: 1.3.3
Author: Templaza
Author URI: http://template.com/
License: GPLv2 or later
Text Domain: aventura-plugin
Domain Path: /languages/
*/

if ( !class_exists('aventura_plugin') ):

    class aventura_plugin{

        /*
         * This method loads other methods of the class.
         */
        public function __construct(){
            /* load languages */
            $this -> load_languages();

            /*load all plazart*/
            $this -> load_plazart();

            /*load all script*/
            $this -> load_script();
        }

        /*
         * Load the languages before everything else.
         */
        public function load_languages(){
            add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
        }

        /*
         * Load the text domain.
         */
        public function load_textdomain(){
            load_plugin_textdomain( 'aventura-plugin', false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

        /*
         * Load script
         */
        public function load_script(){
            if( is_admin() ){
                add_action('admin_enqueue_scripts', array( $this,'admin_scripts') );
            }else{
                add_action('wp_enqueue_scripts',array($this,'tzfrontend_scripts') );
                add_action('wp_enqueue_scripts',array($this,'tzAventura_styles'));
            }
        }

        /*
         * Load TZPlazart on the 'after_setup_theme' action. Then filters will
         */
        public function load_plazart(){

            $this -> constants();

            $this -> admin_includes();


        }

        /**
         * Constants
         */
        private function constants(){

            define('tz_plazart', 'aventura-plugin');

            define('PLUGIN_PREFIX', 'plazart');

            define('PLUGIN_PATH', plugin_dir_url( __FILE__ ));

            define('PLUGIN_SERVER_PATH',dirname( __FILE__ ) );
        }

        /*
         * Require file
         */
        public function  admin_includes(){
            require_once PLUGIN_SERVER_PATH.'/admin/admin-init.php';

            function aventura_modify_contact_methods($aventura_profile_fields) {
                // Add new fields
                $aventura_profile_fields['facebook']   = esc_html__('Facebook URL','aventura-plugin');
                $aventura_profile_fields['twitter']    = esc_html__('Twitter URL','aventura-plugin');
                $aventura_profile_fields['pinterest']  = esc_html__('Pinterest URL','aventura-plugin');
                $aventura_profile_fields['gplus']      = esc_html__('Google+ URL','aventura-plugin');
                $aventura_profile_fields['youtube']    = esc_html__('Youtube URL','aventura-plugin');
                $aventura_profile_fields['dribbble']   = esc_html__('Dribbble URL','aventura-plugin');
                $aventura_profile_fields['instagram']   = esc_html__('Instagram URL','aventura-plugin');
                $aventura_profile_fields['github']     = esc_html__('Github URL','aventura-plugin');
                $aventura_profile_fields['behance']    = esc_html__('Behance URL','aventura-plugin');
                return $aventura_profile_fields;
            }
            add_filter('user_contactmethods', 'aventura_modify_contact_methods');

            function aventura_plugin_social(){
                ?>
                <div class="tz-blog-share">
                    <span><?php  esc_html_e('Share:', 'aventura-plugin') ; ?></span>
                    <!-- Facebook Button -->
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php print aventura_social_title( get_the_title() ); ?>%20-%20<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                    <?php $aventura_pin_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); ?>
                    <a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_attr($aventura_pin_image); ?>&description=<?php print aventura_social_title( get_the_title() ); ?>"><i class="fa fa-pinterest"></i></a>
                </div>
                <?php
            }
            add_action('aventura-social','aventura_plugin_social',11, 2);

        }

        /*
        * Require file
        */
        public function  admin_scripts(){
            global $pagenow;
            if ('post-new.php' == $pagenow || 'post.php' == $pagenow) :
                wp_enqueue_style('thickbox');
                wp_enqueue_script('media-upload');
                wp_enqueue_script('thickbox');

                // load css
                wp_enqueue_style('jquery.fancybox', PLUGIN_PATH. 'assets/css/jquery.fancybox.css');
                wp_enqueue_style('shortocde_admin', PLUGIN_PATH. 'assets/css/shortocde_admin.css');

                // load js
                wp_register_script('jquery.fancybox_js', PLUGIN_PATH .'assets/js/jquery.fancybox.js', false, false, $in_footer=true);
                wp_enqueue_script('jquery.fancybox_js')  ;

            endif;
        }

        public function  tzfrontend_scripts(){
            wp_deregister_script('tz-counter');
            wp_register_script('tz-counter', PLUGIN_PATH . 'assets/js/tz-counter.js', false,false, $in_footer=true);

            wp_deregister_script('owl-carousel');
            wp_register_script('owl-carousel', PLUGIN_PATH . 'assets/js/owl.carousel.js', false,false, $in_footer=true);

            wp_deregister_script('tour-kind');
            wp_register_script('tour-kind', PLUGIN_PATH . 'assets/js/tour-kind.js', false,false, $in_footer=true);

            wp_deregister_script('resize');
            wp_register_script('resize', PLUGIN_PATH . 'assets/js/resize.js', false,false, $in_footer=true);

            wp_deregister_script('imagesloaded-pkgd');
            wp_register_script('imagesloaded-pkgd', PLUGIN_PATH . 'assets/js/imagesloaded.pkgd.js', false,false, $in_footer=true);

            wp_deregister_script('jquery-validate');
            wp_register_script('jquery-validate', PLUGIN_PATH . 'assets/js/jquery.validate.min.js', false,false, $in_footer=true);

            wp_deregister_script('tz-featured-tour-function');
            wp_register_script('tz-featured-tour-function', PLUGIN_PATH . 'assets/js/tz-featured-tour-function.js', false,false, $in_footer=true);

            wp_deregister_script('featured-tour');
            wp_register_script('featured-tour', PLUGIN_PATH . 'assets/js/featured-tour.js', false,false, $in_footer=true);

            wp_deregister_script('bootstrap-datepicker');
            wp_register_script('bootstrap-datepicker', PLUGIN_PATH . 'assets/js/bootstrap-datepicker.js', false,false, $in_footer=true);

            $aventura_current_locale = get_locale();
            $aventura_current_locale = substr(str_replace( '_', '-', $aventura_current_locale), 0, 2);

            if ( $aventura_current_locale != 'en' ) {
                $aventura_file_name = 'assets/js/locales/bootstrap-datepicker.' . $aventura_current_locale . '.min.js';
                wp_register_script('bootstrap-datepicker-localization', PLUGIN_PATH . $aventura_file_name, false,false, $in_footer=true);
            }

            wp_deregister_script('tz-latest-posts');
            wp_register_script('tz-latest-posts', PLUGIN_PATH . 'assets/js/tz-latest-posts.js', false,false, $in_footer=true);

        }

        public function  tzAventura_styles(){
            wp_register_style( 'owl-carousel', PLUGIN_PATH . 'assets/css/owl.carousel.css', false );
            wp_register_style( 'bootstrap-datepicker', PLUGIN_PATH . 'assets/css/bootstrap-datepicker.css', false );
        }



    }
    $oj_plazart = new aventura_plugin();

endif;

?>