<?php
/**
 * The WooCommerce template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#woocommerce
 * @package  Open Mart
 * @since 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
get_header();
$singleproduct_layout = get_theme_mod('open_mart_product_single_sidebar_disable',true);
if((is_product() && $singleproduct_layout ==true) || is_product_category()){
    $layout = 'no-sidebar';
}elseif(is_shop()){
   $shop_page_id = get_option( 'woocommerce_shop_page_id' );
   $layout = get_post_meta( $shop_page_id, 'open_mart_sidebar_dyn', true );
}else{
  $layout  = get_post_meta( get_queried_object_id(), 'open_mart_sidebar_dyn', true );
}
?>
<div id="content" class="page-content <?php echo esc_attr($layout); ?>">
        	<div class="content-wrap" >
        		<div class="container">
        			<div class="main-area">
        				<div id="primary" class="primary-content-area">
        					<div class="primary-content-wrap">
                                <div class="page-head">
                   <?php open_mart_get_page_title();?>
                   <?php open_mart_breadcrumb_trail();?>
                    </div>
                            <?php woocommerce_content();?>	
                           </div> <!-- end primary-content-wrap-->
        				</div> <!-- end primary primary-content-area-->
        				<?php 
                 if( $layout != 'no-sidebar' ){
                     get_sidebar();
                   }
                 ?><!-- end sidebar-primary  sidebar-content-area-->
        			</div> <!-- end main-area -->
        		</div>
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>
