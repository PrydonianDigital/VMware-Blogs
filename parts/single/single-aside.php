<?php get_template_part( 'parts/single/post', 'header' ); ?>

<div class="row animated fadeIn">

	<div class="small-12 medium-2 columns lang text-center author">

		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="<?php _e( 'Read more posts by ', 'vmw' )	; ?> <?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?></a>

		<p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="<?php _e( 'Read more posts by ', 'vmw' )	; ?> <?php echo get_the_author_meta( 'display_name' ); ?>"><?php the_author(); ?></a></p>

		<p><small><?php echo get_the_author_meta( 'description' ); ?></small></p>

	</div>

	<?php
		$assettitle = get_post_meta( $post->ID, '_post_wp_title', true );
		$assetdesc = get_post_meta( $post->ID, '_post_wp_desc', true );
		$assetimg = get_post_meta( $post->ID, '_post_wp_img', true );
		$assetfile = get_post_meta( $post->ID, '_post_wp_file', true );
		$assetform = get_post_meta( $post->ID, '_post_wp_form', true );
	?>
	<div class="small-12 medium-8 columns lang">

	<?
		$ageunix = get_the_time('U');
		$days_old_in_seconds = ((time() - $ageunix));
		$days_old = (($days_old_in_seconds/86400));
		if ($days_old > 365) {
			echo '<div class="callout alert"><i class="fas fa-exclamation-triangle"></i> ' . __( 'DISCLAIMER: this article is older than one year and may not be up to date with recent events or newly available information.', 'vmw' ) . '</div>';
		}
	?>

		<?php the_content(); ?>

		<div id="asset">

			<div class="callout secondary">

				<div class="row">

					<div class="small-12 medium-8 columns">

						<h4 class="entry-title"><?php echo $assettitle; ?></h4>

						<p><?php echo nl2br( $assetdesc ); ?></p>

						<?php
							if( $assetform == '' ) {
						?>

						<p><a href="<?php echo $assetfile; ?>" class="button">Download Now</a></p>

						<?php
							}
						?>

					</div>

					<div class="small-12 medium-4 columns">

						<?php
							if( $assetform == '' ) {
						?>

						<a href="<?php echo $assetfile; ?>"><img src="<?php echo $assetimg; ?>" class="assetMainImg" /></a>

						<?php
							} else {
						?>

						<img src="<?php echo $assetimg; ?>" class="assetMainImg" />

						<?php
							}
						?>

					</div>

				</div>

				<?php
					if( $assetform != '' ) {
				?>

				<div class="row">

					<div class="column">

						<?php
							$current_user = wp_get_current_user();
							$me = $current_user->user_email;
							$search_criteria = array(
								'status'        => 'active',
								'field_filters' => array(
									array(
										'key'   => '2',
										'value' => $me,
									),
								)
							);
							$entries = GFAPI::get_entries( $assetform, $search_criteria, null, $paging );
							if( count($entries) == 0 ) {
						?>
						<h5 class="entry-title"><?php _e( 'Register to download', 'vmw' ); ?> <?php echo $assettitle; ?></h5>
						<?php
								echo do_shortcode( '[gravityform id=' . $assetform . ' title=false description=false ajax=true]' );
							} else {
								foreach( $entries as $entry) {
									$form = GFAPI::get_form( $entry['form_id'] );
									foreach ( $form[ 'confirmations' ] as $key => $confirmation ) {
										echo $form[ 'confirmations' ][ $key ][ 'message' ] = $shortcode . $form[ 'confirmations' ][ $key ][ 'message' ];
									}
								}
							}
						?>

					</div>

				</div>

				<?php
					}
				?>

			</div>

		</div>

		<?php get_template_part( 'parts/single/list', 'categories' ); ?>

		<?php get_template_part( 'parts/single/list', 'tags' ); ?>

		<?php get_template_part( 'parts/global/share', 'post' ); ?>

	</div>

	<div class="small-12 medium-2 columns lang">

		<div data-smooth-scroll>
			<a class="button" href="#asset"><?php _e( 'Go to White Paper', 'vmw' ); ?> <i class="fas fa-chevron-down"></i></a>
		</div>

	</div>


</div>