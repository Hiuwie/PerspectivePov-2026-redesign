<?php 
$wp_customize->add_setting('open_mart_prd_view', array(
        'default'        => 'grid-view',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
    $wp_customize->add_control('open_mart_prd_view', array(
        'settings' => 'open_mart_prd_view',
        'label'   => __('Display Product View','open-mart'),
        'description' => __('(Select layout to display products at shop page.)','open-mart'),
        'section' => 'open-mart-woo-shop-page',
        'type'    => 'select',
        'choices' => array(
        'grid-view'   => __('Grid','open-mart'), 
        'list-view'     => __('List','open-mart'),
        
        )
    ));
/************************/
//Shop product pagination
/************************/
   $wp_customize->add_setting('open_mart_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_select',
    ));
    $wp_customize->add_control('open_mart_pagination', array(
        'settings' => 'open_mart_pagination',
        'label'   => __('Post Pagination','open-mart'),
        'section' => 'open-mart-woo-shop-page',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','open-mart'),
        'click'   => __('Load More','open-mart'), 
        'scroll'  => __('Infinite Scroll','open-mart'), 
        )
    ));

  
$wp_customize->add_setting('open_mart_pagination_loadmore_btn_text', array(
        'default'           => 'Load More',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'open_mart_sanitize_text',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('open_mart_pagination_loadmore_btn_text', array(
        'label'    => __('Load More Text', 'open-mart'),
        'section'  => 'open-mart-woo-shop-page',
        'settings' => 'open_mart_pagination_loadmore_btn_text',
         'type'    => 'text',
    ));
/****************/
// doc link
/****************/
$wp_customize->add_setting('open_mart_shop_page_more', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_shop_page_more',
            array(
        'section'     => 'open-mart-woo-shop-page',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/open-mart/#shop-page',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>  100,
    )));