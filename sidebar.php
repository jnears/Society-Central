<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package societycentral
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'societycentral' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'weekly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><?php _e( 'Meta', 'societycentral' ); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
		
			<aside class="g4 noprint">

<div class="news-in-brief noprint">
<div class="c">
<h3>News in brief</h3>
<?php
$hargs = array( 'post_type' => 'essexuni_news', 'posts_per_page' => 3 );
$myposts = get_posts( $hargs );
foreach( $myposts as $post ) :  setup_postdata($post);
?>
<article>
<h4><?php the_title(); ?></h4>
<?php the_content(); ?>
</article>
<?php
endforeach;
wp_reset_query();
?>
</div>
</div>
</aside>
	</div><!-- #secondary -->
