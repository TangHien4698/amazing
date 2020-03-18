<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $aventura_ID,$aventura_booking_form_show,$aventura_adult_price,$aventura_child_price,$aventura_contact_description,$aventura_contact_form;
?>

<div class="tz-tour-book-contact">

    <?php if($aventura_booking_form_show == '1' && ($aventura_adult_price != '' || $aventura_child_price != '')):?>
        <div class="tz-title">
            <h4><?php esc_html_e('OR','aventura'); ?></h4>
        </div>
    <?php endif;?>

    <div class="tz-book-form">
        <?php if($aventura_contact_description != ''):?>
            <p class="tz-description">
                <?php echo esc_html($aventura_contact_description);?>
            </p>
        <?php endif;?>
        <?php if($aventura_contact_form != ''):?>
            <div class="tz-contact-form">
                <?php echo do_shortcode('[contact-form-7 id='. esc_attr($aventura_contact_form) .']')?>
            </div>
        <?php endif;?>
    </div>
</div>

