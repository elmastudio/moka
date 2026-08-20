
/*--------------------------------------------------------------------------------------------
  Mobile Menu
----------------------------------------------------------------------------------------------*/

jQuery(document).ready(function(){
    	jQuery('#site-nav').hide();
		jQuery('a#mobile-menu-btn').click(function () {
		jQuery('#site-nav').slideToggle('fast');
		jQuery('a#mobile-menu-btn').toggleClass('menu-btn-open');
    });
});


/*--------------------------------------------------------------------------------------------
 Initialize Featured Content slider.
----------------------------------------------------------------------------------------------*/
jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
    animation: "fade",
    slideshow: true,
    pauseOnAction: true,
    touch: true
  });
});

/*--------------------------------------------------------------------------------------------
 Search Form
----------------------------------------------------------------------------------------------*/

jQuery(document).ready(function(){
    	jQuery('.search-overlay').hide();
		jQuery('#search-btn').click(function () {
		jQuery('.search-overlay').show();
		jQuery('body').addClass('searchfullwidth');
		jQuery('body').removeClass('searchhide');
    });
});

jQuery(document).ready(function(){
		jQuery('.search-close').click(function () {
		jQuery('.search-overlay').hide();
		jQuery('body').addClass('searchhide');
		jQuery('body').removeClass('searchfullwidth');
    });
});

jQuery(document).ready(function(){
jQuery(document).keyup(function (e) {
        if (e.keyCode == 27) {
           jQuery('.search-overlay').hide();
           jQuery('body').addClass('searchhide');
		   jQuery('body').removeClass('searchfullwidth');
        }
    });
});

/*--------------------------------------------------------------------------------------------
  Share Buttons
----------------------------------------------------------------------------------------------*/

jQuery(document).ready(function(){
    	jQuery('.share-links-wrap').hide();
		jQuery('.share-btn').click(function () {
		jQuery(this).next('.share-links-wrap').fadeToggle('fast');
    });
});

/*---------------------------------------------------------------------------------------------
  Scalable Videos (more info see: fitvidsjs.com)
----------------------------------------------------------------------------------------------*/
jQuery(document).ready(function(){
	jQuery('#primary').fitVids();
});
