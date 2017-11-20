$( document ).ready(function() {

    $(document).foundation();

    $('#carousel').flexslider({
        animation: "slide",
        controlNav: true,
        animationLoop: false,
        slideshow: false,
        itemWidth: 150,
        itemMargin: 5,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel"
    });

    $('.flexslider').flexslider({
        animation: "slide"
    });

  $("div.spec").click(function(){
      $( ".spec-tab").addClass("hide");
      $(this).find(".spec-tab").removeClass("hide");
    });





});
