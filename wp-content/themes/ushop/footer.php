<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ushop
 */

?>
<footer id="colophon" class="site-footer footer-layout-<?php echo get_theme_mod( 'footer_columns', 'one' ); ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<div class="row">
					<?php

					if ( get_theme_mod( 'footer_columns' ) == 'four' ) { ?>

						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget' ) ) :
								dynamic_sidebar( 'footer-widget' );
							endif;
							?>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget-2' ) ) :
								dynamic_sidebar( 'footer-widget-2' );
							endif;
							?>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget-3' ) ) :
								dynamic_sidebar( 'footer-widget-3' );
							endif;
							?>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget-4' ) ) :
								dynamic_sidebar( 'footer-widget-4' );
							endif;
							?>
						</div>

						<?php

					} elseif ( get_theme_mod( 'footer_columns' ) == 'three' ) { ?>

						<div class="col-lg-4 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget' ) ) :
								dynamic_sidebar( 'footer-widget' );
							endif;
							?>
						</div>

						<div class="col-lg-4 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget-2' ) ) :
								dynamic_sidebar( 'footer-widget-2' );
							endif;
							?>
						</div>

						<div class="col-lg-4 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget-3' ) ) :
								dynamic_sidebar( 'footer-widget-3' );
							endif;
							?>
						</div>
					<?php } elseif ( get_theme_mod( 'footer_columns' ) == 'two' ) { ?>

						<div class="col-lg-6 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget' ) ) :
								dynamic_sidebar( 'footer-widget' );
							endif;
							?>
						</div>

						<div class="col-lg-4 col-sm-6 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget-2' ) ) :
								dynamic_sidebar( 'footer-widget-2' );
							endif;
							?>
						</div>

					<?php } else { ?>
						<div class="col-lg-12 col-12">
							<?php
							if ( is_active_sidebar( 'footer-widget' ) ) :
								dynamic_sidebar( 'footer-widget' );
							endif;
							?>
						</div>
					<?php } ?>
				</div>
				<div class="site-info text-center">
					<a href="<?php echo esc_url( __( 'https://www.themetim.com/', 'ushop' ) ); ?>">
						<?php
						$copayright = get_theme_mod( 'footer_copyright', 'Ushop powered by themetim' );
						echo esc_html( $copayright );
						?>
					</a>
				</div><!-- .site-info -->
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- .layout -->

<?php wp_footer(); ?>

</body>
</html>