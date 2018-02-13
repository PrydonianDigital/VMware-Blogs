<?php
if ( post_password_required() )
	return;
?>
<?php if ( comments_open() || get_comments_number() ) : ?>
<div class="row">

	<div class="column">

		<h4 class="sectionTitle"><?php _e( 'Comments', 'vmw' ); ?></h4>

	</div>

</div>

<div class="row">

	<div class="column">

		<div id="comments" class="comments-area">

			<?php if ( comments_open() || get_comments_number() ) : ?>

				<ol class="comment-list">
					<?php
						wp_list_comments('avatar_size=80&type=comment&callback=vmw_comment');
					?>
				</ol>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

					<nav class="navigation comment-navigation" role="navigation">
						<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'vmw' ); ?></h1>
						<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'vmw' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'vmw' ) ); ?></div>
					</nav>

				<?php endif; ?>

				<?php if ( ! comments_open() && get_comments_number() ) : ?>

					<h6 class="subheader text-center"><?php _e( 'Comments are closed.' , 'vmw' ); ?></h6>

				<?php endif; ?>

			<?php endif; ?>

			<?php
				if ( !have_comments() ) :
			?>

			<h6 class="subheader text-center"><?php _e( 'No comments yet' , 'vmw' ); ?></h6>

			<?php endif; ?>

		</div>

	</div>

</div>

<div class="row">

	<div class="column comments-area">

		<?php
			$args = array(
				'title_reply'			=> __( 'Add a comment' , 'vmw' ),
				'title_reply_before'	=> '<h4 class="sectionTitle">',
				'title_reply_after'		=> '</h4>',
				'class_submit'			=> 'button',
				'format'				=> 'HTML5'
			);
			comment_form( $args );
		?>

	</div>

</div>

<?php else: ?>
<div class="row">

	<div class="column">

		<h4 class="sectionTitle"><?php _e( 'Comments are closed', 'vmw' ); ?></h4>

	</div>

</div>
<?php endif; ?>