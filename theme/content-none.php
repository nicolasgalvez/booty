<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Booty
 * @since Booty 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'booty' ); ?></h1>
	</header><!-- .page-header -->

	<div class="entry-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'booty' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<h2><?php _e( 'You can\'t always get what you want.')?> </h2>
			<p><?php _e('But if you try sometimes with some different keywords... oh you know.', 'booty' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<h3><?php _e( 'Abort, Fail, Retry?', 'booty' ); ?></h3>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->
	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</section><!-- .no-results -->
</article>
