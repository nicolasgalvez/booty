<?php
/**
 * The minimal Menu
 *
 * Good for full page background videos and stuff.
 *
 * @link [URL]
 * @since [x.x.x (if available)]
 *
 * @package [Plugin/Theme/Etc]
 */?>
<nav class = "navbar-minimal">
	<div class = "container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<div class = "navbar-brand">
				<a id="site-title" href="<?php echo site_url()?>">
					<?php echo bloginfo( 'site_title' )?>
				</a>
			</div>
		</div>
		<?php
	/**
	 * Displays a navigation menu
	 *
	 * @param array   $args Arguments
	 */
	if (is_front_page()) {
		$menu = "home-menu";
	} else {
		$menu = "main-menu";
	}
	$args = array(
		'menu' => $menu,
		'theme_location' => $menu,
		'depth' => 2,
		'container' => 'div',
		'container_class' => 'collapse navbar-collapse',
		'container_id' => 'navbar-collapse',
		'menu_class' => 'nav navbar-nav navbar-right',
		'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
		'walker' => new wp_bootstrap_navwalker()
	);
	wp_nav_menu( $args );
	?>
	</div>
</nav>
