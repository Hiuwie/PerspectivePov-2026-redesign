<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function open_mart_customize_register( $wp_customize ){

//view pro feature
// require OPEN_MART_THEME_DIR . '/customizer/view-pro-feature.php';	
//Registered panel and section
require OPEN_MART_THEME_DIR . '/customizer/register-panels-and-sections.php';	
//site identity
require OPEN_MART_THEME_DIR . '/customizer/section/layout/header/set-identity.php';
require OPEN_MART_THEME_DIR . '/customizer/section/layout/header/header.php';	
//Header
require OPEN_MART_THEME_DIR . '/customizer/section/layout/header/above-header.php';	
require OPEN_MART_THEME_DIR . '/customizer/section/layout/header/main-header.php';
require OPEN_MART_THEME_DIR . '/customizer/section/layout/header/loader.php';
//Footer
require OPEN_MART_THEME_DIR . '/customizer/section/layout/footer/above-footer.php';
require OPEN_MART_THEME_DIR . '/customizer/section/layout/footer/widget-footer.php';
require OPEN_MART_THEME_DIR . '/customizer/section/layout/footer/bottom-footer.php';
//section ordering
require OPEN_MART_THEME_DIR . '/customizer/section-ordering.php';
//social Icon
require OPEN_MART_THEME_DIR . '/customizer/section/layout/social-icon/social-icon.php';
//Blog
require OPEN_MART_THEME_DIR . '/customizer/section/layout/blog/blog.php';
//Color Option
require OPEN_MART_THEME_DIR . '/customizer/section/color/global-color.php';
require OPEN_MART_THEME_DIR . '/customizer/section/color/below-header-color.php';
require OPEN_MART_THEME_DIR . '/customizer/section/color/main-menu-color.php';
//woo-product
require OPEN_MART_THEME_DIR . '/customizer/section/woo/product.php';
require OPEN_MART_THEME_DIR . '/customizer/section/woo/single-product.php';
require OPEN_MART_THEME_DIR . '/customizer/section/woo/cart.php';
require OPEN_MART_THEME_DIR . '/customizer/section/woo/shop.php';

// scroller
if ( class_exists('open_mart_Customize_Control_Scroll')){
      $scroller = new open_mart_Customize_Control_Scroll();
  }
}
add_action('customize_register','open_mart_customize_register');
function open_mart_is_json( $string ){
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}