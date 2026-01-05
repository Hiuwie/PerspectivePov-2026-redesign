<?php 
/**
 * Custom Style for Open Mart Theme.
 * @package     Open Mart
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2019, Open Mart
 * @since       Open Mart 1.0.0
 */
function open_mart_custom_style(){
$open_mart_style=""; 
$open_mart_style.= open_mart_responsive_slider_funct( 'open_mart_logo_width', 'open_mart_logo_width_responsive');

/**********************/
//Scheme Color
/**********************/
$open_mart_color_scheme = esc_html(get_theme_mod('open_mart_color_scheme','opn-light'));
$custombackground = esc_html(get_theme_mod('custom-background','#2f2f2f'));
if($open_mart_color_scheme=='opn-dark'){
 $open_mart_style.="body.open-mart-dark{
    background:{$custombackground};
    color:#888;
}
.woocommerce.open-mart-dark a.remove{
color:#fff!important;
}
.woocommerce.open-mart-dark #open-cart .woocommerce-mini-cart__empty-message{
color:#999;
}
body.open-mart-dark a{
color:#999;
}
body.open-mart-dark .top-header-bar ,body.open-mart-dark .top-header{
    border-bottom-color: #111;
}
body.open-mart-dark .below-footer{
border-top-color: #111;
}
body.open-mart-dark .top-header:before,body.open-mart-dark .top-footer:before, body.open-mart-dark .below-footer:before{
background:#111;
}
body.open-mart-dark .top-header-bar, body.open-mart-dark .top-header-bar a,body.open-mart-dark .top-footer, body.open-mart-dark .below-footer,body.open-mart-dark .top-footer a, body.open-mart-dark .below-footer a,body.open-mart-dark .widget-footer,body.open-mart-dark .widget-footer a{
    color: #999;
}
body.open-mart-dark .main-header:before,body.open-mart-dark .below-header:before,body.open-mart-dark #sidebar-primary .open-mart-widget-content,body.open-mart-dark .openmart-site section .content-wrap:before ,body.open-mart-dark .widget-footer:before,body.open-mart-dark #thunk-cat-tab:before{
background-color: #1F1F1F;
border-color:#1F1F1F;
}
body.open-mart-dark .top-footer {
    border-bottom-color: #1F1F1F;
}
body.open-mart-dark .main-header,body.open-mart-dark .main-header a,body.open-mart-dark #sidebar-primary .open-mart-widget-content a{
color:#999;
}

body.open-mart-dark .widget.woocommerce .widget-title, body.open-mart-dark .open-widget-content .widget-title, .widget-title{
color:#fff;
}
body.open-mart-dark .tagcloud a, body.open-mart-dark .thunk-tags-wrapper a,
body.open-mart-dark header #open-cart,
body.open-mart-dark .mobile-nav-bar.sider.left,
body.open-mart-dark .mobile-nav-tabs li a{
background:#111;
}
body.open-mart-dark .mobile-nav-tabs li a.active{
    background:#1F1F1F;
}
body.open-mart-dark .thunk-product,body.open-mart-dark .thunk-product-hover,body.open-mart-dark .thunk-product:hover .thunk-product-hover::before,body.open-mart-dark .thunk-product-list-section .thunk-list,body.open-mart-dark .thunk-product-tab-list-section .thunk-list{
background:#111;
}
body.open-mart-dark .thunk-title .title{
color:#fff;
}

body.open-mart-dark .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product,body.open-mart-dark .thunk-product:hover .thunk-product-hover {
    box-shadow: 0 0 15px #111;
}
body.open-mart-dark .thunk-cat-text,body.open-mart-dark .total-number{
background-color:#111;
    border:1px solid #111;
}

body.open-mart-dark .thunk-hglt-box h6,
body.open-mart-dark .cart-widget-heading h4{
color:#fff;
}
body.open-mart-dark .thunk-hglt-box p{
color:#999
}
body.open-mart-dark .thunk-highlight-col {
border-right-color: #111;
}

