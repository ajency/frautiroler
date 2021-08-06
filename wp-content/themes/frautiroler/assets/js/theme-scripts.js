$('#button').click(function(){
    $(".post-content-right .wp_ulike_btn").click();
})
$('#button2').click(function(){
    $(".post-content-right .wp_ulike_btn").click();
})

$(document).ready(function () {
  $('body').removeClass('overflow-hidden');
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




jQuery.validator.addMethod("phone_regex", function(value, element) {
    return this.optional(element) || /^[0-9\.\-_]{10,30}$/i.test(value);
}, "Phone Number with only 0-9. Minlength: 10");
$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');
$("#project-submission").validate({
    rules: {
        'email': {
            required: true,
            email: true
        },
        'phone': {
            required: true,
            phone_regex: true,
            minlength: 10
        }
    },

    messages: {

        'mitgliedsnummer': { required: "Bitte ausfüllen" },
        'vorname': { required: "Bitte ausfüllen" },
        'nachname': { required: "Bitte ausfüllen" },
        'nummer': { required: "Bitte ausfüllen" },
        'plz-ort': { required: "Bitte ausfüllen" },
        'phone': { required: "Bitte ausfüllen" },
        'email': { required: "Bitte ausfüllen" },
        'project': { required: "Bitte ausfüllen" },
        'detail': { required: "Bitte ausfüllen" },
        'projektkosten': { required: "Bitte ausfüllen" },
        'myfile': { required: "Bitte mindestens 1 Bild hochladen" },
        'legal' : {required: "Bitte ankreuzen"},
        'condition' : {required: ""}

    },
    submitHandler: function(form) {
        form.submit();
    }
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
		prevArrow: '<span class="gallery-arrow mod-prev"><i class="fas fa-chevron-left"></i></span>',
		nextArrow: '<span class="gallery-arrow mod-next"><i class="fas fa-chevron-right"></i></span>'
	});
});

$(document).ready(function(){

	$('.js-gallery-mobile').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		draggable:false,
		prevArrow: '<span class="gallery-arrow mod-prev"><i class="fas fa-chevron-left"></i></span>',
		nextArrow: '<span class="gallery-arrow mod-next"><i class="fas fa-chevron-right"></i></span>'
	});

	$('.js-gallery-mobile').slickLightbox({
		itemSelector: 'a.open-lightbox',
		background: '#fff'
		});
	});


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
        changeColor(".home .site-container--overlay", ["#F8F400", "#008D36", "#D2277C"], 5000);
    });
});


  window.addEventListener("load", function() {
    const ele = document.querySelector('.home');
    let cnt = 1;
    setInterval(function() {
      ele.classList.remove("banner-" + cnt);
      cnt++;
      if (cnt > 3) cnt = 1;
      ele.classList.add("banner-" + cnt);
      ele.classList.toggle("active", !ele.classList.contains("banner-1"));
    }, 5000);
  });