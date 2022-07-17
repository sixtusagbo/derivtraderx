import './bootstrap';

(function () {
  $(window).on('load', function () {
    setTimeout(() => $('.loader-wrapper').fadeOut(), 3000);
  });
})();