document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

document.body.scrollTop = 0; // For Safari

document.body.style.cursor='wait';
window.onload=function(){document.body.style.cursor='default';}
      
$('#button').click(function(){
    $(".post-content-right .wp_ulike_btn").click();
})
$('#button2').click(function(){
    $(".post-content-right .wp_ulike_btn").click();
})
$('body').addClass('loading');
$(document).ready(function () {
  $('body').removeClass('overflow-hidden');
  if($('.frm_forms').hasClass('frm_message')){
    $('.wp-block-columns').css({display:'none'});
  }
});


$('.burger-wrapper').on('click', function(){
	$('.mobile-menu').toggleClass('open');
	$('.site-navigation').addClass('show-main-menu');
	$('.header-wrapper').addClass('show-hamburger-menu');
    if($('.mobile-menu').hasClass('open')){
        $('body').addClass('overflow-hidden');
    }else{
        $('body').removeClass('overflow-hidden');
    }
});
$('.hamburger-close').on('click', function(){
	$('.mobile-menu').removeClass('open');
	$('.site-navigation').removeClass('show-main-menu');
	$('.header-wrapper').removeClass('show-hamburger-menu');
	$('body').removeClass('overflow-hidden');
});


/* heart animation */

$('.click-heart').on('click', function(){
    $(this).toggleClass('animated-heart');
});

/* lightbox gallery */

$(document).ready(function(){
	$('.js-gallery').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		draggable:false,
		prevArrow: '<span class="gallery-arrow mod-prev"><span class="slider-arrow-left"></span></span>',
		nextArrow: '<span class="gallery-arrow mod-next"><span class="slider-arrow-right"></span></span>'
	});
});

$(document).ready(function(){

	$('.js-gallery-mobile').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		draggable:false,
		prevArrow: '<span class="gallery-arrow mod-prev"><span class="slider-arrow-left"></span></span>',
		nextArrow: '<span class="gallery-arrow mod-next"><span class="slider-arrow-right"></span></span>'
	});

	$('.js-gallery-mobile').slickLightbox({
		itemSelector: 'a.open-lightbox',
		background: '#fff',
    layouts: {
      closeButton: '<button class="lightbox-close-btn"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="1" y="20.9219" width="28.1734" height="2.34779" transform="rotate(-45 1 20.9219)" fill="#F8F400"/><rect width="28.1734" height="2.34779" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 22.5818 20.9219)" fill="#F8F400"/></svg></button>'
   }
		});
	});
/* lightbox gallery end*/

$(window).on("load",function() {
    $(window).scroll(function() {
      var windowBottom = $(this).scrollTop() + $(this).innerHeight();
      $(".button-burst").each(function() {
        var objectBottom = $(this).offset().top - 30;
        if (objectBottom < windowBottom && objectBottom + 860 > windowBottom ) { 
          if ($(this).css("opacity")==0)  {
            $(this).addClass('moveup');
            $('.sticky-button').addClass('sticky-button-visible');
          }
        } else { 
          if ($(this).css("opacity")==1)  {
            $(this).removeClass('moveup');
            $('.sticky-button').removeClass('sticky-button-visible');
          }
        }
      });
    }).scroll(); 
});

//home

$(document).ready(function(){
    function changeColor(selector, colors, time) {
        var curCol = 0,
            timer = setInterval(function () {
                if (curCol === colors.length) curCol = 0;
                $(selector).css("background-color", colors[curCol]);
                curCol++;
            }, time);
    }
    $(window).on("load",function() {
        changeColor(".home .site-container--overlay", ["#F8F400", "#008D36", "#D2277C"], 6000);
    });
});


  window.addEventListener("load", function() {
    const ele = $('body.home');
    let cnt = 1;
    setInterval(function() {
      ele.removeClass("banner-" + cnt);
      cnt++;
      if (cnt > 3) cnt = 1;
      ele.addClass("banner-" + cnt);
    }, 6000);
  });

$(window).on("load",function() {
  $(window).scroll(function() {
    var windowBottom = $(this).scrollTop() + $(this).innerHeight();
    $(".scroll-reveal").each(function() {
      var objectBottom = $(this).offset().top - 30;
      if (objectBottom < windowBottom) { 
        if ($(this).css("opacity")==0)  {$(this).addClass('moveup');}
      } else { 
        if ($(this).css("opacity")==1)  {$(this).removeClass('moveup');}
      }
    });
  }).scroll(); 
});


$(window).on("load",function() {
  $(window).scroll(function() {
    var windowBottom = $(this).scrollTop() + $(this).innerHeight();
    $(".scroll-trigger").each(function() {
      var objectBottom = $(this).offset().top;
      if (objectBottom < windowBottom) { 
        if ($(this).css("opacity")==0)  {$(this).addClass('moveupcol');}
      } else { 
        if ($(this).css("opacity")==1)  {$(this).removeClass('moveupcol');}
      }
    });
  }).scroll(); 
});

// window.history.pushState("object or string", "Title", "/new-url");


/* voting subtitle change */
/* if ( $('.count-box').attr('data-ulike-counter-value') == 0 ) {
  $(".votes-subtext").html("Stimmen");
} else if ( $('.count-box').attr('data-ulike-counter-value') == 1 ){
  $(".votes-subtext").html("Stimme");
}else{
  $(".votes-subtext").html("Stimmen");
} */

/* homepage cards - mobile */

$( document ).ready(function() {

  $(window).on("resize", function (e) {
    checkScreenSize();
});

checkScreenSize();

function checkScreenSize(){
    var newWindowWidth = $(window).width();
    if (newWindowWidth < 768) {
      $('.has-background .wp-block-columns .wp-block-column:nth-child(3)').addClass("spanAdded");
      $('.spanAdded').wrap('<span class="span-wraper"></span>');
    }
    else
    { }
}
});

/* smooth scroll */
var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 500
});



$("input[type='checkbox']").change(function() {
    if(this.checked) {
      $(this).attr( 'checked', 'checked' );
      $(this).parent().addClass('checked');
    }else{
      $(this).removeAttr( 'checked', 'checked' );
      $(this).parent().removeClass('checked');
    }
});