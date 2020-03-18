<?php
global $aventura_options;
$aventura_link = get_post_meta( $post->ID, '_format_link_url', true );
$aventura_blog_date      =    ((!isset($aventura_options['aventura_blog_general_date'])) || empty($aventura_options['aventura_blog_general_date'])) ? '1' : $aventura_options['aventura_blog_general_date'];
$aventura_blog_author    =    ((!isset($aventura_options['aventura_blog_general_author'])) || empty($aventura_options['aventura_blog_general_author'])) ? '1' : $aventura_options['aventura_blog_general_author'];
$aventura_blog_cat       =    ((!isset($aventura_options['aventura_blog_general_cat'])) || empty($aventura_options['aventura_blog_general_cat'])) ? '1' : $aventura_options['aventura_blog_general_cat'];
$aventura_blog_tag       =    ((!isset($aventura_options['aventura_blog_general_tag'])) || empty($aventura_options['aventura_blog_general_tag'])) ? '1' : $aventura_options['aventura_blog_general_tag'];
$aventura_blog_content   =    ((!isset($aventura_options['aventura_blog_general_content'])) || empty($aventura_options['aventura_blog_general_content'])) ? '1' : $aventura_options['aventura_blog_general_content'];
?>
<div class="tz-blog-link">
    <a href="<?php echo esc_url($aventura_link);?>"><?php echo esc_html($aventura_link);?></a>
    <?php if($aventura_blog_content == 1){ ?>
        <div class="tz-link-excerpt">
            <?php
            if( ! has_excerpt()):
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aventura' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'aventura' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
            else:
                the_excerpt();
            endif;
            ?>
        </div>
    <?php } ?>
</div>
<div class="tz-blog-content">
    <div class="tz-blog-meta">
        <?php
        if($aventura_blog_date == 1){
            $aventura_year = get_the_time( 'Y' );
            $aventura_month = get_the_time( 'm' );
            $aventura_day = get_the_time( 'd' ); ?>
            <span>
            <i class="fa fa-clock-o"></i>
            <a href="<?php echo esc_url(get_day_link( $aventura_year, $aventura_month, $aventura_day )) ?>"><?php echo get_the_date(); ?></a>
        </span>
        <?php }if($aventura_blog_author == 1) { ?>

            <span>
            <i class="fa fa-user"></i>
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
        </span>

            <?php
        }if($aventura_blog_cat == 1){
            if(get_the_category() !=false):
                ?>

                <span class="tz-blog-category">
                    <i class="fa fa-folder"></i>
                    <?php
                    the_category(', ');
                    ?>
                </span>
            <?php endif; } ?>
        <?php
        if($aventura_blog_tag == 1){
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