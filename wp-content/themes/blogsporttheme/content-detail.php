<article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	<div class="w3-card-4 entry-post">
	  	<div class="w3-container post-content">
		  	<div class="custom-breadscrumb">
		  		<ol class="breadcrumb">
		  			<li><a href="#">Home /</a></li>
		  			<?php echo get_the_category_list(' / 	'); ?>
		  		</ol>
		  	</div>
	    	<h3 class="post-header"><b><?php the_title(); ?></b></h3>
	    	<p class="entry-meta">
	    		<?php 
	    			printf(__('By <a href="%1$s">%2$s</a> at %3$s in %4$s','taipt91'),
	    				get_author_posts_url(get_the_author_meta('ID')),
	    				get_the_author(), 
	    				get_the_date(), 
	    				get_the_category_list(' , ')); 
	    			?>
	    	</p>
	    	<p class="entry-content"><?php the_content(); ?></p>
	  	</div>
	  	<div class="social-content">
	  		
	  	</div>
	</div>
</article>

<div class="author-box single">
	<h3><?php _e('Author Infomation','taipt91'); ?></h3>
	<div class="author-content section-css">
		<?php get_template_part('author-bio')?>
	</div>
</div>

<div class="relate-post">
		<h3><?php _e('Relate Post','taipt91'); ?></h3>
		<div class="relate-post-content section-css">
			<?php do_action('relate_hook')?>
		</div>
</div>
