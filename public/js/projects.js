$( document ).ready(function() {
    if($('#projects-images-list').hasClass('scroller'))
    {
        $('#projects-images-list.scroller').serialScroll({
            items:'ul li', // Selector to the items ( relative to the matched elements, '#sections' in this case )
            prev:'span.prev',// Selector to the 'prev' button (absolute!, meaning it's relative to the document)
            next:'span.next',// Selector to the 'next' button (absolute too)
            axis:'x',// The default is 'y' scroll on both ways
            duration:300,// Length of the animation (if you scroll 2 axes and use queue, then each axis take half this time)
            force:true, // Force a scroll to the element specified by 'start' (some browsers don't reset on refreshes)
            step:3 // How many items to scroll each time ( 1 is the default, no need to specify )
        });
    }
  
    $('.box-image').colorbox({
        rel: 'box-image',
        width:"800px",
    });
});