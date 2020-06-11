<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ushop
 *
 */

$margin[] = 'mb-5 hentry blog-fix';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $margin ); ?>>
	<?php
	if ( true == get_theme_mod( 'single_featured_image', true ) ) :
		ushop_post_thumbnail();
	endif;

	if ( 'post' === get_post_type() && true == get_theme_mod( 'single_post_meta', true ) ) : ?>
		<header class="entry-header">
			<div class="entry-meta mb-3">
				<?php ushop_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<?php
	endif; ?>

	<div class="entry-content">
		<?php
		if ( is_single() ){
			the_content( sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ushop' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		}else{
			the_excerpt();
		}
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ushop' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( true == get_theme_mod( 'single_post_meta', true ) ) : ?>
		<footer class="entry-footer">
			<?php ushop_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->