body.open-mart-dark  #search-box input[type='text'], body.open-mart-dark  select#product_cat,body.open-mart-dark #search-box form,body.open-mart-dark .below-header-bar #search-text::placeholder,input[type='text'], input[type='email'], input[type='url'], textarea, input[type='password'], input[type='tel'], input[type='search'] {
    border: 1px solid #eaeaea;
 background: #111;
 color:#999;
 border-color:#111;
}
#searchform [type='submit'] {
    border: 1px solid #589bda;
    background:#589bda;
}
body.open-mart-dark  .vert-brd:after {
border: 0.5px solid #666;
}

body.open-mart-dark .menu-category-list ul[data-menu-style='vertical'],body.open-mart-dark .menu-category-list ul[data-menu-style='vertical'] li ul.sub-menu,body.open-mart-dark .sticky-header:before, .search-wrapper:before,
body.open-mart-dark .mobile-nav-tabs li a:active{
background:#1F1F1F;
border-color:#1F1F1F;
color:#999;
}
body.open-mart-dark .header-icon a,body.open-mart-dark .thunk-wishlist a, body.open-mart-dark .thunk-compare a,body.open-mart-dark .sticky-header-col3 .thunk-icon .cart-icon a.cart-contents{
background: #111;
color:#999;
}
body.open-mart-dark .header-support-icon{
color:#999;
}
body.open-mart-dark .open-mart-menu ul.sub-menu,body.open-mart-dark .thunk-cat-tab ul.dropdown-link,body.open-mart-dark ul.dropdown-link > li >a{
background:#111;
color:#999;
}
body.open-mart-dark .open-mart-menu li ul.sub-menu li a:hover{
background:#2f2f2f;
}
body.open-mart-dark .open-mart-menu > li > a,body.open-mart-dark .open-mart-menu li ul.sub-menu li a,
body.open-mart-dark .mobile-nav-tab-category ul[data-menu-style=accordion] li a{
color:#fff;
}
body.open-mart-dark header__cat__item.dropdown a.more-cat,body.open-mart-dark .thunk-slide.owl-carousel .owl-nav button.owl-prev, body.open-mart-dark .thunk-slide.owl-carousel .owl-nav button.owl-next,body.open-mart-dark .open-mart-slide-post .owl-nav button.owl-prev, body.open-mart-dark .open-mart-slide-post .owl-nav button.owl-next,body.open-mart-dark .header__cat__item.dropdown a.more-cat{
    background: #111;
    border: 1px solid #111;
}

body.open-mart-dark .menu-toggle .menu-btn span{
background-color:#999;
}
body.open-mart-dark .thunk-product-cat-list li a{
border-bottom-color:#111;
}
body.open-mart-dark .slide-content-wrap {
    box-shadow: 0 0 15px #333;
}
body.custom-background.open-mart-dark {
    background: #2f2f2f;
    color: #888;
}

 body.open-mart-dark .thunk-vertical-cat-tab1 .thunk-heading-wrap:before, body.open-mart-dark .thunk-vertical-cat-tab2 .thunk-heading-wrap:before,body.open-mart-dark .thunk-vertical-cat-tab .thunk-heading-wrap{
background:#111;
}

body.open-mart-dark .thunk-vertical-cat-tab1:before,.thunk-vertical-cat-tab .tab-link li a.active, body.open-mart-dark .thunk-vertical-cat-tab .tab-link li a:hover,body.open-mart-dark .cart-content .count-item{
background:#1F1F1F;
}
body.open-mart-dark .thunk-vertical-cat-tab .tab-link li a{
color:#888;
}
body.open-mart-dark .openmart-site section .content-wrap, body.open-mart-dark .thunk-product-tab-section .thunk-cat-tab, body.open-mart-dark .thunk-vertical-cat-tab,body.open-mart-dark .thunk-vertical-cat-tab .thunk-heading-wrap,body.open-mart-dark .thunk-vertical-cat-tab .thunk-heading-wrap .thunk-heading,body.open-mart-dark .thunk-product-slide-section .thunk-product-slide, body.open-mart-dark .thunk-product-tab-list-section .tab-content,body.open-mart-dark .thunk-product-list-section .thunk-product-list,body.open-mart-dark .thunk-category-slide-section .thunk-cat-slide,body.open-mart-dark .thunk-cat-box,body.open-mart-dark .openmart-site .owl-carousel .owl-nav button.owl-prev, body.open-mart-dark .openmart-site .owl-carousel .owl-nav button.owl-next{
border-color:#3c3c3c!important;
}

