<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $post_type = get_post_type_object( get_post_type() ); ?>
		<div class="row">
			<div <?php post_class( 'column ajaxSearch' ); ?>>
				<h5>
					<a href="<?php echo esc_url( get_permalink() ); ?>">
						<?php the_title(); ?>
					</a>
				</h5>
			</div>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<p class="searchwp-live-search-no-results">
		<em><?php _e( 'No results found.', 'vmw' ); ?></em>
	</p>
<?php endif; ?>
