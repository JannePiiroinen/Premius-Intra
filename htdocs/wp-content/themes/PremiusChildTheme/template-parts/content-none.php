<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Premius
 */

?>

<main id="page-<?php the_ID(); ?>" <?php post_class('site-main'); ?>>

	<h1><?php esc_html_e( 'Ei näytettäviä artikkeleita.', 'premius' ); ?></h1>

</main><!-- #page-<?php the_ID(); ?> -->
