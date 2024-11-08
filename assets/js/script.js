(function($) {
	'use strict';
	
	$('.banner_slide').owlCarousel({
		loop:true,
		nav:true,
		dots:true,
		slideSpeed : 300,
		autoplay:true,
		autoplayTimeout:5000,
		items : 1,
		smartSpeed:450
	});
	
	/*PRELOADER JS*/
$(window).on('load', function() { 
	$('.status').fadeOut();
	$('.preloader').delay(350).fadeOut('slow'); 
	
	var wow = new WOW({
	boxClass:     'wow',
	animateClass: 'animated',
	offset:       300,
	mobile:       false,
	live:         true,
	callback:     function(box) {
	},
	scrollContainer: null,
	resetAnimation: true,
  });
wow.init();
}); 
/*END PRELOADER JS*/  

	
		$(".m-close-btn").click(function(){
			$(".mobilemenu").hide();
		  });
		  $(".responsive-menu-btn").click(function(){
			$(".mobilemenu").show();
		  });
		
		$('body').delegate('.mobilemenu .main-menu ul li.menu-item-has-children','click', function(){
    	var $ths = $(this);
    	if(!$ths.hasClass('active')){
    		$('.mobileheader .menu-item-has-children').removeClass('active');
    		$('.mobileheader .menu-item-has-children .sub-menu').slideUp();
    		$ths.closest('.mobileheader .menu-item-has-children').find('ul.sub-menu').slideDown();
    		$ths.addClass('active');
    	}else{
        	$ths.closest('.mobileheader .menu-item-has-children').find('ul.sub-menu').slideUp();
    		$ths.removeClass('active');
    	}
    	
    })
	
	$('#galler_pg figure.wp-block-image a').attr('data-fancybox', 'gallery');

		
})(jQuery);