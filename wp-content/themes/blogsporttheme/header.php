<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset' ); ?>" />
	<link rel="profile" href="http://localhost/wordpress" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url') ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<nav class="menu"><?php add_site_menu('top-menu'); ?></nav>
	<section id="carousel">
		<div id="carousel-sticky-posts" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li class="active" data-target="#carousel-sticky-posts" data-slide-to="0"></li>
				<li class="" data-target="#carousel-sticky-posts" data-slide-to="1"></li>
				<li class="" data-target="#carousel-sticky-posts" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner" role="listbox">
				<div class="active item" >
					<img src="http://www.imag.de/images/10_welt_startseite.png" alt="">
					<div class="carousel-caption">
						0
					</div>
				</div>

				<div class="item">
					<img src="http://www.imag.de/images/10_welt_startseite.png" alt="">
					<div class="carousel-caption">
						1
					</div>
				</div>

				<div class="item">
					<img src="http://www.imag.de/images/10_welt_startseite.png" alt="">
					<div class="carousel-caption">
						2
					</div>
				</div>
			</div>

			<a class="left carousel-control" href="#carousel-sticky-posts" role="botton" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<a class="right carousel-control" href="#carousel-sticky-posts" role="botton" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		

			
	</section>
	<div class="container">
		
