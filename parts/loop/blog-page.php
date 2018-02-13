<?php get_template_part( 'parts/global/search', 'form' ); ?>

<div class="row expanded">

	<div <?php post_class( 'column authorName text-center tax-header' ); ?>>

		<h3 class="subheader">
		<?php
			if( is_category() ) {
				single_cat_title();
			}
			if( is_tax( 'priority' ) ) {
				single_term_title();
			}
			if( is_tag() ) {
				single_tag_title();
			}
			if( has_post_format() ) {
				if( 'aside' == get_post_format() ) {
					_e( 'White Papers', 'vmw' );
				}
				if( 'video' == get_post_format() ) {
					_e( 'Videos', 'vmw' );
				}
				if( 'status' == get_post_format() ) {
					_e( 'VMWorld', 'vmw' );
				}
				if( 'link' == get_post_format() ) {
					_e( 'Hands-On Labs', 'vmw' );
				}
			}
		?>
		</h3>

		<?php
			if( is_tax( 'priority' ) ) {
				echo term_description( $term_id, $taxonomy );
			}
		?>

	</div>

</div>

<div class="row expanded small-up-1 medium-up-4 align-center align-stretch newsloop" data-equalizer="row">


	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'parts/loop/loop', 'post' ); ?>

	<?php endwhile; ?>

	<?php else : ?>

		<div <?php post_class( 'column animated fadeIn text-center' ); ?>>

			<div class="shadow">

				<p class="lead"><?php _e( 'No posts found', 'vmw' ); ?></p>

			</div>

		</div>

	<?php endif; ?>

</div>

<?php get_template_part( 'parts/global/paginate', 'posts' ); ?>