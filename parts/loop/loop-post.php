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
	"description": "<?php echo strip_tags( get_the_excerpt() ); ?>",
	"articleBody": "<?php echo strip_tags( get_the_excerpt() ); ?>"
}
</script>
<?php
	}
?>
<?php
	$terms = get_the_terms( $post->ID, 'priority');
	if( $terms != '') {
		foreach ( $terms as $term ) {
			$termID[] = $term->term_id;
		}
		$translated_terms = pll_get_term_translations($termID[0]);
		$en_priority = $translated_terms[en];
		$en_term =  get_term($translated_terms[en], 'priority');
	}
?>
	<div <?php post_class( 'column animated fadeIn priority-' . $en_term->slug ); ?> data-langdir="<?php $dir = get_post_meta( $post->ID, '_lang_dir', true ); echo $dir; ?>">

		<div class="shadow" data-views="<?php echo vmw_get_post_views(get_the_ID()); ?>">

			<div class="row small-collapse">

				<div class="column postThumbnail" data-equalizer="postThumbnail">

					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">

						<?php
							if ( 'video' == get_post_format() ) {
						?>
						<h1 class="text-center"><i class="fab fa-youtube"></i></h1>

						<?php
							}
						?>
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'blogThumb' );
							} else {
						?>
								<img src="<?php bloginfo('template_directory'); ?>/img/default.jpg" alt="<?php the_title(); ?>" />
						<?php
							}
						?>
					</a>

				</div>
			</div>

			<div class="row">

				<div class="column postContent" data-equalizer="postContent" data-equalizer-watch="row">

					<small class="datePosted"><?php _e( 'Posted on', 'vmw' ); ?> <?php echo get_the_date( 'd/m/Y' ); ?> <?php _e( 'by', 'vmw' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="<?php _e( 'Read more posts by ', 'vmw' )	; ?> <?php echo get_the_author_meta( 'display_name' ); ?>"><?php the_author(); ?></a></small>

					<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>

					<?php
						$assettitle = get_post_meta( $post->ID, '_post_wp_title', true );
						$holtitle = get_post_meta( $post->ID, '_post_holtitle', true );
						$vmworldstart = get_post_meta( $post->ID, '_post_start', true );
						$vmworldend = get_post_meta( $post->ID, '_post_end', true );
						$vmworldlocation = get_post_meta( $post->ID, '_post_location', true );
						$vmworldticket = get_post_meta( $post->ID, '_post_ticket', true );
						$place = get_post( $vmworldlocation );
						$city = get_post_meta( $place->ID, '_address_locality', true );
					?>
					<?php if( $vmworldstart != '' ) { ?><h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><i class="far fa-calendar-alt"></i> <?php echo $vmworldstart; ?><?php } ?><?php if( $vmworldend != '' ) { ?> - <?php echo $vmworldend; ?><?php } ?><?php if( $city != '' ) { ?> | <i class="fas fa-map-marker-alt"></i> <?php echo $city; ?><?php } ?><?php if( $vmworldstart != '' ) { ?></h6></a><?php } ?>
					<?php
						if ( 'aside' == get_post_format() ) {
					?>
					<h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><i class="fas fa-download"></i> <?php echo $assettitle; ?></a></h6>
					<?php
						}
					?>
					<?php
						if ( 'link' == get_post_format() ) {
					?>
					<h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><i class="fas fa-flask"></i> <?php echo $holtitle; ?></a></h6>
					<?php
						}
					?>
					<?php the_excerpt(); ?>

				</div>

			</div>

			<div class="row">

				<div class="column text-left">

					<small class="subheader"><?php echo prefix_estimated_reading_time( get_the_content() ); ?> <?php _e( 'minute read', 'vmw' ); ?></small>

				</div>

				<div class="column text-right">

					<a class="button" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php _e( 'Read more', 'vmw' ); ?></a>

				</div>

			</div>

		</div>

	</div>