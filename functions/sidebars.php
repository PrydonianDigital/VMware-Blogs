<?php

	function vmw_sidebars() {
		$args = array(
			'id'			=> 'header',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer 1 Widgets', 'vmw' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer2',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer 2 Widgets', 'vmw' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'footer3',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Footer 3 Widgets', 'vmw' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
		$args = array(
			'id'			=> 'downloads',
			'class'		 => 'menu vertical',
			'name'		  => __( 'Downloads', 'vmw' ),
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		);
		register_sidebar( $args );
	}
	add_action( 'widgets_init', 'vmw_sidebars' );