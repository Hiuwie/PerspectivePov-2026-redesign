/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ){
/**
 * Dynamic Internal/Embedded Style for a Control
 */
function open_mart_add_dynamic_css( control, style ){
      control = control.replace( '[', '-' );
      control = control.replace( ']', '' );
      jQuery( 'style#' + control ).remove();

      jQuery( 'head' ).append(
            '<style id="' + control + '">' + style + '</style>'
      );
}
/**
 * Responsive Spacing CSS
 */
function open_mart_responsive_spacing( control, selector, type, side ){
	wp.customize( control, function( value ){
		value.bind( function( value ){
			var sidesString = "";
			var spacingType = "padding";
			if ( value.desktop.top || value.desktop.right || value.desktop.bottom || value.desktop.left || value.tablet.top || value.tablet.right || value.tablet.bottom || value.tablet.left || value.mobile.top || value.mobile.right || value.mobile.bottom || value.mobile.left ) {
				if ( typeof side != undefined ) {
					sidesString = side + "";
					sidesString = sidesString.replace(/,/g , "-");
				}
				if ( typeof type != undefined ) {
					spacingType = type + "";
				}
				// Remove <style> first!
				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();

				var desktopPadding = '',
					tabletPadding = '',
					mobilePadding = '';

				var paddingSide = ( typeof side != undefined ) ? side : [ 'top','bottom','right','left' ];

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['desktop'][sideValue] ) {
						desktopPadding += spacingType + '-' + sideValue +': ' + value['desktop'][sideValue] + value['desktop-unit'] +';';
					}
				});

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['tablet'][sideValue] ) {
						tabletPadding += spacingType + '-' + sideValue +': ' + value['tablet'][sideValue] + value['tablet-unit'] +';';
					}
				});

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['mobile'][sideValue] ) {
						mobilePadding += spacingType + '-' + sideValue +': ' + value['mobile'][sideValue] + value['mobile-unit'] +';';
					}
				});

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '-' + spacingType + '-' + sidesString + '">'
					+ selector + '	{ ' + desktopPadding +' }'
					+ '@media (max-width: 768px) {' + selector + '	{ ' + tabletPadding + ' } }'
					+ '@media (max-width: 544px) {' + selector + '	{ ' + mobilePadding + ' } }'
					+ '</style>'
				);

			} else {
				wp.customize.preview.send( 'refresh' );
				jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();
			}

		} );
	} );
}
/**
 * Apply CSS for the element
 */