body.open-mart-dark .below-header{
box-shadow:none;
}
body.open-mart-dark .cart-icon-wrap,body.open-mart-dark .cart-contents i{
background: #111;
color: #999;
}
.open-mart-dark .thunk-product-list-section .thunk-list .thunk-product-content .woocommerce-LoopProduct-title, .thunk-product-tab-list-section .thunk-list .thunk-product-content .woocommerce-LoopProduct-title, .open-mart-dark .thunk-product-tab-list-section .thunk-list .thunk-product-content .woocommerce-LoopProduct-title,.open-mart-dark.woocommerce ul.cart_list li a, .open-mart-dark.woocommerce ul.product_list_widget li a{
color:#999;
}
body.open-mart-dark.woocommerce ul.products li.product .woocommerce-loop-category__title, body.open-mart-dark.woocommerce ul.products li.product .woocommerce-loop-product__title, body.open-mart-dark.woocommerce ul.products li.product h3{
color:#999;
}
/**************************/
/*Shop Page*/
/**************************/
.open-mart-dark .page-head h1{
color:#fff;
}
.open-mart-dark #shop-product-wrap select,.open-mart-dark .thunk-list-grid-switcher a {
border: 1px solid #111;
background:#111;
}
.open-mart-dark .thunk-list-view .thunk-product .thunk-product-hover{
background:#111;
}
.open-mart-dark .thunk-list-view .thunk-product:hover .thunk-product-hover{
box-shadow:none;
}
.open-mart-dark.woocommerce nav.woocommerce-pagination .page-numbers{
background:#111;
}
.open-mart-dark .open-cart{
background:#1f1f1f;
}
.open-mart-dark .open-cart p.total, .open-mart-dark .widget p.total{
color:#fff;
}
/**************************/
/*Blog Page ,Pages and single pages*/
/**************************/
.open-mart-dark article.thunk-article,.open-mart-dark article.thunk-post-article, .open-mart-dark.single article, .no-results.not-found, .open-mart-dark #error-404,.open-mart-dark article.thunk-article,.open-mart-dark article.thunk-post-article, .open-mart-dark .single article, .open-mart-dark .no-results.not-found, .open-mart-dark #error-404,.open-mart-dark .thunk-page .thunk-content-wrap{
background:#1F1F1F;
}

.open-mart-dark h2.thunk-post-title a, .open-mart-dark h1.thunk-post-title a{
color:#fff;
}

.open-mart-dark .nav-links .page-numbers{
background:#111;
}

/**************************/
/*Product single pages*/
/**************************/
.open-mart-dark .thunk-single-product-summary-wrap,.open-mart-dark.woocommerce div.product .woocommerce-tabs .panel,.open-mart-dark .product_meta,.open-mart-dark section.related.products ul.products{
background:#1f1f1f;
}

.open-mart-dark.woocommerce div.product .product_title, .open-mart-dark section.related.products h2, .open-mart-dark section.upsells.products h2, .open-mart-dark.woocommerce #reviews #comments h2{
color:#fff;
}
.open-mart-dark .comment-form textarea,.open-mart-dark .comment-form input{
border-color:#111;
}
.open-mart-dark .woocommerce-error, .open-mart-dark .woocommerce-info, .open-mart-dark .woocommerce-message{
background-color: #111;
    color: #999;
}
.open-mart-dark .woocommerce-MyAccount-navigation ul li{
    border-bottom: 1px solid #000;
}
.open-mart-dark.woocommerce-account .woocommerce-MyAccount-navigation{
background:#111;
}
.open-mart-dark .ribbon-btn {
    background: #111;
  }
