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
			<div class = "container">
				<div class = "row">
					<div id = "copyright" class = "col-xs-12 col-md-3">
						<p><a href = "<?php bloginfo('url')?>themes/satillite_flight"></a><?php bloginfo('name')?> © <?php echo date('Y')?></p>
						<p id = "nick-9000" class = "clearfix">
							<span>Nick</span>
							<span>Galvez</span>
						</p> 
						<p>Urbana, Illinois</p>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>