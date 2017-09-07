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

$current_month = "";

?>

<?php if( $eo_event_loop->have_posts() ): ?>

	<?php while( $eo_event_loop->have_posts() ): $eo_event_loop->the_post(); ?>

		<?php
			if ($current_month != eo_get_the_start("F")) {
				$current_month = eo_get_the_start("F");
		?>
		<h3><?php echo $current_month; ?></h3>
		<?php
			}
		?>

		<?php
			$start_day = eo_get_the_start("j. F Y");
			$end_day = eo_get_the_start("j. F Y");
			$is_multiple_days = $start_day != $end_day;

			if ($is_multiple_days) {
				if (eo_is_all_day()) {
					$event_date = eo_get_the_start($date_format) . " bis " . eo_get_the_end($date_format);
				} else {
					$event_date = eo_get_the_start($date_format . " - " . $time_format) . " Uhr bis " . eo_get_the_end($date_format . " - " . $time_format) . " Uhr";
				}
			} else {
				if (eo_is_all_day()) {
					$event_date = eo_get_the_start($date_format);
				} else {
					$start_time = eo_get_the_start($time_format);
					$end_time = eo_get_the_end($time_format);

					if ($start_time == $end_time) {
						$event_date = eo_get_the_start($date_format . " - " . $time_format) . " Uhr";
					} else {
						$event_date = eo_get_the_start($date_format . " - " . $time_format) . "-" . eo_get_the_end($time_format) . " Uhr";
					}
				}
			}
		?>

		<strong><?php echo get_the_title(); ?></strong><br>
		<em><?php echo $event_date; ?></em>

    <?php
      $venueName    = eo_get_venue_name();
      $venueDetails = eo_get_venue_address();
      $venueAddress = $venueDetails['address'];

      if ($venueName) {
        $venue = $venueName;

        if ($venueName != $venueAddress && !empty($venueAddress)) {
          $venue = $venue . " (" . $venueAddress . ")";
        }
    ?>
       <em>| <?php echo $venue; ?></em>
    <?php
      }
    ?>
    <br>

		<?php the_content(); ?>

	<?php endwhile; ?>

<?php elseif( ! empty($eo_event_loop_args['no_events']) ): ?>

	<p class="eo-no-events"><?php echo $eo_event_loop_args['no_events']; ?></p>

<?php endif; ?>
