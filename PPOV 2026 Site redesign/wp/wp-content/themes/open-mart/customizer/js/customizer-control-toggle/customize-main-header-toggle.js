/****************/
// Main header	
/****************/
( function( $ ) {
//**********************************/
// Main Header settings
//**********************************/
OPNControlTrigger.addHook( 'open-mart-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['open_mart_main_header_option'] = [
		    {
				controls: [    
				'open_mart_main_hdr_btn_txt', 
				'open_mart_main_hdr_btn_lnk',
				'open_mart_main_hdr_calto_txt',
				'open_mart_main_hdr_calto_nub',
				'open_mart_main_hdr_calto_email',
				'open_mart_main_header_widget_redirect'
				],
				callback: function(headeroptn){
					if (headeroptn =='none'){
					return false;
					}
					return true;
				}
			},	
			 {
				controls: [    
				'open_mart_main_hdr_btn_txt', 
				'open_mart_main_hdr_btn_lnk',
				],
				callback: function(layout){
					if(layout=='button'){
					return true;
					}
					return false;
				}
			},
			 {
				controls: [    
				'open_mart_main_hdr_calto_txt',
				'open_mart_main_hdr_calto_nub',
				'open_mart_main_hdr_calto_email',
				],
				callback: function(layout){
					if(layout=='callto'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'open_mart_main_header_widget_redirect'
				],
				callback: function(layout){
					if(layout=='widget'){
					return true;
					}
					return false;
				}
			},
			 
		];	
		OPNCustomizerToggles ['open_mart_sticky_header'] = [
		    {
				controls: [    
				'open_mart_sticky_header_effect', 
				],
				callback: function(headeroptn){
					if (headeroptn == true){
					return true;
					}
					return false;
				}
			},	
		];	
    });
})( jQuery );