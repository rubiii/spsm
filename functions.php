<?php
/**
 * @package WordPress
 * @subpackage SPsm-Theme
 */

// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function spsm_setup() {
	load_theme_textdomain( 'spsm', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'spsm' ) );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'spsm_setup' );

// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function spsm_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Seite %s', 'spsm' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'spsm_wp_title', 10, 2 );

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

add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
  if(isset($fields['url']))
   unset($fields['url']);
  return $fields;
}

// // Posted On
// function posted_on() {
// 	printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
// 		esc_url( get_permalink() ),
// 		esc_attr( get_the_time() ),
// 		esc_attr( get_the_date( 'c' ) ),
// 		esc_html( get_the_date() ),
// 		esc_attr( get_the_author() )
// 	);
// }

?>
