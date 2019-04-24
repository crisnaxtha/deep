<?php
/**
 * Custom template widgets register for this theme
 *
 * 
 *
 * @package DEEP
 */

class Deepmala_Most_Read_Widget extends WP_Widget {
    /**
	 * Register widget with WordPress.
	 */

    function __construct() {
        $widget_ops = array('classname' => 'most-read-widget', 'description' => __('Display Most Read Post', 'deepmala'));
        $control_ops = array('width' => 200, 'height' => 250);
        parent::__construct(false, $name=__('DM: Display Most Read Post', 'deepmala'), $widget_ops, $control_ops);
    }

    /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 */

    public function form( $instance ) {
      $title    = esc_attr($instance['title']);
      $deepmala_most_read_posts = ! empty( $instance['deepmala_most_read_posts'] ) ? absint( $instance['deepmala_most_read_posts'] ) : 5; ?>
      <p>
			<label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title:', 'deepmala');?></label>
			<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" />
		</p>
      <p>
			<label for="<?php echo $this->get_field_id( 'deepmala_most_read_posts' ); ?>"><?php esc_html_e( 'Number of most read posts:', 'deepmala' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'deepmala_most_read_posts' ); ?>" name="<?php echo $this->get_field_name( 'deepmala_most_read_posts' ); ?>" type="text" value="<?php echo esc_attr( $deepmala_most_read_posts ); ?>">
		</p>

        <?php 
    }

    /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);      
		$instance['deepmala_most_read_posts'] = ( ! empty( $new_instance['deepmala_most_read_posts'] ) ) ? absint( $new_instance['deepmala_most_read_posts'] ) : '';
		return $instance;
	}

   public function widget( $args, $instance) {
      $deepmala_most_read_posts = ( ! empty( $instance['deepmala_most_read_posts'] ) ) ? absint( $instance['deepmala_most_read_posts'] ) : 5;
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

        echo '<!-- Category Most Read Widget ============================================= -->'.$before_widget;?>
        	<?php if($title != '' ) { ?>
            <h6 class="text-purple mb-4"><?php echo $title; ?></h6>
         <?php }else { ?>
            <h6 class="text-purple mb-4"><?php esc_html_e('Most Read', 'deepmala' ); ?></h6>
          <?php } ?>
        <ul class="simple-entry-list blog-post">
           <?php 
              $args = array('ignore_sticky_posts' => 1,
                              'post_per_page' => $deepmala_most_read_posts,
                              'post_status' => 'publish', 
                              'orderby' => 'deepmala_post_views_count',
                              'orderby' => 'meta_value_num', 
                              'order' => 'DESC' 
                          );
              $most_read = new WP_Query( $args );
              $count = 0;
              if ( $most_read->have_posts() ) :
              while( $most_read->have_posts() ) : $most_read->the_post(); $count++;?>
           <li>
              <div class="reveal-title">
                 <?php echo $count; ?>
              </div>
              <div class="entry-content-wrapper">
                 <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                 </h2>
                 <div class="entry-meta-top">
                    <span class="entry-author"><i class="far fa-user"></i><?php the_author(); ?></span>
                    <span class="entry-meta-date"><i class="far fa-clock"></i><?php the_time('F j, Y'); ?></span>    
                 </div>
              </div>
           </li>
           <?php
              endwhile;
              wp_reset_postdata();
              endif;
              ?>
        </ul>
        <?php
        echo $after_widget.'<!-- end .widget-most-read-box -->';
    }
}