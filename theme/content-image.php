<?php
/**
 * The image post format template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Booty
 * @since Booty 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'format-image' ); ?>>
	<header class="entry-header">
		<?php
if ( is_single() || is_page() ) :
	the_title( '<h1 class="entry-title">', '</h1>' );
	booty_entry_meta();
else :
	// Post thumbnail.
	booty_post_thumbnail();

	the_title( sprintf( '<p class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' );
endif;
?>
	</header><!-- .entry-header -->
	<?php if ( is_single() || is_page() ) : ?>
		<div class="entry-content">
			<?php /* translators: %s: Name of current post */
	the_content( sprintf(
			__( 'Continue reading %s', 'booty' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
	<footer class="entry-footer">
	<?php if ( !is_single() && !is_page() ) : ?>
		<?php booty_entry_meta();?>
	<?php endif; ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
