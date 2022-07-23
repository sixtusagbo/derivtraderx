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
  particlesJS.load('particles-js', 'plugin/particles.json', function () {
    console.log('callback - particles.js config loaded');
  });

  AOS.init();
})();