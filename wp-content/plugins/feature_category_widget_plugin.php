<?php 
/*
Plugin Name: Feature category Plugin Framgia.
Plugin URI: http://google.com.
Author: Taipt Framgia.
Description: show feature category widget.
Version: 1.0
Author URI: localhost/wordpress
*/
function create_feature_category_widget () {
	register_widget('Feature_Category_Widget');
}
add_action('widgets_init','create_feature_category_widget');


class Feature_Category_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
      	parent::__construct(
      		'feature-category-widget',
      		__('Featur Category Widget','taipt91'),
      		array(
      			'description' => __('This is Feature Category Widget','taipt91')
      			)
      		);
    }

    //
    function form( $instance ) {
    	$default = array(
    		'slug' => 'football',
        'number_post' => 3,
    		);

        $instance = wp_parse_args( (array) $instance, $default);
        $slug = esc_attr($instance['slug']);
        $number_post = esc_attr($instance['number_post']);
        echo '<p> Slug of Category: <input type="text" class="widefat" name="'.$this->get_field_name('slug').'" value="'.$slug.'"/></p>';
        echo '<p> Number post per page: <input type="text" class="widefat" name="'.$this->get_field_name('number_post').'" value="'.$number_post.'"/></p>';
    }
    //
    function update( $new_instance, $old_instance ) {

    $instance = $old_instance;
		$instance['slug'] = strip_tags($new_instance['slug']);
    $instance['number_post'] = strip_tags($new_instance['number_post']);
		return $instance;
    }

  
    function widget( $args, $instance ) {
        extract( $args);
        $slug = esc_attr($instance['slug']);
        $number_post = $instance['number_post'];
        echo $before_widget;
        echo $before_title;
        echo 'Feature Category';
        echo $after_title;
        $args_query = array (
          'posts_per_page' => $number_post,
          'category_name' => $slug,
          'order' => 'DESC',
          'orderby' => 'date', 
          );
        $fcat_query = new WP_Query($args_query);
        if ($fcat_query->have_posts()):?>
          <div class="feature-category-container">
            <?php while ($fcat_query->have_posts()) :?>
               <?php $fcat_query->the_post();?>
                  <div class="media">
                    <div class="media-left media-middle">
                      <a href="<?php the_permalink();?>">
                        <?php if (has_post_thumbnail()): ?>
                        <?php echo the_post_thumbnail(array(64,64)); ?>
                        <?php else: ?>
                         <img src="http://placehold.it/64x64">
                        <?php endif; ?>
                      </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <p><?php printf(__(get_the_date().' . '.get_comments_number().' Comments','taipt91')) ?></p>
                    </div>
                  </div>
              <?php endwhile;?>
            </div>
          <?php endif; 
        echo $after_widget;
    }
}
