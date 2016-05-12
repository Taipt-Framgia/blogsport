<?php get_header(); ?>
<div class="content">
	<section id="main-content">
		<div class="search-info">
			<?php
				$args_query = array (
					's' => $s,
					'posts_per_page' => -1,
					'post_type' => array('post'),
					);
				$search_query = new WP_Query($args_query);
				$search_keyword = _wp_specialchars($s,1 );	
				$search_count = $search_query->post_count;
				printf(__('Search result for <strong>%1$s</strong>. We found <strong>%2$s</strong> articles for you','taipt91'),$search_keyword,$search_count);
			 ?>
		</div>
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<?php get_template_part('content',get_post_format()); ?>
		<?php endwhile; ?>
		<?php custom_pagination(); ?>
		<?php else :?>
			<?php get_template_part('content', 'none'); ?>
		<?php endif; ?>
	</section>

	<section id="sidebar">
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>