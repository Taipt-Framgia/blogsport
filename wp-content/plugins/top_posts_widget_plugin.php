<?php 
/*
Plugin Name: Top Posts Plugin Framgia.
Plugin URI: http://google.com.
Author: Taipt Framgia.
Description: show feature category widget.
Version: 1.0
Author URI: localhost/wordpress
*/
function create_top_posts_widget () {
	register_widget('Top_Posts_Widget');
}
add_action('widgets_init','create_top_posts_widget');


class Top_posts_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
      	parent::__construct(
      		'top-posts-widget',
      		__('Top Posts Widget','taipt91'),
      		array(
      			'description' => __('This is Top Posts Widget','taipt91')
      			)
      		);
    }

    //
    function form( $instance ) {
    	$default = array(
    		'title' => 'Top Posts',
        'number_post' => 3,
    		);

        $instance = wp_parse_args( (array) $instance, $default);
        $title = esc_attr($instance['title']);
        $number_post = esc_attr($instance['number_post']);
        echo '<p> Title: <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
        echo '<p> Number post per page: <input type="text" class="widefat" name="'.$this->get_field_name('number_post').'" value="'.$number_post.'"/></p>';
    }
    //
    function update( $new_instance, $old_instance ) {

    $instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
    $instance['number_post'] = strip_tags($new_instance['number_post']);
		return $instance;
    }

  
    function widget( $args, $instance ) {
        extract( $args);
        $order =1;
        $title = esc_attr($instance['title']);
        $number_post = $instance['number_post'];
        echo $before_widget;
        echo $before_title;
        echo $title;
        echo $after_title;
        $args_query = array (
          'posts_per_page' => $number_post,
          'order' => 'DESC',
          'orderby' => 'comment_count', 
          );
        $fcat_query = new WP_Query($args_query);
        if ($fcat_query->have_posts()):?>
          <div class="top-posts-container">
            <?php while ($fcat_query->have_posts()) :?>
               <?php $fcat_query->the_post();?>
                  <div class="media">
                    <div class="media-left media-middle">
                        <h1><?php echo $order++; ?></h1>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <p><?php printf(__(get_comments_number().' Comments'),'taipt91') ?></p>
                    </div>
                  </div>
              <?php endwhile;?>
            </div>
          <?php endif; 
        echo $after_widget;
    }
}
