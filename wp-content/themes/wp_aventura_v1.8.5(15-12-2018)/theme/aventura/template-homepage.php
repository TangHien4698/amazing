<?php
/*
 * Template Name: Template Home Default
 */
?>
<?php
get_header();
get_template_part('template_inc/inc', 'menu');

?>

<?php
if (have_posts()):
    while (have_posts()):the_post();
        the_content();
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aventura' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'aventura' ) . ' </span>%',
            'separator'   => '<span class="screen-reader-text">, </span>',
        ) );
    endwhile;
endif;
?>

<?php
get_footer();
?>