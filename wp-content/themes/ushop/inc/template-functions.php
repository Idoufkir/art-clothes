<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ushop
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ushop_body_classes( $classes ) {

	// Adds a class of wide & boxed to site layout
	$site_layout = get_theme_mod( 'site_layout', 'wide' );
	if (  $site_layout == 'wide' ) {
		$classes[] =  "wide";
	}else{
		$classes[] = "boxed";
	}

	// Sticky class
	$sticky_hide = get_theme_mod( 'sticky_hide', 1 );
	if ( $sticky_hide ) {
		$classes[] = 'has_sticky';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of hide-margin-top.
	if ( is_front_page() ) {
		$classes[] = 'hide-margin-top';
	}

	// Adds a class of woo-btn-hover-pages to Product hover.
	if( class_exists( 'WooCommerce' ) ){
		if ( is_woocommerce() || is_cart() ){
			$classes[] = 'woo-btn-hover-pages';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'ushop_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ushop_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ushop_pingback_header' );
