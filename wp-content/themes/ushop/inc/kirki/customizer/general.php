<?php
/**
 * General Setting
 */
Ushop_Kirki::add_panel('general_panel', array(
    'priority' => 10,
    'title' => esc_attr__('General Settings', 'ushop'),
    'description' => esc_attr__('General Settings', 'ushop'),
));
// Site Layout Section
Ushop_Kirki::add_section( 'site_layout_section', array(
    'title'          => esc_attr__( 'Site Width', 'ushop' ),
    'panel'          => 'general_panel',
    'priority'       => 10,
) );
// Site Layout
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'site_layout',
    'label'       => __( 'Site Layout', 'ushop' ),
    'section'     => 'site_layout_section',
    'default'     => 'wide',
    'priority'    => 10,
    'choices'     => array(
        'wide'   => esc_attr__( 'Wide', 'ushop' ),
        'boxed' => esc_attr__( 'Boxed', 'ushop' ),
    ),
) );
// Body Background Image
Ushop_Kirki::add_section( 'background_image', array(
    'title'          => __( 'Body Background Image', 'ushop' ),
    'theme_supports' => 'custom-background',
    'panel'          => 'general_panel',
    'priority'       => 20,
) );

// Margin Top
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'section_margin_top',
    'label'       => esc_attr__( 'Margin Top', 'ushop' ),
    'description' => 'Margin Top not work in front page',
    'section'     => 'site_layout_section',
    'default'     => 30,
    'transport'	  => 'auto',
    'choices'   => array(
        'min'  => 5,
        'max'  => 100,
        'step' => 1,
    ),
    'output'      => array(
        array(
            'element'  => '.margin-top',
            'property' => 'margin-top',
            'units'    => 'px',
        ),
    )
) );