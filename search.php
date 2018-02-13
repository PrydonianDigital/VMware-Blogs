<?php get_header(); ?>

<div class="row expanded animated fadeIn">

	<div class="small-12 medium-3 large-2 columns searchHelp">

		<h5 class="header show-for-small-only"><a data-toggle="filters" id="showHideFilters"><?php _e( 'Show Filters', 'vmw' ) ?></a></h5>

		<div class="filters hide-for-small-only" id="filters" data-toggler=".hide-for-small-only">

			<h5 class="header"><?php _e( 'Language', 'vmw' ) ?></h5>

			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

				<label class="hide">
					<span class="screen-reader-text"><?php _e( 'What are you looking for?', 'vmw' ) ?></span>
					<input type="search" class="search-field" placeholder="<?php _e( 'What are you looking for?', 'vmw' ) ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _e( 'What are you looking for?', 'vmw' ) ?>" />
				</label>

				<?php
					$engines = SWP()->settings['engines'];
					$current_engine = isset( $_GET['swpengine'] ) ? esc_attr( $_GET['swpengine'] ) : 'default';
			    ?>

				<select name="swpengine" id="swpengine">
					<?php foreach ( $engines as $engine => $engine_settings ) : ?>
						<option value="<?php echo esc_attr( $engine ); ?>"
							<?php selected( $current_engine, $engine ); ?>>
							<?php echo isset( $engine_settings['searchwp_engine_label'] ) ? esc_html( $engine_settings['searchwp_engine_label'] ) : 'English'; ?>
						</option>
					<?php endforeach; ?>
				</select>

				<input type="submit" class="button" value="<?php _e( 'Search', 'vmw' ) ?>" />

			</form>

			<h5 class="header"><?php _e( 'Priorities', 'vmw' ) ?></h5>

			<?php echo facetwp_display( 'facet', 'solutions' ); ?>

			<h5 class="header"><?php _e( 'Asset Type', 'vmw' ) ?></h5>

			<?php echo facetwp_display( 'facet', 'asset_type' ); ?>

			<h5 class="header"><?php _e( 'Categories', 'vmw' ) ?></h5>

			<?php echo facetwp_display( 'facet', 'categories' ); ?>

			<h5 class="header"><?php _e( 'Tags', 'vmw' ) ?></h5>

			<?php echo facetwp_display( 'facet', 'tags' ); ?>

			<h5 class="header"><?php _e( 'Results', 'vmw' ) ?></h5>

			<?php
				global $wp_query;
				echo $wp_query->found_posts . __( ' results found.', 'vmw' );
			?>

		</div>

	</div>

	<div class="small-12 medium-9 large-10 columns">

		<?php get_template_part( 'parts/global/search', 'form' ); ?>

		<div class="row expanded small-up-1 medium-up-2 large-up-3 align-center align-center align-stretch searchloop small-collapse" data-equalizer="row">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'parts/loop/loop', 'post' ); ?>

				<?php endwhile; ?>

				<?php else : ?>

					<div <?php post_class( 'column animated fadeIn text-center' ); ?>>

						<div class="shadow">

							<p class="lead"><?php _e( 'No results', 'vmw' ); ?></p>

						</div>

					</div>

				<?php endif; ?>

		</div>

		<?php get_template_part( 'parts/global/paginate', 'posts' ); ?>

	</div>

</div>


<?php get_footer(); ?>