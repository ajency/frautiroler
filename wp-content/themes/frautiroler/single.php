<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

// This file handles single entries, but only exists for the sake of child theme forward compatibility.
/* genesis(); */

get_header();  ?>
 
<?php if ( have_posts() ) : ?>

    <div class="custom_single_post_page">
        <div class="container content">
        <!-- project details -->
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="row project-details">
                    <div class="section-top">
                        <div class="post-content-left">
                            <div class="content-first">
                                <div class="project-votes tooltip" data-content="Abstimmen">
                                    <?php  echo do_shortcode( '[wp_ulike for="post" style="wpulike-heart"]' ); ?>
                                </div>
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                <?php
                                  $author_firstname = get_field('vorname');
                                  $author_lastname = get_field('nachname');
                                ?>
                                <h5 class="post-author"><?php echo "von ".$author_firstname." ".substr($author_lastname, 0,1)."."; ?></h5>
                                <div class="post-content"><?php the_content(); ?></div>
                            </div>
                            <div class="section-bottom">
                                    <?php
                                            $image1 = get_field('image_1');
                                            $image2 = get_field('image_2');
                                            $image3 = get_field('image_3');
                                            $image4 = get_field('image_4');
                                            $image5 = get_field('image_5');
                                    ?>
                                    <div class="gallery js-gallery">
                                        <?php if (!empty($image1)){ ?>
                                        <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                            <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" class="gallery-img"/>
                                            </div>
                                        </div>
                                        <?php } else {} if (!empty($image2)){?>
                                        <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                            <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" class="gallery-img"/>
                                            </div>
                                        </div>
                                        <?php } else {} if (!empty($image3)){?>
                                        <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                            <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" class="gallery-img"/>
                                            </div>
                                        </div>
                                        <?php } else {} if (!empty($image4)){?>
                                        <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                            <img src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>" class="gallery-img"/>
                                            </div>
                                        </div>
                                        <?php } else {} if (!empty($image5)){?>
                                        <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                            <img src="<?php echo esc_url($image5['url']); ?>" alt="<?php echo esc_attr($image5['alt']); ?>" class="gallery-img"/>
                                            </div>
                                        </div>
                                        <?php } else {}?>
                                    </div>
                                    <div class="gallery js-gallery-mobile">
                                        <?php if (!empty($image1)){ ?>
                                        <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                                <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" class="gallery-img"/>
                                                <a href="<?php echo esc_url($image1['url']); ?>" class="lightbox-btn open-lightbox">Bilder</a>
                                            </div>
                                        </div>
                                        <?php } else {} if (!empty($image2)){?>
                                        <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                                <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" class="gallery-img"/>
                                                <a href="<?php echo esc_url($image2['url']); ?>" class="lightbox-btn open-lightbox">Bilder</a>
                                            </div>
                                        </div>
                                        <?php } else {} if (!empty($image3)){?>
                                            <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                                <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" class="gallery-img"/>
                                                <a href="<?php echo esc_url($image3['url']); ?>" class="lightbox-btn open-lightbox">Bilder</a>
                                            </div>
                                        </div>
                                        <?php } else {} if (!empty($image4)){?>
                                            <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                                <img src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>" class="gallery-img"/>
                                                <a href="<?php echo esc_url($image4['url']); ?>" class="lightbox-btn open-lightbox">Bilder</a>
                                            </div>
                                        </div>
                                        <?php } else {} if (!empty($image5)){?>
                                            <div class="gallery-item">
                                            <div class="gallery-img-holder js-gallery-popup">
                                                <img src="<?php echo esc_url($image5['url']); ?>" alt="<?php echo esc_attr($image5['alt']); ?>" class="gallery-img"/>
                                                <a href="<?php echo esc_url($image5['url']); ?>" class="lightbox-btn open-lightbox">Bilder</a>
                                            </div>
                                        </div>
                                        <?php } else {}?>
                                    </div>
                                </div>
                        </div>
                        <div class="post-content-right">
                            <?php  echo do_shortcode( '[wp_ulike for="post" style="wpulike-heart"]' ); ?>
                            <div class="button-burst">
                                <button id="button" class="ready" onclick="clickButton();">
                                    <div class="message submitMessage">
                                        <span class="button-text">Jetzt abstimmen</span>  
                                    </div>

                                    <div class="message loadingMessage">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 17">
                                            <circle class="loadingCircle" cx="2.2" cy="10" r="1.6"/>
                                            <circle class="loadingCircle" cx="9.5" cy="10" r="1.6"/>
                                            <circle class="loadingCircle" cx="16.8" cy="10" r="1.6"/>
                                        </svg>
                                    </div>

                                    <div class="message successMessage">
                                        <span class="button-text">Danke!</span>
                                    </div>
                                </button>
                                <canvas id="canvas"></canvas>  
                            </div>
                            <div class="votes-subtext">Stimme(n)</div>

                            
                            <div class="social-share">
                                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Social share") ) : ?><?php endif;?>
                                  <svg width="137" style="margin-left:70px;" height="26" viewBox="0 0 137 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0.249512 14.5106C1.45682 14.1348 2.586 13.66 3.83112 13.4099C20.5772 10.1079 37.5148 7.25391 54.8506 5.44877C67.5186 4.12898 80.221 2.93972 92.9578 1.88095C102.997 1.06641 113.105 0.626922 123.229 0.564838C124.92 0.552258 126.601 0.239346 128.292 0.0931112C128.975 0.0333592 129.734 -0.064144 130.357 0.0600773C132.141 0.40601 134.026 0.689054 135.166 1.7583C135.349 1.93074 135.507 2.11278 135.64 2.30235C136.744 3.89207 136.628 4.5698 132.945 4.78993C131.94 4.82406 130.939 4.89653 129.948 5.00693C116.481 6.89384 103.148 9.07792 89.976 11.6583C86.9867 12.2432 83.8966 12.6269 80.9023 13.1945C77.6559 13.8078 74.4222 14.4666 71.2464 15.2119C62.6767 17.2183 54.15 19.2798 45.6055 21.3224C45.4027 21.3658 45.2312 21.4527 45.1216 21.5677C56.3024 20.4214 67.506 19.5235 78.8229 19.2311C95.6648 18.8065 111.062 19.0093 112.726 19.7531C110.795 20.5629 108.663 20.8176 106.45 20.9104C94.7297 21.3963 83.0094 21.9985 71.2867 22.3256C60.9905 22.618 51.022 24.0159 40.9855 25.2471C38.3138 25.5742 35.5866 25.7299 32.8847 25.9689C31.322 26.1072 30.1273 25.6968 29.3686 24.9028C28.5167 24.0112 28.3176 23.0159 29.1317 22.0598C29.3837 21.7705 29.976 21.5472 30.4902 21.4041C34.8985 20.1855 39.3119 18.9527 43.753 17.8002C49.8576 16.2277 56.0075 14.704 62.1525 13.1678C66.3944 12.108 70.6213 11.0246 74.896 10.0229C79.4329 8.95369 84.0201 7.96151 88.5847 6.93315C89.0802 6.83452 89.5299 6.66239 89.8954 6.43153C89.7311 6.40358 89.5615 6.38982 89.3913 6.39065C79.9218 7.25234 70.4423 8.07944 60.9855 8.99616C45.8122 10.4679 30.9918 12.8895 16.3579 15.7387C14.4776 16.1035 12.5772 16.4667 10.6288 16.6491C8.61247 16.8378 6.5129 16.9825 4.5192 16.8158C2.64397 16.6664 1.02078 15.973 0.249512 14.5106Z" fill="black"></path>
