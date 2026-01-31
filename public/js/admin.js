(function($) {
  'use strict';
  
  document.addEventListener("DOMContentLoaded", function () {
    
    // Toggle Sidebar on Desktop (Icon Only Mode)
    var sidebarToggler = document.querySelector('[data-toggle="minimize"]');
    if (sidebarToggler) {
      sidebarToggler.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-icon-only');
      });
    }
    
    // Toggle Sidebar on Mobile (Offcanvas)
    var sidebarOffcanvasToggler = document.querySelector('[data-bs-toggle="offcanvas"]');
    if (sidebarOffcanvasToggler) {
        sidebarOffcanvasToggler.addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('active');
        });
    }
  });

})(jQuery);