.thunk-loadContainer:before {
    background: #333;
  }
  .open-mart-dark.woocommerce div.product form.cart .variations select{
background:#111;
color:#999;
}

.open-mart-dark.woocommerce div.product div.images .woocommerce-product-gallery__wrapper .zoomImg {
    background-color: #111;
}
.open-mart-dark .thunk-woo-product-list .woocommerce-loop-product__title a{
color:#999;

}
.open-mart-dark .thunk-list-grid-switcher a:hover{
  color:#fff;
}
.open-mart-dark #alm-quick-view-modal .alm-lightbox-content,.open-mart-dark #alm-quick-view-content div.summary form.cart{
background:#222;
}

.open-mart-dark #alm-quick-view-content .product_meta{
    border: 1px solid #111;}

.open-mart-dark .woocommerce-product-details__short-description{
border-top:1px solid #111;
} 
 .open-mart-dark .search-wrapper:before {
  background:#111;
}

body.open-mart-dark .thunk-aboutus-page:before{
background:#1F1F1F;
}
@media screen and (max-width: 1024px){body.open-mart-dark .thunk-icon .cart-icon a.cart-contents{
background:#111;
color:#999;
}

.sider.left,.sider.right{
background-color: #111; 
}

}";

}
/**************************/
// Above Header
/**************************/
    $open_mart_above_brdr_clr = esc_html(get_theme_mod('open_mart_above_brdr_clr','#fff'));  
    $open_mart_style.=".top-header,body.open-mart-dark .top-header{border-bottom-color:{$open_mart_above_brdr_clr}}";
    $open_mart_style.= open_mart_responsive_slider_funct( 'open_mart_abv_hdr_hgt', 'open_mart_top_header_height_responsive');
    $open_mart_style.= open_mart_responsive_slider_funct( 'open_mart_abv_hdr_botm_brd', 'open_mart_abv_hdr_botm_brd_responsive');

/**************************/
// Above Fooetr
/**************************/
    $open_mart_above_frt_brdr_clr = esc_html(get_theme_mod('open_mart_above_frt_brdr_clr','#fff'));  
    $open_mart_style.=".top-footer,body.open-mart-dark .top-footer{border-bottom-color:{$open_mart_above_frt_brdr_clr}}";
    $open_mart_style.= open_mart_responsive_slider_funct( 'open_mart_above_ftr_hgt', 'open_mart_top_footer_height_responsive');
    $open_mart_style.= open_mart_responsive_slider_funct( 'open_mart_abv_ftr_botm_brd', 'open_mart_top_footer_border_responsive');

/**************************/
// Below Fooetr
/**************************/
    $open_mart_bottom_frt_brdr_clr = esc_html(get_theme_mod('open_mart_bottom_frt_brdr_clr','#fff'));  
    $open_mart_style.=".below-footer,body.open-mart-dark .below-footer{border-top-color:{$open_mart_bottom_frt_brdr_clr}}";
    $open_mart_style.= open_mart_responsive_slider_funct( 'open_mart_btm_ftr_hgt', 'open_mart_below_footer_height_responsive');
    $open_mart_style.= open_mart_responsive_slider_funct( 'open_mart_btm_ftr_botm_brd', 'open_mart_below_footer_border_responsive');
