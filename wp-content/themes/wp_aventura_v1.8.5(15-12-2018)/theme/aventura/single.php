<?php
get_header();
get_template_part('template_inc/inc','menu');
if(has_post_format('quote') || has_post_format('link')) {
    get_template_part('template_inc/inc', 'breadcrumb');
}
global $aventura_options;
$aventura_single_sidebar    =   ((!isset($aventura_options['aventura_blog_single_sidebar'])) || empty($aventura_options['aventura_blog_single_sidebar'])) ? '3' : $aventura_options['aventura_blog_single_sidebar'];
$aventura_single_related    =   ((!isset($aventura_options['aventura_blog_single_related'])) || empty($aventura_options['aventura_blog_single_related'])) ? '0' : $aventura_options['aventura_blog_single_related'];
$aventura_single_comment    =   ((!isset($aventura_options['aventura_blog_single_comment'])) || empty($aventura_options['aventura_blog_single_comment'])) ? '0' : $aventura_options['aventura_blog_single_comment'];

$aventura_single_date       =   ((!isset($aventura_options['aventura_blog_single_date'])) || empty($aventura_options['aventura_blog_single_date'])) ? '0' : $aventura_options['aventura_blog_single_date'];
$aventura_single_author     =   ((!isset($aventura_options['aventura_blog_single_author'])) || empty($aventura_options['aventura_blog_single_author'])) ? '0' : $aventura_options['aventura_blog_single_author'];
$aventura_single_cat        =   ((!isset($aventura_options['aventura_blog_single_cat'])) || empty($aventura_options['aventura_blog_single_cat'])) ? '0' : $aventura_options['aventura_blog_single_cat'];
$aventura_single_tag        =   ((!isset($aventura_options['aventura_blog_single_tag'])) || empty($aventura_options['aventura_blog_single_tag'])) ? '0' : $aventura_options['aventura_blog_single_tag'];
$aventura_single_title      =   ((!isset($aventura_options['aventura_blog_single_title'])) || empty($aventura_options['aventura_blog_single_title'])) ? '0' : $aventura_options['aventura_blog_single_title'];

