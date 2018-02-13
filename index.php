<?php get_header(); ?>

<?php
	if ( is_front_page() && is_home() ) {
?>
<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "WebSite",
	"url": "<?php echo get_bloginfo( 'url' ); ?>",
	"potentialAction": {
		"@type": "SearchAction",
		"target": "<?php echo get_bloginfo( 'url' ); ?>/?s={search_term_string}",
		"query-input": "required name=search_term_string"
	}
}
</script>
<?php
		get_template_part( 'parts/home/home', 'page' );

	} else {

		get_template_part( 'parts/loop/blog', 'page' );

	}
?>

<?php get_footer(); ?>