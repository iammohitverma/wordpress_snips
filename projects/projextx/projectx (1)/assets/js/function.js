jQuery(document).ready(function() {
  var header = jQuery(".projectx_header") // Select the header

  jQuery(window).scroll(function() {
      var scroll = jQuery(window).scrollTop(); // Get current scroll position

      if (scroll > 30) {
          header.addClass("sticky");
      } else {
          header.removeClass("sticky");
      }
  });

  jQuery(".menu_toggle_btn").click(function() {
      jQuery(this).toggleClass("active");
      header.toggleClass("active");
      jQuery(".navigationWrap").slideToggle();
  });

  jQuery(".subMenuAngle").click(function() {
      jQuery(this).toggleClass("active");
      jQuery(this).closest(".a-Wrap").next(".sub-menu").slideToggle();
  });

  new Swiper("#relationships_slider", {
      slidesPerView: 1,
      spaceBetween: 10,
      pagination: {
          el: ".relationship_tips_section .swiper-pagination",
          type: "progressbar",
      },
      breakpoints: {
          640: {
              slidesPerView: 2,
              spaceBetween: 20,
          },
          768: {
              slidesPerView: 3,
              spaceBetween: 40,
          },
          1024: {
              slidesPerView: 4,
              spaceBetween: 50,
          },
      }
  });

  // Left to Right Swiper
  var swiperOptionsLeftToRight = {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
          delay: 100,
          pauseOnMouseEnter: true,
          // disableOnInteraction: false,
          reverseDirection: true, // Reverse the direction
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

  // Right to Left Swiper
  var swiperOptionsRightToLeft = {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
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

  // Initialize Swipers
  new Swiper(".marquee_card_row.ltr", swiperOptionsLeftToRight);
  new Swiper(".marquee_card_row.rtl", swiperOptionsRightToLeft);
});