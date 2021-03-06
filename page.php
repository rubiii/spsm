<?php
/**
 * @package WordPress
 * @subpackage SPsm-Theme
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<header class="entry-header">
				<h2><?php the_title(); ?></h2>
			</header>

			<?php //posted_on(); ?>

			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => __('Pages: ','spsm'), 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link(__('Edit this entry','spsm'), '<p>', '</p>'); ?>

		</article>

		<?php comments_template(); ?>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>
