<?php

/******************/
//Widegt footer
/******************/
if(class_exists('open_mart_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'open_mart_bottom_footer_widget_layout', array(
               'default'           => 'ft-wgt-none',
               'sanitize_callback' => 'open_mart_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customize_Control_Radio_Image(
                $wp_customize, 'open_mart_bottom_footer_widget_layout', array(
                    'label'    => esc_html__( 'Layout','open-mart'),
                    'section'  => 'open-mart-widget-footer',
                    'choices'  => array(
                       'ft-wgt-none'   => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_NONE,
                        ),
                        'ft-wgt-one'   => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_1,
                        ),
                        'ft-wgt-two' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_2,
                        ),
                        'ft-wgt-three' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_3,
                        ),
                        'ft-wgt-four' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_4,
                        ),
                        'ft-wgt-five' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_5,
                        ),
                        'ft-wgt-six' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_6,
                        ),
                        'ft-wgt-seven' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_7,
                        ),
                        'ft-wgt-eight' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_8,
                        ),
                        'ft-wgt-nine' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_9,
                        ),
                        'ft-wgt-ten' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_10,
                        ),
                        'ft-wgt-eleven' => array(
                            'url' => open_mart_FOOTER_WIDGET_LAYOUT_11,
                        ),
                    ),
                )
            )
        );
    } 
/******************************/
/* Widget Redirect
/****************************/
if (class_exists('open_mart_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'open_mart_bottom_footer_widget_redirect', array(
            'sanitize_callback' => 'open_mart_sanitize_text',
     )
);
$wp_customize->add_control(
            new open_mart_Widegt_Redirect(
                $wp_customize, 'open_mart_bottom_footer_widget_redirect', array(
                    'section'      => 'open-mart-widget-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'open-mart' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/****************/
//doc link
/****************/
$wp_customize->add_setting('open_mart_ftr_wdgt_learn_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_ftr_wdgt_learn_more',
            array(
        'section'     => 'open-mart-widget-footer',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#widget-footer',
        'description' => esc_html__('To know more go with this', 'open-mart'),
        'priority'    => 100,
)));