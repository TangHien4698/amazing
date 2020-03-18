<?php
get_header();
get_template_part('template_inc/inc','menu');

global $aventura_options;
$aventura_blog_sidebar = ((!isset($aventura_options['aventura_blog_general_sidebar'])) || empty($aventura_options['aventura_blog_general_sidebar'])) ? '3' : $aventura_options['aventura_blog_general_sidebar'];
$aventura_blog_paging  = ((!isset($aventura_options['aventura_blog_general_pagination'])) || empty($aventura_options['aventura_blog_general_pagination'])) ? '1' : $aventura_options['aventura_blog_general_pagination'];
$aventura_sidebar_type = '';
if(isset($_GET["sidebar"]) && !empty($_GET["sidebar"])){
    $aventura_sidebar_type = $_GET["sidebar"];
}
if($aventura_blog_sidebar == '1' || $aventura_sidebar_type == 'none'){
    $aventura_blog_class = 'col-md-12';
}else{
    $aventura_blog_class = 'col-md-9';
}
?>
<div class="tz-blog">
    <div class="container">
        <div class="row">
            <?php
            if($aventura_sidebar_type == 'left' || $aventura_blog_sidebar == '2' && $aventura_blog_class != 'col-md-12') {
                get_sidebar();
            }
            ?>
            <div class="blog-wrapper <?php echo esc_attr($aventura_blog_class); ?>">
                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();
                    ?>
                    <div id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
                        <?php
                        if(has_post_format('gallery')):
                            get_template_part( 'template_inc/content/content','gallery' );
                            get_template_part( 'template_inc/content/content','info' );
                        elseif(has_post_format('audio')):
                            get_template_part( 'template_inc/content/content','audio' );
                            get_template_part( 'template_inc/content/content','info' );
                        elseif(has_post_format('video')):
                            get_template_part( 'template_inc/content/content','video' );
                            get_template_part( 'template_inc/content/content','info' );
                        else:
                            get_template_part( 'template_inc/content/content','image' );
                            get_template_part( 'template_inc/content/content','info' );
                        endif;

                        ?>
                    </div>
                    <?php
                endwhile; // end while ( have_posts )
                endif; // end if ( have_posts )
                ?>

                <?php
                if($aventura_blog_paging == '1'){
                    aventura_paging_nav();
                }
                ?>
            </div>
            <?php
            if($aventura_sidebar_type == 'right' || $aventura_blog_sidebar == '3' && $aventura_blog_class != 'col-md-12'):
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

