<div class="row expanded small-up-1 medium-up-2 large-up-4 align-center align-stretch newsloop small-collapse" data-equalizer="row">

	<?php
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'posts_per_page'		=> 4,
			'post__in'				=> get_option( 'sticky_posts' ),
			'ignore_sticky_posts'	=> true,
			'orderby'				=> 'menu_order',
			'order'					=> 'ASC'
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

			get_template_part( 'parts/loop/loop', 'post' );

			endwhile;

			else :
	?>

		<div <?php post_class( 'column animated fadeIn text-center' ); ?>>

			<div class="shadow">

				<p class="lead"><?php _e( 'No posts found', 'vmw' ); ?></p>

			</div>

		</div>

	<?php endif; wp_reset_postdata(); ?>

</div>