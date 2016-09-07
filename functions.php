<?php
/**
 * @package WordPress
 * @subpackage SPsm-Theme
 */

// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function spsm_setup() {
	add_theme_support('automatic-feed-links');
	add_theme_support('structured-post-formats', array( 'link', 'video' ));
	add_theme_support('post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ));
	register_nav_menu('primary', __( 'Navigation Menu', 'spsm' ));
	add_theme_support('post-thumbnails');
}
add_action( 'after_setup_theme', 'spsm_setup' );

// Custom Menu
register_nav_menu( 'primary', __( 'Navigation Menu', 'spsm' ) );

// Widgets
if ( function_exists('register_sidebar' )) {
	function spsm_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'spsm' ),
			'id'            => 'sidebar-primary',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'spsm_widgets_init' );
}

// Remove url from comment form fields
add_filter('comment_form_default_fields', 'spsm_remove_url_field');
function spsm_remove_url_field($fields) {
  if (isset($fields['url'])) {
    unset($fields['url']);
  }
  return $fields;
}

// Remove whitespace between menu items
add_filter('wp_nav_menu_items', 'spsm_remove_menu_item_whitespace');
function spsm_remove_menu_item_whitespace($items, $args) {
  return preg_replace('/>(\s|\n|\r)+</', '><', $items);
}

// Prevent loading the emoji JavaScript.
remove_action("wp_head", "print_emoji_detection_script", 7);
remove_action("wp_print_styles", "print_emoji_styles");

function spsm_next_meeting_date() {
  $this_day   = date_i18n("d");
  $this_month = date_i18n("m");
  $this_year  = date_i18n("Y");

  $next_month = date_i18n("m", strtotime("+1 month"));

  $first_monday_of_this_month = strtotime("first monday of $this_year-$this_month");
  $first_monday_of_next_month = strtotime("first monday of $this_year-$next_month");

  $day_of_first_monday_of_this_month = date_i18n("d", $first_monday_of_this_month);

  if ($this_day <= $day_of_first_monday_of_this_month) {
    return $first_monday_of_this_month;
  }
  return $first_monday_of_next_month;
}

function spsm_shortcode_next_meeting_date() {
  return date_i18n("j. F Y", spsm_next_meeting_date()) . " um 19:30 Uhr";
}
add_shortcode("spsm_next_meeting_date", "spsm_shortcode_next_meeting_date");

function spsm_shortcode_next_meeting_location() {
  $locations = array(
    "odd" => array(
      "name" => "Centro Sociale",
      "url"  => "http://www.centrosociale.de/hinfinden"
    ),
    "even" => array(
      "name" => "Kölibri",
      "url"  => "http://www.gwa-stpauli.de/menue_gwa/kontakt/anfahrt.html"
    )
  );

  $month_of_next_meeting_date = date("n", spsm_next_meeting_date());

  $location = ($month_of_next_meeting_date % 2) ? $locations["odd"] : $locations["even"];

  return "<a href='{$location['url']}'>{$location['name']}</a>";
}
add_shortcode("spsm_next_meeting_location", "spsm_shortcode_next_meeting_location");

// Enable shortcodes for text widgets.
add_filter("widget_text", "do_shortcode");
