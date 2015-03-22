<?php
/**
 * Booty Front Page template
 *
 * @package WordPress
 * @subpackage Booty
 * @since Booty 1.0
 */

get_header(); ?>
	<?php if ( is_active_sidebar( 'hero-widgets' ) ) : ?>
		<section  id = "hero-widgets">
			<ul>
			<?php dynamic_sidebar( 'hero-widgets' ); ?>
			</ul>
			<a id = "get-started" >
				<span class = "glyphicon glyphicon-chevron-down"></span>
			</a>
			
		</section>
	<?php endif; ?>
	<div id="content" class="content-area">
	<?php if ( is_active_sidebar( 'home-widgets' ) ) : ?>
		<section  id = "home-widgets">
			<ul>
			<?php dynamic_sidebar( 'home-widgets' ); ?>
			</ul>
		</section>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'home-widgets-1' ) ) : ?>
		<section  id = "home-widgets-1">
			<ul>
			<?php dynamic_sidebar( 'home-widgets-1' ); ?>
			</ul>
		</section>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'home-widgets-2' ) ) : ?>
		<section  id = "home-widgets-2">
			<ul>
			<?php dynamic_sidebar( 'home-widgets-2' ); ?>
			</ul>
		</section>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'home-widgets-3' ) ) : ?>
		<section  id = "home-widgets-3">
			<ul>
			<?php dynamic_sidebar( 'home-widgets-3' ); ?>
			</ul>
		</section>
	<?php endif; ?>
	</div><!-- .content-area -->
	<?php get_footer(); ?>