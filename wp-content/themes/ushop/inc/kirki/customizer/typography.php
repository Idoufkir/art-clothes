<?php
/**
 * Typography
 */
Ushop_Kirki::add_panel('typography_panel', array(
    'priority' => 40,
    'title' => esc_attr__('Typography Settings', 'ushop')
));
// Site Layout Section
Ushop_Kirki::add_section( 'body_typography_section', array(
    'title'          => esc_attr__( 'Body Font Family', 'ushop' ),
    'panel'          => 'typography_panel',
    'priority'       => 10,
) );
// Body Typography
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'typography',
    'settings'    => 'body_typography',
    'label'       => esc_attr__( 'Select Body Font Family', 'ushop' ),
    'section'     => 'body_typography_section',
    'transport'	  => 'auto',
    'default'     => array(
        'font-family'    => 'Ubuntu',
        'variant'        => '400',
        'font-size'      => '14px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'color'          => '#212529',
        'text-transform' => 'none'
    ),
    'priority'    => 10,
    'output'      => array(
        array(
            'element' => 'body',
        ),
        array(
            'element' => '.page-breadcrumb a,body, .search-modal a, .account-login  a, .mini-cart a,.products a,.widget-area, .widget-area a, .so-panel.widget.woocommerce a,.single-product-summary .quantity a,.woocommerce-product-gallery__trigger,.woocommerce-product-rating a,.woocommerce-cart-form a,.entry-footer a,.category-filter-wrap a,.woocommerce-MyAccount-navigation a',
            'property' => 'color',
        ),
    ),
) );
// Site Layout Section
Ushop_Kirki::add_section( 'heading_typography_section', array(
    'title'          => esc_attr__( 'Heading Font Family', 'ushop' ),
    'panel'          => 'typography_panel',
    'priority'       => 10,
) );
// Heading Typography
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'typography',
    'settings'    => 'heading_typography',
    'label'       => esc_attr__( 'Select Heading Font Family', 'ushop' ),
    'section'     => 'heading_typography_section',
    'transport'	  => 'auto',
    'default'     => array(
        'font-family'    => 'Ubuntu',
        'variant'        => '500',
        'color'          => '#212529',
        'text-transform' => 'none'
    ),
    'priority'    => 10,
    'output'      => array(
        array(
            'element' => '.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6',
        ),
    ),
) );
// H1
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'heading_h1',
    'label'       => esc_attr__( 'Font size H1', 'ushop' ),
    'section'     => 'heading_typography_section',
    'default'     => 36,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 16,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.h1, h1',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );
// H2
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'heading_h2',
    'label'       => esc_attr__( 'Font size H2', 'ushop' ),
    'section'     => 'heading_typography_section',
    'default'     => 32,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 16,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.h2, h2',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );
// H3
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'heading_h3',
    'label'       => esc_attr__( 'Font size H3', 'ushop' ),
    'section'     => 'heading_typography_section',
    'default'     => 24,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 16,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.h3, h3',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    )
) );
// H4
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'heading_h4',
    'label'       => esc_attr__( 'Font size H4', 'ushop' ),
    'section'     => 'heading_typography_section',
    'default'     => 20,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.h4, h4',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    )
) );
// H5
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'heading_h5',
    'label'       => esc_attr__( 'Font size H5', 'ushop' ),
    'section'     => 'heading_typography_section',
    'default'     => 16,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 8,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.h5, h5',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    )
) );
// H6
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'heading_h6',
    'label'       => esc_attr__( 'Font size H6', 'ushop' ),
    'section'     => 'heading_typography_section',
    'default'     => 14,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 8,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.h6, h6',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    )
) );