function open_mart_css( control, css_property, selector, unit ){

	wp.customize( control, function( value ) {
		value.bind( function( new_value ) {

			// Remove <style> first!
			control = control.replace( '[', '-' );
			control = control.replace( ']', '' );

			if ( new_value ){
				/**
				 *	If ( unit == 'url' ) then = url('{VALUE}')
				 *	If ( unit == 'px' ) then = {VALUE}px
				 *	If ( unit == 'em' ) then = {VALUE}em
				 *	If ( unit == 'rem' ) then = {VALUE}rem.
				 */
				if ( 'undefined' != typeof unit) {
					if ( 'url' === unit ) {
						new_value = 'url(' + new_value + ')';
					} else {
						new_value = new_value + unit;
					}
				}

				// Remove old.
				jQuery( 'style#' + control ).remove();

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + css_property + ': ' + new_value + ' }'
					+ '</style>'
				);

			} else {

				wp.customize.preview.send( 'refresh' );

				// Remove old.
				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}
/*******************************/
// Range slider live customizer
/*******************************/
function openMartGetCss( arraySizes, settings, to ) {
    'use strict';
    var data, desktopVal, tabletVal, mobileVal,
        className = settings.styleClass, i = 1;

    var val = JSON.parse( to );
    if ( typeof( val ) === 'object' && val !== null ) {
        if ('desktop' in val) {
            desktopVal = val.desktop;
        }
        if ('tablet' in val) {
            tabletVal = val.tablet;
        }
        if ('mobile' in val) {
            mobileVal = val.mobile;
        }
    }

    for ( var key in arraySizes ) {
        // skip loop if the property is from prototype
        if ( ! arraySizes.hasOwnProperty( key )) {
            continue;
        }
        var obj = arraySizes[key];
        var limit = 0;
        var correlation = [1,1,1];
        if ( typeof( val ) === 'object' && val !== null ) {

            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }

            data = {
                desktop: ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0]) > limit ? ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0] ) : limit,
                tablet: ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) > limit ? ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) : limit,
                mobile: ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) > limit ? ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) : limit
            };
        } else {
            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }
            data =( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] > limit ? ( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] : limit;
        }
        settings.styleClass = className + '-' + i;
        settings.selectors  = obj.selectors;

        openMartSetCss( settings, data );
        i++;
    }
}
function openMartSetCss( settings, to ){
    'use strict';
    var result     = '';
    var styleClass = jQuery( '.' + settings.styleClass );
    if ( to !== null && typeof to === 'object' ){
        jQuery.each(
            to, function ( key, value ) {
                var style_to_add;
                if ( settings.selectors === '.container' ){
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '; max-width: 100%; }';
                } else {
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '}';
                }
                switch ( key ) {
                    case 'desktop':
                        result += style_to_add;
                        break;
                    case 'tablet':
                        result += '@media (max-width: 767px){' + style_to_add + '}';
                        break;
                    case 'mobile':
                        result += '@media (max-width: 544px){' + style_to_add + '}';
                        break;
                }
            }
        );
        if ( styleClass.length > 0 ) {
            styleClass.text( result );
        } else {
            jQuery( 'head' ).append( '<style type="text/css" class="' + settings.styleClass + '">' + result + '</style>' );
        }
    } else {
        jQuery( settings.selectors ).css( settings.cssProperty, to + 'px' );
    }
}
//*****************************/
// Logo
//*****************************/
wp.customize(
    'open_mart_logo_width', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'max-width',
                    propertyUnit: 'px',
                    styleClass: 'open-logo-width'
                };

                var arraySizes = {
                    size3: { selectors:'.thunk-logo img,.sticky-header .logo-content img', values: ['','',''] }
                };
                openMartGetCss( arraySizes, settings, to );
            }
        );
    }
);
//top header
wp.customize('open_mart_col1_texthtml', function(value){
         value.bind(function(to){
             $('.top-header-col1 .content-html').text(to);
         });
     });
 wp.customize('open_mart_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col2 .content-html').text(to);
         });
     });
 wp.customize('open_mart_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col3 .content-html').text(to);
         });
     });
open_mart_css( 'open_mart_abv_hdr_botm_brd','border-bottom-width', '.top-header', 'px' );
open_mart_css( 'open_mart_above_brdr_clr','border-bottom-color', '.top-header,body.open-mart-dark .top-header');
wp.customize(
    'open_mart_abv_hdr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: 'open_mart_abv_hdr_hgt'
                };

                var arraySizes = {
                    size3: { selectors:'.top-header .top-header-bar', values: ['','',''] }
                };
                openMartGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'open_mart_abv_hdr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: 'open_mart_abv_hdr_botm_brd'
                };

                var arraySizes = {
                    size3: { selectors:'.top-header', values: ['','',''] }
                };
                openMartGetCss( arraySizes, settings, to );
            }
        );
    }
);
/***************/
// MAIN HEADER
/***************/
wp.customize('open_mart_main_hdr_btn_txt', function(value){
         value.bind(function(to){
             $('.btn-main-header').text(to);
         });
});
wp.customize('open_mart_main_hdr_calto_txt', function(value){
         value.bind(function(to){
             $('.sprt-tel b').text(to);
         });
});
wp.customize('open_mart_main_hdr_calto_nub', function(value){
         value.bind(function(to){
             $('.sprt-tel a').text(to);
         });
});
wp.customize('open_mart_main_hdr_calto_nub', function(value){
         value.bind(function(to){
             $('.sprt-tel a').text(to);
         });
});
wp.customize('open_mart_main_hdr_calto_email', function(value){
         value.bind(function(to) {
             $('.sprt-eml a').text(to);
         });
     });

