jQuery(document).ready(function () {
  jQuery("header .toggle_menu").click(function () {
    jQuery(this).toggleClass("active");
    jQuery("header").toggleClass("active");
    jQuery("html,body").toggleClass("overflow-hidden");
    jQuery("header .navigationWrap").slideToggle();
    // Scroll to top
    jQuery("html, body").animate({ scrollTop: 0 }, "slow");
  });

  jQuery("header .subMenuAngle").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(this).closest(".a-Wrap").next().slideToggle();
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

  var wpcf7Elm = document.querySelector(".tm_popup .wpcf7");

  if (wpcf7Elm) {
    jQuery(wpcf7Elm).on("wpcf7mailsent", function (event) {
      // debugger;
      let documentUrl = jQuery(wpcf7Elm).find('[name="document-url"]').val();
      jQuery(".popup_wrap").addClass("submitted");
      setTimeout(() => {
        window.open(`${window.location.origin}${documentUrl}`, "_blank");
      }, 3000);
    });
  }

  // mobile slider js start

  $("#mob_carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    dotsEach: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 3,
      },
    },
    onInitialized: createFractionPagination, // Call custom pagination function on initialization
    onTranslated: updateFractionPagination, // Call custom update function on translation
  });

  function createFractionPagination(event) {
    var carousel = $(event.target);
    var totalSlides = carousel.find(".owl-item:not(.cloned)").length;

    var pagination = $(
      '<div class="owl-fraction-pagination"><span class="current-slide">1</span> / <span class="total-slides">' +
      totalSlides +
      "</span></div>"
    );
    carousel.after(pagination);
  }

  function updateFractionPagination(event) {
    var carousel = $(event.target);
    var totalSlides = carousel.find(".owl-item:not(.cloned)").length;
    var currentIndex =
      ((event.item.index - event.relatedTarget._clones.length / 2) %
        totalSlides) +
      1; // Adjust for clones

    $(".current-slide").text(currentIndex);
  }

  // mobile slider js end
});
