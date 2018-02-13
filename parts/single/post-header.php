<div class="row small-collapse	animated fadeIn">

	<?php
		if( 'video' == get_post_format() ) {
	?>
		<div class="small-12 columns">
			<div class="responsive-embed widescreen">
	<?php
			$video = get_post_meta( $post->ID, '_post_video', true ); echo wp_oembed_get( $video );
	?>
			</div>
		</div>
	<?php
		} else {
	?>

	<div class="small-12 columns">

		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'header' );
			} else {
		?>
				<img src="<?php bloginfo('template_directory'); ?>/img/default.jpg" alt="<?php the_title(); ?>" />
		<?php
			}
		?>

	</div>

	<?php
		}
	?>

</div>

<div class="row small-collapse align-stretch animated fadeIn">

	<div class="small-2 columns header">

		<header></header>

	</div>

	<div class="small-8 columns header">

		<header>

			<h4 class="entry-title"><?php the_title(); ?></h4>

			<small class="datePosted"><?php _e( 'Posted on', 'vmw' ); ?> <?php the_date( 'd/m/Y' ); ?></small>

		</header>

	</div>

	<div class="small-2 columns header bookmark">

		<header>

			<?php if ( is_user_logged_in() ) { ?>

			<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="<?php _e( 'Add to Reading List', 'vmw' ); ?>">
				<?php echo do_shortcode( '[favorite_button]' ); ?>
			</span>

			<?php
				} else {
			?>
				<?php $page_translation = pll_get_post(97); $post = get_post($page_translation); $slug = $post->post_name; ?>
				<span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="<?php _e( 'Log In to add to Reading List', 'vmw' ); ?>">
					<a href="<?php echo get_bloginfo( 'url' ) . '/' . $slug; ?>" title="Login"><i class="fas fa-sign-in-alt"></i></a>
				</span>
			<?php
				}
			?>

		</header>

	</div>

</div>
<?php
	if( 'status' == get_post_format() ) {
		$vmworldstart = get_post_meta( $post->ID, '_post_start', true );
		$vmworldend = get_post_meta( $post->ID, '_post_end', true );
		$vmworldlocation = get_post_meta( $post->ID, '_post_location', true );
		$vmworldticket = get_post_meta( $post->ID, '_post_ticket', true );
		$place = get_post( $vmworldlocation );
		$url = get_post_meta( $place->ID, '_address_url', true );
		$street = get_post_meta( $place->ID, '_address_street', true );
		$city = get_post_meta( $place->ID, '_address_locality', true );
		$region = get_post_meta( $place->ID, '_address_region', true );
		$postcode = get_post_meta( $place->ID, '_address_postcode', true );
		$country = get_post_meta( $place->ID, '_address_country', true );
?>
<script type='application/ld+json'>
{
	"@context": "http://www.schema.org",
	"@type": "Event",
	"name": "<?php the_title(); ?>",
	"image": "<?php echo the_post_thumbnail_url(); ?>",
	"url": "<?php the_permalink(); ?>",
	"description": "<?php echo get_the_excerpt(); ?>",
	"startDate": "<?php echo $vmworldstart; ?>",
	"endDate": "<?php echo $vmworldend; ?>",
	"location": {
		"@type": "Place",
		"name": "<?php echo $place->post_title; ?>",
		"sameAs": "<?php echo $url; ?>",
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "<?php echo $street; ?>",
			"addressLocality": "<?php echo $city; ?>",
			"addressRegion": "<?php echo $region; ?>",
			"postalCode": "<?php echo $postcode; ?>",
			"addressCountry": "<?php echo $country; ?>"
		}
	}
}
 </script>
<?php
	} else {
?>
<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "Article",
	"mainEntityOfPage": "true",
	"headline": "<?php the_title(); ?>",
	"image": "<?php echo the_post_thumbnail_url(); ?>",
	"author": "<?php echo get_the_author(); ?>",
	"editor": "<?php the_modified_author(); ?>",
	"genre": "<?php $terms =	wp_get_post_terms( $post->ID, 'priority' ); foreach( $terms as $term ) { echo $term->name . ','; } ?>",
	"keywords": "<?php echo comma_tags( get_the_tags(), false ); ?>",
	"wordcount": "<?php if(function_exists('vmv_post_word_count')) { vmv_post_word_count(); }?>",
	"publisher": {
		"@type": "Organization",
		"name": "<?php echo get_bloginfo( 'name' ); ?>",
		"logo": {
			"@type": "imageObject",
			"url": "<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); echo $image[0]; ?>"
		}
	},
	"url": "<?php the_permalink(); ?>",
	"datePublished": "<?php echo get_the_date( 'Y-m-d' ); ?>",
	"dateCreated": "<?php echo get_the_date( 'Y-m-d' ); ?>",
	"dateModified": "<?php echo get_the_modified_date( 'Y-m-d' ); ?>",
	"description": "<?php echo get_the_excerpt(); ?>",
	"articleBody": "<?php echo get_the_excerpt(); ?>"
}
</script>
<?php
	}
?>