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

<article id="post-<?php the_ID(); ?>" <?php post_class('format-image'); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() || is_page() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
		
	</header><!-- .entry-header -->
	<?php
	// Post thumbnail.
		booty_post_thumbnail();
	?>
	<?php if ( is_single() || is_page() ) : ?>
		<div class="entry-content">
			<?php	/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'booty' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'booty' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'booty' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
	?>

	<footer class="entry-footer">
		<?php booty_entry_meta();?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
