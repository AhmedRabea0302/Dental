/*global $*/

/* Loading
====================*/
$(window).load(function () {
    "use strict";
    $("body").css("overflow", "auto");

    $(".preloader , .pace").fadeOut(1000);
   
});

/* Nice Scroll
===============================*/
$(document).ready(function () {
    "use strict";
	$("html").niceScroll({
        scrollspeed: 60,
        mousescrollstep: 35,
        cursorwidth: 5,
        cursorcolor: '#f16528',
        cursorborder: 'none',
        background: 'rgba(255,255,255,0.3)',
        cursorborderradius: 3,
        autohidemode: false,
        cursoropacitymin: 0.1,
        cursoropacitymax: 1,
        zindex: "999"
	});
});



/*Owl Carousel
=============================*/
$(document).ready(function () {
    "use strict";
    $("#owl-example").owlCarousel({
        items : 2,
        itemsDesktopSmall : [979, 1],
        itemsDesktop : [1199, 2],
        navigation : true,
        pagination : false,
        autoPlay : true,
        loop : true,
        navigationText: ["<i class='fa fa-chevron-right'></i>", "<i class='fa fa-chevron-left'></i>"]
    });
});



/* Magnific PopUp
======================*/
$(document).ready(function () {
    "use strict";
    $('.gallery-img').each(function () { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
    
    $('#gallery').mixItUp();
    
});


/* PrettyPhoto
========================*/
$(document).ready(function () {
    
    "use strict";
    
	$("a[data-type^='prettyPhoto']").prettyPhoto({
        
		animation_speed: 'normal',
        
		theme: 'light_square'
        
	});
    
});
/*Main Slider
===============================*/
$(document).ready(function () {
	'use strict';
    $('#revolution-slider').revolution({
        dottedOverlay: "none",
        delay: 9000,
        startwidth: 1150,
        startheight: 540,
        hideThumbs: 200,
        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 2,
        simplifyAll: "off",
        navigationType: "bullet",
        navigationArrows: "solo",
        navigationStyle: "preview4",
        touchenabled: "on",
        onHoverStop: "on",
        nextSlideOnWindowFocus: "off",
        swipe_threshold: 75,
        swipe_min_touches: 1,
        drag_block_vertical: false,
        parallax: "mouse",
        parallaxBgFreeze: "off",
        parallaxLevels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
        keyboardNavigation: "off",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        shadow: 0,
        fullWidth: "on",
        fullScreen: "off",
        spinner: "spinner0",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        forceFullWidth: "off",
        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        isJoomla: false
    });
});

