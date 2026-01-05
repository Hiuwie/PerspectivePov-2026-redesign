<?php 
/*********************/
// Menu Color
/*********************/
//divider
$wp_customize->add_setting('open_mart_main_header_menu_color', array(
        'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control( new open_mart_Misc_Control( $wp_customize, 'open_mart_main_header_menu_color',
            array(
        'section'     => 'open-mart-main-menu-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Menu Color','open-mart' ),
        'priority'    => 2,
)));
$wp_customize->add_setting('open_mart_main_header_menu_link_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'open_mart_main_header_menu_link_clr', array(
        'label'      => __('Link Color', 'open-mart' ),
        'section'    => 'open-mart-main-menu-clr',
        'settings'   => 'open_mart_main_header_menu_link_clr',
        'priority'   => 3,
    ) ) 
 );

// link hover color
$wp_customize->add_setting('open_mart_main_header_menu_link_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'open_mart_main_header_menu_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'open-mart' ),
        'section'    => 'open-mart-main-menu-clr',
        'settings'   => 'open_mart_main_header_menu_link_hvr_clr',
        'priority'   => 4,
    ) ) 
 );

/********************/
//Main Header SubMenu
/********************/
//divider
$wp_customize->add_setting('open_mart_main_header_sbmenu_color', array(
        'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control( new open_mart_Misc_Control( $wp_customize, 'open_mart_main_header_sbmenu_color',
            array(
        'section'     => 'open-mart-main-menu-clr',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Sub Menu Color','open-mart' ),
        'priority'    => 6,
)));
// background color
$wp_customize->add_setting('open_mart_main_header_sbmenu_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new open_mart_Customizer_Color_Control($wp_customize,'open_mart_main_header_sbmenu_bg_clr', array(
        'label'      => __('Background Color', 'open-mart' ),
        'section'    => 'open-mart-main-menu-clr',
        'settings'   => 'open_mart_main_header_sbmenu_bg_clr',
        'priority'   => 7,
    ) ) 
 );

// link color
$wp_customize->add_setting('open_mart_main_header_sbmenu_link_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'open_mart_main_header_sbmenu_link_clr', array(
        'label'      => __('Link Color', 'open-mart' ),
        'section'    => 'open-mart-main-menu-clr',
        'settings'   => 'open_mart_main_header_sbmenu_link_clr',
        'priority'   => 8,
    ) ) 
 );
// link hover color
$wp_customize->add_setting('open_mart_main_header_sbmenu_link_hvr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'open_mart_main_header_sbmenu_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'open-mart' ),
        'section'    => 'open-mart-main-menu-clr',
        'settings'   => 'open_mart_main_header_sbmenu_link_hvr_clr',
        'priority'   => 9,
    ) ) 
 );
// link/text bg hvr color
$wp_customize->add_setting('open_mart_main_header_sbmenu_link_hvr_bg_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new open_mart_Customizer_Color_Control($wp_customize,'open_mart_main_header_sbmenu_link_hvr_bg_clr', array(
        'label'      => __('Link Background Hover Color', 'open-mart' ),
        'section'    => 'open-mart-main-menu-clr',
        'settings'   => 'open_mart_main_header_sbmenu_link_hvr_bg_clr',
        'priority'   => 10,
    ) ) 
 );
