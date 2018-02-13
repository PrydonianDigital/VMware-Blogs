<?php

	function remove_author_publish() {
	    $contributor = get_role( 'author' );
	    $contributor->remove_cap( 'publish_posts' );
	}
	if ( current_user_can( 'author' ) ) {
	    add_action( 'admin_init', 'remove_author_publish' );
	}