<?php
/**
 * Customizer
 *
 * Customizer controls go here.
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package [Plugin/Theme/Etc]
 */
/**
 * Customizer Controls
 * Still need to add js refresh.
 */
function booty_customize_register( $wp_customize ) {
	// get list of categories for dropdown
	$categories = get_categories();
	$cats = array( '' => 'Select' );
	foreach ( $categories as $cat ) {
		$cats[$cat -> slug] = $cat -> name;
	}
	// add our own panel to the customizer.
	$themeName = wp_get_theme();
	$section = wp_get_theme() . '-section';
	$wp_customize -> add_panel( wp_get_theme() . '-panel', array(
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( wp_get_theme() . "'s options" ),
			'description' => 'Options built for you.',
		) );
	/**
	 * Images section
	 */
	$wp_customize -> add_section( $section, array(
			'title' => __( 'Icons/Images', 'booty' ),
			'priority' => 30,
			'panel' => wp_get_theme() . '-panel'
		) );

	$wp_customize -> add_setting( 'ncg_icon_large', array(
			'default' => 'false',
			'transport' => 'refresh',
			'sanitize_callback' => 'booty_sanitize_layout'
		) );
	$wp_customize -> add_setting( 'ncg_icon_small', array(
			'default' => 'false',
			'transport' => 'refresh',
			'sanitize_callback' => 'booty_sanitize_layout'
		) );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'ncg_icon_large',
			array(
				'label'      => __( 'Upload a logo for the full page view', "$themeName" ),
				'section'    => $section,
				'settings'   => 'ncg_icon_large',
				'context'    => 'your_setting_context'
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'ncg_icon_small',
			array(
				'label'      => __( 'Upload a smaller logo for the compact page view', "$themeName" ),
				'section'    => $section,
				'settings'   => 'ncg_icon_small',
				'context'    => 'your_setting_context'
			)
		)
	);


}

add_action( 'customize_register', 'booty_customize_register' );

function booty_sanitize_layout( $value ) {
	// nothing here yet.
	return $value;
}

/**
 * Print custom header styles
 *
 * @return void
 */
function booty_custom_header() {
	$styles = '';
	if ( $color = get_header_textcolor() ) {
		echo '<style type="text/css"> ' . '.site-header .logo .blog-name, .site-header .logo .blog-description {' . 'color: #' . $color . ';' . '}' . '</style>';
	}
}

add_action( 'wp_head', 'booty_custom_header', 11 );

$custom_bg_args = array(
	'default-color' => 'fba919',
	'default-image' => '',
);
add_theme_support( 'custom-background', $custom_bg_args );

/* End Customizer */
