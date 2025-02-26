// JavaScript Document

$(document).ready(function(e) {

    $('.slider-big').slick({
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slider-thumb'
    });

    $(".slider-thumb").slick({
        dots: true,
        arrows: true,
        slidesToShow: 5,
        centerPadding: '60px',
        autoplay: false,
        focusOnSelect: true,
        asNavFor: '.slider-big',
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 669,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });


});