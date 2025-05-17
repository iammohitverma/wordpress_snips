jQuery(document).ready(function ($) {

  $(".st_ut_main").click(function (e) {
    e.stopPropagation();
    $(".st_ut_list").toggle();
  });

  $(document).click(function (e) {
    if (!$(e.target).closest(".st_ut_main, .st_ut_list").length) {
      $(".st_ut_list").hide();
    }
  });
  // datalayer code on reqinfo and apply now
  $(".apply_link").click(function () {
    if (
      $(this).attr("href") == "#programme-apply" &&
      window.location.href.includes("/programme/")
    ) {
      let programname = $("#programme-header h1").text().trim();
      dataLayer.push({
        event: "click_button",
        buttonName: "Request Info",
        programName: programname,
      });
    }
  });
  $(".ab-testing-tm").click(function (event) {
    event.preventDefault();
    if (window.location.href.includes("/programme/")) {
      let programname = $("#programme-header h1").text().trim();
      dataLayer.push({
        event: "start_pre_apply",
        programName: programname,
        buttonName: "Apply Now",
        stepNumber: "1",
        stepName: "Start Application",
      });
    }
    setTimeout(function () {
      window.location.href = event.target.href;
    }, 500);
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
    link = "/uuckl/programmes/";
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
    link_bm = "/uuckl-bm/program-program/";
  }  else {
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

  // filter js start
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
  
let enquireNow_btn = document.querySelectorAll(".enquiry");

enquireNow_btn.forEach(element => {
    element.addEventListener("click", function () {
        let attr_value = this.getAttribute("href");
        let queryString = attr_value.split('?')[1];

        if (queryString) {
            let urlParams = new URLSearchParams(queryString);
            let rawProgramme = urlParams.get('programme');
            let programme = decodeURIComponent(rawProgramme).trim();

            console.log(programme);
            localStorage.setItem("programmeName", programme);
        }
    });
});
 
 
  // const programmeName = new URLSearchParams(window.location.search).get('programme');
  
  
  // const programmeName = localStorage.getItem("programmeName");

    // if (programmeName) {
        // $('#input_353_28').val(programmeName).change(); 
        // $('#input_353_28').css('pointer-events', 'none');
          // $('#input_356_28').val(programmeName).change(); 
        // $('#input_356_28').css('pointer-events', 'none');
        // localStorage.removeItem("programmeName");
    // }
    
  
  

  
  
  

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
  removeFilter.addEventListener("click", function () {
    if (removeFilter) {
      document.querySelector(".vk_sidebar_design .sidebar_design .elementor-shortcode").classList.remove("active");
    }
  });

  // filter js end


  if (window.location.href.includes("/thank-you/")) {
    let formData = sessionStorage.getItem("formData");
    if (formData) {
      // Parse the data
      let data = JSON.parse(formData);
      window.dataLayer = window.dataLayer || [];
      dataLayer.push(data);

      sessionStorage.removeItem("formData");

      console.log("Data Layer pushed:", data);
    }
  }

  


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
  let searchText = '';

  $('.filter_content input[type="checkbox"]').change(function () {
    selectedDept = [];
    selectedLevel = [];
    selectedLocation = [];
    selectedJobArea = [];
    selectedJobType = [];
    page = 1;

    $(".vk_preloader").addClass("active");
    $(".result_cards").hide();

    // searchText = $("#search_field").val() || '';

    $('input[name="department_filter_desktop"]:checked, input[name="department_filter_mob"]:checked').each(function () {
      selectedDept.push($(this).val());
    });

    $('input[name="level_filter_desktop"]:checked, input[name="level_filter_mob"]:checked').each(function () {
      selectedLevel.push($(this).val());
    });

    $('input[name="location_filter_desktop"]:checked, input[name="location_filter_mob"]:checked').each(function () {
      selectedLocation.push($(this).val());
    });
     $('input[name="jobarea_filter_desktop"]:checked, input[name="jobarea_filter_mob"]:checked').each(function () {
      selectedJobArea.push($(this).val());
    });
    $('input[name="employment_filter_desktop"]:checked, input[name="employment_filter_mob"]:checked').each(function () {
      selectedJobType.push($(this).val());
    });
    
    loadPosts(selectedDept, selectedLevel, selectedLocation, page, searchText, selectedJobArea, selectedJobType);
  });


  $(document).on("click", ".ajax_pagination a", function (e) {
    e.preventDefault();
    $(".vk_preloader").addClass("active");
    $(".result_cards").hide();

    page = $(this).attr("href").split("paged=")[1] || 1; // Get the clicked page number
    
    loadPosts(selectedDept, selectedLevel, selectedLocation, page, searchText, selectedJobArea, selectedJobType);
    
  });

  $("#search_form_desk, #search_form_mob").submit(function(e){
    e.preventDefault();
    $(".vk_preloader").addClass("active");
    $(".result_cards").hide();
    searchText = $(this).find(".custom_inp").val() || '';
    // console.log(searchText);
    
    loadPosts(selectedDept, selectedLevel, selectedLocation, page, searchText, selectedJobArea, selectedJobType);
  })


  function loadPosts(dept, level, location, page, searchText, JobArea, JobType) {
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      type: "POST",
      data: {
        action: "tab_related_post",
        dept: dept,
        level: level,
        location: location,
        JobArea: JobArea,
        JobType: JobType,
        paged: page,
        searchText: searchText,
      },
      success: function (response) {
        if (response) {
          $(".result_cards").show();
          $(".result_cards").empty();
          $(".result_cards").append(response.html);
          jQuery('.result_heading_wrap span').text(response.count + ' positions');
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

window.addEventListener("scroll", function () {
  if (window.scrollY > 50) {
    document
      .querySelector(".generate-back-to-top.custom_top")
      .classList.add("showArrowTop");
  } else {
    document
      .querySelector(".generate-back-to-top.custom_top")
      .classList.remove("showArrowTop");
  }
});

setTimeout(function () {
  jQuery(".country-list .country").on("click", function () {
    var codess = jQuery(this).attr("data-dial-code");
    //console.log(codess)
    //  jQuery(".flag-dropdown.f16").attr("data-dial-code",codess);
    jQuery(".intl-tel-input input").val(`+${codess}`);
  });
}, 4000);

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
  const targetDate = new Date("2025-01-20T21:29:00"); // Set to 9:29 PM IST
  // const targetDate = new Date("2025-01-20T17:59:30"); // Set to 9:29 PM IST
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
    }
  });

  // for jobs page:-
jQuery(".position_filters .filter_heading").click(function(){
  jQuery(this).next().slideToggle();
});
jQuery(".filter_btn").click(function(){
  jQuery(".mobile_position_filters_wrapper").addClass("active");
  jQuery("#mobile_position_filters").addClass("active");
});
jQuery(".reverse_btn").click(function(){
  jQuery(".mobile_position_filters_wrapper").removeClass("active");
  jQuery("#mobile_position_filters").removeClass("active");
});
// jQuery(document).on("click", ".position_result_card", function(){
  // jQuery(this).toggleClass("active");
  // jQuery(this).find(".hidden_content").slideToggle();
// });
jQuery(document).on("click", ".position_result_card", function(e){
  // Prevent toggle if the click happened on .apply_btn
  if (jQuery(e.target).closest(".apply_btn").length) {
    return;
  }
  jQuery(this).toggleClass("active").find(".hidden_content").slideToggle();
  jQuery(".position_result_card").not(this).removeClass("active").find(".hidden_content").slideUp(); // Remove active class from others and hide their content
});
jQuery(document).on("click", ".mobile_position_filters_wrapper .overlay", function(){
  jQuery(".mobile_position_filters_wrapper").removeClass("active");
  jQuery("#mobile_position_filters").removeClass("active");
});

jQuery('#bachelor_degree_id_program').on('click', function() {
    jQuery('#bachelor_degree_id').click();
});

jQuery('#diploma_level_id_programe').on('click', function() {
    jQuery('#diploma_programme_id').click();
});