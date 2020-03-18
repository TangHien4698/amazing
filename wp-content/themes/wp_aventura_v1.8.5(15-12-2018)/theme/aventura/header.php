<?php
/*
 * The Header for our theme.
 */
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <?php wp_head(); ?>
</head>
<body id="bd" <?php body_class(); ?>>
<!--Include Loading Template-->
<?php get_template_part('template_inc/inc','loading'); ?>


