<?php

// Preview Check
function envo_multipurpose_is_preview() {
	$compare_url = 'https://wp-themes.com/';
	$current_url = home_url( '/' );
	if ( $compare_url === $current_url ) { 
		return true; 
	} else { 
		return false;
	};
}

// Random Images
function envo_multipurpose_get_preview_img_src( $i = 0 ) {
	// prevent infinite loop
	if ( 6 == $i ) {
		return '';
	}

	$path = get_template_directory() . '/img/demo/';

	// Build or re-build the global dem img array
	if ( !isset( $GLOBALS[ 'envo_multipurpose_preview_images' ] ) || empty( $GLOBALS[ 'envo_multipurpose_preview_images' ] ) ) {
		$imgs		 = array( 'image_1.jpg', 'image_2.jpg', 'image_3.jpg', 'image_4.jpg', 'image_5.jpg', 'image_6.jpg' );
		$candidates	 = array();

		foreach ( $imgs as $img ) {
			$candidates[] = $img;
		}
		$GLOBALS[ 'envo_multipurpose_preview_images' ] = $candidates;
	}
	$candidates	 = $GLOBALS[ 'envo_multipurpose_preview_images' ];
	// get a random image name
	$rand_key	 = array_rand( $candidates );
	$img_name	 = $candidates[ $rand_key ];

	// if file does not exists, reset the global and recursively call it again
	if ( !file_exists( $path . $img_name ) ) {
		unset( $GLOBALS[ 'envo_multipurpose_preview_images' ] );
		$i++;
		return envo_multipurpose_get_preview_img_src( $i );
	}

	// unset all sizes of the img found and update the global
	$new_candidates = $candidates;
	foreach ( $candidates as $_key => $_img ) {
		if ( substr( $_img, 0, strlen( "{$img_name}" ) ) === "{$img_name}" ) {
			unset( $new_candidates[ $_key ] );
		}
	}
	$GLOBALS[ 'envo_multipurpose_preview_images' ] = $new_candidates;
	return get_template_directory_uri() . '/img/demo/' . $img_name;
}

// Featured Images
function envo_multipurpose_preview_thumbnail( $input ) {
	if ( empty( $input ) && envo_multipurpose_is_preview() ) {
		$placeholder = envo_multipurpose_get_preview_img_src();
		return '<img src="' . esc_url( $placeholder ) . '" class="attachment wp-post-image">';
	}
	return $input;
}

add_filter( 'post_thumbnail_html', 'envo_multipurpose_preview_thumbnail' );

