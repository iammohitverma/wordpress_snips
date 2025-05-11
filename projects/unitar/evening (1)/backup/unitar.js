/***************************************/
// set locations on session storage start
/***************************************/
window.addEventListener("DOMContentLoaded", function () {
  let allProgramHeadings = document.querySelectorAll(
    ".programme-heading-loop a"
  );
  function setLocationSessionOnHeading(e) {
    let currentProduct = e.target.closest(".product");
    let locationText = currentProduct.querySelector(".st_ut_main a").innerText;
    sessionStorage.setItem("currentLocation", locationText);
  }
  allProgramHeadings.forEach((element) => {
    element.addEventListener("click", setLocationSessionOnHeading);
  });

  let allUTLocations = document.querySelectorAll(".st_ut_dropdown a");
  function setLocationSessionOnAnchor(e) {
    let locationText = e.target.innerText;
    sessionStorage.setItem("currentLocation", locationText);
  }

  allUTLocations.forEach((element) => {
    element.addEventListener("click", setLocationSessionOnAnchor);
  });

  let savedLocation = sessionStorage.getItem("currentLocation");
  if (savedLocation) {
    let dynamicLocation = document.getElementById("dynamic_location");
    if (dynamicLocation) {
      dynamicLocation.innerText = savedLocation;
    }
  }
});
/***************************************/
// set locations on session storage end
/***************************************/

