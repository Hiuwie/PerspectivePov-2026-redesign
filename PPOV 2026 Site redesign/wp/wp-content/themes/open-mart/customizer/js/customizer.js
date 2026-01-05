jQuery(document).ready(function(){
// jQuery('input[id=open_mart_banner_layout-bnr-two],input[id=open_mart_banner_layout-bnr-three],input[id=open_mart_banner_layout-bnr-four],input[id=open_mart_banner_layout-bnr-six],input[id=open_mart_banner_layout-bnr-seven]').attr("disabled",true);  
//Disable select option
jQuery('#_customize-input-open_mart_category_optn option[value="featured"],#_customize-input-open_mart_category_optn option[value="random"],#_customize-input-open_mart_woo_product_animation option[value="swap"],#_customize-input-open_mart_pagination option[value="scroll"],#_customize-input-open_mart_pagination option[value="click"],#_customize-input-open_mart_main_header_option option[value="button"],#_customize-input-open_mart_main_header_option option[value="widget"], #_customize-input-open_mart_blog_post_pagination option[value="click"], #_customize-input-open_mart_blog_post_pagination option[value="scroll"],#_customize-input-open_mart_sticky_header_effect option[value="scrldwmn"],#_customize-input-open_mart_ribbon_side option[value="left"],#_customize-input-open_mart_cat_adimg_side option[value="right"],#_customize-input-open_mart_vt_banner_position option[value="right"],#_customize-input-open_mart_vt_column_optn option[value="2"],#_customize-input-open_mart_vt_column_optn option[value="3"],#_customize-input-open_mart_product_list_img_side option[value="right"]').attr("disabled", true);
//Disable Hrader Layout
jQuery('input[id=open_mart_top_slide_layout-slide-layout-1], input[id=open_mart_top_slide_layout-slide-layout-2], input[id=open_mart_top_slide_layout-slide-layout-3],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-one],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-two],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-three],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-six],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-seven],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-eight],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-five],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-ten],input[id=open_mart_bottom_footer_widget_layout-ft-wgt-eleven],input[id=open_mart_main_header_layout-mhdrdefault],input[id=open_mart_main_header_layout-mhdrone],input[id=open_mart_main_header_layout-mhdrtwo],input[id=open_mart_main_header_layout-mhdrthree],input[id=open_mart_cat_slide_layout-cat-layout-2],input[id=open_mart_cat_slide_layout-cat-layout-3],input[id=open_mart_banner_layout-bnr-two],input[id=open_mart_banner_layout-bnr-four],input[id=open_mart_banner_layout-bnr-five],input[id=open_mart_banner_layout-bnr-six],input[id=open_mart_banner_layout-bnr-seven]').attr("disabled",true);    
//redirect
//above-header
jQuery( '.focus-customizer-menu-redirect-col1,.focus-customizer-menu-redirect-col2,.focus-customizer-menu-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel('nav_menus').focus();
} );
jQuery( '.focus-customizer-widget-redirect-col1,.focus-customizer-widget-redirect-col2,.focus-customizer-widget-redirect-col3,.focus-customizer-widget-redirect' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-social_media-redirect-col1,.focus-customizer-social_media-redirect-col2,.focus-customizer-social_media-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'open-mart-social-icon' ).focus();
} );
/* === Checkbox Multiple Control === */
    jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on(
        'change',
        function() {
   // alert('');
            checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    );

// section sorting
      jQuery( "#sortable" ).sortable({
        placeholder: "ui-sortable-placeholder", 
        cursor: 'move',
        opacity: 0.65,
        stop: function ( event, ui){
        var data = jQuery(this).sortable('toArray');
            //  console.log(data); // This should print array of IDs, but returns empty string/array      
            jQuery( this ).parents( '.customize-control').find( 'input[type="hidden"]' ).val( data ).trigger( 'change' );
        }
    });

 //hide show option
 wp.customize('open_mart_top_slide_layout', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='slide-layout-1'){
            jQuery( '#customize-control-open_mart_top_slider_link_clr' ).attr('style', 'display','none'); 
            }else{
             jQuery( '#customize-control-open_mart_top_slider_link_clr' ).css('display','block' );     
            }
        } );
      
    } );  

});


