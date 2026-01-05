<?php
// main header
// choose col layout
if(class_exists('open_mart_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'open_mart_main_header_layout', array(
                'default'           => 'mhdrfour',
                'sanitize_callback' => 'open_mart_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customize_Control_Radio_Image(
                $wp_customize, 'open_mart_main_header_layout', array(
                    'label'    => esc_html__( 'Header Layout', 'open-mart' ),
                    'section'  => 'open-mart-main-header',
                    'choices'  => array(
                        'mhdrdefault'   => array(
                            'url' => open_mart_MAIN_HEADER_LAYOUT_ONE,
                        ),
                        'mhdrone'   => array(
                            'url' => open_mart_MAIN_HEADER_LAYOUT_TWO,
                        ),
                        'mhdrtwo' => array(
                            'url' => open_mart_MAIN_HEADER_LAYOUT_THREE,
                        ),
                        'mhdrthree' => array(
                            'url' => open_mart_MAIN_HEADER_LAYOUT_FOUR,
                        ),
                        'mhdrfour' => array(
                            'url' => open_mart_MAIN_HEADER_LAYOUT_FIVE,
                        ),
                                     
                    ),
                )
            )
        );
} 
/***********************************/  
// menu alignment
/***********************************/ 
$wp_customize->add_setting('open_mart_menu_alignment', array(
                'default'               => 'center',
                'sanitize_callback'     => 'open_mart_sanitize_select',
            ) );
$wp_customize->add_control( new open_mart_Customizer_Buttonset_Control( $wp_customize, 'open_mart_menu_alignment', array(
                'label'                 => esc_html__( 'Menu Alignment', 'open-mart' ),
                'section'               => 'open-mart-main-header',
                'settings'              => 'open_mart_menu_alignment',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'open-mart' ),
                    'center'        => esc_html__( 'center', 'open-mart' ),
                    'right'             => esc_html__( 'Right', 'open-mart' ),
                ),
        ) ) );
//Main menu option
$wp_customize->add_setting('open_mart_main_header_option', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_main_header_option', array(
        'settings' => 'open_mart_main_header_option',
        'label'    => __('Column 1','open-mart'),
        'section'  => 'open-mart-main-header',
        'type'     => 'select',
        'choices'    => array(
        'none'       => __('None','open-mart'),
        'button'     => __('Button (Pro)','open-mart'),
        'callto'     => __('Call-To','open-mart'),
        'widget'     => __('Widget (Pro)','open-mart'),     
        ),
    ));
//**************/
// BUTTON TEXT //
//**************/
$wp_customize->add_setting('open_mart_main_hdr_btn_txt', array(
        'default' => __('Button Text','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_mart_main_hdr_btn_txt', array(
        'label'    => __('Button Text', 'open-mart'),
        'section'  => 'open-mart-main-header',
         'type'    => 'text',
));

$wp_customize->add_setting('open_mart_main_hdr_btn_lnk', array(
        'default' => __('#','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        
));
$wp_customize->add_control( 'open_mart_main_hdr_btn_lnk', array(
        'label'    => __('Button Link', 'open-mart'),
        'section'  => 'open-mart-main-header',
         'type'    => 'text',
));
/*****************/
// Call-to
/*****************/
$wp_customize->add_setting('open_mart_main_hdr_calto_txt', array(
        'default' => __('Call To','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_mart_main_hdr_calto_txt', array(
        'label'    => __('Call To Text', 'open-mart'),
        'section'  => 'open-mart-main-header',
         'type'    => 'text',
));

$wp_customize->add_setting('open_mart_main_hdr_calto_nub', array(
        'default' => __('+1800090098','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'open_mart_main_hdr_calto_nub', array(
        'label'    => __('Call To Number', 'open-mart'),
        'section'  => 'open-mart-main-header',
         'type'    => 'text',
));
$wp_customize->add_setting('open_mart_main_hdr_calto_email', array(
        'default' => __('Info@gmail.com','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
));
$wp_customize->add_control( 'open_mart_main_hdr_calto_email', array(
        'label'    => __('Email', 'open-mart'),
        'section'  => 'open-mart-main-header',
         'type'    => 'text',
));
// col1 widget redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_main_header_widget_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_main_header_widget_redirect', array(
                    'section'      => 'open-mart-main-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'open-mart' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/***********************************/  
// menu alignment
/***********************************/ 
$wp_customize->add_setting('open_mart_mobile_menu_open', array(
                'default'               => 'left',
                'sanitize_callback'     => 'open_mart_sanitize_select',
            ) );
$wp_customize->add_control( new open_mart_Customizer_Buttonset_Control( $wp_customize, 'open_mart_mobile_menu_open', array(
                'label'                 => esc_html__( 'Mobile Menu', 'open-mart' ),
                'section'               => 'open-mart-main-header',
                'settings'              => 'open_mart_mobile_menu_open',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'open-mart' ),
                    'right'             => esc_html__( 'Right', 'open-mart' ),
                ),
        ) ) );

/***********************************/  
// Sticky Header
/***********************************/ 
  $wp_customize->add_setting( 'open_mart_sticky_header', array(
    'default'           => false,
    'sanitize_callback' => 'open_mart_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new open_mart_Toggle_Control( $wp_customize, 'open_mart_sticky_header', array(
    'label'       => esc_html__( 'Sticky Header', 'open-mart' ),
    'section'     => 'open-mart-main-header',
    'type'        => 'toggle',
    'settings'    => 'open_mart_sticky_header',
  ) ) );

  $wp_customize->add_setting('open_mart_sticky_header_effect', array(
        'default'        => 'scrltop',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_sticky_header_effect', array(
        'settings' => 'open_mart_sticky_header_effect',
        'label'    => __('Sticky Header Effect','open-mart'),
        'section'  => 'open-mart-main-header',
        'type'     => 'select',
        'choices'    => array(
        'scrltop'     => __('Effect One','open-mart'),
        'scrldwmn'    => __('Effect Two (Pro)','open-mart'),
        
        ),
    ));
/******************/
// Disable in Mobile
/******************/
$wp_customize->add_setting( 'open_mart_whislist_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_whislist_mobile_disable', array(
                'label'                 => esc_html__('Check to disable wishlist icon in mobile device', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open-mart-main-header',
                'settings'              => 'open_mart_whislist_mobile_disable',
                'priority'   => 10,
            ) ) );

$wp_customize->add_setting( 'open_mart_account_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_account_mobile_disable', array(
                'label'                 => esc_html__('Check to disable account icon in mobile device', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open-mart-main-header',
                'settings'              => 'open_mart_account_mobile_disable',
                'priority'   => 12,
            ) ) );

$wp_customize->add_setting( 'open_mart_cart_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_cart_mobile_disable', array(
                'label'                 => esc_html__('Check to disable cart icon in mobile device', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open-mart-main-header',
                'settings'              => 'open_mart_cart_mobile_disable',
                'priority'   => 13,
            ) ) );

/****************/
//doc link
/****************/
$wp_customize->add_setting('open_mart_main_header_doc_learn_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_main_header_doc_learn_more',
            array(
        'section'    => 'open-mart-main-header',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#main-header',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));