/*********************/
// Global Color Option
/*********************/
  $open_mart_theme_clr = esc_html(get_theme_mod('open_mart_theme_clr','#ff0052'));
  $open_mart_style.="a:hover, .open-mart-menu li a:hover, .open-mart-menu .current-menu-item a,.woocommerce .thunk-woo-product-list .price,.thunk-compare .compare-button a:hover,.thunk-product .yith-wcwl-wishlistexistsbrowse.show:before, .thunk-product .yith-wcwl-wishlistaddedbrowse.show:before,.woocommerce ul.products li.product.thunk-woo-product-list .price,.summary .yith-wcwl-add-to-wishlist.show .add_to_wishlist::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a::before,.woocommerce .entry-summary a.compare.button.added:before,.header-icon a:hover,.thunk-related-links .nav-links a:hover,.woocommerce .thunk-list-view ul.products li.product.thunk-woo-product-list .price,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,.thunk-wishlist a:hover, .thunk-compare a:hover,.woocommerce ul.cart_list li .woocommerce-Price-amount, .woocommerce ul.product_list_widget li .woocommerce-Price-amount,.open-mart-load-more button,.page-contact .leadform-show-form label,.thunk-contact-col .fa,.summary .yith-wcwl-wishlistaddedbrowse a, .summary .yith-wcwl-wishlistexistsbrowse a,.thunk-vertical-cat-tab .add_to_cart_button:after,#search-button,.thunk-hglt-icon,.sticky-header .open-mart-menu li a:hover,.woocommerce .thunk-single-product-summary-wrap .woocommerce-product-rating .star-rating,.mobile-nav-tabs li a.active,.woosw-btn:hover:before,.woosw-added:before,.wooscp-btn:hover:before{color:{$open_mart_theme_clr}}";

if($open_mart_color_scheme=='opn-dark'){
$open_mart_style.="body.open-mart-dark a:hover, body.open-mart-dark .open-mart-menu > li > a:hover, body.open-mart-dark .open-mart-menu li ul.sub-menu li a:hover,body.open-mart-dark .thunk-product-cat-list li a:hover,body.open-mart-dark .main-header a:hover, body.open-mart-dark #sidebar-primary .open-mart-widget-content a:hover,.open-mart-dark .thunk-woo-product-list .woocommerce-loop-product__title a:hover,body.open-mart-dark .thunk-vertical-cat-tab .add_to_cart_button:after,#search-button,.woosw-btn:hover:before,.woosw-added:before,.wooscp-btn:hover:before{color:{$open_mart_theme_clr}}";
}
  $open_mart_style.=".toggle-cat-wrap,.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.thunk-woo-product-list .thunk-quickview a,.cat-list a:after,.tagcloud a:hover, .thunk-tags-wrapper a:hover,.ribbon-btn,.btn-main-header,.page-contact .leadform-show-form input[type='submit'],.woocommerce .widget_price_filter .open-mart-widget-content .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .open-mart-widget-content .ui-slider .ui-slider-handle,.entry-content form.post-password-form input[type='submit'],#openmart-mobile-bar a,#openmart-mobile-bar,.post-slide-widget .owl-carousel .owl-nav button:hover,.woocommerce div.product form.cart .button,.thunk-big-slider.owl-carousel .owl-nav button.owl-prev:hover,
