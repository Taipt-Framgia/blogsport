<?php 
/*
Plugin Name: Search Widget Plugin Framgia.
Plugin URI: http://google.com.
Author: Taipt Framgia.
Description: search widget.
Version: 1.0
Author URI: localhost/wordpress
*/
function create_search_widget () {
	register_widget('Search_Widget');
}
add_action('widgets_init','create_search_widget');


class Search_Widget extends WP_Widget {

    /**
     * Constructor
     *
     * @return void
     **/
    function __construct() {
      	parent::__construct(
      		'search_widget',
      		'Search Widget',
      		array(
      			'description' => 'This is Search Widget'
      			)
      		);
    }

    //
    function form( $instance ) {
    	$default = array(
    		'title' => 'Search'
    		);

        $instance = wp_parse_args( (array) $instance, $default);
        $title = esc_attr($instance['title']);
        echo '<p> Title: <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
    }
    //
    function update( $new_instance, $old_instance ) {
       	$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
    }

  
    function widget( $args, $instance ) {
        extract( $args);
        $title = apply_filters('widget_title',$instance['title']);
        echo $before_widget;
        echo $before_title;
        echo $title;
        echo $after_title;?>
        <form class="form-inline search-form">
    		<input type="text" class="form-control" id="exampleInputEmail2" placeholder="">
  			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
		</form>
    	<?php echo $after_widget;
    }
}
