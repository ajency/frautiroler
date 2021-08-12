<?php 

//* Template Name: Archive

get_header();


?>
<div class="process-block display-mobile">
	<div class="marquee3k news services prelative pr left is-init">
		<div class="marquee3k__wrapper">
			<div class="marquee3k-wrapper marquee3k__copy">
				<div class="marquee-text news">
					<span> Projekt Einreichen&nbsp;</span> 
				</div>
			</div>
			<div class="marquee3k-wrapper marquee3k__copy">
				<div class="marquee-text news">
					<span> Projekt Einreichen&nbsp;</span>
				</div>
			</div>
			<div class="marquee3k-wrapper marquee3k__copy">
				<div class="marquee-text news">
					<span> Projekt Einreichen&nbsp;</span>
				</div>
			</div>
            <div class="marquee3k-wrapper marquee3k__copy">
                <div class="marquee-text news">
                    <span> Projekt Einreichen&nbsp;</span>
                </div>
            </div>
		</div>
	</div>
</div>
 
<?php if ( have_posts() ) : ?>

    <div class="custom_archive_page">
        <div class="container">

        <!-- Projects -->

        <?php

        if( wp_is_mobile() ) {
            $posts_per_page = 4;
        } else{
            $posts_per_page = 9;
        }
        
        $allPostsWPQuery = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'post__not_in' => array( get_the_ID() ), 'posts_per_page'=> $posts_per_page));

        if ( $allPostsWPQuery->have_posts() ) :?>

            <div class="row projects" style="position: relative;"> 
                <div class="section-title">
                    <span><?php the_field('page_title'); ?></span>
                    <div class="title-underline">
                        <svg width="278" height="13" viewBox="0 0 278 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M229.676 2.9762C219.803 2.89856 210.577 2.79351 201.333 2.75971C177.82 2.68116 154.296 2.54415 130.789 2.60169C102.933 2.6702 75.1249 2.96707 47.6074 3.71243C36.0141 4.02757 24.3319 4.20933 12.5251 4.13991C6.22418 4.10337 1.64386 3.61743 0.225852 2.79077C-0.515782 2.35506 0.581796 1.96868 3.44747 1.87733C11.7538 1.6033 20.0601 1.32379 28.4316 1.12192C73.9205 0.0257998 119.765 -0.0655436 165.652 0.0257998C185.112 0.0632507 204.608 0.117151 224.009 0.31902C237.062 0.458775 250.073 0.820491 262.948 1.20505C270.115 1.4197 275.408 2.13401 277.644 3.28128C278.6 3.77819 277.698 4.10338 274.358 4.24679C270.955 4.40608 267.483 4.52818 263.969 4.61216C255.864 4.78297 247.659 4.85513 239.643 5.06888C225.16 5.458 210.69 5.87909 196.332 6.37325C185.759 6.73863 175.4 7.24467 164.928 7.67764C153.726 8.14075 142.453 8.56459 131.305 9.05419C118.442 9.61961 105.68 10.2417 92.8766 10.8354C92.3467 10.8749 91.8387 10.921 91.3578 10.9733L117.362 10.7185C142.625 10.4718 167.894 10.2891 193.205 10.5422C199.411 10.6043 205.605 10.7029 211.793 10.8043C213.389 10.8308 214.938 10.9322 217.056 11.0217C211.597 11.6474 205.813 11.6885 200.07 11.7086C178.829 11.7844 157.583 11.8182 136.348 11.9206C122.625 11.9872 108.914 12.1242 95.2143 12.2722C90.812 12.3197 86.4986 12.5463 82.0904 12.6148C74.4248 12.7299 66.7237 12.7819 59.0345 12.865C57.8512 12.8737 56.6745 12.8972 55.5161 12.9354C51.3155 13.0916 47.109 12.9564 45.7503 12.6084C43.5313 12.042 44.0178 11.1606 47.8209 10.7422C52.7395 10.1996 58.008 9.67441 63.6385 9.35745C75.564 8.68607 87.7446 8.11426 99.9608 7.57534C111.91 7.0492 123.954 6.56508 136.081 6.1513C166.548 5.11089 197.085 4.11982 227.593 3.10682C228.305 3.07054 229.001 3.02689 229.676 2.9762Z" fill="black"/>
                            </g>
                            <defs>
                            <clipPath id="clip0">
                            <rect width="278" height="13" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <p class="subtitle">
                        <span><?php the_field('subtitle'); ?></span>
                    </p>
                </div>
                <div class="project-list">
                    <?php while ( $allPostsWPQuery->have_posts() ) : $allPostsWPQuery->the_post(); 
                        $imageFeatured = get_field('image_1'); ?>
                        <div class="project-item" style="cursor:pointer;">
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
                <?php $total = wp_count_posts()->publish; ?>
                <div class="load-more load-more-mob d-sm"><?php  echo do_shortcode( '[ajax_load_more post_type="post" posts_per_page="6" offset="4" pause="true" scroll="false" button_label="Mehr anzeigen"]' ); ?></div>

                <div class="load-more load-more-desk d-md"><?php  echo do_shortcode( '[ajax_load_more post_type="post" posts_per_page="6" offset="9" pause="true" scroll="false" button_label="Mehr anzeigen"]' ); ?></div>
                
            </div>

		<!-- projects end -->

        <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <!-- empty state starts-->
                <div class="empty-state">
                    <div class="left-section">
                        <h1 class="section-title">Aktuell wurden noch keine Projekte eingereicht.</h1>
                        <p class="subtitle">Hier findest du alle Informationen zu den <a href="#">Teilnahmebedinungen</a> und <a href="#">Regeln</a>. Wir freuen uns auf deine Einreichung.</p>
                        <a class="text-link-large" href="#">Jetzt einreichen</a>
                    </div>
                    <div class="right-section">
                        <svg width="601" height="121" viewBox="0 0 601 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M305.087 69.4182C317.805 76.9733 331.835 81.4244 345.746 86.7616C350.93 78.6994 358.746 73.229 366.747 67.9482C368.222 66.9699 369.579 65.7969 371.121 64.9466C373.979 63.369 376.996 64.4344 379.829 64.9876C380.72 65.1566 381.734 66.9135 381.949 68.0609C383.368 75.6518 382.927 83.2939 382.492 90.9617C382.139 97.057 382.42 103.188 382.42 109.478C385.171 110.374 388.633 109.632 391.722 112.177C390.513 112.715 389.755 113.274 388.941 113.376C384.152 113.991 379.357 114.554 374.553 115.025C364.821 115.988 355.089 116.997 345.316 117.781C332.757 118.805 320.187 119.702 307.602 120.409C302.418 120.63 297.226 120.555 292.051 120.183C290.382 120.086 288.768 118.964 287.129 118.314L287.242 117.407L290.259 115.87C287.841 109.985 287.99 103.746 287.733 97.5794C287.426 90.1166 288.425 82.7766 290.202 75.5545C290.561 74.0896 290.417 73.0395 289.178 71.9434C287.877 70.7653 286.899 69.2287 285.285 67.2362C287.938 66.1708 290.218 64.7571 292.661 64.3678C300.139 63.1898 307.674 62.3651 315.198 61.4739C328.838 59.8553 342.504 58.4621 356.257 59.8297C358.296 60.1117 360.243 60.8544 361.953 62.0014C358.879 62.2319 355.77 62.7032 352.682 62.6519C342.437 62.4829 332.618 64.8288 322.712 66.9955C317.057 68.2196 311.177 68.6243 305.087 69.4182ZM377.739 69.6846C377.163 69.9732 376.605 70.2965 376.069 70.6526C369.661 76.2101 363.233 81.7522 356.871 87.3609C355.058 88.9641 353.02 90.4341 352.876 93.2974C352.876 93.6867 351.432 94.4396 350.827 94.3218C348.179 93.7225 345.587 92.8671 342.985 92.0886C331.906 88.7848 320.791 85.5886 309.769 82.1159C305.026 80.6202 300.467 78.5304 295.688 76.666C292.932 89.4353 293.865 102.384 292.856 115.307L377.744 110.159L377.739 69.6846Z" fill="#D2277C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M477.737 7.9991C473.409 11.267 468.625 13.2185 463.713 14.8115C453.781 18.0281 443.69 20.7838 433.887 24.3283C425.732 27.2786 417.844 30.987 409.936 34.5725C403.677 37.4101 397.561 40.5602 391.404 43.613C390.579 44.0227 389.955 44.8423 389.125 45.2111C387.691 45.8462 386.128 46.7477 384.684 46.6401C383.501 46.5581 381.974 45.4006 381.426 44.3044C381.068 43.5822 381.857 41.7434 382.671 41.0622C386.42 37.8557 390.134 34.5161 394.272 31.8424C412.712 20.0616 433.118 13.3056 454.554 9.48961C460.844 8.36787 467.17 7.4664 473.506 6.50857C474.956 6.29344 476.549 5.86319 477.737 7.9991Z" fill="#D2277C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M262.625 56.039C244.759 53.1143 227.682 47.2085 210.323 42.3221C210.323 41.9481 210.369 41.5794 210.39 41.2106C211.261 40.9754 212.147 40.8042 213.043 40.6984C221.479 40.2169 229.326 43.0699 237.332 45.0265C242.121 46.1995 246.89 47.4493 252.186 48.7861C248.867 45.3287 243.397 45.298 241.486 40.1042C243.212 39.7969 244.861 39.0183 246.234 39.3564C249.438 40.1363 252.557 41.2292 255.546 42.6191C259.707 44.5669 263.753 46.7508 267.665 49.16C271.103 51.3234 274.389 53.7193 277.499 56.331C278.329 57.0122 278.718 58.6513 278.703 59.8447C278.703 61.5504 277.166 61.7911 275.722 61.9243C268.039 62.6567 260.356 63.6043 252.673 64.1165C249.943 64.2958 247.115 63.5787 244.39 63.0153C243.56 62.8463 242.91 61.827 241.829 60.905C248.616 57.2171 255.787 57.6473 262.625 56.039Z" fill="#D2277C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M584.143 13.9305C576.74 12.7012 569.339 11.4719 561.939 10.2426C558.958 9.73039 555.726 9.93016 553.8 6.85691C552.519 4.80807 552.776 3.9578 555.07 3.65048C561.949 2.74387 568.659 3.93731 575.272 5.69931C579.031 6.69812 582.724 7.94279 586.448 9.07989C586.581 8.8955 586.72 8.7111 586.853 8.52159C586.095 7.90181 585.316 7.29229 584.589 6.65203C583.016 5.28955 581.208 4.09098 579.979 2.46728C578.99 1.14578 579.518 -0.549638 581.572 0.172576C584.481 1.19699 587.626 2.25215 589.906 4.19342C593.491 7.26667 596.498 11.0263 599.638 14.5861C600.278 15.3083 600.565 16.4045 600.836 17.3777C601.266 18.9143 600.795 20.1897 599.12 20.497C593.363 21.5522 587.611 22.7149 581.802 23.3603C580.266 23.5344 578.217 22.3359 576.972 21.1834C574.98 19.2882 575.687 17.0857 578.345 16.1279C580.215 15.4671 582.187 15.1035 584.113 14.5913L584.143 13.9305Z" fill="#D2277C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 94.4445C3.81595 89.4607 8.2773 86.3106 12.923 83.3245C26.9166 74.325 41.9499 67.5792 57.7003 62.3495C62.9556 60.6029 68.1442 58.6565 73.4251 57.0174C75.6276 56.3311 78.0043 56.2133 80.299 55.8394C80.4065 56.0955 80.5141 56.3516 80.6165 56.6077C79.9353 57.2223 79.3514 58.0675 78.5677 58.4158C72.7951 60.9358 66.9303 63.2408 61.1885 65.8325C46.2832 72.5527 31.4155 79.3446 16.5853 86.2082C14.1267 87.3453 11.9754 89.138 9.54245 90.3468C6.66384 91.7759 3.63668 92.9028 0 94.4445Z" fill="#D2277C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M98.1748 52.6892C99.8548 51.4804 101.412 50.0309 103.235 49.1038C110.545 45.3749 118.479 43.8178 126.551 42.9573C141.359 41.349 156.167 39.7509 171.001 38.3474C174.704 37.9991 178.479 38.3935 182.223 38.5267C183.052 38.6419 183.866 38.8463 184.651 39.1362C184.687 39.3564 184.728 39.5818 184.769 39.8072C183.324 40.2118 181.906 40.7906 180.436 40.9955C160.362 43.828 140.263 46.471 120.215 49.4879C114.688 50.3228 109.341 52.3 103.876 53.5856C102.17 53.9903 100.347 53.9032 98.5743 54.0415L98.1748 52.6892Z" fill="#D2277C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M523.303 1.45825C530.438 2.00119 537.307 2.50829 544.165 3.09733C544.759 3.14855 545.297 3.77344 545.866 4.12174C545.272 4.49566 544.713 5.14616 544.088 5.21275C535.217 6.18595 526.33 7.02084 517.454 8.0094C510.283 8.80845 503.142 9.98141 495.941 10.5704C493.482 10.7651 490.88 9.7714 488.422 9.03382C487.812 8.85455 487.105 7.57403 487.182 6.88767C487.254 6.28326 488.299 5.5047 489.036 5.32031C491.99 4.50732 494.997 3.90482 498.036 3.51734C506.528 2.71317 515.021 2.12412 523.303 1.45825Z" fill="#D2277C"/>
                        </svg>
                    </div>
                </div>
            <!-- empty state end-->
        <?php endif; ?>

        </div>
    </div>

 <?php else : ?>
<?php endif; ?>


<?php get_footer(); ?>