jQuery(document).ready(function ($) {
  /***************************************/
  // campus filter script start
  /***************************************/
  let mohFilterChecboxesArray = [];
  jQuery(".mohe-filter li").on("click", function () {
    let checkboxItem = jQuery(this);
    checkboxItem.toggleClass("checked");

    let selectedValue = checkboxItem.find("label").text().trim();
    let allProducts = jQuery(".product");

    // ✅ checkbox checked
    if (checkboxItem.hasClass("checked")) {
      mohFilterChecboxesArray.push(selectedValue);
    } else {
      // ❌ checkbox unchecked
      let index = mohFilterChecboxesArray.indexOf(selectedValue);
      if (index !== -1) {
        mohFilterChecboxesArray.splice(index, 1);
      }
    }
    allProducts.each(function () {
      let product = jQuery(this); // current product
      let stUtMain = product.find(".st_ut_main .a_wrap"); // inside current product
      let stUtMainHeading = product.find(".location_wrap .a_wrap");
      let stUtListOptions = product.find(".st_ut_list [data-location]"); // all options inside current product
      let stUtListOption = product.find(
        `.st_ut_list [data-location="${selectedValue}"]`
      ); // find selected option from current product's options
      let previousIndex = parseInt(product.attr("previousitemindex")); // get previously moded item's index
      let currentitemcode = product.attr("currentitemcode"); // get previously item's index
      let currentMainAnchor = stUtMain.find("a"); // main anchor option inside current product

      // ✅ checkbox checked
      if (checkboxItem.hasClass("checked")) {
        if (stUtListOption.length) {
          if (currentMainAnchor.length) {
            let indexToMove = stUtListOptions.index(stUtListOption);
            stUtMain.empty().append(stUtListOption.clone());
            stUtMainHeading.empty().append(stUtListOption.clone());
            stUtListOption.after(currentMainAnchor);
            stUtListOption.remove();
            product.attr("previousitemindex", indexToMove);
            product.attr("currentitemcode", selectedValue);
          }
        }
      } else {
        // ❌ checkbox unchecked
        if (currentMainAnchor.length) {
          if (selectedValue == currentitemcode) {
            let optionAnchor = stUtListOptions.eq(previousIndex);
            optionAnchor.after(currentMainAnchor);
            stUtMain.empty().append(optionAnchor.clone());
            stUtMainHeading.empty().append(optionAnchor.clone());
            optionAnchor.remove();

            product.removeAttr("previousitemindex");
            product.removeAttr("currentitemcode");
          }
        }
      }
      // ✅ Set background colors of selected items
      stUtListOptions = product.find(".st_ut_list [data-location]");
      stUtListOptions.each(function () {
        let option = jQuery(this);
        let optionValue = option.attr("data-location");

        if (mohFilterChecboxesArray.includes(optionValue)) {
          option.addClass("selectedCheck");
        } else {
          option.removeClass("selectedCheck");
        }
      });
    });
  });

  /***************************************/
  // campus filter script end
  /***************************************/

  $(".campus_img_wrap").click(function (e) {
    e.stopPropagation();
    $(this).parent().next(".dt_ut_center").toggle();
  });

  // $(document).click(function (e) {
  //   if (!$(e.target).closest(".st_ut_main, .st_ut_list").length) {
  //     $(".st_ut_list").hide();
  //   }
  // });

  document.querySelectorAll(".multi_code p").forEach(function (p) {
    if (p.textContent.includes("MOHE/MQA:")) {
      p.innerHTML = p.innerHTML.replace("MOHE/MQA:", "");
    }
  });
  // Form label animate effect
  $("input, textarea, select").each(function () {
    $(this).parent().parent(".gfield").addClass("label-position");

    $(this).on("focus", function () {
      $(this).parent().parent(".gfield").addClass("active");
    });

    $(this).on("blur", function () {
      if ($(this).val().length == 0) {
        $(this).parent().parent(".gfield").removeClass("active");
      }
    });

    if ($(this).val() != "") {
      //$(this).parent('.css').addClass('active');
      $(this).parent().parent(".gfield").addClass("active");
    }
  });

  // Replace placholder wording for Woocommerce search widget
  $(".home #woocommerce-product-search-field-0").prop(
    "placeholder",
    "Search for a programme"
  );

  //Wrap headings words in span so design style can be applied

  var has_hash = location.hash;
  if (has_hash) {
    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $(has_hash).offset().top - $("#masthead").height(),
        },
        1000
      );
  }

  $(
    "#site-navigation .main-nav > ul > li > a .dropdown-menu-toggle, #secondary-navigation .secondary-menu-toggle"
  ).click(function () {});

  $("#secondary-navigation .secondary-menu-toggle").click(function () {});

  $("#site-navigation .main-nav > ul > li > a .dropdown-menu-toggle").click(
    function () {}
  );

  $(".custom-trigger").on("click", function () {
    $("#site-navigation .menu-toggle").trigger("click");
    $("#secondary-navigation .menu-toggle").trigger("click");

    $("#generate-slideout-menu .main-nav > ul > li").hide();

    $("#generate-slideout-menu .main-nav > ul > li:first").show();

    $("#generate-slideout-menu .main-nav > ul > li:first").addClass(
      "sfHover-custom"
    );
    $("#generate-slideout-menu .main-nav > ul > li:first  ul").addClass(
      "toggled-on-custom"
    );

    $(this).toggleClass("custom-trigger-clicked");
  });

  $("#mobile-menu-control-wrapper").click(function () {
    $("#generate-slideout-menu .main-nav > ul > li").show();
    $("#generate-slideout-menu .main-nav > ul > li:first").removeClass(
      "sfHover-custom"
    );
    $("#generate-slideout-menu .main-nav > ul > li:first  ul").removeClass(
      "toggled-on-custom"
    );
  });

  var subMenuOpen = $(
    "header#masthead nav .main-nav > ul > li > ul.toggled-on li"
  ).length;
  if (subMenuOpen > 3) {
    $(this).parent().addClass("menu-items-left");
  }

  $("#site-navigation .main-nav > ul > li > a .dropdown-menu-toggle").click(
    function () {
      var subMenuOpen = $(
        "header#masthead nav .main-nav > ul > li > ul.toggled-on li:not(header#masthead nav .main-nav > ul > li.mega-menu > ul.toggled-on li)"
      );

      if (subMenuOpen.length > 3) {
        $(subMenuOpen).parent().addClass("menu-items-left");
      }
    }
  );

  $(
    ".news-events-carousel.elementor-widget-reviews .elementor-testimonial__content"
  ).on("click", function () {
    $(this).parent().find("a").trigger("click");
  });

  var body = $("body");
  var link = "#";

  if (body.hasClass("tax-university")) {
    link = "/university/programmes/";
  } else if (body.hasClass("tax-college")) {
    link = "/college/programmes/";
  } else if (body.hasClass("tax-academy")) {
    link = "/academy/programmes/";
  } else if (body.hasClass("tax-klmuc-en")) {
    link = "/klmuc-en/programmes/";
  } else {
    link = "/programmes/";
  }

  $(".set-url > a").attr("href", link);

  var link_bm = "#";

  if (body.hasClass("tax-university") && body.hasClass("language_current_bm")) {
    link_bm = "/university-bm/program-program/";
  } else if (
    body.hasClass("tax-college") &&
    body.hasClass("language_current_bm")
  ) {
    link_bm = "/college-bm/program-program/";
  } else if (
    body.hasClass("tax-academy") &&
    body.hasClass("language_current_bm")
  ) {
    link_bm = "/academy-bm/program-program/";
  } else if (
    body.hasClass("tax-klmuc-en") &&
    body.hasClass("language_current_bm")
  ) {
    link_bm = "/klmuc-bm/program-program/";
  } else {
    link_bm = "/program-program/";
  }

  $(".set-url-bm > a").attr("href", link_bm);

  if (body.hasClass("tax-university")) {
    var linkAbout = "/university/about-unitar/";

    $(".set-about-url > a").attr("href", linkAbout);
  }

  if (body.hasClass("tax-university") && body.hasClass("language_current_bm")) {
    var linkAbout_bm = "/university-bm/mengenai-unitar/";

    $(".set-about-url-bm > a").attr("href", linkAbout_bm);
  }

  $(document).on(
    "click",
    ".vk_sidebar_design .programme-filter-wrapper .cross",
    function () {
      $(".vk_sidebar_design .sidebar_design .elementor-shortcode").removeClass(
        "active"
      );
    }
  );

  $(document).on("click", ".vk_sidebar_design #filter_btn", function (e) {
    e.preventDefault();
    $(".vk_sidebar_design .sidebar_design .elementor-shortcode").addClass(
      "active"
    );
  });

  $(document).on(
    "click",
    ".vk_sidebar_design .program_filter_overlay",
    function () {
      $(".vk_sidebar_design .sidebar_design .elementor-shortcode").removeClass(
        "active"
      );
    }
  );
  let removeFilter = document.querySelector(".program_filter_overlay");
  removeFilter?.addEventListener("click", function () {
    if (removeFilter) {
      document
        .querySelector(
          ".vk_sidebar_design .sidebar_design .elementor-shortcode"
        )
        .classList.remove("active");
    }
  });

  const programmeName = new URLSearchParams(window.location.search).get(
    "programme"
  );

  if (programmeName) {
    $("#input_287_28").val(programmeName).change();
    // $('#input_287_28').prop('disabled', true);
    $("#input_287_28").css("pointer-events", "none");
  }

  if (programmeName) {
    const checkFieldReady = setInterval(function () {
      const $programField = $("#input_289_26_1");

      if ($programField.length && $programField.find("option").length > 1) {
        const matchedOption = $programField.find("option").filter(function () {
          return (
            $(this).text().trim() === programmeName ||
            $(this).val().trim() === programmeName
          );
        });

        if (matchedOption.length > 0) {
          $programField.val(matchedOption.val());
          $programField.trigger("change");
          $programField.trigger("input");
          $programField.css("pointer-events", "none");

          clearInterval(checkFieldReady);
          const input = document.getElementById("input_289_26_2");
          const container = document.getElementById("input_289_26_2_container");

          input.addEventListener("change", function () {
            container.classList.add("show-preferred-campus");
          });
        }
      }
    }, 300); // Check every 300ms
  }

  // js popup

  // program popup js strt 22-04-25
  const expectedPath = "/programmes/";
  const currentPath = window.location.pathname;

  if (currentPath === expectedPath) {
    // console.log('hehe');

    $(".programme_popup").fadeIn();
    // $(document).on("keydown", function (e) {
    //   if (e.keyCode == 27) $(".programme_popup").fadeOut();
    // });
  }
  // program popup js strt 22-04-25
});

