jQuery(document).ready(function () {
    // toggle_menu for mobile
    jQuery(".fasd_header .toggle_menu").click(function () {
        jQuery(this).toggleClass("active");
        jQuery(".fasd_header .navigationWrap").slideToggle();
    })
    // submenu toggle for mobile
    jQuery(".fasd_header .subMenuAngle").click(function () {
        jQuery(this).toggleClass("active");
        jQuery(this).closest(".a-Wrap").next().slideToggle();
    })
    // search toggle for mobile
    jQuery(".fasd_header .search_toggle_mobile button").click(function () {
        jQuery(this).toggleClass("active");
        jQuery(".fasd_header .search_wrap").slideToggle();
    })

    // Carousel For All Pages Start
    $('#global_banner').owlCarousel({
        loop: true,
        margin: 24,
        nav: false,
        dots: false,
        items: 1,
        autoplay: true,
        responsive: {
            600: {
                nav: true,
            }
        }
    })

    $('#beyond_da_hub_slider').owlCarousel({
        loop: true,
        margin: 24,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                nav: true,
                items: 2
            },
            1000: {
                nav: true,
                items: 2
            }
        }
    })

    // changed all carousels icons (please change css path when go live)
    $("#global_banner .owl-prev").html('<img src="/wp-content/uploads/2024/04/slider_arrow_left_home.png"/>');
    $("#global_banner .owl-next").html('<img src="/wp-content/uploads/2024/04/slider_arrow_right_home.png"/>');
    $("#beyond_da_hub_slider .owl-prev").html('<img src="/wp-content/uploads/2024/04/slider_arrow_left.png"/>');
    $("#beyond_da_hub_slider .owl-next").html('<img src="/wp-content/uploads/2024/04/slider_arrow_right.png"/>');

    // Carousel For All Pages Start


    // hide show code for video element
    $("[data-target-el]").each(function () {
        console.log($(this).attr("data-target-el"));
        $(this).find(".hideElem").append(`<img src="http://52.64.249.237/wp-content/uploads/2024/04/play-btn.svg" alt="" class="play_btn">`);
        $(this).append(`<div class="videoBox showElem" style="display:none">
            <iframe src=""></iframe>
        </div>`);
    });

    $("[data-target-el='hide-show-toggle']").click(function () {
        let curElHeight = $(this).height();
        let videoURL = $(this).attr("data-video");
        $(this).find(".hideElem").hide();
        $(this).find(".showElem").show();
        $(this).find("iframe").attr("src", videoURL);
        $(this).find("iframe").css("height", curElHeight);
    })

    // tab_slider start
    var scrollAmount = jQuery(".tab_slider .items button").width(); // Scroll amount in pixels
    $('.tab_slider .prev').on('click', function () {
        var currentScrollLeft = $('.tab_slider .items').scrollLeft();
        $('.tab_slider .items').animate({ scrollLeft: currentScrollLeft - scrollAmount }, 400);
    });
    $('.tab_slider .next').on('click', function () {
        var currentScrollLeft = $('.tab_slider .items').scrollLeft();
        $('.tab_slider .items').animate({ scrollLeft: currentScrollLeft + scrollAmount }, 400);
    });
    // tab_slider end

    // tab functionality start
    $('.tabbing_enabled .items button').on('click', function () {
        var index = $(this).index();
        $('.tabbing_enabled .items button').removeClass("active");
        $(this).addClass("active");
        $(".tab_content .content_wrap").removeClass("active");
        $(".tab_content .content_wrap").eq(index).addClass("active");
    });
    // tab functionality end


    // Governance page script
    $(".left_tab_list_wrap li").click(function () {
        let dataTab = $(this).data("tab");
        // console.log(dataTab);
        $(".left_tab_list_wrap li").removeClass("active");
        $(this).addClass("active");
        $(".right_tab_text_wrap").hide();
        $("#" + dataTab).fadeIn();
    })

});

// Select all forms and add on submit function for all forms
let form = document.querySelector("#footer_cont_form");
form?.addEventListener("submit", validationFun);

// SetError msg function
function setError(event, element, errMsg) {
    let errorWrap = document.createElement("SPAN");
    errorWrap.classList.add("errorBox");
    element.parentElement.appendChild(errorWrap);
    errorWrap.innerText = errMsg;
    event.preventDefault();
}

// Validation Function
function validationFun(event) {
    // alert("test");
    let currentForm = event.target;
    let allRequiredFields = currentForm.querySelectorAll(".required_field");

    // first remove old errorBox from current Form
    let allErrorBox = currentForm.querySelectorAll(".errorBox");
    allErrorBox.forEach((element) => {
        element.remove();
    });

    allRequiredFields.forEach((element) => {
        let currInputVal = element.value;
        let currInputClass = element.getAttribute("class");
        if (currInputVal == "") {
            setError(event, element, "This field is required");
        } else if (currInputClass.includes("email")) {
            return;
        }
    });
}