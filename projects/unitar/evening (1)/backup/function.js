jQuery(document).ready(function ($) {
  // detect mac and add class in body element
  if (navigator.platform.toLowerCase().indexOf("mac") > -1) {
    document.body.classList.add("mac");
  } else {
    document.body.classList.add("window");
  }
  jQuery(".site_header .toggle_menu").click(function () {
    jQuery(".site_header .menu_wrap").slideToggle();
    jQuery(this).toggleClass("active");
    jQuery(".site_header").toggleClass("active");
  });

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      //clearHeader, not clearheader - caps H
      $("header").addClass("sticky");
    } else {
      $("header").removeClass("sticky");
    }
  });

  jQuery(".subMenuAngle").click(function () {
    jQuery(this).toggleClass("active");
    jQuery(this).closest(".a-Wrap").next(".sub-menu").slideToggle();
  });
  function updatePrices() {
    let calc6 = parseFloat($("input[name='calculation-6']").val()) || 0;
    let calc5 = parseFloat($("input[name='calculation-5']").val()) || 0;
    let price = (calc6 + calc5).toFixed(2);
    $(".pricing_text_for_email input").val(price);

    let calc2 = parseFloat($("input[name='calculation-2']").val()) || 0;
    let calc1 = parseFloat($("input[name='calculation-1']").val()) || 0;
    let priceVat = (calc2 + calc1).toFixed(2);
    $(".pricing_vat_text_for_email input").val(priceVat);
  }

  function watchInputs() {
    let previousValues = {};

    setInterval(() => {
      $(
        "input[name='calculation-6'], input[name='calculation-5'], input[name='calculation-2'], input[name='calculation-1']"
      ).each(function () {
        let newValue = $(this).val();
        let inputName = $(this).attr("name");

        if (previousValues[inputName] !== newValue) {
          previousValues[inputName] = newValue;
          updatePrices();
        }
      });
    }, 500);
  }

  updatePrices();
  watchInputs();
});

// disbale date field editing from console
let dateField = document.querySelector('[name="date-1"]');

if (dateField) {
  // Get today's date in YYYY-MM-DD format
  let today = new Date().toLocaleDateString("en-GB").split("/").join("-");

  // Set min, max, and value attribute to today's date initially
  dateField.setAttribute("min", today);
  dateField.setAttribute("max", today);
  dateField.setAttribute("value", today);

  // Prevent manual date editing (keyboard input)
  dateField.addEventListener("keydown", function (event) {
    event.preventDefault();
  });

  // Reset min, max, and value if changed in Inspect Element or elsewhere
  setInterval(() => {
    if (dateField.getAttribute("min") !== today) {
      dateField.setAttribute("min", today);
    }
    if (dateField.getAttribute("max") !== today) {
      dateField.setAttribute("max", today);
    }
    if (dateField.value !== today) {
      dateField.setAttribute("value", today); // Ensure the value is always today's date
    }
  }, 1000);

  // Alert and reset if invalid date is selected
  dateField.addEventListener("change", function () {
    if (dateField.value !== today) {
      dateField.value = today;
      alert("Naughty Naughty! Time Travel is not allowed here! ⏳😂");
    }
  });
}
