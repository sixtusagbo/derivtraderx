import './bootstrap';
import { CountUp } from "./countUp.min.js";

(function ($) {
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

  //- particlesJS
  particlesJS.load('particles-js', 'plugin/particles.json', function () { });

  //- Animate on Scroll initialize
  AOS.init();

  //- Owl Carousel configs
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

  //- Profit checker
  $('#plan-amount').on('change keyup', function () {
    let item = $('#plan option:selected');
    let min = item.data('min');
    let max = item.data('max');
    let duration = item.data('duration');
    var percent = item.data('percent');
    let str = $(this).val();
    str = str.replace(',', '.');
    $(this).val(str);
    var amount = parseFloat(str);
    if (amount > max) {
      if ($(this).hasClass('is-invalid')) {
        $(this).removeClass('is-invalid');
      }
      amount = max;
      $(this).val(max);
    }
    if (amount < min) {
      $(this).addClass('is-invalid');
    }
    if (amount >= min) {
      if ($(this).hasClass('is-invalid')) {
        $(this).removeClass('is-invalid');
      }

      let profit = (percent / 100) * amount;

      let monthlyProfit = profit * (30 / (duration / 24));
      let annualProfit = profit * (365 / (duration / 24));

      $('#profit-result').text(profit.toLocaleString('en-US', {
        style: "currency",
        currency: "USD",
      }));
      $('#monthly-result').text(monthlyProfit.toLocaleString('en-US', {
        style: "currency",
        currency: "USD",
      }));
      $('#annual-result').text(annualProfit.toLocaleString('en-US', {
        style: "currency",
        currency: "USD",
      }));
    }
  });

  //- Count up for statistics section
  const countUpConfigs = {
    enableScrollSpy: true,
  }
  const days = new CountUp('days', $('#days').text(), countUpConfigs);
  const members = new CountUp('members', $('#members').text(), { ...countUpConfigs, suffix: '+' });
  const money = new CountUp('money', $('#money').text(), { ...countUpConfigs, prefix: '$', decimalPlaces: 2 });
  const money2 = new CountUp('money2', $('#money2').text(), { ...countUpConfigs, prefix: '$', decimalPlaces: 2 });
})(jQuery);
