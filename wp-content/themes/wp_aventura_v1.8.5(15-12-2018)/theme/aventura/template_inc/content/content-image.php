<?php
global $aventura_options;
$aventura_single_date   =   ((!isset($aventura_options['aventura_blog_single_date'])) || empty($aventura_options['aventura_blog_single_date'])) ? '1' : $aventura_options['aventura_blog_single_date'];
$aventura_single_author =   ((!isset($aventura_options['aventura_blog_single_author'])) || empty($aventura_options['aventura_blog_single_author'])) ? '1' : $aventura_options['aventura_blog_single_author'];
$aventura_single_cat    =   ((!isset($aventura_options['aventura_blog_single_cat'])) || empty($aventura_options['aventura_blog_single_cat'])) ? '1' : $aventura_options['aventura_blog_single_cat'];
$aventura_single_tag    =   ((!isset($aventura_options['aventura_blog_single_tag'])) || empty($aventura_options['aventura_blog_single_tag'])) ? '1' : $aventura_options['aventura_blog_single_tag'];
$aventura_single_title  =   ((!isset($aventura_options['aventura_blog_single_title'])) || empty($aventura_options['aventura_blog_single_title'])) ? '1' : $aventura_options['aventura_blog_single_title'];

?>
<?php if ( !is_single() && is_sticky() ): ?>
    <span class="tz-sticky-post"></span>
<?php endif; ?>
<div class="tz-blog-thumbnail">
    <?php the_post_thumbnail();?>
    <?php if(is_single()): ?>
        <div class="content">
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
                    <?php endif;
                }?>
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
                    <?php endif;
                }?>
            </div>
        </div>
    <?php endif; ?>
</div>