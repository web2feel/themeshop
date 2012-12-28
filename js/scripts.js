jQuery(document).ready(function($){
	
	
/* Responsive slides */

	jQuery('#flexislider').flexslider({
		animation:"fade",
		controlNav: true,
		directionNav:false
	});	
	
	
/* Navigation */

	jQuery('#submenu ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   { opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	
	
/* 	Overlay */
	
	function get_overlay() {
		jQuery('.prod-thumb ').hover( function() {
			jQuery(this).find('.prod-screen').animate({ opacity: 0.3 }, 150);
			jQuery(this).find('.overlay').fadeIn(150);
		
			}, function() {
		
			jQuery(this).find('.overlay').fadeOut(150);
			jQuery(this).find('.prod-screen').animate({ opacity: 1.0 }, 150);
		});	
	}
	
	get_overlay();
	
/* 	Align  grid */

	jQuery('.article-list .grid_4:nth-child(3n)').after('<div class="clear"></div>');
	
	
/* Fancybox */

	jQuery(".fancybox").fancybox({
          helpers: {
          title : {
                  type : 'float'
                  }
              }
          });
	
});