$('#button').click(function(){
    $(".post-content-right .wp_ulike_btn").click();
})
$('#button2').click(function(){
    $(".post-content-right .wp_ulike_btn").click();
})

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


//confettie 
// ammount to add on each button press
const confettiCount = 20
const sequinCount = 10

// "physics" variables
const gravityConfetti = 0.3
const gravitySequins = 0.55
const dragConfetti = 0.075
const dragSequins = 0.02
const terminalVelocity = 3

// init other global elements

const button = document.getElementById('button')
const button1 = document.getElementById('button2')
var disabled = false
const canvas = document.getElementById('canvas')
const ctx = canvas.getContext('2d')
canvas.width = window.innerWidth
canvas.height = window.innerHeight
let cx = ctx.canvas.width / 2
let cy = ctx.canvas.height / 2

// add Confetto/Sequin objects to arrays to draw them
let confetti = []
let sequins = []

// colors, back side is darker for confetti flipping
const colors = [
  { front : '#D2277C', back: '#A31E60' }, // Purple
  { front : '#008D36', back: '#00BF49' }, // Green
  { front : '#F8F400', back: '#FFFBC5' }  // Yellow
]

// helper function to pick a random number within a range
randomRange = (min, max) => Math.random() * (max - min) + min

// helper function to get initial velocities for confetti
// this weighted spread helps the confetti look more realistic
initConfettoVelocity = (xRange, yRange) => {
  const x = randomRange(xRange[0], xRange[1])
  const range = yRange[1] - yRange[0] + 1
  let y = yRange[1] - Math.abs(randomRange(0, range) + randomRange(0, range) - range)
  if (y >= yRange[1] - 1) {
    // Occasional confetto goes higher than the max
    y += (Math.random() < .25) ? randomRange(1, 3) : 0
  }
  return {x: x, y: -y}
}

// Confetto Class
function Confetto() {
  this.randomModifier = randomRange(0, 99)
  this.color = colors[Math.floor(randomRange(0, colors.length))]
  this.dimensions = {
    x: randomRange(5, 9),
    y: randomRange(8, 15),
  }
  this.position = {
    x: randomRange(canvas.width/2 - button.offsetWidth/4, canvas.width/2 + button.offsetWidth/4),
    y: randomRange(canvas.height/2 + button.offsetHeight/2 + 8, canvas.height/2 + (1.5 * button.offsetHeight) - 8),
  }
  this.rotation = randomRange(0, 2 * Math.PI)
  this.scale = {
    x: 1,
    y: 1,
  }
  this.velocity = initConfettoVelocity([-9, 9], [6, 11])
}
Confetto.prototype.update = function() {
  // apply forces to velocity
  this.velocity.x -= this.velocity.x * dragConfetti
  this.velocity.y = Math.min(this.velocity.y + gravityConfetti, terminalVelocity)
  this.velocity.x += Math.random() > 0.5 ? Math.random() : -Math.random()
  
  // set position
  this.position.x += this.velocity.x
  this.position.y += this.velocity.y

  // spin confetto by scaling y and set the color, .09 just slows cosine frequency
  this.scale.y = Math.cos((this.position.y + this.randomModifier) * 0.09)    
}

// Sequin Class
function Sequin() {
  this.color = colors[Math.floor(randomRange(0, colors.length))].back,
  this.radius = randomRange(1, 2),
  this.position = {
    x: randomRange(canvas.width/2 - button.offsetWidth/3, canvas.width/2 + button.offsetWidth/3),
    y: randomRange(canvas.height/2 + button.offsetHeight/2 + 8, canvas.height/2 + (1.5 * button.offsetHeight) - 8),
  },
  this.velocity = {
    x: randomRange(-6, 6),
    y: randomRange(-8, -12)
  }
}
Sequin.prototype.update = function() {
  // apply forces to velocity
  this.velocity.x -= this.velocity.x * dragSequins
  this.velocity.y = this.velocity.y + gravitySequins
  
  // set position
  this.position.x += this.velocity.x
  this.position.y += this.velocity.y   
}

// add elements to arrays to be drawn
initBurst = () => {
  for (let i = 0; i < confettiCount; i++) {
    confetti.push(new Confetto())
  }
  for (let i = 0; i < sequinCount; i++) {
    sequins.push(new Sequin())
  }
}

