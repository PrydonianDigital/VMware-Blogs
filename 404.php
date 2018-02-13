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

<?php get_template_part( 'parts/global/search', 'form' ); ?>

<div class="row expanded animated fadeIn" id="pagetitle">

	<div class="column authorName text-center">

		<h3 class="subheader"><?php _e( 'Page Not Found', 'vmw' ); ?></h3>

	</div>

</div>

<div class="row align-center collapse animated fadeIn">

	<div <?php post_class( 'column mainEntry' ); ?>>

		<div class="row">

			<div class="small-12 medium-2 columns lang text-center author">

			</div>

			<div class="small-12 medium-8 columns lang">

				<h3><?php _e( 'Sorry, the page you requested was not found.', 'vmw' ); ?></h3>

				<p><?php _e( 'If you\'re having trouble locating a destination on ', 'vmw'); ?> <?php echo get_bloginfo( 'name' ); ?> <?php _e(', try visiting the home page, using the menu at the top, or use the search bar above.', 'vmw' ); ?></p>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>