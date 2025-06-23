const multipleItemCarousel = document.querySelector(".layanan #carouselExampleControls");

if (window.matchMedia("(min-width:576px)").matches) {
  const carousel = new bootstrap.Carousel(multipleItemCarousel, {
    interval: false,
  });

  var carouselWidth = $(".layanan .carousel-inner")[0].scrollWidth;
  var cardWidth = $(".layanan .carousel-item").width();

  var scrollPosition = 0;

  $(".layanan .carousel-control-next").on("click", function () {
    if (scrollPosition < carouselWidth - cardWidth * 4) {
      console.log("next");
      scrollPosition = scrollPosition + cardWidth;
      $(".layanan .carousel-inner").animate({ scrollLeft: scrollPosition }, 600);
    }
  });
  $(".layanan .carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      console.log("prev");
      scrollPosition = scrollPosition - cardWidth;
      $(".layanan .carousel-inner").animate({ scrollLeft: scrollPosition }, 600);
    }
  });
} else {
  $(multipleItemCarousel).addClass("slide");
}
