<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $aventura_ID;

$aventura_gallery               =   aventura_metabox( 'aventura_tour_gallery','','','' );

if( $aventura_gallery != '' ){?>
    <div class="tz-tour-thumbnail tz-tour-gallery flexslider">
        <ul class="slides">
            <?php foreach($aventura_gallery as $aventura_image) :
                ?>
                <li>
                    <img src="<?php echo esc_url($aventura_image['full_url']); ?>" alt="<?php echo esc_html(get_bloginfo('title')); ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
}else{ ?>
    <div class="tz-tour-thumbnail">
        <?php echo get_the_post_thumbnail($aventura_ID,'full'); ?>
    </div>
    <?php
}
