//new WOW().init();
console.log(
  "%cWebsite Built by OKMG",
  "background: #0a383f; color: #ffffff; display: block;padding:5px 15px;border-radius:7px"
);
jQuery(document).ready(function () {
  $(".openPopup").click(function () {
    var currentId = $(this).attr("data-id");
    $(`#${currentId}`).addClass("show");
  });
  $(".close_popup_modal").click(function () {
    $(`.modal_wrapper`).removeClass("show");
  });
  document.addEventListener("keydown", handleKeyPress);

  $(document).on("click", ".read_more_popup", function () {
    $(".popupWrapper").addClass("active");
    var modayBodyStr = $(this).closest("li").find(".modalBody").html();
    $("#appendCntnt").empty().append(modayBodyStr);
  });

  $(document).on("click", ".cross", function () {
    $(".popupWrapper").removeClass("active");
  });

  $(document).click(function (e) {
    if ($(e.target).hasClass("modal_wrapper")) {
      $(".modal_wrapper").removeClass("show");
    }
  });

  function handleKeyPress(event) {
    // Check if the pressed key is the 'Esc' key
    if (event.keyCode === 27) {
      $(`.modal_wrapper`).removeClass("show");
      $(".popupWrapper").removeClass("active");
    }
  }

  /* tabing js  fetch post according to categories */
  $(".tab_fun_tm").click(function () {
    $cat_name = $(this).attr("data-catName");
    $cat_id = $(this).attr("data-catId");

    $(".loading_wrapper").show();
    $(".tab_fun_tm").removeClass("active");
    $(this).addClass("active");
    $.ajax({
      method: "POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "fetch_post_related_to_category",
        id: $cat_id,
        name: $cat_name,
      },
      success: function (response) {
        console.log(response);
        $(".main-heading").empty();
        $(".main-heading").append($cat_name);
        $(".people_list ul").empty().html(response);
        $(".loading_wrapper").hide();
      },
    });
  });

  /* tabing js  fetch post according to News categories */
  $(".tab_news_tm").click(function () {
    $newscat_name = $(this).attr("data-newscatName");
    $newscat_id = $(this).attr("data-newscatId");

    $(".loading_wrapper").show();
    $(".tab_news_tm").removeClass("active");
    $(this).addClass("active");
    $.ajax({
      method: "POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "fetch_post_related_to_newsandevent_category",
        id: $newscat_id,
        name: $newscat_name,
      },
      success: function (response) {
        console.log(response);
        $(".row .newsposts").empty().html(response);
        $(".loading_wrapper").hide();
      },
    });
  });

  /* tabing js  fetch post according to Event categories */
  $(".tab_event_tm").click(function () {
    $eventscat_name = $(this).attr("data-eventcatName");
    $eventscat_id = $(this).attr("data-eventcatId");

    $(".loading_wrapper").show();
    $(".tab_event_tm").removeClass("active");
    $(this).addClass("active");
    $.ajax({
      method: "POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "fetch_post_related_to_event_category",
        id: $eventscat_id,
        name: $eventscat_name,
      },
      success: function (response) {
        console.log(response);
        $(".eventposts").empty().html(response);
        $(".loading_wrapper").hide();
      },
    });
  });

  // topbar script
  jQuery("header .topbar .close-topbar").click(function () {
    jQuery("header .topbar").slideUp();
    jQuery("header .topbar").css("display", "none !important");
  });

  // primary-top-menu-wrap add icon in item script
  jQuery(".primary-top-menu-wrap ul li .a-Wrap a").append(
    "<i><img src='/wp-content/themes/boldpark/assets/images/arrow-right.svg'/></i>"
  );

  // mega menu script
  jQuery("header .mega-menu-toggle").click(function () {
    jQuery("header .mega-menu-toggle").each(function (index) {
      jQuery(this).toggleClass("active");
    });
    jQuery("header").toggleClass("active");
    jQuery(".mega-menu-wrap").toggleClass("show");
    jQuery("html, body").toggleClass("overflow-hidden");
  });

  // header .mega-menu-wrap add icon in item script
  jQuery(
    "header .mega-menu-wrap ul li.menu-item-has-children > .a-Wrap"
  ).append(
    "<i class='submenu-toggle'><img src='/wp-content/themes/boldpark/assets/images/plus-icon.svg'/></i>"
  );

  // header .mega-menu-wrap add icon in item script
  jQuery("header .mega-menu-wrap ul li .submenu-toggle").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(this)
      .closest(".menu-item-has-children")
      .find(".sub-menu")
      .slideToggle();
  });

  // make header sticky
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $("header").addClass("sticky");
      $("header .topbar").slideUp();
    } else {
      $("header").removeClass("sticky");
      $("header .topbar").slideDown();
    }
  });

  // 	individual section animation js
  let tmAnimWrapV1 = document.querySelector(".tm-anim-wrap-v1");

  // set mouse hover for box
  if (tmAnimWrapV1) {
    let tmAnimWrapV1Boxes = document.querySelectorAll(".box");

    function onMouseEnterFun(e) {
      let activeBox = this.dataset.attr;
      tmAnimWrapV1.classList.add("active-" + activeBox);
    }

    // set mouse out for box
    function onMouseOutFun(e) {
      tmAnimWrapV1.className = "tm-anim-wrap-v1";
    }

    // set mouse over for box
    function onMouseOverFun(e) {
      let activeBox = this.dataset.attr;
      tmAnimWrapV1.classList.add("active-" + activeBox);
    }

    // hover effect for desktop only
    if (window.matchMedia("(min-width: 992px)").matches) {
      tmAnimWrapV1Boxes.forEach((box) => {
        box.addEventListener("mouseenter", onMouseEnterFun);
        box.addEventListener("mouseout", onMouseOutFun);
        box.addEventListener("mouseover", onMouseOverFun);
      });
    }
  }

  // single post slider arrows wrap
  setTimeout(() => {
    let postSliderButtonWrapper = '<div class="swiper-buttons-wrap"></div>';
    if (postSliderButtonWrapper) {
      $(".single-post-img-slider .elementor-swiper-button").wrapAll(
        postSliderButtonWrapper
      );
    }
  }, 2000);

  // images slider
  $(".tm_image_slider").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 2,
      },
      1000: {
        items: 3,
      },
      1200: {
        items: 4,
      },
    },
  });

  $(".owl-prev").html("<span></span>");
  $(".owl-next").html("<span></span>");

  //accordian
  const accordionItemHeaders = document.querySelectorAll(
    ".accordion-item-header"
  );
  accordionItemHeaders.forEach((accordionItemHeader) => {
    accordionItemHeader.addEventListener("click", (event) => {
      // Uncomment in case you only want to allow for the display of only one collapsed item at a time!

      console.log(event.target);
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

  if (jQuery(".accordian_wrapper")) {
    jQuery(".accordian_wrapper .accordion-item-header").click(function (e) {
      setTimeout(() => {
        // Get the position of the target element
        var targetOffset =
          jQuery(this).offset().top - jQuery("header").outerHeight();
        console.log(targetOffset);

        // Scroll the page to the target element
        jQuery("html, body").animate(
          {
            scrollTop: targetOffset,
          },
          0
        );
      }, 200); // Adjust the duration as needed
    });
  }

  // if user comes from menu link & open tab content
  function aboutAccordionOnPageLoad() {
    let hashValue = window.location.hash.substring(1);
    if (hashValue) {
      $(`#${hashValue}`).click();
    }
  }
  aboutAccordionOnPageLoad();

  // click on menu link & open tab content
  function aboutAccordionOnNavLinkClick() {
    $("header nav ul li .a-Wrap a,.banner_links ul li a").on(
      "click",
      function (event) {
        if ($(".accordian_wrapper").length > 0) {
          // Prevent the default behavior of the link
          // event.preventDefault();

          // Get the href attribute of the clicked link
          var href = $(this).attr("href");

          // Find the index of the hash symbol
          var hashIndex = href.indexOf("#");

          // If the hash symbol is found
          if (hashIndex !== -1) {
            // Extract the value after the hash symbol
            let hashValue = href.substring(hashIndex + 1);
            if (hashValue) {
              $(`#${hashValue}`).click();
            }
          } else {
            console.log("No hash value found.");
          }
        }
      }
    );
  }
  aboutAccordionOnNavLinkClick();

  // header search
  jQuery("header .searcIcon_hdr.desktop").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(".search_form_wrap.desktop").toggleClass("active");
  });
  jQuery("header .searcIcon_hdr.mobile").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(".search_form_wrap.mobile").slideToggle();
  });
});

window.addEventListener("load", function () {
  $(".loader").css({
    opacity: 0,
  });
  setTimeout(function () {
    $(".loader").hide();
  }, 500);
});

// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks on <span> (x), close the modal
span?.addEventListener("click", function (event) {
  modal.style.display = "none";
});

// Get all images and insert the clicked image inside the modal
// Get the content of the image description and insert it inside the modal image caption
var images = document.querySelectorAll(".img_gallery_wrap img");
var modalImg = document.getElementById("img01");
var i;
for (i = 0; i < images.length; i++) {
  images[i].onclick = function () {
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.nextElementSibling.innerHTML;
  };
}
// Close the modal when clicking outside of it
window.addEventListener("click", function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});

// Close the modal when the Esc key is pressed
document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    modal.style.display = "none";
  }
});

// print the blog post page:-
let printBtn = document.querySelector(".print_details");
printBtn?.addEventListener("click", function () {
  printout(".print_blog", {
    importCSS: true,
  });
});
