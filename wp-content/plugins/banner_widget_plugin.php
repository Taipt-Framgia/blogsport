<?php 
/*
Plugin Name: Banner Widget
Plugin URI: http://google.com
Description: Dev by taipt -  framgia
Author: Taipt91
Version: 1.0
Author URI: localhost/wordpress
*/
function create_banner_widget() {
	register_widget('Banner_Widget');
}

add_action('widgets_init','create_banner_widget');

/**
* 
*/
class Banner_Widget extends WP_Widget
{
	
	function __construct() {
		parent::__construct(
			'banner-widget', 
			__('Banner Widget','taipt91'), array(
				'description' => __('This is banner widget','taipt91')
				)
			);
	}

	function form($instance) {
		$defaults = array (
			'banner_url' => 'http://placehold.it/300x300',
			);
		$instance = wp_parse_args( (array)$instance, $defaults );
		$banner_url = esc_attr( $instance['banner_url'] );
		echo '<p> Banner URL: <input type="url" class="widefat" name="'.$this->get_field_name('banner_url').'" value="'.$banner_url.'"/></p>';
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['banner_url'] = strip_tags($new_instance['banner_url']);
		//$instance['post_number'] = strip_tags($new_instance['post_number']);
		return $instance;

	}

	function widget($args, $instance) {
		extract($args);
		$url = $instance['banner_url'];
		echo $before_widget;
		echo $before_title.'ADS'.$after_title;
		echo '<img src="'.$url.'" alt="Banner Image">';
		echo $after_widget;
	}
}