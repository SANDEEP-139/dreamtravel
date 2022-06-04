
//* Js for Listing Property Type Search Header Banner *//

function openLoginops(evt, loginName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(loginName).style.display = "block";
    evt.currentTarget.className += " active";
}






$('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
});


//* Js for Header Scroll fix *//

$(function() {
    var nav = $(".homemenusc");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 220) {
            nav.removeClass('homemenusc').addClass("navfixed");
        } else {
            nav.removeClass("navfixed").addClass('homemenusc');
        }
    });
});


//* Js for Property Bga Scroll fix *//

$(function() {
    var nav = $(".propertybgaspace");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 220) {
            nav.removeClass('bgaactive').addClass("bgaremove");
        } else {
            nav.removeClass("bgaremove").addClass('bgaactive');
        }
    });
});


//* Js for Agent and Developer Slider *//

  $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
				  responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:7,
            nav:true,
			dots:false,
            loop:false
        }
    }
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
			  
			
            })
			
			
			
// Js for page load popup for some interval 


jQuery(".mainloadscreens").show().delay(6000).queue(function(n) {
  jQuery(this).hide(); n();
});

	setTimeout(function(){
   jQuery('.blursec').addClass('pageldf');
},6000);


// js for tabs on Property 

function openProperty(evt, cityName) {
    var i, propscontent, propslinks;
    propscontent = document.getElementsByClassName("propscontent");
    for (i = 0; i < propscontent.length; i++) {
        propscontent[i].style.display = "none";
    }
    propslinks = document.getElementsByClassName("propslinks");
    for (i = 0; i < propslinks.length; i++) {
        propslinks[i].className = propslinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}



// js for tabs on Property 

function openBeforafter(evt, cityName) {
    var i, beaftercontent, beafterlinks;
    beaftercontent = document.getElementsByClassName("beaftercontent");
    for (i = 0; i < beaftercontent.length; i++) {
        beaftercontent[i].style.display = "none";
    }
     beafterlinks = document.getElementsByClassName(" beafterlinks");
    for (i = 0; i <  beafterlinks.length; i++) {
         beafterlinks[i].className =  beafterlinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}



$(".menumobilevrc").click(function (e) {
    e.stopPropagation();
	$(".menumobilevrc").toggleClass('closevc');
	 $(".rightoption").toggleClass('openmenus');
});


