<?php

/**
 * Latest posts Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'latest-posts-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$classes = 'block-latest-posts posts-list';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}

$post_type = get_field('post_type');

$posts = get_posts(array(
	'numberposts' => 3,
	'post_type' => $post_type,
	'orderby' => 'date',
	'order' => 'DESC'
));

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<?php $i = 0; foreach( $posts as $post) : setup_postdata($post); ?>
	<div class="post">
		<div class="featured-image">
			<?php echo get_the_post_thumbnail($post, 'medium'); ?>
		</div>
		<div class="post-content">
			<span class="post-date">
				<?php echo get_the_date('', $post) ?>
			</span>
			<a href="<?php echo get_the_permalink($post); ?>">
				<h2 class="<?php echo $i == 0 ? 'h3' : 'h6' ?>"><?php echo get_the_title($post) ?></h2>
			</a>
			<?php if( $i == 0 ) : 
			echo wpautop( get_the_excerpt($post) );
			endif; ?>
		</div>
		<div class="wp-block-buttons">
			<div class="wp-block-button is-style-arrow">
				<a class="wp-block-button__link has-petrol-background-color has-background" href="<?php the_permalink( $post ); ?>">
					<?php _e('Lue lisää', 'premius'); ?>
				</a>
			</div>
		</div>
	</div>
	<?php $i++; endforeach; wp_reset_postdata(); ?>
</div>
<?php if( get_field('show_archive_link') ) : ?>
<div class="wp-block-buttons latest-posts-archive-link">
	<div class="wp-block-button is-style-arrow">
		<a class="wp-block-button__link has-petrol-background-color has-background" href="<?php echo get_post_type_archive_link( $post_type ); ?>">
			<?php _e('Arkisto', 'premius'); ?>
		</a>
	</div>
</div>
<?php endif; ?>