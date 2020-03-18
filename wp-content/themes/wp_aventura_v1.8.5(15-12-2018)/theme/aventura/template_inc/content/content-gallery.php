<?php
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
    </div>
<?php endif; ?>