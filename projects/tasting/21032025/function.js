jQuery(function ($) {
  // detect mac and add class in body element
  if (navigator.platform.toLowerCase().indexOf('mac') > -1) {
    document.body.classList.add('mac');
  } else {
    document.body.classList.add('window');
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
  // // Use this js code for set header height    
  // let headerHeight = jQuery("header").outerHeight();
  // // headerHeight = headerHeight + 20;
  // jQuery("body").get(0).style.setProperty("--headerHeight", headerHeight + "px");

  // $(".early_entry_btns .forminator-radio-label").on("click", function () {
  //   setTimeout(() => {
  //     var value = $("input[name='calculation-6']").val();
  //     if (value) {
  //       $(".pricing_text_early input").val(value);
  //     }
  //   }, 2000);
  // });
  // $(".normal_entry_btns .forminator-radio-label").on("click", function () {
  //   setTimeout(() => {
  //     var value = $("input[name='calculation-5']").val();
  //     if (value) {
  //       $(".pricing_text_normal input").val(value);
  //     }
  //   }, 2000);
  // });
  $(".btn_radio .forminator-radio-label").on("click", function () {
    var priceField = null;
    var priceFieldVat = null;

    if ($(this).closest(".early_entry_btns").length > 0) {
      priceField = "calculation-6";
      priceFieldVat = "calculation-2";
    } else if ($(this).closest(".normal_entry_btns").length > 0) {
      priceField = "calculation-5";
      priceFieldVat = "calculation-1";
    }

    if (priceField) {
      setTimeout(() => {
        var price = $(`input[name='${priceField}']`).val();
        var priceVat = $(`input[name='${priceFieldVat}']`).val();
        if (price) {
          $(".pricing_text_for_email input").val(price);
        }
        if (priceVat) {
          $(".pricing_vat_text_for_email input").val(priceVat);
        }
      }, 2000);
    }
  });
  setInterval(() => {
    let calc6 = parseFloat($("input[name='calculation-6']").val()) || 0;
    let calc5 = parseFloat($("input[name='calculation-5']").val()) || 0;
    let price = (calc6 + calc5).toFixed(2);
    $(".pricing_text_for_email input").val(price);

    let calc2 = parseFloat($("input[name='calculation-2']").val()) || 0;
    let calc1 = parseFloat($("input[name='calculation-1']").val()) || 0;
    let priceVat = (calc2 + calc1).toFixed(2);
    $(".pricing_vat_text_for_email input").val(priceVat);
  }, 1000);
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