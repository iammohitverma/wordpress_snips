const swiper2 = new Swiper('.carousel-section .swiper', {
   
    breakpoints: {
        992: {
            slidesPerView: 6,
        },
        768: {
            slidesPerView: 3,
        },
        576: {
            slidesPerView: 2,
        },
    },
    speed: 1000,
    spaceBetween:30,
    loop: true,
    autoplay: {
        delay: 500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".carousel-section .swiper-pagination",
        type: ".carousel-section .progressbar",
    },
});




//******* accordion-js *******//
const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
    accordionItemHeader.addEventListener("click", event => {

        // Uncomment in case you only want to allow for the display of only one collapsed item at a time!

        const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
        if (currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader !== accordionItemHeader) {
            currentlyActiveAccordionItemHeader.classList.toggle("active");
            currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
        }

        accordionItemHeader.classList.toggle("active");
        const accordionItemBody = accordionItemHeader.nextElementSibling;

        if (accordionItemHeader.classList.contains("active")) {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
        }
        else {
            accordionItemBody.style.maxHeight = 0;
        }

    });
});



const swiper = new Swiper('.testimonials-section .swiper', {
    breakpoints: {
        992: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 2,
        },
        576: {
            slidesPerView: 1,
        },
    },
    speed: 500,
    spaceBetween: 20,
    loop: true,
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    // },
    pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
    },
});




