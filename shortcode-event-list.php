<?php
/**
 * Event List Widget: Standard List
 *
 * The template is used for displaying the [eo_event] shortcode *unless* it is wrapped around a placeholder: e.g. [eo_event] {placeholder} [/eo_event].
 * 
 * You can use this to edit how the output of the eo_event shortcode. See http://docs.wp-event-organiser.com/shortcodes/events-list
 * For the event list widget see widget-event-list.php
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.7
 */
global $eo_event_loop,$eo_event_loop_args;

//Date % Time format for events
$date_format = "l, j. F Y"; // get_option('date_format');
$time_format = get_option('time_format');

//The list ID / classes
$id = ( $eo_event_loop_args['id'] ? 'id="'.$eo_event_loop_args['id'].'"' : '' );
$classes = $eo_event_loop_args['class'];

?>

<?php if( $eo_event_loop->have_posts() ): ?>

	<?php while( $eo_event_loop->have_posts() ): $eo_event_loop->the_post(); ?>

		<?php 
			//Generate HTML classes for this event
			$eo_event_classes = eo_get_event_classes(); 

			//For non-all-day events, include time format
			$format = ( eo_is_all_day() ? $date_format : $date_format.' - '.$time_format );
		?>

		<strong><?php echo eo_get_the_start($format); ?></strong><br>
		<?php the_content(); ?>

	<?php endwhile; ?>

<?php elseif( ! empty($eo_event_loop_args['no_events']) ): ?>

	<p class="eo-no-events"><?php echo $eo_event_loop_args['no_events']; ?></p>

<?php endif; ?>

