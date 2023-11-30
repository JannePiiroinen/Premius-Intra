<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Premius
 */

$post_type = get_post_type_object( get_post_type() );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-result'); ?>>
	<header class="entry-header">
		<a href="<?php the_permalink(); ?>">
			<h4><?php the_title(); ?></h4>
		</a>
		<?php the_excerpt(); ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
