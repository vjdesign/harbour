<?php

/**
 * footer.php
 * Template for footer content.
 */

?>
				</div><!-- /.container -->
			</main><!-- /#main -->
		</div><!-- /[data-sticky-wrap] -->

		<footer class="padding-top-large padding-bottom bg-dark" data-sticky-footer>

			<?php
				$options = keel_get_theme_options();
			?>

			<div class="container container-large text-center" >



				<div class="row">
					<?php get_template_part( 'includes/keel-template-filesnav', 'social' ); ?>
					<div class="grid-half text-left-large">
						<?php get_search_form(); ?>
					</div>
				</div>

				<div class="row">
					<div class="grid-half text-left-large margin-bottom">
						<?php
							if ( !empty( $options['footer1'] ) ) {
								echo do_shortcode( stripslashes( $options['footer1'] ) );
							}
						?>
					</div>
					<div class="grid-half text-right-large margin-bottom">
						<?php
							if ( !empty( $options['footer2'] ) ) {
								echo do_shortcode( stripslashes( $options['footer2'] ) );
							}
						?>
					</div>
				</div>

				<div class="row">
					<div class="grid-half text-left-large">
						<p class="text-small">&copy; 2015 TAAI - All rights reserved. A <a target="_blank" href="http://vjdesign.com.au" target="_blank">vjdesign</a> powered by <a href="https://github.com/vjdesign/harbour" target="_blank">Harbour</a></p>
					</div>
					<div class="grid-half text-right-large">
						<?php get_template_part( 'includes/keel-template-filesnav', 'secondary' ); ?>
					</div>
				</div>



			</div>

		</footer>


		<?php wp_footer(); ?>

	</body>
</html>