// Widgets
function envo_multipurpose_preview_right_sidebar() {
	the_widget( 'Envo_Multipurpose_Extended_Recent_Posts', 'title=' . esc_html__( 'Recent posts', 'envo-multipurpose' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries">&after_widget=</div>' );
	the_widget( 'WP_Widget_Search', 'title=' . esc_html__( 'Search', 'envo-multipurpose' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_search">&after_widget=</div>' );
	the_widget( 'WP_Widget_Archives', 'title=' . esc_html__( 'Archives', 'envo-multipurpose' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_archive">&after_widget=</div>' );
	the_widget( 'WP_Widget_Categories', 'title=' . esc_html__( 'Categories', 'envo-multipurpose' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_categories">&after_widget=</div>' );
}
// Footer Widgets
function envo_multipurpose_preview_footer_area() {
	the_widget( 'Envo_Multipurpose_Extended_Recent_Posts', 'title=' . esc_html__( 'Recent posts', 'envo-multipurpose' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_recent_entries col-md-3">&after_widget=</div>' );
	the_widget( 'WP_Widget_Archives', 'title=' . esc_html__( 'Archives', 'envo-multipurpose' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_archive col-md-3">&after_widget=</div>' );
	the_widget( 'WP_Widget_Categories', 'title=' . esc_html__( 'Categories', 'envo-multipurpose' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_categories col-md-3">&after_widget=</div>' );
	the_widget( 'WP_Widget_Search', 'title=' . esc_html__( 'Search', 'envo-multipurpose' ), 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div class="widget widget_search col-md-3">&after_widget=</div>' );
}

// Main Menu
function envo_multipurpose_preview_navigation() {
	$pages	 = get_pages();
	$i		 = 0;
	foreach ( $pages as $page ) {
		if ( ++$i > 6 )
			break;
		$menu_name	 = esc_html( $page->post_title );
		$menu_link	 = get_page_link( $page->ID );

		if ( get_the_ID() == $page->ID ) {
			$current_class = " current_page_item current-menu-item active";
		} else {
			$current_class = '';
		}

		$menu_class = "page-item-" . $page->ID;
		echo "<li class='page_item " . esc_attr( $menu_class ) . esc_attr( $current_class ) ."'><a href='" . esc_url( $menu_link ) . "'>" . esc_html( $menu_name ) . "</a></li>";
	}
}
function envo_multipurpose_social_navigation() {
	$pages	 = array( 'twitter', 'facebook', 'youtube', 'linkedin');
	$i		 = 0;
	foreach ( $pages as $page ) {
		if ( ++$i > 3 )
			break;
		$menu_name	 = esc_html( $page );

		$menu_class = "page-item-" . $menu_name;
		echo "<li class='menu-item page_item " . esc_attr( $menu_class ) . "'><a href='https://" . esc_attr( $menu_name ) . ".com'>" . esc_html( $menu_name ) . "</a></li>";
	}
}

function envo_multipurpose_home_widgets() {
	
	$envo_text = esc_html__( 'Envo Multipurpose theme', 'envo-multipurpose' );
	$envo_sub = sprintf( esc_html__( 'Get started with %s', 'envo-multipurpose' ), __( 'Envo Multipurpose theme', 'envo-multipurpose' ) );
	$readmore = esc_html__( 'Read more', 'envo-multipurpose' );
	$from_blog = esc_html__( 'Recent posts', 'envo-multipurpose' );
	$from_blog_sub = esc_html__( 'From our blog', 'envo-multipurpose' );
	$about_us = esc_html__( 'About us', 'envo-multipurpose' );
	$about_us_sub = esc_html__( 'Who we are', 'envo-multipurpose' );

	if ( !is_active_sidebar( 'envo-multipurpose-homepage-area' ) || envo_multipurpose_is_preview() ) {
				the_widget( 'Envo_Multipurpose_Content_Widget_Static_Content', 'title=' . $envo_text . '&subtitle=' . $envo_sub . '&page=&padding_top=160&padding_bottom=160&button_link=#&button_text=' . $readmore . '&youtube_id=17oalZcdEGs&text_color=#fff', 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div id="envo-multipurpose-widget-static-content--1" class="widget envo-multipurpose-widget-static-content">&after_widget=</div>' );
				the_widget( 'Envo_Multipurpose_Content_Widget_Services', 'title=&padding_top=0&padding_bottom=0', 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div id="envo-multipurpose-content-widget-services--1" class="widget envo-multipurpose-content-widget-services">&after_widget=</div>' );
				the_widget( 'Envo_Multipurpose_Content_Widget_Static_Content', 'title=' . $about_us . '&subtitle=' . $about_us_sub . '&padding_top=60&padding_bottom=60&heading_style=title-style-1&page=2&text_color=#fff&background_overlay=02&background_color=#000', 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div id="envo-multipurpose-widget-static-content--1" class="widget envo-multipurpose-widget-static-content">&after_widget=</div>' );
				the_widget( 'Envo_Multipurpose_Content_Widget_Static_Content', 'title=' . $envo_text . '&subtitle=' . $envo_sub . '&page=&padding_top=30&padding_bottom=30&button_link=#&button_color=#fff&button_text=' . $readmore . '&text_color=#fff&background_color=#00a0d2', 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div id="envo-multipurpose-widget-static-content--1" class="widget envo-multipurpose-widget-static-content">&after_widget=</div>' );
				the_widget( 'Envo_Multipurpose_Content_Widget_Blog_Posts', 'title=' . $from_blog . '&subtitle=' . $from_blog_sub . '&padding_top=60&padding_bottom=60&heading_style=title-style-1&text_color=#9c9c9c&background_color=#fff', 'before_title=<div class="widget-title"><h3>&after_title=</h3></div>&before_widget=<div id="envo-multipurpose-widget-static-content--1" class="widget envo-multipurpose-widget-static-content">&after_widget=</div>' );
	} 
}
