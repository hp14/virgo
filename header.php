<?php
global $lst_options;
global $ls_options;
global $slider;
//var_dump($slider); ?><!DOCTYPE html>
<!--[if IE 7]>					<html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
<head>

	<link href='http://fonts.googleapis.com/css?family=Over+the+Rainbow|Open+Sans:300,400,400italic,600,700|Arimo|Oswald|Lato|Ubuntu' rel='stylesheet' type='text/css'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<title> <?php echo bloginfo(); ?></title>

	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut" href="images/favicon.ico" />
<!--	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"	 rel="stylesheet">-->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skeleton.css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri();  ?>" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mediaelementplayer.css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox.css" media="screen" />

	<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/rs-plugin/css/settings.css" media="screen" />

	<!-- HTML5 SHIV + DETECT TOUCH EVENTS -->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
    <?php wp_head(); ?>
	<meta name="_nonce" content="<?php echo wp_create_nonce('ajax-calls'); ?>">
</head>
<body class="color-1 h-style-1 text-1">

	<!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

	<header id="header">

		<div class="container">

			<!-- - - - - - - - - - - - Logo - - - - - - - - - - - - - -->
			<div id="wait" class="cssload-thecube">
				<div class="cssload-cube cssload-c1"></div>
				<div class="cssload-cube cssload-c2"></div>
				<div class="cssload-cube cssload-c4"></div>
				<div class="cssload-cube cssload-c3"></div>
			</div>
			<a href="<?php echo home_url(); ?>" id="logo">


				<h1><?php echo bloginfo(); ?></h1>
			</a><!--/ #logo-->

			<!-- - - - - - - - - - - end Logo - - - - - - - - - - - - -->

			<!-- - - - - - - - - - - - Event Holder - - - - - - - - - - - - - -->

<!--			<div class="event-holder clearfix">-->
<!--				<b>next event in:</b>-->
<!--				<span class="event-numbers">05</span>-->
<!--				<span class="event-text">days</span>-->
<!--				<span class="event-numbers">07</span>-->
<!--				<span class="event-text">hr</span>-->
<!--				<span class="event-numbers">25</span>-->
<!--				<span class="event-text">min</span>-->
<!--				<span class="event-numbers">35</span>-->
<!--				<span class="event-text">sec</span>-->
<!--			</div><!--/ .event-holder-->

			<!-- - - - - - - - - - - end Event Holder - - - - - - - - - - - - -->

			<div class="clear"></div>

			<!-- - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - -->

			<nav id="navigation" class="navigation clearfix">


					<?php if ( has_nav_menu('header-menu') ){
				                        wp_nav_menu(
				                            array(  'theme_location' => 'header-menu' ,
				                                         'container' => '' ,
				                                         'menu_id'=>'superfish_menu',
				                                        'menu_class'=>'clearfix sf-menu'
				                                        )
				                        );
				                    }
//					else {   ?><!-- <div class="top-bar-menu-no-item">Please select a menu for this section</div> --><?php //} ?>
				<?php if ( has_nav_menu('loginout_menu') ){
								                        wp_nav_menu(
								                            array(  'theme_location' => 'loginout_menu' ,
								                                         'container' => '' ,
								                                         'menu_id'=>'loginout_ul',
								                                        'menu_class'=>'clearfix sf-menu'
								                                        )
								                        );
								                    }
				//					else {   ?>

			</nav><!--/ #navigation-->

			<!-- - - - - - - - - - - - end Navigation - - - - - - - - - - - - - -->

		</div><!--/ .container-->

	</header><!--/ #header-->

	<!-- - - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - - -->
