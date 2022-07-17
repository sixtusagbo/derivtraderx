import './bootstrap';

(function () {
  $(window).on('load', function () {
    setTimeout(() => $('.loader-wrapper').fadeOut(), 3000);
  });

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
})();