?>
<div class="tz-blog-single <?php if(has_post_format('quote')): echo 'single_quote';elseif(has_post_format('link')): echo 'single_link'; endif; ?>">
    <?php
    if ( have_posts() ) : while (have_posts()) : the_post();
    aventura_setPostViews(get_the_ID());
    $aventura_comment_count  = wp_count_comments($post->ID);
    $aventura_view = aventura_getPostViews($post->ID);
    ?>
    <?php if(has_post_format('gallery')){
        $aventura_gallery = get_post_meta( $post->ID, '_format_gallery_images', true );
        if($aventura_gallery) :
            ?>
            <div class="tz-blog-slides">
                <ul class="slides">
                    <?php foreach($aventura_gallery as $aventura_image) : ?>

                        <?php $aventura_image_src = wp_get_attachment_image_src( $aventura_image, 'full-thumb' ); ?>
                        <?php $aventura_caption = get_post_field('post_excerpt', $aventura_image); ?>
                        <li><img src="<?php echo esc_url($aventura_image_src[0]); ?>" <?php if($aventura_caption) : ?>title="<?php echo esc_attr($aventura_caption); ?>"<?php endif; ?> alt="<?php echo sanitize_title(get_the_title())?>"/></li>
                    <?php endforeach; ?>
                </ul>
                <div class="content">
                    <div class="container">
                        <h3 class="tz-blog-title">
                            <?php
                            if(is_single() && $aventura_single_title == 1) {
                                the_title();
                            }
                            ?>
                        </h3>
                        <div class="tz-blog-meta">
                            <?php
                            if($aventura_single_date == 1){
                                $aventura_year = get_the_time( 'Y' );
                                $aventura_month = get_the_time( 'm' );
                                $aventura_day = get_the_time( 'd' ); ?>
                                <span>
                                <i class="fa fa-clock-o"></i>
                                <a href="<?php echo esc_url(get_day_link( $aventura_year, $aventura_month, $aventura_day )) ?>"><?php echo get_the_date(); ?></a>
                            </span>
                            <?php }
                            if($aventura_single_author == 1) {
                                ?>
                                <span>
                                <i class="fa fa-user"></i>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                            </span>
                                <?php
                            }
                            if($aventura_single_cat == 1){
                                if(get_the_category() !=false):
                                    ?>

                                    <span class="tz-blog-category">
                                    <i class="fa fa-folder"></i>
                                        <?php
                                        the_category(', ');
                                        ?>
                                </span>
                                <?php endif; }?>
                            <?php
                            if($aventura_single_tag == 1){
                                if(get_the_tags() != false):
                                    ?>
                                    <span class="tz-blog-tag">
                                    <i class="fa fa-tag"></i>
                                        <?php
                                        the_tags('',', ');
                                        ?>
                                </span>
                                <?php endif; }?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;
    }elseif(has_post_format('video')){ ?>
        <div class="tz-blog-thumbnail">
            <?php the_post_thumbnail();?>

            <div class="content">
                <div class="container">
                    <?php $aventura_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
                    <?php
                    if($aventura_video != ''):
                        ?>
                        <div class="tz-blog-video">
                            <?php if(wp_oembed_get( $aventura_video )) : ?>
                                <?php echo wp_oembed_get($aventura_video); ?>
                            <?php else : ?>
                                <?php echo balanceTags($aventura_video); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif;?>
                    <h3 class="tz-blog-title">
                        <?php
                        if(is_single() && $aventura_single_title == 1) {
                            the_title();
                        }
                        ?>
                    </h3>
                    <div class="tz-blog-meta">
                        <?php
                        if($aventura_single_date == 1){
                            $aventura_year = get_the_time( 'Y' );
                            $aventura_month = get_the_time( 'm' );
                            $aventura_day = get_the_time( 'd' ); ?>
                            <span>
                                <i class="fa fa-clock-o"></i>
                                <a href="<?php echo esc_url(get_day_link( $aventura_year, $aventura_month, $aventura_day )) ?>"><?php echo get_the_date(); ?></a>
                            </span>
                        <?php }
                        if($aventura_single_author == 1) {
                            ?>
                            <span>
                                <i class="fa fa-user"></i>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                            </span>
                            <?php
                        }
                        if($aventura_single_cat == 1){
                            if(get_the_category() !=false):
                                ?>

                                <span class="tz-blog-category">
                                    <i class="fa fa-folder"></i>
                                    <?php
                                    the_category(', ');
                                    ?>
                                </span>
                            <?php endif; }?>
                        <?php
                        if($aventura_single_tag == 1){
                            if(get_the_tags() != false):
                                ?>
                                <span class="tz-blog-tag">
                                    <i class="fa fa-tag"></i>
                                    <?php
                                    the_tags('',', ');
                                    ?>
                                </span>
                            <?php endif; }?>
                    </div>
                </div>
            </div>
        </div>
    <?php }elseif(has_post_format('audio')){  ?>
        <div class="tz-blog-thumbnail">
            <?php the_post_thumbnail();?>

            <div class="content">
                <div class="container">
                    <?php
                    $aventura_audio = get_post_meta( $post->ID, '_format_audio_embed', true );
                    if($aventura_audio != ''):
                        ?>
                        <div class="tz-blog-audio">
                            <?php if(wp_oembed_get( $aventura_audio )) : ?>
                                <?php echo wp_oembed_get($aventura_audio); ?>
                            <?php else : ?>
                                <?php echo balanceTags($aventura_audio); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif;?>

                    <?php
                    if( $aventura_single_title == 1 ) {
                        ?>
                        <h3 class="tz-blog-title"><?php the_title(); ?></h3>
                        <?php
                    }
                    ?>
                    <div class="tz-blog-meta">
                        <?php
                        if($aventura_single_date == 1){
                            $aventura_year = get_the_time( 'Y' );
                            $aventura_month = get_the_time( 'm' );
                            $aventura_day = get_the_time( 'd' ); ?>
                            <span>
                                <i class="fa fa-clock-o"></i>
                                <a href="<?php echo esc_url(get_day_link( $aventura_year, $aventura_month, $aventura_day )) ?>"><?php echo get_the_date(); ?></a>
                            </span>
                        <?php }
                        if($aventura_single_author == 1) {
                            ?>
                            <span>
                                <i class="fa fa-user"></i>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                            </span>
                            <?php
                        }
                        if($aventura_single_cat == 1){
                            if(get_the_category() !=false):
                                ?>

                                <span class="tz-blog-category">
                                    <i class="fa fa-folder"></i>
                                    <?php
                                    the_category(', ');
                                    ?>
                                </span>
                            <?php endif; }?>
                        <?php
                        if($aventura_single_tag == 1){
                            if(get_the_tags() != false):
                                ?>
                                <span class="tz-blog-tag">
                                    <i class="fa fa-tag"></i>
                                    <?php
                                    the_tags('',', ');
                                    ?>
                                 </span>
                            <?php endif; }?>
                    </div>
                </div>
            </div>

        </div>
    <?php }elseif(!has_post_format('quote' && !has_post_format('link'))){ ?>
        <!--    Image-->
        <div class="tz-blog-thumbnail">
            <?php the_post_thumbnail();?>
            <div class="content">
                <div class="container">
                    <?php
                    if( $aventura_single_title == 1 ) {
                        ?>
                        <h3 class="tz-blog-title"><?php the_title(); ?></h3>
                        <?php
                    }
                    ?>
                    <div class="tz-blog-meta">
                        <?php
                        if($aventura_single_date == 1){
                            $aventura_year = get_the_time( 'Y' );
                            $aventura_month = get_the_time( 'm' );
                            $aventura_day = get_the_time( 'd' ); ?>
                            <span>
                                    <i class="fa fa-clock-o"></i>
                                    <a href="<?php echo esc_url(get_day_link( $aventura_year, $aventura_month, $aventura_day )) ?>"><?php echo get_the_date(); ?></a>
                                </span>
                        <?php }
                        if($aventura_single_author == 1) {
                            ?>
                            <span>
                                    <i class="fa fa-user"></i>
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                </span>
                            <?php
                        }
                        if($aventura_single_cat == 1){
                            if(get_the_category() !=false):
                                ?>

                                <span class="tz-blog-category">
                                        <i class="fa fa-folder"></i>
                                    <?php
                                    the_category(', ');
                                    ?>
                                    </span>
                            <?php endif; }?>
                        <?php
                        if($aventura_single_tag == 1){
                            if(get_the_tags() != false):
                                ?>
                                <span class="tz-blog-tag">
                                        <i class="fa fa-tag"></i>
                                    <?php
                                    the_tags('',', ');
                                    ?>
                                     </span>
                            <?php endif; }?>
                    </div>
                </div>
            </div>

        </div>
    <?php  } ?>

    <div class="container">
        <div class="row">
            <?php if($aventura_single_sidebar == 2):  ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
            <div class="blog-wrapper <?php if($aventura_single_sidebar == '1'): echo 'col-md-12'; else: echo 'col-md-9'; endif;?>">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    if(has_post_format('quote')):
                        get_template_part( 'template_inc/content/content','quote' );
                    elseif(has_post_format('link')):
                        get_template_part( 'template_inc/content/content','link' );
                    else:
                        get_template_part( 'template_inc/content/content','info' );
                    endif;
                    ?>
                </div>
                <?php
                $aventura_author_des = get_the_author_meta('description');
                if($aventura_author_des != ''):
                    ?>
                    <div class="author">
                        <div class="author-item">
                            <div class="author-avata">
                                <img src="<?php echo get_avatar_url( get_the_author_meta('ID'),array('size'=> 270,)); ?>" alt="avatar">
                            </div>
                            <div class="author-infor">
                                <?php
                                $aventura_facebook    =  get_the_author_meta('facebook');
                                $aventura_twitter     =  get_the_author_meta('twitter');
                                $aventura_gplus       =  get_the_author_meta('gplus');
                                $aventura_dribbble    =  get_the_author_meta('dribbble');
                                $aventura_instagram    =  get_the_author_meta('instagram');
                                ?>
                                <span class="written"><?php echo esc_html__('Post Written By','aventura');?></span>
                                <div class="social-author">
                                    <?php if(isset($aventura_facebook) && !empty($aventura_facebook)) {?>
                                        <a target="_blank" href="<?php echo esc_url($aventura_facebook);?>">
                                            <i class="fa fa-facebook"></i></a>
                                    <?php } ?>

                                    <?php if(isset($aventura_twitter) && !empty($aventura_twitter)) {?>
                                        <a target="_blank" href="<?php echo esc_url($aventura_twitter);?>">
                                            <i class="fa fa-twitter"></i></a>
                                    <?php } ?>

                                    <?php if(isset($aventura_gplus) && !empty($aventura_gplus)) {?>
                                        <a target="_blank" href="<?php echo esc_url($aventura_gplus);?>">
                                            <i class="fa fa-google-plus"></i></a>
                                    <?php } ?>

                                    <?php if(isset($aventura_dribbble) && !empty($aventura_dribbble)) {?>
                                        <a target="_blank" href="<?php echo esc_url($aventura_dribbble);?>">
                                            <i class="fa fa-pinterest"></i></a>
                                    <?php } ?>
                                    <?php if(isset($aventura_instagram) && !empty($aventura_instagram)) {?>
                                        <a target="_blank" href="<?php echo esc_url($aventura_instagram);?>">
                                            <i class="fa fa-instagram"></i></a>
                                    <?php } ?>
                                </div>
                                <span class="author-name"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>"><?php the_author();?></a></span>
                                <p class="author-des"><?php the_author_meta('description'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($aventura_single_related == 1 && ! is_singular('destination')){ ?>
                    <?php
                    global $post;
                    $aventura_tags = wp_get_post_tags($post->ID);

                    if ($aventura_tags) {
                        $aventura_tag_ids = array();
                        foreach($aventura_tags as $aventura_individual_tag) $aventura_tag_ids[] = $aventura_individual_tag->term_id;
                        $aventura_args=array(
                            'tag__in' => $aventura_tag_ids,
                            'post__not_in' => array($post->ID),
                            'posts_per_page'=>3,
                            'ignore_sticky_posts' => 1,
                        );

                        $aventura_query = new wp_query( $aventura_args );
                        if($aventura_query->have_posts()){
                            ?>
                            <div class="relatedposts">
                                <h3><?php echo esc_html__('Related Articles','aventura'); ?></h3>
                                <div class="related">

                                    <?php
                                    while( $aventura_query->have_posts() ) {
                                        $aventura_query->the_post();
                                        ?>

                                        <div class="related-item">
                                            <div class="related-img">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail(); ?>
                                                </a>
                                            </div>
                                            <div class="related-content">
                                                <div class="title">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <?php
                                                    $aventura_year = get_the_time( 'Y' );
                                                    $aventura_month = get_the_time( 'm' );
                                                    $aventura_day = get_the_time( 'd' ); ?>
                                                    <span>
                                                                <a href="<?php echo esc_url(get_day_link( $aventura_year, $aventura_month, $aventura_day )) ?>"><?php echo get_the_date(); ?></a>
                                                            </span>
                                                    <span>-</span>
                                                    <span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author();?></a></span>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <?php } ?>

                    <div class="tzComments">
                        <?php comments_template( '', true ); ?>
                    </div><!-- end comments -->
                <?php
                endwhile; // end while ( have_posts )
                endif; // end if ( have_posts )
                ?>
            </div>
            <?php if($aventura_single_sidebar == 3):  ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>

