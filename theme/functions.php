<?php
	/**
	 * booty functions file
	 *
	 * @package WordPress
	 * @subpackage booty
	 * @since booty 1.0
	 */

	define('FS_METHOD','direct'); // Hack to get plugins to install.

	/**
	 * Include library files like walkers, etc. 
	 */

	// require_once "lib/ncg_walker_comment.php";
	require_once "lib/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php";
	require_once "lib/bootstrap.php";
	require_once "lib/scripts.php";
	require_once "lib/template.php";

	/**
	 * Theme support
	 */
	// Thumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 600, 400, array( 'center', 'center')  ); // 300 pixels wide by 200 pixels tall, crop from the center
	// Feed links
	add_theme_support('automatic-feed-links');
	// Post Formats
	add_theme_support( 'post-formats', array( 'image', 'gallery' ) );

	// This is the custom header. By default it will use the image found in /images/logo.png, if any.
	$custom_header_args = array(
		// 'default-image' => get_template_directory_uri() . 'logo.png',
	);
	add_theme_support('custom-header', $custom_header_args);

	 // Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Support for Jetpack Infinite Scroll
	add_theme_support( 'infinite-scroll', array(
	    'container' => 'content',
	    'footer' => 'page',
	) );


	/**
	 * Support shortcode in custom excerpt (I had to do this for a client.)
	 * https://wordpress.org/support/topic/shortcodes-dont-work-in-excerpts
	 */
	function booty_shortcode($data) {
		// modify post object here
		$data = do_shortcode($data);
		return ($data);
	}

	add_action('the_excerpt', 'booty_shortcode');

	// And just in case, here's a function to strip the shortcode out again. Why? Who knows.
	function booty_strip_shortcode($data) {
		// modify post object here
		$data = strip_shortcodes($data);
		return $data;
	}

	/**
	 * Register main navigation menu
	 */
	register_nav_menu('main-menu', __('Your sites main nav menu', 'booty'));

	/**
	 * Register widget areas.
	 */
	if (function_exists('register_sidebars')) {
		register_sidebar(array(
			'id' => 'sidebar',
			'name' => __('Sidebar Widgets', 'booty'),
			'description' => __('Shows on the regular pages', 'booty')
		));
		register_sidebar(array(
			'id' => 'header-widgets',
			'name' => __('Header widgets', 'booty'),
			'description' => __('Above main menu', 'booty')
		));
		register_sidebar(array(
			'id' => 'hero-widgets',
			'name' => __('Hero Widgets', 'booty'),
			'description' => __('Below menu on the front page, this is for full-width widgets like a slider.', 'booty')
		));	
		register_sidebar(array(
			'id' => 'home-widgets',
			'name' => __('Home featured', 'booty'),
			'description' => __('This is the area right under the video on the home page.', 'booty')
		));

	}
	add_action('widgets_init', 'register_sidebars');


	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function booty_wp_title($title, $sep) {
		if (is_feed()) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$magic = get_bloginfo('name', 'display');

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())) {
			$magic .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if (($paged >= 2 || $page >= 2) && !is_404()) {
			$magic .= " $sep " . sprintf(__('Page %s', '_s'), max($paged, $page));
		}

		return $magic . $title;
	}

	add_filter('wp_title', 'booty_wp_title', 10, 2);

/**
 * Remove the damn admin bar margin
 */
	function booty_filter_head() {
		remove_action('wp_head', '_admin_bar_bump_cb');
		// Move the margin to a better element:
		 ?>
		<style type="text/css" media="screen">
			.admin-bar { margin-top: 32px !important; }
			@media screen and ( max-width: 782px ) {
				.admin-bar { margin-top: 46px !important; }
			}
		</style>
		<?php
	}
	add_action('get_header', 'booty_filter_head');

	/**
	 * This adds the custom post types to the blog feed.
	 */

	function booty_get_posts( $query ) {

		if ( is_home() && $query->is_main_query() )
			$query->set( 'post_type', array( 'post', 'track', 'project' ) ); // The custom post types you want to see in the feed.
		return $query;
	}
	add_filter( 'pre_get_posts', 'booty_get_posts' );