jQuery(function ($) {
  $('a[href^="#"]')
    .not('a[href="#"]')
    .click(function () {
      // $('a[href*=#]:not([href=#])').click(function() {
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html,body")
            .stop()
            .animate(
              {
                scrollTop: target.offset().top - $("#masthead").height(),
              },
              1000
            );
          return false;
        }
      }
    });

  var scrollPos = $(window).scrollTop();
  if (scrollPos >= 300) {
    $("body").addClass("fixed-header");
  } else {
    $("body").removeClass("fixed-header");
  }

  var fixmeTop = $("body").offset().top;
  $(window).scroll(function () {
    var currentScroll = $(window).scrollTop();
    if (currentScroll >= 300) {
      $("body").addClass("fixed-header");
    } else {
      $("body").removeClass("fixed-header");
    }
  });

  $(
    ".news-events-carousel.elementor-widget-reviews .elementor-testimonial__content"
  ).click(function () {
    $(".news-events-carousel.elementor-widget-reviews a").trigger("click");
  });

  // job filter js start(vikas)
  let selectedDept = [];
  let selectedLevel = [];
  let selectedLocation = [];
  let page = 1;
  let searchText = "";

  $('.filter_content input[type="checkbox"]').change(function () {
    selectedDept = [];
    selectedLevel = [];
    selectedLocation = [];
    page = 1;

    $(".vk_preloader").addClass("active");
    $(".result_cards").hide();

    // searchText = $("#search_field").val() || '';

    $(
      'input[name="department_filter_desktop"]:checked, input[name="department_filter_mob"]:checked'
    ).each(function () {
      selectedDept.push($(this).val());
    });

    $(
      'input[name="level_filter_desktop"]:checked, input[name="level_filter_mob"]:checked'
    ).each(function () {
      selectedLevel.push($(this).val());
    });

    $(
      'input[name="location_filter_desktop"]:checked, input[name="location_filter_mob"]:checked'
    ).each(function () {
      selectedLocation.push($(this).val());
    });

    loadPosts(selectedDept, selectedLevel, selectedLocation, page, searchText);
  });

  $(document).on("click", ".ajax_pagination a", function (e) {
    e.preventDefault();
    $(".vk_preloader").addClass("active");
    $(".result_cards").hide();

    page = $(this).attr("href").split("paged=")[1] || 1; // Get the clicked page number

    loadPosts(selectedDept, selectedLevel, selectedLocation, page, searchText);
  });

  $("#search_form_desk, #search_form_mob").submit(function (e) {
    e.preventDefault();
    $(".vk_preloader").addClass("active");
    $(".result_cards").hide();
    searchText = $(this).find(".custom_inp").val() || "";
    // console.log(searchText);

    loadPosts(selectedDept, selectedLevel, selectedLocation, page, searchText);
  });

  function loadPosts(dept, level, location, page, searchText) {
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      type: "POST",
      data: {
        action: "tab_related_post",
        dept: dept,
        level: level,
        location: location,
        paged: page,
        searchText: searchText,
      },
      success: function (response) {
        if (response) {
          $(".result_cards").show();
          $(".result_cards").empty();
          $(".result_cards").append(response.html);
          jQuery(".result_heading_wrap span").text(
            response.count + " positions"
          );
        }
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
      complete: function () {
        // Hide preloader
        $(".vk_preloader").removeClass("active");
        $(".pagination").hide();
      },
    });
  }
  // job filter js end(vikas)
});

