<?php
/**
 * @package WordPress
 * @subpackage SPsm-Theme
 */

	get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' );	?>

				<div class="entry-meta">
					<time datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
						<?php echo get_the_date('j. F Y'); ?>
					</time>

					&nbsp;&mdash;&nbsp;
					<?php echo get_the_category_list(", "); ?>
				</div>

				<?php //edit_post_link(); ?>
			</header>

			<div class="entry-content">

				<?php the_content(); ?>

				<?php //wp_link_pages(array('before' => __('Pages: ','spsm'), 'next_or_number' => 'number')); ?>

				<?php //the_tags( __('Tags: ','spsm'), ', ', ''); ?>

				<?php //posted_on(); ?>

			</div>

			<?php //edit_post_link(__('Edit this entry','spsm'),'','.'); ?>

		</article>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

<?php //post_navigation(); ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>