<?php

	// Register Carousel
	function carousel() {

		$labels = array(
			'name'                  => _x( 'Carousels', 'Carousel General Name', 'vmw' ),
			'singular_name'         => _x( 'Carousel', 'Carousel Singular Name', 'vmw' ),
			'menu_name'             => __( 'Carousels', 'vmw' ),
			'name_admin_bar'        => __( 'Carousel', 'vmw' ),
			'archives'              => __( 'Carousel Archives', 'vmw' ),
			'attributes'            => __( 'Carousel Attributes', 'vmw' ),
			'parent_item_colon'     => __( 'Parent Carousel:', 'vmw' ),
			'all_items'             => __( 'All Carousels', 'vmw' ),
			'add_new_item'          => __( 'Add New Carousel', 'vmw' ),
			'add_new'               => __( 'Add New', 'vmw' ),
			'new_item'              => __( 'New Carousel', 'vmw' ),
			'edit_item'             => __( 'Edit Carousel', 'vmw' ),
			'update_item'           => __( 'Update Carousel', 'vmw' ),
			'view_item'             => __( 'View Carousel', 'vmw' ),
			'view_items'            => __( 'View Carousels', 'vmw' ),
			'search_items'          => __( 'Search Carousels', 'vmw' ),
			'not_found'             => __( 'Not found', 'vmw' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'vmw' ),
			'featured_image'        => __( 'Featured Image', 'vmw' ),
			'set_featured_image'    => __( 'Set featured image', 'vmw' ),
			'remove_featured_image' => __( 'Remove featured image', 'vmw' ),
			'use_featured_image'    => __( 'Use as featured image', 'vmw' ),
			'insert_into_item'      => __( 'Insert into Carousel', 'vmw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'vmw' ),
			'items_list'            => __( 'Carousels list', 'vmw' ),
			'items_list_navigation' => __( 'Carousels list navigation', 'vmw' ),
			'filter_items_list'     => __( 'Filter Carousels list', 'vmw' ),
		);
		$args = array(
			'label'                 => __( 'Carousel', 'vmw' ),
			'description'           => __( 'Carousels', 'vmw' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'				=> 'dashicons-slides',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'carousel', $args );

	}
	add_action( 'init', 'carousel', 0 );

	// Register Location
	function location() {

		$labels = array(
			'name'                  => _x( 'Locations', 'Location General Name', 'vmw' ),
			'singular_name'         => _x( 'Location', 'Location Singular Name', 'vmw' ),
			'menu_name'             => __( 'Locations', 'vmw' ),
			'name_admin_bar'        => __( 'Location', 'vmw' ),
			'archives'              => __( 'Location Archives', 'vmw' ),
			'attributes'            => __( 'Location Attributes', 'vmw' ),
			'parent_item_colon'     => __( 'Parent Location:', 'vmw' ),
			'all_items'             => __( 'All Locations', 'vmw' ),
			'add_new_item'          => __( 'Add New Location', 'vmw' ),
			'add_new'               => __( 'Add New', 'vmw' ),
			'new_item'              => __( 'New Location', 'vmw' ),
			'edit_item'             => __( 'Edit Location', 'vmw' ),
			'update_item'           => __( 'Update Location', 'vmw' ),
			'view_item'             => __( 'View Location', 'vmw' ),
			'view_items'            => __( 'View Locations', 'vmw' ),
			'search_items'          => __( 'Search Locations', 'vmw' ),
			'not_found'             => __( 'Not found', 'vmw' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'vmw' ),
			'featured_image'        => __( 'Featured Image', 'vmw' ),
			'set_featured_image'    => __( 'Set featured image', 'vmw' ),
			'remove_featured_image' => __( 'Remove featured image', 'vmw' ),
			'use_featured_image'    => __( 'Use as featured image', 'vmw' ),
			'insert_into_item'      => __( 'Insert into Location', 'vmw' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'vmw' ),
			'items_list'            => __( 'Locations list', 'vmw' ),
			'items_list_navigation' => __( 'Locations list navigation', 'vmw' ),
			'filter_items_list'     => __( 'Filter Locations list', 'vmw' ),
		);
		$args = array(
			'label'                 => __( 'Location', 'vmw' ),
			'description'           => __( 'Locations', 'vmw' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'				=> 'dashicons-building',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'location', $args );

	}
	add_action( 'init', 'location', 0 );

