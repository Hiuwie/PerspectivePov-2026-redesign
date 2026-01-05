/*****************************************************************************/
/**********************customizer control setting*************************/
/*****************************************************************************/
( function( $ ) {
//**********************************/
// Footer widget hide and show settings
//**********************************/
OPNControlTrigger.addHook( 'open-mart-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['open_mart_bottom_footer_widget_layout'] = [
			{
				controls: [
					
					
					'open_mart_bottom_footer_widget_redirect',
				],
				callback: function(layout){
					if ('ft-wgt-none'== layout){
						return false;
					}
					return true;
				}
			},
				
		];	
 });
})( jQuery );