/**************/
// openmartLib
/**************/
(function ($) {
    var OpenmartLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
              
             var $this = this;
             $this.sticky_header();
             $this.sticky_sidebar_hide_toggle();
             $this.sideabr_toggle();
             $this.sticky_product_search();
             $this.product_slide_margin_padding();
             $this.pre_loader();
             $this.CatMenu();
             $this.DefaultMenu();
             $this.MainMenu();
             $this.StickMenu();
             $this.AboveMenu();
             $this.MobileMenuFunction();
                if(open_mart_obj.open_mart_move_to_top_optn){
                  $this.MoveToTop();
                }
             if($('.header__cat__item.dropdown').length!==0){
             $this.cat_toggle();
             }
             $this.MobilenavBar();
             $this.footer_toggle();
             $this.mobile_menu_with_woocat();
        },
        sticky_sidebar_hide_toggle: function () {
               if($('#sidebar-primary.opnshp-sticky-sidebar').length!==0){
                      var lastScrollTop = 0;
                      $(window).on('scroll', function() {
                          st = $(this).scrollTop();
                          if(st < lastScrollTop) {
                             $('.product-cat-list').hide();
                          }
                          lastScrollTop = st;
                      });
            }
      },
      sideabr_toggle: function () {
                    $(document).ready(function() {
                          if ($(window).width() <= 990) { 
                          $('.sidebar-content-area .widget-title').click(function() {
                          $(this).next().slideToggle();
                          $(this).toggleClass("open");
                          });
                         
                          }     
                });
                         
        },
    
        sticky_header: function () {
                    if(open_mart_obj.open_mart_sticky_header_effect=='scrldwmn'){
                    var position = jQuery(window).scrollTop(); 
                    var $headerBar = jQuery('header').height();
                    // should start at 0
                    jQuery(window).scroll(function() {
                        var scroll = jQuery(window).scrollTop();
                        if(scroll > position || scroll < $headerBar) {
                        jQuery(".sticky-header").removeClass("stick");
                        $(".search-wrapper").removeClass("open");
                        }else{
                        jQuery(".sticky-header").addClass("stick");
                        }
                        position = scroll;
                    });
                  }else{
                      jQuery(document).on("scroll", function(){
                      var $headerBar = jQuery('header').height();
                        if(jQuery(document).scrollTop() > $headerBar){
                            jQuery(".sticky-header").addClass("stick");
                          }else{
                            $(".search-wrapper").removeClass("open");
                            jQuery(".sticky-header").removeClass("stick");
                        } 
                       });
                  }
        },
        sticky_product_search: function () {
 
                  $('.prd-search').on('click', function (e){
                     e.preventDefault();
                     $(".search-wrapper").addClass("open");
                  });
                  $('.search-close-btn').on('click', function (e){
                     e.preventDefault();
                     $(".search-wrapper").removeClass("open");
                  });   
            
        },
        product_slide_margin_padding : function () {
            $(document).ready(function(){ 
              $(".thunk-product").hover(function() { 
                $('.thunk-slide .owl-stage-outer,.thunk-slide-widget .owl-stage-outer').css("margin", "-6px -6px -120px"); 
                $('.thunk-slide .owl-stage-outer,.thunk-slide-widget .owl-stage-outer').css("padding", "6px 6px 120px");
                $('.thunk-slide .owl-nav').css("top", "-47px");
                $('.thunk-vertical-cat-tab .thunk-slide .owl-nav').css("top", "33.5%");
                $('#thunk-feature-product-tab .thunk-slide .owl-nav').css("top", "-40px");
                $('.product-slide-widget .thunk-slide-widget .owl-nav').css("top", "45%");

              }, function() { 
                $('.thunk-slide .owl-stage-outer,.thunk-slide-widget .owl-stage-outer').css("margin", "0"); 
                $('.thunk-slide .owl-stage-outer,.thunk-slide-widget .owl-stage-outer').css("padding", "0"); 
                $('.thunk-slide .owl-nav').css("top", "-47px");
                $('.thunk-vertical-cat-tab .thunk-slide .owl-nav').css("top", "45%");  
                $('#thunk-feature-product-tab .thunk-slide .owl-nav').css("top", "-40px");
                $('.product-slide-widget .thunk-slide-widget .owl-nav').css("top", "45%"); 
             }); 
          });

          },
          cat_toggle : function () {
                    $('.header__cat__item.dropdown').on('click', function (e) {
                    e.preventDefault();
                    $(this).toggleClass('open');
                     if ($(e.target).closest(".header__cat__item").length === 0) {
                           $('.header__cat__item').toggleClass('open');
                        }
                    });

          },
           cat_toggle_close : function () {
                    $(document).on('click', function (e) {
                        if ($(e.target).closest(".header__cat__item").length === 0) {
                           $('.header__cat__item').toggleClass('open');
                        }
                    });

          },

          pre_loader : function () {
                               if(!$('body').hasClass('elementor-editor-active')){
                                $(window).on('load', function(){
                                setTimeout(removeLoader); //wait for page load PLUS two seconds.
                                });
                                function removeLoader(){
                                    $( ".open_mart_overlayloader" ).fadeOut(700, function(){
                                      // fadeOut complete. Remove the loading div
                                   $(".open-mart-pre-loader img" ).hide(); //makes page more lightweight
                                    });  
                                  }
                                }

          },
        CatMenu : function (){
                 // category toggle
                // $(".cat-toggle").click(function(){
                //               $(".product-cat-list").slideToggle();
                //               $(".toggle-icon", this).toggleClass("icon-circle-arrow-down");
                //               });
                             $(".product-cat-list").ThunkCatMenu({
                                 resizeWidth:'', // Set the same in Media query       
                                 animationSpeed:'fast', //slow, medium, fast
                                 accoridonExpAll:true//Expands all the accordion menu on click
                             });
                             $("#mobile-nav-tab-category .mobile").ThunkCatMenu({
                                 resizeWidth:'1024', // Set the same in Media query       
                                 animationSpeed:'fast', //slow, medium, fast
                                 accoridonExpAll:true//Expands all the accordion menu on click
                             });
        },
        DefaultMenu: function(){
                 $(".main-menu #menu-all-pages.open-mart-menu").openMartResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });
                 $("#mobile-nav-tab-menu #menu-all-pages.open-mart-menu").openMartResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });
        },
        MainMenu : function(){
                $(".main-menu #open-mart-menu").openMartResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            });
                $("#mobile-nav-tab-menu #open-mart-menu").openMartResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            });
        },
        StickMenu : function(){
                $("#open-mart-stick-menu").openMartResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
            });
        },
        AboveMenu : function(){
                $("header #open-above-menu").openMartResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });   
              $("#mobile-nav-tab-menu #open-above-menu").openMartResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
             });     
        
        },
       
        MobileMenuFunction : function(){
                 // close-button-active
                    
                        $('body').find('.sider').prepend('<div class="menu-close"><a href="#" class="menu-close-btn">close</a></div>');
                        $('.menu-close-btn').removeAttr("href");
                        //Menu close
                        $('.menu-close-btn,.open-mart-menu li a span.open-mart-menu-link').click(function(){
                        $('body').removeClass('mobile-menu-active');
                        $('body').removeClass('sticky-mobile-menu-active');
                        });
                         $('.menu-close-btn,.open-mart-menu li a span.open-mart-menu-link').keypress(function(){
                        $('body').removeClass('mobile-menu-active');
                        $('body').removeClass('sticky-mobile-menu-active');
                        });
                          // Esc key close menu
                      document.addEventListener( 'keydown', function( event ) {
                      if ( event.keyCode === 27 ) {
                        event.preventDefault();
                        document.querySelectorAll( '.mobile-menu-active' ).forEach( function( element ) {
                          jQuery('body').removeClass('mobile-menu-active');
                        }.bind( this ) );
                      
                      }
                    }.bind( this ) );
                    //ToggleBtn above Click
                    $('#menu-btn-abv').click(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-above-menu-active');
                       $('#open-above-menu').removeClass('hide-menu'); 
                       $('.sider.above').removeClass('open-mart-menu-hide');
                       $('.sider.main').addClass('open-mart-menu-hide');
                       openmartmenu.modalMenu.init(); 
                    });
                    //ToggleBtn main menu Click
                    $('#menu-btn,#mob-menu-btn').click(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-menu-active');
                       $('#open-mart-menu').removeClass('hide-menu');
                       $('.sider.above').addClass('open-mart-menu-hide');  
                       $('.sider.main').removeClass('open-mart-menu-hide');   
                       openmartmenu.modalMenu.init(); 
                    });
                     $('#menu-btn,#mob-menu-btn').keypress(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-menu-active');
                       $('#open-mart-menu').removeClass('hide-menu');
                       $('.sider.above').addClass('open-mart-menu-hide');  
                       $('.sider.main').removeClass('open-mart-menu-hide');    
                       openmartmenu.modalMenu.init();
                    });
                    //sticky
                    $('#menu-btn-stk').click(function (e){
                       e.preventDefault();
                       $('body').addClass('sticky-mobile-menu-active');
                       $('.sider.main').addClass('open-mart-menu-hide');
                       openmartmenu.modalMenu.init(); 
                      });
                    // default page
                    $('#menu-btn,#mob-menu-btn').click(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-menu-active');
                       $('#menu-all-pages').removeClass('hide-menu');  
                       openmartmenu.modalMenu.init();   
                    });
            },
            MoveToTop:function(){
                      /**************************************************/
                      // Show-hide Scroll to top & move-to-top arrow
                      /**************************************************/
                        jQuery("body").prepend("<a id='move-to-top' class='animate' href='#'><i class='fa fa-angle-up'></i></a>"); 
                        var scrollDes = 'html,body';  
                        /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
                        if(navigator.userAgent.match(/opera/i)){
                          scrollDes = 'html';
                        }
                        //show ,hide
                        jQuery(window).scroll(function (){
                          if(jQuery(this).scrollTop() > 160){
                            jQuery('#move-to-top').addClass('filling').removeClass('hiding');
                          }else{
                            jQuery('#move-to-top').removeClass('filling').addClass('hiding');
                          }
                        });
                        jQuery('#move-to-top').click(function(){
                            jQuery("html, body").animate({ scrollTop: 0 }, 600);
                            return false;
                        });
                     
                },
            
               MobilenavBar:function(){
                 //show ,hide
                        jQuery(window).scroll(function (){
                          if(jQuery(this).scrollTop() > 160){
                            jQuery('#openmart-mobile-bar').addClass('active').removeClass('hiding');
                              if($(window).scrollTop() + window.innerHeight >= document.body.scrollHeight){
                                  jQuery('#openmart-mobile-bar').removeClass('active');
                                }
                                $('window').on('touchmove', function(event) {
    //Prevent the window from being scrolled.
    event.preventDefault();

    if($(window).scrollTop() + window.innerHeight >= document.body.scrollHeight){
                                  jQuery('#openmart-mobile-bar').removeClass('active');
                                }
      });
                          }else{
                            jQuery('#openmart-mobile-bar').removeClass('active').addClass('hiding');
                          }

                        });
                   },
                                       
                    footer_toggle: function () {
                    $(document).ready(function() {
                          if ($(window).width() <= 990) { 
                          $('.widget-footer-wrap.thunk-toggle-widget .widget-title').click(function() {
                          $(this).next().slideToggle();
                          $(this).toggleClass("open");
                          });
                         
                          }     
                });
                         
        },        
        mobile_menu_with_woocat: function () {
                    $(document).ready(function() {
                        $('.mobile-nav-tabs li a').click(function(){
  
                         $('.mobile-tab-wrap .panel').hide();
                         $('.mobile-nav-tabs li a.active').removeClass('active');
                         $(this).addClass('active');
                         
                         var panel = $(this).attr('href');
                         $(panel).fadeIn(1000);
                         
                         return false;  // prevents link action
                        
                          });  // end click 

                         $('.mobile-nav-tabs li:first a').click();
                            
                });
                         
        },          
    }
 /* -----------------------------------------------------------------------------------------------
  Modal Menu
--------------------------------------------------------------------------------------------------- */
var openmartmenu = openmartmenu || {};
openmartmenu.modalMenu = {
  init: function() {
   
    this.keepFocusInModal();
  },
    keepFocusInModal: function(){
    var _doc = document;
    _doc.addEventListener( 'keydown', function( event ){
      var toggleTarget, modal, selectors, elements, menuType, bottomMenu, activeEl, lastEl, firstEl, tabKey, shiftKey,
        toggleTarget = '.mobile-nav-bar.sider';
        if(jQuery('.mobile-menu-active').length!=''){   
        selectors = 'a,.arrow';
        modal = _doc.querySelector( toggleTarget );
        elements = modal.querySelectorAll( selectors );
        elements = Array.prototype.slice.call( elements );
        if ( '.mobile-nav-bar.sider' === toggleTarget ){
          menuType = window.matchMedia( '(min-width: 1024px)' ).matches;
          menuType = menuType ? '.expanded-menu' : '.mobile-nav-tab-menu .open-mart-menu';
          elements = elements.filter( function( element ) {
            return null !== element.closest( menuType ) && null !== element.offsetParent;
          } );
          elements.unshift( _doc.querySelector( '.mobile-nav-bar .menu-close-btn' ) );
           $('.mobile-nav-tab-menu .open-mart-menu a,.mobile-nav-bar .menu-close-btn,.mobile-nav-bar .arrow').attr('tabindex',0); 
        }
        lastEl = elements[ elements.length - 1 ];
        firstEl = elements[0];
        activeEl = _doc.activeElement;
        tabKey = event.keyCode === 9;
        shiftKey = event.shiftKey;

        if ( ! shiftKey && tabKey && lastEl === activeEl ) {
          event.preventDefault();
          firstEl.focus();
        }

        if ( shiftKey && tabKey && firstEl === activeEl ) {
          event.preventDefault();
          lastEl.focus();
        }
      }

    } );
  }
}; // openmartmenu.modalMenu   
  OpenmartLib.init();
  $(".menu-close-btn").click(function(){
    // focus and select
   $('.menu-toggle .menu-btn').focus().select();
   $('.open-mart-menu a,.menu-close,.arrow').attr('tabindex',-1);
});
$(".menu-close-btn").keypress(function(){
   
    // focus and select
   $('.menu-toggle .menu-btn').focus().select();
   $('.open-mart-menu a,.menu-close,.arrow').attr('tabindex',-1);
});
})(jQuery);


