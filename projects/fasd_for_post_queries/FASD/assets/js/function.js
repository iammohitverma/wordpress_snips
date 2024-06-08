jQuery(document).ready(function () {
  // toggle_menu for mobile
  jQuery(".fasd_header .toggle_menu").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(".fasd_header .navigationWrap").slideToggle();
  });
  // submenu toggle for mobile
  jQuery(".fasd_header .subMenuAngle").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(this).closest(".a-Wrap").next().slideToggle();
  });
  // search toggle for mobile
  jQuery(".fasd_header .search_toggle_mobile button").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(".fasd_header .search_wrap").slideToggle();
  });
  // for enable focus add tabindex first
  $(".fasd_header .main_header li").each(function () {
    $(this).attr("tabindex", "-1");
  });
  $(".fasd_header .main_header li").each(function () {
    $(this).find("a").attr("tabindex", "0");
  });

  // Carousel For All Pages Start
  $("#global_banner").owlCarousel({
    autoHeight: false,
    loop: true,
    margin: 0,
    autoplayHoverPause: true,
    nav: false,
    dots: false,
    items: 1,
    stopOnHover: true,
    autoplay: 5000,
    smartSpeed: 2000,
    responsive: {
      600: {
        nav: true,
      },
    },
  });

  // slider for brain page
  $(".brain_slide").owlCarousel({
    autoHeight: true,
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    items: 1,
    autoplay: true,
    smartSpeed: 1500,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    autoplayTimeout: 2000,
    mouseDrag: false,
    touchDrag: false,
  });

  jQuery(document.documentElement).keyup(function (event) {
    // Select all elements with the class .owl-carousel
    jQuery(".owl-carousel").each(function () {
      var owl = jQuery(this);
      owl.owlCarousel();

      // handle cursor keys
      if (event.keyCode == 37) {
        // go left
        owl.trigger("prev.owl.carousel", [300]);
      } else if (event.keyCode == 39) {
        // go right
        owl.trigger("next.owl.carousel");
      }
    });
  });

  $(
    ".beyond_da_hub_slider, #beyond_da_hub_slider, #beyond_da_hub_slider_1"
  ).owlCarousel({
    autoHeight: true,
    loop: true,
    margin: 24,
    nav: false,
    dots: false,
    smartSpeed: 2500,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        nav: true,
        items: 2,
      },
      1000: {
        nav: true,
        items: 2,
      },
    },
  });

  // changed all carousels icons (please change css path when go live)
  $("#global_banner .owl-prev").html(
    '<img src="/wp-content/uploads/2024/04/slider_arrow_left_home.png"/ alt="" width="25px" height="25px">'
  );
  $("#global_banner .owl-next").html(
    '<img src="/wp-content/uploads/2024/04/slider_arrow_right_home.png"/ alt="" width="25px" height="25px">'
  );
  $(
    ".beyond_da_hub_slider .owl-prev, #beyond_da_hub_slider .owl-prev, #beyond_da_hub_slider_1 .owl-prev"
  ).html(
    '<img src="/wp-content/uploads/2024/04/slider_arrow_left.png"/ alt="" width="25px" height="25px">'
  );
  $(
    ".beyond_da_hub_slider .owl-next, #beyond_da_hub_slider .owl-next, #beyond_da_hub_slider_1 .owl-next"
  ).html(
    '<img src="/wp-content/uploads/2024/04/slider_arrow_right.png"/ alt="" width="25px" height="25px">'
  );

  // Carousel For All Pages Start

  // hide show code for video element
  function setVideo() {
    $("[data-target-el]").each(function () {
      $(this)
        .find(".hideElem")
        .append(
          `<img src="http://52.64.249.237/wp-content/uploads/2024/04/play-btn.svg" class="play_btn" alt="play_btn">`
        );
    });

    // if use vimeo video
    $(".videoAayegi").each(function () {
      let vidUrl = $(this).attr("data-video");
      // console.log(vidUrl.includes("vimeo"));
      if (vidUrl && vidUrl.includes("vimeo")) {
        let elem = $(this);
        elem.find(".hideElem").hide();
        // console.log(elem.attr('class'));
        elem.append(
          `<div class="videoBox showElem"><iframe src="${vidUrl}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>`
        );
      }
    });

    $("[data-target-el='hide-show-toggle']").click(function () {
      if ($(this).find(".videoBox").length == 0) {
        let curElHeight = $(this).height();
        let videoURL = $(this).attr("data-video");
        let videoType = $(this).attr("data-video-type");
        $(this).find(".hideElem").hide();
        $(this).find(".showElem").show();

        // for video
        if (videoType == "video_Tag") {
          $(this)
            .append(`<div class="videoBox showElem"><video controls autoplay muted  style="height:${curElHeight}px">
          <source src="${videoURL}" type="video/mp4">
          Your browser does not support the video tag.
        </video></div>`);
        } else {
          $(this).append(
            `<div class="videoBox showElem"><iframe src="${videoURL}" style="height:${curElHeight}px"></iframe></div>`
          );
        }
      }
    });
  }

  setVideo();

  $(document).ajaxComplete(function () {
    setVideo();
  });

  // tab_slider start
  var scrollAmount = jQuery(".tab_slider .items button").width(); // Scroll amount in pixels
  $(".tab_slider .prev").on("click", function () {
    var currentScrollLeft = $(".tab_slider .items").scrollLeft();
    $(".tab_slider .items").animate(
      { scrollLeft: currentScrollLeft - scrollAmount },
      400
    );
  });
  $(".tab_slider .next").on("click", function () {
    var currentScrollLeft = $(".tab_slider .items").scrollLeft();
    $(".tab_slider .items").animate(
      { scrollLeft: currentScrollLeft + scrollAmount },
      400
    );
  });
  // tab_slider end

  // tab functionality start
  $(".tabbing_enabled .items button").on("click", function () {
    var index = $(this).index();
    $(".tabbing_enabled .items button").removeClass("active");
    $(this).addClass("active");
    $(".tab_content .content_wrap").removeClass("active");
    $(".tab_content .content_wrap").eq(index).addClass("active");
  });
  // tab functionality end

  // Governance page script
  // $(".left_tab_list_wrap li").click(function () {
  //   let dataTab = $(this).data("tab");
  //   $(".left_tab_list_wrap li").removeClass("active");
  //   $(this).addClass("active");
  //   $(".right_tab_text_wrap").hide();
  //   $("#" + dataTab).fadeIn();
  // });
  $(".left_tab_list_wrap li").click(function () {
    $(this).siblings("li").removeClass("active");
    $(this).addClass("active");
  });

  // Function to format the video duration into HH:MM:SS format
  function formatVideoDuration(durationInSeconds) {
    let hours = Math.floor(durationInSeconds / 3600);
    let minutes = Math.floor((durationInSeconds % 3600) / 60);
    let seconds = durationInSeconds % 60;

    return `${String(minutes).padStart(
      2,
      "0"
    )}:${String(seconds).padStart(2, "0")} min`;
  }

  // video duration js start
  // Function to format the video duration into HH:MM:SS format
  function formatVideoDuration(durationInSeconds) {
    let hours = Math.floor(durationInSeconds / 3600);
    let minutes = Math.floor((durationInSeconds % 3600) / 60);
    let seconds = durationInSeconds % 60;

    return `${String(minutes).padStart(
      2,
      "0"
    )}:${String(seconds).padStart(2, "0")} min`;
  }

  // Function to handle setting video duration
  function setVideoDuration() {
    let $videoSrc = $(".video_duration_src");

    // Wait for the video metadata to load
    $videoSrc.each(function () {
      let $this = $(this);
      $this.on("loadedmetadata", function () {
        // Get the duration of the video in seconds
        const duration = Math.floor(this.duration);

        // Format the duration into HH:MM:SS format
        const formattedDuration = formatVideoDuration(duration);

        // Find the corresponding .video_duration element and set the formatted duration
        $this.siblings(".video_duration").html(formattedDuration);
      });

      // Trigger the loadedmetadata event if the metadata is already loaded
      if ($this[0].readyState >= 1) {
        $this.trigger("loadedmetadata");
      }
    });
  }

  // Call the function to set video duration initially
  setVideoDuration();

  // Rebind the event handler after AJAX call
  $(document).ajaxComplete(function () {
    setVideoDuration();
  });
  // video duration js ends
  // register directory all options script start by mohit
  $(".allOption").each(function (e) {
    $(this).change(function () {
      if ($(this).is(":checked")) {
        $(this)
          .closest(".check-radio-wrap")
          .find("[type='checkbox']")
          .prop("checked", true);
      } else {
        $(this)
          .closest(".check-radio-wrap")
          .find("[type='checkbox']")
          .prop("checked", false);
      }
    });
  });
  // register directory all options script end by mohit

  // set required class to its other input text field when user select other option script start by mohit
  $("#Other_clinic").change(function () {
    if ($(this).is(":checked")) {
      $(".Other_clinic_input").addClass("required_field");
    } else {
      $(".Other_clinic_input").removeClass("required_field");
    }
  });
  // set required class to its other input text field when user select other option script end by mohit

  // Form validation for register service directory
  let service_form = document.querySelector("#form_register_service");
  service_form?.addEventListener("submit", service_dir_validationFun);

  // SetError msg function
  function setError(event, element, errMsg) {
    let errorWrap = document.createElement("SPAN");
    errorWrap.classList.add("errorBox");
    element.parentElement.appendChild(errorWrap);
    errorWrap.innerText = errMsg;
    event.preventDefault();
  }

  // Validation Function
  function service_dir_validationFun(event) {
    event.preventDefault();
    let currentForm = event.target.closest("form");
    let allRequiredFields = currentForm.querySelectorAll(".required_field");

    // first remove old errorBox from current Form
    let allErrorBox = currentForm.querySelectorAll(".errorBox");
    allErrorBox.forEach((element) => {
      element.remove();
    });

    allRequiredFields.forEach((element) => {
      let currInputVal = element.value;
      let currInputClass = element.getAttribute("class");
      if (currInputVal === "") {
        setError(event, element, "This field is required");
      } else if (currInputClass.includes("email")) {
        if (
          currInputVal.indexOf("@") <= 0 ||
          (currInputVal.charAt(currInputVal.length - 4) != "." &&
            currInputVal.charAt(currInputVal.length - 3) != ".")
        ) {
          setError(event, element, "Please enter a valid email address");
        }
      } else if (currInputClass.includes("check-radio-wrap")) {
        let getAllCheckedInput = element.querySelectorAll("input:checked");
        if (getAllCheckedInput.length === 0) {
          setError(event, element.children[0], "Please select an option");
          element.classList.add("errorCheckRadio");
        } else {
          element.classList.remove("errorCheckRadio");
        }
      }
    });
    let errorPresent = currentForm.querySelector(".errorBox");
    if (!errorPresent) {
      $(".service_submit").prop("disabled", true);
      $(".service_loader").show();
      $(this).submit();
    } else {
      event.preventDefault();
      $(errorPresent).closest(".field")[0].scrollIntoView();
    }
  }

  // resources filter
  // $("#typeOfResource, #topicResource, #sortResource").change(function () {
  // var typeOf = $("#typeOfResource").val();
  // var topic = $("#topicResource").val();
  // var sortValue = $("#sortResource").val();

  // var data = {
  // action: "filter_resources", // Ajax action name
  // //typeOf: typeOf,
  // //topic: topic,
  // sortValue: sortValue,
  // };

  // $.ajax({
  // url: "/wp-admin/admin-ajax.php",
  // type: "POST",
  // data: data,
  // dataType: "json", // Expect JSON response
  // success: function (response) {
  // if (response.length > 0) {
  // $(".cat_filter_wrap .count").text(response.length);
  // $(".resources_posts_row").empty(); // Clear existing posts
  // response.forEach((post) => {

  // let resource_types_html = post.categories.resource_type
  // .map((category) => {
  // // Generate a slug from the category name
  // let slug = category.toLowerCase().replace(/\s+/g, "-");
  // return `<li><a href="javascript:void(0);" class="category-link" data-category-slug="${slug}">${category}</a></li>`;
  // })
  // .join("");

  // let resource_topics_html = post.categories.resource_topic
  // .map((category) => {
  // //Generate a slug from the category name
  // let slug = category.toLowerCase().replace(/\s+/g, "-");
  // return `<li><a href="javascript:void(0);" class="category-link" data-category-slug="${slug}">${category}</a></li>`;
  // })
  // .join("");

  // $(".resources_posts_row").append(`
  // <div class="col col-12 col-md-6 col-lg-4 col-lg-4">
  // <div class="post_card">
  // <div class="img_wrap">
  // <img src="${post.thumbnail_url}" alt="${post.title}" class="post_thumb">
  // <a href="${post.permalink}" class="link_arrow">
  // <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
  // <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
  // </svg>
  // </a>
  // </div>
  // <div class="details">
  // <ul class="tags">
  // ${resource_types_html}
  // ${resource_topics_html}
  // </ul>
  // <h4 class="post_heading"><a href="${post.permalink}">${post.title}</a></h4>
  // <p>${post.excerpt}</p>
  // </div>
  // </div>
  // </div>
  // `);
  // });
  // } else {
  // $(".resources_posts_row").html(
  // "<span class='no_data_found alert alert-danger text-center' role='alert'>No posts found</span>"
  // );
  // $(".cat_filter_wrap .count").text(0); // Update count to 0 when no posts found
  // }
  // },
  // error: function (xhr, status, error) {
  // console.error(xhr);
  // },
  // });
  // });

  // videos-hub filter
  function filterVideos() {
    var videoTab = $(".video_hub_tab.active").data("tab");
    var sortValue = $("#sortVideoHub").val(); // Get the value of sort selection

    var data = {
      action: "filter_videos_hub", // Ajax action name
      videoTab: videoTab,
      sortValue: sortValue,
    };

    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      type: "POST",
      data: data,
      dataType: "json", // Expect JSON response
      success: function (response) {
        if (response.length > 0) {
          $(".cat_filter_wrap .count").text(response.length);
          $(".vidoes_filterd_row").empty(); // Clear existing posts
          response.forEach((post) => {
            $(".vidoes_filterd_row").append(`
                        <div class="col col-12 col-md-6 col-lg-4 col-lg-4">
                            <div class="post_card box">
                                <div class="img_wrap">
                                    <figure class="videoAayegi" data-target-el="hide-show-toggle" data-video="http://52.64.249.237/wp-content/uploads/2024/04/test.mp4">
                                        <div class="hideElem">
                                            <img src="${post.thumbnail_url
              }" alt="${post.alt
              }" class="feat_img" title="${post.thumbanail_title}"/>
                                            <a class="link_arrow" href="${post.permalink
              }" tabindex="-1" aria-hidden="true">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </figure>
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li tabindex="-1" aria-hidden="true">
                                            <a href="JavaScript:void(0)">${post.published_date
              }</a>
                                        </li>
                                        <li tabindex="-1" aria-hidden="true">
                                            <video src="http://52.64.249.237/wp-content/uploads/2024/04/test.mp4" class="video_duration_src" style="display:none;"></video>
                                            <a class="video_duration" href="JavaScript:void(0)"></a>
                                        </li>
                                        <li tabindex="-1" aria-hidden="true">
                                            ${post.tags
                .map(
                  (tag) =>
                    `<a href="${tag.link}">${tag.name}</a>`
                )
                .join(" ")}
                                        </li>
                                    </ul>
                                    <h4 class="post_heading"><a href="${post.permalink
              }">${post.title}</a></h4>
                                    <p>${post.excerpt}</p>
                                </div>
                            </div>
                        </div>
                    `);
          });
        } else {
          $(".resources_posts_row").html(
            "<span class='no_data_found alert alert-danger text-center' role='alert'>No posts found</span>"
          );
          $(".cat_filter_wrap .count").text(0); // Update count to 0 when no posts found
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr);
      },
    });
  }

  $(".video_hub_tab").click(function () {
    filterVideos(); // Call the filterVideos function on click
  });

  $("#sortVideoHub").change(function () {
    filterVideos(); // Call the filterVideos function on change
  });

  // set for attribute for icegram plugin's input fields
  jQuery("#stay_connected_form .gjs-cell").each(function (index) {
    let inputId = jQuery(this).find("input").attr("id");
    jQuery(this).find("label").attr("for", inputId);
  });
  // set role ="presentation" attribute to "button"
  jQuery(".owl-prev").each(function (index) {
    jQuery(this).attr("aria-label", "Previous Slide");
    jQuery(this).attr("role", "button");
  });
  jQuery(".owl-next").each(function (index) {
    jQuery(this).attr("aria-label", "Next Slide");
    jQuery(this).attr("role", "button");
  });

  // set tabindex attribute for anchor tag with #
  jQuery("a").each(function () {
    if (
      this.getAttribute("href") === "#" ||
      this.href === window.location.href
    ) {
      jQuery(this).attr("tabindex", "-1");
    }
  });
  jQuery("html").removeClass("overflow-hidden");
  jQuery(".preloader").hide();
  jQuery(".init_min_height").removeClass("init_min_height");

  // service directory filters select 2 start
  // state filter start
  $('.search_directory [name="state"]').chosen();
  $('.search_directory [name="state"]').change(function () {
    let stateValues = $(this).val();

    setTimeout(() => {
      let allChoices = $(this)
        .next(".chosen-container-multi")
        .find(".search-choice");
      $(".stateContainer ul").html("");
      $(allChoices).clone().appendTo(".stateContainer ul");

      if (stateValues.length > 0) {
        $("#stateAccordion .accordion-button").removeAttr("disabled");
        $("#stateAccordion .accordion-button").removeClass("collapsed");
        $("#stateAccordion .accordion-collapse").addClass("show");
      } else {
        $("#stateAccordion .accordion-button").attr("disabled", "disabled");
        $("#stateAccordion .accordion-button").addClass("collapsed");
        $("#stateAccordion .accordion-collapse").removeClass("show");
      }
    }, 100);
  });

  $(document).click(function (event) {
    let target = $(event.target);
    if (target.closest(".stateContainer").length) {
      let optionText = target.closest(".search-choice").find("span").html();

      // Find the option element by its text
      let optionToUnselect = $("select[name='state'] option").filter(
        function () {
          return $(this).text() === optionText;
        }
      );

      // Unselect the option
      optionToUnselect.prop("selected", false);

      // Trigger change event to reflect the deselection
      $("select[name='state']").trigger("change");
      $('[name="state"]').trigger("chosen:updated");
    }
  });
  // state filter end

  // services filter start
  $('.search_directory [name="services"]').chosen();
  $('.search_directory [name="services"]').change(function () {
    let servicesValues = $(this).val();

    setTimeout(() => {
      let allChoices = $(this)
        .next(".chosen-container-multi")
        .find(".search-choice");
      $(".servicesContainer ul").html("");
      $(allChoices).clone().appendTo(".servicesContainer ul");

      if (servicesValues.length > 0) {
        $("#servicesAccordion .accordion-button").removeAttr("disabled");
        $("#servicesAccordion .accordion-button").removeClass("collapsed");
        $("#servicesAccordion .accordion-collapse").addClass("show");
      } else {
        $("#servicesAccordion .accordion-button").attr("disabled", "disabled");
        $("#servicesAccordion .accordion-button").addClass("collapsed");
        $("#servicesAccordion .accordion-collapse").removeClass("show");
      }
    }, 100);
  });

  $(document).click(function (event) {
    let target = $(event.target);
    if (target.closest(".servicesContainer").length) {
      let optionText = target.closest(".search-choice").find("span").html();

      // Find the option element by its text
      let optionToUnselect = $("select[name='services'] option").filter(
        function () {
          return $(this).text() === optionText;
        }
      );

      // Unselect the option
      optionToUnselect.prop("selected", false);

      // Trigger change event to reflect the deselection
      $("select[name='services']").trigger("change");
      $('[name="services"]').trigger("chosen:updated");
    }
  });
  // services filter end

  // age start
  $('.search_directory [name="age"]').chosen();
  $('.search_directory [name="age"]').change(function () {
    let ageValues = $(this).val();

    setTimeout(() => {
      let allChoices = $(this)
        .next(".chosen-container-multi")
        .find(".search-choice");
      $(".ageContainer ul").html("");
      $(allChoices).clone().appendTo(".ageContainer ul");

      if (ageValues.length > 0) {
        $("#ageAccordion .accordion-button").removeAttr("disabled");
        $("#ageAccordion .accordion-button").removeClass("collapsed");
        $("#ageAccordion .accordion-collapse").addClass("show");
      } else {
        $("#ageAccordion .accordion-button").attr("disabled", "disabled");
        $("#ageAccordion .accordion-button").addClass("collapsed");
        $("#ageAccordion .accordion-collapse").removeClass("show");
      }
    }, 100);
  });

  $(document).click(function (event) {
    let target = $(event.target);
    if (target.closest(".ageContainer").length) {
      let optionText = target.closest(".search-choice").find("span").html();

      // Find the option element by its text
      let optionToUnselect = $("select[name='age'] option").filter(function () {
        return $(this).text() === optionText;
      });

      // Unselect the option
      optionToUnselect.prop("selected", false);

      // Trigger change event to reflect the deselection
      $("select[name='age']").trigger("change");
      $('[name="age"]').trigger("chosen:updated");
    }
  });
  // age end

  // billing start
  $('.search_directory [name="billing_method"]').chosen();
  $('.search_directory [name="billing_method"]').change(function () {
    let billing_methodValues = $(this).val();

    setTimeout(() => {
      let allChoices = $(this)
        .next(".chosen-container-multi")
        .find(".search-choice");
      $(".billing_methodContainer ul").html("");
      $(allChoices).clone().appendTo(".billing_methodContainer ul");

      if (billing_methodValues.length > 0) {
        $("#billingAccordion .accordion-button").removeAttr("disabled");
        $("#billingAccordion .accordion-button").removeClass("collapsed");
        $("#billingAccordion .accordion-collapse").addClass("show");
      } else {
        $("#billingAccordion .accordion-button").attr("disabled", "disabled");
        $("#billingAccordion .accordion-button").addClass("collapsed");
        $("#billingAccordion .accordion-collapse").removeClass("show");
      }
    }, 100);
  });

  $(document).click(function (event) {
    let target = $(event.target);
    if (target.closest(".billing_methodContainer").length) {
      let optionText = target.closest(".search-choice").find("span").html();

      // Find the option element by its text
      let optionToUnselect = $("select[name='billing_method'] option").filter(
        function () {
          return $(this).text() === optionText;
        }
      );

      // Unselect the option
      optionToUnselect.prop("selected", false);

      // Trigger change event to reflect the deselection
      $("select[name='billing_method']").trigger("change");
      $('[name="billing_method"]').trigger("chosen:updated");
    }
  });
  // billing end

  $(".selectedPlaceholder").each(function () {
    $(this)
      .closest(".input_wrap")
      .find(".chosen-container-multi")
      .prepend($(this));
  });
  // service directory filters select 2 end

  // print btn functionality start
  var Print_services = "";
  var Print_age = "";
  var Print_billM = "";
  var Print_state = "";
  $('[name="services"]').change(function () {
    Print_services = $(this).val();
  });
  $('[name="age"]').change(function () {
    Print_age = $(this).val();
  });
  $('[name="billing_method"]').change(function () {
    Print_billM = $(this).val();
  });
  $('[name="state"]').change(function () {
    Print_state = $(this).val();
  });

  $(".service_directory_results .print_btn").click(function (e) {
    e.preventDefault();
    // $.ajax({
    // type: 'POST',
    // url: "service-directory-post-print",
    // data: {
    // state: Print_state,
    // service: Print_services,
    // age: Print_age,
    // billing: Print_billM
    // },
    // success: function(response) {
    // // window.location.href = "service-directory-post-print";
    // },
    // });

    var form = $("<form>").attr({
      method: "POST",
      action: "service-directory-post-print",
    });

    // Create input fields and set their values
    var stateInput = $("<input>").attr({
      type: "hidden",
      name: "state",
      value: Print_state,
    });
    var serviceInput = $("<input>").attr({
      type: "hidden",
      name: "service",
      value: Print_services,
    });
    var ageInput = $("<input>").attr({
      type: "hidden",
      name: "age",
      value: Print_age,
    });
    var billingInput = $("<input>").attr({
      type: "hidden",
      name: "billing",
      value: Print_billM,
    });

    // Append input fields to the form
    form.append(stateInput, serviceInput, ageInput, billingInput);

    // Append form to the body and submit it
    $("body").append(form);
    form.submit();
  });

  //trigger the print btn
  setTimeout(function () {
    $(".service_directory_results .print_btn_here").click();
  }, 2000);

  // print button functionality
  $(document).on(
    "click",
    ".service_directory_results .print_btn_here",
    function (e) {
      e.preventDefault();

      // print callback function
      printFunction();

      function printFunction() {
        $(".results_wrapper .listings_wrapper").print({
          globalStyles: true, //Whether or not the styles from the parent document should be included
          stylesheet: null, //URL of an external stylesheet to be included
          noPrintSelector: ".no-print", //A selector for the items that are to be excluded from printing
          append: null, //Adds custom HTML before (prepend) or after (append) the selected content
          prepend:
            "<img class='my-4' src='/wp-content/uploads/2024/04/logo.svg'>", //Adds custom HTML before (prepend) or after (append) the selected content
          timeout: 1000, //To change the amount of max time to wait for the content, etc to load before printing the element from the new window/iframe created,
          title: null, //To change the printed title
          printable: "invoice-print-div",
          type: "html",
          style: [
            "@page { size: A4; margin-top: 0.94mm; margin-bottom: 2.1mm;} body {margin: 0;} h4 {margin:0}",
          ],
          targetStyles: ["*"],
        });
      }
    }
  );
  // print btn functionality end

  // print btn functionality start for publications page

  $(".publications_filter_wrap  .printBtn").click(function (e) {
    var publicationTypes = [];
    $('#publication-types input[type="checkbox"]:checked').each(function () {
      publicationTypes.push($(this).val());
    });
    var publicationTopics = [];
    $('#publication-topics input[type="checkbox"]:checked').each(function () {
      publicationTopics.push($(this).val());
    });
    e.preventDefault();
    var form = $("<form>").attr({
      method: "POST",
      action: "/research-and-publications/publications_post_print/",
    });

    // Create input fields and set their values
    var publicationTypes = $("<input>").attr({
      type: "hidden",
      name: "publicationtypes",
      value: publicationTypes,
    });
    var publicationTopics = $("<input>").attr({
      type: "hidden",
      name: "publicationtopics",
      value: publicationTopics,
    });

    // Append input fields to the form
    form.append(publicationTypes, publicationTopics);

    // Append form to the body and submit it
    $("body").append(form);
    form.submit();
  });

  //trigger the print btn
  setTimeout(function () {
    $(".publications_filter_wrap  .print_btn_here").click();
  }, 2000);

  // print button functionality
  $(document).on(
    "click",
    ".publications_filter_wrap  .print_btn_here",
    function (e) {
      e.preventDefault();

      // print callback function
      printFunction();

      function printFunction() {
        $(".publications_filter_wrap .results_wrapper ").print({
          globalStyles: true, //Whether or not the styles from the parent document should be included
          stylesheet: null, //URL of an external stylesheet to be included
          noPrintSelector: ".no-print", //A selector for the items that are to be excluded from printing
          append: null, //Adds custom HTML before (prepend) or after (append) the selected content
          prepend:
            "<img class='my-4' src='/wp-content/uploads/2024/04/logo.svg'>", //Adds custom HTML before (prepend) or after (append) the selected content
          timeout: 1000, //To change the amount of max time to wait for the content, etc to load before printing the element from the new window/iframe created,
          title: null, //To change the printed title
          printable: "invoice-print-div",
          type: "html",
          style: [
            "@page { size: A4; margin-top: 0.94mm; margin-bottom: 2.1mm;} body {margin: 0;} h4 {margin:0}",
          ],
          targetStyles: ["*"],
        });
      }
    }
  );
  // print btn functionality end for publications page

  $(".featured_image").change(function (e) {
    let fileVal = e.target.files[0].name;
    $(".featured_img_wrap span").html(fileVal);
  });

  /* Service Directory Message Show */
  var currentPageID = $("body").data("pageid");
  if (currentPageID == "1225") {
    var searchParams = new URLSearchParams(window.location.search);
    if (searchParams.has("statuscode")) {
      $(".submit")[0].scrollIntoView();
    }
  }
  /* Service Directory Message Show Ends */
});

