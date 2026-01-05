(function ($) {

    $('#primary-menu').find('li').last().addClass('on-tab-close');

    $('#primary-menu').find('li').first().addClass('first-on-tab-close');


    $("#primary-menu").on('keydown', '.on-tab-close', function(e) {
        var keyCode = e.keyCode || e.which;

        if (keyCode == 9) {
            $('#site-navigation').removeClass('toggled');
        }
    });

    $("#primary-menu").on('keydown', '.first-on-tab-close', function(e) {
        if(e.shiftKey) {
            $('#site-navigation').removeClass('toggled');
        }
    });

})(jQuery);