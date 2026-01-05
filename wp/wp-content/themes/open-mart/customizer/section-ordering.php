<?php
    $wp_customize->add_setting('open_mart_section_ordering_doc', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
    $wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_section_ordering_doc',
            array(
        'section'     => 'open-mart-section-order',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#section-ordering',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));
/*********************/
// Move To Top
/********************/
 $wp_customize->add_setting( 'open_mart_move_to_top', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_move_to_top', array(
    'label'       => esc_html__( 'Enable', 'open-mart' ),
    'section'     => 'open-mart-move-to-top',
    'type'        => 'toggle',
    'settings'    => 'open_mart_move_to_top',
  ) ) );

  // BG color
 $wp_customize->add_setting('open_mart_move_to_top_bg_clr', array(
        'default'           => '#141415',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new open_mart_Customizer_Color_Control($wp_customize,'open_mart_move_to_top_bg_clr', array(
        'label'      => __('Background Color', 'open-mart' ),
        'section'    => 'open-mart-move-to-top',
        'settings'   => 'open_mart_move_to_top_bg_clr',
    ) ) 
 );  

$wp_customize->add_setting('open_mart_move_to_top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'open_mart_move_to_top_icon_clr', array(
        'label'      => __('Icon Color', 'open-mart' ),
        'section'    => 'open-mart-move-to-top',
        'settings'   => 'open_mart_move_to_top_icon_clr',
    ) ) 
 );
// Page Layout
$wp_customize->add_setting( 'open_mart_page_lyout_endtoend', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_page_lyout_endtoend', array(
    'label'       => esc_html__( 'End To End', 'open-mart' ),
    'section'     => 'open_mart_page_layout',
    'type'        => 'toggle',
    'settings'    => 'open_mart_page_lyout_endtoend',
  ) ) );
/****************/
//doc link
/****************/
$wp_customize->add_setting('open_mart_movetotop_learn_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_movetotop_learn_more',
            array(
        'section'    => 'open-mart-move-to-top',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#back-top',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));