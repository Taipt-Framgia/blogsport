<?php
	printf(__('Written by <a href="%1$s">%2$s</a>','taipt91'),
		get_author_posts_url(get_the_author_meta('ID')),
			get_the_author()); 
 ?>