<?php

/*
 * Display posts
 * Widgets display posts by category
 */

class aventura_recentpost extends WP_Widget{

    /* function construct*/
    function __construct() {
       parent::__construct(
           'tz_view_post', esc_html__('Tz Recent Post', 'aventura-plugin'),
           array('description' =>  esc_html__(' Display post ', 'aventura-plugin'))
       );
    }

    /* function widget */
    function  widget($args,$instance){
        extract($args);

            $aventura_postargs = array(
                'post_type'         => 'post',
                'posts_per_page'    => $instance['tzlmpost'],
                'ignore_sticky_posts' => 1,
                'post__not_in' => get_option( 'sticky_posts' )
            );


        ?>
            <aside class="tz-recent-w widget tz-recent-<?php echo esc_attr($instance['type']);?>">
                <h3 class="module-title title-widget"><span><?php echo esc_html($instance['title']); ?></span></h3>
                <ul class="tz-recent-post">
                <?php
                $aventura_query_post = new WP_Query($aventura_postargs);
                    if( $aventura_query_post->have_posts() ):
                        while( $aventura_query_post->have_posts() ): $aventura_query_post->the_post();
                ?>
                    <li>
                        <?php
                            if ( has_post_thumbnail() ):
                                the_post_thumbnail(array(70,70));
                            else:
                                echo '<img src="'.get_template_directory_uri().'/images/recent.jpg" alt="noimage" />';
                            endif;
                        ?>
                        <?php if($instance['type'] == 'grid'):?>
                            <div class="tz-recent-overlay"></div>
                            <a href="<?php the_permalink(); ?>"><i class="fa fa-search-plus"></i></a>
                        <?php else:?>
                            <div class="tz-recent-content">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <span class ="tz-recent-date"><?php echo get_the_date('M d, Y'); ?></span>
                                <span class="tz-author"><i class="fa fa-user"></i><?php the_author(); ?></span>
                            </div>
                        <?php endif; ?>
                    </li>
                  <?php
                            endwhile; // end while(have_posts)
                        endif;  // end if(have_posts)
                    wp_reset_postdata();
                    ?>
                </ul>
            </aside>
        <?php
    }
    /* function form */
    function form($instance) {
        $instance = wp_parse_args( $instance, array(
            'title'             => 'Title',
            'type'             => 'list',
            'tzlmpost'       =>  5
        ) );

    ?>
         <p>
             <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                 <?php  esc_html_e('Title','aventura-plugin'); ?>
             </label>
             <br>
             <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" >
         </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('type')); ?>">
                <?php  esc_html_e('Display Type','aventura-plugin'); ?>
            </label>
            <select class="widefat"  name="<?php echo esc_attr($this->get_field_name('type')); ?>">
                <option value="list" <?php if($instance['type']=='list'){ echo 'selected="true"'; } ?>>List</option>
                <option value="grid" <?php if($instance['type']=='grid'){ echo 'selected="true"'; } ?>>Grid</option>
            </select>
        </p>

         <p>
             <label for="<?php echo esc_attr($this->get_field_id('tzlmpost')); ?>">
                <?php  esc_html_e('Limit post','aventura-plugin'); ?>
             </label>
             <input type="text" class="widefat"  id="<?php echo esc_attr($this->get_field_id('tzlmpost')); ?>" name="<?php echo esc_attr($this->get_field_name('tzlmpost')); ?>" value="<?php echo esc_attr($instance['tzlmpost']); ?>" >
         </p>

       <?php
    }

    /* function update */
    function update($new_instance,$old_instance){
        $instance = $old_instance ;
        $instance['title']          =   $new_instance['title'];
        $instance['type']           =   $new_instance['type'];
        $instance['tzlmpost']       =   $new_instance['tzlmpost'];
        return $instance;
    }
}

function aventura_register_recentpost() {
    register_widget( 'aventura_recentpost' );
}

add_action( 'widgets_init', 'aventura_register_recentpost' );

?>