<?php 
/**
 * Header Function for Open Mart theme.
 * 
 * @package     Open Mart
 * @author      Open Mart
 * @copyright   Copyright (c) 2019, Open Mart
 * @since       Open Mart 1.0.0
 */
/**************************************/
//Top Header function
/**************************************/
if ( ! function_exists( 'open_mart_top_header_markup' ) ){  
function open_mart_top_header_markup(){ 
$open_mart_above_header_layout     = get_theme_mod( 'open_mart_above_header_layout','abv-none');
$open_mart_above_header_col1_set   = get_theme_mod( 'open_mart_above_header_col1_set','text');
$open_mart_above_header_col2_set   = get_theme_mod( 'open_mart_above_header_col2_set','text');
$open_mart_above_header_col3_set   = get_theme_mod( 'open_mart_above_header_col3_set','text');
$open_mart_menu_open = get_theme_mod('open_mart_mobile_menu_open','left');
if($open_mart_above_header_layout!=='abv-none'):?> 
<div class="top-header">
      <div class="container">
        <?php if($open_mart_above_header_layout=='abv-three'){?>
        <div class="top-header-bar thnk-col-3">
          <div class="top-header-col1"> 
            <?php open_mart_top_header_conetnt_col1($open_mart_above_header_col1_set,$open_mart_menu_open); ?>
          </div>
          <div class="top-header-col2">
            <?php open_mart_top_header_conetnt_col2($open_mart_above_header_col2_set,$open_mart_menu_open); ?>
          </div>
          <div class="top-header-col3">
            <?php open_mart_top_header_conetnt_col2($open_mart_above_header_col3_set,$open_mart_menu_open); ?>
          </div>
        </div> 
    <?php } ?>
    <?php if($open_mart_above_header_layout=='abv-two'){?>
        <div class="top-header-bar thnk-col-2">
          <div class="top-header-col1"> 
            <?php open_mart_top_header_conetnt_col1($open_mart_above_header_col1_set,$open_mart_menu_open); ?>
          </div>
          <div class="top-header-col2">
            <?php open_mart_top_header_conetnt_col2($open_mart_above_header_col2_set,$open_mart_menu_open); ?>
          </div>
        </div> 
    <?php } ?>
    <?php if($open_mart_above_header_layout=='abv-one'){
      ?>
        <div class="top-header-bar thnk-col-1">
          <div class="top-header-col1"> 
            <?php open_mart_top_header_conetnt_col1($open_mart_above_header_col1_set,$open_mart_menu_open); ?>
          </div>
        </div> 
    <?php } ?>
      <!-- end top-header-bar -->
   </div>
</div>
<?php endif;
   }
}
add_action( 'open_mart_top_header', 'open_mart_top_header_markup' );

