<?php
/**
 * Booty Index template
 *
 * @package WordPress
 * @subpackage Booty
 * @since Booty 1.0
 */

get_header(); ?>

	<div id="content" class="content-area">
		<main id="main" class="site-main" role="main">
		<!-- Begin the Primary section -->
		<section id = "primary">
			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'booty' ),
					'next_text'          => __( 'Next page', 'booty' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'booty' ) . ' </span>',
				) );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content', 'none' );

			endif;
			?>
		</section>
		<!-- End the Primary section -->

		<!-- Begin the Widget Area -->
		<section id = "secondary">
			<?php 
				get_sidebar( 'Sidebar' );
			?>
		</section>
		<!-- End the Widget Area -->

		

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?php get_footer(); ?>