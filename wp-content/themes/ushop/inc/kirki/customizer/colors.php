<?php
/**
 * Colors
 */
// Primary Color
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'primary_color',
    'label'       => __( 'Primary Color', 'ushop' ),
    'section'     => 'colors',
    'default'     => '#1fc0a0',
    'priority'       => 5,
    'output'      => array(
        array(
            'element' => 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover,button, input[type="button"], input[type="reset"], input[type="submit"],.woocommerce div.product form.cart .button,#add_payment_method .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,.woocommerce .cart .button, .woocommerce .cart input.button,.cat-meta-btn ,.woocommerce-pagination ul li a:hover,.woocommerce-pagination .current,.widget_price_filter .price_slider_amount .button,.woocommerce-store-notice.demo_store,.widget-trending-products .view-all,#back-to-top,.category-filter-wrap .current,.mini-cart-fix .buttons a:hover, .mini-cart-fix .buttons .checkout,.account-login-dropdown a:hover, .account-login-dropdown a:last-child,.cat-meta-count,.treading-products .slick-arrow,.hero-content a',
            'property' => 'background-color',
        ),
        array(
            'element' => 'button, input[type="button"], input[type="reset"], input[type="submit"],.woocommerce div.product form.cart .button,#add_payment_method .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,.woocommerce .cart .button, .woocommerce .cart input.button,.cat-meta-btn ,.widget_price_filter .price_slider_amount .button,a.edit, a.post-edit-link,.mini-cart-fix .buttons a:hover, .mini-cart-fix .buttons .checkout,.account-login-dropdown,.mini-cart-fix .buttons a,.woocommerce ul.products li.product .onsale, .single-product-images .onsale,.treading-products .onsale',
            'property' => 'border-color',
        ),
        array(
            'element' => '.widget-services i',
            'property' => 'color',
        ),
    ),
) );
// Link Color
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'link_color',
    'label'       => __( 'Link Color', 'ushop' ),
    'section'     => 'colors',
    'default'     => '#1fc0a0',
    'priority'       => 20,
    'output'      => array(
        array(
            'element' => 'a,.page-breadcrumb .item-current',
            'property' => 'color',
        ),
    ),
) );
// Link Hover Color
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'link_hover_color',
    'label'       => __( 'Link Hove Color', 'ushop' ),
    'section'     => 'colors',
    'default'     => '#989898',
    'priority'       => 25,
    'output'      => array(
        array(
            'element' => 'a:hover',
            'property' => 'color',
        ),
    ),
) );