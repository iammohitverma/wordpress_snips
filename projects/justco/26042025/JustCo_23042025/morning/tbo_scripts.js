// new header js start:-
let headerToggle = document.querySelector(".toggle_button");
headerToggle.addEventListener("click", () => {
  let headerMenu = document.querySelector(".header_menus");
  headerMenu.classList.add("active");
});
document.addEventListener("click", function (e) {
  if (e.target.className != "toggle_icon") {
    document.querySelector(".header_menus").classList.remove("active");
  }
});
let closeBtn = document.querySelector(".close_btn");
closeBtn.addEventListener("click", () => {
  let headerMenu = document.querySelector(".header_menus");
  headerMenu.classList.remove("active");
});
document.addEventListener("keydown", function (e) {
  if (e.key == "Escape") {
    document.querySelector(".header_menus").classList.remove("active");
  }
});
jQuery(document).ready(function ($) {
  jQuery(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll > 100) {
      $(".main-header-tm").addClass("fixed");
    } else {
      $(".main-header-tm").removeClass("fixed");
    }
  });
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
});