// draws the elements on the canvas
render = () => {
  ctx.clearRect(0, 0, canvas.width, canvas.height)
  
  confetti.forEach((confetto, index) => {
    let width = (confetto.dimensions.x * confetto.scale.x)
    let height = (confetto.dimensions.y * confetto.scale.y)
    
    // move canvas to position and rotate
    ctx.translate(confetto.position.x, confetto.position.y)
    ctx.rotate(confetto.rotation)

    // update confetto "physics" values
    confetto.update()
    
    // get front or back fill color
    ctx.fillStyle = confetto.scale.y > 0 ? confetto.color.front : confetto.color.back
    
    // draw confetto
    ctx.fillRect(-width / 2, -height / 2, width, height)
    
    // reset transform matrix
    ctx.setTransform(1, 0, 0, 1, 0, 0)

    // clear rectangle where button cuts off
    if (confetto.velocity.y < 0) {
      ctx.clearRect(canvas.width/2 - button.offsetWidth/2, canvas.height/2 + button.offsetHeight/2, button.offsetWidth, button.offsetHeight)
    }
  })

  sequins.forEach((sequin, index) => {  
    // move canvas to position
    ctx.translate(sequin.position.x, sequin.position.y)
    
    // update sequin "physics" values
    sequin.update()
    
    // set the color
    ctx.fillStyle = sequin.color
    
    // draw sequin
    ctx.beginPath()
    ctx.arc(0, 0, sequin.radius, 0, 2 * Math.PI)
    ctx.fill()

    // reset transform matrix
    ctx.setTransform(1, 0, 0, 1, 0, 0)

    // clear rectangle where button cuts off
    if (sequin.velocity.y < 0) {
      ctx.clearRect(canvas.width/2 - button.offsetWidth/2, canvas.height/2 + button.offsetHeight/2, button.offsetWidth, button.offsetHeight)
    }
  })

  // remove confetti and sequins that fall off the screen
  // must be done in seperate loops to avoid noticeable flickering
  confetti.forEach((confetto, index) => {
    if (confetto.position.y >= canvas.height) confetti.splice(index, 1)
  })
  sequins.forEach((sequin, index) => {
    if (sequin.position.y >= canvas.height) sequins.splice(index, 1)
  })

  window.requestAnimationFrame(render)
}

//cycle through button states when clicked
clickButton = () => {
  if (!disabled) {
    disabled = true
    // Loading stage
    button.classList.add('loading')
    button.classList.remove('ready')
    setTimeout(() => {
      // Completed stage
      button.classList.add('complete')
      button.classList.remove('loading')
      setTimeout(() => {
        window.initBurst()
      }, 320)
    }, 1800)
  }else{
  // Reset button so user can select it again
  disabled = false
  button.classList.add('ready')
  button.classList.remove('complete')
  }
}


// cycle through button states when clicked
clickStickyButton = () => {
  if (!disabled) {
    disabled = true
    // Loading stage
    button1.classList.add('loading')
    button1.classList.remove('ready')
    setTimeout(() => {
      // Completed stage
      button1.classList.add('complete')
      button1.classList.remove('loading')
      setTimeout(() => {
        window.initBurst()
      }, 320)
    }, 1800)
  }else{
  // Reset button so user can select it again
  disabled = false
  button1.classList.add('ready')
  button1.classList.remove('complete')
  }
}


// re-init canvas if the window size changes
resizeCanvas = () => {
  canvas.width = window.innerWidth
  canvas.height = window.innerHeight
  cx = ctx.canvas.width / 2
  cy = ctx.canvas.height / 2
}

// resize listenter
window.addEventListener('resize', () => {
  resizeCanvas()
})

// click button on spacebar or return keypress
document.body.onkeyup = (e) => {
  if (e.keyCode == 13 || e.keyCode == 32) {
    clickButton()
  }
}

// Set up button text transition timings on page load
textElements = button.querySelectorAll('.button-text')
textElements.forEach((element) => {
  characters = element.innerText.split('')
  let characterHTML = ''
  characters.forEach((letter, index) => {
    characterHTML += `<span class="char${index}" style="--d:${index * 30}ms; --dr:${(characters.length - index - 1) * 30}ms;">${letter}</span>`
  })
  element.innerHTML = characterHTML
})

textElements1 = button1.querySelectorAll('.button-text')
textElements1.forEach((element) => {
  characters1 = element.innerText.split('')
  let characterHTML1 = ''
  characters1.forEach((letter, index) => {
    characterHTML1 += `<span class="char${index}" style="--d:${index * 30}ms; --dr:${(characters1.length - index - 1) * 30}ms;">${letter}</span>`
  })
  element.innerHTML = characterHTML1
})

// kick off the render loop
render()



$(window).on("load",function() {
  $(window).scroll(function() {
    var windowBottom = $(this).scrollTop() + $(this).innerHeight();
    $(".button-burst").each(function() {
      var objectBottom = $(this).offset().top - 30;
      if (objectBottom < windowBottom && objectBottom + 860 > windowBottom ) { 
        if ($(this).css("opacity")==0)  {
          $(this).addClass('moveup');
          $('.sticky-button').fadeOut(300);
        }
      } else { 
        if ($(this).css("opacity")==1)  {
          $(this).removeClass('moveup');
          $('.sticky-button').fadeIn(300);
        }
      }
    });
  }).scroll(); 
});

