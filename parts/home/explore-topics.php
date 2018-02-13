<div class="row expanded">

	<div class="column">

		<h2 class="sectionTitle"><?php _e( 'Explore by topic', 'vmw' ); ?></h2>

	</div>

</div>

<div class="row expanded small-up-1 medium-up-2 large-up-4 align-center align-stretch termsLoop" data-equalizer="topic">

<?php
	$args = array(
		'parent' 		=> 0,
		'hide_empty'	=> true,
		'exclude'		=> array( 124, 208 ),
	);
	$terms = get_terms( 'priority', $args );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		$count = count( $terms );
		$i = 0;
		$term_list = '';
		foreach ( $terms as $term ) {
			$term_slug = $term->slug;
			$category = get_term_by('slug', $term_slug, 'priority');
			$translated_terms = pll_get_term_translations($category->term_id);
			$en_priority = $translated_terms[en];
			$en_term =  get_term($translated_terms[en], 'priority');
			$i++;
			$term_list .= '

				<div class="column term">
					<a href="' . esc_url( get_term_link( $term ) ) . '" title="' . esc_attr( sprintf( __( 'View all post filed under %s', 'vmw' ), $term->name ) ) . '">
					<div class="explore text-center ' . $term->slug . ' ' . $en_term->slug . '" >
						<h3>' . $term->name . '</h3>
						<p data-equalizer-watch="topic">' . esc_attr( sprintf( $term->description ) ) .'</p>
						<h4 class="text-center"><i class="fas fa-arrow-circle-right" aria-hidden="true"></i></h4>
					</div>
					</a>
				</div>';

		}
		echo $term_list;
	}
?>

</div>