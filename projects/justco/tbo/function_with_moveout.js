jQuery(document).ready(function ($) {
  console.log(
    "%cWebsite Built by Techmind Softwares",
    "background: #0a383f; color: #ffffff; display: block;padding:5px 15px;border-radius:7px"
  );

  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 250) {
      jQuery(".back_to_top").show();
    } else {
      jQuery(".back_to_top").hide();
    }
  });
  $(".back_to_top").click(function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "smooth");
  });

  // show more workspace:-
  $(document).on("click", ".workspace_show_more_btn", function () {
    $(".more_location_perks").slideDown();
    $(".elementor-button-text").text("show less");
    $(this).removeClass("workspace_show_more_btn");
    $(this).addClass("workspace_show_less_btn");
  });
  $(document).on("click", ".workspace_show_less_btn", function () {
    $(".more_location_perks").slideUp();
    $(".elementor-button-text").text("show more");
    $(this).removeClass("workspace_show_less_btn");
    $(this).addClass("workspace_show_more_btn");
  });

  // Homepage slider js:-
  $(".boring_look").owlCarousel({
    loop: true,
    margin: 25,
    center: true,
    stagePadding: 100,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      776: {
        items: 2,
      },
      992: {
        items: 3,
      },
    },
  });
  $(".owl-prev").html(
    '<img src="/theboringoffice/wp-content/uploads/2025/04/left_arrow.png" alt="prev_icon">'
  );
  $(".owl-next").html(
    '<img src="/theboringoffice/wp-content/uploads/2025/04/right_arrow.png" alt="next_icon">'
  );

  // homepage image slider:-
  $(".homepage_slider").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    items: 1,
    smartSpeed: 2000,
  });

  // $('select').select2({
  // 	minimumResultsForSearch: Infinity
  // });
  $("select").each(function (index) {
    let parentelem = $(this).parent("div");

    $(this).select2({
      minimumResultsForSearch: Infinity,
      dropdownParent: parentelem,
    });
  });

  // $(".beforeAfter").beforeAfter({
  //   movable: true,
  //   clickMove: true,
  //   position: 60,
  //   separatorColor: "#fafafa",
  //   bulletColor: "#fafafa",
  //   // onMoveStart: function (e) {
  //   //   console.log(event.target);
  //   // },
  //   // onMoving: function () {
  //   //   console.log(event.target);
  //   // },
  //   // onMoveEnd: function () {
  //   //   console.log(event.target);
  //   // },
  // });

  // macdonald house slider js:-
  var swiper = new Swiper(".thumbnail_slider", {
    spaceBetween: 10,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      576: {
        slidesPerView: 3,
      },
      767: {
        slidesPerView: 4,
      },
      991: {
        slidesPerView: 5,
      },
    },
  });
  var swiper2 = new Swiper(".thumbnail_image_slider", {
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

  var currentLink = window.location.href;
  $(`#page_type`).val(currentLink);

  // get last page url
  let lastPageSurf = sessionStorage.getItem("last_page_surf");
  if (lastPageSurf != undefined || lastPageSurf != null) {
    jQuery(".previous_page_type").val(lastPageSurf);
  } else {
    jQuery(".previous_page_type").val(window.location.href);
  }
  sessionStorage.setItem("last_page_surf", window.location.href);

  $("#contact_form_ds").submit(function (e) {
    e.preventDefault();
    var page_type = $("#page_type").val();
    $(".vr_submit").css("pointer-events", "none");
    $(".vr_submit").css("background-color", "#117fa58a");
    sessionStorage.setItem("page_type", page_type);
    $("#loader2").show();
    $.ajax({
      type: "POST",
      url: "/theboringoffice/wp-admin/admin-ajax.php",
      data: {
        action: "tbo_landing_page_submission",
        records: $("#contact_form_ds").serialize(),
      },
      success: function (data) {
        console.log(data);
        var response = JSON.parse(data);
        $("#contact_form_ds")[0].reset();
        $(".vr_submit").css("pointer-events", "unset");
        $(".vr_submit").css("background-color", "#ffff");
        $("#loader2").hide();
        // $("#success_tbo").html(response.message).css("display", "block");
        window.location.href = "/theboringoffice/thank-you/";
      },
    });
  });

  /* Phone number validation code start here */
  // change maxlength of number field according to country change
  // let allCountryCodeFields = document.querySelectorAll("[name='country_code']");
  // allCountryCodeFields.forEach((field) => {
  // field.addEventListener("change", function (event) {
  // console.log("test");
  // const currForm = event.target.closest("form");
  // const countryCode_value = event.target.value;
  // const phone = currForm.querySelector("[name='phone']");
  // setMaxLengthNumberField(countryCode_value, phone);
  // });
  // const currForm = field.closest("form");
  // const initialCountryCode = field.value;
  // console.log(initialCountryCode);
  // const phone = currForm.querySelector("[name='phone']");
  // setMaxLengthNumberField(initialCountryCode, phone);
  // });

  document.querySelectorAll("[name='country_code']").forEach((field) => {
    field.addEventListener("change", function (event) {
      handleCountryCodeChange(event.target);
    });
    if ($(field).hasClass("select2-hidden-accessible")) {
      $(field).on("select2:select", function (e) {
        handleCountryCodeChange(e.target);
      });
    }
    handleCountryCodeChange(field);
  });

  function handleCountryCodeChange(field) {
    const currForm = field.closest("form");
    const countryCode_value = field.value;
    const phone = currForm?.querySelector("[name='phone']");
    if (phone) {
      setMaxLengthNumberField(countryCode_value, phone);
    }
  }

  function setMaxLengthNumberField(countryCode_value, phone_number_field) {
    let maxLength;

    switch (countryCode_value) {
      case "+61": // Australia
        maxLength = 10;
        minLength = 9;
        phone_number_field.setAttribute("maxlength", maxLength);
        phone_number_field.setAttribute("minlength", minLength);
        break;
      case "+82": // Korea
        maxLength = 11;
        minLength = 10;
        phone_number_field.setAttribute("maxlength", maxLength);
        phone_number_field.setAttribute("minlength", minLength);
        break;
      case "+81": // Japan
        maxLength = 11;
        minLength = 10;
        phone_number_field.setAttribute("maxlength", maxLength);
        phone_number_field.setAttribute("minlength", minLength);
        break;
      case "+65": // Singapore
        maxLength = 8;
        minLength = 7;
        phone_number_field.setAttribute("maxlength", maxLength);
        phone_number_field.setAttribute("minlength", minLength);
        break;
      case "+886": // Taiwan
        maxLength = 10;
        minLength = 9;
        phone_number_field.setAttribute("maxlength", maxLength);
        phone_number_field.setAttribute("minlength", minLength);
        break;
      case "+66": // Thailand
        maxLength = 10;
        minLength = 9;
        phone_number_field.setAttribute("maxlength", maxLength);
        phone_number_field.setAttribute("minlength", minLength);
        break;
      default:
        // maxLength = "";
        maxLength = 15;
        minLength = 14;
        phone_number_field.setAttribute("maxlength", maxLength);
        phone_number_field.setAttribute("minlength", minLength);
    }
  }
  /* Phone number validation code ends here */

  // get complete url with query parameters [aditya]
  var url_w_query = window.location.toString();
  var strArray = url_w_query.split("?");
  // checking if hash parameter is in url
  if (strArray[1] && strArray[1].includes("#")) {
    var utmcode = "?" + strArray[1].substr(0, strArray[1].indexOf("#"));
  } else {
    var utmcode = "?" + strArray[1];
  }

  if (strArray[1] != "undefined" && strArray[1] != null && strArray[1] != "") {
    let getAllAnchor = document.querySelectorAll("a");
    getAllAnchor.forEach((element) => {
      let eachAnchor = element.getAttribute("href");
      if (!eachAnchor.includes("#contact_form")) {
        // let result = eachAnchor.substr(0, eachAnchor.indexOf('#'));
        let newAnchor = eachAnchor + utmcode;
        if (
          eachAnchor != null &&
          eachAnchor != "#" &&
          eachAnchor != "tel:" &&
          eachAnchor != "mailto:" &&
          eachAnchor != ""
        ) {
          element.setAttribute("href", newAnchor);
        }
      } else {
        let result = eachAnchor.substr(0, eachAnchor.indexOf("#"));
        // console.log(`${result}${utmcode}`);
        if (
          eachAnchor != null &&
          eachAnchor != "#" &&
          eachAnchor != "tel:" &&
          eachAnchor != "mailto:" &&
          eachAnchor != ""
        ) {
          element.setAttribute("href", `${result}${utmcode}#contact_form`);
        }
      }
    });
  }

  /** Dropdown  code start here **/
  // if ($("body").is(".page-id-7, .page-id-2029")) {
  var location_name = $(".center_location").find(":selected").val();
  $.ajax({
    type: "POST",
    url: "/theboringoffice/wp-admin/admin-ajax.php",
    dataType: "json",
    data: {
      action: "tbo_workspace_team",
      location_name: location_name,
    },
    success: function (response) {
      // console.log(response);
      $(".center_workspace").empty().append(response.workspacesRec);
      $(".center_team_size").empty().append(response.teamRec);
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", error);
    },
  });
  // }
  /** Dropdown  code end here **/

  jQuery(".filter_center").on("click", function (e) {
    e.preventDefault();
    // var location_name = $(this).closest(".center_location").find(":selected").val();
    var location_name = $(this)
      .closest(".customise_bar")
      .find(".center_location")
      .val();
    var workspaceName = $(this)
      .closest(".customise_bar")
      .find(".center_workspace")
      .val();
    var daterange = $('input[name="daterange"]').val();
    var number_val = $("#number_val").val();
    var current_url = $(this).attr("href");
    console.log(daterange);

    const drParts = daterange.split("-");
    const date_start = drParts[0].split("/");
    const date_end = drParts[1].split("/");

    const startDate = `${date_start[2].trim()}-${date_start[0].trim()}-${date_start[1].trim()}`;
    const endDate = `${date_end[2].trim()}-${date_end[0].trim()}-${date_end[1].trim()}`;

    let updated_url = `${current_url}?brand=tbo&move-in=${startDate}&move-out=${endDate}&pax=${number_val}&room-category=amazing-views&room-no=S04005&sid=abaocihpqeihrqp`;
    console.log(updated_url);
    window.location.href = updated_url;
  });

  /** Customize filter code start here **/
  // $('.filter_center').on('click', function(e) {
  // e.preventDefault();
  // var location_name = $(".center_location").find(":selected").val();
  // var center_workspace = $(".center_workspace").find(":selected").val();
  // var center_team_size = $(".center_team_size").find(":selected").val();
  // $(".filter_center").css("pointer-events", "none");
  // $(".filter_center").css("background-color", "#117fa58a");
  // $("#loader2").show();
  // $.ajax({
  // type: "POST",
  // url: "/theboringoffice/wp-admin/admin-ajax.php",
  // data: {
  // action: "tbo_center_filter",
  // location_name: location_name,
  // center_workspace: center_workspace,
  // center_team_size: center_team_size,
  // },
  // success: function (data) {
  // console.log(data);
  // $(".filter_center").css("pointer-events", "unset");
  // $(".filter_center").css("background-color", "#ffff");
  // },
  // });
  // });
  /** Customize filter code ends here **/
  jQuery(
    '[name="center_workspace"], [name="center_location"], [name="move_in_date"], [name="center_team_size"]'
  ).on("change", function () {
    var name = jQuery(this).attr("name");
    var value = jQuery(this).val();
    jQuery('[name="' + name + '"]')
      .not(this)
      .val(value);
    jQuery('[name="' + name + '"]').trigger("change.select2");
  });

  let stripeWrappers = document.querySelectorAll(".stripe_text");
  // let stripe = document.querySelector(".stripe");
  stripeWrappers.forEach((stripeWrap) => {
    let stripe = stripeWrap.querySelector(
      ".stripe_text .elementor-widget-container"
    );
    let stripeHtml = stripe.innerHTML;
    let i = 0;
    while (i < 20) {
      stripe.insertAdjacentHTML("beforeend", stripeHtml);
      i++;
    }
  });

  $(".increase").click(function () {
    increaseValue();
  });

  $(".decrease").click(function () {
    decreaseValue();
  });

  function increaseValue() {
    var $input = $(".number_val");
    var value = parseInt($input.val(), 10);
    value = isNaN(value) ? 0 : value;

    if (value < 14) {
      value++;
      $input.val(value);
    }
  }

  function decreaseValue() {
    var $input = $(".number_val");
    var value = parseInt($input.val(), 10);
    value = isNaN(value) ? 0 : value;

    if (value > 0) {
      value--;
      $input.val(value);
    }
  }

  function initBeforeAfterSlider(container) {
    container.find(".beforeAfter").each(function () {
      // Avoid re-initializing
      if (!$(this).data("initialized")) {
        $(this).beforeAfter({
          movable: true,
          clickMove: true,
          position: 50,
          separatorColor: "#00E1FF",
          bulletColor: "#00E1FF",
        });
        $(this).data("initialized", true);

        $(".image_compare_section").removeClass("overlay");
      }
    });
  }

  $(".tabbutton").click(function (e) {
    $(".image_compare_section").addClass("overlay");
    setTimeout(() => {
      $(".image_compare_section").removeClass("overlay");
    }, 1000);
    e.preventDefault();
    $(this).siblings().removeClass("active");
    $(this).addClass("active");
    let textChanged = $(this).find(".elementor-button-text").text().trim();
    $(".swap_text").find("i").text(textChanged);

    let classes = $(this).attr("id");
    $(".tab_content").hide();
    $(".tab_content." + classes).fadeIn();
    $(".image_compare_section .image_comparison_slider").hide();
    // $(".image_compare_section .image_comparison_slider." + classes).fadeIn();
    let targetSlider = $(
      ".image_compare_section .image_comparison_slider." + classes
    );

    targetSlider.fadeIn(function () {
      initBeforeAfterSlider($(this)); // Initialize only after fadeIn completes
    });
  });
  // ✅ Initialize the first visible slider on page load
  let firstVisibleSlider = $(
    ".image_compare_section .image_comparison_slider.corp_exe"
  );

  initBeforeAfterSlider(firstVisibleSlider);

  // // Daterange field
  // // Global tracker of selected dates
  // let lastSelectedStart = null;
  // let lastSelectedEnd = null;

  // // Initialize all daterange inputs
  // $('input[name="daterange"]').each(function () {
  //   $(this).daterangepicker(
  //     {
  //       minDate: moment().add(7, "days"),
  //       isInvalidDate: function (date) {
  //         return date.day() === 0 || date.day() === 6;
  //       },
  //       autoApply: true,
  //       autoUpdateInput: false,
  //       locale: {
  //         format: "MM/DD/YYYY",
  //       },
  //     },
  //     function (start, end) {
  //       // Set values and save globally
  //       const rangeText =
  //         start.format("MM/DD/YYYY") + " - " + end.format("MM/DD/YYYY");
  //       $('input[name="daterange"]').val(rangeText);

  //       lastSelectedStart = start;
  //       lastSelectedEnd = end;
  //     }
  //   );
  // });

  let lastSelectedStart = null;
  let lastSelectedEnd = null;

  $('input[name="daterange"]').each(function () {
    $(this).daterangepicker(
      {
        minDate: moment().add(7, "days"),
        maxDate: moment().add(3, "months"),
        isInvalidDate(date) {
          return date.day() === 0 || date.day() === 6;
        },
        autoApply: true,
        autoUpdateInput: false,
        locale: {
          format: "MM/DD/YYYY",
          daysOfWeek: ["S", "M", "T", "W", "T", "F", "S"],
          firstDay: 1,
        },
      },
      function (start, end) {
        const diffDays = end.diff(start, "days");

        if (diffDays < 30) {
          alert(
            "Minimum booking period is one month. Please select a longer date range."
          );

          // Open the picker again with updated start/end values (1 month span)
          this.setStartDate(start);
          const newEnd = start.clone().add(1, "months").subtract(1, "days");
          this.setEndDate(newEnd);

          // Optionally update input with adjusted range
          const adjustedText = `${start.format("MM/DD/YYYY")} - ${newEnd.format(
            "MM/DD/YYYY"
          )}`;
          $('input[name="daterange"]').val(adjustedText);

          lastSelectedStart = start;
          lastSelectedEnd = newEnd;
          return;
        }

        // Valid selection
        const rangeText = `${start.format("MM/DD/YYYY")} - ${end.format(
          "MM/DD/YYYY"
        )}`;
        $('input[name="daterange"]').val(rangeText);

        lastSelectedStart = start;
        lastSelectedEnd = end;
      }
    );
  });

  // 🔁 Sync visual calendar selection across all inputs
  $('input[name="daterange"]').on(
    "show.daterangepicker",
    function (ev, picker) {
      // Remove visual highlights
      $(".daterangepicker td.active").removeClass("active start-date end-date");

      // Set dates if already selected
      if (lastSelectedStart && lastSelectedEnd) {
        picker.setStartDate(lastSelectedStart);
        picker.setEndDate(lastSelectedEnd);
        picker.updateView();
        picker.updateCalendars();
      }
    }
  );

  // ✅ Sync values & calendar states
  $('input[name="daterange"]').on(
    "apply.daterangepicker",
    function (ev, picker) {
      if (picker.endDate.isBefore(picker.startDate)) {
        alert("Move-out date cannot be before Move-in date.");
        $('input[name="daterange"]')
          .val("")
          .attr("placeholder", "Move-in - Move-out");
        return;
      }

      const rangeText =
        picker.startDate.format("MM/DD/YYYY") +
        " - " +
        picker.endDate.format("MM/DD/YYYY");

      // Update all input values
      $('input[name="daterange"]').each(function () {
        $(this).val(rangeText);

        // Update each instance's internal state
        const drp = $(this).data("daterangepicker");
        drp.setStartDate(picker.startDate);
        drp.setEndDate(picker.endDate);
      });

      // Save latest range
      lastSelectedStart = picker.startDate;
      lastSelectedEnd = picker.endDate;
    }
  );

  setTimeout(() => {
    if (!$('input[name="daterange"]').val()) {
      $('input[name="daterange"]').attr("placeholder", "move-in/out date");
    }
  }, 100);
});
