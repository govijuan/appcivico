function slideClick(){
  (function($) {
    $(document).ready(function() {
      $(".service a").click(function (event){
        event.preventDefault();
        clearInterval(loop);
        var currentPanel = $(".service .active").data("name");
        var nextPanel = $(this).data("name");
        $("#"+currentPanel+"").fadeOut("slow");
        $(".active").removeClass("active");
        $(this).addClass("active");
        $("#"+nextPanel+"").delay(750).fadeIn("slow");
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
      var home = $('.header-home');
      var internal = $('.header-internal');
      
      $(window).scroll(function () {
        if (internal) {
            if ($(this).scrollTop() > 240) {
              nav.addClass("bg-color");
            } else {
              nav.removeClass("bg-color");
            }
          };
          if (home) {
            if ($(this).scrollTop() > 20) {
              nav.addClass("f-nav bg-color");
            } else {
              nav.removeClass("f-nav bg-color");
            }
          };
      });
    });
  })(jQuery);
}

(function($) {
  $("#team .team-member").click(function() {     
    var id = $(this).parent().attr("id");
    var team = $("#team .team-member");
    team.each(function() {
      $(this).removeClass("selected");     
    });
    $(".info .team-member").each(function() {
      $(this).parent().hide();
    });
    $(this).addClass("selected");       
    $(".info #" + id).show();     
  });
})(jQuery);