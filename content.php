<?php
/**
 * @package WordPress
 * @subpackage SPsm-Theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>

		<div class="entry-meta">
			<time datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
				<?php echo get_the_date(); ?>
			</time>

			&nbsp;&ndash;&nbsp;Veröffentlicht unter
			<?php echo get_the_category_list(", "); ?>
		</div>

		<?php //edit_post_link(); ?>
	</header>

	<div class="entry-content">
		<?php the_excerpt(); ?>

		<div class="entry-link">
			<a href="<?php echo esc_url( get_permalink() ); ?>">Weiterlesen &hellip;</a>
		</div>
	</div>
</article>
