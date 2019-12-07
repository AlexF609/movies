$ = jQuery.noConflict();
$(document).ready(function () {
   
});
//section subscribe
jQuery('.blog-post').slick({
   slidesToShow: 3,
   slidesToScroll: 3,
   dots: true,
   focusOnSelect: false,
   arrows: false,
   autoplay: true,
      responsive: [{
            breakpoint: 890,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 2,
            }
         },
         {
            breakpoint: 500,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1,
            }
         },
       
      ]
});