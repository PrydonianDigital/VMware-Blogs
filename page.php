<?php get_header(); ?>

<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "WebPage",
	"name": "<?php the_title(); ?>",
	"url": "<?php the_permalink(); ?>",
	"description": "<?php get_the_excerpt(); ?>"
}
</script>

<div class="row expanded animated fadeIn" id="pagetitle">

	<div class="column authorName text-center">

		<h3 class="subheader"><?php the_title(); ?></h3>

	</div>

</div>

<div class="row align-center collapse animated fadeIn">

	<div <?php post_class( 'column mainEntry' ); ?>>

		<div class="row">

			<div class="small-12 medium-2 columns lang text-center author">

			</div>

			<div class="small-12 medium-8 columns lang">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>

				<?php endif; ?>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>