//cat slider heading
wp.customize('open_mart_cat_slider_heading', function(value){
         value.bind(function(to) {
             $('.thunk-category-slide-section .thunk-title .title').text(to);
         });
     });
//product slide
wp.customize('open_mart_product_slider_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-slide-section .thunk-title .title').text(to);
         });
     });
//product list
wp.customize('open_mart_product_list_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-list-section .thunk-title .title').text(to);
         });
     });
//product cat tab 
wp.customize('open_mart_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-tab-section .thunk-title .title').text(to);
         });
     });
//product cat tab list
wp.customize('open_mart_list_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-tab-list-section .thunk-title .title').text(to);
         });
     });
//Highlight 
wp.customize('open_mart_hglgt_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-highlight-section .thunk-title .title').text(to);
         });
     });
//Big Featured
wp.customize('open_mart_feature_product_heading', function(value){
         value.bind(function(to) {
             $('.thunk-feature-product-section .thunk-title .title').text(to);
         });
     });
//Ribbon Text
wp.customize('open_mart_ribbon_text', function(value){
         value.bind(function(to) {
             $('.thunk-ribbon-content h3').text(to);
         });
     });
//Ribbon Subheading
wp.customize('open_mart_ribbon_subheading', function(value){
         value.bind(function(to) {
             $('.thunk-ribbon-content h4').text(to);
         });
     });
wp.customize('open_mart_ribbon_btn_text', function(value){
         value.bind(function(to) {
             $('.thunk-ribbon-content a.ribbon-btn').text(to);
         });
     });
//Vertical tab 
wp.customize('open_mart_vt_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.thunk-vertical-product-tab-section .thunk-title .title').text(to);
         });
     });

/****************/
// footer
/****************/
wp.customize('open_mart_footer_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('open_mart_above_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('open_mart_above_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col3 .content-html').text(to);
         });
     });
open_mart_css( 'open_mart_above_frt_brdr_clr','border-bottom-color', 'body.open-mart-dark .top-footer,.top-footer');
wp.customize(
    'open_mart_above_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer .top-footer-bar', values: ['','',''] }
                };
                openMartGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'open_mart_abv_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer', values: ['','',''] }
                };
                openMartGetCss( arraySizes, settings, to );
            }
        );
    }
);

 wp.customize('open_mart_footer_bottom_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('open_mart_bottom_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('open_mart_bottom_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col3 .content-html').text(to);
         });
     });
