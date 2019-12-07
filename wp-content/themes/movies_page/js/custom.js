jQuery('.hero-slider').slick({
   slidesToShow: 4,
   slidesToScroll: 4,
   dots: true,
   focusOnSelect: false,
   arrows: false,
   
   //autoplay: true,
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
/* premieres slider */
jQuery('.slider-main').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: false,
   asNavFor: '.slider-nav',
   vertical: true,
   verticalSwiping: true,
});

jQuery('.slider-nav').slick({
   slidesToShow: 4,
   asNavFor: '.slider-main',
   vertical: true,
   arrows: true,
   focusOnSelect: true,
});