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

  $('#bx-pager').serialScroll({
		items:'a img', // Selector to the items ( relative to the matched elements, '#sections' in this case )
		prev:'a.prev',// Selector to the 'prev' button (absolute!, meaning it's relative to the document)
		next:'a.next',// Selector to the 'next' button (absolute too)
		axis:'y',// The default is 'y' scroll on both ways
		duration:300,// Length of the animation (if you scroll 2 axes and use queue, then each axis take half this time)
		force:true, // Force a scroll to the element specified by 'start' (some browsers don't reset on refreshes)
		step:1 // How many items to scroll each time ( 1 is the default, no need to specify )
	});

  $('#news-images-list').serialScroll({
    items:'ul li', // Selector to the items ( relative to the matched elements, '#sections' in this case )
    prev:'span.prev',// Selector to the 'prev' button (absolute!, meaning it's relative to the document)
    next:'span.next',// Selector to the 'next' button (absolute too)
    axis:'x',// The default is 'y' scroll on both ways
    duration:300,// Length of the animation (if you scroll 2 axes and use queue, then each axis take half this time)
    force:true, // Force a scroll to the element specified by 'start' (some browsers don't reset on refreshes)
    step:3 // How many items to scroll each time ( 1 is the default, no need to specify )
  });
  
  $('#news-images-list a img').click(function() {
    $(this).colorbox({href: $(this).attr('src')});
  });
  
  
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-12.10092, -76.948071);
    var mapOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  }
  google.maps.event.addDomListener(window, 'load', initialize);

  $('#oficinas .office').click(function(){
    $('#oficinas .office').removeClass('active');
    $(this).addClass('active');
  });
});
var geocoder;
var map;
function codeAddress(e) {
    var throbber = document.getElementById("map_canvas");
    throbber.className = throbber.className + " throbber";

    setInterval(function(){throbber.className = "";},500);
    var address = e.getAttribute("val");

    geocoder.geocode( { 'address': address }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }