<?php 
/**
 * all file includeed
 *
 * @param  
 * @return mixed|string
 */
get_template_part( 'inc/admin-function');
get_template_part( 'inc/header-function');
get_template_part( 'inc/footer-function');
get_template_part( 'inc/blog-function');
//breadcrumbs
get_template_part( 'lib/breadcrumbs/breadcrumbs');
//theme-option
include_once(ABSPATH.'wp-admin/includes/plugin.php');
if ( !is_plugin_active('open-mart-pro/open-mart-pro.php') ) {
get_template_part( 'lib/theme-option/class-open-mart-admin-settings');
get_template_part( 'lib/theme-option/theme-option-function');
}
//page-post-meta
get_template_part( 'lib/page-meta-box/open-page-meta-box');
//custom-style
get_template_part( 'inc/open-mart-custom-style');

// customizer

get_template_part('customizer/extend-customizer/class-open-mart-wp-customize-panel');
get_template_part('customizer/extend-customizer/class-open-mart-wp-customize-section');
get_template_part('customizer/customizer-radio-image/class/class-open-mart-customize-control-radio-image');
get_template_part('customizer/customizer-range-value/class/class-open-mart-customizer-range-value-control');
get_template_part('customizer/customizer-scroll/class/class-open-mart-customize-control-scroll');
get_template_part('customizer/color/class-control-color');
get_template_part('customizer/customize-buttonset/class-control-buttonset');
get_template_part('customizer/sortable/class-open-control-sortable');
get_template_part('customizer/background/class-open-mart-background-image-control');
get_template_part('customizer/customizer-tabs/class-open-mart-customize-control-tabs');
get_template_part('customizer/customizer-toggle/class-open-mart-toggle-control');

get_template_part('customizer/custom-customizer');
get_template_part('customizer/customizer-constant');
get_template_part('customizer/customizer');
/******************************/
// woocommerce
/******************************/
get_template_part( 'inc/woocommerce/woo-core');
get_template_part( 'inc/woocommerce/woo-function');
get_template_part('inc/woocommerce/woocommerce-ajax');
