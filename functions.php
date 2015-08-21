<?php
/**
 * @package WordPress
 * @subpackage SPsm-Theme
 */

// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function spsm_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'spsm' ) );
	add_theme_support( 'post-thumbnails' );
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

add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
  if(isset($fields['url']))
   unset($fields['url']);
  return $fields;
}

