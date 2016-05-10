<?php
	if ( is_active_sidebar('right-sidebar')) {
		dynamic_sidebar('right-sidebar' );
	} else {
		_e('This is widget area. Go to Appearance -> Widget to add some widget.','translate');
	}
 ?>