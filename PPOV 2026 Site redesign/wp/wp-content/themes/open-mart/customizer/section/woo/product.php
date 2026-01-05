<?php
//General Section
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
// product animation
$wp_customize->add_setting('open_mart_woo_product_animation', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
$wp_customize->add_control( 'open_mart_woo_product_animation', array(
        'settings'=> 'open_mart_woo_product_animation',
        'label'   => __('Product Image Hover Style','open-mart'),
        'section' => 'open-mart-woo-shop',
        'type'    => 'select',
        'choices'    => array(
        'none'            => __('None','open-mart'),
        'zoom'            => __('Zoom','open-mart'),
        'swap'            => __('Swap','open-mart'),         
        ),
    ));
/*******************/
//Quick view
/*******************/
$wp_customize->add_setting('open_mart_woo_quickview_enable', array(
                'default'               => true,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'open_mart_woo_quickview_enable', array(
                'label'         => esc_html__('Enable Quick View.', 'open-mart'),
                'type'          => 'checkbox',
                'section'       => 'open-mart-woo-shop',
                'settings'      => 'open_mart_woo_quickview_enable',
            ) ) );
/****************/
// doc link
/****************/
$wp_customize->add_setting('open_mart_product_style_link_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_product_style_link_more',
            array(
        'section'     => 'open-mart-woo-shop',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#style-product',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    )));