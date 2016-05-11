<?php 
//define constant for theme.
define('THEME_DIR', get_stylesheet_directory());
define('CORE', THEME_DIR.'/core');
require_once(CORE.'/init.php');


// if(!isset($content_width)){
// 	$content_width = 620;
// }
//function setting up themme
if(!function_exists('theme_setup')){
	function theme_setup(){

	$language_folder = THEME_DIR.'/languages';
	load_theme_textdomain('taipt91',$language_folder);

	add_theme_support('automatic-feed-links');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	add_theme_support('post-formats',
		array(
			)
		);

	register_nav_menu('top-menu',__('Top Menu','taipt91'));

	$sidebar = array(
		'name' => __('Right Sidebar','taipt91'),
		'id' => 'right-sidebar',
		'description' => __('This is right sidebar','taipt91'),
		'class' => 'right-sidebar',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>'
		);
	register_sidebar($sidebar );
	}
	add_action('init','theme_setup');
}
//register style, script file
function insert_styles(){
	wp_register_style('main-style',get_template_directory_uri().'/style.css','all');
	wp_enqueue_style('main-style');

	wp_register_style('bootstrap-css',get_template_directory_uri().'/css/bootstrap/css/bootstrap.min.css','all');
	wp_enqueue_style('bootstrap-css');
	wp_register_script('bootstrap-js',get_template_directory_uri().'/js/bootstrap/js/bootstrap.min.js',array('jquery'));
	wp_enqueue_script('bootstrap-js');

	wp_register_style('superfish-css',get_template_directory_uri().'/css/superfish/css/superfish.css','all');
	wp_enqueue_style('superfish-css');

	wp_register_script('superfish-js',get_template_directory_uri().'/js/superfish/js/superfish.js',array('jquery'));
	wp_enqueue_script('superfish-js');
	wp_register_script('custom-js',get_template_directory_uri().'/js/custom/custom.js',array('jquery'));
	wp_enqueue_script('custom-js');

	// wp_register_style('w3-css',get_template_directory_uri().'/css/w3/w3.css','all');
	// wp_enqueue_style('w3-css');
}
add_action('wp_enqueue_scripts','insert_styles');
//add top menu
if (! function_exists('add_site_menu')) {
	function add_site_menu($slug) {
		$menu =  array(
			'theme_location' => $slug,
			'container' =>  'nav',
			'container_class' => $slug,
			'items_wrap' =>  '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>',
			);
		wp_nav_menu($menu );
	}
}
//read more
function post_readmore() {
	return '...<a class="read-more" href="'.get_the_permalink(get_the_ID()). '"> '.__('Read more','taipt91').'</a>';
}	
add_filter('excerpt_more','post_readmore');
//add carousel
if (! function_exists('add_carousel')) {
	function add_carousel($id) {?>

		<div id="carousel-sticky-posts-<?php echo $id;?>" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li class="active" data-target="#carousel-sticky-posts-<?php echo $id;?>" data-slide-to="0"></li>
				<li class="" data-target="#carousel-sticky-posts-<?php echo $id;?>" data-slide-to="1"></li>
				<li class="" data-target="#carousel-sticky-posts-<?php echo $id;?>" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner" role="listbox">
				<div class="active item" >
					<img src="http://www.imag.de/images/10_welt_startseite.png" alt="">
					<div class="carousel-caption">
						0
					</div>
				</div>

				<div class="item">
					<img src="http://www.imag.de/images/10_welt_startseite.png" alt="">
					<div class="carousel-caption">
						1
					</div>
				</div>

				<div class="item">
					<img src="http://www.imag.de/images/10_welt_startseite.png" alt="">
					<div class="carousel-caption">
						2
					</div>
				</div>
			</div>

			<a class="left carousel-control" href="#carousel-sticky-posts-<?php echo $id;?>" role="botton" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<a class="right carousel-control" href="#carousel-sticky-posts-<?php echo $id;?>" role="botton" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	<?php }
}
add_action('carousel_hook','add_carousel',10,1);

//add relate
if (! function_exists('add_relate')) {
	function add_relate() {
		echo '<h3>This is relate post place</h3>';
	}
}
add_action('relate_hook','add_relate');