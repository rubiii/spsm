<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) {
		_e('This post is password protected. Enter the password to view comments.','spsm');
		return;
	}


	if ( have_comments() ) : ?>

	<h2 id="comments"><?php comments_number(__('No Responses','spsm'), __('One Response','spsm'), __('% Responses','spsm') );?></h2>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Kommentare geschlossen.</p>

	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

	<h2><?php comment_form_title( __('Kommentieren','spsm'), __('Kommentieren zu %s','spsm') ); ?></h2>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php _e('Bist du nicht?','spsm'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('anmelden','spsm'); ?></a> <?php _e('um zu kommentieren.','spsm'); ?></p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<p><?php _e('Angemeldet als','spsm'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>

		<?php else : ?>

			<div>
				<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" maxlength="70" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="author"><?php _e('Name','spsm'); ?> <?php if ($req) echo "(Pflichtfeld)"; ?></label>
			</div>

			<div>
				<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" maxlength="70" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				<label for="email"><?php _e('E-Mail (wird nicht veröffentlicht)','spsm'); ?> <?php if ($req) echo "(Pflichtfeld)"; ?></label>
			</div>

		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

		<div>
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
		</div>

		<div>
			<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Kommentar abschicken','spsm'); ?>" />
			<?php comment_id_fields(); ?>
		</div>

		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>

</div>

<?php endif; ?>
