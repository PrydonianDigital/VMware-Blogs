<h4><?php _e( 'My Downloads', 'vmw' ); ?></h4>

<div class="row expanded small-up-1 medium-up-2 align-center align-stretch newsloop" data-equalizer="row">

<?php
	$current_user = wp_get_current_user();
	$me = $current_user->user_email;
	$search_criteria = array(
		'status'        => 'active',
		'field_filters' => array(
			array(
				'key'   => '2',
				'value' => $me,
			),
		)
	);
	$entries = GFAPI::get_entries( 0, $search_criteria, null, $paging );
	foreach( $entries as $entry) {
		$form = GFAPI::get_form( $entry['form_id'] );
		echo '<div class="column"><div class="shadow"><div class="row"><div class="column" data-equalizer-watch="row">';
		$associated_post = get_page_by_title($form['title'], OBJECT, 'post');
		echo '<h4 class="entry-title">' . $form['title'] . '</h4>';
		$assetimg = get_post_meta( $associated_post->ID, '_post_wp_img', true ); echo '<img src="' . $assetimg . '" class="assetImg" />';
		$assetdesc = get_post_meta( $associated_post->ID, '_post_wp_desc', true ); echo nl2br( $assetdesc ) . '<br/>';
		foreach ( $form[ 'confirmations' ] as $key => $confirmation ) {
			echo $form[ 'confirmations' ][ $key ][ 'message' ] = $shortcode . $form[ 'confirmations' ][ $key ][ 'message' ];
		}
		echo '</div></div></div></div>';
	}

?>

</div>