jQuery(document).on("elementor/popup/show", () => {
  //console.log("popup show ");

  //addGclid();

  jQuery('.elementor-popup-modal input[value="default_gclid"]').val(
    jQuery(".site-content #gclid_field").val()
  );

  console.log("popup show updated");

  jQuery("input, textarea, select").each(function () {
    jQuery(this).parent().parent(".gfield").addClass("label-position aaa");

    jQuery(this).on("focus", function () {
      jQuery(this).parent().parent(".gfield").addClass("active");
      //alert("Focus");
    });

    jQuery(this).on("blur", function () {
      if (jQuery(this).val().length == 0) {
        jQuery(this).parent().parent(".gfield").removeClass("active");
        //alert("Blur");
      }
    });

    if (jQuery(this).val() != "") {
      //jQuery(this).parent('.css').addClass('active');
      jQuery(this).parent().parent(".gfield").addClass("active");
      //alert("Not Empty");
    }
  });
});

// jQuery(document).ready(function(){
//   jQuery(".apCustomModal").addClass("showModal");
//   var buttonVal = localStorage.getItem('buttonCliked');
//   if (buttonVal !== null) {
//     jQuery(".apCustomModal").removeClass("showModal");
//   }else{
//     jQuery(".apCustomModal").addClass("showModal");
//   }

