<?php get_header(); ?>
<div class="content">
	<section id="main-content">
		<div class="">
			<?php 
				if( have_posts()) : 
					while( have_posts()) : 
						the_post();
						get_template_part('content','detail');
					endwhile;
				endif;
					?>
		</div>
	</section> 
	
	<section id="sidebar">
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>