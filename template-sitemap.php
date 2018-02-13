<?php
	/**
	*	Template Name: Sitemap
	*/
?>

<?php get_header(); ?>

<div class="row expanded" id="pagetitle">

	<div class="column authorName text-center">

		<h3 class="subheader"><?php the_title(); ?></h3>

	</div>

</div>

<div class="row align-center collapse">

	<div <?php post_class( 'column mainEntry' ); ?>>

		<div class="row sitemap medium-unstack">

			<div class="column">

				<h2 class="sectionTitle"><?php _e( 'Pages', 'vmw' ); ?></h2>

				<ul>
					<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
				<ul>

			</div>

			<div class="column">

				<h2 class="sectionTitle"><?php _e( 'Posts', 'vmw' ); ?></h2>

					<?php
						$types = get_terms( array(
							'taxonomy'			=> 'priority',
							'hide_empty'		=> true,
						));
						foreach($types as $type) {
							wp_reset_query();
							$args = array(
								'post_type'			=> 'post',
								'tax_query'			=> array(
									array(
										'taxonomy'	=> 'priority',
										'field'		=> 'slug',
										'terms'		=> $type->slug,
									),
								),
							);
							$term_slug = $type->slug;
							$category = get_term_by('slug', $term_slug, 'priority');
							$translated_terms = pll_get_term_translations($category->term_id);
							$en_priority = $translated_terms[en];
							$en_term =  get_term($translated_terms[en], 'priority');
					?>
							<h4 class="<?php echo $type->slug; ?> <?php echo $en_term->slug; ?>"><?php echo $type->name; ?></h4>
					<?php
							$loop = new WP_Query($args);
							if($loop->have_posts()) :
					?>
					<ul class="sitemap">
					<?php
							while ($loop->have_posts()) : $loop->the_post();
					?>

							<li <?php post_class( 'priority-' . $en_term->slug ); ?>>

								<?php
									if( 'aside' == get_post_format() ) {
								?>
									<i class="fas fa-download"></i>
								<?php
									}
									if( 'video' == get_post_format() ) {
								?>
									<i class="fab fa-youtube"></i>
								<?php
									}
									if( 'status' == get_post_format() ) {
								?>
									<i class="far fa-calendar-alt"></i>
								<?php
									}
									if( 'link' == get_post_format() ) {
								?>
									<i class="fas fa-flask"></i>
								<?php
									}
									if( false == get_post_format() ) {
								?>
									<i class="far fa-newspaper"></i>
								<?php
									}
								?>

								<a href="<?php echo get_permalink(); ?>">

									<?php echo get_the_title(); ?>

								</a>

								<br /><small class="subheader"><?php the_date( 'd/m/Y' ); ?></small>

							</li>

					<?php
							endwhile;
					?>
					</ul>
					<?php
							endif;
					?>

					<?php
						}
					?>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>