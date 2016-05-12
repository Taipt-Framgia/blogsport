jQuery(document).ready(function(){
	jQuery('nav.top-menu ul.sf-menu').superfish();
});

jQuery(document).ready(function(){
	jQuery('input#submit').on('click',function(ev){
		if(jQuery('textarea#comment').val()=='') {
			ev.preventDefault();
			alert('pls add input');
		}
	});
});
jQuery(document).ready(function(ev) {
	var width = jQuery('.entry-post img').width();
	var height = width/2;
	jQuery('.entry-post img').css('height',height);
});
jQuery(document).ready(function(ev) {
	jQuery('#carousel-sticky-posts-1 .carousel-indicators li:first').addClass('active');
	jQuery('#carousel-sticky-posts-1 .carousel-inner .item:first').addClass('active');
	jQuery('#carousel-sticky-posts-2 .carousel-indicators li:first').addClass('active');
	jQuery('#carousel-sticky-posts-2 .carousel-inner .item:first').addClass('active');
});
