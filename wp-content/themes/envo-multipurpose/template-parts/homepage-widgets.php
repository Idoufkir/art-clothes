<?php if ( is_active_sidebar( 'envo-multipurpose-homepage-area' ) || envo_multipurpose_is_preview() ) { ?>
	<div class="homepage-main-content-page">
		<div class="homepage-area"> 
			<?php
			if ( envo_multipurpose_is_preview() ) {
				envo_multipurpose_home_widgets();
			} elseif  ( is_active_sidebar( 'envo-multipurpose-homepage-area' ) ) {
				dynamic_sidebar( 'envo-multipurpose-homepage-area' );
			}
			?>
		</div>
	</div>
<?php } ?>
