<?php get_header(); ?>

<div class="row align-center collapse">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php
		global $postid;
		$postid = get_the_ID();
		$terms = get_the_terms( $post->ID, 'priority');
		foreach ( $terms as $term ) {
			$termID[] = $term->term_id;
		}
		$translated_terms = pll_get_term_translations($termID[0]);
		$en_priority = $translated_terms[en];
		$en_term =  get_term($translated_terms[en], 'priority');
	?>

	<div <?php post_class( 'column mainEntry priority-' . $en_term->slug ); ?> data-views="<?php echo vmw_get_post_views(get_the_ID()); ?>" data-langdir="<?php $dir = get_post_meta( $post->ID, '_lang_dir', true ); echo $dir; ?>">

		<?php vmw_set_post_views( get_the_ID() ); ?>

		<?php get_template_part( 'parts/single/single', get_post_format() ); ?>

	</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_template_part( 'parts/single/related', 'posts' ); ?>

<?php comments_template( $args, $postid ); ?>

<?php get_footer(); ?>