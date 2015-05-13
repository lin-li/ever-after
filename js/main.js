(function($){
	
	"use strict";
	
    $(document).ready(function(){
	
		jQuery('#countdown_dashboard').countDown({
				targetDate: {
					'day': 		13, // Put the date here
					'month': 	5, // Month
					'year': 	2014, // Year
					'hour': 	6,
					'min': 		0,
					'sec': 		0
				} //,omitWeeks: true
		});
			



		/* Hero height
		================================================== */
		var windowHeight = $(window).height();
		
		$('.hero').height( windowHeight );
		
		$(window).resize(function() {
			
			var windowHeight = $(window).height();
			$('.hero').height( windowHeight );
			
		});

		// Menu settings
		$('#menuToggle, .menu-close').on('click', function(){
			$('#menuToggle').toggleClass('active');
			$('body').toggleClass('body-push-toleft');
			$('#theMenu').toggleClass('menu-open');
		});
			
		/* Gallery
		================================================== */
		new Photostack( document.getElementById( 'photostack' ), {
			callback : function( item ) {
				//console.log(item)
			}
		} );	
			
			/* Gallery popup
		=================================================== */	
		$('.photostack').magnificPopup({
			delegate: 'a',
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(item) {
					return item.el.attr('title');
				}
			},
			/* zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			} */
		});
		
		//Home Background slider
		jQuery.supersized({	
		slide_interval          :   3000,		// Length between transitions
		transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed		:	700,		// Speed of transition				
		slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
		slides 					:  	[			// Slideshow Images
										{image : 'placeholders/header_1.jpg'},
										{image : 'placeholders/header_2.jpg'},  
										{image : 'placeholders/header_3.jpg'}
									]
		});	
	
	
			
	});		


})(jQuery);