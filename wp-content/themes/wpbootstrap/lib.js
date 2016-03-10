function slideClick(){
  (function($) {
    $(document).ready(function() {
      $(".service a").click(function (event){
        event.preventDefault();
        var currentPanel = $(".service .active").data("name");
        var nextPanel = $(this).data("name");
        $("#"+currentPanel+"").fadeOut("slow");
        $(".active").removeClass("active");
        $(this).addClass("active");
        $("#"+nextPanel+"").delay(750).fadeIn("slow");

        clearInterval(loop);
      });
    }); 
  })(jQuery);
}


function slideTour() {
  (function($) {
    $(document).ready(function() {

      var current = $(".active");
      var next = current.parent().next().children();
      var last = $(".service a").last();

      if (last.hasClass("active")) {
        lastSlide();
      };

      $("#"+current.data("name")+"").fadeOut("slow");
      $(current).removeClass("active");
      $(next).addClass("active");
      $("#"+next.data("name")+"").delay(750).fadeIn("slow");
    }); 
  })(jQuery);

  function lastSlide() {
    (function($) {
      $(document).ready(function() {

        var current = $(".active");
        var slide = $(".service a");

        $("#"+slide.last().data("name")+"").delay(3000).fadeOut("slow");
        $("#"+slide.first().data("name")+"").delay(750).fadeIn("slow");
        $(slide.last()).delay(3000).removeClass("active");
        $(slide).first().delay(3000).addClass("active");
      });
    })(jQuery);
  }
}

function fixedNav() {
  (function($) {
    $(document).ready(function($){
      var nav = $('header');
      if ($('.header-internal')) {
        $(window).scroll(function () {
          if ($(this).scrollTop() > 250) {
            nav.addClass("f-nav");
          } else {
            nav.removeClass("f-nav");
          }
        });
      } else{
        $(window).scroll(function () {
          if ($(this).scrollTop() > 30) {
            nav.addClass("f-nav");
          } else {
            nav.removeClass("f-nav");
          }
        });
      });
    };
  })(jQuery);
}