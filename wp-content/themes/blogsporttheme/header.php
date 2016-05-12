<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset' ); ?>" />
	<link rel="profile" href="http://localhost/wordpress" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url') ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<nav class="menu content"><?php add_site_menu('top-menu'); ?></nav>
	<section id="carousel">
		<?php //do_action('carousel_hook',1,5); ?>			
	</section>
	<div class="container">
		
