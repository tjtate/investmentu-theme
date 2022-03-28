(function (factory) {
  typeof define === 'function' && define.amd ? define('head', factory) :
  factory();
}((function () { 'use strict';

  (function ($) {
    function navDropdownToggle() {
      if ($(window).width() < 1200) {
        $('.has-mega-menu a').attr('data-toggle', 'dropdown');
        $('.mega-menu-column ul li a').attr('class', 'dropdown-item');
        $('.mega-menu-column ul li a').removeAttr('data-toggle');
      }
    }

    $(function () {
      navDropdownToggle();

      if ($(window).width() > 1200) {
        var c,
            currentScrollTop = 0,
            navbar = $('.main-sticky-nav');
        $(window).on("scroll", function () {
          var a = $(window).scrollTop();
          var b = navbar.height();
          currentScrollTop = a;

          if (c < currentScrollTop && a > b + b) {
            navbar.removeClass("sticky-top");
            $('#small-signup-form').removeClass('nav-down');
          } else if (c > currentScrollTop && a > b) {
            navbar.addClass("sticky-top");
            $('#small-signup-form').addClass('nav-down');
          }

          c = currentScrollTop;
        });
      }
    });
    $('[data-toggle=search-form]').on("click", function () {
      try {
        var marginTopSize = $('#collapse-nav').hasClass('show') && $(window).width() < 1200 ? '137px' : '117px';
        $('.search-form-wrapper').css('margin-top', marginTopSize);
        $('.navbar').toggleClass('pb-5');
        $('.search-form-wrapper').toggleClass('open');
        $('.search-form-wrapper .search').trigger("focus");
        $('html').toggleClass('search-form-open');
        this.ariaExpanded = !JSON.parse(this.ariaExpanded);
      } catch (e) {
        console.error(e);
      }
    });
    $('[data-toggle=search-form-close]').on("click", function () {
      $('.search-form-wrapper').removeClass('open');
      $('html').removeClass('search-form-open');
    });
    $('.search-form-wrapper .search').on("keypress", function (event) {
      if ($(this).val() === "Search") {
        $(this).val("");
      }
    });
    $('.search-close').on("click", function (event) {
      $('.search-form-wrapper').removeClass('open');
      $('html').removeClass('search-form-open');
    });
    $('p:has(img.aligncenter)').addClass('aligncenter');
    $('.navbar-toggler').on("click", function () {
      if ($('.search-form-wrapper').hasClass('open') && $(window).width() < 1200) {
        if (!$('#collapse-nav').hasClass('show')) {
          $('.search-form-wrapper').css('margin-top', '137px');
        } else {
          $('.search-form-wrapper').css('margin-top', '117px');
        }
      } else {
        $('.search-form-wrapper').css('margin-top', '117px');
      }
    });
    $(".guru-nav").on("hover", function () {
      if ($(window).width() > 1200) {
        $('.guru-nav').toggleClass("show");
        $('.guru-nav .dropdown-menu').toggleClass("show");
      }
    });
    $(window).on("resize", function () {
      navDropdownToggle();
    });
  })(jQuery);

})));
