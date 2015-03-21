<?
/**
 * Cosmos style meta info
 *
 * [Long Description.]
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package [Plugin/Theme/Etc]
 */
	/**
	 * Displays meta information for a post
	 * @return void
	 */
	function booty_entry_meta() {
		echo '<div class = "meta-time">';
			echo '<i class = "glyphicon glyphicon-time"></i> Ansible Telemetry: <br>' . get_the_time(get_option('date_format')) . '.';
			edit_post_link(__(' (edit)', 'booty'), '<br><span class="edit-link"><i class = "glyphicon glyphicon-pencil"></i> ', '</span>');
		echo '</div>'; // meta-time
		if(get_the_category_list()) {
			echo '<div class = "meta-category">';
			echo '<p>OS/Meta-Classification:</p>'. get_the_category_list();
			echo '</div>'; // meta-category
		}
		if(get_the_tag_list()) {
			echo '<div class = "meta-tags">';
			echo get_the_tag_list('<p><i class = "glyphicon glyphicon-tags"></i> OS/tag/parse:</p><ul><li>','</li><li>','</li></ul>');
			echo '</div>'; // meta-tags
		}
	}