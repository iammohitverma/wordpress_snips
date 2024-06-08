Delta
jQuery(document).ready(function () {
    jQuery(".video_container_tm .video_placeholder").click(function () {
        jQuery(this).closest(".video_container_tm").addClass("playing");
        jQuery(this).closest(".video_container_tm").find("video")[0].play();
    });
    const hideSubmissionPopup = () => {
        jQuery(".submission_popup").removeClass("active");
    };
    jQuery(".submission_popup .popup_box .close").click(function () {
        hideSubmissionPopup();
    });
    jQuery(document).keydown(function (e) {
        if (e.key === "Escape" || e.keyCode === 27) {
            hideSubmissionPopup();
        }
    });
    jQuery(document).click(function (e) {
        if (jQuery(e.target).hasClass("submission_popup")) {
            hideSubmissionPopup();
        }
    });

    jQuery(".file_text input[type='file']").change(function () {
        var filename = jQuery('input[type=file]').val().split('\\').pop();
        //console.log(filename)

        if (filename == '') {
            jQuery(".file_text b").html("Upload your resume")
        } else {
            jQuery(".file_text b").html(filename)
        }
    });
});



var swiper = new Swiper("#testi_swiper", {
    loop: true,
    cssMode: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper("#roles_swiper", {
    loop: true,
    slidesPerView: 3,
    spaceBetween: 30,
    cssMode: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        // when window width is >= 480px
        576: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        // when window width is >= 640px
        992: {
            slidesPerView: 3,
            spaceBetween: 30
        }
    }
});
