<?php 
/**
 * Template Name: Homepage Template
 * @package ThemeHunk
 * @subpackage Open Mart
 * @since 1.0.0
 */
get_header();?>
   <div id="content">
        	<div class="content-wrap" >
        			<div class="main-area">
        				<div id="primary" class="primary-content-area">
        					<div class="primary-content-wrap">
                        <?php
                          if( shortcode_exists( 'open-mart' ) && class_exists( 'WooCommerce' )){
                             do_shortcode("[open-mart section='open_mart_show_frontpage']");
                          }
                        ?>
        					</div>  <!-- end primary-content-wrap-->
        				</div>  <!-- end primary primary-content-area-->
        				<!-- end sidebar-primary  sidebar-content-area-->
        			</div> <!-- end main-area -->
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();