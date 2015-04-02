<?php
/**
 * Scripts
 *
 * [Long Description.]
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package [Plugin/Theme/Etc]
 */

	/**
	 * Enqueue booty scripts
	 * @return void
	 */
	function booty_enqueue_scripts() {
		wp_enqueue_style('booty-styles', get_template_directory_uri() . '/css/theme.css', array(), '1.0');
		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0', true);
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0', true);
		wp_enqueue_script('smooth', get_template_directory_uri() . '/js/jquery.smooth-scroll.min.js', array(), '1.0', true);
		wp_enqueue_script('booty-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true);
		if (is_singular()) {
			wp_enqueue_script('comment-reply');
		}

		if(is_page_template('angular-template.php')) {
			wp_enqueue_script('angular', get_template_directory_uri() . '/js/vendor/angular/angular.min.js', array(), '1.0', true);
		}
	}

	add_action('wp_enqueue_scripts', 'booty_enqueue_scripts');

	/**
	 * Include editor stylesheets
	 * @return void
	 */
	function booty_editor_style() {
		add_editor_style('wp-editor-style.css');
	}

	add_action('init', 'booty_editor_style');
