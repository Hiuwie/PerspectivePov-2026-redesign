/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
OPNControlTrigger.addHook( 'open-mart-toggle-control', function( argument, api ){
OPNCustomizerToggles ['open_mart_default_container'] = [
		    {
				controls: [    
				'open_mart_conatiner_maxwidth',
				'open_mart_conatiner_top_btm',
				],
				callback: function(layout){
					if(layout=='fullwidth'){
					return false;
					}
					return true;
				}
			},
			{
				controls: [    
				'open_mart_conatiner_width',  
				],
				callback: function(layout){
					if(layout =='boxed'){
					return false;
					}
					return true;
				}
			},		
		];
	});
})( jQuery );