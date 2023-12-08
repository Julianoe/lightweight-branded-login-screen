<?php

function lbls_register_customizer( $wp_customize ) {
// Create custom panel.
	$wp_customize->add_panel( 'lightweight-branded-login', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Branded Login Screen', 'lightweight-branded-login-screen' ),
		'description'    => __( 'Define the images used for the login screen. Simple and lightweight customisation.', 'lightweight-branded-login-screen' ),
	) );

	// Logo SECTION
	$wp_customize->add_section(
		'lbls_logo_section', array(
			'title'    => __('Logo','lightweight-branded-login-screen'),
			'panel'    => 'lightweight-branded-login',
			'priority' => 10
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
					'section'  => 'lbls_logo_section'
			)
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
					'description' => __('Text that is displayed when the logo is not.', 'lightweight-branded-login-screen'),
					'section'  => 'lbls_logo_section',
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
					'description' => __('Input the link the user will be directed to upon clicking the logo on the wp-login page.', 'lightweight-branded-login-screen'),
					'section'  => 'lbls_logo_section',
					'settings' => 'lbls_link',
					'type'     => 'text'
			)
		)
	);


	// Background SECTION
	$wp_customize->add_section(
		'lbls_background_section', array(
			'title'     => __('Background', 'lightweight-branded-login-screen'),
			'panel'		=> 'lightweight-branded-login',
			'priority'  => 201
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
					'section'  => 'lbls_background_section'
			)
		)
	);
	// Add background color
	$wp_customize->add_setting(
		'lbls_background_color', array(
			'type' 				 => 'option', // or option for non theme linked
			'default'      => '',
			// 'transport'    => 'postMessage'
		)
	);
	// Add background color
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lbls_background_color_control',
			array(
					'label'    => __('Colored background layer color', 'lightweight-branded-login-screen'),
					'description' => __('A color to apply over the background wether it has an image or not. Defaults to black.', 'lightweight-branded-login-screen'),
					'settings' => 'lbls_background_color',
					'section'  => 'lbls_background_section'
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
					'label'    => __('Colored background layer opacity', 'lightweight-branded-login-screen'),
					'description' => __('Defaults to 0.5 when background color is defined.', 'lightweight-branded-login-screen'),
					'settings' => 'lbls_background_opacity',
					'section'  => 'lbls_background_section',
					'type'		 => 'number',
					'input_attrs' => array( 'min' => 0, 'max' => 1, 'step'  => .1 )
			)
		)
	);
}
add_action( 'customize_register', 'lbls_register_customizer' );

?>
