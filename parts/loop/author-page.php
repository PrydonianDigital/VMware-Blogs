<?php get_template_part( 'parts/global/search', 'form' ); ?>

<div class="row expanded">

	<div class="column authorName">

		<h3 class="subheader"><?php _e( 'Other posts by ', 'vmw' )	; ?><?php echo get_the_author_meta( 'display_name' ); ?></h3>

	</div>

</div>

<div class="row expanded small-up-1 medium-up-4 align-center align-stretch newsloop small-collapse" data-equalizer="row">

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