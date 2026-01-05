<?php
/**
 * Register customizer panels & sections.
 */
/*************************/
/*WordPress Default Panel*/
/*************************/
$open_mart_shop_panel_default = new open_mart_WP_Customize_Panel( $wp_customize,'open-mart-panel-default', array(
    'priority' => 1,
    'title'    => __( 'WordPress Default', 'open-mart' ),
  ));
$wp_customize->add_panel($open_mart_shop_panel_default);
$wp_customize->get_section( 'title_tagline' )->panel = 'open-mart-panel-default';
$wp_customize->get_section( 'static_front_page' )->panel = 'open-mart-panel-default';
$wp_customize->get_section( 'custom_css' )->panel = 'open-mart-panel-default';

$wp_customize->add_setting('open_mart_home_page_setup', array(
    'sanitize_callback' => 'open_mart_sanitize_text',
    ));
$wp_customize->add_control(new open_mart_Misc_Control( $wp_customize, 'open_mart_home_page_setup',
            array(
        'section'    => 'static_front_page',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/open-mart/#homepage-setting',
        'description' => esc_html__( 'To know more go with this', 'open-mart' ),
        'priority'   =>100,
    ))); 
/************************/
// Background option
/************************/
$open_mart_shop_bg_option = new  open_mart_WP_Customize_Section( $wp_customize, 'open-mart-bg-option', array(
    'title' =>  __( 'Background', 'open-mart' ),
    'panel' => 'open-mart-panel-default',
    'priority' => 10,
  ));
$wp_customize->add_section($open_mart_shop_bg_option);

/*************************/
/*Layout Panel*/
/*************************/
$wp_customize->add_panel( 'open-mart-panel-layout', array(
				'priority' => 3,
				'title'    => __( 'Layout', 'open-mart' ),
) );

