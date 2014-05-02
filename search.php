<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package societycentral
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if (function_exists('relevanssi_didyoumean')) { relevanssi_didyoumean(get_search_query(), "Did you mean: ", "", 5);}?>
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="search-title">Search results
					<span><?php echo $wp_query->found_posts; ?> <?php _e( 'results for your search for ', 'locale' ); ?> '<?php the_search_query(); ?>'</span>
				</h1>

			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php societycentral_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="secondary" class="widget-area" role="complementary">


			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			

	

	</div><!-- #secondary -->
<?php get_footer(); ?>
