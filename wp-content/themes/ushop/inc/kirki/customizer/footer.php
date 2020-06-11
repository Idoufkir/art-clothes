<?php
/**
 * Footer
 */
Ushop_Kirki::add_panel('footer_panel', array(
    'title' => esc_attr__('Footer', 'ushop'),
    'description' => esc_attr__('Footer General Settings', 'ushop'),
    'priority' => 80,
));
// Footer Layout
Ushop_Kirki::add_section( 'footer_layout_section', array(
    'title'          => esc_attr__( 'Footer Layout', 'ushop' ),
    'panel'          => 'footer_panel',
    'priority'       => 10,
) );
// Footer Columns
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'select',
    'settings'    => 'footer_columns',
    'label'       => __( 'Number of columns', 'ushop' ),
    'section'     => 'footer_layout_section',
    'default'     => 'one',
    'priority'    => 10,
    'multiple'    => 1,
    'choices'     => array(
        'one' => esc_attr__( 'One', 'ushop' ),
        'two' => esc_attr__( 'Two', 'ushop' ),
        'three' => esc_attr__( 'Three', 'ushop' ),
        'four' => esc_attr__( 'Four', 'ushop' ),
    ),
) );
// Footer Design
Ushop_Kirki::add_section( 'footer_design', array(
    'title'          => esc_attr__( 'Footer Design', 'ushop' ),
    'panel'          => 'footer_panel',
    'priority'       => 15,
) );
// Footer Background Color
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'footer_bg',
    'label'       => __( 'Footer Background Color', 'ushop' ),
    'section'     => 'footer_design',
    'default'     => '#fff',
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element' => '.site-footer',
            'property' => 'background-color',
        ),
    ),
) );
// Footer Title Color
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'footer_title_color',
    'label'       => __( 'Footer Title Color', 'ushop' ),
    'section'     => 'footer_design',
    'default'     => '#000',
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element' => '.site-footer .footer-bottom-title',
            'property' => 'color',
        ),
    ),
) );
// Footer Text Color
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'color',
    'settings'    => 'footer_text_color',
    'label'       => __( 'Footer Text Color', 'ushop' ),
    'section'     => 'footer_design',
    'default'     => '#000',
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element' => '.site-footer,.site-footer a',
            'property' => 'color',
        ),
    ),
) );
// Footer Title Font Size
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'footer_title_font_size',
    'label'       => esc_attr__( 'Footer Heading Size', 'ushop' ),
    'section'     => 'footer_design',
    'default'     => 20,
    'choices'     => array(
        'min'  => '12',
        'max'  => '60',
        'step' => '1',
    ),
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element' => '.site-footer .footer-bottom-title',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );
// Footer Text Font Size
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'footer_text_font_size',
    'label'       => esc_attr__( 'Footer Text Size', 'ushop' ),
    'section'     => 'footer_design',
    'default'     => 14,
    'choices'     => array(
        'min'  => '8',
        'max'  => '50',
        'step' => '1',
    ),
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element' => '.site-footer',
            'property' => 'font-size',
            'units'    => 'px',
        ),
    ),
) );
// Footer Padding Top
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'footer_padding_top',
    'label'       => esc_attr__( 'Footer Padding Top', 'ushop' ),
    'section'     => 'footer_design',
    'default'     => 50,
    'choices'     => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element' => '.site-footer',
            'property' => 'padding-top',
            'units'    => 'px',
        ),
    ),
) );
// Footer Padding Top
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'slider',
    'settings'    => 'footer_padding_bottom',
    'label'       => esc_attr__( 'Footer Padding Bottom', 'ushop' ),
    'section'     => 'footer_design',
    'default'     => 50,
    'choices'     => array(
        'min'  => '0',
        'max'  => '100',
        'step' => '1',
    ),
    'transport'	  => 'auto',
    'output'      => array(
        array(
            'element' => '.site-footer',
            'property' => 'padding-bottom',
            'units'    => 'px',
        ),
    ),
) );
// Footer Copyright
Ushop_Kirki::add_section( 'footer_copyright_section', array(
    'title'          => esc_attr__( 'Footer Copy Right', 'ushop' ),
    'panel'          => 'footer_panel',
    'priority'       => 20,
) );
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'footer_copyright',
    'label'       => esc_html__( 'Copy Right Text', 'ushop' ),
    'section'     => 'footer_copyright_section',
    'default'     => 'Ushop powered by themetim',
    'transport'	  => 'postMessage',
    'priority'    => 10,
    'js_vars'   => array(
        array(
            'element'  => '.site-info',
            'function' => 'html',
        ),
    )
) );