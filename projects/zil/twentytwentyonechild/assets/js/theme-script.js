jQuery(document).ready(function ($) {


  jQuery('#preloader').fadeOut('slow', function () {
    jQuery(this).remove();

  });


  $("body").addClass("loaded");
  // header script start
  var header = $("header");
  var headerHeight = $("header").outerHeight();
  $("body")
    .get(0)
    .style.setProperty("--header-height", headerHeight + "px");
  $(".toggle-menu").on("click", function () {
    $("html, body").toggleClass("overflow-hidden");
    $("header").toggleClass("active");
    $("header .navigation_wrap").slideToggle();
  });
  $(".submenu_btn").on("click", function () {
    $(this).closest(".a-Wrap").next(".sub-menu").slideToggle();
  });

  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 0) {
      header.addClass("is-sticky");
    } else {
      header.removeClass("is-sticky");
    }
  });
  // header script end

  // popup_team js start
  const popup_team = $(".popup_team");
  const popupClose = popup_team.find(".close");

  // Show popup
  $(".popup_trigger").on("click", function () {
    // for team popups
    if ($(this).closest(".team_card")) {
      let teamPopupContent = $(this)
        .closest(".team_card")
        .find(".team_popup_content");
      $(".popup_box_inner").html(teamPopupContent.html());
    }
    popup_team.addClass("active");
    $("body").addClass("overflow-hidden");
  });

  // Hide popup on close button
  popupClose.on("click", function () {
    popup_team.removeClass("active");
    $("body").removeClass("overflow-hidden");
  });

  // Hide popup on Escape key
  $(document).on("keydown", function (e) {
    if (e.key === "Escape") {
      popup_team.removeClass("active");
      $("body").removeClass("overflow-hidden");
    }
  });

  // Hide popup when clicking outside the popup content
  popup_team.on("click", function (e) {
    if ($(e.target).is(".popup_team")) {
      popup_team.removeClass("active");
      $("body").removeClass("overflow-hidden");
    }
  });
  // popup_team js end

  // for growth chart script start
  const ctx = document.getElementById("growth_chart")?.getContext("2d");
  if (ctx) {
    const chart = new Chart(ctx, {
      type: "line",
      data: {
        labels: ["2020", "2021", "2022", "2023", "2024", "2025"],
        datasets: [
          {
            label: "Visitors",
            data: [50, 120, 210, 240, 298, 316],
            backgroundColor: "#0f3d3a",
            borderColor: "#01c5be",
            pointBackgroundColor: "#01c5be",
            pointBorderColor: "#01c5be",
            pointHoverBackgroundColor: "#ffffff",
            pointHoverBorderColor: "#ffffff",
            borderWidth: 2,
            fill: false,
            tension: 0.4, // makes the line curved
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false, // <-- Hide the legend box
          },
        },
        scales: {
          x: {
            beginAtZero: true,
            ticks: {
              color: "#fff",
            },
            grid: {
              color: "#c9f8a933", // <-- X-axis grid line color
            },
          },
          y: {
            beginAtZero: true,
            ticks: {
              color: "#fff",
            },
            grid: {
              color: "#c9f8a933", // <-- X-axis grid line color
            },
          },
        },
      },
    });
  }
  // for growth chart script end

  // for percentage chart script start
  const ctx2 = document.getElementById("percentageChart")?.getContext("2d");

  if (ctx2) {
    const data = {
      labels: ["2022", "2023", "2024", "2025"],
      datasets: [
        {
          label: "Percentage",
          data: [40, 45, 61, 84],
          backgroundColor: "#01c5be",
          borderRadius: 15,
          barThickness: 50,
        },
      ],
    };

    const config = {
      type: "bar",
      data: data,
      options: {
        responsive: true,
        plugins: {
          legend: { display: false },
          tooltip: { enabled: true },
          datalabels: {
            // color: "#c8f8a9",
            color: "#fff",
            font: {
              size: 14,
              weight: "bold",
              family: "DM Sans",
            },
            anchor: "end",
            align: "start",
            offset: 10,
            formatter: (value) => value + "%",
          },
        },
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              display: false,
              drawBorder: true, // 👈 Show left axis line
              color: "#fff",
            },
            ticks: {
              display: true,
            },
          },
          x: {
            grid: {
              display: false,
              drawBorder: true, // 👈 Show bottom axis line
              color: "#fff",
            },
            ticks: {
              color: "#fff",
              font: {
                size: 14,
                family: "Poppins",
              },
            },
          },
        },
      },
      plugins: [ChartDataLabels],
    };

    new Chart(ctx2, config);
  }
  // for percentage chart script end

  // Testimonial Slider start
  $(".testimonial_carousel").owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 2,
      },
      992: {
        items: 3,
      },
    },
  });
  // Testimonial Slider end

  // Awards Slider start
  $(".awards_slider").owlCarousel({
    loop: true,
    margin: 40,
    nav: true,
    dots: false,
    navText: [
      '<i class="fa-solid fa-arrow-left"></i>',
      '<i class="fa-solid fa-arrow-right"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 2,
      },
      992: {
        items: 3,
      },
    },
  });
  // Awards Slider end

  // Brand Slider start
  $(".brand_slider").owlCarousel({
    loop: true,
    margin: 40,
    nav: false,
    dots: false,
    mouseDrag: true,
    touchDrag: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed: 3000,
    smartSpeed: 450,
    rewind: true,
    slideTransition: "linear",
    responsive: {
      0: {
        items: 1,
      },
      0: {
        items: 2,
      },
      768: {
        items: 3,
      },
      992: {
        items: 4,
      },
      1200: {
        items: 5,
      },
    },
  });
  // Testimonial Slider end

  // success_stories Slider start
  $(".success_stories_carousel").owlCarousel({
    loop: true,
    nav: false,
    margin: 0,
    dots: true,
    items: 1,
    autoHeight: false,
  });
  // success_stories Slider end

  // For masonry gallery start
  const masonryGallery = $(".masonry_gallery .gallery");
  if (masonryGallery) {
    masonryGallery.masonry({
      itemSelector: ".gallery-item",
      percentPosition: true,
      gutter: 15,
    });
  }
  // For masonry gallery end


  // hideWelcomePopup
  function hideWelcomePopup() {
    $('#welcome_popup').hide();
    popupShown = true;
    localStorage.setItem('welcome_popup_shown', 'true');
  }

  // Check if popup seen before (flag in sessionStorage)
  let popupShown = false;

  // Check sessionStorage to see if popup has already been shown
  if (!sessionStorage.getItem('welcome_popup_shown')) {
    $(window).on('scroll', function () {
      if (!popupShown && $(window).scrollTop() >= 700) {
        let element = $('#welcome_popup');
        if (element.length) {
          element.css('display', 'flex');
          popupShown = true;

          // Set the flag in sessionStorage so popup doesn't show again
          sessionStorage.setItem('welcome_popup_shown', 'true');
        }
      }
    });
  }

  // Explore tap click
  $('#explore_tap').on('click', function (e) {
    e.preventDefault();
    $('#screen_two').css('display', 'flex');
    $('#screen_one').css('display', 'none');
  });

  // Popup close button
  $('.welcome_popup_close').on('click', function (e) {
    hideWelcomePopup();
  });

  // Close on ESC key
  $(document).on('keydown', function (e) {
    if (e.key === "Escape" && $('#welcome_popup').is(':visible')) {
      hideWelcomePopup();
    }
  });

  // Close popup if user clicks on background
  $(document).on('click', function (e) {
    let currTarget = e.target;
    if ((currTarget.id === 'welcome_popup') || (currTarget.parentElement.id === 'welcome_popup')) {
      hideWelcomePopup();
    }
  });

  $('#advisory_link, #internship_link').on('click', function () {
    hideWelcomePopup();
  });


  // On successful Forminator form submission
  // $('#forminator-module-2202').on('forminator:form:submit:success', function (e) {
  //   jQuery('#welcome_popup #screen_two').hide();
  //   jQuery('#welcome_popup #screen_thankyou').css('display', 'flex');

  //   // Optionally set another flag that form is submitted
  //   //sessionStorage.setItem('welcome_form_submitted', 'true');

  //   setTimeout(function () {
  //     window.location.href = "/tap";
  //   }, 5000);
  // });


  // apply_via_zillion_popup js start
  const apply_via_zillion_popup = $(".apply_via_zillion_popup");
  const apply_via_zillion_popup_close = apply_via_zillion_popup.find(".close");

  // Show popup
  $(".apply_zillion").on("click", function (e) {
    var formi_footer = $(".forminator-pagination-footer");
    var buttons = formi_footer.find(".forminator-button");

    // agar button group already nahi hai to wrap kar do
    if (!formi_footer.find(".forminator-button-group").length) {
      buttons.wrapAll('<div class="forminator-button-group"></div>');
    }
    $(".forminator-pagination-progress").prependTo(".forminator-pagination-footer");


    $(".apply_via_zillion_popup .screen_1").addClass("active");
    $(".apply_via_zillion_popup .screen_2").removeClass("active");
    $(".score_card_popup").removeClass("active");

    apply_via_zillion_popup.addClass("active");

    // ✅ Disable body scroll safely
    const scrollTop = $(window).scrollTop();
    $("body")
      .addClass("popup-open")
      .css({
        "overflow": "hidden",
        "position": "fixed",
        "top": `-${scrollTop}px`,
        "width": "100%"
      })
      .data("scroll-top", scrollTop);

    // Get job title from card
    let job_title = $(e.target).closest(".job_card").find(".job_title").text();
    $(".for_job_title input").val(job_title);
  });

  // Hide popup function (common logic)
  function closeZillionPopup() {
    apply_via_zillion_popup.removeClass("active");

    // ✅ Re-enable body scroll
    const scrollTop = $("body").data("scroll-top") || 0;
    $("body")
      .removeClass("popup-open")
      .css({
        "overflow": "",
        "position": "",
        "top": "",
        "width": ""
      });
    $(window).scrollTop(scrollTop);
  }

  // Hide popup on close button
  apply_via_zillion_popup_close.on("click", closeZillionPopup);

  // Hide popup on Escape key
  $(document).on("keydown", function (e) {
    if (e.key === "Escape") {
      closeZillionPopup();
    }
  });

  // Hide popup when clicking outside the popup content
  apply_via_zillion_popup.on("click", function (e) {
    if ($(e.target).is(".apply_via_zillion_popup")) {
      closeZillionPopup();
    }
  });


  $('#forminator-module-2714').on('forminator:form:submit:success', function (e) {
    jQuery('#welcome_popup #screen_two').hide();
    jQuery('#welcome_popup #screen_thankyou').css('display', 'flex');

    const screen1 = $(".apply_via_zillion_popup .screen_1");
    const screen2 = $(".apply_via_zillion_popup .screen_2");

    screen1.removeClass("active");
    screen2.addClass("active");

    // animate progress bar
    const bar = screen2.find(".progress-bar");
    bar.css("width", "0%").animate({ width: "100%" }, 3000, "linear", function () {

      setTimeout(() => {
        $(".apply_via_zillion_popup").removeClass("active");
        $(".score_card_popup").addClass("active");
      }, 1000);
    });
  });

  // apply_via_zillion_popup js end


  // score card popup start
  const score_card_popup = $(".score_card_popup");
  const score_card_popup_close = score_card_popup.find(".close");

  // Show popup
  $(".score_card_popup_trigger").on("click", function () {
    score_card_popup.addClass("active");
    $("body").addClass("overflow-hidden");
  });

  // Hide popup on close button
  score_card_popup_close.on("click", function () {
    score_card_popup.removeClass("active");
    $("body").removeClass("overflow-hidden");
    $("body").css({ overflow: "", position: "", top: "", width: "" });
  });

  // Hide popup on Escape key
  $(document).on("keydown", function (e) {
    if (e.key === "Escape") {
      score_card_popup.removeClass("active");
      $("body").removeClass("overflow-hidden");
      $("body").css({ overflow: "", position: "", top: "", width: "" });
    }
  });

  // Hide popup when clicking outside the popup content
  score_card_popup.on("click", function (e) {
    if ($(e.target).is(".score_card_popup")) {
      score_card_popup.removeClass("active");
      $("body").removeClass("overflow-hidden");
      $("body").css({ overflow: "", position: "", top: "", width: "" });
    }
  });
  // score card popup end

  // volunteer_popup popup start
  // hide_volunteer_popup
  function hide_volunteer_popup() {
    $("body").removeClass("overflow-hidden");
    $('#volunteer_popup').css('display', 'none');
    $('#volunteer_popup [id^="screen_"]').hide(); // hide all screens
  }

  // trigger volunteer_popup
  $('#volunteer_popup_trigger').on('click', function (e) {
    e.preventDefault();
    $("body").addClass("overflow-hidden");
    $('#volunteer_popup').css('display', 'flex');
    $('#volunteer_popup #screen_one').css('display', 'flex');
    $('#volunteer_popup #screen_two, #volunteer_popup #screen_thankyou').css('display', 'none');
  });

  $('#apply_volunteer').on('click', function (e) {
    e.preventDefault();
    $('#volunteer_popup #screen_one').css('display', 'none');
    $('#volunteer_popup #screen_two').css('display', 'flex');
  });


  // Close on ESC key
  $(document).on('keydown', function (e) {
    if (e.key === "Escape" && $('#volunteer_popup').is(':visible')) {
      hide_volunteer_popup();
    }
  });

  // Close popup if user clicks on background
  $(document).on('click', function (e) {
    let currTarget = e.target;
    if ((currTarget.id === 'volunteer_popup') || (currTarget.parentElement.id === 'volunteer_popup')) {
      hide_volunteer_popup();
    }
  });


  // Hide popup on close button
  const volunteer_popup_close = jQuery('#volunteer_popup').find(".close");
  volunteer_popup_close.on("click", function (e) {
    e.preventDefault();
    hide_volunteer_popup();
  });


  $('#forminator-module-2715').on('forminator:form:submit:success', function (e) {
    jQuery('#volunteer_popup #screen_one').css('display', 'none');
    jQuery('#volunteer_popup #screen_two').css('display', 'none');
    jQuery('#volunteer_popup, #volunteer_popup #screen_thankyou').css('display', 'flex');
  });
  // volunteer_popup popup end
});


/*Script For Job Tabs Start*/

// let selectedItem = document.querySelectorAll(".nab_tab_head li");
// selectedItem.forEach(element => {
//   element.addEventListener("click", function () {
//     selectedItem.forEach(element => {
//       element.classList.remove('active');
//     });
//     this.classList.add('active');
//     let getHeadAttr = this.getAttribute('data-tab');
//     let selectedBodyItem = document.querySelectorAll('.nav_tab_body div');
//     selectedBodyItem.forEach(element => {
//       element.classList.remove('active');
//       let getBodyAttr = element.getAttribute('data-val');
//       if (getBodyAttr == getHeadAttr) {
//         element.classList.add('active');
//       }
//     });
//   });
// });
/*Script For Job Tabs End*/


