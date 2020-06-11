<?php
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
/**
 * Gallery WC Support
 */
function ushop_gallery_thumns_wc_support() {

    add_theme_support( 'woocommerce', array(
        'gallery_thumbnail_image_width' => 600,
    ) );
    add_theme_support( 'wc-product-gallery-lightbox' );
}
add_action( 'after_setup_theme', 'ushop_gallery_thumns_wc_support' );
/**
 * Remove cross-sells at cart
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
/**
 * Remove all WC styling
 */
function ushop_woocommerce_styling_deregister() {
    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
}
add_action( 'wp', 'ushop_woocommerce_styling_deregister' );

/**
 * @param $classes
 * @return array
 * add product category name to post class
 */
function ushop_category_id_class( $classes ) {
    global $post;
    $product_cats = get_the_terms( $post->ID, 'product_cat' );
    if( $product_cats ) foreach ( $product_cats as $category ) {
        $classes[] = 'product-layout-fix ushop-product';
    }
    return $classes;
}
add_filter( 'post_class', 'ushop_category_id_class' );

/**
 * Remove breadcrumbs
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

/**
 * Opening div for our content wrapper
 */
add_action('woocommerce_before_main_content', 'ushop_open_div', 5);

function ushop_open_div() {
    $col12 = 'col-lg-9 col-md-12 ';
    echo '<div class="'.$col12.' col-12 archive-woo margin-top text" >';
}

/**
 * Closing div for our content wrapper
 */
add_action('woocommerce_after_main_content', 'ushop_close_div', 50);

function ushop_close_div() {
    echo '</div>';
}

/**
 * Added Row
 */
add_action( 'woocommerce_before_single_product_summary', 'ushop_product_wrapper_start', 1 );
function ushop_product_wrapper_start() {
    echo '<div class="row">';
}
add_action( 'woocommerce_after_single_product_summary', 'ushop_product_wrapper_end', 1 );
function ushop_product_wrapper_end() {
    echo '</div>';
}

/**
 * Single Product
 * Added classes in product images
 */
add_action( 'woocommerce_before_single_product_summary', 'ushop_product_images_start', 1 );
function ushop_product_images_start() {
    $single_product_gallery_layout = get_theme_mod( 'single_product_gallery_layout', 'default' );
    echo '<div class="col-lg-6 col-sm-6 col-12 margin-top single-product-images ushop-thumb-images-'. $single_product_gallery_layout .'">';
}

/**
 * Single Product
 * Added classes in product description
 */
add_action( 'woocommerce_before_single_product_summary', 'ushop_product_summary_start', 999 );
function ushop_product_summary_start() {
    echo '</div>';
    echo '<div class="col-lg-6 col-sm-6 col-12 single-product-summary margin-top">';
}
add_action( 'woocommerce_after_single_product_summary', 'ushop_product_summary_end', 0 );
function ushop_product_summary_end() {
    echo '</div>';
}


/**
 * Single gallery thumbs navigation
 */
add_action( 'woocommerce_before_single_product_summary', 'ushop_single_gallery_query', 21 );
function ushop_single_gallery_query() { ?>
    <div class="product-thumbs">
        <?php
        global $product, $post;
        $gallery_ids = $product->get_gallery_image_ids();
        $post_id = $post -> ID;
        $post_thumb = get_post_thumbnail_id( $post_id );
        echo '<div class="slick-slide">' . wp_get_attachment_image( $post_thumb, 'medium' ) . '</div>';
        foreach( $gallery_ids as $gallery_id ) {
            echo '<div class="slick-slide">' . wp_get_attachment_image( $gallery_id, 'medium' ) . '</div>';
        }
        ?>
    </div>
    <?php
}
/**
 * Change number or products per Columns to 3
 */
add_filter('loop_shop_columns', 'ushop_loop_columns');
if (!function_exists('loop_columns')) {
    function ushop_loop_columns() {
        $archive_product_columns = get_theme_mod( 'archive_product_columns', '3' );
        return $archive_product_columns; // 3 products per row
    }
}

/**
 * Number of products on Shop/Archive
 */
add_filter( 'loop_shop_per_page', 'ushop_loop_shop_per_page', 20 );
function ushop_loop_shop_per_page( $archive_product_number ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    $archive_product_number = get_theme_mod( 'archive_product_number', '9' );
    return $archive_product_number;
}

/**
 * Hide Product Price
 */
if ( true == get_theme_mod( 'archive_hide_price' )  ) {
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
}

/**
 * Hide Product Ratings
 */
if( true == get_theme_mod( 'archive_hide_ratings' ) ){
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
}

/**
 * Hide Up Sells
 */
if( true == get_theme_mod( 'single_product_hide_upsells' ) ) {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
}

/**
 * Hide Meta
 */
if( true == get_theme_mod( 'single_product_hide_meta' ) ) {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
}

/**
 * Remove breadcrumbs
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

/**
 *  Quantity Increase Decrease
 */
add_action( 'woocommerce_single_product_summary', 'ushop_quantity_buttons', 30 );
function ushop_quantity_buttons() { ?>
    <a href="#" class="qty-plus q-add qty-fix"><i class="ion-plus"></i></a>
    <a href="#" class="qty-minus q-min qty-fix"><i class="ion-minus"></i></a>
<?php }

/**
 * Update mini-cart when products are added to the cart via AJAX
 */
add_filter( 'woocommerce_add_to_cart_fragments', function( $fragments ) {
    ob_start();
    ?>
    <div class="mini-cart-fix">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['div.mini-cart-fix'] = ob_get_clean();
    return $fragments;
} );

/**
 * Update contents count via AJAX
 */
add_filter('woocommerce_add_to_cart_fragments', 'ushop_header_add_to_cart_fragment');
function ushop_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="ion-bag"></i><span><?php echo sprintf(_n(' %d', ' %d', $woocommerce->cart->cart_contents_count, 'ushop'), $woocommerce->cart->cart_contents_count ); ?></span></a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}