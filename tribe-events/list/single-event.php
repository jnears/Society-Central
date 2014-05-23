<?php 
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php 

// Setup an array of venue details for use later in the template
$venue_details = array();

if ($venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;	
}

if ($venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;	
}
// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard': '';
$has_venue_address = ( $venue_address ) ? ' location': '';
?>

<!-- Event Cost -->
<?php if ( tribe_get_cost() ) : ?> 
	<div class="tribe-events-event-cost">
		<span><?php echo tribe_get_cost( null, true ); ?></span>
	</div>
<?php endif; ?>

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<h3 class="entry-title">
	<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
		<?php the_title() ?>
	</a>
</h3>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>
<div class="entry-meta <?php echo $has_venue . $has_venue_address; ?>">

	<!-- Schedule & Recurrence Details -->
	
		<?php echo tribe_events_event_schedule_details() ?>
	<? //php if ( $venue_details ) : ?>
		<!-- Venue Display Info -->
		<!-- <div class="tribe-events-venue-details"> -->
			<?php // echo implode( ', ', $venue_details) ; ?>
		<!-- </div> .tribe-events-venue-details -->
	 <? //php endif; ?>

</div><!-- .tribe-events-event-meta -->
<?php do_action( 'tribe_events_after_the_meta' ) ?>

<!-- Event Image -->
<?php echo tribe_event_featured_image( null, 'medium' ) ?>

<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ) ?>
<div class="excerpt">
	<?php the_excerpt() ?>
	
</div><!-- .tribe-events-list-event-description -->
<?php do_action( 'tribe_events_after_the_content' ) ?>
