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