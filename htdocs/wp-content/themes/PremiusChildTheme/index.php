<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Premius
 */

if( is_post_type_archive( 'blog' ) ){
	$page_id = get_option('page_for_blog');
}
else {
	$page_id = get_queried_object_id();
}
$published_posts = wp_count_posts( get_post_type() )->publish;

get_header();

?>

<main id="page-<?php the_ID(); ?>" <?php post_class('flex-container flex-dir-column posts-list'); ?>>
	<?php

	if( !is_paged() ) : 

		echo apply_filters( 'the_content', get_the_content( '', false, $page_id ) );

	endif;

	if ( have_posts() ) : ?>

	<div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3 posts-list">
		<?php while ( have_posts() ) : 
		the_post();
		$featured_image_id = get_post_thumbnail_id();
		?>
		<div class="cell post">
			<?php if( $featured_image_id ) : ?>
			<a href="<?php the_permalink( $post ); ?>">
				<div class="featured-image">
					<?php $srcset = wp_get_attachment_image_srcset( $featured_image_id ); ?>
						<img src="<?php echo wp_get_attachment_image_src( $featured_image_id, 'thumbnail' )[0]; ?>" srcset="<?php echo esc_attr( $srcset ); ?>" alt="" style="">
				</div>
			</a>
			<?php endif; ?>
			<span class="post-date"><?php echo get_the_date( '', $post ); ?></span>
			<h2 class="h6 post-title">
				<a href="<?php the_permalink( $post ); ?>">
					<?php echo get_the_title( $post ); ?>
				</a>
			</h2>
			<?php the_excerpt(); /* ?>
			<div class="wp-block-buttons">
				<div class="wp-block-button is-style-arrow">
					<a class="wp-block-button__link has-transparent-background-color has-background" href="<?php the_permalink( $post ); ?>">
						<?php _e('Lue lisää', 'premius'); ?>
					</a>
				</div>
			</div> */ ?>
		</div><!-- .post -->
		<?php endwhile; ?>
	</div>

	<div class="grid-x align-center-middle pagination">
	<?php echo paginate_links( array(
		'next_text' => __('Seuraava', 'wordpress') . '&nbsp;&rsaquo;',
		'prev_text' => '&lsaquo;&nbsp;' . __('Edellinen', 'wordpress')
	) ); ?>
	</div>
	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

</main><!-- #post-<?php the_ID(); ?> -->
		
<?php

get_footer();
