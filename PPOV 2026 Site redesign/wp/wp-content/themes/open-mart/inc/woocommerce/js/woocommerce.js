/********************************/
// OpenMartWooLib Custom Function
/********************************/
(function ($) {
    var OpenMartWooLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
            var $this = this;
            $this.listGridView();
             $this.cartDropdown();
            $this.AddtoCartQuanty();
            $this.AutoCompleteSearch();
            $this.cartopen();
            $this.OffCanvas();
            if($('.os-product-excerpt').length > 0){
            $this.product_descr_excerpt();
          }
           
          },
        cartopen: function(){
            $(document).on('click','a.cart-contents',function(e){
            e.preventDefault();
            $('body').toggleClass('cart-pan-active');
            $('.cart-overlay').toggleClass('open');
            });

            $('.cart-close-btn').click(function (e){
                $('body').removeClass('cart-pan-active');
                $('.cart-overlay').removeClass('open');
            });

             $('body').click(function(evt){    
                if(evt.target.class == ".open-cart")
                  return;
                if($(evt.target).closest('.open-cart').length)
                  return;             
                  $('body').removeClass('cart-pan-active'); 
                  $('.cart-overlay').removeClass('open');
        
            });


        },
        listGridView: function (){

            var wrapper = $('.thunk-list-grid-switcher');
            var class_name = '';
            wrapper.find('a').on('click', function (e){
              e.preventDefault();
                var type = $(this).attr('data-type');
                switch (type){
                    case "list":
                        class_name = "thunk-list-view";
                        break;
                    case "grid":
                        class_name = "thunk-grid-view";
                        break;
                    default:
                        class_name = "thunk-grid-view";
                        break;
                }
                if (class_name != ''){
                    $(this).closest('#shop-product-wrap').attr('class', '').addClass(class_name);
                    $(this).closest('.thunk-list-grid-switcher').find('a').removeClass('selected');
                    $(this).addClass('selected');
                }
              
            });
        },
        OffCanvas: function () {
                   var off_canvas_wrapper = $( '.open-mart-off-canvas-sidebar-wrapper');
                   var opn_shop_offcanvas_filter_close = function(){
                  $('html').css({
                       'overflow': '',
                       'margin-right': '' 
                     });
                  $('html').removeClass( 'open-mart-enabled-overlay' );
                 };
                 var trigger_class = 'off-canvas-button';
                 if( 'undefined' != typeof openmart_Off_Canvas && '' != openmart_Off_Canvas.off_canvas_trigger_class ){
                       trigger_class = openmart_Off_Canvas.off_canvas_trigger_class;
                 }
                 $(document).on( 'click', '.' + trigger_class, function(e){
                        e.preventDefault();
                       var innerWidth = $('html').innerWidth();
                       $('html').css( 'overflow', 'hidden' );
                       var hiddenInnerWidth = $('html').innerWidth();
                       $('html').css( 'margin-right', hiddenInnerWidth - innerWidth );
                       $('html').addClass( 'open-mart-enabled-overlay' );
                 });

                off_canvas_wrapper.on('click', function(e){
                   if ( e.target === this ) {
                     opn_shop_offcanvas_filter_close();
                     }
                });

                off_canvas_wrapper.find('.open-mart-filter-close').on('click', function(e) {
                 opn_shop_offcanvas_filter_close();
               });
             },
      cartDropdown: function (){
           /* woo, wc_add_to_cart_params */
              if ( typeof wc_add_to_cart_params === 'undefined' ){
               return false;
              }

               $( document ).on( 'click', '.ajax_add_to_cart', function(e){ // Remove button selector
                 e.preventDefault();
                var data1 = {
                 'action': 'open_mart_product_count_update'
                };
                 $.post(
                 woocommerce_params.ajax_url, // The AJAX URL
                 data1, // Send our PHP function
                 function(response_data){
                 $('a.cart-content').html(response_data);
                 $( ".return.wc-backward" ).remove();
                 $('body').toggleClass('cart-pan-active');
                 $('.cart-overlay').toggleClass('open');
                 }
               );
             });
          // Ajax remove cart item
               $( document ).on( 'click', 'a.remove', function(e){ // Remove button selector
               e.preventDefault();
          // AJAX add to cart request
              var $thisbutton = $( this );
              if ( $thisbutton.is( '.remove' ) ){
                //Check if the button has a product ID
               if ( ! $thisbutton.attr( 'data-product_id' ) ){ 
              return true;
               }
            }
              $product_id = $thisbutton.attr( 'data-product_id' );
              var data = {'product_id':$product_id,
             'action': 'open_mart_product_remove'
            };
            $.post(
            woocommerce_params.ajax_url, // The AJAX URL
            data, // Send our PHP function
            function(response){
            $('.open-quickcart-dropdown').html(response);
            var data = {
           'action': 'open_mart_product_count_update'
            };
           $.post(
           woocommerce_params.ajax_url, // The AJAX URL
           data, // Send our PHP function
           function(response_data){
           $('a.cart-content').html(response_data);

           }
         );
       }
   );
      return false;
  });
},  
       AddtoCartQuanty: function (){
                $('form.cart').on( 'click', 'button.plus, button.minus', function(){
                // Get current quantity values
                var qty = $( this ).siblings('.quantity').find( '.qty' );
                var val = parseFloat(qty.val()) ? parseFloat(qty.val()) : '0';
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));
                // Change the value if plus or minus
                if ( $(this).is( '.plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }
                }
                 
            });

        },
        
        AutoCompleteSearch:function(){
               var searchRequest;
                   $('.search-autocomplete').autocomplete({
                   classes: {
                       "ui-autocomplete" : "ui-my-class"
                   },
                   minChars:3,
                   source: function( request, response, term){
                   var matcher = $.ui.autocomplete.escapeRegex( request.term );
                  $.ajax({
                      type: 'POST',
                      dataType: 'json',
                      url: openmart.ajaxUrl,
                      data: {
                       action :'open_mart_search_site',
                       'match':matcher,                
                       },
        success: function(res){
              response(res.data);
         },
        
      });
    }
  });
},   

product_descr_excerpt:function(){
$('.os-product-excerpt *').each(function(){
    var truncated = $(this).text().substr(0, 54);
    //Updating with ellipsis if the string was truncated
    $(this).text(truncated+(truncated.length<54?'':' ..'));
  
  $(".os-product-excerpt *").not(":first-child").hide();
});
},   
              
      }
    OpenMartWooLib.init();
})(jQuery);