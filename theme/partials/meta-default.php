<?php
/**
 * Default style meta info
 *
 * [Long Description.]
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package [Plugin/Theme/Etc]
 */

echo '<div class = "meta">';
echo '<i class = "glyphicon glyphicon-time"></i> Posted: ' . get_the_time( get_option( 'date_format' ) ) . '. ';
if ( get_the_category_list() ) {
	the_category( ', ' );
}
if ( get_the_tag_list() && ( is_single() || is_page() ) ) {
	echo '<div class = "tags">';
	echo the_tags( '<span><i class = "glyphicon glyphicon-tags"></i> Tags: ' );
	echo '</div>'; // meta-tags
}
edit_post_link( __( ' (edit)', 'booty' ), ' <span class="edit-link"><i class = "glyphicon glyphicon-pencil"></i> ', ' </span>' );
echo '</div>'; // meta
