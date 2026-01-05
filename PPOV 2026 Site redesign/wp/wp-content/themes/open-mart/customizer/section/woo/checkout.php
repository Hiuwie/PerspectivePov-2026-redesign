<?php 
/**
 *
 *
 * @package      Open Mart
 * @author       Open Mart
 * @copyright   Copyright (c) 2019,  Open Mart
 * @since        Open Mart 1.0.0
 */
//General Section
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
/***************/
// Checkout
/***************/
$wp_customize->add_setting('open_mart_woo_checkout_distraction_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'open_mart_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'open_mart_woo_checkout_distraction_enable', array(
                'label'         => esc_html__('Enable Distraction Free Checkout.', 'open-mart'),
                'type'          => 'checkbox',
                'section'       => 'open-mart-woo-checkout-page',
                'settings'      => 'open_mart_woo_checkout_distraction_enable',
            ) ) );

/****************/
// doc link
/****************/
$wp_customize->add_setting('open_mart_checkout_link_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_checkout_link_more',
            array(
        'section'     => 'open-mart-woo-checkout-page',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more go with this <a target="_blank" href="%s">Doc</a> !', 'open-mart' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/open-mart-theme/#checkout-page')),
        'priority'   =>30,
    )));