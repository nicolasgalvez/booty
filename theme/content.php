<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Booty
 * @since Booty 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
	// var_dump ($post);
		booty_post_thumbnail();
	?>
	<?php if ( is_single() || is_page() ) : ?>
		<div class="entry-content">
		<?php	/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'booty' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) ); ?>
		<?php else : ?>
			<div class="entry-content excerpt">
			<?php	/* translators: %s: Name of current post */
				the_excerpt( sprintf(
					__( 'Continue reading %s', 'booty' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) ); 
			?>
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
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() || is_page() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;

	?>

	<footer class="entry-footer">
		<?php booty_entry_meta();?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
