jQuery(document).ready(function () {
  // Responsive Menu JS by Aditya
  document.querySelector(".hamburger").addEventListener("click", function () {
    this.classList.toggle("is-active");
    document.querySelector(".menu").classList.toggle("show-menu");
  });

  // Hide menu if clicked outside
  document.addEventListener("click", function (event) {
    const isClickInsideMenu = document
      .querySelector(".menu")
      .contains(event.target);
    const isClickOnHamburger = document
      .querySelector(".hamburger")
      .contains(event.target);
    if (!isClickInsideMenu && !isClickOnHamburger) {
      document.querySelector(".menu").classList.remove("show-menu");
      document.querySelector(".hamburger").classList.remove("is-active");
    }
  });

  let header = document.querySelector("header");
  let headerHeight = header.offsetHeight;
  document
    .querySelector("body")
    .style.setProperty("--headerHeight", headerHeight + "px");
  $(".subMenuAngle").click(function () {
    $(this).toggleClass("active");
    $(this).next(".sub-menu").slideToggle();
  });

  $(".hero_slider").owlCarousel({
    loop: true,
    margin: 0,
    nav: false,
    dots: true,
    items: 1,
  });
  $(".programs_slider").owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1,
      },
      992: {
        items: 2,
      },
    },
  });
  $(".testimonials_slider").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    center: true,
    autoplay: true,
    responsive: {
      0: {
        items: 1,
        stagePadding: 0,
        margin: 20,
      },
      992: {
        items: 2,
        stagePadding: 100,
        margin: 200,
      },
    },
  });
  $(".image_corousel_sec").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    autoplay: true,
    slideTransition: 'linear',
    autoplayTimeout: 2000,
    autoplaySpeed: 2000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
      },
      575: {
        items: 2,
      },
      767: {
        items: 3,
      },
      991: {
        items: 4,
      },
      1200: {
        items: 5,
      },
    },
  });

  // custom_slider_btn
  jQuery(".custom_slider_btn .prev").click(function () {
    jQuery(this).closest("section").find(".owl-prev").click();
  });
  // custom_slider_btn
  jQuery(".custom_slider_btn .next").click(function () {
    jQuery(this).closest("section").find(".owl-next").click();
  });

  const accordionItemHeaders = document.querySelectorAll(
    ".accordion-item-header"
  );

  accordionItemHeaders.forEach((accordionItemHeader) => {
    accordionItemHeader.addEventListener("click", (event) => {
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


  // if user comes from menu link & open tab content
  function aboutAccordionOnNavLinkClick() {
    $("#menu-learn-to-swim li a").on("click", function (event) {
      var href = $(this).attr("href");
      var hashIndex = href.indexOf("#");

      if (hashIndex !== -1) {
        let hashValue = href.substring(hashIndex + 1);
        if (hashValue) {
          window.location.hash = hashValue; // Update the URL hash
        }
      }
    });
  }

  function openAccordionFromHash() {
    let hashValue = window.location.hash.substring(1); // Get hash from URL

    if (hashValue) {
      let targetAccordionHeader = $("#" + hashValue).find(
        ".accordion-item-header"
      );

      if (targetAccordionHeader.length) {
        // console.log(hashValue);

        $(".accordion-item-header.active")
          .removeClass("active")
          .next(".accordion-item-body")
          .css("max-height", "0");

        targetAccordionHeader.addClass("active");

        // Open the corresponding accordion body
        var accordionBody = targetAccordionHeader.next(".accordion-item-body");
        accordionBody.css(
          "max-height",
          accordionBody.prop("scrollHeight") + "px"
        );
      }
    }
  }

  aboutAccordionOnNavLinkClick();
  openAccordionFromHash(); 

  // Handle hash changes dynamically (e.g., if user pastes a URL with a hash)
  $(window).on("hashchange", function () {
    openAccordionFromHash();
  });

  // Birthday parties popup booking form:-
  // $(window).on("load", function () {
  //   setTimeout(function () {
  //     $(".popup_section").addClass("active");
  //   }, 2000);
  // });
  $(".booking-section .btn").click(function(){
    $(".popup_section").addClass("active");
  });
  $(".popup_section .close").click(function () {
    $(".popup_section").removeClass("active");
  });

  $(".faq_accordion").append($("<p id='noResults' class='alert alert-danger' style='display: none;'>No search results found</p>"));

  $(".faq_wrap .form-group input[type='text']").on("keyup", function () {
    var searchText = $(this).val().toLowerCase();
    // console.log(searchText);
    var matchFound = false;
    

    $(".accordion-item").each(function () {
      var question = $(this).find(".accordion-item-header").text().toLowerCase();

      if (question.includes(searchText)) {
        $(this).show();
        matchFound = true;
      } else {
        $(this).hide();
      }
    });

    // Show "No search results found" message if no matches
    if (!matchFound) {
      $("#noResults").show();
    } else {
      $("#noResults").hide();
    }
  });

  // ajax filter:-
  $( ".post_with_filter #all_articles" ).on( "click", function() {
    $activeTab = $(".post_with_filter .nav-link.active").attr("data-taxonomy");
    if ($activeTab == "article") {
      $( ".post_filter_content #pills-home .post_wrap" ).append('<div class="loader_for_filters"><span class="loader"></span></div>');
    }else if ($activeTab == "news") {
      $( ".post_filter_content #pills-profile .post_wrap" ).append('<div class="loader_for_filters"><span class="loader"></span></div>');
    }else if ($activeTab == "podcast") {
      $( ".post_filter_content #pills-contact .post_wrap" ).append('<div class="loader_for_filters"><span class="loader"></span></div>');
    }
    $.ajax({
      type: "GET",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "postfilter",
        selectedTab: $activeTab,
      },
      success: function(response){
        if ($activeTab == "article") {
          setTimeout(function () {
            $( ".post_filter_content .loader_for_filters" ).remove();
            $( ".post_filter_content #pills-home .post_wrap" ).html(response);
          }, 1000);
        }else if ($activeTab == "news") {
          setTimeout(function () {
            $( ".post_filter_content .loader_for_filters" ).remove();
            $( ".post_filter_content #pills-profile .post_wrap" ).replaceWith(response);
          }, 1000);
        }else if ($activeTab == "podcast") {
          setTimeout(function () {
            $( ".post_filter_content .loader_for_filters" ).remove();
            $( ".post_filter_content #pills-contact .post_wrap" ).replaceWith(response);
          }, 1000);
        }
      }
    });
  });
});
