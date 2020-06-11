<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ushop
 */

$blog_layout_tow = get_theme_mod( 'blog_layout', 'default' );
$row = '';
if ( $blog_layout_tow == 'two-column' ) {
	$row = 'row';
}
$col12 = 'col-lg-9 col-md-9  ';
if ( $blog_layout_tow == 'three-column' ) {
	$col12 = 'col-lg-12 col-md-12 ';
	$row = 'row';
}
get_header(); ?>
	<main id="main" class="site-main">
		<div class="container-fluid">
			<div class="row">
				<div class="<?php echo $col12; ?>col-12 margin-top">
					<div class="<?php echo $row; ?>">
						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							?>
							<div class="col-lg-12 mt-4">
								<?php the_posts_navigation(); ?>
							</div>
							<?php

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div>
				</div>
				<?php
				if ( $blog_layout_tow == 'default' || $blog_layout_tow == 'two-column' ) :
					get_sidebar();
				endif; ?>
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();
