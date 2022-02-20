(function () {
  $(".cart-info").on("click", function () {
    $(".cart-info-container").fadeToggle("fast");
  });
})();

$("#related-product1").owlCarousel({
  loop: true,
  margin: 30,
  dots: false,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>",
  ],
  nav: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$("#feature-carousel").owlCarousel({
  loop: true,
  margin: 40,
  nav: true,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 4,
    },
  },
});

$("#testimonial-carousel").owlCarousel({
  loop: true,
  margin: 0,
  dots: true,
  nav: true,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 2,
    },
  },
});

$(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  // asNavFor: ".slider-nav",
  prevArrow: '<span class="prev"><i class="fa fa-chevron-left"></i></span>',
  nextArrow: '<span class="next"><i class="fa fa-chevron-right"></i></span>',
});
$(".slider-nav").slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  vertical: true,
  asNavFor: ".slider-for",
  dots: false,
  arrows: false,
  focusOnSelect: true,
  verticalSwiping: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        vertical: false,
      },
    },
    {
      breakpoint: 768,
      settings: {
        vertical: false,
      },
    },
    {
      breakpoint: 580,
      settings: {
        vertical: false,
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 380,
      settings: {
        vertical: false,
        slidesToShow: 2,
      },
    },
  ],
});

// Counter
// ==================================
function increaseCount(e, el) {
  var input = el.previousElementSibling;
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}
function decreaseCount(e, el) {
  var input = el.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}

$("#related-product").owlCarousel({
  loop: true,
  margin: 30,
  dots: false,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>",
  ],
  nav: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 2,
    },
  },
});
