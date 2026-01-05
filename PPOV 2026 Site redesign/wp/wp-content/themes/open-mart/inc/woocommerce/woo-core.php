<?php
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package Open Mart WordPress theme
 */
// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ){
	return;
}
if ( ! function_exists( 'is_plugin_active' ) ){
         require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
/**
 * Open Mart WooCommerce Compatibility
 */
if ( ! class_exists( 'open_mart_Woocommerce_Ext' ) ) :
	/**
	 * open_mart_Woocommerce_Ext Compatibility
	 *
	 * @since 1.0.0
	 */
	class open_mart_Woocommerce_Ext{

        /**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
        /**
		 * Constructor
		 */
		public function __construct(){
		    add_action( 'wp_enqueue_scripts',array( $this, 'open_mart_add_scripts' ));	
		    add_action( 'wp_enqueue_scripts',array( $this, 'open_mart_add_style' ));	

		    add_filter( 'post_class', array( $this, 'open_mart_post_class' ) );
		   
		    add_action( 'after_setup_theme', array( $this, 'open_mart_common_actions' ), 999 );
		    add_filter( 'open_theme_js_localize', array( $this, 'open_mart_js_localize' ) );
		    add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'open_mart_product_flip_image' ), 10 );
		    // Register Store Sidebars.
			add_action( 'widgets_init', array( $this, 'open_mart_store_widgets_init' ), 15 );
			add_action( 'after_setup_theme', array( $this, 'open_mart_setup_theme' ) );
			// Replace Store Sidebars.
			add_filter( 'open_mart_get_sidebar', array( $this, 'open_mart_replace_store_sidebar' ) );
		    // quick view ajax.
			add_action( 'wp_ajax_alm_load_product_quick_view', array( $this, 'open_mart_load_product_quick_view_ajax' ) );
			add_action( 'wp_ajax_nopriv_alm_load_product_quick_view', array( $this, 'open_mart_load_product_quick_view_ajax' ) );
			add_action('open_mart_woo_quick_view_product_summary', array( $this, 'open_mart_woo_single_product_content_structure' ), 10, 1 );
			//shop
			 add_action('woocommerce_before_shop_loop', array($this, 'open_mart_before_shop_loop'), 35);
			 add_action('woocommerce_after_shop_loop_item', array($this, 'open_mart_list_after_shop_loop_item'),5);
			 // pagination
            add_action( 'open_mart_pagination_infinite', array( $this, 'shop_page_styles' ) );
            add_action( 'open_mart_pagination_infinite', array( $this, 'open_mart_common_actions' ), 999 );

            add_action( 'wp_ajax_open_mart_pagination_infinite', array( $this, 'open_mart_pagination_infinite' ) );
            
			add_action( 'wp_ajax_nopriv_open_mart_pagination_infinite', array( $this, 'open_mart_pagination_infinite' ) );
			// Custom Template Quick View.
			$this->open_mart_quick_view_content_actions();
			
		    add_action( 'wp', array( $this, 'open_mart_single_product_customization' ) );
           
            // Alter cross-sells display
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			if ( '0' != get_theme_mod( 'open_mart_cross_num_col_shw', '2' ) ) {
				add_action( 'woocommerce_cart_collaterals', array( $this, 'open_mart_cross_sell_display' ) );
			}


		 }
		 // woocommerce sidebar
		/**
		 * Store widgets init.
		 */
		function open_mart_store_widgets_init(){
			register_sidebar(array(
		              'name'          => esc_html__( 'WooCommerce Sidebar', 'open-mart' ),
		              'id'            => 'open-woo-shop-sidebar',
		              'description'   => esc_html__( 'Add widgets here to appear in your WooCommerce Sidebar.', 'open-mart' ),
		              'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="open-mart-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	        ) );
			register_sidebar(array(
		              'name'          => esc_html__( 'Product Sidebar', 'open-mart' ),
		              'id'            => 'open-woo-product-sidebar',
		              'description'   => esc_html__( 'This sidebar will be used on Single Product page.', 'open-mart' ),
		              'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="open-mart-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	        ) ); 
		}
		/**
		 * Assign shop sidebar for store page.
		 *
		 * @param String $sidebar Sidebar.
		 *
		 * @return String $sidebar Sidebar.
		 */
		function open_mart_replace_store_sidebar( $sidebar ){

			if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() ){
				$sidebar = 'open-woo-shop-sidebar';
			}elseif ( is_product() ){
				$sidebar = 'open-woo-product-sidebar';
			}
			return $sidebar;
		}
       /**
		 * Setup theme
		 *
		 * @since 1.0.3
		 */
		function open_mart_setup_theme(){
			// WooCommerce.
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
		/**
		 * Product Flip Image
		 */
		function open_mart_product_flip_image(){
			global $product;
			$hover_style = get_theme_mod( 'open_mart_woo_product_animation' );

			if ( 'swap' === $hover_style ) {

				$attachment_ids = $product->get_gallery_image_ids();

				if ( $attachment_ids ) {

					$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

					echo apply_filters( 'open_woocommerce_open_mart_product_flip_image', wp_get_attachment_image( reset( $attachment_ids ), $image_size, false, array( 'class' => 'show-on-hover' ) ) );
				}
			}
		}
		
		/**
		 * Post Class
		 *
		 * @param array $classes Default argument array.
		 *
		 * @return array;
		 */
		function open_mart_post_class( $classes ){
			if (!open_mart_is_blog()|| is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
                $classes[] = 'thunk-woo-product-list';
				$qv_enable = get_theme_mod( 'open_mart_woo_quickview_enable',true);
				if ( true == $qv_enable ){
					$classes[] = 'opn-qv-enable';

				}
			}
			if (is_shop() || is_product_taxonomy() ||  post_type_exists( 'product' )){
				$hover_style = get_theme_mod( 'open_mart_woo_product_animation' );
				if ( '' !== $hover_style ) {
					$classes[] = 'open-woo-hover-' . esc_attr($hover_style);
				}
				
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$single_product_tab_style = get_theme_mod( 'open_mart_single_product_tab_layout','horizontal' );
				if ( '' !== $single_product_tab_style ){
					$classes[] = 'open-single-product-tab-'.esc_attr($single_product_tab_style);
				}
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$shadow_style = get_theme_mod( 'open_mart_product_box_shadow' );
				if ( '' !== $shadow_style ){
					$classes[] = 'open-shadow-' . esc_attr($shadow_style);
				}	
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$shadow_hvr_style = get_theme_mod( 'open_mart_product_box_shadow_on_hover' );
				if ( '' !== $shadow_hvr_style ){
					$classes[] = 'open-shadow-hover-' . esc_attr($shadow_hvr_style);
				}	
			}
			if ( 'swap' === $hover_style && (!is_admin()) && !open_mart_is_blog()){
            global $product;
			$attachment_ids = $product->get_gallery_image_ids();
			if(count($attachment_ids) > '0'){
                $classes[] ='open-mart-swap-item-hover';
			  }
			

		    }
			return $classes;
		}
		/**
		 * Infinite Products Show on scroll
		 *
		 * @since 1.1.0
		 * @param array $localize   JS localize variables.
		 * @return array
		 */
		function open_mart_js_localize( $localize ){
			global $wp_query;
			$open_mart_pagination                   = esc_html(get_theme_mod( 'open_mart_pagination' ));
			$localize['ajax_url']                   = esc_url(admin_url( 'admin-ajax.php' ));
			$localize['is_cart']                    = is_cart();
			$localize['is_single_product']          = is_product();
			$localize['query_vars']                 = json_encode( $wp_query->query );
			$localize['shop_quick_view_enable']     = esc_html(get_theme_mod('open_mart_woo_quickview_enable','true' ));
			$localize['shop_infinite_nonce']        = wp_create_nonce( 'opn-shop-load-more-nonce' );
			$localize['shop_infinite_count']        = 2;
			$localize['shop_infinite_total']        = $wp_query->max_num_pages;
			$localize['shop_pagination']            = $open_mart_pagination;
			$localize['shop_infinite_scroll_event'] = $open_mart_pagination;
			$localize['query_vars']                 = json_encode( $wp_query->query );
			$localize['shop_no_more_post_message']  = apply_filters( 'open_mart_no_more_product_text', __( 'No more products to show.', 'open-mart' ) );
			return $localize;
			
		}
       /**
		 * Common Actions.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		function open_mart_common_actions(){
			// Shop Pagination.
			$this->shop_pagination();
			// Quick View.
			$this->open_mart_shop_init_quick_view();

		}
		/**
		 * Init Quick View
		 */
		function open_mart_shop_init_quick_view(){
			$qv_enable = get_theme_mod( 'open_mart_woo_quickview_enable','true' );
			if ( true == $qv_enable ){
				add_filter( 'open_theme_js_localize', array( $this, 'open_mart_open_mart_qv_js_localize' ) );
				add_action( 'quickview', array( $this,'open_mart_add_quick_view_on_img' ),15);
				// load modal template.
				add_action( 'wp_footer', array( $this, 'open_mart_quick_view_html' ) );
			}
		}
		/**
		 * Add Scripts
		 */
		function open_mart_add_scripts(){
		   wp_enqueue_script( 'open-mart-woocommerce-js', OPEN_MART_THEME_URI .'/inc/woocommerce/js/woocommerce.js', array( 'jquery' ), '1.0.0', true );
           $localize = array(
				'ajaxUrl'  => esc_url(admin_url( 'admin-ajax.php' )),
				//cat-tab-filter
				'open_mart_cat_adimg' =>  esc_url(get_theme_mod('open_mart_cat_adimg','')),
				'open_mart_cat_slider_optn' => (bool) get_theme_mod('open_mart_cat_slider_optn',false),
				
				//product-slider
				'open_mart_single_row_prdct_slide' => (bool) get_theme_mod('open_mart_single_row_prdct_slide',false),
				'open_mart_product_slider_optn' => (bool) get_theme_mod('open_mart_product_slider_optn',false),
				//cat-slider
				'open_mart_category_slider_optn' => (bool) get_theme_mod('open_mart_category_slider_optn',false),
				'open_mart_cat_slider_heading' => esc_html(get_theme_mod('open_mart_cat_slider_heading')),
				//product-list
				'open_mart_single_row_prdct_list' => (bool) get_theme_mod('open_mart_single_row_prdct_list',false),
				'open_mart_product_list_slide_optn' => (bool) get_theme_mod('open_mart_product_list_slide_optn',false),
				//cat-tab-list-filter
				'open_mart_single_row_slide_cat_tb_lst' => (bool) get_theme_mod('open_mart_single_row_slide_cat_tb_lst',false),

				//brand
				'open_mart_brand_slider_optn' => (bool) get_theme_mod('open_mart_brand_slider_optn',false),
				//big-feature-product
				'open_mart_feature_product_slider_optn' => (bool) get_theme_mod('open_mart_feature_product_slider_optn',false),
				//vert-tab-filter
				'open_mart_single_row_slide_cat_vt' => (bool) get_theme_mod('open_mart_single_row_slide_cat_vt',false),
				'open_mart_vt_cat_slider_optn' => (bool) get_theme_mod('open_mart_vt_cat_slider_optn',false),
				'open_mart_vt_banner_atply' => (bool) get_theme_mod('open_mart_vt_banner_atply',false),
				'open_mart_vt_column_optn' => (bool) get_theme_mod('open_mart_vt_column_optn',4),
				//vert-tab-filter2
				'open_mart_single_row_slide_cat_vt2' => (bool) get_theme_mod('open_mart_single_row_slide_cat_vt2',false),
				'open_mart_vt2_cat_slider_optn' => (bool) get_theme_mod('open_mart_vt2_cat_slider_optn',false),
				'open_mart_vt2_column_optn' => esc_html(get_theme_mod('open_mart_vt2_column_optn',4)),
				//category-filter
				'open_mart_cat_item_no'	=>	esc_html(get_theme_mod('open_mart_cat_item_no',10)),
			);
           wp_localize_script( 'open-mart-woocommerce-js', 'openmart',  $localize );	
           wp_enqueue_script('open-quick-view', OPEN_MART_THEME_URI.'inc/woocommerce/quick-view/js/quick-view.js', array( 'jquery' ), '', true );
           wp_localize_script('open-quick-view', 'openmartqv', array('ajaxurl' => esc_url(admin_url( 'admin-ajax.php' ))));
           // pagination
           wp_enqueue_script('open-mart-pagination', OPEN_MART_THEME_URI.'inc/woocommerce/js/shop-pagination.js', array( 'jquery' ), '', true );
            wp_localize_script('open-mart-pagination', 'openmartpagi', apply_filters( 'open_theme_js_localize',array('ajax_url' =>  esc_url(admin_url( 'admin-ajax.php' )))));
		   }
		/**
		 * Add Style
		 */
		function open_mart_add_style(){
        wp_enqueue_style( 'open-quick-view', OPEN_MART_THEME_URI. 'inc/woocommerce/quick-view/css/quick-view.css', null, '');
		}
        /**
		 * Quick view localize.
		 *
		 * @since 1.0
		 * @param array $localize   JS localize variables.
		 * @return array
		 */
		function open_mart_open_mart_qv_js_localize( $localize ){
			global $wp_query;
			$loader = '';
			if ( ! isset( $localize['ajax_url'] ) ){
				$localize['ajax_url'] =  esc_url(admin_url( 'admin-ajax.php', 'relative' ));
			}
			$localize['qv_loader'] = $loader;
			return $localize;
		}
		/****************/
        // add to compare
        /****************/
        function open_mart_add_to_compare($pid=''){
        if( is_plugin_active('yith-woocommerce-compare/init.php') ){
          return '<div class="thunk-compare"><span class="compare-list"><div class="woocommerce product compare-button"><a href="'.esc_url(home_url()).'?action=yith-woocompare-add-product&id='.esc_attr($pid).'" class="compare button" data-product_id="'.esc_attr($pid).'" rel="nofollow">'.__('Compare','open-mart').'</a></div></span></div>';

           }
        }
		/**
		 * Quick view on image
		 */
		function open_mart_add_quick_view_on_img(){
			global $product;
            $button='';
			$product_id = $product->get_id();

			// Get label.
			$label = __( 'Quick View', 'open-mart' );

			$button.='<div class="thunk-quik">
			             <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="' . esc_attr($product_id) . '">
                                      <span>'.esc_html($label).'</span>
                                    
                                   </a>
                            </span>
                          </div>';
            $button.= '</div>';
			$button = apply_filters( 'open_woo_add_quick_view_text_html', $button, $label, $product );
			echo $button;
		}
		/**
		 * Quick view html
		 */
		function open_mart_quick_view_html(){
			$this->open_mart_quick_view_dependent_data();
			require_once OPEN_MART_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-modal.php';
		}
		/**
		 * Quick view dependent data
		 */
		function open_mart_quick_view_dependent_data(){
			wp_enqueue_script( 'wc-add-to-cart-variation' );
			wp_enqueue_script( 'flexslider' );
		}
        /**
		 * Quick view ajax
		 */
		function open_mart_load_product_quick_view_ajax(){
			if ( ! isset( $_REQUEST['product_id'] ) ){
				die();
			}
			$product_id = intval( $_REQUEST['product_id'] );
			// set the main wp query for the product.
			wp( 'p=' . $product_id . '&post_type=product' );
			// remove product thumbnails gallery.
			remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
			ob_start();
			// load content template.
			require_once OPEN_MART_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-product.php';
			echo ob_get_clean();
			die();
		}
		/**
		 * Quick view actions
		 */
		public function open_mart_quick_view_content_actions(){
			// Image.
			add_action('open_mart_woo_qv_product_image', 'woocommerce_show_product_sale_flash', 10 );
			add_action('open_mart_woo_qv_product_image', array( $this, 'open_mart_qv_product_images_markup' ), 20 );
		} 
			
		/**
		 * Footer markup.
		 */
		function open_mart_qv_product_images_markup(){
           require_once OPEN_MART_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-product-image.php';
		}
        function open_mart_woo_single_product_content_structure(){
							/**
							 * Add Product Title on single product page for all products.
							 */
							do_action( 'open_mart_woo_single_title_before' );
							woocommerce_template_single_title();
							do_action( 'open_mart_woo_single_title_after' );
							/**
							 * Add Product Price on single product page for all products.
							 */
							do_action( 'open_mart_woo_single_price_before' );
							woocommerce_template_single_price();
							do_action( 'open_mart_woo_single_price_after' );
							/**
							 * Add rating on single product page for all products.
							 */
							do_action( 'open_mart_woo_single_rating_before' );
							woocommerce_template_single_rating();
							do_action( 'open_mart_woo_single_rating_after' );
							
							do_action( 'open_mart_woo_single_short_description_before' );
							woocommerce_template_single_excerpt();
							do_action( 'open_mart_woo_single_short_description_after' );
							
							do_action( 'open_mart_woo_single_add_to_cart_before' );
							woocommerce_template_single_add_to_cart();
							do_action( 'open_mart_woo_single_add_to_cart_after' );
							
							do_action( 'open_mart_woo_single_category_before' );
							woocommerce_template_single_meta();
							do_action( 'open_mart_woo_single_category_after' );
			
		}
        /**
		 * Single Product customization.
		 *
		 * @return void
		 */
		function open_mart_single_product_customization(){
			if ( ! is_product() ){
				return;
			}
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
            add_filter('woocommerce_product_description_heading', '__return_empty_string');
            add_filter('woocommerce_product_reviews_heading', '__return_empty_string');
            add_filter('woocommerce_product_additional_information_heading', '__return_empty_string');
            add_action( 'woocommerce_after_single_product_summary','woocommerce_template_single_meta',15 );
			
			/* Display Related Products */
			if ( ! get_theme_mod( 'open_mart_related_product_display',true ) ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			}
			/* Display upsell Products */
			if ( ! get_theme_mod( 'open_mart_upsell_product_display',true ) ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 20 );
			}

			if(get_theme_mod( 'open_mart_upsell_product_display',true )==true){
			  add_action( 'woocommerce_after_single_product_summary',array( $this, 'open_mart_woocommerce_output_upsells' ),15);
             }else{
             remove_action( 'woocommerce_after_single_product_summary',array( $this, 'open_mart_woocommerce_output_upsells' ));	
             }
             add_filter( 'woocommerce_output_related_products_args', array( $this, 'open_mart_related_no_col_product_show' ) );

		}
	    /*****************/
		// upsale product
       /*****************/
		function open_mart_woocommerce_output_upsells(){
		$upsell_columns = get_theme_mod('open_mart_upsale_num_col_shw','4');
		$upsell_no_product = get_theme_mod( 'open_mart_upsale_num_product_shw','4');	
        woocommerce_upsell_display($upsell_no_product,$upsell_columns); // Display max 3 products, 3 per row
         }
        /*****************************/ 
        // realted product argument pass
        /*****************************/ 
        function open_mart_related_no_col_product_show( $args){
		$rel_columns = get_theme_mod('open_mart_related_num_col_shw','4');
		$rel_no_product = get_theme_mod( 'open_mart_related_num_product_shw','4');
		$args['posts_per_page'] = $rel_no_product; // related products
	    $args['columns'] = $rel_columns; // arranged in columns
	    return $args;
		}   
		
        /**
		 * Shop page view list and grid view.
		 */
        function open_mart_before_shop_loop(){
        $viewshow = get_theme_mod('open_mart_prd_view','grid-view');
        
        echo '<div class="thunk-list-grid-switcher">';
        if($viewshow == 'grid-view'){
             echo '<a title="' . esc_attr__('Grid View', 'open-mart') . '" href="#" data-type="grid" class="thunk-grid-view selected"><i class="fa fa-th"></i></a>';

             echo '<a title="' . esc_attr__('List View', 'open-mart') . '" href="#" data-type="list" class="thunk-list-view"><i class="fa fa-bars"></i></a>';
        }else{
        	  echo '<a title="' . esc_attr__('Grid View', 'open-mart') . '" href="#" data-type="grid" class="thunk-grid-view"><i class="fa fa-th"></i></a>';

             echo '<a title="' . esc_attr__('List View', 'open-mart') . '" href="#" data-type="list" class="thunk-list-view selected"><i class="fa fa-bars"></i></a>';
        }
        echo '</div>';
        }
        // shop page content
        function open_mart_list_after_shop_loop_item(){
        ?>
           <div class="os-product-excerpt"><?php the_excerpt(); ?></div>
        <?php   
        }

		/**
		 * Change products per row for crossells.
		 */
		 function open_mart_cross_sell_display(){
			// Get count
			$count = get_theme_mod( 'open_mart_cross_num_product_shw', '4' );
			$count = $count ? $count : '4';
			// Get columns
			$columns = get_theme_mod( 'open_mart_cross_num_col_shw', '2' );
			$columns = $columns ? $columns : '2';
			// Alter cross-sell display
			woocommerce_cross_sell_display( $count, $columns );
		} 

        /**************************
		 * Shop Pagination.
		 **************************/
		function open_mart_pagination_infinite(){
         	check_ajax_referer( 'opn-shop-load-more-nonce', 'nonce' );
			do_action( 'open_mart_pagination_infinite' );
			$query_vars                   = json_decode( stripslashes( $_POST['query_vars'] ), true );
			$query_vars['paged']          = isset( $_POST['page_no'] ) ? absint( $_POST['page_no'] ) : 1;
			$query_vars['post_status']    = 'publish';
			$query_vars['posts_per_page'] = wc_get_default_products_per_row() * wc_get_default_product_rows_per_page();
			$query_vars                   = array_merge( $query_vars, wc()->query->get_catalog_ordering_args() );
			$posts = new WP_Query( $query_vars );

			if ( $posts->have_posts() ) {
				while ( $posts->have_posts() ) {
					$posts->the_post();

					/**
					 * Woocommerce: woocommerce_shop_loop hook.
					 *
					 * @hooked WC_Structured_Data::generate_product_data() - 10
					 */
					do_action( 'woocommerce_shop_loop' );

					
					wc_get_template_part( 'content', 'product' );
				}
			}
			wp_reset_query();

			wp_die();
        }

        function shop_pagination(){
			$pagination = get_theme_mod( 'open_mart_pagination' );
			if ( 'click' == $pagination || 'scroll' == $pagination){
				remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
				add_action( 'woocommerce_after_shop_loop', array( $this, 'open_mart_pagination' ), 10 );
			}
		}
       function open_mart_pagination( $output ){
			global $wp_query;
			$infinite_event = get_theme_mod( 'open_mart_pagination' );
			$load_more_text = get_theme_mod( 'open_mart_pagination_loadmore_btn_text',__( 'Load More','open-mart'));
			if ( '' === $load_more_text ){
				$load_more_text = __( 'Load More', 'open-mart' );
			}
			if ( $wp_query->max_num_pages > 1 ){
				?>
				<nav class="opn-shop-pagination-infinite">
					<span class="inifiniteLoader"><div class="loader"></div></span>
					<?php if ( 'click' == $infinite_event ){ ?>
						
							<div class="open-mart-load-more">
								<button id="load-more-product" class="load-more-product-button thunk-button opn-shop-load-more active" >
									<?php echo apply_filters( 'open_load_more_text', esc_html( $load_more_text ) ); ?>
								</button>
							</div>
							
					<?php } ?>
				</nav>
				<?php
			}
		}
        /**
		 * Shop page template.
		 *
		 * @since 1.0.0
		 * @return void if not a shop page.
		 */
		function shop_page_styles(){
			$is_ajax_pagination = $this->is_ajax_pagination();
			if ( ! ( is_shop() || is_product_taxonomy() ) && ! $is_ajax_pagination ) {
				return;
			}
		}

		/**
		 * Check if ajax pagination is calling.
		 *
		 * @return boolean classes
		 */
		function is_ajax_pagination(){
			$pagination = false;
			if ( isset( $_POST['open_infinite'] ) && wp_doing_ajax() && check_ajax_referer( 'opn-shop-load-more-nonce', 'nonce', false ) ){
				$pagination = true;
			}
			return $pagination;
		}


	}
endif;
open_mart_Woocommerce_Ext::get_instance();
