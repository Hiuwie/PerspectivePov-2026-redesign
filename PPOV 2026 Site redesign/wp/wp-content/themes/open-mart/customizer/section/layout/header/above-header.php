<?php
/**
 * Header Options for  Open Mart Theme.
 * @package      Open Mart
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2018,  Open Mart
 * @since       Open Mart 1.0.0
 */
//above header
// choose col layout
if(class_exists('open_mart_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'open_mart_above_header_layout', array(
                'default'           => 'abv-none',
                'sanitize_callback' => 'open_mart_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customize_Control_Radio_Image(
                $wp_customize, 'open_mart_above_header_layout', array(
                    'label'    => esc_html__( 'Layout', 'open-mart' ),
                    'section'  => 'open-mart-above-header',
                    'choices'  => array(
                       'abv-none'   => array(
                            'url' => open_mart_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'abv-one'   => array(
                            'url' => open_mart_TOP_HEADER_LAYOUT_1,
                        ),
                        'abv-two' => array(
                            'url' => open_mart_TOP_HEADER_LAYOUT_2,
                        ),
                        'abv-three' => array(
                            'url' => open_mart_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
// col1
$wp_customize->add_setting('open_mart_above_header_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_above_header_col1_set', array(
        'settings' => 'open_mart_above_header_col1_set',
        'label'   => __('Column 1','open-mart'),
        'section' => 'open-mart-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'       => __('None','open-mart'),
        'text'       => __('Text','open-mart'),
        'menu'       => __('Menu','open-mart'),
        'widget'     => __('Widget','open-mart'),
        'social'     => __('Social Media','open-mart'),
            
        ),
    ));
// col1-text/html
$wp_customize->add_setting('open_mart_col1_texthtml', array(
        'default'           => __('Add your content here','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('open_mart_col1_texthtml', array(
        'label'    => __('Text', 'open-mart'),
        'section'  => 'open-mart-above-header',
        'settings' => 'open_mart_col1_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col1_widget_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col1_widget_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'open-mart' ),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col1_menu_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col1_menu_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'open-mart' ),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col1_social_media_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col1_social_media_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'open-mart' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
// col2
$wp_customize->add_setting('open_mart_above_header_col2_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_above_header_col2_set', array(
        'settings' => 'open_mart_above_header_col2_set',
        'label'   => __('Column 2','open-mart'),
        'section' => 'open-mart-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','open-mart'),
        'text'             => __('Text','open-mart'),
        'menu'                 => __('Menu','open-mart'),
        'widget'                 => __('Widget','open-mart'),
        'social'             => __('Social Media','open-mart'),
            
        ),
    ));
// col2-text/html
$wp_customize->add_setting('open_mart_col2_texthtml', array(
        'default'           => __('Add your content here','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('open_mart_col2_texthtml', array(
        'label'    => __('Text', 'open-mart'),
        'section'  => 'open-mart-above-header',
        'settings' => 'open_mart_col2_texthtml',
         'type'    => 'textarea',
    ));
// col2 menu redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col2_menu_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col2_menu_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'open-mart' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
} 
// col2 widget redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col2_widget_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col2_widget_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'open-mart' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col2_social_media_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col2_social_media_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'open-mart' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('open_mart_above_header_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_above_header_col3_set', array(
        'settings' => 'open_mart_above_header_col3_set',
        'label'   => __('Column 3','open-mart'),
        'section' => 'open-mart-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','open-mart'),
        'text'             => __('Text','open-mart'),
        'menu'                 => __('Menu','open-mart'),
        'widget'                 => __('Widget','open-mart'),
        'social'             => __('Social Media','open-mart'),
            
        ),
    ));

// col3-text/html
$wp_customize->add_setting('open_mart_col3_texthtml', array(
        'default'           => __('Add your content here','open-mart'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('open_mart_col3_texthtml', array(
        'label'    => __('Text', 'open-mart'),
        'section'  => 'open-mart-above-header',
        'settings' => 'open_mart_col3_texthtml',
         'type'    => 'textarea',
    ));
// col3 social media redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col3_social_media_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col3_social_media_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'open-mart' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 menu redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col3_menu_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col3_menu_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'open-mart' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
// col3 widget redirection
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_col3_widget_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     ));
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_col3_widget_redirect', array(
                    'section'      => 'open-mart-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'open-mart' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'open_mart_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting('open_mart_abv_hdr_hgt', array(
        'sanitize_callback' => 'open_mart_sanitize_range_value',
        'default'           => '35',
        'transport'         => 'postMessage',
            ));
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_abv_hdr_hgt', array(
                    'label'       => esc_html__( 'Height', 'open-mart' ),
                    'section'     => 'open-mart-above-header',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 20,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
);

$wp_customize->add_setting('open_mart_abv_hdr_botm_brd', array(
        'sanitize_callback' => 'open_mart_sanitize_range_value',
        'default'           => '0',
        'transport'         => 'postMessage',
            ));
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_abv_hdr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border', 'open-mart' ),
                    'section'     => 'open-mart-above-header',
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
$wp_customize->add_setting('open_mart_above_brdr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'open_mart_sanitize_color'
    ));
$wp_customize->add_control( 
    new  open_mart_Customizer_Color_Control($wp_customize,'open_mart_above_brdr_clr', array(
        'label'      => __('Border Color', 'open-mart' ),
        'section'    => 'open-mart-above-header',
        'settings'   => 'open_mart_above_brdr_clr',
    ) ) ); 

    $wp_customize->add_setting( 'open_mart_above_mobile_disable', array(
                'default'               => true,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_above_mobile_disable', array(
                'label'                 => esc_html__('Disable in mobile', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open-mart-above-header',
                'settings'              => 'open_mart_above_mobile_disable',
            ) ) ); 

/****************/
//doc link
/****************/
$wp_customize->add_setting('open_mart_abv_header_doc_learn_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_abv_header_doc_learn_more',
            array(
        'section'    => 'open-mart-above-header',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#above-header',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));