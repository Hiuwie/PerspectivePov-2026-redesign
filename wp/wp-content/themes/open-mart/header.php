<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Open Mart
 * @since 1.0.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('open_mart_mobile_header_clr','#fff')); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<?php wp_body_open();?>	
<?php 
$classes = '';
if(is_page_template( 'page-contact.php' ) || is_page_template( 'page-faq.php' ) ||is_page_template( 'page-aboutus.php' )){
$classes = 'no-sidebar';
}
elseif(!is_404() && !is_search() && is_page()){ 
	$page_post_meta_sidebar = get_post_meta(get_the_ID(), 'open_mart_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(is_single() && (class_exists( 'WooCommerce' ) && !is_product())){
	    $page_post_meta_sidebar = get_post_meta(get_the_ID(), 'open_mart_disable_page_sidebar', true );
	    if(get_theme_mod('open_mart_blog_single_sidebar_disable')==true){
	     	$classes = 'no-sidebar';
	      }else{
	      	if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		     }
	     }
	     
}elseif(open_mart_is_blog()){
	    $blog_page_id = get_option( 'page_for_posts' );
        $page_post_meta_sidebar = get_post_meta( $blog_page_id, 'open_mart_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(class_exists( 'WooCommerce' ) && is_shop()){
	    $shop_page_id = get_option( 'woocommerce_shop_page_id' );
        $page_post_meta_sidebar = get_post_meta( $shop_page_id, 'open_mart_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(class_exists( 'WooCommerce' ) && is_product()){
	    $page_post_meta_sidebar = get_post_meta(get_the_ID(), 'open_mart_disable_page_sidebar', true );
	    if(get_theme_mod('open_mart_product_single_sidebar_disable')==true){
	     	$classes = 'no-sidebar';
	      }else{
		 if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		 }
	}
}
?>
<?php do_action('open_mart_site_preloader'); ?>
<div id="page" class="openmart-site <?php echo esc_attr($classes);?>">
	<header>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'open-mart' ); ?></a>
		<?php do_action( 'open_mart_sticky_header' ); ?> 
        <!-- sticky header -->
		<?php if(get_theme_mod('open_mart_above_mobile_disable',true)==true){
			if (wp_is_mobile()!== true):
             do_action( 'open_mart_top_header' );  
            endif;
		}elseif(get_theme_mod('open_mart_above_mobile_disable',true)==false){
			 do_action( 'open_mart_top_header' );  
		} ?> 
		<!-- end top-header -->
        <?php do_action( 'open_mart_main_header' ); ?> 
		<!-- end main-header -->
		<?php do_action( 'open_mart_below_header' ); ?> 
		<!-- end below-header -->
	</header> <!-- end header -->