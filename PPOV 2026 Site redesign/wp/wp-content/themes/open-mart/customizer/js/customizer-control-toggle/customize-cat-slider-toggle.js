( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'open-mart-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['open_mart_cat_slide_layout'] = [
		    {
				controls: [    
				'open_mart_category_slider_optn', 
				],
				callback: function(layout){
					if(layout =='cat-layout-1'){
					return true;
					}
					return false;
				}
			},	
				
			
			 
		];	
    });
})( jQuery );