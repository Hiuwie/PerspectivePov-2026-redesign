// Smooth scrolling ------------------------------------------------------------

$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

    // Add padding top to show content behind navbar
    // $('body').css('padding-top', $('.navbar').outerHeight() + 'px')

    // Detect scroll top or down
    // if ($('.smart-scroll').length > 0) { // check if element exists
//         var last_scroll_top = 0;
//         $(window).on('scroll', function() {
//             scroll_top = $(this).scrollTop();
//             if(scroll_top < last_scroll_top) {
//                 $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
//             }
//             else {
//                 $('.smart-scroll').removeClass('scrolled-up').addClass('scrolled-down');
//             }
//             last_scroll_top = scroll_top;
//         });
//     }

    // Auto-populate contact form from pricing buttons
    $('.pricing-card .cta-secondary, .pricing-card .cta-primary').on('click', function() {
        var packageName = $(this).closest('.pricing-card').find('h3').text();
        $('#contact-form textarea[name="message"]').val('Hi, I\'m interested in the ' + packageName + ' package. Please provide more details.');
    });

    // Auto-populate contact form from final CTA "Get a Free Quote" button
    $('.final-cta-section .cta-primary').on('click', function() {
        $('#contact-form textarea[name="message"]').val('Hi, I\'m interested in getting a free quote. Please provide more details.');
    });

    // Auto-populate from home page "Get a Free Quote" button (stores in localStorage)
    $('.hero-cta-buttons .cta-primary').on('click', function() {
        localStorage.setItem('autoMessage', 'Hi, I\'m interested in getting a free quote. Please provide more details.');
    });

    // Check for stored message on page load
    var storedMessage = localStorage.getItem('autoMessage');
    if (storedMessage) {
        $('#contact-form textarea[name="message"]').val(storedMessage);
        localStorage.removeItem('autoMessage');
    }

    // Update copyright year dynamically
    var currentYear = new Date().getFullYear();
    $('.social-footer p').html('copyright&copy; ' + currentYear + ' Perspective Point of view');

});



// Navigation hide on scroll js ----------------------------------------------------------------------------

      var prevScrollpos = window.pageYOffset;
      window.onscroll = function() {
      var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
          document.getElementById("navbar-trigger").style.top = "0";
        } else {
          document.getElementById("navbar-trigger").style.top = "-100px";
        }
        prevScrollpos = currentScrollPos;
      };


// Bootstrap Navigation hide on scroll js ----------------------------------------------------------------------------

// Gallery image viewer -------------------------------------------------------------------------------------------------------------

baguetteBox.run(".gallery", {
    animation: "slideIn"
  });


// Gallery js -----------------------------------------------------------------------

     jssor_slider1_init = function () {
            var options = {
                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $UISearchMode: 0,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $Loop: 1,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $Steps: 6                                       //[Optional] Steps to go for each navigation request, default value is 1
                    }
                }
            };

            var jssor_slider1 = new $JssorSlider$('slider1_container', options);

            /*#region responsive code begin*/
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.min(parentWidth, 1920));
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            function ScaleSlider() {
                var parentHeight = jssor_slider1.$Elmt.parentNode.clientHeight;
                if (parentHeight)
                    jssor_slider1.$ScaleHeight(Math.min(parentHeight, 1080));
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };

