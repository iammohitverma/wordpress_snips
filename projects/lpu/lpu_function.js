jQuery(function ($) {
  // console.log(
  //     "%cWebsite Built by Jagsness",
  //     "background: #0a383f; color: #ffffff; display: block;padding:5px 15px;border-radius:7px"
  // );

  // Put each and every piece of code with comments and in between this brackets

  // progammes_slider strt
  var swiper = new Swiper(".progammes_slides", {
    slidesPerView: 1,
    speed: 1000,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    breakpoints: {
      1199: {
        slidesPerView: 4,
      },
      991: {
        slidesPerView: 3,
      },
      575: {
        slidesPerView: 2,
      },
    },
  });
  // progammes_slider end

  // ranking slider strt
  var swiper = new Swiper(".ranking_slider", {
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 20,
    speed: 1000,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1199: {
        slidesPerView: 4,
        slidesPerGroup: 4,
      },
      991: {
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      575: {
        slidesPerView: 1,
      },
    },
  });
  // ranking slider end

  // top ranked institute slider strt
  var swiper = new Swiper(".ranked_institute_slider", {
    slidesPerView: 1,
    // spaceBetween: 20,
    loop: true,
    speed: 2000,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    breakpoints: {
      1199: {
        slidesPerView: 3,
      },
      991: {
        slidesPerView: 2,
      },
      575: {
        slidesPerView: 1,
      },
    },
  });
  // top ranked institute slider end

  //  admission buttons js start
  $(".admission_form .apply_now").click(function () {
    // console.log("hehe");
    $(".admission_form").toggleClass("active");
  });

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $(".admission_form").removeClass("active");
    } else {
      $(".admission_form").addClass("active");
    }
  });
  //  admission buttons js end

  // form popup js start
  $(".popup_btn").click(function (e) {
    let formHead = $(this).text();
    $(".admission_popup_form .form_hdng").text(formHead);
    $(".admission_popup_form .hidden_inp").val(formHead);
    e.preventDefault();
    $(".admission_popup_form").addClass("active");
  });
  $(".admission_popup_form .cross").click(function () {
    $(".admission_popup_form").removeClass("active");
  });

  $(".admission_popup_form").on("click", function (e) {
    if ($(e.target).is(".admission_popup_form")) {
      $(this).removeClass("active");
    }
  });

  $(document).on("keydown", function (e) {
    if (e.keyCode == 27) $(".admission_popup_form").removeClass("active");
  });
  // form popup js end

  // online programs slider start
  var swiper = new Swiper(".online_programs_slider", {
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 30,
    speed: 1000,
    breakpoints: {
      1199: {
        slidesPerView: 3,
        slidesPerGroup: 3,
      },
      991: {
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      575: {
        slidesPerView: 1,
      },
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
  // online programs slider start

  // programmes autoplay slider start:-
  var swiper = new Swiper(".programme_slider", {
    loop: true,
    spaceBetween: 15,
    centeredSlides: true,
    speed: 2500,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
  });
  // programmes autoplay slider end:-

  // student story slider slider strt
  var swiper = new Swiper(".student_story_slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    speed: 2000,
    loop: true,
    autoplay: {
      delay: 1000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".custom_arrows .right",
      prevEl: ".custom_arrows .left",
    },
    breakpoints: {
      1199: {
        slidesPerView: 3,
      },
      991: {
        slidesPerView: 2,
      },
      575: {
        slidesPerView: 1,
      },
    },
  });
  // student story slider slider end

  // progammes_slider strt
  var swiper = new Swiper(".industry_slides", {
    slidesPerView: 1,
    loop: true,
    speed: 1200,
    autoplay: {
      delay: 800,
      disableOnInteraction: false,
    },
    breakpoints: {
      1199: {
        slidesPerView: 5,
      },
      991: {
        slidesPerView: 3,
      },
      0: {
        slidesPerView: 2,
      },
    },
  });
  // progammes_slider end

  $(".fixed_btn").click(function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "fast");
  });

  // placement slider js start
  var swiper = new Swiper("#placement-slider", {
    slidesPerView: 2,
    slidesPerGroup: 2,
    spaceBetween: 10,
    loop: true,
    speed: 1000,
    pagination: {
      el: ".swiper-pagination",
      // dynamicBullets: true,
      clickable: true,
    },

    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 0,
        slidesPerGroup: 1,
      },

      640: {
        slidesPerView: 1,
        spaceBetween: 10,
        slidesPerGroup: 1,
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 10,
        slidesPerGroup: 2,
      },
      1280: {
        slidesPerView: 2,
        spaceBetween: 10,
        slidesPerGroup: 2,
      },
    },
  });
  // placement slider js end

  // lerade slider js start
  var swiper = new Swiper("#leader-slider", {
    slidesPerView: 4,
    spaceBetween: 10,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      // dynamicBullets: true,
      clickable: true,
    },

    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 10,
      },

      640: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      1280: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
    },
  });
  // lerade slider js end

  // online student slider js start
  var swiper = new Swiper("#Online-students-slider", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      // dynamicBullets: true,
      clickable: true,
    },

    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 0,
      },

      640: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1280: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });
  // online student slider js end

  // magificpopup for video start
  if ($.fn.magnificPopup) {
    $(".popup_link").magnificPopup({
      type: "iframe",
      mainClass: "mfp-fade",
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false,
    });
  }
});

// // Responsive Menu JS by Aditya
// document.querySelector(".hamburger").addEventListener("click", function() {
//     this.classList.toggle("is-active");
//     document.querySelector(".menu").classList.toggle("show-menu");
// });

// // Hide menu if clicked outside
// document.addEventListener("click", function(event) {
//     const isClickInsideMenu = document.querySelector(".menu").contains(event.target);
//     const isClickOnHamburger = document.querySelector(".hamburger").contains(event.target);
//     if (!isClickInsideMenu && !isClickOnHamburger) {
//         document.querySelector(".menu").classList.remove("show-menu");
//         document.querySelector(".hamburger").classList.remove("is-active");
//     }
// });

let citiesData = [];

// Fetch the cities.json file
fetch("./assets/js/cities.json")
  .then((response) => response.json())
  .then((data) => {
    citiesData = data;
    populateStates();
  })
  .catch((error) => console.error("Error loading cities data:", error));

const stateSelects = document.querySelectorAll(".select_state");
const citySelects = document.querySelectorAll(".select_city");

// Attach change event to each state select
stateSelects.forEach((stateSelect, index) => {
  stateSelect.addEventListener("change", function () {
    populateCities(stateSelect, citySelects[index]);
  });
});

function populateStates() {
  const states = [...new Set(citiesData.map((city) => city.state))].sort();

  stateSelects.forEach((stateSelect) => {
    stateSelect.innerHTML = '<option value="">Select State*</option>'; // Reset first
    states.forEach((state) => {
      const option = document.createElement("option");
      option.value = state;
      option.textContent = state;
      stateSelect.appendChild(option);
    });
  });
}

function populateCities(stateSelect, citySelect) {
  const selectedState = stateSelect.value;

  // Clear previous cities
  citySelect.innerHTML = '<option value="">Select City*</option>';

  const filteredCities = citiesData
    .filter((city) => city.state === selectedState)
    .map((city) => city.name)
    .sort();

  filteredCities.forEach((cityName) => {
    const option = document.createElement("option");
    option.value = cityName;
    option.textContent = cityName;
    citySelect.appendChild(option);
  });
}


// Form validation script start by mohit
// Select all forms and add on submit function for all forms
let allForms = document.querySelectorAll("form");
allForms.forEach((element) => {
  element.addEventListener("submit", validationFun);
});

