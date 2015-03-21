<?php
/**
 * Bootstrap Functions Helpers
 *
 * This is where we do some things that will help us with bootstrap 3 theme support.
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package Booty
 */

	/**
	 * Add BootStrap 3 responsive embed to iframes and stuff objects.
	 */
	function ncg_embed_html($html, $url, $attr, $post_id) {
		return '<div class="embed-container">' . $html . '</div>';
	}

	add_filter('embed_oembed_html', 'ncg_embed_html', 99, 4);

	/**
	 * For BootStrap. Set .active on first post. Not sure we need that though...
	 */
	function wps_first_post_class($classes) {
		global $wp_query;
		if (0 == $wp_query -> current_post) {
			$classes[] = 'active';
		}
		return $classes;
	}
	add_filter('post_class', 'wps_first_post_class');
	
	/**
	 * Bootstrap 3 Comments
	 * @param  array $args 'comment_field' is a string containing the format for the textarea and label (including parent div)
	 * @return array       [description]
	 */
	function bootstrap3_comment_form( $args ) {
	    $args['comment_field'] = '<div class="form-group comment-form-comment">
	            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
	            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
	        </div>';
	    return $args;
	}
	add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );

	/**
	 * For the non-textarea fields. Go figure.
	 * @param  array $fields array of fields => formating
	 * @return array         $fields
	 */
function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
    );
    
    return $fields;
}
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );

	/**
	 * Remove jetpack Form stylesheet
	 * This is for using the contact form for jetpack.
	 */
	function remove_grunion_style() {
		wp_deregister_style('grunion.css');
	}

	add_action('wp_print_styles', 'remove_grunion_style');