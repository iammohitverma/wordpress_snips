jQuery(document).ready(function () {
  jQuery(".dropdown_icon").click(function (e) {
    // Prevent the default behavior if it's an anchor tag or similar
    e.preventDefault();

    // If the clicked element is already active, toggle it off
    if (jQuery(this).hasClass("active")) {
      jQuery(this).removeClass("active");
      jQuery(this).closest(".aWrap").next(".sub_category_wrap").slideUp();
    } else {
      // Remove active class from all icons and slide up all categories
      jQuery(".dropdown_icon").removeClass("active");
      jQuery(".sub_category_wrap").slideUp();

      // Add active class to the clicked icon and slide down the corresponding category
      jQuery(this).addClass("active");
      jQuery(this).closest(".aWrap").next(".sub_category_wrap").slideDown();
    }
  });

  // Get the current URL
  var currentUrl = window.location.href;

  var urlPath = currentUrl.split("/").filter(Boolean).pop(); // This will give you "okmg-shop"
  if (urlPath === "okmg-shop") {
    jQuery(".category_wrap > li:first-child").addClass("active");
  } else {
    jQuery(".category_wrap li").removeClass("active");
    jQuery(".category_wrap li a").each(function () {
      var linkUrl = jQuery(this).attr("href");
      if (currentUrl === linkUrl) {
        jQuery(this).closest("li").addClass("active");
        jQuery(this).closest("ul").closest("li").addClass("active");
      }
    });
  }
});