// SetError msg function
function setError(event, currentForm, element, errMsg) {
  currentForm.scrollIntoView({
    behavior: "smooth",
  });
  let errorWrap = document.createElement("SPAN");
  errorWrap.classList.add("errorBox");
  element.parentElement.appendChild(errorWrap);
  errorWrap.innerText = errMsg;
  event.preventDefault();
}

// check all fields
function checkAllFields(event, element, currentForm) {
  let currInputVal = element.value;
  let currInputClass = element.getAttribute("class");
  if (currInputVal == "") {
    setError(event, currentForm, element, "This field is required");
  } else if (currInputClass.includes("email")) {
    if (
      currInputVal.indexOf("@") <= 0 ||
      (currInputVal.charAt(currInputVal.length - 4) != "." &&
        currInputVal.charAt(currInputVal.length - 3) != ".")
    ) {
      setError(event, currentForm, element, "Please fill Valid Email");
    }
  } else if (currInputClass.includes("phone")) {
    if (
      !isNaN(currInputVal) ||
      /^\(\d{3}\)\s*\d{3}(?:-|\s*)\d{4}$/.test(currInputVal) == true ||
      /^\d{3}(?:-|\s*)\d{3}(?:-|\s*)\d{4}$/.test(currInputVal) == true
    ) {
      let hiddenNumber = currInputVal;
      var str = hiddenNumber;
      var res = str.replace(/\D/g, "");
      if (res.length < 7 || res.length > 15) {
        setError(
          event,
          currentForm,
          element,
          "Please enter valid Contact Number"
        );
      }
    } else {
      setError(
        event,
        currentForm,
        element,
        "Please enter valid Contact Number"
      );
    }
  } else if (currInputClass.includes("check-radio-wrap")) {
    let getAllCheckedInput = element.querySelectorAll("input:checked");
    if (getAllCheckedInput.length == 0) {
      setError(
        event,
        currentForm,
        element.children[0],
        "This field is required"
      );
      element.classList.add("errorCheckRadio");
    } else {
      element.classList.remove("errorCheckRadio");
    }
  }
}

// Validation Function
function validationFun(event) {
  let allErrorBoxCheck;
  let currentForm = event.target;
  let allRequiredFields = currentForm.querySelectorAll(".required_field");

  // first remove old errorBox from current Form
  let allErrorBox = currentForm.querySelectorAll(".errorBox");
  allErrorBox.forEach((element) => {
    element.remove();
  });
  allRequiredFields.forEach((element) => {
    checkAllFields(event, element, currentForm);
  });

  // get allErrorBox length after foreach loop
  allErrorBoxCheck = currentForm.querySelectorAll(".errorBox");

  // form submit using ajax inside this
  function formSubmitFun(event) {
    if (event.target.id == "admission_form") {
      alert("admission_form Submit Call");
    }
    if (event.target.id == "center_popup_form") {
      alert("center_popup_form Submit Call");
    }
  }

  // check all fields before submit
  function fieldCheckFun(event) {
    event.preventDefault();
    if (allErrorBoxCheck.length == 0) {
      formSubmitFun(event);
    }
  }
  fieldCheckFun(event);
}
// Form validation script end by mohit

// Form urm parameters script start by mohit
jQuery("#admission_form, #center_popup_form").submit(function (e) {
  const urlParams = new URLSearchParams(window.location.search);
  const keys = [
    "utm_source",
    "utm_medium",
    "utm_campaignid",
    "utm_adgroupid",
    "utm_creativeid",
    "utm_matchtype",
    "utm_device",
    "utm_network",
    "utm_keyword",
    "utm_keywordid",
    "utm_campaign",
    "gad_source",
    "gbraid",
    "gclid",
  ];

  keys.forEach((key) => {
    if (urlParams.has(key)) {
      const fields = e.target.querySelectorAll(`[name="${key}"]`);
      fields.forEach((field) => {
        field.value = urlParams.get(key);
      });
    }
  });
});

// Form urm parameters script end by mohit
