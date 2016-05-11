<?php get_header(); ?>
<?php ?>
<div class="content">
	<section id="main-content">
		<div class="archive-post">
			<h2><?php printf(__('%1$s Archive','taipt91'),single_cat_title('',false)); ?></h2>
			<?php 
				if( have_posts()) : 
					while( have_posts()) : 
						the_post();
						get_template_part('content',get_post_format());
					endwhile;
				else :
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

