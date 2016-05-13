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
	function add_carousel($id,$number) {
		$i = 0;
		$args_query = array (
			'posts_per_page' => $number,
			'post_type' => array ('post'),
			'order' => 'DESC',
			'orderby' => 'rand');
		$my_query = new WP_Query($args_query);
		if($my_query->have_posts()) : ?>
			<div id="carousel-sticky-posts-<?php echo $id;?>" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php while ($my_query->have_posts()) :?>
					<?php $my_query->the_post(); ?>
						<li class="" data-target="#carousel-sticky-posts-<?php echo $id;?>" data-slide-to="<?php echo $i++; ?>"></li>
					<?php endwhile; ?>
				</ol>

				<div class="carousel-inner" role="listbox">
					<?php while( $my_query->have_posts()) :?>
					<?php $my_query->the_post(); ?>
						<div class="item" >
							<?php if (has_post_thumbnail()): ?>
	  								<?php the_post_thumbnail('full'); ?>
	  						<?php else: ?>
	  							<img src="http://placehold.it/1200x600">
	  						<?php endif; ?>
							<div class="carousel-caption">
								<?php if($id==1) :?>
								<h3><?php the_title(); ?></h3>
							<?php else : ?>
								<h4><?php the_title(); ?></h4>
							<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>
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

		<?php
		else :
			do_action('default_carousel_hook');
		endif;
	}
}
add_action('carousel_hook','add_carousel',10,2);

if (! function_exists('default_carousel')) {
	function default_carousel($id) {?>
		<div id="carousel-sticky-posts-<?php echo $id;?>" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li class="active" data-target="#carousel-sticky-posts-<?php echo $id;?>" data-slide-to="0"></li>
				<li class="" data-target="#carousel-sticky-posts-<?php echo $id;?>" data-slide-to="1"></li>
				<li class="" data-target="#carousel-sticky-posts-<?php echo $id;?>" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner" role="listbox">
				<div class="item active" >
					<img src="http://placehold.it/1200x600" alt="">
					<div class="carousel-caption">
						0
					</div>
				</div>

				<div class="item">
					<img src="http://placehold.it/1200x600" alt="">
					<div class="carousel-caption">
						1
					</div>
				</div>

				<div class="item">
					<img src="http://placehold.it/1200x600" alt="">
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
add_action('default_carousel_hook','default_carousel',10,1);


//add relate
if (! function_exists('add_relate')) {
	function add_relate() {
		$args_query = array (
			'posts_per_page' => 3,
			'order' => 'ASC',
			'orderby' => 'rand',
			'author' => get_the_author_meta('ID')
			);
		$relate_query = new WP_Query($args_query); 
		if ($relate_query->have_posts()):?>
			<div >
			<?php while ($relate_query->have_posts()): ?>
				<?php $relate_query->the_post(); ?>
				<div class="col-md-4">
		    		<div class="thumbnail">
		    			<a href="<?php the_permalink(); ?>">
		    			<?php if (has_post_thumbnail()): ?>
	  					<?php the_post_thumbnail(array(200,100)); ?>
	  					<?php else: ?>
	  						<img src="http://placehold.it/200x100">
	  					<?php endif; ?>
	  					</a>
	  					<p class="entry-category"><?php
											$category = get_the_category();
											printf('<a href="%1$s" >%2$s</a>',get_category_link($category[0]->term_id),$category[0]->cat_name);
											?>
						</p>
		      			<div class="caption">
		        			<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		        			<p><?php echo __('By ','taipt91'); 
		        					 print_author_link();?>
		        			</p>
		        			<p><?php echo get_the_date(); ?></p>
		      			</div>
		    		</div>
		  		</div>
		  	<?php endwhile; ?>
		  	</div>
		 <?php endif; 
		 wp_reset_query();
		 ?>

	<?php }		
}
add_action('relate_hook','add_relate');
//print author link
if(! function_exists('print_author_link')) {
	function print_author_link() {
		printf('<a href="%1$s">%2$s</a>',
						get_author_posts_url(get_the_author_meta("ID")),
						get_the_author());
	}
}
//custom pagination
function custom_pagination($query=null) {
	if(isset($query))
		$wp_query = $query;
	else
    	global $wp_query;
    $big = 999999999;
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?page=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => false,
        'type' => 'array',
        'prev_next' => TRUE,
        'prev_text' => __('&larr; Previous','taipt91'),
        'next_text' => __('Next &rarr;','taipt91'),
            ));
    if (is_array($pages)) {
        $current_page = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="pagination">';
        foreach ($pages as $i => $page) {
            if ($current_page == 1 && $i == 0) {
                echo "<li class='active'>$page</li>";
            } else {
                if ($current_page != 1 && $current_page == $i) {
                    echo "<li class='active'>$page</li>";
                } else {
                    echo "<li>$page</li>";
                }
            }
        }
        echo '</ul>';
    }
}