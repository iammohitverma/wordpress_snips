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

  // Carousel For All Pages Start
  $("#global_banner").owlCarousel({
    loop: true,
    margin: 24,
    nav: false,
    dots: false,
    items: 1,
    autoplay: true,
    responsive: {
      600: {
        nav: true,
      },
    },
  });

  $(
    ".beyond_da_hub_slider, #beyond_da_hub_slider, #beyond_da_hub_slider_1"
  ).owlCarousel({
    loop: true,
    margin: 24,
    nav: false,
    dots: false,
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
    '<img src="/wp-content/uploads/2024/04/slider_arrow_left_home.png"/>'
  );
  $("#global_banner .owl-next").html(
    '<img src="/wp-content/uploads/2024/04/slider_arrow_right_home.png"/>'
  );
  $(
    ".beyond_da_hub_slider .owl-prev, #beyond_da_hub_slider .owl-prev, #beyond_da_hub_slider_1 .owl-prev"
  ).html('<img src="/wp-content/uploads/2024/04/slider_arrow_left.png"/>');
  $(
    ".beyond_da_hub_slider .owl-next, #beyond_da_hub_slider .owl-next, #beyond_da_hub_slider_1 .owl-next"
  ).html('<img src="/wp-content/uploads/2024/04/slider_arrow_right.png"/>');

  // Carousel For All Pages Start

  // hide show code for video element
  $("[data-target-el]").each(function () {
    $(this)
      .find(".hideElem")
      .append(
        `<img src="http://52.64.249.237/wp-content/uploads/2024/04/play-btn.svg" alt="" class="play_btn">`
      );
  });

  $("[data-target-el='hide-show-toggle']").click(function () {
    if ($(this).find(".videoBox").length == 0) {
      let curElHeight = $(this).height();
      let videoURL = $(this).attr("data-video");
      $(this).find(".hideElem").hide();
      $(this).find(".showElem").show();

      // for video
      $(this)
        .append(`<div class="videoBox showElem"><video controls autoplay muted  style="height:${curElHeight}px">
				<source src="${videoURL}" type="video/mp4">
				Your browser does not support the video tag.
			</video></div>`);
    }
    // $(this).append(`<div class="videoBox showElem"><iframe src="${videoURL}" style="height:${curElHeight}px"></iframe></div>`);
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
  $(".left_tab_list_wrap li").click(function () {
    let dataTab = $(this).data("tab");
    $(".left_tab_list_wrap li").removeClass("active");
    $(this).addClass("active");
    $(".right_tab_text_wrap").hide();
    $("#" + dataTab).fadeIn();
  });

  // Function to format the video duration into HH:MM:SS format
  function formatVideoDuration(durationInSeconds) {
    let hours = Math.floor(durationInSeconds / 3600);  
    let minutes = Math.floor((durationInSeconds % 3600) / 60);
    let seconds = durationInSeconds % 60;

    return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}

// Function to handle setting video duration
function setVideoDuration() {
    let $videoSrc = $(".video_duration_src");
    let $videoDuration = $(".video_duration");

    // Wait for the video metadata to load
    $videoSrc.on('loadedmetadata', function() {
        // Get the duration of the video in seconds
        const duration = Math.floor(this.duration);

        // Format the duration into HH:MM:SS format
        const formattedDuration = formatVideoDuration(duration);

        // Set the formatted duration to all .video_duration elements
        $videoDuration.each(function() {
            $(this).html(formattedDuration);
        });

        // console.log(formattedDuration);
    });
}

// Call the function to set video duration initially
setVideoDuration();

// Rebind the event handler after AJAX call
$(document).ajaxComplete(function() {
    setVideoDuration();
});

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
    let currentForm = event.target.closest("form");
    let allRequiredFields = currentForm.querySelectorAll(".required_field");
    // console.log(allRequiredFields);

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

        // var formData = $("#form_register_service").serializeArray(); 
        // console.log(formData);

        var service_name = $(".service_name").val();
        var contact_person = $(".contact_person").val();
        var email = $(".email").val();
        var phone = $(".phone").val();
        var website_url = $(".website_url").val();
        var primary_address = $(".primary_address").val();
        var sec_address = $(".sec_address").val();
        var state = $(".state").val();
        var postcode = $(".postcode").val();
        var clinic_nature_other = $(".clinic_nature_other").val();
        var health_profession_other = $(".health_profession_other").val();
        var fasd_service = $(".fasd_service").val();
        var service_overview = $(".service_overview").val();
        var billing_structure = $("input[name='billing_structure']:checked").val();
        var acceptance = $("input[name='acceptance']:checked").val();

        var informed_services_rec = [];
        $('.informed_services:checked').each (function (i, e){
            informed_services_rec.push ($(this).val());
        });
        var informed_services = informed_services_rec.join (',');

        var clinic_nature_rec = [];
        $('.hospital_service:checked').each (function (i, e){
            clinic_nature_rec.push ($(this).val());
        });
        var clinic_nature = clinic_nature_rec.join (',');

        var health_profession = [];
        $('.health_profession:checked').each (function (i, e){
            health_profession.push ($(this).val());
        });
        var health_check = health_profession.join (',');

        var referrals_from = [];
        $('.referrals_from:checked').each (function (i, e){
            referrals_from.push ($(this).val());
        });
        var referrals_check = referrals_from.join (',');

        var age_group_rec = [];
        $('.age_group:checked').each (function (i, e){
            age_group_rec.push ($(this).val());
        });
        var age_group = age_group_rec.join (',');

        $.ajax({
            type: 'POST',
            url: "/wp-admin/admin-ajax.php",
            data: {
                action: "service_directory_post_creation",
                service_name: service_name,
                contact_person: contact_person,
                email: email,
                phone: phone,
                website_url: website_url,
                primary_address: primary_address,
                sec_address: sec_address,
                state: state,
                postcode: postcode,
                clinic_nature_other: clinic_nature_other,
                health_profession_other: health_profession_other,
                fasd_service: fasd_service,
                service_overview: service_overview,
                clinic_nature: clinic_nature,
                informed_services: informed_services,
                billing_structure: billing_structure,
                age_group: age_group,
                acceptance: acceptance,
                health_check: health_check,
                referrals_check: referrals_check,
            },
            success: function (data) {
                console.log(data);
            }
        });

    } else {
        event.preventDefault();
    }
}

  // resources filter
  $("#typeOfResource, #topicResource, #sortResource").change(function () {
    var typeOf = $("#typeOfResource").val();
    var topic = $("#topicResource").val();
    var sortValue = $("#sortResource").val();

    var data = {
      action: "filter_resources", // Ajax action name
      typeOf: typeOf,
      topic: topic,
      sortValue: sortValue,
    };

    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      type: "POST",
      data: data,
      dataType: "json", // Expect JSON response
      success: function (response) {
        console.log(response);
        if (response.length > 0) {
          $(".cat_filter_wrap .count").text(response.length);
          $(".resources_posts_row").empty(); // Clear existing posts
          response.forEach((post) => {
            console.log("Post Types:", post.categories.resource_type);
            console.log("Post Topics:", post.categories.resource_topic);

            let resource_types_html = post.categories.resource_type
              .map((category) => {
                // Generate a slug from the category name
                let slug = category.toLowerCase().replace(/\s+/g, "-");
                return `<li><a href="javascript:void(0);" class="category-link" data-category-slug="${slug}">${category}</a></li>`;
              })
              .join("");

            let resource_topics_html = post.categories.resource_topic
              .map((category) => {
                // Generate a slug from the category name
                let slug = category.toLowerCase().replace(/\s+/g, "-");
                return `<li><a href="javascript:void(0);" class="category-link" data-category-slug="${slug}">${category}</a></li>`;
              })
              .join("");

            $(".resources_posts_row").append(`
                      <div class="col col-12 col-md-6 col-lg-4 col-lg-4">
                          <div class="post_card">
                              <div class="img_wrap">
                                  <img src="${post.thumbnail_url}" alt="post_thumbnail" class="post_thumb">
                                  <a href="${post.permalink}" class="link_arrow">
                                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                      </svg>
                                  </a>
                              </div>
                              <div class="details">
                                  <ul class="tags">
                                      ${resource_types_html}
                                      ${resource_topics_html}
                                  </ul>
                                  <h4 class="post_heading"><a href="${post.permalink}">${post.title}</a></h4>
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
  });

  // videos-hub filter
  function filterVideos() {
    var videoTab = $(".video_hub_tab.active").data("tab");
    var sortValue = $("#sortVideoHub").val(); // Get the value of sort selection
    
    var data = {
        action: "filter_videos_hub", // Ajax action name
        videoTab: videoTab,
        sortValue: sortValue
    };

    $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: "POST",
        data: data,
        dataType: "json", // Expect JSON response
        success: function (response) {
            console.log(response);
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
                                            <img src="${post.thumbnail_url}" alt="img" class="feat_img" />
                                            <a class="link_arrow" href="${post.permalink}">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </figure>
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li>
                                            <a href="JavaScript:void(0)">${post.published_date}</a>
                                        </li>
                                        <li>
                                            <video src="http://52.64.249.237/wp-content/uploads/2024/04/test.mp4" class="video_duration_src" style="display:none;"></video>
                                            <a class="video_duration" href="JavaScript:void(0)"></a>
                                        </li>
                                        <li>
                                            ${post.tags.map(tag => `<a href="${tag.link}">${tag.name}</a>`).join(' ')}
                                        </li>
                                    </ul>
                                    <h4 class="post_heading"><a href="${post.permalink}">${post.title}</a></h4>
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

$("#sortVideoHub").change(function(){
    filterVideos(); // Call the filterVideos function on change
});
});
