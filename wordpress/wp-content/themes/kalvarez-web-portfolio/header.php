<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package K.Alvarez Web Portfolio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- ToDo: Move this to plugin -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">

	var myLatLng = new google.maps.LatLng(33.7550, -84.3900);
	function initialize() {
		var mapCanvas = document.getElementById('map');
		var mapOptions = {
		  center: myLatLng,
		  zoom: 8,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(mapCanvas, mapOptions);
		var marker = new google.maps.Marker({
		  position: myLatLng,
		  map: map
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kalvarez-web-portfolio' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
				<!-- <p class="site-description"><?php bloginfo( 'description' ); ?></p> -->
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kalvarez-web-portfolio' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>		
	</header><!-- #masthead -->	
	<div class="hero">
		<div id="stars-contain">
			<div id="stars">
				
			</div>
		</div>	
		<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail();
			} 
		?>
		<div class="spaceship">
			<img src="<?php echo get_template_directory_uri(); ?>/img/spaceship.png" alt="">
		</div>
		<div class="spaceship two">
			<img src="<?php echo get_template_directory_uri(); ?>/img/spaceship.png" alt="">
		</div>
		<div class="space-text">
			<div class="container">
				<div>
					<h1>Be humble for you are made of earth.</h1>
					<h1>Be noble for you are made of stars.</h1>
				</div>
			</div>
		</div>
		<div class="sun">
			<section class="stage">
			  <figure class="ball"></figure>
			</section>			
		</div>
	</div>
	<!-- <div class="hero">
		<div id="stars-contain">
			<div id="stars">
				
			</div>
		</div>	
		<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail();
			} 
		?>
		<div class="spaceship">
			<img src="<?php echo get_template_directory_uri(); ?>/img/spaceship.png" alt="">
		</div>
		<div class="spaceship two">
			<img src="<?php echo get_template_directory_uri(); ?>/img/spaceship.png" alt="">
		</div>
		<div class="space-text">
			<div class="container">
				<div>
					<h1>Be humble for you are made of earth.</h1>
					<h1>Be noble for you are made of stars.</h1>
				</div>
			</div>
		</div>
		<div class="sun">
			<section class="stage">
			  <figure class="ball"></figure>
			</section>			
		</div>
	</div> -->
	<div id="content" class="site-content">
