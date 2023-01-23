(function($) {
  'use strict';
  $(function() {
    $('[data-mdb-toggle="offcanvas"]').on("click", function() {
      $('.sidebar-offcanvas').toggleClass('active')
    });
  });
})(jQuery);