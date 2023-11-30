<?php
/**
 * The template for displaying search page and results
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Premius
 */

get_header();

?> 

<main id="page-<?php the_ID(); ?>" <?php post_class('flex-container flex-dir-column'); ?>>
	
	<?php
	if ( have_posts() ) : ?>

		<?php if( !get_query_var( 's', false ) ) : ?>

		<header class="page-header">
			<h1 class="h5">
				<?php printf( esc_html__( 'Haku', 'premius' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
			<?php get_search_form(); ?>
		</header><!-- .page-header -->

		<?php else : ?>

		<header class="page-header">
			<h1 class="h5">
				<?php printf( esc_html__( 'Hakutulokset haulle "%s"', 'premius' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>
			<?php get_search_form(); ?>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );

		endwhile; ?>

		<div class="grid-x align-center-middle pagination">
		<?php echo paginate_links( array(
			'next_text' => __('Seuraava', 'wordpress') . '&nbsp;&rsaquo;',
			'prev_text' => '&lsaquo;&nbsp;' . __('Edellinen', 'wordpress')
		) ); ?>
		</div>
		
		<?php endif;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

</main><!-- #page-<?php the_ID(); ?> -->

<?php

get_footer();