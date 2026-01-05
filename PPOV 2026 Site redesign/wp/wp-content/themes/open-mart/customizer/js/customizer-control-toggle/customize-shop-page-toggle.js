( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'open-mart-toggle-control', function( argument, api ){
         OPNCustomizerToggles ['open_mart_pagination'] = [
		    {
				controls: [    
				'open_mart_pagination_loadmore_btn_text',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == 'click'){
					return true;
					}
					return false;
				}
			},
			
			];


    });
})( jQuery );