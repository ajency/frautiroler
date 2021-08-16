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

/**
 * Fires at start of header.php, immediately before `genesis_title` action hook to render the Doctype content.
 *
 * @since 1.3.0
 */
do_action( 'genesis_doctype' );

/**
 * Fires immediately after `genesis_doctype` action hook, in header.php to render the document title.
 *
 * @since 1.0.0
 */
do_action( 'genesis_title' );

/**
 * Fires immediately after `genesis_title` action hook, in header.php to render the meta elements.
 *
 * @since 1.0.0
 */
do_action( 'genesis_meta' );

wp_head(); // We need this for plugins.
?>
		<script type="application/ld+json">
		{
			"@context": "http://www.schema.org",
			"@type": "FundingScheme",
			"name": "Frautiroler",
			"url": "https://frautiroler.svr.fm/",
			"logo": "https://frautiroler.svr.fm/wp-content/uploads/2021/08/tiroler-green-logo.png",
			"image": "https://frautiroler.svr.fm/wp-content/uploads/2021/08/opportunities-risk-group_mob.png",
			"description": "Funding Website",
			"telephone": "+43 (0) 512 5313 – 0",
			"email": "mail@tiroler.at",
			"address" : {
			"@type" : "PostalAddress",
			"streetAddress": "Wilhelm-Greil-Straße 10",
			"addressRegion": "6020 Innsbruck",
			"addressCountry": "Austria"
			}
		}
		</script>
</head>
<?php
genesis_markup(
	[
		'open'    => '<body %s>',
		'context' => 'body',
	]
);

genesis_markup(
	[
		'open'    => '<div %s>',
		'context' => 'site-container--overlay',
	]
);

genesis_markup(
	[
		'close'   => '</div>',
		'context' => 'site-container--overlay',
	]
);

if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}

/**
 * Fires immediately after the `wp_body_open` action hook.
 *
 * @since 1.0.0
 */
do_action( 'genesis_before' );

genesis_markup(
	[
		'open'    => '<div %s>',
		'context' => 'site-container',
	]
);

/**
 * Fires immediately after the site container opening markup, before `genesis_header` action hook.
 *
 * @since 1.0.0
 */
do_action( 'genesis_before_header' );

/**
 * Fires to display the main header content.
 *
 * @since 1.0.2
 */
//do_action( 'genesis_header' );

/**
 * Fires immediately after the `genesis_header` action hook, before the site inner opening markup.
 *
 * @since 1.0.0
 */
do_action( 'genesis_after_header' );
?>

<header id="site-header" class="site-header">
	<div class="site-header--overlay"></div>
	<div class="site-header-block">
		<div id="site-navigation" class="site-navigation">
			<div class="site-navigation-wrapper container">
				<div class="main-header d-flex justify-content-between pt-3 pb-4">
					<div class="logo-text">
						<div class="site-logo d-flex align-items-center">
							<?php 
							   	$custom_logo_id = get_theme_mod( 'custom_logo' );
							   	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					      	?>
							<a href="<?php echo get_site_url(); ?>/" class="d-flex align-items-center">
								<img id="logo-1" src="<?php echo $image[0]; ?>" alt="" class="banner-1--logo logo-block pr-2 show-logo">
								<img id="logo-2" class="banner-2--logo logo-block pr-2" src="../wp-content/themes/frautiroler/assets/img/tiroler-logo-red.svg" alt="">
								<img id="logo-3" class="banner-3--logo logo-block pr-2" src="../wp-content/themes/frautiroler/assets/img/tiroler-logo-white.svg" alt="">
							</a>
						</div>
					</div>
				</div>
				<div class="navbar navbar-expand-md navbar-light header-menu p-0 d-md">
				  	<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				</div>
			</div>
			<div class="navbar-right">
				<input class="menu-trigger hidden" id="togglenav" type="checkbox" />
				<label class="burger-wrapper" for="togglenav">
				    <div class="hamburger">
				     	<div class="bar"></div>
					    <div class="bar"></div>
					    <div class="bar"> </div>
				    </div>
				</label>
			</div>
		</div>
	</div>
	<div class="hamburger-menu">
		<div class="mobile-menu">
			<div class="overlay">
				<div class="header-wrapper">
					<a href="<?php echo get_site_url(); ?>/" class="site-logo"><img src="../wp-content/themes/frautiroler/assets/img/tiroler-pink-logo.png" alt="" class="pr-2"></a>
					<div class="hamburger hamburger-close">
				     	<div class="bar"></div>
					    <div class="bar"></div>
					    <div class="bar"> </div>
				    </div>
			    </div>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
			</div>
		</div>
	</div>	
</header>
<?php
