$("#testimonials").owlCarousel({
  loop: true,
  margin: 10,
  dots: false,
  nav: true,
  autoplay: true,
  autoplayTimeout: 2000,
  navigationText: [
    "<i class='fas fa-angle-left'></i>",
    "<i class='fas fa-angle-right'></i>",
  ],
  responsive: {
    0: {
      items: 2,
      margin: 0,
      nav: false,
    },
    600: {
      items: 3,
      nav: false,
    },
    1000: {
      items: 3,
    },
  },
});

$("#products").owlCarousel({
  loop: true,
  autoplay: false,
  autoplayTimeout: 2000,
  margin: 10,
  nav: true,
  // autoplay: true,
  // autoplayTimeout: 2100,
  navigationText: [
    "<i class='fas fa-angle-left'></i>",
    "<i class='fas fa-angle-right'></i>",
  ],
  responsive: {
    0: {
      items: 2,
      margin: 8,
      nav: false,
      dots: false,
    },
    600: {
      items: 3,
      nav: false,
    },
    1000: {
      items: 3,
    },
  },
});

$("#category").owlCarousel({
  loop: true,
  margin: 10,
  dots: true,
  nav: false,
  autoplay: true,
  autoplayTimeout: 2200,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 3,
    },
  },
});
