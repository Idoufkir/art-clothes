<?php if ( envo_multipurpose_is_preview() ) { ?>
	<aside id="sidebar" class="col-md-4">
		<?php envo_multipurpose_preview_right_sidebar(); ?>
	</aside>
<?php } else if ( is_active_sidebar( 'envo-multipurpose-right-sidebar' ) ) { ?>
	<aside id="sidebar" class="col-md-4">
		<?php dynamic_sidebar( 'envo-multipurpose-right-sidebar' ); ?>
	</aside>
<?php } ?>
