<?php 
/**
 * Ajax
 *
 * Handles Ajax requests.
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package [Plugin/Theme/Etc]
 */
function ncg_ajax_scripts () {
	// embed the javascript file that makes the AJAX request
	wp_enqueue_script( 'ncg-ajax-request', get_bloginfo("template_directory") . '/js/ajax.js', array( 'jquery' ) );

	// Add the ajax URL to javascript using the ncgAjax namespace.
	// That means typing ncgAjax.ajaxurl in your browser's console should give you the url to admin-ajax.php.
	wp_localize_script( 'ncg-ajax-request', 'ncgAjax', array(
		// URL to wp-admin/admin-ajax.php to process the request
		'ajaxurl'          => admin_url( 'admin-ajax.php' ),

		// generate a nonce with a unique ID "ncg-post-comment-nonce"
		// so that you can check it later when an AJAX request is sent
		// Note: The ncg_get_posts function doesn't use it since we're just getting posts.
		'postCommentNonce' => wp_create_nonce( 'ncg-post-comment-nonce' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'ncg_ajax_scripts' );


// this function will be run for the action ncg_get_posts when a user is not logged in.
add_action( 'wp_ajax_nopriv_ncg_get_posts', 'ncg_get_posts' );
// this function will be run for the action ncg_get_posts when a user is logged in. 
// In this case, they both point to the same function.
add_action( 'wp_ajax_ncg_get_posts', 'ncg_get_posts' );

/**
 * Gets posts in Json format
 * Does shortcode. No nonce.
 */
function ncg_get_posts() {

	// Default Post Arguments.
	// I just copied this from the Codex.
	// https://codex.wordpress.org/Template_Tags/get_posts

	$args = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);

	// replace values in $args with values from request. This whitelists the request values btw.
	array_replace($args, $_REQUEST);

 	// Get the posts from the db:
 	$posts_result = get_posts($args);

 	// I found the shortcodes were not being excecuted.
 	// So I process shortcodes on content and excerpt.
 	foreach ($posts_result as $key => $post) {
 		$posts_result[$key]->post_content = do_shortcode($post->post_content);
 		$posts_result[$key]->post_excerpt = do_shortcode($post->post_excerpt);
 	}

	// set the content type.
 	header( "Content-Type: application/json" );
 	// send response.
 	echo json_encode($posts_result);
 	// exit or die to prevent a 0 from appearing at the end of the json object.
 	exit;
}