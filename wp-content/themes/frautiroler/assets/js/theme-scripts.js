$(document).ready(function () {
    $('body').removeClass('overflow-hidden');
    $('.gb-container-content').addClass('banner-slider');
    $('.gb-container-content .one-column:nth-child(1)').addClass('pink');
    $('.gb-container-content .one-column:nth-child(2)').addClass('yellow');
 	$('.gb-container-content .one-column:nth-child(3)').addClass('green');

 	$('.banner-slider').slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000
	});
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

