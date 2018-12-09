$( document ).ready(function() {
    $('.bxslider').bxSlider({
    	mode: 'fade',
      pagerCustom: '#bx-pager',
      captions: true,
      auto: true
    });
    
    $('.bxslider-projects').bxSlider({
    	pager: false,
    	auto: true
    });
});