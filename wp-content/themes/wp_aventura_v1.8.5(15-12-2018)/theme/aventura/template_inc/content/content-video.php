<?php $aventura_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
<?php
if($aventura_video != ''):
    ?>
    <div class="tz-blog-video">
        <?php if(wp_oembed_get( $aventura_video )) : ?>
            <?php echo wp_oembed_get($aventura_video); ?>
        <?php else : ?>
            <?php echo balanceTags($aventura_video); ?>
        <?php endif; ?>
    </div>
<?php endif;?>