$(document).ready(function() {
  $(window).load(function() {

      $(".user-panel").addClass("animated flipInY").fadeIn(1000);

    });
});


$(document).ready(function(){

          $("#sider-menu a").hover(
            function() {
              $(this).find("i").addClass("animated rubberBand");
            }, function() {
              $(this).find("i").removeClass("animated rubberBand");
            }
          );

          $(".showmenu").on("click", function(event) {
            event.preventDefault();

              if ($(this).hasClass("fa-angle-down")){
                   $(this).removeClass("fa-angle-down");
                   $(this).addClass("fa-angle-up");
                   $("#sider-menu").fadeIn();

              }else{

                  $(this).removeClass("fa-angle-up");
                  $(this).addClass("fa-angle-down");
                  $("#sider-menu").fadeOut();
            
              }

          });

});