<?php
 if ( is_active_sidebar( 'ls_sidebar' ) ) : ?>
	<ul id="sidebar">
		<?php dynamic_sidebar( 'ls_sidebar' ); ?>
	</ul>
<?php endif;