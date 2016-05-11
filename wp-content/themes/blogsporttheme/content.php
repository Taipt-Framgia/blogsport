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
	    			echo __('By ','taipt91');
	    			print_author_link();
	    			printf(__('at %1$s','taipt91'), 
	    				get_the_date()); 
	    			?>
	    	</p>
	    	<p class="entry-content"><?php the_excerpt(); ?></p>
	    	
	  	</div>
	</div>
</article>