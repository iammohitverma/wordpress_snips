jQuery(document).ready(function () {
  jQuery("header .toggle_menu").click(function () {
    jQuery(this).toggleClass("active");
    jQuery("header").toggleClass("active");
    jQuery("header .navigationWrap").slideToggle();
  });
  jQuery(".openModalBtn").click(function (e) {
    e.preventDefault();
    jQuery(this).toggleClass("active");
    jQuery(".popup_wrap").toggleClass("active");
    jQuery(".popup_wrap").removeClass("submitted");
  });
  jQuery(".tm_popup .closeModal").click(function (e) {
    jQuery(".popup_wrap").removeClass("active");
  });

  var wpcf7Elm = document.querySelector(".wpcf7");

  if (wpcf7Elm) {
    jQuery(wpcf7Elm).on("wpcf7mailsent", function (event) {
      debugger;
      let documentUrl = jQuery(wpcf7Elm).find('[name="document-url"]').val();
      jQuery(".popup_wrap").addClass("submitted");
      setTimeout(() => {
        window.open(`${window.location.origin}${documentUrl}`, "_blank");
      }, 3000);
    });
  }
});
