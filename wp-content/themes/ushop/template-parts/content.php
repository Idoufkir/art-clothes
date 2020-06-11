<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ushop
 *
 */
$blog_layout = get_theme_mod( 'blog_layout', 'default' );
if ( $blog_layout == 'default' ){
	$col[] = 'col-lg-12 hover-images default-posts pl-0 pr-0';
} elseif ( $blog_layout == 'two-column' ) {
	if( ! is_single() ){
		$col[] = 'col-lg-6 hover-images two-columns-post';
	}
} elseif ( $blog_layout == 'three-column' ) {
	$col[] = 'col-lg-4 hover-images three-column-posts';
}

$col[] = 'mb-5 hentry blog-fix col-12';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $col ); ?>>
	<?php
	if ( true == get_theme_mod( 'blog_featured_image', true ) ) :
		ushop_post_thumbnail();
	endif;
	?>
	<header class="entry-header">
		<?php
		the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );

		if ( 'post' === get_post_type() && true == get_theme_mod( 'blog_post_meta', true )  ) : ?>
			<div class="entry-meta mb-3">
				<?php ushop_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
	</header><!-- .entry-header -->

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

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more"><?php esc_html_e( 'read more', 'ushop' )?> &rarr;</a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->