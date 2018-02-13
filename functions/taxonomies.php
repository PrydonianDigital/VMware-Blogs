<?php

	// Register Priorities Taxonomy
	function tier_one() {
		$labels = array(
			'name'							=> _x( 'Priorities', 'Taxonomy General Name', 'vmw' ),
			'singular_name'					=> _x( 'Priority', 'Taxonomy Singular Name', 'vmw' ),
			'menu_name'						=> __( 'Priorities', 'vmw' ),
			'all_items'						=> __( 'All Priorities', 'vmw' ),
			'parent_item'					=> __( 'Parent Priority', 'vmw' ),
			'parent_item_colon'				=> __( 'Parent Priority:', 'vmw' ),
			'new_item_name'					=> __( 'New Priority', 'vmw' ),
			'add_new_item'					=> __( 'Add New Priority', 'vmw' ),
			'edit_item'						=> __( 'Edit Priority', 'vmw' ),
			'update_item'					=> __( 'Update Priority', 'vmw' ),
			'view_item'						=> __( 'View Priority', 'vmw' ),
			'separate_items_with_commas'	=> __( 'Separate Priorities with commas', 'vmw' ),
			'add_or_remove_items'			=> __( 'Add or remove Priorities', 'vmw' ),
			'choose_from_most_used'			=> __( 'Choose from the most used', 'vmw' ),
			'popular_items'					=> __( 'Popular Priorities', 'vmw' ),
			'search_items'					=> __( 'Search Priorities', 'vmw' ),
			'not_found'						=> __( 'Not Found', 'vmw' ),
			'no_terms'						=> __( 'No items', 'vmw' ),
			'items_list'					=> __( 'Priorities list', 'vmw' ),
			'items_list_navigation'			=> __( 'Priorities list navigation', 'vmw' ),
		);
		$args = array(
			'labels'						=> $labels,
			'hierarchical'					=> true,
			'public'						=> true,
			'show_ui'						=> true,
			'show_admin_column'				=> true,
			'show_in_nav_menus'				=> true,
			'show_tagcloud'					=> true,
			'show_in_rest'					=> true,
			'rewrite'						=> array('slug' => 'priority'),
		);
		register_taxonomy( 'priority', array( 'post' ), $args );
	}
	add_action( 'init', 'tier_one', 0 );