//   jQuery(".ap_closeModal").click(function(){
//     jQuery(".apCustomModal").removeClass("showModal");
//   });

//   jQuery(".redirect_btn").on("click", function(e){
//     var buttonVal = localStorage.getItem('buttonCliked');
//     if (buttonVal == null) {
//       var buttonVal = localStorage.setItem('buttonCliked', "yes");
//     }
//   });
// });
jQuery(document).ready(function () {
  // Get the current date and time in milliseconds
  const now = new Date();
  const currentDate = now.getTime();

  // Target date: 20-01-2025 at 9:29 PM IST
  // const targetDate = new Date("2025-01-20T21:29:00"); // Set to 9:29 PM IST
  const targetDate = new Date("2025-01-20T17:55:30"); // Set to 9:29 PM IST
  targetDate.setMinutes(targetDate.getMinutes() - 30); // Adjust for IST (UTC +5:30)

  // Check if the current date and time is before 9:29 PM IST on 20th January 2025
  if (currentDate < targetDate.getTime()) {
    jQuery(".apCustomModal").addClass("showModal");
  } else {
    localStorage.setItem("modalClosed", "true"); // Mark that the modal should not be shown
    jQuery(".apCustomModal").removeClass("showModal");
  }

  var buttonVal = localStorage.getItem("buttonCliked");
  if (buttonVal !== null || localStorage.getItem("modalClosed") === "true") {
    jQuery(".apCustomModal").removeClass("showModal");
  } else {
    jQuery(".apCustomModal").addClass("showModal");
  }

  jQuery(".ap_closeModal").click(function () {
    jQuery(".apCustomModal").removeClass("showModal");
  });

  jQuery(".redirect_btn").on("click", function (e) {
    var buttonVal = localStorage.getItem("buttonCliked");
    if (buttonVal == null) {
      localStorage.setItem("buttonCliked", "yes");
    }
  });
});

document
  .getElementById("scrollCntnt01")
  ?.addEventListener("click", function () {
    // Select the main content element
    const mainContent = document.getElementById("mainContent01");

    if (mainContent) {
      // Scroll the main content into view
      mainContent.scrollIntoView({ behavior: "smooth" });
    } else {
      console.error("Element with ID 'mainContent01' not found.");
    }
  });

document
  .getElementById("scrollCntnt02")
  ?.addEventListener("click", function () {
    // Select the main content element
    const mainContent = document.getElementById("mainContent02");

    if (mainContent) {
      // Scroll the main content into view
      mainContent.scrollIntoView({ behavior: "smooth" });
    } else {
      console.error("Element with ID 'mainContent01' not found.");
    }
  });

document
  .getElementById("scrollCntnt03")
  ?.addEventListener("click", function () {
    // Select the main content element
    const mainContent = document.getElementById("mainContent03");

    if (mainContent) {
      // Scroll the main content into view
      mainContent.scrollIntoView({ behavior: "smooth" });
    } else {
      console.error("Element with ID 'mainContent01' not found.");
    }
  });

// let swiper = new Swiper('.explore_slider', {
//   loop: true,
//   slidesPerView: 3,
//   spaceBetween: 20,
//   breakpoints: {
//     0: {
//       slidesPerView: 1.5,
//     },
//     576: {
//       slidesPerView: 2,
//     },
//     767: {
//       slidesPerView: 3,
//     },
//     992: {
//       slidesPerView: 4,
//     }
//   }
// });

