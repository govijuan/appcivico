(function($) {
	$(document).ready(function(){
		
		$("#user-submitted-posts form .usp-content label").text("URL do Post");
		$("#user-submitted-posts form .usp-content textarea").attr("placeholder","URL do Post");
		$("#user-submitted-posts form .usp-content textarea").attr("rows",1);

		$("#user-submitted-post").addClass("btn btn-success");

		$("#usp-submit").append("<button class='btn btn-success close-button'>Cancelar</button>");

		$("#new-post").click(function(e){
			var button = this;
			$(button).fadeOut("fast",function(){
					$(".link-form").fadeIn("fast");
				}
			);
		});
		$(".link-form .close-button").click(function(e){
			$(".link-form").fadeOut("fast",function(){
					$("#new-post").fadeIn("fast");
				}
			);
		});

	});
})(jQuery);