.thunk-big-slider.owl-carousel .owl-nav button.owl-next:hover,.th-newsletter .leadform-show-form input[type='submit'],.th-slide-button,.page-template-frontpage .owl-carousel button.owl-dot,.nav-links .page-numbers.current, .nav-links .page-numbers:hover,.openmart-site .owl-carousel .owl-nav button.owl-prev:hover, 
.openmart-site .owl-carousel .owl-nav button.owl-next:hover,.header-support-icon .callto-icon i,.menu-close-btn:hover:before,.menu-close-btn:hover:after,.woocommerce .open-cart .button.return{background:{$open_mart_theme_clr}}
  .open-cart p.buttons a:hover,
  .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .open-mart-slide-post .owl-nav button.owl-prev:hover, .open-mart-slide-post .owl-nav button.owl-next:hover,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,#searchform [type='submit']:hover,article.thunk-post-article .thunk-readmore.button,.open-mart-load-more button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.thunk-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .thunk-slide.thunk-brand .owl-nav button:hover,a.slide-btn{background-color:{$open_mart_theme_clr};} 
  .open-cart p.buttons a:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .open-mart-slide-post .owl-nav button.owl-prev:hover, .open-mart-slide-post .owl-nav button.owl-next:hover,body .woocommerce-tabs .tabs li a::before,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,#searchform [type='submit']:hover,article.thunk-post-article .thunk-readmore.button,.open-mart-load-more button,.thunk-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .thunk-slide.thunk-brand .owl-nav button:hover,.page-contact .leadform-show-form input[type='submit'],.post-slide-widget .owl-carousel .owl-nav button:hover,.thunk-product-tab-section .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product,#thunk-feature-product-tab .content-featured-wrap,body.open-mart-dark #thunk-feature-product-tab .content-featured-wrap,.tabbed-prod-widget .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product,body.open-mart-dark .tabbed-prod-widget .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product,.page-template-frontpage .owl-carousel button.owl-dot,a.slide-btn,.th-testimonial-img,.thunk-blog-part .post-thumb img,.thunk-nl-icon,.summary .woosw-added{border-color:{$open_mart_theme_clr}} 
    .loader {
    border-right: 4px solid {$open_mart_theme_clr};
    border-bottom: 4px solid {$open_mart_theme_clr};
    border-left: 4px solid {$open_mart_theme_clr};}";

    $open_mart_style.=".woocommerce .thunk-product-hover .os-product-excerpt+a,
    body.woocommerce.open-mart-dark .thunk-product-hover .os-product-excerpt+a,
    .woocommerce .thunk-product-hover .os-product-excerpt+a.add_to_cart_button,
    body.woocommerce.open-mart-dark .thunk-product-hover .os-product-excerpt+a.add_to_cart_button{
      background:{$open_mart_theme_clr};
      border-color:{$open_mart_theme_clr};
    } ";

    $open_mart_style.="@media screen and (max-width: 1024px){
      .tabbed-prod-widget .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product,body.open-mart-dark .tabbed-prod-widget .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product,.tabbed-prod-widget .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product, body.open-mart-dark .tabbed-prod-widget .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product{
        border-color:{$open_mart_theme_clr}
      }
    }
    ";
   //text
   $open_mart_text_clr = esc_html(get_theme_mod('open_mart_text_clr'));
   $open_mart_style.="body,.woocommerce-error, .woocommerce-info, .woocommerce-message {color: {$open_mart_text_clr}}";
   //title
   $open_mart_title_clr = esc_html(get_theme_mod('open_mart_title_clr'));
   $open_mart_style.=".site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.thunk-title .title,.thunk-hglt-box h6,h2.thunk-post-title a, h1.thunk-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a{color: {$open_mart_title_clr}}";
   //link
   $open_mart_link_clr = esc_html(get_theme_mod('open_mart_link_clr'));
   $open_mart_link_hvr_clr = esc_html(get_theme_mod('open_mart_link_hvr_clr'));
   $open_mart_style.="a,#open-above-menu.open-mart-menu > li > a{color:{$open_mart_link_clr}} a:hover,#open-above-menu.open-mart-menu > li > a:hover,#open-above-menu.open-mart-menu li a:hover{color:{$open_mart_link_hvr_clr}}";

    if($open_mart_color_scheme=='opn-dark'){
    $open_mart_style.="body.open-mart-dark a,body.open-mart-dark .thunk-product-cat-list li a,body.open-mart-dark .main-header a, body.open-mart-dark #sidebar-primary .open-mart-widget-content a,body.open-mart-dark .top-header-bar a, body.open-mart-dark .top-footer a, body.open-mart-dark .below-footer a, body.open-mart-dark .widget-footer a{color:{$open_mart_link_clr}}
    body.open-mart-dark, .open-mart-dark .woocommerce-error, .open-mart-dark .woocommerce-info, .open-mart-dark .woocommerce-message,body.open-mart-dark .top-header-bar, body.open-mart-dark .top-footer, body.open-mart-dark .below-footer,  body.open-mart-dark .widget-footer{color:{$open_mart_text_clr}}
    body.open-mart-dark .widget.woocommerce .widget-title, body.open-mart-dark .open-widget-content .widget-title, .widget-title,body.open-mart-dark .thunk-title .title,.open-mart-dark h2.thunk-post-title a, .open-mart-dark h1.thunk-post-title a{color:{$open_mart_title_clr}}";

    $open_mart_style.="body.open-mart-dark a:hover,body.open-mart-dark .thunk-product-cat-list li a:hover,body.open-mart-dark .main-header a:hover, body.open-mart-dark #sidebar-primary .open-mart-widget-content a:hover,body.open-mart-dark .top-header-bar a:hover, body.open-mart-dark .top-footer a:hover, body.open-mart-dark .below-footer a:hover, body.open-mart-dark .widget-footer a:hover,body.open-mart-dark .thunk-compare .compare-button a:hover,.open-mart-dark .thunk-woo-product-list .woocommerce-loop-product__title a:hover{color:{$open_mart_link_hvr_clr}}";
  }
  // loader
   $open_mart_loader_bg_clr = esc_html(get_theme_mod('open_mart_loader_bg_clr','#9c9c9'));
   $open_mart_style.=".open_mart_overlayloader{background-color:{$open_mart_loader_bg_clr}}";
  /**************************/
  //Above Header Color Option
  /**************************/
   $open_mart_above_hd_bg_clr = esc_html(get_theme_mod('open_mart_above_hd_bg_clr'));
   $open_mart_abv_header_background_image = esc_html(get_theme_mod('header_image'));
   $open_mart_style.=".top-header:before{background:{$open_mart_above_hd_bg_clr}}";
   $open_mart_style.= ".top-header{background-image:url($open_mart_abv_header_background_image);
   }";
   

    $open_mart_abv_content_txt_clr = esc_html(get_theme_mod('open_mart_abv_content_txt_clr'));
    $open_mart_abv_content_link_clr = esc_html(get_theme_mod('open_mart_abv_content_link_clr'));
    $open_mart_abv_content_link_hvr_clr = esc_html(get_theme_mod('open_mart_abv_content_link_hvr_clr'));
    $open_mart_style.= ".top-header .top-header-bar{color:{$open_mart_abv_content_txt_clr}} .top-header .top-header-bar a{color:{$open_mart_abv_content_link_clr}} .top-header .top-header-bar a:hover{color:{$open_mart_abv_content_link_hvr_clr}}";

    if($open_mart_color_scheme=='opn-dark'){
      $open_mart_style.="body.open-mart-dark .top-header:before{background: {$open_mart_above_hd_bg_clr};}";
       $open_mart_style.= "body.open-mart-dark .top-header .top-header-bar{color:{$open_mart_abv_content_txt_clr}} body.open-mart-dark .top-header .top-header-bar a{color:{$open_mart_abv_content_link_clr}} body.open-mart-dark .top-header .top-header-bar a:hover{color:{$open_mart_abv_content_link_hvr_clr}}";
    }
    //Hide yith if WPC SMART Icon 
