<?php

function lbls_register_customizer( $wp_customize ) {
// Create custom panel.
	$wp_customize->add_panel( 'lightweight-branded-login', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __( 'Branded Login Screen', 'lightweight_branded_login' ),
		'description'    => __( 'Define the images used for the login screen', 'lightweight_branded_login' ),
	) );

	// Add Texts
	// Add section.
	$wp_customize->add_section(
		'lbls_texts', array(
			'title'    => __('Texts','lightweight_branded_login'),
			'panel'    => 'lightweight-branded-login',
			'priority' => 10
		)
	);
	// Add setting
	$wp_customize->add_setting( 'lbls_title', array(
		 'type' 				 => 'option' // or option for non theme linked
		 //'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'lbls_title_control',
			array(
					'label'    => __( 'Title Text', 'lightweight_branded_login' ),
					'section'  => 'lbls_texts',
					'settings' => 'lbls_title',
					'type'     => 'text'
			)
		)
	);
	// Add setting
	$wp_customize->add_setting( 'lbls_link', array(
		 'type' 				 => 'option' // or option for non theme linked
		 //'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'lbls_link_control',
			array(
					'label'    => __( 'Link', 'lightweight_branded_login' ),
					'section'  => 'lbls_texts',
					'settings' => 'lbls_link',
					'type'     => 'text'
			)
		)
	);

	// Add logo
	// Add section
	$wp_customize->add_section(
		'lbls_images', array(
			'title'     => __('Images', 'lightweight_branded_login'),
			'panel'		=> 'lightweight-branded-login',
			'priority'  => 201
		)
	);
	// Add setting
	$wp_customize->add_setting(
		'lbls_logo', array(
			'type' 				 => 'option', // or option for non theme linked
			'default'      => '',
			// 'transport'    => 'postMessage'
		)
	);
	// Add control
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
	    $wp_customize,
			'lbls_logo_control',
			array(
					'label'    => __('Lighweight Branded Login Screen Logo', 'lightweight_branded_login'),
					'description' => __('Recommended dimensions: 175px X 200px', 'lightweight_branded_login'),
					'settings' => 'lbls_logo',
					'section'  => 'lbls_images'
			)
		)
	);
	$wp_customize->add_setting(
		'lbls_background', array(
		  'type' 				 => 'option', // or option for non theme linked
			'default'      => '',
			// 'transport'    => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'lbls_background_control',
			array(
					'label'    => __('Lighweight Branded Login Screen Background', 'lightweight_branded_login'),
					'settings' => 'lbls_background',
					'section'  => 'lbls_images'
			)
		)
	);
}
add_action( 'customize_register', 'lbls_register_customizer' );



  /*************************************************/
	/*        IN TEMPLATE FILE                       */
	/*************************************************/

  // to display the image url
	// <img class="logo--footer" src="<?php echo get_theme_mod( 'winedata_footer_logo');
?>
