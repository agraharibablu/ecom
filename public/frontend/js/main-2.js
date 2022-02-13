$("#feature-carousel").owlCarousel({
  loop: true,
  margin: 40,
    nav: true,
  navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
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
  dots:true,
    nav: true,
  navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
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
