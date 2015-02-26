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
			<header class="site-header">
				<div class = "container">
					<div class = "row">
				    		<a id="site-title" class="col-md-3" href="<?php echo site_url()?>">
				            	<?php if (get_header_image()) : ?>
									<img id = "header-image" class = "img-responsive" 
									src="<?php echo get_header_image(); ?>" 
									alt="<?php echo bloginfo('site_title'); ?>" />				
								<?php else: ?>
								<?php echo bloginfo('site_title')?>
								<?php endif; ?>
				            </a>
						<div class = "col-md-9">
							<?php if ( function_exists( 'dynamic_sidebar' ) ) : ?>
								<div class="header-widgets">
									<ul class = "row">
									<?php dynamic_sidebar('header-widgets'); ?> 
								</ul>
								</div>
							<?php endif; ?> 
							<?php get_template_part('templates/menu'); ?>
						</div>
					</div>
				</div>
			</header>