import './bootstrap';

(function () {
  //- Loader
  $(window).on('load', function () {
    setTimeout(() => $('.loader-wrapper').fadeOut(), 500);
  });

  //- Header scroll effect
  let lastScrollTop = 0;
  $(window).scroll(function (event) {
    var st = $(this).scrollTop();
    if (st > lastScrollTop || st == 0) {
      // downscroll
      $('.header').removeClass('sticky-top bg-light');
      $('.header *').removeClass('text-dark');
    } else {
      // upscroll
      $('.header').addClass('sticky-top bg-light');
      $('.header *').addClass('text-dark');
    }
    lastScrollTop = st;
  });

  /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
  particlesJS.load('particles-js', 'plugin/particles.json', function () { });

  AOS.init();

  $(".owl-carousel").owlCarousel({
    margin: 35,

    dots: false,
    loop: true,

    responsive: {
      0: { items: 1 },
      800: { items: 2 },
      1170: { items: 3 },
    },
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
  });
})();