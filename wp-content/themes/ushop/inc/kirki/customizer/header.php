<?php
/**
 * Header
 */
Ushop_Kirki::add_panel('header_panel', array(
    'priority' => 15,
    'title' => esc_attr__('Header', 'ushop'),
    'description' => esc_attr__('Header General Settings', 'ushop'),
));
/**
 * General Settings
 */
Ushop_Kirki::add_section( 'header_section', array(
    'title'          => esc_attr__( 'General Settings', 'ushop' ),
    'panel'          => 'header_panel',
    'priority'       => 10,
) );
// Layout Settings
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'radio-image',
    'settings'    => 'header_layout_3',
    'label'       => esc_html__( 'Select Header Layout', 'ushop' ),
    'section'     => 'header_section',
    'default'     => 'header-1',
    'priority'    => 10,
    'choices'     => array(
        'header-1'   => get_template_directory_uri() . '/inc/kirki/customizer/img/header-1.png',
        'header-2' => get_template_directory_uri() . '/inc/kirki/customizer/img/header-2.png',
        'header-3'  => get_template_directory_uri() . '/inc/kirki/customizer/img/header-3.png',
    ),
) );
// Header Design Option
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'header_background_color',
    'label'       => __( 'Header Background Color', 'ushop' ),
    'section'     => 'header_section',
    'default'     => '',
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.site-header',
            'property' => 'background-color',
        ),
    ),
) );
// Border Color
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'header_border_color',
    'label'       => __( 'Header Border Color ( Bottom )', 'ushop' ),
    'section'     => 'header_section',
    'default'     => '#eee',
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.site-header',
            'property' => 'border-color',
        ),
    ),
) );
// Border Size
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'header_border_size',
    'label'       => esc_attr__( 'Border Size', 'ushop' ),
    'section'     => 'header_section',
    'default'     => 0,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 0,
        'max'  => 20,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.site-header',
            'property' => 'border-width',
            'units'    => 'px',
        ),
    )
) );
// Padding Top
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'header_padding_top',
    'label'       => esc_attr__( 'Padding Top', 'ushop' ),
    'section'     => 'header_section',
    'default'     => 12,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.site-header',
            'property' => 'padding-top',
            'units'    => 'px',
        ),
    )
) );
// Padding Bottom
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'header_padding_bottom',
    'label'       => esc_attr__( 'Padding Bottom', 'ushop' ),
    'section'     => 'header_section',
    'default'     => 12,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 0,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.site-header',
            'property' => 'padding-bottom',
            'units'    => 'px',
        ),
    )
) );
// Hide search
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'hide_search',
    'label'       => __( 'Hide Search', 'ushop' ),
    'section'     => 'header_section',
    'default'     => '1',
    'priority'    => 10
) );
// Hide Login Register
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'woo_hide_account',
    'label'       => __( 'Hide Login Register', 'ushop' ),
    'section'     => 'header_section',
    'default'     => '1',
    'priority'    => 10,
) );
// Hide Mini Cart
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'woo_hide_cart',
    'label'       => __( 'Hide Cart', 'ushop' ),
    'section'     => 'header_section',
    'default'     => '1',
    'priority'    => 10,
) );
/**
 * Header Content
 */
Ushop_Kirki::add_section( 'header_contents', array(
    'title'          => esc_attr__( 'Header Content', 'ushop' ),
    'panel'          => 'header_panel',
    'priority'       => 20,
) );
Ushop_Kirki::add_section( 'title_tagline', array(
    'title'          => esc_attr__( 'Header Content', 'ushop' ),
    'panel'          => 'header_panel',
    'priority'       => 30,
) );
/**
 * Menu Design
 */
Ushop_Kirki::add_section( 'menu_design', array(
    'title'          => esc_attr__( 'Menu Design', 'ushop' ),
    'panel'          => 'header_panel',
    'priority'       => 40,
) );
// Menu Background Color
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'menu_background_color',
    'label'       => __( 'Menu Background Color', 'ushop' ),
    'section'     => 'menu_design',
    'default'     => '',
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.header-3 .main-menu::before,.header-bg-2, .header-1 .main-menu::before',
            'property' => 'background-color',
        ),
    ),
) );
// Menu Item Font Size
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'typography',
    'settings'    => 'menu_color_variant',
    'label'       => esc_attr__( 'Menu Typography', 'ushop' ),
    'section'     => 'menu_design',
    'default'     => array(
        'font-family'    => 'Ubuntu',
        'variant'        => '500',
        'font-size'      => '14px',
        'line-height'    => 'inherit',
        'letter-spacing' => '0',
        'color'          => '#000',
        'text-transform' => 'uppercase'
    ),
    'priority'    => 10,
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element'  => '.main-menu a',
        ),
    ),
) );
/**
 * Hero Area
 */
// Header Image
Ushop_Kirki::add_section( 'header_image', array(
    'title'          => __( 'Hero Area', 'ushop' ),
    'panel'          => 'header_panel',
    'priority'    => 50,
) );
// Hero Show
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'hero_area_show',
    'label'       => esc_attr__( 'Show Hero Area', 'ushop' ),
    'section'     => 'header_image',
    'default'     => true,
    'priority'    => 5,
) );
// Hero Sub Title
Ushop_Kirki::add_field( 'ushop', array(
    'type'     => 'text',
    'settings' => 'hero_sub_title',
    'label'    => __( 'Sub Title', 'ushop' ),
    'section'  => 'header_image',
    'priority' => 10,
    'default'  => '',
    'transport'	  => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '.hero-content h3',
            'function' => 'html',
        ),
    )
) );
// Hero Title
Ushop_Kirki::add_field( 'ushop', array(
    'type'     => 'text',
    'settings' => 'hero_title',
    'label'    => __( 'Title', 'ushop' ),
    'section'  => 'header_image',
    'default'  => '',
    'priority' => 10,
    'transport'	  => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '.hero-content h2',
            'function' => 'html',
        ),
    )
) );
// Hero Content / Text
Ushop_Kirki::add_field( 'ushop', array(
    'type'     => 'textarea',
    'settings' => 'hero_text',
    'label'    => __( 'Content', 'ushop' ),
    'section'  => 'header_image',
    'default'  => '',
    'priority' => 10,
    'transport'	  => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '.hero-content p',
            'function' => 'html',
        ),
    )
) );
// Hero Button Text
Ushop_Kirki::add_field( 'ushop', array(
    'type'     => 'text',
    'settings' => 'hero_button_text',
    'label'    => __( 'Button Text', 'ushop' ),
    'section'  => 'header_image',
    'priority' => 10,
    'default'  => '',
    'transport'	  => 'postMessage',
    'js_vars'   => array(
        array(
            'element'  => '.hero-content a',
            'function' => 'html',
        ),
    )
) );
// Hero Button Link
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'hero_button_url',
    'label'       => esc_attr__( 'Button URL', 'ushop' ),
    'section'     => 'header_image',
    'default'     => '',
    'priority'    => 10,
) );
/**
 * Sticky Header
 */
Ushop_Kirki::add_section( 'sticky_header', array(
    'title'          => esc_attr__( 'Sticky Header', 'ushop' ),
    'panel'          => 'header_panel',
    'priority'       => 60,
) );
// Sticky Hide
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'sticky_hide',
    'label'       => esc_attr__( 'Hide Sticky Header', 'ushop' ),
    'section'     => 'sticky_header',
    'default'     => '1',
    'priority'    => 10,
) );