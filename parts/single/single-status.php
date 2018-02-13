<?php get_template_part( 'parts/single/post', 'header' ); ?>

<div class="row animated fadeIn">

	<div class="small-12 medium-2 columns lang text-center author">

		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="<?php _e( 'Read more posts by ', 'vmw' )	; ?> <?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?></a>

		<p><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" title="<?php _e( 'Read more posts by ', 'vmw' )	; ?> <?php echo get_the_author_meta( 'display_name' ); ?>"><?php the_author(); ?></a></p>

		<p><small><?php echo get_the_author_meta( 'description' ); ?></small></p>

	</div>

	<div class="small-12 medium-8 columns lang">

	<?
		$ageunix = get_the_time('U');
		$days_old_in_seconds = ((time() - $ageunix));
		$days_old = (($days_old_in_seconds/86400));
		if ($days_old > 365) {
			echo '<div class="callout alert"><i class="fas fa-exclamation-triangle"></i> ' . __( 'DISCLAIMER: this article is older than one year and may not be up to date with recent events or newly available information.', 'vmw' ) . '</div>';
		}
	?>

		<?php
			$vmworldstart = get_post_meta( $post->ID, '_post_start', true );
			$vmworldend = get_post_meta( $post->ID, '_post_end', true );
			$vmworldlocation = get_post_meta( $post->ID, '_post_location', true );
			$vmworldticket = get_post_meta( $post->ID, '_post_ticket', true );
			$place = get_post( $vmworldlocation );
			$city = get_post_meta( $place->ID, '_address_locality', true );
			$vmworldlocation = get_post_meta( $post->ID, '_post_location', true );
			$vmworldshow = get_post_meta( $post->ID, '_post_show', true );
			$place = get_post( $vmworldlocation );
			$url = get_post_meta( $place->ID, '_address_url', true );
			$street = get_post_meta( $place->ID, '_address_street', true );
			$city = get_post_meta( $place->ID, '_address_locality', true );
			$region = get_post_meta( $place->ID, '_address_region', true );
			$postcode = get_post_meta( $place->ID, '_address_postcode', true );
			$country = get_post_meta( $place->ID, '_address_country', true );
			$img = get_post_meta( $place->ID, '_address_img', true );
		?>

		<?php the_content(); ?>

		<h5><?php if( $vmworldstart != '' ) { ?><i class="far fa-calendar-alt"></i> <?php echo $vmworldstart; ?><?php } ?><?php if( $vmworldend != '' ) { ?> - <?php echo $vmworldend; ?><?php } ?><?php if( $vmworldlocation != '' ) { ?><?php if( $vmworldshow != 'on' ) { ?> | <i class="fas fa-map-marker-alt"></i> <?php echo $city; ?><?php } ?><?php } ?></h5>

		<?php
			if( $vmworldshow === 'on' ) {
		?>
		<div class="callout secondary">
			<div class="row small-up-1 medium-up-2">
				<div class="column">
					<h4><?php echo $place->post_title; ?></h4>
					<p><?php echo $street; ?><br/>
					<?php echo $city; ?><br/>
					<?php if( $region != '') { ?><?php echo $region; ?><br/><?php } ?>
					<?php echo $postcode; ?><br/>
					<?php echo $country; ?></p>
				</div>
				<div class="column">
					<?php if( $img != '') { echo '<img src="'. $img . '"/>'; } ?>
				</div>
			</div>
		</div>
		<?php
			}
		?>

		<?php if( $vmworldticket != '' ) { ?>
		<p><a class="button" target="_blank" href="<?php echo $vmworldticket; ?>"><i class="fas fa-ticket-alt"></i> <?php _e( 'Get your tickets', 'vmw' ); ?></a></p>
		<?php } ?>

		<?php get_template_part( 'parts/single/list', 'categories' ); ?>

		<?php get_template_part( 'parts/single/list', 'tags' ); ?>

		<?php get_template_part( 'parts/global/share', 'post' ); ?>

	</div>

</div>