(function($) {
	$(document).ready(function(){
		
		$.extend({
			scrollTo: function(id){
				if (id.charAt(0) != "." && id.charAt(0) != "#"){
					id = "#"+id;
				}			
				var top = $(id).offset().top,
					target = "html,body";
				$(target).animate({scrollTop: top},'slow');
			}
			
		});
		
		$('.page-scroll a,a.page-scroll').bind('click', function(event) {
	        var $anchor = $(this);
	        $('html, body').stop().animate({
	            scrollTop: $($anchor.attr('href')).offset().top
	        }, 1500, 'easeInOutExpo');
	        event.preventDefault();
	    });

		function setSplashHome(){
			var wHeight = $(window).height();

			if (wHeight < 400) wHeight = 400;
//			if (wHeight > 600){
				$(".video-splash-home").css("height",wHeight+"px");
//			}else{
//				$(".video-splash-home").css("height","auto");
//			}
		}

	    setSplashHome();

	    $(window).resize(function() {
		    setSplashHome();
		});
	});
})(jQuery);