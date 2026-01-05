<?php
/******************/
//Below Header
/******************/
// background divider
$wp_customize->add_setting('open_mart_divide_below_hdr_bg', array(
        'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control( new open_mart_Misc_Control( $wp_customize, 'open_mart_divide_below_hdr_bg',
            array(
        'section'     => 'open-mart-below-header-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Background','open-mart' ),
        'priority'    => 1,
)));
// BG color
 $wp_customize->add_setting('open_mart_below_hd_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new open_mart_Customizer_Color_Control($wp_customize,'open_mart_below_hd_bg_clr', array(
        'label'      => __('Background Color', 'open-mart' ),
        'section'    => 'open-mart-below-header-clr',
        'settings'   => 'open_mart_below_hd_bg_clr',
        'priority'   => 2,
    ) ) 
 );  


// content text
$wp_customize->add_setting('open_mart_divide_below_hdr_content', array(
        'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control( new open_mart_Misc_Control( $wp_customize, 'open_mart_divide_below_hdr_content',
            array(
        'section'     => 'open-mart-below-header-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Below Header Content','open-mart' ),
        'priority'    => 8,
)));

$wp_customize->add_setting('open_mart_below_content_txt_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'open_mart_below_content_txt_clr', array(
        'label'      => __('Text Color', 'open-mart' ),
        'section'    => 'open-mart-below-header-clr',
        'settings'   => 'open_mart_below_content_txt_clr',
        'priority' => 11,
    ) ) 
 );

$wp_customize->add_setting('open_mart_below_content_link_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'open_mart_below_content_link_clr', array(
        'label'      => __('Link Color', 'open-mart' ),
        'section'    => 'open-mart-below-header-clr',
        'settings'   => 'open_mart_below_content_link_clr',
        'priority'   => 12,
    ) ) 
 );
$wp_customize->add_setting('open_mart_below_content_link_hvr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'open_mart_below_content_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'open-mart' ),
        'section'    => 'open-mart-below-header-clr',
        'settings'   => 'open_mart_below_content_link_hvr_clr',
        'priority'   => 13,
    ) ) 
 );