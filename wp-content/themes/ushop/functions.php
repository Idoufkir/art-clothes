<?php
/**
 * ushop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ushop
 */

if ( ! function_exists( 'ushop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ushop_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ushop' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ushop_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ushop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ushop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ushop_content_width', 640 );
}
add_action( 'after_setup_theme', 'ushop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ushop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ushop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ushop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s mb-5">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title mb-4">',
		'after_title'   => '</h4>',
	) );

	$args_footer_widgets = array(
		'name'          => __( 'Footer %d', 'ushop' ),
		'id'            => 'footer-widget',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="footer-bottom-widget mb-5 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer-bottom-title mb-4">',
		'after_title'   => '</h4>'
	);
	register_sidebars( 4, $args_footer_widgets );

	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => __( 'WooCommerce', 'ushop' ),
			'id'            => 'woocommerce-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your WooCommerce sidebar.', 'ushop' ),
			'before_widget' => '<div id="%1$s" class="woo-widget mb-5 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="woo-widget-title mb-4">',
			'after_title'   => '</h4>',
		) );
	}
	// SO Plugin
    if ( class_exists( 'SiteOrigin_Widget' ) ) {
        // Register Widgets
        register_widget('uShop_Widget_Services');
        if (class_exists('WooCommerce')) {
            register_widget('uShop_Widget_Trending_Products');
            register_widget('uShop_Widget_Category_Filter');
            register_widget('uShop_Widget_Category_List');
        }
        register_widget('uShop_Widget_Feature_Box');
        register_widget('uShop_Widget_Recent_Blog');
    }
}
add_action( 'widgets_init', 'ushop_widgets_init' );

/**
 * Load Site Origin Bundle
 */
if ( class_exists( 'SiteOrigin_Widget' ) ) {

    require get_template_directory() . '/inc/widgets/widget-services.php';
    require get_template_directory() . '/inc/widgets/widget-treading-products.php';
    require get_template_directory() . '/inc/widgets/widget-category-filter.php';
    require get_template_directory() . '/inc/widgets/widget-category-list.php';
    require get_template_directory() . '/inc/widgets/widget-recent-blog.php';
    require get_template_directory() . '/inc/widgets/widgets.php';

	require get_template_directory() . '/inc/widgets/so-widget.php';

}

/**
 * Elementor widgets
 */
function bring_back_elementor_widgets() {

    if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {
        require get_template_directory() . '/plugin/hero-banner.php';
        require get_template_directory() . '/plugin/services-icon.php';
        require get_template_directory() . '/plugin/treading-products.php';
        require get_template_directory() . '/plugin/product-category-tab.php';
        require get_template_directory() . '/plugin/latest-blog.php';
    }

}
add_action( 'elementor/widgets/widgets_registered', 'bring_back_elementor_widgets' );

/**
 * @param $elements_manager
 * elementor Category Name
 */
function ushop_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'ushop',
        array(
            'title' => __( 'Ushop Widgets', 'ushop' ),
            'icon' => 'fa fa-plug',
        )
    );

}
add_action( 'elementor/elements/categories_registered', 'ushop_elementor_widget_categories' );

/**
 * Scripts and styles for the Page Builder plugin
 */
function ushop_load_pagebuilder_scripts() {

	global  $pagenow;

	if( $pagenow == 'post.php' || $pagenow == 'post-new.php' || $pagenow == 'widgets.php' || $pagenow == 'customize.php' ){
		wp_enqueue_script( 'ushop-chosen', get_template_directory_uri() . '/inc/widgets/admin/js/chosen.jquery.min.js', array('jquery', 'jquery-ui-sortable'), '1.6.2', true );
		wp_enqueue_script( 'ushop-chosen-init', get_template_directory_uri() . '/inc/widgets/admin/js/chosen-init.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_style( 'ushop-chosen-styles', get_template_directory_uri() . '/inc/widgets/admin/css/chosen.min.css', '1.6.2', false );
		wp_enqueue_style( 'ushop-widgets-style', get_template_directory_uri() . '/inc/widgets/admin/css/widgets-style.css', '1.0.0', false );
		wp_enqueue_media();
	}
}
add_action( 'admin_enqueue_scripts', 'ushop_load_pagebuilder_scripts' );

/**
 * Enqueue scripts and styles.
 */
function ushop_scripts() {
	wp_enqueue_style( 'ushop-body-fonts', '//fonts.googleapis.com/css?family=Ubuntu:400');
	wp_enqueue_style( 'ushop-heading-fonts', '//fonts.googleapis.com/css?family=Ubuntu:500');

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.5.2' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array(), '1.8.0' );
	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.min.css', array(), '4.7.0' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'ushop-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ushop-mobile', get_template_directory_uri() . '/css/mobile.css', array(), '1.0' );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.8.0', true );
	wp_enqueue_script( 'jquery-popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.12.5', true );
	wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/js/isotope.pkgd.js', array('jquery'), '3.0.4', true );
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
    wp_enqueue_script( 'ushop-elementor-slider', get_template_directory_uri() . '/js/elementor-slider.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

    wp_enqueue_script( 'ushop-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ushop_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Header Function
 */
require get_template_directory() . '/inc/header/header-function.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/breadcrumb.php';

/**
 * woocommerce support
 */
function ushop_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'after_setup_theme', 'ushop_woocommerce_support' );
/**
 * Load WP Bootstrap Nav Walker file.
 */
if ( ! class_exists( 'WP_Bootstrap_Navwalker' )) {
	require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

/**
 * woocommerce Hook
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load TGM Plugin
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ushop_active_plugins' );

function ushop_active_plugins() {
	$plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => 'kirki Customizer',
			'slug'      => 'kirki',
			'required'  => false,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		)
	);
	tgmpa( $plugins );
}

/**
 * Archive layout
 */
function ushop_archive_layout() {
	$archive_layout = get_theme_mod( 'archive_layout','archive-default' );
	return $archive_layout;
}
/**
 * Product layout
 */
function ushop_product_layout() {
	$product_layout = get_theme_mod( 'single_product_layout','default' );
	return $product_layout;
}

/**
 * Kirki Plugin Admin Notice Dismiss
 */
add_action( 'admin_notices', 'ushop_plugin_dismiss_notice' );
function ushop_plugin_dismiss_notice() {
    $user_id = get_current_user_id();
    if ( !get_user_meta( $user_id, 'ushop_kirki_plugin_dismissed' ) )
        echo '<p><a href="?ushop_kirki_dismissed">'.esc_html( 'Dismiss' ).'</a></p>';
}

add_action( 'admin_init', 'ushop_kirki_plugin_dismissed' );
function ushop_kirki_plugin_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['ushop_kirki_dismissed'] ) )
        add_user_meta( $user_id, 'ushop_kirki_plugin_dismissed', 'true', true );
}