// Header
$open_mart_section_header_group = new  open_mart_WP_Customize_Section( $wp_customize, 'open-mart-section-header-group', array(
    'title' =>  __( 'Header', 'open-mart' ),
    'panel' => 'open-mart-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section( $open_mart_section_header_group );

// above-header
$open_mart_above_header = new  open_mart_WP_Customize_Section( $wp_customize, 'open-mart-above-header', array(
    'title'    => __( 'Above Header', 'open-mart' ),
    'panel'    => 'open-mart-panel-layout',
        'section'  => 'open-mart-section-header-group',
        'priority' => 3,
  ));
$wp_customize->add_section( $open_mart_above_header );
// main-header
$open_mart_shop_main_header = new  open_mart_WP_Customize_Section( $wp_customize, 'open-mart-main-header', array(
    'title'    => __( 'Main Header', 'open-mart' ),
    'panel'    => 'open-mart-panel-layout',
    'section'  => 'open-mart-section-header-group',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_shop_main_header );

//blog
$open_mart_section_blog_group = new  open_mart_WP_Customize_Section( $wp_customize,'open-mart-section-blog-group', array(
    'title' =>  __( 'Blog', 'open-mart' ),
    'panel' => 'open-mart-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($open_mart_section_blog_group);

$open_mart_section_footer_group = new  open_mart_WP_Customize_Section( $wp_customize, 'open-mart-section-footer-group', array(
    'title' =>  __( 'Footer', 'open-mart' ),
    'panel' => 'open-mart-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section( $open_mart_section_footer_group);
// sidebar
$open_mart_section_sidebar_group = new  open_mart_WP_Customize_Section( $wp_customize, 'open-mart-section-sidebar-group', array(
    'title' =>  __( 'Sidebar', 'open-mart' ),
    'panel' => 'open-mart-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($open_mart_section_sidebar_group);
// Scroll to top
$open_mart_move_to_top = new  open_mart_WP_Customize_Section( $wp_customize, 'open-mart-move-to-top', array(
    'title' =>  __( 'Move To Top', 'open-mart' ),
    'panel' => 'open-mart-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($open_mart_move_to_top);
// Page layout
$open_mart_page_layout = new  open_mart_WP_Customize_Section( $wp_customize, 'open_mart_page_layout', array(
    'title' =>  __( 'Page Layout', 'open-mart' ),
    'panel' => 'open-mart-panel-layout',
    'priority' => 4,
  ));
$wp_customize->add_section($open_mart_page_layout);
//above-footer
$open_mart_above_footer = new  open_mart_WP_Customize_Section( $wp_customize, 'open-mart-above-footer',array(
    'title'    => __( 'Above Footer','open-mart' ),
    'panel'    => 'open-mart-panel-layout',
        'section'  => 'open-mart-section-footer-group',
        'priority' => 1,
));
$wp_customize->add_section( $open_mart_above_footer);
//widget footer
$open_mart_shop_widget_footer = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-widget-footer', array(
    'title'    => __('Widget Footer','open-mart'),
    'panel'    => 'open-mart-panel-layout',
    'section'  => 'open-mart-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $open_mart_shop_widget_footer);
//Bottom footer
$open_mart_shop_bottom_footer = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-bottom-footer', array(
    'title'    => __('Below Footer','open-mart'),
    'panel'    => 'open-mart-panel-layout',
    'section'  => 'open-mart-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $open_mart_shop_bottom_footer);

/*************************/
/* Preloader */
/*************************/
$wp_customize->add_section( 'open-mart-pre-loader' , array(
    'title'      => __('Preloader','open-mart'),
    'priority'   => 30,
) );
/*************************/
/* Social   Icon*/
/*************************/
$open_mart_social_header = new open_mart_WP_Customize_Section( $wp_customize, 'open-mart-social-icon', array(
    'title'    => __( 'Social Icon', 'open-mart' ),
    'priority' => 30,
  ));
$wp_customize->add_section( $open_mart_social_header );
/*************************/
/* Frontpage Panel */
/*************************/
$wp_customize->add_panel( 'open-mart-panel-frontpage', array(
                'priority' => 5,
                'title'    => __( 'Frontpage Sections', 'open-mart' ),
) );

$open_mart_top_slider_section = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_top_slider_section', array(
    'title'    => __( 'Top Slider', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_top_slider_section );

$open_mart_highlight = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_highlight', array(
    'title'    => __( 'Highlight', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_highlight );

$open_mart_vt_category_tab_section = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_vt_category_tab_section', array(
    'title'    => __( 'Vertical Tabbed Carousel', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_vt_category_tab_section );

$open_mart_cat_slide_section = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_cat_slide_section', array(
    'title'    => __( 'Woo Category', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_cat_slide_section );

$open_mart_category_tab_section = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_category_tab_section', array(
    'title'    => __( 'Tabbed Product Carousel', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_category_tab_section );

// ribbon
$open_mart_ribbon = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_ribbon', array(
    'title'    => __( 'Ribbon', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_ribbon );

$open_mart_product_slide_list = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_product_slide_list', array(
    'title'    => __( 'Product List Carousel', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_product_slide_list );


$open_mart_vt2_category_tab_section = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_vt2_category_tab_section', array(
    'title'    => __( 'Vertical Banner Tabbed Carousel', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_vt2_category_tab_section );

$open_mart_product_slide_section = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_product_slide_section', array(
    'title'    => __( 'Product Carousel', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_product_slide_section );

$open_mart_product_big_feature = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_product_big_feature', array(
    'title'    => __( 'Big Featured Product', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_product_big_feature );
$open_mart_product_cat_list = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_product_cat_list', array(
    'title'    => __( 'Tabbed Product List Carousel', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_product_cat_list );

$open_mart_banner = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_banner', array(
    'title'    => __( 'Banner', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_banner );

$open_mart_brand = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_brand', array(
    'title'    => __( 'Brand', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_brand );

$open_mart_blog_testimonial_section = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_blog_testimonial_section', array(
    'title'    => __( 'Blog & Testimonial', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_blog_testimonial_section );

$open_mart_1_custom_sec = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_1_custom_sec', array(
    'title'    => __( 'First Custom Section', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_1_custom_sec );

$open_mart_2_custom_sec = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_2_custom_sec', array(
    'title'    => __( 'Second Custom Section', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_2_custom_sec );

$open_mart_3_custom_sec = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_3_custom_sec', array(
    'title'    => __( 'Third Custom Section', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_3_custom_sec );

$open_mart_4_custom_sec = new open_mart_WP_Customize_Section( $wp_customize, 'open_mart_4_custom_sec', array(
    'title'    => __( 'Fourth Custom Section', 'open-mart' ),
    'panel'    => 'open-mart-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $open_mart_4_custom_sec );

/******************/
// Color Option
/******************/
$wp_customize->add_panel( 'open-mart-panel-color-background', array(
        'priority' => 22,
        'title'    => __( 'Total Color & BG Options', 'open-mart' ),
    ) );
// Section gloab color and background
$wp_customize->add_section('open-mart-gloabal-color', array(
    'title'    => __('Global Colors', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'priority' => 1,
));
//header
$open_mart_header_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-header-color', array(
    'title'    => __('Header', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $open_mart_header_color );
$open_mart_abv_header_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-abv-header-clr', array(
    'title'    => __('Above Header','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-header-color',
    'priority' => 1,
));
$wp_customize->add_section( $open_mart_abv_header_clr);

$open_mart_main_header_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-main-header-clr', array(
    'title'    => __('Main Header','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-header-color',
    'priority' => 2,
));
$wp_customize->add_section( $open_mart_main_header_clr);

$open_mart_below_header_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-below-header-clr', array(
    'title'    => __('Below Header','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-header-color',
    'priority' => 2,
));
$wp_customize->add_section( $open_mart_below_header_clr);

$open_mart_main_menu_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-main-menu-clr', array(
    'title'    => __('Main Menu','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-header-color',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_main_menu_clr);

$open_mart_sticky_header_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-sticky-header-clr', array(
    'title'    => __('Sticky Header','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-header-color',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_sticky_header_clr);


$open_mart_mobile_pan_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-mobile-pan-clr', array(
    'title'    => __('Mobile','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-header-color',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_mobile_pan_clr);

$open_mart_canvas_pan_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-canvas-pan-clr', array(
    'title'    => __('Off Canvas Sidebar','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-header-color',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_canvas_pan_clr);

$open_mart_main_header_header_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-main-header-header-clr', array(
    'title'    => __('Header','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-main-header-clr',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_main_header_header_clr);

// main-menu
$open_mart_main_header_menu_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-main-header-menu-clr', array(
    'title'    => __('Main Menu','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-main-header-clr',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_main_header_menu_clr);

// header category
$open_mart_main_header_cat_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-main-header-cat-clr', array(
    'title'    => __('Category','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-main-header-clr',
    'priority' => 3,
));
$wp_customize->add_section($open_mart_main_header_cat_clr);
// header search
$open_mart_main_header_srch_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-main-header-srch-clr', array(
    'title'    => __('Search','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-main-header-clr',
    'priority' => 4,
));
$wp_customize->add_section($open_mart_main_header_srch_clr);
//Shop Icon
$open_mart_main_header_shp_icon = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-main-header-shp-icon', array(
    'title'    => __('Shop Icon','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-main-header-clr',
    'priority' => 5,
));
$wp_customize->add_section($open_mart_main_header_shp_icon);
//Call to Icon
$open_mart_main_header_callto_icon = new  open_mart_WP_Customize_Section($wp_customize,'open_mart_main_header_callto_icon', array(
    'title'    => __('Call To Icon','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-main-header-clr',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_main_header_callto_icon);
/****************/
//Sidebar
/****************/
$open_mart_sidebar_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-sidebar-color', array(
    'title'    => __('Sidebar', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $open_mart_sidebar_color );
/****************/
//footer
/****************/
$open_mart_footer_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-footer-color', array(
    'title'    => __('Footer', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $open_mart_footer_color );

$open_mart_abv_footer_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-abv-footer-clr', array(
    'title'    => __('Above Footer','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-footer-color',
    'priority' => 1,
));
$wp_customize->add_section( $open_mart_abv_footer_clr);

$open_mart_footer_widget_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-footer-widget-clr', array(
    'title'    => __('Footer Widget','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-footer-color',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_footer_widget_clr);

$open_mart_btm_footer_clr = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-btm-footer-clr', array(
    'title'    => __('Bottom Footer','open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-footer-color',
    'priority' => 3,
));
$wp_customize->add_section( $open_mart_btm_footer_clr);

/****************/
//Woocommerce color
/****************/
$open_mart_woo_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-woo-color', array(
    'title'    => __('Woocommerce', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'priority' => 4,
));
$wp_customize->add_section( $open_mart_woo_color );
// product
$open_mart_woo_prdct_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-woo-prdct-color', array(
    'title'    => __('Product', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-woo-color',
    'priority' => 1,
));
$wp_customize->add_section( $open_mart_woo_prdct_color );

// sale
$open_mart_woo_prdct_sale_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-woo-prdct-sale-color', array(
    'title'    => __('Sale Badge', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-woo-color',
    'priority' => 2,
));
$wp_customize->add_section( $open_mart_woo_prdct_sale_color );
// single product
$open_mart_woo_prdct_single_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-woo-prdct-single-color', array(
    'title'    => __('Single Product', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-woo-color',
    'priority' => 3,
));
$wp_customize->add_section( $open_mart_woo_prdct_single_color );

/*************************/
// Frontpage
/*************************/
$open_mart_front_page_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-front-page-color', array(
    'title'    => __('Frontpage', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'priority' => 4,
));
$wp_customize->add_section($open_mart_front_page_color);

$open_mart_top_slider_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-top-slider-color', array(
    'title'    => __('Top Slider', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 1,
));
$wp_customize->add_section($open_mart_top_slider_color);

$open_mart_cat_slider_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-cat-slider-color', array(
    'title'    => __('Woo Category', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_cat_slider_color);

$open_mart_product_slider_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-product-slider-color', array(
    'title'    => __('Product Carousel', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 3,
));
$wp_customize->add_section($open_mart_product_slider_color);

$open_mart_product_cat_slide_tab_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-product-cat-slide-tab-color', array(
    'title'    => __('Tabbed Product Carousel', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 3,
));
$wp_customize->add_section($open_mart_product_cat_slide_tab_color);

