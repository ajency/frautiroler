<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style( // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- see https://core.trac.wordpress.org/ticket/49742
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		null
	);

	wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}

}

add_filter( 'body_class', 'genesis_sample_body_classes' );
/**
 * Add additional classes to the body element.
 *
 * @since 3.4.1
 *
 * @param array $classes Classes array.
 * @return array $classes Updated class array.
 */
function genesis_sample_body_classes( $classes ) {

	if ( ! genesis_is_amp() ) {
		// Add 'no-js' class to the body class values.
		$classes[] = 'no-js';
	}
	return $classes;
}

add_action( 'genesis_before', 'genesis_sample_js_nojs_script', 1 );
/**
 * Echo the script that changes 'no-js' class to 'js'.
 *
 * @since 3.4.1
 */
function genesis_sample_js_nojs_script() {

	if ( genesis_is_amp() ) {
		return;
	}

	?>
	<script>
	//<![CDATA[
	(function(){
		var c = document.body.classList;
		c.remove( 'no-js' );
		c.add( 'js' );
	})();
	//]]>
	</script>
	<?php
}

add_filter( 'wp_resource_hints', 'genesis_sample_resource_hints', 10, 2 );
/**
 * Add preconnect for Google Fonts.
 *
 * @since 3.4.1
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function genesis_sample_resource_hints( $urls, $relation_type ) {

	if ( wp_style_is( genesis_get_theme_handle() . '-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = [
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		];
	}

	return $urls;
}

add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'genesis_sample_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'genesis-singular-images', 702, 526, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );

function my_child_theme_scripts() {
    wp_enqueue_style( 'parent-theme-css', get_stylesheet_directory_uri() . '/style.css' );
 	wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme-style.css', array(), '0.1', false);
 	wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css?ver=5.4.2', array(), '', false);
	wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', array(), '', false);
 	wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '', false);
	wp_enqueue_style('slick-lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css', array(), '', false);
}
//* this will bring in the Genesis Parent files needed:
include_once( get_template_directory() . '/lib/init.php' );

function enqueue_theme_scripts() { 
	global $wp_query;
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_stylesheet_directory_uri().'/assets/js/jquery.js' , '', '', true );
    wp_register_script( 'bootstrap', get_stylesheet_directory_uri().'/assets/js/bootstrap.min.js' , '', '', true );
    wp_register_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', '', '', true );
	wp_register_script( 'slick-lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js', '', '', true );
	wp_register_script( 'smoothScroll', 'https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@15.0.0/dist/smooth-scroll.polyfills.min.js', '', '', true );
    wp_register_script( 'themescripts', get_stylesheet_directory_uri().'/assets/js/theme-scripts.js' , '', '', true );
    wp_register_script( 'jquery-validate', 'https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js', '', '', true );
   	wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('slick');
	wp_enqueue_script('slick-lightbox');
	wp_enqueue_script('smoothScroll');
    wp_enqueue_script('jquery-validate'); 
    wp_enqueue_script('themescripts');  

}
add_action("wp_enqueue_scripts", "enqueue_theme_scripts");



/*
=============================================================
Read more link for excerpts
=============================================================
*/

function new_excerpt_more($more) {
	global $post;
	   return '… <a class="default-link read-more-link" href="'. get_permalink($post->ID) . '"><span>' . 'Mehr Info' . '</span></a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


	function wpdocs_custom_excerpt_length( $length ) {
		return 18;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/*
=============================================================
social share widget area
=============================================================
*/

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Social share',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

function fr_get_excerpt($limit) {
	$content = str_replace("[&hellip;]", "", get_the_content());
	if(strlen($content) > $limit){
		$limit_pos = strpos($content, " ", $limit);
		$excerpt = substr($content, 0, $limit_pos);
	}
	else{
		$excerpt = $content;
	}
	return $excerpt." ";
}

function wp_rand_posts() { 
 
	$args = array(
		'post_type' => 'post',
		'orderby'   => 'rand',
		'posts_per_page' => 6, 
	);
 
	$the_query = new WP_Query( $args );
 
	if ( $the_query->have_posts() ) {

	$string .= '<div class="project-list scroll-reveal">';
	    while ( $the_query->have_posts() ) {
	        $the_query->the_post();

		 	$image1 = get_field('image_1');
		 	$thumbnail =  $image1['url'];

	        $string .= '<div class="project-item" onclick="window.location.href='."'". get_permalink() ."'".';" style="cursor:pointer;">';
	        $string .= '<div class="project-image">';
	        $string .= '<a href="'. get_permalink() .'" alt="'. get_the_title() .'" title="'. get_the_title() .'">';
			$string .= '<img src="'. $thumbnail .'" alt="'. get_the_title() .'" title="'. get_the_title() .'"/>';
			$string .= '<div class="overlay"></div>';
			$string .='</a></div>';
			$string .= '<div class="project-votes tooltip" data-content="Abstimmen">' . do_shortcode( '[wp_ulike]' ) .'</div>';
	        $string .= '<div class="project-title"><a href="'. get_permalink() .'">'. get_the_title() .'</a></div>';
	        $string .= '<div class="project-description">';
	        $string .= '<p><a href="'. get_permalink() .'">'. fr_get_excerpt(140) .'</a>';
        	$string .= '<a class="default-link read-more-link" href="'. get_permalink() .'"><span>Mehr Info</span></a></p>';
	        $string .= '</div>';
	        $string .= '</div>';
	    }
	    $string .= '</div>';
	    /* Restore original Post Data */
	    wp_reset_postdata();
	} else {
 
		$string .= 'no posts found';
	}
 
	return $string; 
} 
 
add_shortcode('wp-random-posts','wp_rand_posts');
add_filter('widget_text', 'do_shortcode'); 

function wp_marquee() { ?>

	<div class="home process-block">
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
<?php } 
 
add_shortcode('wp-marquee','wp_marquee');
add_filter('widget_text', 'do_shortcode'); 


/*
=============================================================
diasable/remove yoast schema
=============================================================
*/

add_filter( 'wpseo_json_ld_output', '__return_false' );


/* Custom login page logo
================================================== */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('https://frautiroler.svr.fm/wp-content/uploads/2021/08/tiroler-green-logo.png');
            height:65px;
            width:320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Frautiroler';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

add_filter( 'frm_js_validate', 'validate_custom_file_size', 20, 3 );
function validate_custom_file_size( $errors, $field, $value ) {
  if ( $field->type == 'file' && ( isset( $_FILES['file'.$field->id] ) ) && ! empty( $_FILES['file'.$field->id]['name'] ) ) { 
    $files = (array) $_FILES['file'. $field->id]['size'];
    foreach ( $files as $v ) {
      if ( $v > 1.5e+6 ) {//change this number to the max size you would like. 100000 bytes = 100 KB
        $errors['field'.$field->id] = 'Maximale Dateigröße überschritten.';
      }
    }
  }
  return $errors;
}
add_filter('frm_validate_field_entry', 'my_custom_validation', 10, 3);
function my_custom_validation($errors, $posted_field, $posted_value){
  if ( $posted_field->id == 16 && $posted_value != '' ){
    $words = explode(' ', $posted_value); //separate at each space
    $count = count($words); //count each word
    if($count < 100)
	$errors['field'. $posted_field->id] = 'Bitte ausfüllen (Min. 100 Zeichen)';
  }
  return $errors;
}