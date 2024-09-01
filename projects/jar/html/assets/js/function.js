jQuery(document).ready(function(){
    jQuery(".site_header .toggle_menu").click(function () {
        jQuery('.site_header .mob_menu').slideToggle();
        jQuery(this).toggleClass("active");
        // jQuery(".site_header").toggleClass("toggle");
      }); 
});