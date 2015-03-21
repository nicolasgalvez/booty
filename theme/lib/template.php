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
	 * @return bool
	 */
	function get_slider_image() {
		// check if ACF or Jetpack has been activated by looking for the get_field function.
		if (function_exists('get_field')) {
			$image = get_field('slider_image');
			if (is_array($image)) {
				echo $image['url'];
				return true;
			}
		}
		// Default to the thumbnail as a bg-image.
		if (has_post_thumbnail()) {
			booty_post_thumbnail();
			return true;
		} else
			return false;
	}
	/**
	 * Echos copyright template
	 * @param  string $name default = "default"
	 * @return void
	 */
	function booty_copyright($name = 'default') {
		get_template_part('partials/copyright', $name );
	}
	function booty_entry_meta($name = 'default') {
		get_template_part('partials/meta', $name );
	}

