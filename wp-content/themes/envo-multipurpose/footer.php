</div><!-- end main-container -->
</div><!-- end page-area -->
<?php if ( is_active_sidebar( 'envo-multipurpose-footer-area' ) || envo_multipurpose_is_preview() ) { ?>  				
	<div id="content-footer-section" class="container-fluid clearfix">
		<div class="container">
			<?php 
			if ( envo_multipurpose_is_preview() ) {
				envo_multipurpose_preview_footer_area();
			} else {
				dynamic_sidebar( 'envo-multipurpose-footer-area' );
			}
			?>
		</div>	
	</div>		
<?php } ?>
<?php do_action( 'envo_multipurpose_before_footer' ); ?> 
<footer id="colophon" class="footer-credits container-fluid">
	<div class="container">
		<?php do_action( 'envo_multipurpose_generate_footer' ); ?> 
	</div>	
</footer>
</div><!-- end page-wrap -->
<?php do_action( 'envo_multipurpose_after_footer' ); ?>
<?php if ( is_active_sidebar( 'envo-multipurpose-menu-area' ) || envo_multipurpose_is_preview() ) { ?>
	<div id="site-menu-sidebar" class="offcanvas-sidebar" >
		<div class="offcanvas-sidebar-close">
			<i class="fa fa-times"></i>
		</div>
		<?php
		if ( envo_multipurpose_is_preview() ) {
			envo_multipurpose_preview_right_sidebar();
		} else {
			dynamic_sidebar( 'envo-multipurpose-menu-area' );
		}
		?>
	</div>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>
