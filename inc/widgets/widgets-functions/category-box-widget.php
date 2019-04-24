<?php
/**
 * Custom template widgets register for this theme
 *
 * 
 *
 * @package DEEP
 */

class Deepmala_Category_Widget extends WP_Widget {
    /**
	 * Register widget with WordPress.
	 */

    function __construct() {
        $widget_ops = array('classname' => 'category-box-widget', 'description' => __('Display Category Box Widget', 'deepmala'));
        $control_ops = array('width' => 200, 'height' => 250);
        parent::__construct(false, $name=__('DM: Category Box Widget', 'deepmala'), $widget_ops, $control_ops);
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
                'order'=>'DESC', 
                'orderby'=>'date', 
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

		echo '<!-- Category Box Widget ============================================= -->' .$before_widget;
        ?>
        <?php
            $category_term = get_category_by_slug($category);
            $category_id = $category_term->term_id;
        ?>
        	<?php if($title != '' ) { ?>
                <h6 class="text-red mb-4"><a href="<?php echo get_category_link($category_term->term_id); ?>"><?php echo $title ?></a></h6>
            <?php } else {?>
                <h6 class="text-red mb-4"><a href="<?php echo get_category_link($category_term->term_id); ?>"><?php echo $category_term->name; ?></a></h6>
            <?php } ?>
			<!-- Blog-->
			<div class="row blog-post">
                <?php
                while ( $get_category_posts->have_posts() ) :
                    $get_category_posts->the_post(); 
                
                ?>
				<div class="col-md-6 col-lg-4">
					<article>
                        <figure class="entry-media">
                            <?php if( has_post_thumbnail() ){?>
                                <img class="lozad" src="assets/images/home-1/10-lqip.jpg" data-src="<?php the_post_thumbnail_url();?>" alt="Entry Image"/>
                            <?php } ?>
                        </figure>
                        <div class="entry-content-wrapper">
                            <header class="entry-header">
                                <div class="entry-meta-top">
                                    <span class="entry-author"><i class="far fa-user"></i><?php esc_attr(the_author()) ?></span>
                                    <span class="entry-meta-date"><i class="far fa-clock"></i><?php the_time('F j, Y'); ?></span>    
                                </div>
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </header>
                        </div>
					</article>
                </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
			</div>
            <!-- End Blog-->
			<div class="text-center align-items-center"><a class="btn btn-light" href="<?php echo get_category_link($category_term->term_id); ?>">View More</a></div>
        <?php 
        echo $after_widget.'<!-- end .widget-Box-box -->';
    }
}