// for youtube iframe start
function onYouTubeIframeAPIReady() {
  let allIframes = document.querySelectorAll(".video_iframe_duration_src");

  allIframes.forEach((iframe) => {
    let iframeSrc = iframe.getAttribute("src");
    if (iframeSrc.includes("youtube")) {
      const videoId = iframeSrc.match(/embed\/([^?]+)/)[1];
      let iframeNew = `<div id="yt_${videoId}" style="display: none;"></div>`;
      iframe.closest("div").insertAdjacentHTML("afterbegin", iframeNew);

      iframe.remove();

      var player;
      if (videoId) {
        player = new YT.Player(`yt_${videoId}`, {
          height: "",
          width: "",
          videoId: videoId,
          playerVars: {
            playsinline: 1,
          },
          events: {
            onReady: onPlayerReady,
          },
        });
      }
    }
  });
}

function onPlayerReady(event) {
  const player = event.target;
  let duration = player.getDuration();
  let minutes = Math.floor(duration / 60);
  let seconds = Math.floor(duration % 60);
  let currDurationField = event.target.g
    .closest(".post_card ")
    .querySelector(".video_duration");
  currDurationField.textContent = `${minutes}:${seconds} min`;
}

// Ensure the API is loaded before initializing players
if (window.YT && YT.Player) {
  onYouTubeIframeAPIReady();
}
// for youtube iframe end

// Rebind the event handler after AJAX call
$(document).ajaxComplete(function () {
  onYouTubeIframeAPIReady();
});
