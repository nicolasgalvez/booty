<?php
	/**
	 * ncgbase template for displaying the header
	 *
	 * @package WordPress
	 * @subpackage ncgbase
	 * @since ncgbase 1.0
	 */
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="ie ie-no-support" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7]>         <html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9]>         <html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri();?>/js/html5shiv.js"></script>
		<![endif]-->
	<?php wp_head(); ?>
	</head>
	<body id = "top" <?php body_class(); ?>>
		<div class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>
			<header class="site-header" role="banner">
				<?php    /**
					* Displays a navigation menu
					* @param array $args Arguments
					*/
					$args = array(
						'theme_location' => '',
						'menu' => '',
						'container' => 'div',
						'container_class' => 'menu-{menu-slug}-container',
						'container_id' => '',
						'menu_class' => 'menu',
						'menu_id' => '',
						'echo' => true,
						'fallback_cb' => 'wp_page_menu',
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth' => 0,
						'walker' => ''
					);
				
					wp_nav_menu( $args );
					?>	
			</header>