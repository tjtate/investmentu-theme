(function() {
  // Site title
  wp.customize('blogname', function(value) {
    value.bind(function (to) {
      document.querySelector(".brand").textContent = to;
    });
  });
})();
