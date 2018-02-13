<?php
	/**
	*	Template Name: Reset Password
	*/
?>

<?php get_header(); ?>

<div class="row align-center">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div <?php post_class( 'column myAccount' ); ?>>

		<?php get_template_part( '/parts/my-account/reset', 'password' ); ?>

	</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>