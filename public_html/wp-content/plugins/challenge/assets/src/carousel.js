jQuery(document).ready(function ($) {
    $('.news-carousel__slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 5000,
        mobileFirst: true,
        responsive: [
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
});
