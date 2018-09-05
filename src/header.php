<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	
	<!-- TODO figure out a better way to include JS -->
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/foundation.min.js"></script>
	<script>
		
		$(function(){
			$(document).foundation();
		});
		
	</script>
</head>

<body <?php body_class(); ?>>
	
	<div class="top-bar-wrapper">
		<div class="grid-container">
			
			<div class="top-bar">
				<div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
					<button class="menu-icon" type="button" data-toggle></button>
				</div>
				<div class="top-bar-left hide-for-small-only">
					<ul class="menu" data-dropdown-menu>
						<li>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<strong><?php bloginfo( 'name' ); ?></strong>
							</a>
						</li>

						<!--begin generated menu-->
						<?php 
							wp_nav_menu(array(
								'menu_class' => ''
							));
						?>
						<!--end generated menu-->
					</ul>
				</div>
				
				<div class="top-bar-right">
					<form role="search" method="get" action="http://kitpress-dev/">
						<ul class="menu">
							<li><input type="search" placeholder="Search" name="s"></li>
							<li><button type="button" class="button hide-for-small-only">Search</button></li>
						</ul>
					</form>
				</div>
				

			</div>
			
			<div class="top-bar-mobile hide-for-medium" id="main-menu">
				<ul class="menu" data-dropdown-menu>
					<li>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<strong><?php bloginfo( 'name' ); ?></strong>
						</a>
					</li>

					<!--begin generated menu-->
					<?php 
						wp_nav_menu(array(
							'menu_class' => ''
						));
					?>
					<!--end generated menu-->
				</ul>
			</div>
			
		</div>
	</div>
	
	<div class="grid-container">
		<div class="grid-x grid-padding-x">