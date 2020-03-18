<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');

global $aventura_options;
$aventura_blog_sidebar = ((!isset($aventura_options['aventura_blog_general_sidebar'])) || empty($aventura_options['aventura_blog_general_sidebar'])) ? '2' : $aventura_options['aventura_blog_general_sidebar'];
$aventura_blog_paging  = ((!isset($aventura_options['aventura_blog_general_pagination'])) || empty($aventura_options['aventura_blog_general_pagination'])) ? '1' : $aventura_options['aventura_blog_general_pagination'];
?>
<div class="tz-blog">
    <div class="container">
        <div class="row">
            <?php
            if($aventura_blog_sidebar == '1') {
                get_sidebar();
            }
            ?>
            <div class="blog-wrapper col-md-9">
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
                        elseif(has_post_format('quote')):
                            get_template_part( 'template_inc/content/content','quote' );
                        elseif(has_post_format('link')):
                            get_template_part( 'template_inc/content/content','link' );
                        else:
                            get_template_part( 'template_inc/content/content','image' );
                            get_template_part( 'template_inc/content/content','info' );
                        endif;

                        ?>
                    </div>
                    <?php
                endwhile; // end while ( have_posts )
                else: ?>
                    <div class="tz-serach-notda">
                        <h3><?php  esc_html_e('No Data', 'aventura');?></h3>

                        <div class="page-content">

                            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                                <p><?php printf(  esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'aventura' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

                            <?php elseif ( is_search() ) : ?>

                                <p><?php  esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'aventura' ); ?></p>
                                <?php get_search_form(); ?>

                            <?php else : ?>

                                <p><?php  esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'aventura' ); ?></p>
                                <?php get_search_form(); ?>

                            <?php endif; ?>

                        </div><!-- .page-content -->
                    </div>
                
                <?php
                endif; // end if ( have_posts )
                ?>

                <?php
                if($aventura_blog_paging == '1'){
                    aventura_paging_nav();
                }
                ?>
            </div>
            <?php
            if($aventura_blog_sidebar == '2'):
                get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

