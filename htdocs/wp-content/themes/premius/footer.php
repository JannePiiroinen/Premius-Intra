<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Premius
 */

?>

		<div id="footer-top" class="flex-container align-center align-bottom">
			<img src="<?php echo esc_url( get_theme_file_uri( 'img/footer-bg.svg' ) ); ?>" alt="">
		</div>
		<footer id="site-footer" class="">

			<div class="grid-container">
				<div class="grid-x grid-x-padding align-justify">
					<div class="cell small-12 large-3">
					<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
						<?php dynamic_sidebar( 'footer-widgets' ); ?>
					<?php endif; ?>
					</div>
					<div class="cell small-12 large-3">
						<?php

						$locations = get_posts(array(
							'numberposts' => -1,
							'post_type' => 'location',
							'orderby' => 'menu_order',
							'order' => 'ASC'
						));

						if( $locations ) : ?>
						<h3 class="has-white-color has-color"><?php _e('Toimipisteet', 'premius') ?></h3>
						<div class="wp-block-buttons flex-container flex-dir-column align-left">
							<?php foreach( $locations as $location ): 

							$permalink = get_permalink( $location );
							$title = get_the_title( $location );
							?>
							<div class="wp-block-button is-style-arrow location">
								<a class="wp-block-button__link has-transparent-background-color has-background has-white-color has-color" href="<?php echo esc_url( $permalink ); ?>">
									<?php echo esc_html( $title ); ?>
								</a>
							</div>
						<?php endforeach; ?>
						</div>
						<?php endif; ?>

					</div>
					<div class="cell small-12 large-3">
						<h3 class="has-white-color has-color"><?php _e('Tietoa', 'premius') ?></h3>
						<nav id="secondary-navigation" class="" role="navigation">
							<?php wp_nav_menu( array( 
								'theme_location' => 'secondary', 
								'menu_id' => 'secondary-menu',
								'menu_class' => 'footer-navi menu',
								'item_spacing' => 'discard',
								'container' => false
							) ); ?>
						</nav>
					</div>
				</div>
			</div>

		</footer><!-- #footer-top -->

		<?php the_field('site_footer_scripts', 'option') ?>

		<?php wp_footer(); ?>

	</body>
</html>
