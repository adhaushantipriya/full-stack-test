jQuery(document).ready(function(){

    // Tabbing
    $('.nav-tabs li:first-child a').tab('show');
    $('.nav-tabs a').on('click', function (e) {
        e.preventDefault();
        $('.nav-tabs a').removeClass('active');
        $(this).tab('show');
        $('.service-type-item-content .tab-pane').slick('setPosition');
    });

    // Slider
    $('.service-type-item-content .tab-pane').slick({
        arrows:false,
        dots:true
    });
    $('.mobile-services-wrap .card-body').slick({
        arrows:false,
        dots:true
    })
    .on('setPosition', function (event, slick) {
        slick.$slides.css('height', slick.$slideTrack.height() + 'px');
    });

    // Show first collapse
    $('#accordion .card:first-child .collapse').collapse('show');
});