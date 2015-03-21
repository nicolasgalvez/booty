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
	function booty_customize_register($wp_customize) {
		// get list of categories for dropdown
		$categories = get_categories();
		$cats = array('' => 'Select');
		foreach ($categories as $cat) {
			$cats[$cat -> slug] = $cat -> name;
		}

		$section = wp_get_theme() . '-section';

		$wp_customize -> add_panel(wp_get_theme() . '-panel', array(
			'priority' => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __(wp_get_theme() . "'s options"),
			'description' => 'Options built for you.',
		));
		$wp_customize -> add_section($section, array(
			'title' => __('Homepage Goodies', 'booty'),
			'priority' => 30,
			'panel' => wp_get_theme() . '-panel'
		));

		// Show map?
		$wp_customize -> add_setting('ncg_map_active', array(
			'default' => 'false',
			'transport' => 'refresh',
			'sanitize_callback' => 'booty_sanitize_layout'
		));

		$wp_customize -> add_control(new WP_Customize_Control($wp_customize, 'ncg_map_active', array(
			'label' => __('Show map?', 'booty'),
			'section' => $section,
			'settings' => 'ncg_map_active',
			'type' => 'radio',
			'choices' => array(
				'true' => __('Show', 'booty'),
				'false' => __('Hide', 'booty')
			)
		)));
		// The embed code for maps
		$wp_customize -> add_setting('ncg_map_embed', array(
			'default' => 'false',
			'transport' => 'refresh',
			'sanitize_callback' => 'booty_sanitize_layout'
		));

		$wp_customize -> add_control(new WP_Customize_Control($wp_customize, 'ncg_map_embed', array(
			'label' => __('Paste the embed code from google', 'booty'),
			'section' => $section,
			'settings' => 'ncg_map_embed',
			'type' => 'text'
		)));
		// Slider
		$wp_customize -> add_setting('ncg_slider_query', array(
			'default' => '',
			'transport' => 'refresh'
		));

		$wp_customize -> add_control(new WP_Customize_Control($wp_customize, 'ncg_slider_query', array(
			'label' => __('Post category for slider', 'booty'),
			'section' => $section,
			'settings' => 'ncg_slider_query',
			'type' => 'select',
			'choices' => $cats
		)));
		// Action content types
		$wp_customize -> add_setting('ncg_action', array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'booty_sanitize_layout'
		));

		$wp_customize -> add_control(new WP_Customize_Control($wp_customize, 'ncg_action', array(
			'label' => __('Call to action items', 'booty'),
			'section' => $section,
			'settings' => 'ncg_action',
			'type' => 'select',
			'choices' => $cats
		)));
	}

	add_action('customize_register', 'booty_customize_register');

	function booty_sanitize_layout($value) {
		// nothing here yet.
		return $value;
	}

	/**
	 * Print custom header styles
	 * @return void
	 */
	function booty_custom_header() {
		$styles = '';
		if ($color = get_header_textcolor()) {
			echo '<style type="text/css"> ' . '.site-header .logo .blog-name, .site-header .logo .blog-description {' . 'color: #' . $color . ';' . '}' . '</style>';
		}
	}

	add_action('wp_head', 'booty_custom_header', 11);

	$custom_bg_args = array(
		'default-color' => 'fba919',
		'default-image' => '',
	);
	add_theme_support('custom-background', $custom_bg_args);

	/* End Customizer */