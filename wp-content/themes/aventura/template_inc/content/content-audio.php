<?php
    $aventura_audio = get_post_meta( $post->ID, '_format_audio_embed', true );
    if($aventura_audio != ''):
        ?>
        <div class="tz-blog-audio">
            <?php if(wp_oembed_get( $aventura_audio )) : ?>
                <?php echo wp_oembed_get($aventura_audio); ?>
            <?php else : ?>
                <?php echo balanceTags($aventura_audio); ?>
            <?php endif; ?>
        </div>
<?php endif;?>