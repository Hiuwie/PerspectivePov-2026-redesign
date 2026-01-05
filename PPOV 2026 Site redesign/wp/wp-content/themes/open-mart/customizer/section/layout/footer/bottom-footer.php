<?php
/******************/
//Bootm footer
/******************/
//choose col layout
if(class_exists('open_mart_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'open_mart_bottom_footer_layout', array(
                'default'           => 'ft-btm-one',
                'sanitize_callback' => 'open_mart_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customize_Control_Radio_Image(
                $wp_customize, 'open_mart_bottom_footer_layout', array(
                    'label'    => esc_html__('Layout','open-mart'),
                    'section'  => 'open-mart-bottom-footer',
                    'choices'  => array(
                       'ft-btm-none'   => array(
                            'url' => open_mart_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'ft-btm-one'   => array(
                            'url' => open_mart_TOP_HEADER_LAYOUT_1,
                        ),
                        'ft-btm-two' => array(
                            'url' => open_mart_TOP_HEADER_LAYOUT_2,
                        ),
                        'ft-btm-three' => array(
                            'url' => open_mart_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
//********************************/
// col1-setting
//*******************************/
$wp_customize->add_setting('open_mart_bottom_footer_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control('open_mart_bottom_footer_col1_set', array(
        'settings' => 'open_mart_bottom_footer_col1_set',
        'label'    => __('Column 1','open-mart'),
        'section'  => 'open-mart-bottom-footer',
        'type'     => 'select',
        'choices'  => array(
        'none'             => __('None','open-mart'),
        'text'             => __('Text','open-mart'),
        'menu'             => __('Menu','open-mart'),
        'widget'           => __('Widget','open-mart'),
        'social'           => __('Social Media','open-mart'),   
    ),
));
//col1-text/html
$wp_customize->add_setting('open_mart_footer_bottom_col1_texthtml', array(
        'default'           => __('Copyright | Open Mart | Developed by ThemeHunk','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('open_mart_footer_bottom_col1_texthtml', array(
        'label'    => __('Text', 'open-mart'),
        'section'  => 'open-mart-bottom-footer',
        'settings' => 'open_mart_footer_bottom_col1_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_footer_bottom_col1_widget_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize,'open_mart_footer_bottom_col1_widget_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__('Go To Widget','open-mart'),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_footer_bottom_col1_menu_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize,'open_mart_footer_bottom_col1_menu_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__('Go To Menu','open-mart'),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_footer_bottom_col1_social_media_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_footer_bottom_col1_social_media_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'open-mart' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
/***************************************/
// col2
/***************************************/
$wp_customize->add_setting('open_mart_bottom_footer_col2_set',array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_bottom_footer_col2_set',array(
        'settings' => 'open_mart_bottom_footer_col2_set',
        'label'   => __('Column 2','open-mart'),
        'section' => 'open-mart-bottom-footer',
        'type'    => 'select',
        'choices'    => array(
        'none'             => __('None','open-mart'),
        'text'             => __('Text','open-mart'),
        'menu'             => __('Menu','open-mart'),
        'search'           => __('Search','open-mart'),
        'widget'           => __('Widget','open-mart'),
        'social'           => __('Social Media','open-mart'),     
        ),
    ));
// col2-text/html
$wp_customize->add_setting('open_mart_bottom_footer_col2_texthtml', array(
        'default'           => __('Add your content here','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_textarea', 
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control('open_mart_bottom_footer_col2_texthtml', array(
        'label'    => __('Text', 'open-mart'),
        'section'  => 'open-mart-bottom-footer',
        'settings' => 'open_mart_bottom_footer_col2_texthtml',
         'type'    => 'textarea',
    ));
// col2 widget redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_bottom_footer_col2_widget_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize,'open_mart_bottom_footer_col2_widget_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'open-mart' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}  
// col2 menu redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_bottom_footer_col2_menu_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize,'open_mart_bottom_footer_col2_menu_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'open-mart' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_bottom_footer_col2_social_media_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_bottom_footer_col2_social_media_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'open-mart' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('open_mart_bottom_footer_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control('open_mart_bottom_footer_col3_set', array(
        'settings' => 'open_mart_bottom_footer_col3_set',
        'label'   => __('Column 3','open-mart'),
        'section' => 'open-mart-bottom-footer',
        'type'    => 'select',
        'choices' => array(
        'none'             => __('None','open-mart'),
        'text'             => __('Text','open-mart'),
        'menu'             => __('Menu','open-mart'),
        'search'           => __('Search','open-mart'),
        'widget'           => __('Widget','open-mart'),
        'social'           => __('Social Media','open-mart'),   
        ),
    ));
// col3-text/html
$wp_customize->add_setting('open_mart_bottom_footer_col3_texthtml', array(
        'default'          => __('Add your content here','open-mart'),
        'capability'       => 'edit_theme_options',
        'sanitize_callback'=> 'open_mart_sanitize_textarea',  
        'transport'         => 'postMessage', 
    ));
$wp_customize->add_control('open_mart_bottom_footer_col3_texthtml', array(
        'label'    => __('Text', 'open-mart'),
        'section'  => 'open-mart-bottom-footer',
        'settings' => 'open-mart_bottom_footer_col3_texthtml',
        'type'     => 'textarea',
    ));
// col3 social media redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_bottom_footer_col3_social_media_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_bottom_footer_col3_social_media_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'open-mart' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 widget redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_bottom_footer_col3_widget_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize,'open_mart_bottom_footer_col3_widget_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'open-mart' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
// col3 widget redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_bottom_footer_col3_menu_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize,'open_mart_bottom_footer_col3_menu_redirect', array(
                    'section'      => 'open-mart-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'open-mart' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'open_mart_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'open_mart_btm_ftr_hgt', array(
                'sanitize_callback' => 'open_mart_sanitize_range_value',
                'default'           => '40',
                 'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_btm_ftr_hgt', array(
                    'label'       => esc_html__( 'Height', 'open-mart' ),
                    'section'     => 'open-mart-bottom-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 30,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                      'media_query' => true,
                    'sum_type'    => true,
                )
           )
    );
}
// above bottom-border
if ( class_exists( 'open_mart_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'open_mart_btm_ftr_botm_brd', array(
                'sanitize_callback' => 'open_mart_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_btm_ftr_botm_brd', array(
                    'label'       => esc_html__( 'Top Border', 'open-mart' ),
                    'section'     => 'open-mart-bottom-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 200,
                        'step' => 1,
                    ),
                      'media_query' => true,
                    'sum_type'    => true,
                )
            )
        );
    }
// border-color
 $wp_customize->add_setting('open_mart_bottom_frt_brdr_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new open_mart_Customizer_Color_Control($wp_customize,'open_mart_bottom_frt_brdr_clr', array(
        'label'      => __('Border Color', 'open-mart' ),
        'section'    => 'open-mart-bottom-footer',
        'settings'   => 'open_mart_bottom_frt_brdr_clr',
    ) ) 
 );  


/****************/
//doc link
/****************/
$wp_customize->add_setting('open_mart_ftr_blw_learn_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_ftr_blw_learn_more',
            array(
        'section'     => 'open-mart-bottom-footer',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#below-footer',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'    =>100,
    )));