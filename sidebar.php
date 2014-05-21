<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package societycentral
 */
?>
<div id="secondary" class="widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

	<!-- 	<aside id="search" class="widget widget_search">
		<?php get_search_form(); ?>
	</aside>

	<aside id="archives" class="widget">
		<h1 class="widget-title"><?php _e( 'Archives', 'societycentral' ); ?></h1>
		<ul>
			<?php wp_get_archives( array( 'type' => 'weekly' ) ); ?>
		</ul>
	</aside>



	<aside id="meta" class="widget">
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</aside>
 	-->
	<?php endif; // end sidebar widget area ?>


	<?php if ( is_home() ) : // show events listing on homepage?>
	<aside class="widget">
<p class="lead">
	  <?php  the_author_meta('excerpt',2); ?></p>
	</aside>
	<?php endif;  ?>

	<!-- Dont show navigation on single page -->
	<?php if ( ! is_single() ){?>
	 <aside id="headlines" class="widget">
			<h3>Headlines</h3>
			<?php echo headline_list(10); ?>
		</aside>
	<?php }?>


	<?php if ( is_home() ) : // show events listing on homepage?>

	<aside id="events" class="widget">
	  <?php  echo events_sidebar(5); ?>
	</aside>
	<?php endif;  ?>



	<!-- <aside>
		<h1>News in brief</h1>
			<?php
			$hargs = array( 'post_type' => 'societycentral_news', 'posts_per_page' => 3 );
			$myposts = get_posts( $hargs );
			foreach( $myposts as $post ) :  setup_postdata($post);
			?>
				<article>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</article>
			<?php
			endforeach;
			wp_reset_query();
			?>
	</aside> -->
</div><!-- #secondary -->
