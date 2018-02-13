<?php
	/**
	*	Template Name: Reading List
	*/
?>

<?php get_header(); ?>

<div class="row align-center">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div <?php post_class( 'column myAccount' ); ?>>

		<?php
			if ( is_user_logged_in() ) {
				$current_user = wp_get_current_user();
		?>

			<h4><span class="morning hide"><?php _e( 'Good Morning', 'vmw' ); ?></span><span class="afternoon hide"><?php _e( 'Good Afternoon', 'vmw' ); ?></span><span class="evening hide"><?php _e( 'Good Evening', 'vmw' ); ?></span> <?php echo $current_user->display_name; ?></h4>

			<div class="row">

				<div class="small-12 medium-3 columns">

					<?php
						wp_nav_menu(array(
							'container'			=> false,
							'menu_id'			=> 'myAccount',
							'menu'				=> __( 'Account Menu', 'vmw' ),
							'menu_class'		=> 'vertical menu',
							'theme_location'	=> 'account',
						    'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
						));
					?>

				</div>

				<div class="small-12 medium-9 columns accountContent">

					<?php get_template_part( '/parts/my-account/reading', 'list' ); ?>

				</div>

			</div>

		<?php
			} else {
				get_template_part( '/parts/my-account/login', 'register' );
			}
		?>

	</div>

	<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>