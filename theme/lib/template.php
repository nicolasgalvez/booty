<?php
/**
 * Template functions
 *
 * Somehow adds a slider field to posts for carousels
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package [Plugin/Theme/Etc]
 */

/**
 * Prints out the post thumb and wrapper
 *
 * @return [type] [description]
 */
function booty_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular() ) :
		return; // lets just do this for now.
?>
			<?php else :?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php
	the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
?>
				</a>
			</div><!-- .post-thumbnail -->
		<?php endif; // End is_singular()
	//global $post;
	//$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post -> ID), $size);
	//echo $thumb['0'];
}

/**
 * ACF slider support. Uses 'get_field' to look for an image.
 * returns true if image found, else checks for a thumbnail image to use.
 *
 * @return bool
 */
function get_slider_image() {
	// check if ACF or Jetpack has been activated by looking for the get_field function.
	if ( function_exists( 'get_field' ) ) {
		$image = get_field( 'slider_image' );
		if ( is_array( $image ) ) {
			echo $image['url'];
			return true;
		}
	}
	// Default to the thumbnail as a bg-image.
	if ( has_post_thumbnail() ) {
		booty_post_thumbnail();
		return true;
	} else
		return false;
}
/**
 * Echos copyright template
 * This is for backwards compatibility. Going to move all to partial function.
 *
 * @param string  $slug default = "default"
 * @return void
 */
function booty_copyright( $slug = 'default' ) {
	get_template_part( 'partials/copyright', $slug );
}
function booty_entry_meta( $slug = 'default' ) {
	get_template_part( 'partials/meta', $slug );
}
/**
 * Gets a template part from the partials dir.
 * Just a wrapper now. But I figure I might need some special logic down the line.
 *
 * @param string  $slug Required. first section of php filename
 * @param string  $name Optional. Second part. File will be: slug-name.php
 * @param Mixed   $vars Optional. Vars to pass to slug-name.php
 * @return [type]       [description]
 */
function booty_partial( $slug, $name = "", $vars ) {
	// if any vars are passed, give them to the partial.
	// The partial is required, so it doesn't have access to any variables unless global is used or the set_query_var fuction.
	if ( isset( $vars ) ) {
		set_query_var( 'query_vars', $vars );
	}
	get_template_part( "partials/$slug", $name );
}
