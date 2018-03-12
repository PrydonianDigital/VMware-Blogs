<?php

	function vmw_theme_customiser( $wp_customize ) {

		$wp_customize->add_panel( 'vmw_tracking', array(
			'priority'			=> 30,
			'theme_supports'	=> '',
			'title'				=> __( 'VMware Blogs Options', 'ch' ),
			'capability'		=> 'edit_theme_options',
		) );

		$wp_customize->add_section( 'vmw_tracking_section' , array(
			'title'				=> __( 'Tracking Info', 'ch' ),
			'priority'			=> 30,
			'description'		=> 'This section lets you add Google Tag Manager, Google Analytics and Facebook Pixel data.',
			'panel'				=> 'vmw_tracking',
		) );
		$wp_customize->add_setting( 'vmw_gtm' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vmw_gtm', array(
			'label'				=> __( 'Google Tag Manager ID', 'ch' ),
			'section'			=> 'vmw_tracking_section',
			'settings'			=> 'vmw_gtm',
			'type'				=> 'input',
			'default'			=> '',
		) ) );
		$wp_customize->add_setting( 'vmw_ga' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'vmw_ga', array(
			'label'				=> __( 'Google Analytics ID', 'ch' ),
			'section'			=> 'vmw_tracking_section',
			'settings'			=> 'vmw_ga',
			'type'				=> 'input',
			'default'			=> '',
		) ) );
	}
	add_action( 'customize_register', 'vmw_theme_customiser' );