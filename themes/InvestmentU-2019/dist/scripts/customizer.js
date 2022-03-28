(function (factory) {
  typeof define === 'function' && define.amd ? define('customizer', factory) :
  factory();
}((function () { 'use strict';

  (function () {
    // Site title
    wp.customize('blogname', function (value) {
      value.bind(function (to) {
        document.querySelector(".brand").textContent = to;
      });
    });
  })();

})));
