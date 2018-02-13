<div class="row expanded">

	<div class="column">

		<h2 class="sectionTitle"><?php _e( 'Latest Posts', 'vmw' ); ?></h2>

	</div>

</div>

<div class="row expanded small-up-1 medium-up-2 large-up-4 align-center align-stretch trendingloop small-collapse" data-equalizer="row">

	<?php
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'post_type'				=> array( 'post' ),
			'post__not_in'			=> get_option( 'sticky_posts' ),
			'posts_per_page'		=> 4,
			'ignore_sticky_posts'	=> true
		);
		$latest = new WP_Query( $args );
		if ( $latest->have_posts() ) : while ( $latest->have_posts() ) : $latest->the_post();

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