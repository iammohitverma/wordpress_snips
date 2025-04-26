jQuery(document).ready(function($) {
    console.log(
        "%cWebsite Built by Techmind Softwares",
        "background: #0a383f; color: #ffffff; display: block;padding:5px 15px;border-radius:7px"
    );
	
	// Homepage slider js:-
	$('.boring_look').owlCarousel({
		loop: true,
		margin: 25,
		center: true,
		stagePadding: 100,
		nav: true,
		dots: false,
		responsive:{
			0:{
				items:1
			},
			776:{
				items:2
			},
			992:{
				items:3
			}
		}
	});
	$(".owl-prev").html('<img src="/theboringoffice/wp-content/uploads/2025/04/left_arrow.png" alt="prev_icon">');
	$(".owl-next").html('<img src="/theboringoffice/wp-content/uploads/2025/04/right_arrow.png" alt="next_icon">');
	
		// $('select').select2({
		// 	minimumResultsForSearch: Infinity
		// });
	$( "select" ).each(function( index ) {
		let parentelem = $(this).parent("div");
		
			$(this).select2({
			minimumResultsForSearch: Infinity,
			dropdownParent: parentelem,
		});
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
        }
        }
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
			$("#success_tbo").html(response.message).css("display", "block");
			// window.location.href = page_type + "thankyou/";
		  },
		});
	});
	
	/* Phone number validation code start here */
	  // change maxlength of number field according to country change
	  let allCountryCodeFields = document.querySelectorAll("[name='country_code']");
	  allCountryCodeFields.forEach((field) => {
		field.addEventListener("change", function (event) {
		  const currForm = event.target.closest("form");
		  const countryCode_value = event.target.value;
		  const phone = currForm.querySelector("[name='phone']");
		  setMaxLengthNumberField(countryCode_value, phone);
		});
		//  setting maxlength based on initial value on page load
		const currForm = field.closest("form");
		const initialCountryCode = field.value;
		console.log(initialCountryCode);
		const phone = currForm.querySelector("[name='phone']");
		setMaxLengthNumberField(initialCountryCode, phone);
	  });

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
  if(strArray[1] && strArray[1].includes("#")){
	var utmcode = "?" + strArray[1].substr(0, strArray[1].indexOf('#'));
  } else{
	var utmcode = "?" + strArray[1];
  }
  
  if (strArray[1] != "undefined" && strArray[1] != null && strArray[1] != "") {
	let getAllAnchor = document.querySelectorAll("a");
	getAllAnchor.forEach((element) => {
	  let eachAnchor = element.getAttribute("href");
	  if(!eachAnchor.includes("#contact_form")){
		// let result = eachAnchor.substr(0, eachAnchor.indexOf('#'));
		let newAnchor = eachAnchor + utmcode;
		if (eachAnchor != null && eachAnchor != "#" && eachAnchor != "tel:" && eachAnchor != "mailto:" && eachAnchor != "" ) {
		  element.setAttribute("href", newAnchor);
		}
	  } else{
		let result = eachAnchor.substr(0, eachAnchor.indexOf('#'));
		// console.log(`${result}${utmcode}`);
		if (eachAnchor != null && eachAnchor != "#" && eachAnchor != "tel:" && eachAnchor != "mailto:" && eachAnchor != "" ) {
		  element.setAttribute("href", `${result}${utmcode}#contact_form`);
		}
	  }
	});
  }
  
  
  /** Dropdown  code start here **/
    if ($("body").hasClass("page-id-7")) {
      
        var location_name = $(".center_location").find(":selected").val();
        $.ajax({
            type: "POST",
            url: "/theboringoffice/wp-admin/admin-ajax.php",
            dataType: 'json',
            data: {
                action: "tbo_workspace_team",
                location_name: location_name,
            },
            success: function(response){
				$('.center_workspace').empty().append(response.workspacesRec);
				$('.center_team_size').empty().append(response.teamRec);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }
  /** Dropdown  code end here **/
  
  
$('.filter_center').on('click', function(e) {
	e.preventDefault();
	var location_name = $(".center_location").find(":selected").val();
  	var workspaceName = $('.center_workspace').find(':selected').attr('data-workspace');
	console.log("Selected workspace:", workspaceName);
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

	
  
});