/*global $*/


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


/* PrettyPhoto
========================*/
$(document).ready(function () {
    
    "use strict";
    
	$("a[data-type^='prettyPhoto']").prettyPhoto({
        
		animation_speed: 'normal',
        
		theme: 'light_square'
        
	});
    
});
