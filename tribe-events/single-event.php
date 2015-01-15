<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">


	<!-- <p><a href="<?php echo tribe_get_events_link() ?>"> <?php _e( '&laquo; All Events', 'tribe-events-calendar' ) ?></a></p> -->
	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<?php the_title( '<h1>', '</h1>' ); ?>

	<!-- <div class="tribe-events-schedule updated published tribe-clearfix">
		<?php echo tribe_events_event_schedule_details( $event_id, '<h3>', '</h3>'); ?>
		<?php  if ( tribe_get_cost() ) :  ?>
			<span class="tribe-events-divider">|</span>
			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
		<?php endif; ?>
	</div> -->
      
	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php _e( 'Event Navigation', 'tribe-events-calendar' ) ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous btn"><?php tribe_the_prev_event_link( '<i class="fa fa-angle-left"></i> %title%' ) ?></li>
			<li class="tribe-events-nav-next btn"><?php tribe_the_next_event_link( '%title% <i class="fa fa-angle-right"></i>' ) ?></li>
		</ul><!-- .tribe-events-sub-nav -->
	</div><!-- #tribe-events-header -->

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('vevent'); ?>>
			<!-- Event featured image -->
			<?php echo tribe_event_featured_image(); ?>
<?php if ( $venue_details ) : ?>
			<!-- Venue Display Info -->
			<div class="tribe-events-venue-details">
				<?php echo implode( ', ', $venue_details ); ?>
			</div> <!-- .tribe-events-venue-details -->
		<?php endif; ?>
			<ul>
				<li><b>Date:</b> <?php echo tribe_events_event_schedule_details() ?></li>
				
				<?php  if ( tribe_address_exists() ) :  ?><li><b>Location:</b> <?php echo tribe_get_full_address() ?></li><?php endif; ?>
				<?php  if ( tribe_get_map_link() ) :  ?><li><?php echo tribe_get_map_link_html() ?></li><?php endif; ?>
			</ul>
			
			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div><!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
			<p><a href="<?php echo tribe_get_events_link(); ?>" rel="bookmark"><?php _e( 'View all events', 'tribe-events-calendar' );	?></a></p>
</div>
</div>
			<div id="secondary" class="widget-area" role="complementary"><!-- Event meta -->
			<aside id="headlines" class="widget">
			<?php echo headline_list(10); ?>
		</aside>

			
			</div><!-- .hentry .vevent -->
		<?php if( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	


