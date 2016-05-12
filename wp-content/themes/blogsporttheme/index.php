<?php get_header(); ?>
<div class="content">
	<section id="main-content">
		<div class="newest-post">
			<?php //do_action('carousel_hook',2,3); ?>
		</div>
		<div class="lastest-post">
			<h2><?php _e('Lastest','taipt91'); ?></h2>
			<?php 
				if( have_posts()) : 
					while( have_posts()) : 
						the_post();
						get_template_part('content',get_post_format());
					endwhile;?>
					<div><?php custom_pagination(); ?>
					</div>
				<?php else :
						get_template_part('content','none');
				endif; 
					?>

		</div>
	</section> 
	
	<section id="sidebar">
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>

