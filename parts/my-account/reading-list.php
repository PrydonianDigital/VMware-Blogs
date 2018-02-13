<h4><?php _e( 'My Reading List', 'vmw' ); ?></h4>

<div class="row expanded small-up-1 medium-up-2 align-center align-stretch newsloop" data-equalizer="row">

	<?php
		$favorites = get_user_favorites();
		if ( $favorites ) :
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$favorites_query = new WP_Query(array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'ignore_sticky_posts' => true,
			'post__in' => $favorites,
			'paged' => $paged
		));
		if ( $favorites_query->have_posts() ) : while ( $favorites_query->have_posts() ) : $favorites_query->the_post();
			get_template_part( 'parts/loop/loop', 'post' );
		endwhile;
		next_posts_link( __( 'Older Favorites' ,'vmw' ), $favorites_query->max_num_pages );
		previous_posts_link( __( 'Newer Favorites' ,'vmw' ) );
		endif; wp_reset_postdata();
		else :
			_e( 'No articles added to your Reading List yet.' , 'vmw' );
		endif;
	?>

</div>