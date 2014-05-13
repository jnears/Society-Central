<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section and everything up till <div id="content">
*
* @package societycentral
*/
?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="sc no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<html class="sc" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link type="text/plain" rel="author" href="<?php echo get_template_directory_uri(); ?>/humans.txt" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" />
</head>

<body <?php body_class(); ?>>
<a class="skip-link visuallyhidden" href="#content" accesskey="s"><?php _e( 'Skip to content', 'societycentral' ); ?></a>
<div id="outer-wrap">
<div id="inner-wrap">
<div id="page" class="hfeed site">

<header id="masthead" class="site-header" role="banner">
<div class="site-branding">
<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
</div>

<!-- <nav id="site-navigation" class="main-navigation" role="navigation">
	<ul>
<h1 class="menu-toggle"><?php _e( 'Menu', 'societycentral' ); ?></h1> 

<?//php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>


</ul>
</nav><!-- #site-navigation --> 


<?php get_search_form(); ?>
</header><!-- #masthead -->
<a id="nav-menu-btn" class="nav-btn closed" href="/">Menu</a>
<?php echo headline_list(10); ?>
<a id="nav-search-btn" class="search-toggle active" href="/search">Search</a>
<div id="content" class="site-content">
