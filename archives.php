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

			   
    
      <ol class="breadcrumb">
      <li><a href="<?php echo home_url(); ?>">Home</a></li>
      <li><a href="<?php echo site_url(); ?>/archives">Archives</a></li>
      </ol>
    
      <?php wp_get_archives('type=monthly'); ?>
    

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
