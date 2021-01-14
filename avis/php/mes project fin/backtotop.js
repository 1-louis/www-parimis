/*
Template Name: Boguco
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
File: Back to Top JS
*/

jQuery("#backtotop").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }
});

$('.basicslider').flexslider({
	animation: "slide",
	// animationLoop: true,
	pauseOnHover: true,
	controlNav: true,
	directionNav: false,
	smoothHeight: true,
	start: function(slider) {
		$('body').removeClass('loading');
	}
});

/*
Template Name: Boguco
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
File: Back to Top JS
*/

jQuery("#backtotop").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }


$('<form action="#"><select /></form>').appendTo("#mainav");$("<option />",{selected:"selected",value:"",text:"MENU"}).appendTo("#mainav select");$("#mainav a").each(function(){var e=$(this);if($(e).parents("ul ul ul").length>=1){$("<option />",{value:e.attr("href"),text:"- - - "+e.text()}).appendTo("#mainav select")}else if($(e).parents("ul ul").length>=1){$("<option />",{value:e.attr("href"),text:"- - "+e.text()}).appendTo("#mainav select")}else if($(e).parents("ul").length>=1){$("<option />",{value:e.attr("href"),text:""+e.text()}).appendTo("#mainav select")}else{$("<option />",{value:e.attr("href"),text:e.text()}).appendTo("#mainav select")}});$("#mainav select").change(function(){if($(this).find("option:selected").val()!=="#"){window.location=$(this).find("option:selected").val()}})


