<?php
/**
 * WooCommerce support
 *
 * [Long Description.]
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package [Plugin/Theme/Etc]
 */
	/*
	 * WooCommerce
	 * Some basic BootStrap support.
	 */
	// Customize the WooCommerce breadcrumb
	if (!function_exists('woocommerce_breadcrumb')) {
		function woocommerce_breadcrumb($args = array()) {

			$defaults = array(
				'delimiter' => '<span class="divider">Delimiter</span>',
				'wrap_before' => '<ol class="breadcrumb">',
				'wrap_after' => '</ol>',
				'before' => '<li>',
				'after' => '</li>',
				'home' => null
			);

			$args = wp_parse_args($args, $defaults);
			// Don't display on product single page
			if (is_singular('product')) {
			} else {
				wc_get_template('global/breadcrumb.php', $args);
			}
		}

	}