// for jobs page:-
jQuery(".position_filters .filter_heading").click(function () {
  jQuery(this).next().slideToggle();
});
jQuery(".filter_btn").click(function () {
  jQuery(".mobile_position_filters_wrapper").addClass("active");
  jQuery("#mobile_position_filters").addClass("active");
});
jQuery(".reverse_btn").click(function () {
  jQuery(".mobile_position_filters_wrapper").removeClass("active");
  jQuery("#mobile_position_filters").removeClass("active");
});
// jQuery(document).on("click", ".position_result_card", function(){
// jQuery(this).toggleClass("active");
// jQuery(this).find(".hidden_content").slideToggle();
// });
jQuery(document).on("click", ".position_result_card", function (e) {
  // Prevent toggle if the click happened on .apply_btn
  if (jQuery(e.target).closest(".apply_btn").length) {
    return;
  }
  jQuery(this).toggleClass("active").find(".hidden_content").slideToggle();
  jQuery(".position_result_card")
    .not(this)
    .removeClass("active")
    .find(".hidden_content")
    .slideUp(); // Remove active class from others and hide their content
});
jQuery(document).on(
  "click",
  ".mobile_position_filters_wrapper .overlay",
  function () {
    jQuery(".mobile_position_filters_wrapper").removeClass("active");
    jQuery("#mobile_position_filters").removeClass("active");
  }
);

// for jobs post using ajax filter:-
// jQuery(".position_filters input").on("change", function () {

//   let departmentCount = [];
//   jQuery.each(jQuery("input[name='department_filter']:checked"), function(){
//     departmentCount.push(jQuery(this).closest("li").find("label").text());
//   });

//   let levelCount = [];
//   jQuery.each(jQuery("input[name='level_filter']:checked"), function(){
//     levelCount.push(jQuery(this).closest("li").find("label").text());
//   });

//   let locationCount = [];
//   jQuery.each(jQuery("input[name='location_filter']:checked"), function(){
//     locationCount.push(jQuery(this).closest("li").find("label").text());
//   });

//   console.log(departmentCount);
//   console.log(levelCount);
//   console.log(locationCount);

// $departmentVal = jQuery(this).closest("li").find("label").text();
// jQuery.ajax({
//   type : "GET",
//   url : "/wp-admin/admin-ajax.php",
//   data : {
//     action: "get_job_post",
//     departmentInputVal: $departmentVal,
//   },
//   success: function(response) {
//     alert(response);
//   }
// });
// });

function launchConfetti() {
  const defaults = {
    scalar: 2,
    spread: 1000,
    particleCount: 100,
    origin: { y: 0 },
    startVelocity: 10,
  };

  const confettiImages = [
    {
      src: "https://staging.unitar.my/wp-content/themes/UNITAR-Revamp/img/money.png",
      width: 32,
      height: 40,
      colors: ["#ff9a00", "#ff7400", "#ff4d00"],
    },
    {
      src: "https://staging.unitar.my/wp-content/themes/UNITAR-Revamp/img/money.png",
      width: 32,
      height: 40,
      colors: ["#ff9a00", "#ff7400", "#ff4d00"],
    },
    {
      src: "https://staging.unitar.my/wp-content/themes/UNITAR-Revamp/img/gold.png",
      width: 271,
      height: 351.5,
      colors: ["#8d960f", "#be0f10", "#445404"],
    },
  ];

  confettiImages.forEach((item) => {
    confetti({
      ...defaults,
      shapes: ["image"],
      shapeOptions: {
        image: {
          src: item.src,
          replaceColor: true,
          width: item.width,
          height: item.height,
        },
      },
      colors: item.colors,
    });
  });
}

window.addEventListener("DOMContentLoaded", function () {
  const currentPath = window.location.pathname;

  // Retrieve visited pages from localStorage
  let visitedPages = JSON.parse(sessionStorage.getItem("visitedPages")) || [];

  if (!visitedPages.includes(currentPath)) {
    visitedPages.push(currentPath);
    sessionStorage.setItem("visitedPages", JSON.stringify(visitedPages));

    // function to run confeeti
    launchConfetti();
  }
});
