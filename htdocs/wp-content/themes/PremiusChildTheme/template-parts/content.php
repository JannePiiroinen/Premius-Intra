<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Premius
 */

?>
			
<main id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1 class="h2 is-style-wave-underline"><?php the_title(); ?></h1>
	
	<span class="post-date"><?php the_date(); ?></span>

	<article>
		<?php the_content(); ?>

		<footer class="article-footer share-links flex-container align-middle">
			
			<span><?php _e('Jaa:', 'premius') ?></span>
			<br class="hide-for-medium">
			<!-- Facebook (url) -->
			<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" onclick="window.open(this.href, '', 'location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=526,height=744'); return false;" class="share-link" title="<?php _e('Jaa Facebookissa', 'premius') ?>">
				<?php echo file_get_contents( get_template_directory_uri() . '/img/icon-facebook.svg' ) ?>
			</a>
			<!-- Twitter (url, text) -->
			<a href="http://twitter.com/share?url=<?php echo get_permalink(); ?>&amp;text=<?php the_title(); ?>"<?php /* onclick="window.open(this.href, '', 'location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=640,height=480'); return false;" */ ?> class="share-link" target="_blank" title="<?php _e('Jaa Twitterissä', 'premius') ?>">
				<?php echo file_get_contents( get_template_directory_uri() . '/img/icon-twitter.svg' ) ?>
			</a>
			<!-- LinkedIn (url, title, summary, source url) -->
			<a href="http://www.linkedin.com/shareArticle?url=<?php echo get_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=<?php echo wp_trim_words( get_the_content(), 30 ); ?>&amp;source=<?php echo get_permalink(); ?>" onclick="window.open(this.href, '', 'location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=600'); return false;" class="share-link" title="<?php _e('Jaa LinkedInissä', 'premius') ?>">
				<?php echo file_get_contents( get_template_directory_uri() . '/img/icon-linkedin.svg' ) ?>
			</a>
		</footer>
	</article>

</main><!-- #post-<?php the_ID(); ?> -->