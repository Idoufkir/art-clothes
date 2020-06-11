<?php
/**
 * Blog
 */
Ushop_Kirki::add_panel('blog_panel', array(
    'priority' => 90,
    'title' => esc_attr__('Blog', 'ushop'),
    'description' => esc_attr__('Blog', 'ushop'),
));
// Blog Layout
Ushop_Kirki::add_section( 'blog_section', array(
    'title'          => esc_attr__( 'Blog Layout', 'ushop' ),
    'panel'          => 'blog_panel',
    'priority'       => 10,
) );
// Blog Columns
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'select',
    'settings'    => 'blog_layout',
    'label'       => __( 'Number of columns', 'ushop' ),
    'section'     => 'blog_section',
    'default'     => 'default',
    'priority'    => 10,
    'choices'     => array(
        'default' => esc_attr__( 'Default', 'ushop' ),
        'two-column' => esc_attr__( 'Two Columns', 'ushop' ),
        'three-column' => esc_attr__( 'Three Columns & No Sidebar', 'ushop' ),
    ),
) );
// Meta Post
Ushop_Kirki::add_section( 'blog_meta_post_section', array(
    'title'          => esc_attr__( 'Meta Post', 'ushop' ),
    'panel'          => 'blog_panel',
    'priority'       => 15,
) );
// Hide Blog Posts Meta
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_meta',
    'label'       => esc_attr__( 'Hide Blog Posts Meta', 'ushop' ),
    'section'     => 'blog_meta_post_section',
    'default'     => '1',
    'priority'    => 10,
) );
// Hide Single Posts Meta
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'single_post_meta',
    'label'       => esc_attr__( 'Hide Single Posts Meta', 'ushop' ),
    'section'     => 'blog_meta_post_section',
    'default'     => '1',
    'priority'    => 10,
) );
// Featured Image
Ushop_Kirki::add_section( 'blog_featured_image_section', array(
    'title'          => esc_attr__( 'Featured Image', 'ushop' ),
    'panel'          => 'blog_panel',
    'priority'       => 20,
) );
// Hide Blog Posts Meta
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'blog_featured_image',
    'label'       => esc_attr__( 'Hide Blog Featured Image', 'ushop' ),
    'section'     => 'blog_featured_image_section',
    'default'     => '1',
    'priority'    => 10,
) );
// Hide Single Posts Meta
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'toggle',
    'settings'    => 'single_featured_image',
    'label'       => esc_attr__( 'Hide Single Featured Image', 'ushop' ),
    'section'     => 'blog_featured_image_section',
    'default'     => '1',
    'priority'    => 10,
) );