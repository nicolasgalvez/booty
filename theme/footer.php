<?php
/**
 * ncgbase template for displaying the footer
 *
 * @package WordPress
 * @subpackage ncgbase
 * @since ncgbase 1.0
 */
?>

			</div> <!-- End #site -->
		<footer id = "colophon">
			<section  id = "footer-widgets">
				<ul class = "row">
					<li class = "widget">
						<?php booty_copyright(); ?>
					</li>
				<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
					<?php dynamic_sidebar( 'footer-widgets' ); ?>
				<?php endif; ?>
				</ul>
			</section>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>