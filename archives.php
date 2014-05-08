<?php
/**
 * The template for displaying Archive pages.
 * Template Name: Archives
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package societycentral
 */

get_header(); ?>

	å<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<h1 class="page-title">
				Archives	
				</h1>
			
			</header><!-- .page-header -->

    
      <?php wp_get_archives('type=monthly'); ?>
    

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
