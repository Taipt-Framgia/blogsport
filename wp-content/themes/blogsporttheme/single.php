<?php get_header(); ?>
<div class="content">
	<section id="main-content">
		<div class="">
			<?php
				if( have_posts()) :
					while( have_posts()) : the_post();?>
						<?php get_template_part('content','detail');  ?>
						<div class="comment-section section-css">
							<?php comments_template(); ?>
						</div>
					<?php endwhile;?>
				<?php endif; ?>
		</div>
	</section> 
	
	<section id="sidebar">
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>