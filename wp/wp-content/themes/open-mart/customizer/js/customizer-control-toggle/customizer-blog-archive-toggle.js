/*************************************/
// Blog Archive Hide and Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'open-mart-toggle-control', function( argument, api ){
OPNCustomizerToggles ['open_mart_blog_post_content'] = [
		    {
				controls: [    
				'open_mart_blog_expt_length',
				'open_mart_blog_read_more_txt',
				],
				callback: function(layout){
					if(layout=='full'|| layout=='nocontent'){
					return false;
					}
					return true;
				}
			},	
		];	
	});
})( jQuery );