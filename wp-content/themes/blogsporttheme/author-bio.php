<div class="author-avatar">
	<?php echo get_avatar(get_the_author_meta('ID')) ?>
</div>
<div class="author-bio">
	<h3><?php print_author_link(); ?></h3>
	<p><?php echo get_the_author_meta('description') ?></p>
</div>