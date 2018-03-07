<div class="row expanded small-collapse">

	<div class="column">

		<div class="owl-carousel" role="region">

			<?php
				$args = array(
					'posts_per_page'	=> 4,
					'post_type'			=> 'carousel',
				);
				$carousel = new WP_Query( $args );
				if ( $carousel->have_posts() ) : while ( $carousel->have_posts() ) : $carousel->the_post();
				$url = get_post_meta( $post->ID, '_carousel_url', true );
			?>

			<div data-langdir="<?php $dir = get_post_meta( $post->ID, '_lang_dir', true ); echo $dir; ?>">

				<?php if( $url !='' ) { ?>
				<a href="<?php echo $url; ?>">
				<?php
					}
				?>

					<?php the_post_thumbnail( 'carousel' ); ?>

					<div class="row slideOverlay show-for-medium">

						<div class="column">

							<h2 class="h1"><?php the_title(); ?></h2>

							<p class="lead"><?php $blurb = get_post_meta( $post->ID, '_carousel_blurb', true ); echo $blurb; ?></p>

						</div>

					</div>


					<div class="row expanded slideOverlay show-for-small-only">

						<div class="column">

							<h2 class="h1"><?php the_title(); ?></h2>

							<p class="lead"><?php $blurb = get_post_meta( $post->ID, '_carousel_blurb', true ); echo $blurb; ?></p>

						</div>

					</div>

				<?php if( $url !='' ) { ?>
				</a>
				<?php
					}
				?>

			</div>

			<?php endwhile; ?>

			<?php else : ?>

				<div <?php post_class( 'noCarousel' ); ?>>

					<div class="shadow">

						<p class="lead hide"><?php _e( 'No posts found', 'vmw' ); ?></p>

					</div>

				</div>

			<?php endif; wp_reset_postdata(); ?>

		</div>

	</div>

</div>