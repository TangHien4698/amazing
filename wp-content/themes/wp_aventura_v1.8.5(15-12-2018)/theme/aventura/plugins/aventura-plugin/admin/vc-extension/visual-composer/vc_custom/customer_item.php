<?php
$args = array(
    "tz_bg"               => "2",
    "tz_rating"          => "",
    "tz_description"              => "",
    "tz_name"            => "",
    "tz_company"        => "",
);
extract(shortcode_atts($args, $atts));
$tz_signature_img_id = preg_replace( '/[^\d]/', '', $tz_bg);
$tz_signature_width ='';

$tz_signature_info = wp_get_attachment_image_src($tz_signature_img_id, $size='full');
if(isset($tz_signature_info) && !empty($tz_signature_info)){
    $tz_signature_url = $tz_signature_info[0];
    $tz_signature_width = $tz_signature_info[1];
    $tz_signature_height = $tz_signature_info[2];
}
$tz_width_rating = $tz_rating * 14;
?>
<div class="tzCustomerItem">
    <div class="tz-img">
        <img src="<?php echo esc_html($tz_signature_url); ?>" alt="img_cusotmer">
    </div>
    <div class="content">
        <div class="tz-average-rating">
            <div class="tz-rating" <?php if($tz_width_rating != ''):?> style="width: <?php echo esc_html($tz_width_rating);?>px" <?php endif; ?>></div>
        </div>
        <p><?php echo esc_html($tz_description); ?></p>
        <h3><?php echo esc_html($tz_name); ?></h3>
        <span><?php echo esc_html($tz_company); ?></span>
    </div>
</div>
