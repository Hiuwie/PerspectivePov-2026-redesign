<?php
/**
 * Register WooCommerce Single Product Page
 */

if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
$wp_customize->add_setting( 'open_mart_product_single_sidebar_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'open_mart_product_single_sidebar_disable', array(
                'label'                 => esc_html__('Force to disable sidebar in product page.', 'open-mart'),
                'type'                  => 'checkbox',
                'section'               => 'open-mart-woo-single-product',
                'settings'              => 'open_mart_product_single_sidebar_disable',
 ) ) );
/******************************/
// Up Sell Product
/******************************/
$wp_customize->add_setting('open_mart_single_upsell_product_divide', array(
        'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control( new open_mart_Misc_Control( $wp_customize, 'open_mart_single_upsell_product_divide',
            array(
        'section'     => 'open-mart-woo-single-product',
        'type'        => 'custom_message',
        'description' => __('Up Sell Product','open-mart' ),
)));
// display upsell
$wp_customize->add_setting('open_mart_upsell_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'open_mart_upsell_product_display', array(
                'label'         => __('Display up sell product', 'open-mart'),
                'type'          => 'checkbox',
                'section'       => 'open-mart-woo-single-product',
                'settings'      => 'open_mart_upsell_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'open_mart_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'open_mart_upsale_num_col_shw', array(
                'sanitize_callback' => 'open_mart_sanitize_range_value',
                'default' => '4',  
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_upsale_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'open-mart' ),
                    'section'     => 'open-mart-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'open_mart_upsale_num_product_shw', array(
                'sanitize_callback' => 'open_mart_sanitize_range_value',
                'default' => '4',
                
                
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_upsale_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'open-mart' ),
                    'section'     => 'open-mart-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}
/******************************/
// Related Product
/******************************/
$wp_customize->add_setting('open_mart_single_related_product_divide', array(
        'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control( new open_mart_Misc_Control( $wp_customize, 'open_mart_single_related_product_divide',
            array(
        'section'     => 'open-mart-woo-single-product',
        'type'        => 'custom_message',
        'description' => __('Related Product','open-mart' ),
)));
// display upsell
$wp_customize->add_setting('open_mart_related_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'open_mart_related_product_display', array(
                'label'         => __('Display Related product', 'open-mart'),
                'type'          => 'checkbox',
                'section'       => 'open-mart-woo-single-product',
                'settings'      => 'open_mart_related_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'open_mart_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'open_mart_related_num_col_shw', array(
                'sanitize_callback' => 'open_mart_sanitize_range_value',
                'default' => '4',
                
                
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_related_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'open-mart' ),
                    'section'     => 'open-mart-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'open_mart_related_num_product_shw', array(
                'sanitize_callback' => 'open_mart_sanitize_range_value',
                'default' => '4',
                
                
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_related_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'open-mart' ),
                    'section'     => 'open-mart-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}
/****************/
// doc link
/****************/
$wp_customize->add_setting('open_mart_single_product_link_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_single_product_link_more',
            array(
        'section'     => 'open-mart-woo-single-product',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#single-product',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));