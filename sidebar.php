<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package societycentral
 */
?>
<div id="secondary" class="widget-area" role="complementary">
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

	<?php endif; // end sidebar widget area ?>


	<?php if ( is_home() ) : // show events listing on homepage?>
	<aside class="widget">
<p class="lead">
	  <?php  the_author_meta('excerpt',8); ?></p>
	</aside>
	<?php endif;  ?>

	<!-- Dont show navigation on single page -->
	<?php if ( ! is_single() ){?>
	 <aside id="headlines" class="widget">
			<?php echo headline_list(10); ?>
		</aside>
	<?php }?>


	<?php if ( is_home() ) : // show events listing on homepage?>

<aside id="events-list" class="widget">
<?php the_widget('TribeEventsListWidget'); ?>
</aside>
	<?php endif;  ?>

</div><!-- #secondary -->
