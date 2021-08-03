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
            <div class="container">

<!-- project details -->
<?php while ( have_posts() ) : the_post(); ?>

                <div class="row project-details">
                    <div class="section-top">
                        <div class="post-content-left">
                                <div class="content-first">
                                    <div class="project-votes">94 <i class="fas fa-heart heart"></i></div>
                                    <h1 class="post-title"><?php the_title(); ?></h1>
                                    <h5 class="post-author"><?php the_author(); ?></h5>
                                    <div class="post-content"><?php the_content(); ?></div>
                                </div>

                                <div class="section-bottom">
                                    <div class="wrapper">
                                        <input checked type=radio name="slider" id="slide1" />
                                        <input type=radio name="slider" id="slide2" />
                                        <input type=radio name="slider" id="slide3" />
                                        <input type=radio name="slider" id="slide4" />
                                        <input type=radio name="slider" id="slide5" />

                                        <div class="slider-wrapper">
                                            <div class="inner">
                                            <article>
                                                <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_960_720.jpg" />
                                            </article>

                                            <article>
                                                <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_960_720.jpg" />
                                            </article>

                                            <article>
                                                <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_960_720.jpg" />
                                            </article>

                                            <article>
                                                <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_960_720.jpg" />
                                            </article>

                                            <article>
                                                <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_960_720.jpg" />
                                            </article>
                                            </div>
                                            <!-- .inner -->
                                        </div>
                                        <!-- .slider-wrapper -->

                                        <div class="slider-prev-next-control">
                                            <label for=slide1></label>
                                            <label for=slide2></label>
                                            <label for=slide3></label>
                                            <label for=slide4></label>
                                            <label for=slide5></label>
                                        </div>
                                        <!-- .slider-prev-next-control -->
                                    </div>
                                </div>
                        </div>
                        <div class="post-content-right">
                            <div class="votes">29</div>
                            <div class="votes-subtext">STimmen</div>
                            <button class="custom-button">Jetzt abstimmen</button>
                            <div class="social-share">
                                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Social share") ) : ?><?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
<?php endwhile; ?>
<!-- project details end-->
<!-- other projects -->

<?php $allPostsWPQuery = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>3));

    if ( $allPostsWPQuery->have_posts() ) :?>

                <div class="row projects">
                    <div class="section-title">Weitere Projekte</div>
                    <div class="project-list">
                    <?php while ( $allPostsWPQuery->have_posts() ) : $allPostsWPQuery->the_post(); ?>
                        <div class="project-item" style="cursor:pointer;">
                            <div class="project-image" style="cursor:pointer;">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
                                <div class="overlay"></div>
                            </div>
                            <div class="project-votes tooltip" data-content="Abstimmen">94 <i class="fas fa-heart heart"></i></div>
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
get_footer();
?>