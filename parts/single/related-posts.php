<div class="row">

	<div class="column">

		<h4 class="sectionTitle"><?php _e( 'Related Articles', 'vmw' ); ?></h4>

	</div>

</div>

<div class="row expanded small-up-1 medium-up-2 large-up-4 align-center align-stretch newsloop small-collapse" data-equalizer="row">
<?php
	$orig_post = $post;
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if ($tags) {
		$tag_ids = array();
		foreach( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
		$args = array(
			'tag__in'			=> $tag_ids,
			'post__not_in'		=> array($post->ID),
			'posts_per_page'	=> 3,
			'orderby'			=> 'rand',
			'caller_get_posts'	=> 1
		);
		$related_posts = new wp_query( $args );
		if( $related_posts->have_posts() ) : while( $related_posts->have_posts() ) : $related_posts->the_post();

			get_template_part( 'parts/loop/loop', 'post' );

		endwhile;

		endif;

	} else {
?>
	<h6 class="subheader"><?php _e( 'No related posts found', 'vmw' ); ?></h6>
<?php
	}
	$post = $orig_post;
	wp_reset_query();
?>
</div>