$open_mart_product_list_slide_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-product-list-slide-color', array(
    'title'    => __('Product List Carousel', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 4,
));
$wp_customize->add_section($open_mart_product_list_slide_color);

$open_mart_product_list_tab_slide_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-product-list-tab-slide-color', array(
    'title'    => __('Tabbed Product List Carousel', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 5,
));
$wp_customize->add_section($open_mart_product_list_tab_slide_color);

$open_mart_banner_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-banner-color', array(
    'title'    => __('Banner', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_banner_color);

$open_mart_ribbon_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-ribbon-color', array(
    'title'    => __('Ribbon', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_ribbon_color);

$open_mart_brand_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-brand-color', array(
    'title'    => __('Brand', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_brand_color);

$open_mart_highlight_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-highlight-color', array(
    'title'    => __('Highlight', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_highlight_color);

$open_mart_big_featured_color = new  open_mart_WP_Customize_Section($wp_customize,'open-mart-big-featured-color', array(
    'title'    => __('Big Featured Product', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_big_featured_color);
/****************/
//custom section
/****************/
$open_mart_custom_one_color = new open_mart_WP_Customize_Section($wp_customize,'open-mart-custom-one-color', array(
    'title'    => __('Custom Section One', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_custom_one_color);

$open_mart_custom_two_color = new open_mart_WP_Customize_Section($wp_customize,'open-mart-custom-two-color', array(
    'title'    => __('Custom Section Two', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_custom_two_color);

$open_mart_custom_three_color = new open_mart_WP_Customize_Section($wp_customize,'open-mart-custom-three-color', array(
    'title'    => __('Custom Section Three', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_custom_three_color);


$open_mart_custom_four_color = new open_mart_WP_Customize_Section($wp_customize,'open-mart-custom-four-color', array(
    'title'    => __('Custom Section Four', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_custom_four_color);

$open_mart_vt1_color = new  open_mart_WP_Customize_Section($wp_customize,'open_mart_vt1_color', array(
    'title'    => __('Vertical Tabbed Product Carousel', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_vt1_color);

$open_mart_vt2_color = new  open_mart_WP_Customize_Section($wp_customize,'open_mart_vt2_color', array(
    'title'    => __('Vertical Banner Tabbed Product Carousel', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_vt2_color);

$open_mart_blog_testi_color = new  open_mart_WP_Customize_Section($wp_customize,'open_mart_blog_testi_color', array(
    'title'    => __('Blog & Testimonial', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'section'  => 'open-mart-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($open_mart_blog_testi_color);


/*********************/
// Page Content Color
/*********************/
$open_mart_custom_page_content_color = new open_mart_WP_Customize_Section($wp_customize,'open-mart-page-content-color', array(
    'title'    => __('Content Color', 'open-mart'),
    'panel'    => 'open-mart-panel-color-background',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_custom_page_content_color);
/******************/
// Shop Page
/******************/
$open_mart_woo_shop = new open_mart_WP_Customize_Section( $wp_customize, 'open-mart-woo-shop', array(
    'title'    => __( 'Product Style', 'open-mart' ),
     'panel'    => 'woocommerce',
     'priority' => 2,
));
$wp_customize->add_section( $open_mart_woo_shop );

$open_mart_woo_single_product = new open_mart_WP_Customize_Section( $wp_customize, 'open-mart-woo-single-product', array(
    'title'    => __( 'Single Product', 'open-mart' ),
     'panel'    => 'woocommerce',
     'priority' => 3,
));
$wp_customize->add_section($open_mart_woo_single_product );

$open_mart_woo_cart_page = new open_mart_WP_Customize_Section( $wp_customize, 'open-mart-woo-cart-page', array(
    'title'    => __( 'Cart Page', 'open-mart' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($open_mart_woo_cart_page);

$open_mart_woo_shop_page = new open_mart_WP_Customize_Section( $wp_customize, 'open-mart-woo-shop-page', array(
    'title'    => __( 'Shop Page', 'open-mart' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($open_mart_woo_shop_page);

/*************************/
/*Typography Panel*/
/*************************/
$wp_customize->add_panel('open-mart-panel-typography', array(
                'priority' => 3,
                'title'    => __('Typography', 'open-mart'),
));
$open_mart_section_base_typo = new  open_mart_WP_Customize_Section($wp_customize, 'open-mart-section-base-typo', array(
    'title' =>  __('Base Typography', 'open-mart'),
    'panel' => 'open-mart-panel-typography',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_section_base_typo);
$open_mart_section_title_typo = new  open_mart_WP_Customize_Section($wp_customize, 'open-mart-section-title-typo', array(
    'title' =>  __('Title', 'open-mart'),
    'panel' => 'open-mart-panel-typography',
    'priority' => 3,
));
$wp_customize->add_section($open_mart_section_title_typo);

$open_mart_section_content_typo = new  open_mart_WP_Customize_Section($wp_customize, 'open-mart-section-content-typo', array(
    'title' =>  __('Content', 'open-mart'),
    'panel' => 'open-mart-panel-typography',
    'priority' => 4,
));
$wp_customize->add_section($open_mart_section_content_typo);
/*****************************/
// Template
/*****************************/
$wp_customize->add_panel('open-mart-panel-inner-pagetemplate', array(
                'priority' => 4,
                'title'    => __('Inner Page Template ', 'open-mart'),
));
// Faq
$open_mart_section_faq_templ = new  open_mart_WP_Customize_Section($wp_customize, 'open-mart-section-faq-templ', array(
    'title' =>  __('Faq', 'open-mart'),
    'panel' => 'open-mart-panel-inner-pagetemplate',
    'priority' => 2,
));
$wp_customize->add_section($open_mart_section_faq_templ);
// Contact
$open_mart_section_contact_templ = new  open_mart_WP_Customize_Section($wp_customize, 'open-mart-section-contact-templ', array(
    'title' =>  __('Contact Us', 'open-mart'),
    'panel' => 'open-mart-panel-inner-pagetemplate',
    'priority' => 3,
));
$wp_customize->add_section($open_mart_section_contact_templ); 