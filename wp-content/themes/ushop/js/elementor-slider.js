(function($) {
    "use strict";

    var TreadingSlider = function($scope, $) {

        var carousel = $scope.find('.treading-products .products');
        carousel.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            centerPadding: '0px',
            centerMode: true,
            nextArrow: '<i class="ion-ios-arrow-right f-2x"></i>',
            prevArrow: '<i class="ion-ios-arrow-left f-2x"></i>',
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    };

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/Ushop_Trading_Products.default', TreadingSlider);
    });


})(jQuery);