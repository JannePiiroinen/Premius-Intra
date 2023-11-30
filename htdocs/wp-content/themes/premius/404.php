<?php
/**
 * The template for displaying 404 pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Premius
 */

get_header(); ?>

	<main id="page-<?php the_ID(); ?>" <?php post_class('flex-container flex-dir-column'); ?>>

		<h3 class="has-heading-1-font-size">404</h3>
		<h1 class="" style="margin-bottom: var(--block-margin);"><?php _e('Hakemaasi sivua ei löytynyt', 'premius'); ?></h1>

	</main><!-- #page-<?php the_ID(); ?> -->

<?php get_footer();