jQuery(document).ready(function () {
  var header = jQuery(".ivi_header"); // Select the header

  jQuery(window).scroll(function () {
    var scroll = jQuery(window).scrollTop(); // Get current scroll position

    if (scroll > 30) {
      header.addClass("sticky");
    } else {
      header.removeClass("sticky");
    }
  });

  jQuery(".menu_toggle_btn").click(function () {
    jQuery(this).toggleClass("active");
    header.toggleClass("active");
    jQuery(".navigationWrap").slideToggle();
  });

  jQuery(".subMenuAngle").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(this).closest(".a-Wrap").next(".sub-menu").slideToggle();
  });

  // Left to Right Swiper
  var swiperOptionsLeftToRight = {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: false,
    autoplay: {
      delay: 100,
      pauseOnMouseEnter: true,
      // disableOnInteraction: false,
      reverseDirection: false, // Reverse the direction
    },
    speed: 10000,
    breakpoints: {
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 30,
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 30,
      },
    },
  };
  new Swiper(".logos_slider", swiperOptionsLeftToRight);

  const accordionItemHeaders = document.querySelectorAll(
    ".accordion-item-header"
  );

  accordionItemHeaders.forEach((accordionItemHeader) => {
    accordionItemHeader.addEventListener("click", (event) => {
      // Uncomment in case you only want to allow for the display of only one collapsed item at a time!

      const currentlyActiveAccordionItemHeader = document.querySelector(
        ".accordion-item-header.active"
      );
      if (
        currentlyActiveAccordionItemHeader &&
        currentlyActiveAccordionItemHeader !== accordionItemHeader
      ) {
        currentlyActiveAccordionItemHeader.classList.toggle("active");
        currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
      }

      accordionItemHeader.classList.toggle("active");
      const accordionItemBody = accordionItemHeader.nextElementSibling;
      if (accordionItemHeader.classList.contains("active")) {
        accordionItemBody.style.maxHeight =
          accordionItemBody.scrollHeight + "px";
      } else {
        accordionItemBody.style.maxHeight = 0;
      }
    });
  });

  // <!-- for testimonial section on homepage -->
  var swiper = new Swiper(".testimonial_slider", {
    spaceBetween: 20,
    loop: true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      776: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });

  // <!-- for testimonial section on homepage -->
  var swiper = new Swiper(".image_gallery", {
    spaceBetween: 12,
    loop: false,
    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 2,
      },
    },
  });

  // $(".image_gallery").owlCarousel({
  //   loop: false,
  //   margin: 12,
  //   nav: false,
  //   dots: false,
  //   responsive: {
  //     0: {
  //       items: 2,
  //     },
  //     576: {
  //       items: 2,
  //     },
  //   },
  // });

  // Initialize Magnific Popup
  $(".image_gallery").magnificPopup({
    delegate: "a.image_wrap", // child items selector, by clicking on it popup will open
    type: "image",
    gallery: {
      enabled: true,
    },
    zoom: {
      enabled: true,
      duration: 300, // duration of the zoom animation
    },
  });

  // <!-- Initialize Swiper -->
  var swiper = new Swiper("#team-swiper", {
    spaceBetween: 10,
    grabCursor: true,
    loop: true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      600: {
        slidesPerView: 2,
      },
      1000: {
        slidesPerView: 4,
      },
    },
  });

  // load more js start
  var page = 2; // Start from page 2 since 6 posts are already shown
  var loading = false;
  $(".see_more").on("click", function (e) {
    e.preventDefault();
    if (!loading) {
      loading = true;
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: {
          action: "load_more_posts",
          page: page,
        },
        success: function (response) {
          if (response) {
            $(".listing_resource .row").append(response);
            page++;
            loading = false;
          } else {
            $(".see_more").hide(); // Hide the load more button if no more posts
            $(
              "<p class='text-center'><b>No More Post Found!</b></p>"
            ).insertAfter(".see_more");
          }
        },
      });
    }
  });
  // load more js end

  $(".sidebar_content li").click(function () {
    $(".sidebar_content li").removeClass("active");
    $(this).addClass("active");
  });

  // copy to clipboard
  jQuery(".copy").click(function () {
    const tempInput = $("<input>");
    jQuery("body").append(tempInput);
    tempInput.val($(this).prev("a").text()).select();
    document.execCommand("copy");
    tempInput.remove();
    const copiedMessage = jQuery("<span>")
      .text("Copied!")
      .addClass("copied-message");
    jQuery(this).after(copiedMessage);

    // Remove the "Copied!" message after 2 seconds
    setTimeout(function () {
      copiedMessage.remove();
    }, 2000);
  });

  $(".btn_grp button").click(function () {
    $(".btn_grp button").removeClass("active");
    $(this).toggleClass("active");
  });
  $(".win").click(function () {
    $(".mac_step").hide();
    $(".window_step").show();
  });
  $(".mac").click(function () {
    $(".window_step").hide();
    $(".mac_step").show();
    $(".mac_step").removeClass("d-none");
  });

  // hover area js
  $(document).on(
    {
      mouseenter: function () {
        $(".hover_section li").removeClass("active");
        $(this).addClass("active");
      },
      mouseleave: function () {
        $(this).removeClass("active");
      },
    },
    ".hover_section li"
  );
  $(".hover_box .cross").click(function () {
    $(".hover_section li").removeClass("active");
  });
});
