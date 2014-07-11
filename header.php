<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php wp_title('', true, 'right'); ?></title>
		
		<!-- icons & favicons -->
		<!-- For iPhone 4 -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/apple_favicon_114.png">
		<!-- For iPad 1-->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/apple_favicon_72.png">
		<!-- For iPhone 3G, iPod Touch and Android -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/apple_favicon.png">
		<!-- For Nokia -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
		<!-- For everything else -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
				
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
				
	</head>
	
	<body <?php //body_class(); ?>>
		
		<!-- off canvas wrap !-->
		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				
				<!-- Mobile nav activate button !-->
				<?php if( wp_is_mobile() ): ?>
					<nav class="tab-bar show-for-small show-for-medium-portrait">
					  <a class="left-off-canvas-toggle menu-icon">
					    <span><?php bloginfo('name'); ?></span>
					  </a>
					</nav>
				<?php endif; ?>
				
				<?php if( wp_is_mobile() ): ?>
				<?php 
					wp_nav_menu( 
				    	array( 
				    		'menu' 				=> 'mobile_nav', /* menu name */
				    		'menu_class' 		=> 'off-canvas-list',
				    		'theme_location' 	=> 'mobile_nav', /* where in the theme it's assigned */
				    		'container_class' 	=> 'left-off-canvas-menu show-for-small show-for-medium-portrait', /* container tag */
				    		'depth' 			=> '2',
				    		'fallback_cb'		=> false
				    	)
				    );
				?>
				<?php endif; ?>
				
				<div class="row container">
					
					
					
					<!-- Content Div !-->
					<div id="content">
						
						<div class="large-12 columns">
							<header role="banner" id="top-header">
								
								<div class="siteinfo">
									<h1><a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
									<h4 class="subhead"><?php echo get_bloginfo ( 'description' ); ?></h4>
								</div>
								
								<div class="contain-to-grid sticky">
									<nav class="top-bar nav-bar hide-for-small hide-for-medium-portrait" data-topbar>
									  <ul class="title-area">
									    <!-- Title Area -->
									    <li class="name">
									      <h1><a href="#">Top Bar Title </a></h1>
									    </li>
									    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
									    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
									  </ul>
									
									  <section class="top-bar-section">
									    <!-- Left Nav Section -->
									    <?php 
											// Adjust using Menus in Wordpress Admin
											if( has_nav_menu('main_nav') ) {
												//Get cached nav menu
											    PrsoCoreWpqueryModel::cached_nav_menu( 
											    	array( 
											    		'menu' 				=> 'main_nav', /* menu name */
											    		'menu_class' 		=> 'left',
											    		'theme_location' 	=> 'main_nav', /* where in the theme it's assigned */
											    		'container' 		=> 'false', /* container tag */
											    		'depth' 			=> '4',
											    		'walker' 			=> new main_nav_walker(),
											    		'fallback_cb'		=> false
											    	)
											    );
											}
										?>
										
										<!-- Rigth Nav Section !-->
										<ul class="right">
											<li class="has-form" >
												<form action="<?php echo home_url( '/' ); ?>" method="get">
											      <div class="large-12 columns">
											        <input type="text" id="search" placeholder="Search" name="s" value="<?php the_search_query(); ?>" />
											      </div>
										  		</form>
											</li>
										</ul>
										
									  </section>
									</nav>
								</div>
								
							</header> <!-- end header -->
						</div>
						
						<!-- Mobile nav for deep (Teriary) pages if page has any !-->
						<div id="mobile-deep-nav-container" class="large-12 columns show-for-small show-for-medium-portrait">
							<?php //do_action( 'prso_deep_mobile_nav' ); ?>
						</div>