open_mart_css( 'open_mart_bottom_frt_brdr_clr','border-top-color', '.below-footer,body.open-mart-dark .below-footer');
wp.customize(
    'open_mart_btm_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer .below-footer-bar', values: ['','',''] }
                };
                openMartGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'open_mart_btm_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-top-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer', values: ['','',''] }
                };
                openMartGetCss( arraySizes, settings, to );
            }
        );
    }
);
// loader
open_mart_css( 'open_mart_loader_bg_clr','background-color','.open_mart_overlayloader');
//*****************************/
// Global Color Custom Style
//*****************************/
wp.customize( 'open_mart_theme_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '';
                dynamicStyle += 'a:hover, .open-mart-menu li a:hover, .open-mart-menu .current-menu-item a,.woocommerce .thunk-woo-product-list .price,.thunk-product-hover .th-button.add_to_cart_button, .woocommerce ul.products .thunk-product-hover .add_to_cart_button,.thunk-compare .compare-button a:hover, .thunk-product-hover .th-button.add_to_cart_button:hover, .woocommerce ul.products .thunk-product-hover .add_to_cart_button :hover, .woocommerce .thunk-product-hover a.th-button:hover,.thunk-product .yith-wcwl-wishlistexistsbrowse.show:before, .thunk-product .yith-wcwl-wishlistaddedbrowse.show:before,.woocommerce ul.products li.product.thunk-woo-product-list .price,.summary .yith-wcwl-add-to-wishlist.show .add_to_wishlist::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a::before,.woocommerce .entry-summary a.compare.button.added:before,article.thunk-post-article .thunk-readmore.button:hover,.header-icon a:hover,.thunk-related-links .nav-links a:hover,.woocommerce .thunk-list-view ul.products li.product.thunk-woo-product-list .price,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,.woocommerce .thunk-product-hover a.th-button,.page-contact .leadform-show-form label,.thunk-contact-col .fa,#search-button,.thunk-hglt-icon{ color: ' + cssval + '} ';
                dynamicStyle += '.toggle-cat-wrap,.thunk-icon .cart-icon,.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.thunk-woo-product-list .thunk-quickview a,.btn-main-header,.woocommerce .thunk-product-hover .os-product-excerpt+a,body.woocommerce.open-mart-dark .thunk-product-hover .os-product-excerpt+a,.nav-links .page-numbers.current, .nav-links .page-numbers:hover,.header-support-icon .callto-icon i,.openmart-site .owl-carousel .owl-nav button.owl-prev:hover,.openmart-site .owl-carousel .owl-nav button.owl-next:hover,.menu-close-btn:hover:before,.menu-close-btn:hover:after,.woocommerce .open-cart .button.return,.woocommerce .thunk-product-hover .os-product-excerpt+a.add_to_cart_button,body.woocommerce.open-mart-dark .thunk-product-hover .os-product-excerpt+a.add_to_cart_button{ background: ' + cssval + '} ';
                dynamicStyle += '.open-cart p.buttons a:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .open-mart-slide-post .owl-nav button.owl-prev:hover, .open-mart-slide-post .owl-nav button.owl-next:hover,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,#searchform [type="submit"]:hover,.page-contact .leadform-show-form input[type="submit"],.page-template-frontpage .owl-carousel button.owl-dot{background-color: ' + cssval + '} ';
                dynamicStyle += '.thunk-product-hover .th-button.add_to_cart_button, .woocommerce ul.products .thunk-product-hover .add_to_cart_button,.open-cart p.buttons a:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .open-mart-slide-post .owl-nav button.owl-prev:hover, .open-mart-slide-post .owl-nav button.owl-next:hover,body .woocommerce-tabs .tabs li a::before,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,#searchform [type="submit"]:hover,.woocommerce .thunk-product-hover a.th-button,.page-contact .leadform-show-form input[type="submit"],.woocommerce .thunk-product-hover .os-product-excerpt+a.add_to_cart_button,body.woocommerce.open-mart-dark .thunk-product-hover .os-product-excerpt+a.add_to_cart_button{border-color: ' + cssval + '} ';
                dynamicStyle += '.woocommerce .thunk-product-hover .os-product-excerpt+a,body.woocommerce.open-mart-dark .thunk-product-hover .os-product-excerpt+a,a.slide-btn{ background: ' + cssval + '} ';                
                dynamicStyle += '.woocommerce .thunk-product-hover .os-product-excerpt+a,body.woocommerce.open-mart-dark .thunk-product-hover .os-product-excerpt+a,a.slide-btn{ border-color: ' + cssval + '} ';   
                open_mart_add_dynamic_css( 'open_mart_theme_clr', dynamicStyle );

        } );
    } );

open_mart_css( 'open_mart_text_clr','color','body,.woocommerce-error, .woocommerce-info, .woocommerce-message');
open_mart_css( 'open_mart_title_clr','color','.site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.thunk-title .title,.thunk-hglt-box h6,h2.thunk-post-title a, h1.thunk-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a');
open_mart_css( 'open_mart_link_clr','color','a,#open-above-menu.open-mart-menu > li > a');
open_mart_css( 'open_mart_link_hvr_clr','color','a:hover,#open-above-menu.open-mart-menu > li > a:hover,#open-above-menu.open-mart-menu li a:hover');

