<?php
/**
 * Social Link
 */
Ushop_Kirki::add_section( 'social_Link_section', array(
    'title'          => esc_attr__( 'Social Media', 'ushop' ),
    'priority'       => 60,
) );
// FB
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'fb_link',
    'label'       => esc_html__( 'Facebook', 'ushop' ),
    'section'     => 'social_Link_section',
    'default'     => '',
    'priority'    => 10,
) );
// TW
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'tw_link',
    'label'       => esc_html__( 'Twitter', 'ushop' ),
    'section'     => 'social_Link_section',
    'default'     => '',
    'priority'    => 15,
) );
// LI
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'li_link',
    'label'       => esc_html__( 'Linkedin', 'ushop' ),
    'section'     => 'social_Link_section',
    'default'     => '',
    'priority'    => 20,
) );
// PI
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'pi_link',
    'label'       => esc_html__( 'Pinterest', 'ushop' ),
    'section'     => 'social_Link_section',
    'default'     => '',
    'priority'    => 25,
) );
// IN
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'in_link',
    'label'       => esc_html__( 'Instagram', 'ushop' ),
    'section'     => 'social_Link_section',
    'default'     => '',
    'priority'    => 30,
) );
// DRI
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'dri_link',
    'label'       => esc_html__( 'Dribbble', 'ushop' ),
    'section'     => 'social_Link_section',
    'default'     => '',
    'priority'    => 35,
) );
// GP
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'gp_link',
    'label'       => esc_html__( 'Google Plus', 'ushop' ),
    'section'     => 'social_Link_section',
    'default'     => '',
    'priority'    => 40,
) );
// YO
Ushop_Kirki::add_field( 'ushop', array(
    'type'        => 'text',
    'settings'    => 'yo_link',
    'label'       => esc_html__( 'YouTube', 'ushop' ),
    'section'     => 'social_Link_section',
    'default'     => '',
    'priority'    => 45,
) );