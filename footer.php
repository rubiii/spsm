<?php
/**
 * @package WordPress
 * @subpackage SPsm-Theme
 */
?>

      </div>
		</div>

		<?php get_sidebar(); ?>

		<?php wp_footer(); ?>
  </div>

  <div id="overlay">
    <img src="<?php bloginfo('template_url'); ?>/public/images/logo.svg" id="overlay-logo" alt="<?php bloginfo( 'name' ); ?>">

    <?php
      $nav_options = array(
        "container"    => "nav",
        "container_id" => "overlay-nav"
      );

      wp_nav_menu($nav_options);
    ?>
  </div>

  <script src="<?php bloginfo('template_directory'); ?>/public/js/application.js"></script>
</body>

</html>
