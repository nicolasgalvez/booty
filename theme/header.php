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
			<?php if ( is_active_sidebar( 'header-widgets' ) ) : ?>
				<section  id = "header-widgets">
					<ul>
					<?php dynamic_sidebar( 'header-widgets' ); ?>
					</ul>
				</section>
			<?php endif; ?>			
				<nav>
				<div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse"
	                        data-target=".navbar-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <div class = "brand">
	             		<p id="site-title">
			                <a href="<?php echo site_url()?>">
								<?php echo bloginfo('site_title')?>
		                	</a>
	                	</p>
	                	<p id="description">
	                		<?php echo bloginfo('description')?>	     
	                	</p>           
	                </div>

	            </div>
	                <?php    
						/**
						* Displays a navigation menu
						* @param array $args Arguments
						*/
						$args = array(
							'menu' => 'main-menu',
							'theme_location' => 'main-menu',
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
				</nav>
			</header>