//Above Header
open_mart_css( 'open_mart_above_hd_bg_clr','background', '.top-header:before,body.open-mart-dark .top-header:before');
// above header bg image
wp.customize('header_image', function (value){
    value.bind(function (to){
        $('.top-header').css('background-image', 'url( '+ to +')');
    });
});
// above header content
open_mart_css( 'open_mart_abv_content_txt_clr','color', '.top-header .top-header-bar,body.open-mart-dark .top-header .top-header-bar');
open_mart_css( 'open_mart_abv_content_link_clr','color', '.top-header .top-header-bar a,body.open-mart-dark .top-header .top-header-bar a');
open_mart_css( 'open_mart_abv_content_link_hvr_clr','color', '.top-header .top-header-bar a:hover,body.open-mart-dark .top-header .top-header-bar a:hover');

//move to top
open_mart_css( 'open_mart_move_to_top_bg_clr','background', '#move-to-top');
open_mart_css( 'open_mart_move_to_top_icon_clr','color', '#move-to-top');

//Below Header
open_mart_css( 'open_mart_below_hd_bg_clr','background', '.below-header:before,body.open-mart-dark .below-header:before');
open_mart_css( 'open_mart_below_content_txt_clr','color', '.below-header-col3,.below-header .header-support-icon,.below-header .cart-icon-wrap + .cart-content,.sprt-tel b');
open_mart_css( 'open_mart_below_content_link_clr','color', '.below-header-col3 a');
open_mart_css( 'open_mart_below_content_link_hvr_clr','color', '.below-header-col3 a:hover');
wp.customize( 'open_mart_main_header_menu_link_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '@media screen and (min-width:1024px){.open-mart-menu > li > a{ color: ' + cssval + '} }';
                open_mart_add_dynamic_css( 'open_mart_main_header_menu_link_clr', dynamicStyle );
        } );
    } );
wp.customize( 'open_mart_main_header_menu_link_hvr_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '@media screen and (min-width:1024px){.open-mart-menu > li > a:hover,.open-mart-menu .current-menu-item a{ color: ' + cssval + '} }';
                open_mart_add_dynamic_css( 'open_mart_main_header_menu_link_hvr_clr', dynamicStyle );
        } );
    } );
wp.customize( 'open_mart_main_header_sbmenu_bg_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '@media screen and (min-width:1024px){.open-mart-menu ul.sub-menu{ background: ' + cssval + '} }';
                open_mart_add_dynamic_css( 'open_mart_main_header_sbmenu_bg_clr', dynamicStyle );
        } );
    } );
wp.customize( 'open_mart_main_header_sbmenu_link_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '@media screen and (min-width:1024px){.open-mart-menu li ul.sub-menu li a{ color: ' + cssval + '} }';
                open_mart_add_dynamic_css( 'open_mart_main_header_sbmenu_link_clr', dynamicStyle );
        } );
    } );
wp.customize( 'open_mart_main_header_sbmenu_link_hvr_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '@media screen and (min-width:1024px){.open-mart-menu li ul.sub-menu li a:hover{ color: ' + cssval + '} }';
                open_mart_add_dynamic_css( 'open_mart_main_header_sbmenu_link_hvr_clr', dynamicStyle );
        } );
    } );
wp.customize( 'open_mart_main_header_sbmenu_link_hvr_bg_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '@media screen and (min-width:1024px){.open-mart-menu li ul.sub-menu li a:hover{ background: ' + cssval + '} }';
                open_mart_add_dynamic_css( 'open_mart_main_header_sbmenu_link_hvr_bg_clr', dynamicStyle );
        } );
    } );
})( jQuery );