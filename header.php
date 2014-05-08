<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section and everything up till <div id="content">
*
* @package societycentral
*/
?><!DOCTYPE html>
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
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<header id="masthead" class="site-header" role="banner">
<div class="site-branding">
<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
</div>

<nav id="site-navigation" class="main-navigation" role="navigation">
	<ul>
<!-- <h1 class="menu-toggle"><?php _e( 'Menu', 'societycentral' ); ?></h1> -->
<li><a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'societycentral' ); ?></a></li>

<?//php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

<li><a class="search-toggle" href="/search" >Search</a></li>
</ul><?php get_search_form(); ?>
</nav><!-- #site-navigation -->
</header><!-- #masthead -->

<div id="content" class="site-content">
