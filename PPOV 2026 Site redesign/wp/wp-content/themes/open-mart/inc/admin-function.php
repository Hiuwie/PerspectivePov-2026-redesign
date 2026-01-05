<?php 
/**
 * Common Function for Open Mart Theme.
 *
 * @package     Open Mart
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2019, Open Mart
 * @since       Open Mart 1.0.0
 */
 if ( ! function_exists( 'open_mart_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function open_mart_custom_logo(){
    if ( function_exists( 'the_custom_logo' ) ){?>
    	<div class="thunk-logo">
        <?php the_custom_logo();?>
        </div>
   <?php  }
}
endif;
/*********************/
// Menu 
/*********************/
function open_mart_header_menu_style(){
 $open_mart_main_header_layout = get_theme_mod('open_mart_main_header_layout','mhdrfour');
        	$menustyle='horizontal';	
        	return $menustyle;
		}
function open_mart_add_classes_to_page_menu( $ulclass ){
  return preg_replace( '/<ul>/', '<ul class="open-mart-menu" data-menu-style='.esc_attr(open_mart_header_menu_style()).'>', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'open_mart_add_classes_to_page_menu' );		
     // This theme uses wp_nav_menu() in two locations.
	  function openopen_mart_custom_menu(){
		     register_nav_menus(array(
		    'open-mart-above-menu'       => esc_html__( 'Header Above Menu', 'open-mart' ),
			'open-mart-main-menu'        => esc_html__( 'Main', 'open-mart' ),
			'open-mart-sticky-menu'        => esc_html__( 'Sticky', 'open-mart' ),
			'open-mart-footer-menu'  => esc_html__( 'Footer Menu', 'open-mart' ),
		) );
	  }
	  add_action( 'after_setup_theme', 'openopen_mart_custom_menu' );
	  // MAIN MENU
           function open_mart_main_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'open-mart-main-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="open-mart-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="open-mart-menu" class="open-mart-menu" data-menu-style='.esc_attr(open_mart_header_menu_style()).'>%3$s</ul>',
             ));
         }
          //STICKY MENU
           function open_mart_stick_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'open-mart-sticky-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="open-mart-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="open-mart-stick-menu" class="open-mart-menu" data-menu-style='.esc_attr(open_mart_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // HEADER ABOVE MENU
         function open_mart_abv_nav_menu(){
              wp_nav_menu( array('theme_location' => 'open-mart-above-menu', 
              'container'   => false, 
              'link_before' => '<span class="open-mart-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="open-above-menu" class="open-mart-menu" data-menu-style='.esc_attr(open_mart_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // FOOTER TOP MENU
         function open_mart_footer_nav_menu(){
              wp_nav_menu( array('theme_location' => 'open-mart-footer-menu', 
              'container'   => false, 
              'link_before' => '<span class="open-mart-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="open-footer-menu" class="open-bottom-menu">%3$s</ul>',
             ));
         }
function open_mart_add_classes_to_page_menu_default( $ulclass ){
return preg_replace( '/<ul>/', '<ul class="open-mart-menu" data-menu-style="horizontal">', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'open_mart_add_classes_to_page_menu_default' );
/************************/
// description Menu
/************************/
function open_mart_nav_description( $item_output, $item, $depth, $args ){
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . esc_html($item->description) . '</p>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'open_mart_nav_description', 10, 4 );

/*********************/
/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'open_mart_check_is_ie' ) ) :
	/**
	 * Function to check if it is Internet Explorer.
	 *
	 * @return true | false boolean
	 */
	function open_mart_check_is_ie() {

		$is_ie = false;

		$ua = htmlentities( $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8' );
		if ( strpos( $ua, 'Trident/7.0' ) !== false ) {
			$is_ie = true;
		}

		return apply_filters( 'open_mart_check_is_ie', $is_ie );
	}

endif;
/**
 * ratia image
 */
if ( ! function_exists( 'open_mart_replace_header_attr' ) ) :
	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function open_mart_replace_header_attr( $attr, $attachment, $size ){
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id == $attachment->ID ){
			$attach_data = array();
			if ( ! is_customize_preview() ){
				$attach_data = wp_get_attachment_image_src( $attachment->ID, 'open-logo-size' );


				if ( isset( $attach_data[0] ) ) {
					$attr['src'] = $attach_data[0];
				}
			}

			$file_type      = wp_check_filetype( $attr['src'] );
			$file_extension = $file_type['ext'];
			if ( 'svg' == $file_extension ) {
				$attr['class'] = 'open-logo-svg';
			}
			$retina_logo = get_theme_mod( 'open_mart_header_retina_logo' );
			$attr['srcset'] = '';
			if ( apply_filters( 'open_main_header_retina', true ) && '' !== $retina_logo ) {
				$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				$cutom_logo_url = $cutom_logo[0];

				if (open_mart_check_is_ie() ){
					// Replace header logo url to retina logo url.
					$attr['src'] = $retina_logo;
				}

				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . $retina_logo . ' 2x';

			}
		}

		return apply_filters( 'open_mart_replace_header_attr', $attr );
	}

endif;

add_filter( 'wp_get_attachment_image_attributes', 'open_mart_replace_header_attr', 10, 3 );

/********************************/
// responsive slider function
/*********************************/
if ( ! function_exists( 'open_mart_responsive_slider_funct' ) ) :
function open_mart_responsive_slider_funct($control_name,$function_name){
  $custom_css='';
           $control_value = get_theme_mod( $control_name );
           if ( empty( $control_value ) ){
                return '';
             }  
        if ( open_mart_is_json( $control_value ) ){
    $control_value = json_decode( $control_value, true );
    if ( ! empty( $control_value ) ) {
      foreach ( $control_value as $key => $value ){
        $custom_css .= call_user_func( $function_name, $value, $key );
      }
    }
    return $custom_css;
  }  
}
endif;
/********************************/
// responsive slider function add media query
/********************************/
if ( ! function_exists( 'open_mart_add_media_query' ) ) :
function open_mart_add_media_query( $dimension, $custom_css ){
  switch ($dimension){
      case 'desktop':
      $custom_css = '@media (min-width: 769px){' . $custom_css . '}';
      break;
      break;
      case 'tablet':
      $custom_css = '@media (max-width: 768px){' . $custom_css . '}';
      break;
      case 'mobile':
      $custom_css = '@media (max-width: 550px){' . $custom_css . '}';
      break;
  }

      return $custom_css;
}
endif;

/*************************/
//Get Page Title
/*************************/
function open_mart_get_page_title(){ ?>
			<?php if(is_search()){ ?> 
            <h2 class="thunk-page-top-title entry-title">
              	<?php printf( __( 'Search Results for: %s', 'open-mart' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>

			<?php }elseif (open_mart_is_blog() && !is_single() && !is_archive()){
				if( !(is_front_page()) ){
                    $our_title = get_the_title( get_option('page_for_posts', true) );
			echo '<h1 class="thunk-page-top-title entry-title">'.esc_html($our_title).'</h1>'; ?>
			<?php }else{
			echo'<h1 class="thunk-page-top-title entry-title">'.esc_html__('Blog','open-mart').'</h1>'; ?>
			<?php }	 
			 }elseif(is_archive() && (class_exists( 'WooCommerce' ) && !is_shop())){
                   echo the_archive_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
			<?php }elseif(class_exists( 'WooCommerce' ) && is_shop()) { ?>
				<h1 class="thunk-page-top-title entry-title"><?php woocommerce_page_title(); ?></h1> 
			<?php }elseif(is_page()) { 
				echo the_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
			<?php } ?>
   <?php 
}

/**************************/
// Dynamic Social Link
/**************************/
function open_mart_social_links(){
$social='';
$original_color = get_theme_mod('open_mart_social_original_color',false);
if($original_color==true){
$class_original='original-social-icon';
}else{
$class_original='';	
}
$social.='<ul class="social-icon ' .esc_attr($class_original). ' ">';
if($f_link = get_theme_mod('social_shop_link_facebook','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($f_link).'"><i class="fa fa-facebook"></i></a></li>';
endif;
if($l_link = get_theme_mod('social_shop_link_linkedin','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($l_link).'"><i class="fa fa-linkedin"></i></a></li>';
endif;
if($p_link = get_theme_mod('social_shop_link_pintrest','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($p_link).'"><i class="fa fa-pinterest"></i></a></li>';
endif;
if($t_link = get_theme_mod('social_shop_link_twitter','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($t_link).'"><i class="fa fa-twitter"></i></a></li>';
endif;
if($insta_link = get_theme_mod('social_shop_link_insta','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($insta_link).'"><i class="fa fa-instagram"></i></a></li>';
endif;
if($tum_link = get_theme_mod('social_shop_link_tumblr','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($tum_link).'"><i class="fa fa-tumblr"></i></a></li>';
endif;
if($y_link = get_theme_mod('social_shop_link_youtube','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($y_link).'"><i class="fa fa-youtube-play"></i></a></li>';
endif;
if($stumb_link = get_theme_mod('social_shop_link_stumbleupon','#')):
	$social.='<li><a target="_blank" href="'.esc_url($stumb_link).'">
	 <i class="fa fa-stumbleupon"></i></a></li>';
endif;
if($dribble_link = get_theme_mod('social_shop_link_dribble','#')):
	$social.='<li><a target="_blank" href="'.esc_url($dribble_link).'">
	 <i class="fa fa-dribbble"></i></a></li>';
endif;
$social.='</ul>';
return $social;
}

/**
 * Display Sidebars
 */
if ( ! function_exists( 'open_mart_get_sidebar' ) ){
	/**
	 * Get Sidebar
	 *
	 * @since 1.0.1.1
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function open_mart_get_sidebar( $sidebar_id ){
		 return $sidebar_id;
	}
}

/*****************************/
//add class active
function open_mart_body_classes( $classes ){
if(class_exists( 'WooCommerce' )):
$classes[] = 'woocommerce';
endif;
$open_mart_color_scheme = get_theme_mod( 'open_mart_color_scheme','opn-light' );
        if ( $open_mart_color_scheme == 'opn-dark' ){

            	 $classes[] = 'open-mart-dark';
         }
         if ( $open_mart_color_scheme == 'opn-light' ){

            	 $classes[] = 'open-mart-light';
         }
          if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
                 $classes[] = 'open-mart-wishlist-activate';
         } 
          if( get_theme_mod( 'open_mart_page_lyout_endtoend')==true){
                 $classes[] = 'open-mart-end-to-end';
         } 

return $classes;
}
add_filter( 'body_class', 'open_mart_body_classes' );
// default size in upload image
function open_mart_attachment_display_settings(){
    update_option( 'image_default_size', 'large' );
}
add_action( 'after_setup_theme', 'open_mart_attachment_display_settings' );

// Mobile Menu Wrapper Add.
function open_mart_mobile_menu_wrap(){
echo '<div class="open-mart-mobile-menu-wrapper"></div>';
}
add_action( 'wp_footer', 'open_mart_mobile_menu_wrap' );