</svg>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <!-- project details end-->


        <!-- other projects -->

        <?php $allPostsWPQuery = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'post__not_in' => array( get_the_ID() ), 'posts_per_page'=>3));

        if ( $allPostsWPQuery->have_posts() ) :?>
        

            <div class="row projects" style="position: relative;"> 
                <div class="section-title">Weitere Projekte</div>
                <div class="project-list">
                    <?php while ( $allPostsWPQuery->have_posts() ) : $allPostsWPQuery->the_post();
                        $imageFeatured = get_field('image_1'); ?>
                     
                        <div class="project-item" onclick="window.location.href='<?php the_permalink(); ?>';" style="cursor:pointer;">
                            <div class="project-image" style="cursor:pointer;">
                                <a href="<?php the_permalink(); ?>"> 
                                    <img src="<?php echo esc_url($imageFeatured['url']); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                                </a>
                                <a href="<?php the_permalink(); ?>"><div class="overlay"></div></a>
                            </div>

                            <div class="project-votes tooltip" data-content="Abstimmen"><?php  echo do_shortcode( '[wp_ulike]' ); ?></div>
                            <div class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <div class="project-description"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <!-- other projects end-->

        </div>
    </div>

 <?php else : ?>
    <p><?php _e( 'There no posts to display.' ); ?></p>
<?php endif; ?>



<?php
    get_template_part( 'page-templates/sticky-button' ); 
?>  

<script type="text/javascript">
    
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

/*     function changeSubtitle() {
      if ( $('.count-box').attr('data-ulike-counter-value') == 0 ) {
        $(".votes-subtext").html("Stimmen");
      } else if ( $('.count-box').attr('data-ulike-counter-value') == 1 ){
        $(".votes-subtext").html("Stimme");
      }else{
        $(".votes-subtext").html("Stimmen");
      }
    } */

    //cycle through button states when clicked
    clickButton = () => {
      setTimeout(() => {
        /* changeSubtitle() */
      }, 320);
      if (!disabled) {
        disabled = true
        // Loading stage
        button.classList.add('loading')
        button.classList.remove('ready')

        button1.classList.add('loading')
        button1.classList.remove('ready')

        setTimeout(() => {
          // Completed stage
          /* changeSubtitle() */
          button.classList.add('complete')
          button.classList.remove('loading')

          button1.classList.add('complete')
          button1.classList.remove('loading')
          setTimeout(() => {
            window.initBurst()
          }, 320)
        }, 1800)
      }else{
      // Reset button so user can select it again
      disabled = false
      button.classList.add('ready')
      button.classList.remove('complete')

      button1.classList.add('ready')
      button1.classList.remove('complete')
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

</script>
<?php

    get_footer();
?>