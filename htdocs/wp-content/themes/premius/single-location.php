<?php
/**
 * The template for displaying single CPT "location".
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Premius
 */

get_header();

	while ( have_posts() ) : the_post(); 
		
		get_template_part( 'template-parts/content', 'location' );

	endwhile; // End of the loop.

get_footer();