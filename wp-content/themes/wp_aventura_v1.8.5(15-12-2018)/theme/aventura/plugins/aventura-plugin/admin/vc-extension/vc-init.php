<?php

/*=====================================
 * Visual Composer
 =====================================*/

if ( !class_exists('WPBakeryVisualComposerAbstract')):
    function aventura_includevisual(){
        $dir_vc = dirname( __FILE__ );

        /*
         * Icons Of Element In Admin Panel
         */
        require_once $dir_vc . '/visual-composer/tz_icon_element.php';

        if(function_exists('vc_add_param') && function_exists('vc_map')){
            require_once $dir_vc . '/visual-composer/vc_custom/vc_extend.php';
        }
        // VC Templates
        $vc_templates_dir = $dir_vc . '/visual-composer/vc_custom/';
        if(function_exists('vc_set_shortcodes_templates_dir')){
            vc_set_shortcodes_templates_dir($vc_templates_dir);
        }

        /*
         * Template Of Templaza
         */

        $tz_templates_dir = $dir_vc . '/visual-composer/vc_aventura/';
        //Aventura Services
        require_once $tz_templates_dir . '/services/services.php';
        require_once $tz_templates_dir . '/services/services-extend.php';
        //Aventura Counter
        require_once $tz_templates_dir . '/counter/counter.php';
        require_once $tz_templates_dir . '/counter/counter-extend.php';
        //Aventura Counter
        require_once $tz_templates_dir . '/hotline/hotline.php';
        require_once $tz_templates_dir . '/hotline/hotline-extend.php';
        //Aventura Articles
        require_once $tz_templates_dir . '/articles/articles.php';
        require_once $tz_templates_dir . '/articles/articles-extend.php';
        //Aventura About
        require_once $tz_templates_dir . '/about/about.php';
        require_once $tz_templates_dir . '/about/about-extend.php';
        //Aventura Destination
        require_once $tz_templates_dir . '/destination/destination.php';
        require_once $tz_templates_dir . '/destination/destination-extend.php';
        //Aventura Featured Tour
        require_once $tz_templates_dir . '/featured-tours/featured-tour.php';
        require_once $tz_templates_dir . '/featured-tours/featured-tour-extend.php';
        //Aventura Latest Tour
        require_once $tz_templates_dir . '/latest-tour/latest-tour.php';
        require_once $tz_templates_dir . '/latest-tour/latest-tour-extend.php';
        //Aventura Testimonials
        require_once $tz_templates_dir . '/testimonials/testimonials.php';
        require_once $tz_templates_dir . '/testimonials/testimonials-extend.php';
        //Aventura Testimonials
        require_once $tz_templates_dir . '/tour-kind/tour-kind.php';
        require_once $tz_templates_dir . '/tour-kind/tour-kind-extend.php';
        //Aventura Our Team
        require_once $tz_templates_dir . '/our-team/our-team.php';
        require_once $tz_templates_dir . '/our-team/our-team-extend.php';
        //Aventura Search Tour
        require_once $tz_templates_dir . '/search_tour/search_tour.php';
        require_once $tz_templates_dir . '/search_tour/search_tour_extend.php';

        //Aventura Latest Posts
        require_once $tz_templates_dir . '/latest-posts/latest-posts.php';
        require_once $tz_templates_dir . '/latest-posts/latest-posts-extend.php';

    }

    add_action('init', 'aventura_includevisual', 20);
endif;

?>
