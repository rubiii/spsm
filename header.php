<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<!--[if IE ]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->

	<?php
		if (is_search()) {
			echo '<meta name="robots" content="noindex, nofollow">';
		}
	?>

	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon.png" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/public/css/application.css">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a href="#" id="burger">
    <i class="fa fa-2x fa-bars" aria-hidden="true"></i>
  </a>

  <div id="container" style="position: relative;">
    <div id="header-container">
      <div id="header">
        <div class="clearfix">
          <img src="<?php bloginfo('template_url'); ?>/public/images/logo.png" id="logo" alt="<?php bloginfo( 'name' ); ?>">

          <?php
            $nav_options = array(
              "container"    => "nav",
              "container_id" => "nav"
            );

            wp_nav_menu($nav_options);
          ?>
        </div>

        <div class="header-social">
          <a href="https://www.facebook.com/stpselbermachen">
            <i class="fa fa-2x fa-facebook-square" title="St. Pauli selber machen auf Facebook"></i>
          </a>
          &nbsp;
          <a href="https://twitter.com/StPselbermachen">
            <i class="fa fa-2x fa-twitter-square" title="St. Pauli selber machen auf Twitter"></i>
          </a>
        </div>
      </div>
    </div>

    <div id="stage-container">
      <div id="stage">
