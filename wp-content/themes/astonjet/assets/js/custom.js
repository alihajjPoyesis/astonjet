jQuery(document).ready(function ($) {
  // HEADER
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    var width = $(window).width();

    if (width > 1024) {
      if (scroll >= 50) {
        $(".main_logo").hide();
        $(".logo_on_scroll").show();
      } else {
        $(".main_logo").show();
        $(".logo_on_scroll").hide();
      }
    } else {
      $(".main_logo").hide();
      $(".logo_on_scroll").hide();
    }
  });

  // CITIES CAROUSEL
  $(".owl-carousel.cities-carousel").owlCarousel({
    items: 1.5,
    margin: 10,
    loop: true,
    dots: false,
    responsive: {
      0: {
        items: 1.5,
      },
      480: {
        items: 2.5,
      },
    },
  });

  // FOOTER
  $(window).on("scroll", function () {
    var $element = $(".footer_animated_image");
    var elementTop = $element.offset().top;
    var elementHeight = $element.height();
    var windowHeight = $(window).height();
    var windowScrollTop = $(window).scrollTop();

    if (
      windowScrollTop + windowHeight >= elementTop + elementHeight / 2 &&
      windowScrollTop <= elementTop + elementHeight
    ) {
      $element.css("background-position-y", "70%");
    } else {
      $element.css("background-position-y", "100%");
    }
  });
});
