jQuery(function ($) {
  console.log(
    "%cWebsite Built by Techmind Softwares",
    "background: #0a383f; color: #ffffff; display: block;padding:5px 15px;border-radius:7px"
  );

  $(".toggle_btn").click(function () {
    $(this).toggleClass("active");
    $(".header_content").slideToggle();
    $(".header_content").toggleClass("active");
    $(".header-list").addClass("toggle");
  });

  $(".bottom_header .menu .menu-item .subMenuAngle").click(function () {
    $(".bottom_header .sub-menu").slideToggle();
  });

  // $(".menu li .subMenuAngle").click(function(){
  //     $(this).toggleClass("active");
  //     $(this).parent('li').find('.sub-menu').slideToggle();
  // });

  // for video section on homepage banner:-
  $(".banner_section_with_video .video_play_btn").click(function () {
    $(this).toggleClass("active");
    $(".homepage_video").toggleClass("play_video");
    document
      .querySelector(".banner_section_with_video .homepage_video")
      .pause();
    document
      .querySelector(".banner_section_with_video .homepage_video.play_video")
      .play();
  });

  // for video section on homepage banner:-
  $(".banner_section_with_video .scroll_down").click(function () {
    let scroll_view = document.querySelector(".innovative_section");
    scroll_view.scrollIntoView();
  });

  // for video popup section on homepage:-
  $("#play_icon").click(function () {
    $(".blood_test_section .image_wrap").addClass("active");
    let video_source = $(".blood_test_section .image_wrap #play_video").attr(
      "src"
    );
    $(".blood_test_section .video_pop_up_sec video").attr("src", video_source);
    $(".blood_test_section .video_pop_up_sec").addClass("active");
  });
  $("#hide_btn").click(function () {
    $(".blood_test_section .video_pop_up_sec").removeClass("active");
  });

  $(".team-section .play_btn").click(function () {
    $(".team-section .card").addClass("active");

    // Get the video and iframe sources
    let video_source = $(this).closest(".card").find("#play_video").attr("src");
    let iframe_source = $(this)
      .closest(".card")
      .find("#play_iframe")
      .attr("src");

    console.log(video_source);
    console.log(iframe_source);

    // Clear any existing content in the pop-up wrapper before appending new content
    $(".video_pop_up_sec_wrap").html("");

    // Append iframe if available and not undefined
    if (iframe_source && iframe_source != "") {
      $(".video_pop_up_sec_wrap").append(`
                <iframe src="${iframe_source}/?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <div class="close_btn" id="hide_btn"><img src="/wp-content/uploads/2024/09/cross_btn.png" alt="image"></div>
            `);
    }
    // Append video if available and not undefined
    else if (video_source && video_source != "") {
      $(".video_pop_up_sec_wrap").append(`
                <video src="${video_source}" id="play_video" autoplay muted></video>
                <div class="close_btn" id="hide_btn"><img src="/wp-content/uploads/2024/09/cross_btn.png" alt="image"></div>
            `);
    }

    // Show the video pop-up section
    $(".team-section .video_pop_up_sec").addClass("active");
  });
  $(document).on("click", "#hide_btn", function () {
    // Hide the popup
    $(".team-section .video_pop_up_sec").removeClass("active");

    // Reset video and iframe sources inside the wrapper to clear the content properly
    $(".team-section .video_pop_up_sec_wrap").html("");
    $(".team-section .video_pop_up_sec_wrap").html("");
  });

  // for video section on teams:-
  $(".video-section .play_icon").click(function () {
    $(".video-section .video-wrapping").addClass("active");
    document.getElementById("play_video").play();
  });

  // for search:-
  $(".header_content_wrap .search img").click(function () {
    $(".header_content_wrap .search").toggleClass("active");
  });

  // slider for banner sec
  $(".banner_sec_with_slider").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: true,
    smartSpeed: 2500,
    items: 1,
  });

  // slider for our partners
  $(".our_partners_slider").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    smartSpeed: 2500,
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      576: {
        items: 1,
      },
      767: {
        items: 2,
      },
      991: {
        items: 3,
      },
    },
    navText: [
      "<img src='/wp-content/uploads/2024/08/right_icon.svg' alt='icon'>",
      "<img src='/wp-content/uploads/2024/08/left_icon.svg' alt='icon'>",
    ],
  });

  // teams popup:-
  $(".team-section.bg-blue .card").on("click", function () {
    let image = $(this).find(".card-figure img").attr("src");
    $(".advisory_board_popup .img_wrap img").attr("src", image);

    let title = $(this).find(".card-body .team-card-hdng").html();
    $(".advisory_board_popup .text_wrap .title").html(title);

    let excerpt = $(this).find(".card-body .team-card-desc").html();
    $(".advisory_board_popup .text_wrap .sub_title").html(excerpt);

    let content = $(this).find(".card-body .team-card-content").html();
    $(".advisory_board_popup .text_wrap p").html(content);

    $(".advisory_board_popup").addClass("active");
  });

  $(".advisory_board_popup .cross").on("click", function () {
    $(".advisory_board_popup").removeClass("active");
  });

  $(".advisory_board_popup").on("click", function (e) {
    if ($(e.target).is(".advisory_board_popup")) {
      $(this).removeClass("active");
    }
  });
  $(document).on("keydown", function (e) {
    if (e.keyCode == 27) $(".advisory_board_popup").removeClass("active");
  });

  // on news page sort filter:-
  $("#announcement_date").on("change", function () {
    $(".loader_wrap").addClass("active");
    let announcement_value = $(this).val();
    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "filter_by_date",
        sendValue: announcement_value,
      },
      success: function (response) {
        if (response) {
          setTimeout(function () {
            $(".loader_wrap").removeClass("active");
            $(".announcements_sec .sec_content .filtered_content").replaceWith(
              response
            );
          }, 500);
        }
      },
    });
  });

  // // on announcement page announcement load more post:-
  // $("#announcement_load_more_btn").click(function () {
  //   // alert("its working!");
  //   $(".loader_wrap").addClass("active");

  //   // Toggle the button text
  //   if ($this.hasClass("active")) {
  //     $this.removeClass("active").text("Read More");
  //   } else {
  //     $this.addClass("active").text("Read Less");
  //   }

  //   $.ajax({
  //     type: "post",
  //     url: "/wp-admin/admin-ajax.php",
  //     data: {
  //       action: "load_more",
  //     },
  //     success: function (response) {
  //       if (response) {
  //         setTimeout(function () {
  //           $(".loader_wrap").removeClass("active");
  //           $(".tabs-section .tab-content .announcements_posts").replaceWith(
  //             response
  //           );
  //         }, 500);
  //       }
  //     },
  //   });
  // });
  var announcementsPostsLoaded = 5; // Initialize the number of posts already loaded
  var announcementsPostsPerPage = 5; // Number of posts to load per click

  $("#announcement_load_more_btn").click(function () {
    $(".loader_wrap").addClass("active");

    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "load_more",
        offset: announcementsPostsLoaded,
        posts_per_page: announcementsPostsPerPage,
      },
      success: function (response) {
        setTimeout(function () {
          $(".loader_wrap").removeClass("active");

          if (response.trim() === "NO_MORE_POSTS") {
            // Handle the case where no more posts are available
            $("#announcement_load_more_btn").closest(".button_wrap").hide();
            $(".tabs-section .tab-content .announcements_posts").append(
              "<p>No more posts available.</p>"
            );
          } else {
            // Append the new posts
            if (announcementsPostsLoaded === 0) {
              $(".tabs-section .tab-content .announcements_posts").html(
                response
              );
            } else {
              $(".tabs-section .tab-content .announcements_posts").append(
                response
              );
            }

            announcementsPostsLoaded += announcementsPostsPerPage;

            // Optional: Log the response for debugging
            console.log(response);
          }
        }, 500);
      },
    });
  });

  var presentationPostsLoaded = 5; // Initialize the number of posts already loaded
  var presentationPostsPerPage = 5; // Number of posts to load per click
  // on announcement page presentation load more post:-
  $("#presentation_load_more_btn").click(function () {
    // alert("its working!");
    $(".loader_wrap").addClass("active");
    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "presentation_load_more",
        offset: presentationPostsLoaded,
        posts_per_page: presentationPostsPerPage,
      },
      success: function (response) {
        setTimeout(function () {
          $(".loader_wrap").removeClass("active");

          if (response.trim() === "NO_MORE_POSTS") {
            // Handle the case where no more posts are available
            $("#presentation_load_more_btn").closest(".button_wrap").hide();
            $(".tabs-section .tab-content .presentation_posts").append(
              "<p>No more posts available.</p>"
            );
          } else {
            // Append the new posts
            if (presentationPostsLoaded === 0) {
              $(".tabs-section .tab-content .presentation_posts").html(
                response
              );
            } else {
              $(".tabs-section .tab-content .presentation_posts").append(
                response
              );
            }

            presentationPostsLoaded += presentationPostsPerPage;

            // Optional: Log the response for debugging
            console.log(response);
          }
        }, 500);
      },
    });
  });

  var mediaPostsLoaded = 6; // Initialize the number of posts already loaded
  var mediaPostsPerPage = 6; // Number of posts to load per click

  var mediaPostsLoaded = 6; // Initialize the number of posts already loaded
  var mediaPostsPerPage = 6; // Number of posts to load per click

  // Function to handle the button click for loading more posts
  $("#media_load_more_btn").click(function () {
    $(".loader_wrap").addClass("active");

    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "media_load_more",
        offset: mediaPostsLoaded,
        posts_per_page: mediaPostsPerPage,
      },
      success: function (response) {
        setTimeout(function () {
          $(".loader_wrap").removeClass("active");

          if (response.trim() === "NO_MORE_POSTS") {
            // Handle the case where no more posts are available
            $("#media_load_more_btn").closest(".button_wrap").hide();

            $(".tabs-section .tab-content .media_posts").append(
              "<p>No more posts available.</p>"
            );
          } else {
            // Append the new posts
            $(".tabs-section .tab-content .media_posts").append(response);
            mediaPostsLoaded += mediaPostsPerPage; // Update the count of loaded posts
          }
        }, 500);
      },
    });
  });

  $("#post_date_filter").on("change", function () {
    $(".loader_wrap").addClass("active");
    let get_select_value = $(this).val();
    let get_data_attr_value = $("#pills-tab .nav-link.active").attr(
      "data-tab-name"
    );
    console.log(get_select_value);
    console.log(get_data_attr_value);
    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "post_filter",
        SelectedDate: get_select_value,
        SelectedTab: get_data_attr_value,
      },
      success: function (response) {
        if (response) {
          setTimeout(function () {
            if (get_data_attr_value == "announcements") {
              $(".loader_wrap").removeClass("active");
              $(
                ".tabs-section .tab-content .tab-pane .announcements_posts"
              ).replaceWith(response);
            } else if (get_data_attr_value == "presentations") {
              $(".loader_wrap").removeClass("active");
              $(
                ".tabs-section .tab-content .tab-pane .presentation_posts"
              ).replaceWith(response);
            } else if (get_data_attr_value == "media") {
              $(".loader_wrap").removeClass("active");
              $(
                ".tabs-section .tab-content .tab-pane .media_posts"
              ).replaceWith(response);
            }
          }, 500);
        }
      },
    });
  });

  $("#sort_by_tag").on("change", function () {
    $(".loader_wrap").addClass("active");
    let selected_tag = $(this).val();
    console.log(selected_tag);
    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "filter_tag",
        Post_Tag: selected_tag,
      },
      success: function (response) {
        if (response) {
          setTimeout(function () {
            $(".loader_wrap").removeClass("active");
            $(".pdf_sec .sec_content .filtered_tags").replaceWith(response);
          }, 500);
        }
      },
    });
  });

  $("#sort_by_date").on("change", function () {
    $(".loader_wrap").addClass("active");
    let selected_date = $(this).val();
    console.log(selected_date);
    $.ajax({
      type: "post",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "filter_date",
        Post_date: selected_date,
      },
      success: function (response) {
        if (response) {
          setTimeout(function () {
            $(".loader_wrap").removeClass("active");
            $(".pdf_sec .sec_content .filtered_date").replaceWith(response);
          }, 500);
        }
      },
    });
  });

  jQuery(".read_more_text_box .read_more_expand_btn").click(function (e) {
    e.preventDefault();
    var $this = jQuery(this);
    var $textBox = jQuery(".read_more_text_hide");

    // Toggle the text box visibility
    $textBox.slideToggle();

    // Toggle the button text
    if ($this.hasClass("active")) {
      $this.removeClass("active").text("Read More");
    } else {
      $this.addClass("active").text("Read Less");
    }
  });

  $(".clinical_content_sec .read_more_btn").click(function () {
    var $this = jQuery(this);
    $(this).closest(".text_wrap").find(".hidden_text").slideToggle();

    // Toggle the button text
    if ($this.hasClass("active")) {
      $this
        .removeClass("active")
        .html(
          `Read More <img src="/wp-content/uploads/2024/08/red-arrow.png" alt="icon">`
        );
    } else {
      $this
        .addClass("active")
        .html(
          `Read Less <img src="/wp-content/uploads/2024/08/red-arrow.png" alt="icon">`
        );
    }
  });
});
