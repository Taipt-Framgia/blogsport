<?php get_header(); ?>
<div class="content">
	<section id="main-content">
	<div class="not-found">
		<?php
			_e('<h2> 404 NOT FOUND</h2>','taipt91' );
			_e('<p>The article you were looking for was not found.</p>','taipt91');
			?>
		<img src="<?php echo home_url('/').'wp-content/uploads/2016/05/404.jpeg'; ?>" alt="404 not found">
	</div>

	</section>
	
	<section id="sidebar">
		<?php get_sidebar(); ?>
	</section>
</div>
<?php get_footer(); ?>