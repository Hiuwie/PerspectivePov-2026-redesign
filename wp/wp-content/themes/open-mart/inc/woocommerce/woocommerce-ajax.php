<?php
/**
 * Perform WooCommerce function with Ajax
 *
 * @package Open WordPress theme
 */
add_action( 'wp_ajax_open_mart_product_remove', 'open_mart_product_remove' );
add_action( 'wp_ajax_nopriv_open_mart_product_remove', 'open_mart_product_remove' );
function  open_mart_product_remove(){
    global $woocommerce;
    $cart = $woocommerce->cart;
    foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item){
    if($cart_item['product_id'] == $_POST['product_id'] ){
        // Remove product in the cart using  cart_item_key.
        $cart->remove_cart_item($cart_item_key);
        woocommerce_mini_cart();
        exit();
      }
    }
  die();
}

function open_mart_product_count_update(){
   global $woocommerce; 
  ?>
<span class="cart-content"><?php echo sprintf ( _n( '<span class="count-item">%d</span>', '<span class="count-item">%d</span>', WC()->cart->get_cart_contents_count(),'open-mart' ), WC()->cart->get_cart_contents_count(),'open-mart'); ?><?php echo WC()->cart->get_cart_total(); ?>
</span>
<?php 
  die();
}
add_action( 'wp_ajax_open_mart_product_count_update', 'open_mart_product_count_update' );
add_action( 'wp_ajax_nopriv_open_mart_product_count_update', 'open_mart_product_count_update' );

/**
 * Live autocomplete search feature.
 *
 * @since 1.0.0
 */
function open_mart_search_site(){
   $results = new WP_Query( array(
    'post_type'     => 'product',
    'post_status'   => 'publish',
    'nopaging'      => true,
    'posts_per_page'=> 100,
    's'             => $_POST['match'],
  ) );
  $items = array();
  if ( !empty( $results->posts ) ) {
    foreach ( $results->posts as $result ) {
     $id = $result->ID; 
     $temp_array = array();
     $temp_array = $result->post_title;
     $items[]=$temp_array;
     
    }
  }
 wp_send_json_success( $items );
 die();
}
add_action( 'wp_ajax_open_mart_search_site',        'open_mart_search_site' );
add_action( 'wp_ajax_nopriv_open_mart_search_site', 'open_mart_search_site' );