if( (class_exists( 'WPCleverWoosw' ))){
$open_mart_style.=".woocommerce .entry-summary .yith-wcwl-add-to-wishlist{
  display:none;
}
";
}
if( (class_exists( 'WPCleverWooscp' ))){
$open_mart_style.=" .woocommerce .entry-summary a.compare.button{
  display:none;
}
";
}

    //Move to top 
$open_mart_move_to_top_bg_clr      = esc_html(get_theme_mod('open_mart_move_to_top_bg_clr'));
$open_mart_move_to_top_icon_clr    = esc_html(get_theme_mod('open_mart_move_to_top_icon_clr'));
$open_mart_style.="#move-to-top{background:{$open_mart_move_to_top_bg_clr};color:{$open_mart_move_to_top_icon_clr}}";

 if(get_theme_mod('open_mart_cart_mobile_disable')==true || get_theme_mod('open_mart_account_mobile_disable')==true || get_theme_mod('open_mart_whislist_mobile_disable')==true){
        $open_mart_style.="@media screen and (max-width: 767px){.mhdrdefault .below-header-bar{
        display:flex;
        }
        .mhdrdefault .below-header-col2{
        width:100%;
        }}";
}
/**************************/    
//Below Header
/**************************/
    $open_mart_below_hd_bg_clr = esc_html(get_theme_mod('open_mart_below_hd_bg_clr'));
    $open_mart_below_content_txt_clr = esc_html(get_theme_mod('open_mart_below_content_txt_clr'));
    $open_mart_below_content_link_clr = esc_html(get_theme_mod('open_mart_below_content_link_clr'));
    $open_mart_below_content_link_hvr_clr = esc_html(get_theme_mod('open_mart_below_content_link_hvr_clr'));
    $open_mart_style.= ".below-header:before,body.open-mart-dark .below-header:before{
      background:{$open_mart_below_hd_bg_clr};
    }";
    $open_mart_style.= ".below-header-col3,.below-header .header-support-icon,.below-header .cart-icon-wrap + .cart-content,.sprt-tel b{color:{$open_mart_below_content_txt_clr}} .below-header-col3 a{color:{$open_mart_below_content_link_clr}} .below-header-col3 a:hover{color:{$open_mart_below_content_link_hvr_clr}}";
    // menu
    $open_mart_main_header_menu_link_clr             = esc_html(get_theme_mod('open_mart_main_header_menu_link_clr'));
    $open_mart_main_header_menu_link_hvr_clr         = esc_html(get_theme_mod('open_mart_main_header_menu_link_hvr_clr'));
    // sub-meu
    $open_mart_main_header_sbmenu_bg_clr             = esc_html(get_theme_mod('open_mart_main_header_sbmenu_bg_clr'));
    $open_mart_main_header_sbmenu_link_clr           = esc_html(get_theme_mod('open_mart_main_header_sbmenu_link_clr'));
    $open_mart_main_header_sbmenu_link_hvr_clr       = esc_html(get_theme_mod('open_mart_main_header_sbmenu_link_hvr_clr'));
    $open_mart_main_header_sbmenu_link_hvr_bg_clr    = esc_html(get_theme_mod('open_mart_main_header_sbmenu_link_hvr_bg_clr'));
    $open_mart_style.= "@media screen and (min-width:1024px){
    .open-mart-menu > li > a{color:{$open_mart_main_header_menu_link_clr }} .open-mart-menu > li > a:hover,.open-mart-menu .current-menu-item a{color:{$open_mart_main_header_menu_link_hvr_clr}}
    .open-mart-menu ul.sub-menu{background:{$open_mart_main_header_sbmenu_bg_clr}} .open-mart-menu li ul.sub-menu li a:hover{background:{$open_mart_main_header_sbmenu_link_hvr_bg_clr}} .open-mart-menu li ul.sub-menu li a{color:{$open_mart_main_header_sbmenu_link_clr}} .open-mart-menu li ul.sub-menu li a:hover{color:{$open_mart_main_header_sbmenu_link_hvr_clr}}
    }";

return $open_mart_style;
}
//start logo width
function open_mart_logo_width_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.thunk-logo img,.sticky-header .logo-content img{
    max-width: ' . $v3 . 'px;
  }';
  $custom_css = open_mart_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
// top header height
function open_mart_top_header_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-header .top-header-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = open_mart_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function open_mart_abv_hdr_botm_brd_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-header{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = open_mart_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// top footer height
function open_mart_top_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer .top-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = open_mart_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function open_mart_top_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = open_mart_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// below footer height
function open_mart_below_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer .below-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = open_mart_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function open_mart_below_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer{
    border-top-width: ' . $v3 . 'px;
  }';
  $custom_css = open_mart_add_media_query( $dimension, $custom_css );
  return $custom_css;
}