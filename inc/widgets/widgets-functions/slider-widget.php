<?php
/**
 * Custom template widgets register for this theme
 *
 * 
 *
 * @package DEEP
 */

class Deepmala_Slider_Widget extends WP_Widget {
    /**
	 * Register widget with WordPress.
	 */

    function __construct() {
        $widget_ops = array('classname' => 'slider-widget', 'description' => __('Display Slider Widget', 'deepmala'));
        $control_ops = array('width' => 200, 'height' => 250);
        parent::__construct(false, $name=__('DM: Slider Widget', 'deepmala'), $widget_ops, $control_ops);
    }

    /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 */

    public function form( $instance ) {
        $instance = wp_parse_args(( array ) $instance, array('title' => '','number' => '5','category' => '', 'link'=>''));
		$title    = esc_attr($instance['title']);
		$number = absint( $instance[ 'number' ] );
		$link = esc_url( $instance[ 'link' ] );
		$category = $instance[ 'category' ];
       ?>
      <p>
			<label for="<?php echo $this->get_field_id('title');?>">
				<?php _e('Title:', 'deepmala');?>
			</label>
			<input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link');?>">
				<?php _e('Custom Link:', 'deepmala');?>
			</label>
			<input id="<?php echo $this->get_field_id('link');?>" name="<?php echo $this->get_field_name('link');?>" type="text" value="<?php echo esc_url($link);?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
			<?php _e( 'Number of Post:', 'deepmala' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo absint($number); ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'deepmala' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category'), 'value_field' => 'slug' , 'selected' => $category ) ); ?>
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
        $instance  = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['link'] = esc_url_raw($new_instance['link']);
		$instance['number' ] = absint( $new_instance[ 'number' ] );
		$instance['category' ] = sanitize_text_field($new_instance[ 'category' ]);
		return $instance;
	}

    public function widget( $args, $instance) {
      extract($args);
		extract($instance);
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$link = isset( $instance[ 'link' ] ) ? $instance[ 'link' ] : '';
		$number = empty( $instance[ 'number' ] ) ? 3 : $instance[ 'number' ];
      $category = isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';
        
        if($category !='-1'){ 
			$get_category_posts = new WP_Query( 
			array( 
				'category_name' => esc_attr($category), 
				'post_status' => 'publish', 
				'ignore_sticky_posts'=> 'true', 
				'order'=>'DESC', 'orderby'=>'date', 
				'posts_per_page'=> absint($number), 
				) );
		} else { 
				$get_category_posts = new WP_Query( 
					array( 'post_status' => 'publish',
					'ignore_sticky_posts'=> 'true',
					'order'=>'DESC',
					'orderby'=>'date',
					'posts_per_page'=> absint($number), 
					) );
		} 

		echo '<!-- Category Slider Widget ============================================= -->' .$before_widget;
        ?>

<div class="slider-call blog-post blog-slider blog-post tahreer-slider-one mt-5 mt-md-6 mb-6" data-slick="{&quot;slidesToShow&quot;: 1, infinite&quot;:false,&quot; arrows&quot;:true,&quot;dots&quot;:true">
   <?php 
      $category_term = get_category_by_slug($category);
      $category_id = $category_term->term_id;
          
      while ( $get_category_posts->have_posts() ) :
              $get_category_posts->the_post(); 
          
      ?>
   <article>
      <div class="entry-media">
         <?php if( has_post_thumbnail() ){?>
         <img src="<?php the_post_thumbnail_url();?>" alt="Entry Image">
         <?php } ?>   
      </div>
      <div class="entry-content-wrapper">
         <div class="entry-meta-top">
            <?php if($category!= -1):
               // Get the URL of this category
               $category_link = get_category_link( $category_id ); ?>
            <span class="entry-meta-category"><i class="far fa-folder"></i><a href="<?php echo $category_link ;?>"><?php echo $category_term->name; ?></a></span>
            <?php endif; ?>
            <span class="entry-author"><i class="far fa-user"></i><?php esc_attr(the_author()) ?></span>
            <?php printf('<span class="entry-meta-date"><a href="%1$s" title="%2$s"><i class="far fa-clock"></i> %3$s</span>',
               esc_url(get_the_permalink()),
               esc_attr( get_the_time(get_option( 'date_format' )) ),
               esc_attr( get_the_time(get_option( 'date_format' )) )
               );
               ?>
         </div>
         <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 14 , ' ...' );?></a>
         </h2>
         <div class="entry-content">
            <p><?php echo wp_trim_words( get_the_excerpt() , 6 , ' ...' ); ?></p>
         </div>
      </div>
   </article>
	<?php endwhile;
	wp_reset_postdata();
	 ?>
</div>
        <?php 
        echo $after_widget.'<!-- end .widget-slider-box -->';
    }
}