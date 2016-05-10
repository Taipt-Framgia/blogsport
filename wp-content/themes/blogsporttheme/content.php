<article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	<div class="w3-card-4 entry-post">
  		<a href="<?php the_permalink();?>">
	  		<?php if (has_post_thumbnail()): ?>
	  		<?php echo '<img href="'.the_post_thumbnail('thumbnail').'">'; ?>
	  		<?php else: ?>
	  			<img src="http://placehold.it/400x200">
	  		<?php endif; ?>
  		</a>
	  	<div class="w3-container post-content">
	  		<p class="entry-category"><?php echo get_the_category_list(' , '); ?></p>
	    	<h4 class="post-header"><a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a></h4>
	    	<p class="entry-meta">
	    		<?php 
	    			printf(__('By <a href="%1$s">%2$s</a> at %3$s','taipt91'),
	    				get_author_posts_url(get_the_author_meta('ID')),
	    				get_the_author(), 
	    				get_the_date()); 
	    			?>
	    	</p>
	    	<p class="entry-content"><?php the_excerpt(); ?></p>
	    	
	  	</div>
	</div>
</article>