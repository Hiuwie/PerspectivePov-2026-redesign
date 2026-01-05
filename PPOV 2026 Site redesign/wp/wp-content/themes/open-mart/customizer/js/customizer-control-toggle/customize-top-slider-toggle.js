( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'open-mart-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['open_mart_top_slide_layout'] = [
		    {
				controls: [    
				'open_mart_top_slide_lay1_content',
				'open_mart_top_slide_lay1_background_image',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-1'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'open_mart_lay2_adimg', 
				'open_mart_lay2_url',
				'open_mart_top_slide_lay2_content',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-2'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'open_mart_lay3_adimg',
				'open_mart_lay3_url',
				'open_mart_lay3_adimg2',
				'open_mart_lay3_2url',
				'open_mart_lay3_adimg3',
				'open_mart_lay3_3url',
				'open_mart_top_slide_lay3_content',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-3'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'open_mart_lay4_adimg1',
				'open_mart_lay4_url1',
				'open_mart_lay4_adimg2',
				'open_mart_lay4_url2',
				'open_mart_top_slide_lay4_content',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-4'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'open_mart_top_slide_lay5_content',
				],
				callback: function(slideroptn){
			    if(slideroptn =='slide-layout-5'){
					return true;
					}
					return false;
				}
			},
			 
		];	

         OPNCustomizerToggles ['open_mart_top_slider_optn'] = [
		    {
				controls: [    
				'open_mart_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];


    });
})( jQuery );