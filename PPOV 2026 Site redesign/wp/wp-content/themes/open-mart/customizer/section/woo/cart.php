<?php
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
/***************/
// Cart
/***************/

// cross sell product divider
$wp_customize->add_setting('open_mart_divide_woo_cross_sell', array(
        'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control( new open_mart_Misc_Control( $wp_customize, 'open_mart_divide_woo_cross_sell',
            array(
        'section'     => 'open-mart-woo-cart-page',
        'type'        => 'custom_message',
        'description' => wp_kses_post('Cross Sell Product','open-mart' ),
        'priority'    => 2,
)));
// cross sell product column
if ( class_exists( 'open_mart_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'open_mart_cross_num_col_shw', array(
                'sanitize_callback' => 'open_mart_sanitize_range_value',
                'default' => '2',
                
                
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_cross_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'open-mart' ),
                    'section'     => 'open-mart-woo-cart-page',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 3,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
              'open_mart_cross_num_product_shw', array(
                'sanitize_callback' => 'open_mart_sanitize_range_value',
                'default' => '4',       
            )
        );
$wp_customize->add_control(
            new open_mart_WP_Customizer_Range_Value_Control(
                $wp_customize, 'open_mart_cross_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'open-mart' ),
                    'section'     => 'open-mart-woo-cart-page',
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
$wp_customize->add_setting('open_mart_cart_link_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_cart_link_more',
            array(
        'section'     => 'open-mart-woo-cart-page',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#cart-page',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));