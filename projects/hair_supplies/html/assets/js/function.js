$(document).ready(function(){
    $('.product_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true, 
        dots: false,  
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev"><svg width="30" height="30" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13L2 7L8 1" stroke="#3B3B3B" stroke-width="1.5"/></svg></button>',
        nextArrow: '<button type="button" class="slick-next"><svg width="30" height="30" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 13L7 7L1 1" stroke="#3B3B3B" stroke-width="1.5"/></svg></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 570,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]
    });
    $('#brand_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true, 
        dots: false,  
        infinite: true,
        prevArrow: '<button type="button" class="slick-prev"><svg width="30" height="30" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13L2 7L8 1" stroke="#3B3B3B" stroke-width="1.5"/></svg></button>',
        nextArrow: '<button type="button" class="slick-next"><svg width="30" height="30" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 13L7 7L1 1" stroke="#3B3B3B" stroke-width="1.5"/></svg></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 570,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }
        ]
    });
});