//************************************/
// top header col1 function
//************************************/
if ( ! function_exists( 'open_mart_top_header_conetnt_col1' ) ){ 
function open_mart_top_header_conetnt_col1($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('open_mart_col1_texthtml',  __( 'Add your content here', 'open-mart' )));?>
</div>
<?php }elseif($content=='menu'){
if ( has_nav_menu('open-mart-above-menu' ) ){?>
<!-- Menu Toggle btn-->
     <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
              <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="above open-mart-menu-hide  <?php echo esc_attr($mobileopen);?>">
        <div class="sider-inner">
        <?php open_mart_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
  }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'open-mart' );?></a>
 <?php }
}elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col1' ) ){
    dynamic_sidebar('top-header-widget-col1' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'open-mart' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo open_mart_social_links();?>
</div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
//************************************/
// top header col2 function
//************************************/
if ( ! function_exists( 'open_mart_top_header_conetnt_col2' ) ){ 
function open_mart_top_header_conetnt_col2($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('open_mart_col2_texthtml',  __( 'Add your content here', 'open-mart' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('open-mart-above-menu' ) ){?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="above open-mart-menu-hide <?php echo esc_attr($mobileopen);?>">
        <div class="sider-inner">
        <?php open_mart_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'open-mart' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col2' ) ){
    dynamic_sidebar('top-header-widget-col2' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'open-mart' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo open_mart_social_links();?>
</div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
//************************************/
// top header col3 function
//************************************/
if ( ! function_exists( 'open_mart_top_header_conetnt_col3' ) ){ 
function open_mart_top_header_conetnt_col3($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('open_mart_col3_texthtml',  __( 'Add your content here', 'open-mart' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('open-mart-above-menu' ) ){?>
<!-- Menu Toggle btn-->
        <nav>
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="above open-mart-menu-hide <?php echo esc_attr($mobileopen);?>">
        <div class="sider-inner">
        <?php open_mart_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'open-mart' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col2' ) ){
    dynamic_sidebar('top-header-widget-col2' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'open-mart' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo open_mart_social_links();?>
</div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
/**************************************/
//Below Header function
/**************************************/
if ( ! function_exists( 'open_mart_below_header_markup' ) ){  
function open_mart_below_header_markup(){ 
$main_header_layout = get_theme_mod('open_mart_main_header_layout','mhdrfour');
$main_header_opt = get_theme_mod('open_mart_main_header_option','none');
$open_mart_menu_alignment = get_theme_mod('open_mart_menu_alignment','center');
$open_mart_menu_open = get_theme_mod('open_mart_mobile_menu_open','left');
$open_mart_top_slide_layout = get_theme_mod('open_mart_top_slide_layout','slide-layout-4');
?> 
<div class="below-header  <?php echo esc_attr($main_header_layout);?> <?php echo esc_attr($open_mart_menu_alignment);?> <?php echo esc_attr($open_mart_top_slide_layout);?>">
      <div class="container">
        <div class="below-header-bar thnk-col-3">

            <?php  if ($main_header_layout == 'mhdrfour') { ?>
             <div class="below-header-col1">
            <?php  if ( class_exists( 'WooCommerce' ) ) { ?>
            <div class="menu-category-list">
              <div class="toggle-cat-wrap">
                  <p class="cat-toggle">
                    <span class="cat-icon"> 
                      <span class="cat-top"></span>
                       <span class="cat-top"></span>
                       <span class="cat-bot"></span>
                     </span>
                    <span class="toggle-title"><?php echo esc_html(get_theme_mod('open_mart_allcategory_text','All Departments'));?></span>
                    <span class="toggle-icon"></span>
                  </p>
              </div>
              <?php open_mart_product_list_categories(); ?>
             </div><!-- menu-category-list -->
           <?php } ?>
           </div>
          <div class="below-header-col2">
        <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
               <span class="icon-text"><?php esc_html_e('Menu','open-mart'); ?>
            </button>
        </div>
        <div class="main-menu  open-mart-menu-hide <?php echo esc_attr($open_mart_menu_open);?>">
        <div class="sider-inner">
     
          
          <?php if(has_nav_menu('open-mart-main-menu' )){ 
             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                    if(has_nav_menu('open-mart-above-menu' )){
                                open_mart_abv_nav_menu();
                       }
                    }  
                   open_mart_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="open-mart-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
      </div>
            <?php if($main_header_opt!=='none'):?>
          <div class="below-header-col3">
             <?php open_mart_main_header_optn();?>
          </div>
          <?php endif; 
          }else{ ?>
          <div class="below-header-col1">
             <?php  if ( class_exists( 'WooCommerce' ) ) { ?>
            <div class="menu-category-list">
              <div class="toggle-cat-wrap">
                  <p class="cat-toggle">
                    <span class="cat-icon"> 
                      <span class="cat-top"></span>
                       <span class="cat-top"></span>
                       <span class="cat-bot"></span>
                     </span>
                    <span class="toggle-title"><?php echo esc_html(get_theme_mod('open_mart_allcategory_text','All Departments'));?></span>
                    <span class="toggle-icon"></span>
                  </p>
              </div>
              <?php open_mart_product_list_categories(); ?>
             </div><!-- menu-category-list -->
           <?php } ?>
           </div>
           <div class="below-header-col2"> <?php if($main_header_layout=='mhdrthree'){?>
            <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
               <span class="icon-text"><?php esc_html_e('Menu','open-mart'); ?>
            </button>
        </div>
        <div class="main-menu  open-mart-menu-hide <?php echo esc_attr($open_mart_menu_open);?>">
        <div class="sider-inner">          
          <?php if(has_nav_menu('open-mart-main-menu' )){ 
             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                    if(has_nav_menu('open-mart-above-menu' )){
                                open_mart_abv_nav_menu();
                       }
                    }  
                   open_mart_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="open-mart-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
       <?php }else{ 
        if ( class_exists( 'WooCommerce' ) ){
            open_mart_product_search_box();
         }
      }?>
      </div>
           <div class="below-header-col3">
            <div class="thunk-icon">
             <?php open_mart_header_icon(); ?>  
                <?php if(class_exists( 'WooCommerce' )){ 
                        if(get_theme_mod('open_mart_cart_mobile_disable')==true){

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== true):
                          
                      ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'open_cart_count' );
                         do_action( 'open_mart_woo_cart' ); 
                         ?>
                       </div>
                      <?php  endif; }
                      elseif(get_theme_mod('open_mart_cart_mobile_disable')==false){?>
                           <div class="cart-icon" > 
                            <?php 
                               do_action( 'open_cart_count' );
                               do_action( 'open_mart_woo_cart' ); 
                               ?>
                          </div>
                     <?php  } } ?>  
                  </div>      
            </div>

          <?php } ?>

        </div> <!-- end main-header-bar -->
      </div>
    </div> <!-- end below-header -->
<?php }
}
add_action( 'open_mart_below_header', 'open_mart_below_header_markup' );
/**************************************/
//Main Header function
/**************************************/
if ( ! function_exists( 'open_mart_main_header_markup' ) ){ 
function open_mart_main_header_markup(){ 
$main_header_layout = get_theme_mod('open_mart_main_header_layout','mhdrfour');
$main_header_opt = get_theme_mod('open_mart_main_header_option','none');
$open_mart_menu_alignment = get_theme_mod('open_mart_menu_alignment','center');
$offcanvas = get_theme_mod('open_mart_canvas_alignment','cnv-none');
$open_mart_menu_open = get_theme_mod('open_mart_mobile_menu_open','left');
$is_pro = '';
$classes = get_body_class();
if (in_array('theme-open-mart-pro',$classes)) {
    $is_pro = 1;
}
else{
  $is_pro = 0;
}
?>
<div class="main-header <?php echo esc_attr($main_header_layout);?> <?php echo esc_attr($main_header_opt);?> <?php echo esc_attr($open_mart_menu_alignment);?>  <?php echo esc_attr($offcanvas);?>">
      <div class="container">
        <div class="desktop-main-header">
        <div class="main-header-bar thnk-col-3">
         <?php if ($main_header_layout == 'mhdrfour'){ ?>
         <div class="main-header-col1">
            <span class="logo-content">
            <?php open_mart_logo();?> 
          </span>
         <?php  if ($is_pro) {
            open_mart_show_off_canvas_sidebar_icon();
          } ?>
          </div>

           <div class="main-header-col2">
            <?php if ( class_exists( 'WooCommerce' ) ){
              open_mart_product_search_box();
          } ?>
           </div>

           <div class="main-header-col3">
            <div class="thunk-icon-market">
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
            </button>
        </div>
            <?php open_mart_header_icon_second(); ?> 
            <div class="cart-icon">
         <?php if(class_exists( 'WooCommerce' )){ 
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
          if(get_theme_mod('open_mart_cart_mobile_disable') == false){
                          
                      ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'open_cart_count' );
                         do_action( 'open_mart_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } }
                      else{?>
                           <div class="cart-icon" > 
                            <?php 
                               do_action( 'open_cart_count' );
                               do_action( 'open_mart_woo_cart' ); 
                               ?>
                          </div>
                     <?php  } } ?>
             </div>
          </div>
        </div>
       <?php  } 
       else{ ?>
          <div class="main-header-col1">
          <span class="logo-content">
            <?php open_mart_logo();?> 
          </span>
          <?php  if ($is_pro) {
            open_mart_show_off_canvas_sidebar_icon();
          } ?>
        </div>
          <div class="main-header-col2">
       <?php if($main_header_layout!=='mhdrthree'){?>
        <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
               <span class="icon-text"><?php esc_html_e('Menu','open-mart'); ?>
            </button>
        </div>
        <div class="main-menu  open-mart-menu-hide <?php echo esc_attr($open_mart_menu_open);?>">
        <div class="sider-inner">
     
          
          <?php if(has_nav_menu('open-mart-main-menu' )){ 
             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                    if(has_nav_menu('open-mart-above-menu' )){
                                open_mart_abv_nav_menu();
                       }
                    }  
                   open_mart_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="open-mart-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
      <?php }else{ 
        if ( class_exists( 'WooCommerce' ) ){
        open_mart_product_search_box();
       }
      }?>
      </div>
<?php if($main_header_opt!=='none'):?>
          <div class="main-header-col3">
             <?php open_mart_main_header_optn();?>
          </div>
<?php endif; ?>

<?php } ?>
      </div> <!-- end main-header-bar -->
      </div>    <!-- desktop bar -->
      
        <div class="responsive-main-header">
          <div class="main-header-bar thnk-col-3">
            <div class="main-header-col1">
            <span class="logo-content">
            <?php open_mart_logo();?> 
          </span>
          <?php  if ($is_pro) {
            open_mart_show_off_canvas_sidebar_icon();
          }
           ?>
          </div>

           <div class="main-header-col2">
            <?php if ( class_exists( 'WooCommerce' ) ){
              open_mart_product_search_box();
          } ?>
           </div>

           <div class="main-header-col3">
            <div class="thunk-icon-market">
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
            </button>
        </div>
            <?php open_mart_header_icon_second(); ?> 
            <div class="cart-icon">
         <?php if(class_exists( 'WooCommerce' )){ 
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
          if(get_theme_mod('open_mart_cart_mobile_disable') == false){
                          
                      ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'open_cart_count' );
                         do_action( 'open_mart_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } }
                      else{?>
                           <div class="cart-icon" > 
                            <?php 
                               do_action( 'open_cart_count' );
                               do_action( 'open_mart_woo_cart' ); 
                               ?>
                          </div>
                     <?php  } } ?>
             </div>
          </div>
        </div>
            </div>
          </div> <!-- responsive-main-header END -->
      </div>
    </div> 
<?php }
}
add_action( 'open_mart_main_header', 'open_mart_main_header_markup' );

function open_mart_main_header_optn(){
          $open_mart_main_header_option = get_theme_mod('open_mart_main_header_option','none');
          if($open_mart_main_header_option =='button'){?>
          <a href="<?php echo esc_url(get_theme_mod('open_mart_main_hdr_btn_lnk','#')); ?>" class="btn-main-header"><?php echo esc_html(get_theme_mod('open_mart_main_hdr_btn_txt','Button Text')); ?></a>
          <?php }
          elseif($open_mart_main_header_option =='callto'){ ?>
          <div class="header-support-wrap">
             <div class="header-support-icon">
                 <a class="callto-icon" href="tel:<?php echo esc_html(get_theme_mod('open_mart_main_hdr_calto_nub')); ?>">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </a>
              </div>
              <div class="header-support-content">
                <span class="sprt-tel"><b><?php echo esc_html(get_theme_mod('open_mart_main_hdr_calto_txt','Call To')); ?></b> <a href="tel:<?php echo esc_html(get_theme_mod('open_mart_main_hdr_calto_nub','+1800090098')); ?>"><?php echo esc_html(get_theme_mod('open_mart_main_hdr_calto_nub','+1800090098')); ?></a></span>
                <?php if (get_theme_mod('open_mart_main_hdr_calto_email','Info@gmail.com') != '') { ?>
                <span class="sprt-eml"><?php echo esc_html('Email :','open-mart');?> <a href="mailto:<?php echo esc_html(get_theme_mod('open_mart_main_hdr_calto_email','Info@gmail.com')); ?>"><?php echo esc_html(get_theme_mod('open_mart_main_hdr_calto_email','Info@gmail.com')); ?></a></span>
              <?php }  ?>
              </div>
          </div>
          <?php }elseif($open_mart_main_header_option =='widget'){?>
               <div class="header-widget-wrap">
                 <?php
                  if ( is_active_sidebar('main-header-widget') ){
                       dynamic_sidebar('main-header-widget');
                   }
                  ?>
               </div>
         <?php  }
}
/**************************************/
//logo & site title function
/**************************************/
if ( ! function_exists( 'open_mart_logo' ) ){
function open_mart_logo(){
$title_disable          = get_theme_mod( 'title_disable','enable');
$tagline_disable        = get_theme_mod( 'tagline_disable','enable');
$description            = get_bloginfo( 'description', 'display' );
open_mart_custom_logo(); 
if($title_disable!='' || $tagline_disable!=''){
if($title_disable!=''){ 
?>
<div class="site-title"><span>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
</span>
</div>
<?php
}
if($tagline_disable!=''){
if( $description || is_customize_preview() ):?>
<div class="site-description">
   <p><?php echo esc_html($description); ?></p>
</div>
<?php endif;
      }
    } 
  }
}
/***************************/
// Product search
/***************************/
function open_mart_product_search_box(){ ?>             
<div id='search-box' class="wow thmkfadeInDown" data-wow-duration="1s">
<form action='<?php echo esc_url( home_url( '/'  ) ); ?>' id='search-form' class="woocommerce-product-search" method='get' target='_top'>
   <input id='search-text' name='s' placeholder='<?php echo esc_attr(get_theme_mod('search_box_text',esc_attr_x( 'Search for Product', 'placeholder', 'open-mart' ))); ?>' class="form-control search-autocomplete" value='<?php echo get_search_query(); ?>' type='text' title='<?php echo esc_attr_x( 'Search for:', 'label', 'open-mart' ); ?>' />
   <div class="vert-brd" ></div>
   <?php 
if ( class_exists( 'WooCommerce' ) ):
$args = array(
   'taxonomy' => 'product_cat',
   'name' => 'product_cat',
   'value_field' => 'slug',
   'class' => 'something',
   'show_option_all'   => 'All Category',
);
wp_dropdown_categories( $args );
endif;
?>
                        <button id='search-button' value="<?php echo esc_attr_x( 'Submit','submit button', 'open-mart' ); ?>" type='submit'>   <span class="btn-text"><?php echo __('Search','open-mart'); ?> </span>      
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        <input type="hidden" name="post_type" value="product" />
                       </form>
 </div>                    
<?php }
/**********************************/
// header icon function
/**********************************/
function open_mart_header_icon(){
$whs_icon = get_theme_mod('open_mart_whislist_mobile_disable',false);
$acc_icon = get_theme_mod('open_mart_account_mobile_disable',false);
?>
<div class="header-icon">
     <?php 
    if( class_exists( 'YITH_WCWL' ) && (! class_exists( 'WPCleverWoosw' ))){
      if($whs_icon == true){ 
       if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== true):
        ?>
      <a class="whishlist" href="<?php echo esc_url( open_mart_whishlist_url() ); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
      
     <?php endif; }
     elseif($whs_icon == false){?>
        <a class="whishlist" href="<?php echo esc_url( open_mart_whishlist_url() ); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
    <?php  } }

       //WPC Smart Wishlist Icon
    if( class_exists( 'WPCleverWoosw' )){
      if($whs_icon == true){ 
       if (wp_is_mobile()!== true):
        ?>
      <a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
      
     <?php endif; }
     elseif($whs_icon == false){?>
        <a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
    <?php  } }

if (class_exists( 'WooCommerce' )) {
    if($acc_icon == true){
       if (wp_is_mobile()!== true):
        open_mart_account();
      endif;
       }elseif($acc_icon == false){
        open_mart_account();
       } 
     }?>
</div>
<?php } 
/**********************************/
// header icon function (Header Layout 2)
/**********************************/
function open_mart_header_icon_second(){
$whs_icon = get_theme_mod('open_mart_whislist_mobile_disable',false);
$acc_icon = get_theme_mod('open_mart_account_mobile_disable',false);
?>
<div class="header-icon">
     <?php 
    if( class_exists( 'YITH_WCWL' ) && (! class_exists( 'WPCleverWoosw' ))){
      
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
      if($whs_icon == false){ 
        ?>
      <a class="whishlist" href="<?php echo esc_url( open_mart_whishlist_url() ); ?>">
        <i  class="fa fa-heart-o" aria-hidden="true"></i></a>
      
     <?php } }
     else{?>
        <a class="whishlist" href="<?php echo esc_url( open_mart_whishlist_url() ); ?>">
          <i  class="fa fa-heart-o" aria-hidden="true"></i></a>
    <?php  } }

       //WPC Smart Wishlist Icon
    if( class_exists( 'WPCleverWoosw' )){
      if($whs_icon == true){ 
       if (wp_is_mobile()!== true):
        ?>
      <a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
      
     <?php endif; }
     elseif($whs_icon == false){?>
        <a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
    <?php  } }

      if (class_exists( 'WooCommerce' )) {
  if (wp_is_mobile() && $acc_icon == false){
      if ( is_user_logged_in() ) {
        echo $return = '<a class="account" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><i class="fa fa-user-o" aria-hidden="true"></i></a>';
      } 
      else {
       echo $return = '<span><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><i class="fa fa-lock" aria-hidden="true"></i></a></span>';
      }
      
  }else{
         if ( is_user_logged_in() ) {
  echo $return = '<a class="account" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><i class="fa fa-user-o" aria-hidden="true"></i></a>';
  } 
 else {
  echo $return = '<span><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><i class="fa fa-lock" aria-hidden="true"></i></a></span>';
}
       }
} ?>     
</div>
<?php } 
/**************************/
//PRELOADER
/**************************/
if( ! function_exists( 'open_mart_preloader' ) ){
 function open_mart_preloader(){
 if (( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) ||
                isset( $_REQUEST['elementor-preview'] )){
      return;
 }else{    
    $open_mart_preloader_enable = get_theme_mod('open_mart_preloader_enable',false);
    $open_mart_preloader_image_upload = get_theme_mod('open_mart_preloader_image_upload',open_mart_PRELOADER);
    if($open_mart_preloader_enable==true){ ?>
    <div class="open_mart_overlayloader">
    <div class="open-mart-pre-loader"><img src="<?php echo esc_url($open_mart_preloader_image_upload);?>"></div>
    </div> 
   <?php }
   }
 }

}
add_action('open_mart_site_preloader','open_mart_preloader');

 /**********************/
 // Sticky Header
 /**********************/
 if( ! function_exists( 'open_mart_sticky_header_markup' )){
 function open_mart_sticky_header_markup(){ 
 $open_mart_menu_open = get_theme_mod('open_mart_mobile_menu_open','left'); ?>
<div class="sticky-header">
   <div class="container">
        <div class="sticky-header-bar thnk-col-3">
           <div class="sticky-header-col1">
               <span class="logo-content">
                  <?php open_mart_logo();?> 
              </span>
           </div>
           <div class="sticky-header-col2">
             <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-stk">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
            </button>
        </div>
        <div class="sider main  open-mart-menu-hide  <?php echo esc_attr($open_mart_menu_open); ?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('open-mart-sticky-menu' )){ 
             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                    if(has_nav_menu('open-mart-above-menu')){
                      open_mart_abv_nav_menu();
                    }     
                  }  
                open_mart_stick_nav_menu();
              }else{
                wp_page_menu(array( 
                 'items_wrap'  => '<ul class="open-mart-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
           </div>
            <div class="sticky-header-col3">
              <div class="thunk-icon">
        
                <div class="header-icon">
                  <a class="prd-search" href="#"><i class="fa fa-search"></i></a>     
                     <?php 
                     if( class_exists( 'WPCleverWoosw' )){ ?>
                        <a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
                 <?php    }
                    if( class_exists( 'YITH_WCWL' ) && (! class_exists( 'WPCleverWoosw' ))){
                      ?>
                      <a class="whishlist" href="<?php echo esc_url( open_mart_whishlist_url() ); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
                     <?php } 
                     if(class_exists( 'WooCommerce' )){
                        open_mart_account();
                      }
                       ?>
                </div>
             <?php if(class_exists( 'WooCommerce' )){ ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'open_cart_count' );
                         do_action( 'open_mart_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } ?> 
                  </div>
           </div>
        </div>

   </div>
</div>
      <div class="search-wrapper">
                     <div class="container">
                      <div class="search-close"><a class="search-close-btn"></a></div>
                     <?php  if ( class_exists( 'WooCommerce' ) ){
                              open_mart_product_search_box();
                          } ?>
                       </div>
       </div> 
 <?php }
}
if(get_theme_mod('open_mart_sticky_header',false)==true):
add_action('open_mart_sticky_header','open_mart_sticky_header_markup');
endif;

/*****************/
/*mobile nav bar*/
/*****************/

function openmart_mobile_navbar(){?>
<div id="openmart-mobile-bar">
  <ul>
    
    <li><a class="gethome" href="<?php echo esc_url( get_home_url() ); ?>"><i class="icon below fa fa-home" aria-hidden="true"></i></a></li>
     <?php 
    if( class_exists( 'YITH_WCWL' ) && (! class_exists( 'WPCleverWoosw' ))) { ?>
    <li><a class="whishlist" href="<?php echo esc_url( open_mart_whishlist_url() ); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a></li>
    <?php } 
      if( class_exists( 'WPCleverWoosw' )){ ?>
        <li><a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a></li>
    <?php  }
     ?>
    <li>
            <a href="#" class="menu-btn" id="mob-menu-btn">
              
                <i class="icon fa fa-bars" aria-hidden="true"></i>
                
            </a>
 
       </li>
    <li><?php open_mart_account();?></li>
    <li><?php 
           do_action( 'open_cart_count' ); 
        ?> 
    </li>
    
  </ul>
</div>
<?php }
add_action( 'wp_footer', 'openmart_mobile_navbar' );

/// mobile panel
function open_cart_mobile_panel(){
$open_mart_mobile_menu_open = get_theme_mod('open_mart_mobile_menu_open','left');
  ?>
      <div class="mobile-nav-bar sider main  open-mart-menu-hide <?php echo esc_attr($open_mart_mobile_menu_open); ?>">
        <div class="sider-inner">
          <div class="mobile-tab-wrap">
             <?php if (class_exists( 'WooCommerce' )) { ?>
            <div class="mobile-nav-tabs">
                <ul>
                  <li class="primary active" data-menu="primary">
                     <a href="#mobile-nav-tab-menu"><?php _e('Menu','open-mart');?></a>
                  </li>
                  <li class="categories" data-menu="categories">
                    <a href="#mobile-nav-tab-category"><?php _e('Categories','open-mart');?></a>
                  </li>
                </ul>
            </div>
          <?php } ?>
            <div id="mobile-nav-tab-menu" class="mobile-nav-tab-menu panel">
          <?php if(has_nav_menu('open-mart-main-menu' )){ 
                    if(has_nav_menu('open-mart-above-menu' )){
                         open_mart_abv_nav_menu();
                       }
                        open_mart_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="open-mart-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
           </div>
           <?php if (class_exists( 'WooCommerce' )) { ?>
           <div id="mobile-nav-tab-category" class="mobile-nav-tab-category panel">
             <?php open_mart_product_list_categories_mobile(); ?>
           </div>
         <?php } ?>
          </div>
           <div class="mobile-nav-widget">
             <?php open_mart_main_header_optn();?>
           </div>
        </div>
      </div>
<?php 
}
add_action( 'open_mart_main_header', 'open_cart_mobile_panel' );