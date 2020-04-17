<?php

function lbls_register_customizer( $wp_customize ) {
// Create custom panel.
	$wp_customize->add_panel( 'lightweight-branded-login', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Branded Login Screen', 'lightweight-branded-login-screen' ),
		'description'    => __( 'Define the images used for the login screen', 'lightweight-branded-login-screen' ),
	) );

	// Texts SECTION
	$wp_customize->add_section(
		'lbls_texts', array(
			'title'    => __('Texts','lightweight-branded-login-screen'),
			'panel'    => 'lightweight-branded-login',
			'priority' => 10
		)
	);
	// Add title setting
	$wp_customize->add_setting( 'lbls_title', array(
		 'type' 				 => 'option' // or option for non theme linked
		 //'sanitize_callback' => 'sanitize_text'
	) );
	// Add title control
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'lbls_title_control',
			array(
					'label'    => __( 'Title Text', 'lightweight-branded-login-screen' ),
					'section'  => 'lbls_texts',
					'settings' => 'lbls_title',
					'type'     => 'text'
			)
		)
	);
	// Add link setting
	$wp_customize->add_setting( 'lbls_link', array(
		 'type' 				 => 'option' // or option for non theme linked
		 //'sanitize_callback' => 'sanitize_text'
	) );
	// Add link control
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'lbls_link_control',
			array(
					'label'    => __( 'Link', 'lightweight-branded-login-screen' ),
					'section'  => 'lbls_texts',
					'settings' => 'lbls_link',
					'type'     => 'text'
			)
		)
	);

	// Images SECTION
	$wp_customize->add_section(
		'lbls_images', array(
			'title'     => __('Images', 'lightweight-branded-login-screen'),
			'panel'		=> 'lightweight-branded-login',
			'priority'  => 201
		)
	);
	// Add logo image setting
	$wp_customize->add_setting(
		'lbls_logo', array(
			'type' 				 => 'option', // or option for non theme linked
			'default'      => '',
			// 'transport'    => 'postMessage'
		)
	);
	// Add logo image control
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
	    $wp_customize,
			'lbls_logo_control',
			array(
					'label'    => __('Login Screen Logo', 'lightweight-branded-login-screen'),
					'description' => __('Recommended dimensions: 175px X 200px', 'lightweight-branded-login-screen'),
					'settings' => 'lbls_logo',
					'section'  => 'lbls_images'
			)
		)
	);
	// Add background image setting
	$wp_customize->add_setting(
		'lbls_background', array(
		  'type' 				 => 'option', // or option for non theme linked
			'default'      => '',
			// 'transport'    => 'postMessage'
		)
	);
	// Add background image control
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'lbls_background_control',
			array(
					'label'    => __('Background Image', 'lightweight-branded-login-screen'),
					'settings' => 'lbls_background',
					'section'  => 'lbls_images'
			)
		)
	);
	// Add background color darkness setting
	$wp_customize->add_setting(
		'lbls_background_opacity', array(
		  'type' 				 => 'option', // or option for non theme linked
			'default'      => '',
			// 'transport'    => 'postMessage'
		)
	);
	// Add background overlay opacity control
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'lbls_background_opacity_control',
			array(
					'label'    => __('Background opacity', 'lightweight-branded-login-screen'),
					'settings' => 'lbls_background_opacity',
					'section'  => 'lbls_images',
					'type'		 => 'number',
					'input_attrs' => array( 'min' => 0, 'max' => 1, 'step'  => .1 )
			)
		)
	);
}
add_action( 'customize_register', 'lbls_register_customizer' );

?>
