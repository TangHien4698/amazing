<?php
global $aventura_options;
$aventura_name = get_post_meta( $post->ID, '_format_quote_source_name', true );
$aventura_link = get_post_meta( $post->ID, '_format_quote_source_url', true );
$aventura_blog_date      =    ((!isset($aventura_options['aventura_blog_general_date'])) || empty($aventura_options['aventura_blog_general_date'])) ? '1' : $aventura_options['aventura_blog_general_date'];
$aventura_blog_author    =    ((!isset($aventura_options['aventura_blog_general_author'])) || empty($aventura_options['aventura_blog_general_author'])) ? '1' : $aventura_options['aventura_blog_general_author'];
$aventura_blog_cat       =    ((!isset($aventura_options['aventura_blog_general_cat'])) || empty($aventura_options['aventura_blog_general_cat'])) ? '1' : $aventura_options['aventura_blog_general_cat'];
$aventura_blog_tag       =    ((!isset($aventura_options['aventura_blog_general_tag'])) || empty($aventura_options['aventura_blog_general_tag'])) ? '1' : $aventura_options['aventura_blog_general_tag'];
?>

<div class="tz-quote-info">
    <a href="<?php the_permalink(); ?>"><span class="tz-quote-name"><?php echo esc_html($aventura_name)?></span></a>
    <a class="tz-quote-link" href="#">- <?php echo esc_html($aventura_link)?> -</a>
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
            <?php endif; } ?>
    </div>
</div>