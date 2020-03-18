<?php
get_header();
get_template_part('template_inc/inc','menu');
get_template_part('template_inc/inc','breadcrumb');
global $aventura_options;
$aventura_title      = ((!isset($aventura_options['aventura_404_title'])) || empty($aventura_options['aventura_404_title']))? '' : $aventura_options['aventura_404_title'];
$aventura_content    = ((!isset($aventura_options['aventura_404_editor'])) || empty($aventura_options['aventura_404_editor']))? '' : $aventura_options['aventura_404_editor'];
?>
<div class="page-404">
    <div class="container error">
        <div class="bug-content">
            <?php if($aventura_title != ''):?>
                <h3><?php echo esc_html($aventura_title);?></h3>
            <?php endif;?>
            <?php if($aventura_content != ''):?>
                <p><?php echo esc_html($aventura_content);?></p>
            <?php endif;?>
            <span><?php esc_html_e('404', 'aventura');?></span>
            <a class="go-back" href="<?php echo esc_url(home_url('/')); ?>"><?php echo  esc_html__('Go Back Home', 'aventura'); ?></a>
        </div>
    </div>
</div>
<?php get_footer(); ?>
