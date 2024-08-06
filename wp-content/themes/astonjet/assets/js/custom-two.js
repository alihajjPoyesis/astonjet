jQuery(document).ready(function ($) {
  // start Elementor_anchor_scroller_Widget
  const links = $(".anchor-scroller-main-container .anchor-scroller-link");
  links.on("click", function (event) {
    event.preventDefault();
    links.removeClass("active");
    $(this).addClass("active");
  });

  // horizontal scroll
  const $slider = $(".anchor-scroller-main-container");
  let isDown = false;
  let startX;
  let scrollLeft;

  $slider.on("mousedown", function (e) {
    isDown = true;
    $slider.addClass("active");
    startX = e.pageX - $slider.offset().left;
    scrollLeft = $slider.scrollLeft();
  });

  $slider.on("mouseleave mouseup", function () {
    isDown = false;
    $slider.removeClass("active");
  });

  $slider.on("mousemove", function (e) {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - $slider.offset().left;
    const walk = (x - startX) * 1; //scroll-fast
    $slider.scrollLeft(scrollLeft - walk);
  });

  // end Elementor_anchor_scroller_Widget

  // start Elementor_fly_private_first_section_Widget

  var section = $(".fly_private_first_section-main-container");
  var imgContainer = $(".fly_private_first_section-img-container");
  var imgShadow = $(".fly_private_first_section-img-container::before");
  var win = $(window);

  win.on("scroll", function () {
    var scrollTop = win.scrollTop();
    var offsetTop = section.offset().top;
    var sectionHeight = section.outerHeight();
    var windowHeight = win.height();

    if (
      scrollTop > offsetTop - windowHeight &&
      scrollTop < offsetTop + sectionHeight
    ) {
      imgContainer.css("opacity", "1");
      imgContainer.find("img").css({
        animation:
          "fly_private_first_section-img-animation 2s ease-in-out forwards",
      });
      imgShadow.css({
        animation:
          "fly_private_first_section-img-container-shadow-animation 1s ease-in-out forwards",
        "animation-delay": "2s",
      });
    }
  });

  // end Elementor_fly_private_first_section_Widget
});
