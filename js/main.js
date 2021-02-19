jQuery(function($) {

    // OWL CAROUSEL Chiffres
    $('#slick-chiffres.slider').each(function() {
        $(this).addClass('owl-carousel').owlCarousel({
            margin: 20,
            loop: true,
            items: 4,
            nav: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    autoWidth: false,
                    nav: true
                },
                568: {
                    items: 2,
                    autoWidth: false,
                    nav: true
                },
                880: {
                    items: 3,
                    autoWidth: false,
                    nav: true
                }
            }
        });
    });

    //hide next & prev text
    $('.owl-prev, .owl-next').each(function() {
        $(this).empty();
    });


});