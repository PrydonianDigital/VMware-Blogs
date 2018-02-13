<?php get_template_part( 'parts/single/post', 'header' ); ?>

<div class="row animated fadeIn">

	<div class="small-12 medium-2 columns lang text-center author">

		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="<?php _e( 'Read more posts by ', 'vmw' )	; ?> <?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?></a>

		<p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="<?php _e( 'Read more posts by ', 'vmw' )	; ?> <?php echo get_the_author_meta( 'display_name' ); ?>"><?php the_author(); ?></a></p>

		<p><small><?php echo get_the_author_meta( 'description' ); ?></small></p>

	</div>

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

		<?php get_template_part( 'parts/single/list', 'categories' ); ?>

		<?php get_template_part( 'parts/single/list', 'tags' ); ?>

		<?php get_template_part( 'parts/global/share', 'post' ); ?>

	</div>

</div>