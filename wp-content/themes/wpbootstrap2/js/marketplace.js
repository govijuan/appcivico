(function($) {
	$(document).ready(function(){

		var iv;
		
		$(".image-gallery .arrow.left .glyphicon").mousedown(function(){
			var div = $(this).parent().parent().find(".contents");
			iv = setInterval(function(){
	            div.scrollLeft( div.scrollLeft() - 8);
	        },20);
		});
		$(".image-gallery .arrow.right .glyphicon").mousedown(function(){
			var div = $(this).parent().parent().find(".contents");
			iv = setInterval(function(){
	            div.scrollLeft( div.scrollLeft() + 8);
	        },20);
		});
		
		$('.image-gallery .arrow.left .glyphicon,.image-gallery .arrow.right .glyphicon').on('mouseup mouseleave', function(){
	        clearInterval(iv);
	    });
	});
})(jQuery);