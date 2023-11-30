<?php

/**
 * Accordion Block template.
 *
 * @param	 array $block The block settings and attributes.
 * @param	 string $content The block inner HTML (empty).
 * @param	 bool $is_preview True during AJAX preview.
 * @param	 (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'search-by-symptom-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$classes = 'block-search-by-symptom';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}

$post_type = get_field('post_type');

$posts = get_posts(array(
	'numberposts' => -1,
	'post_type' => $post_type,
	'orderby' => 'date',
	'order' => 'DESC'
));

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="search">
		<input type="text" class="quicksearch" placeholder="<?php _e('Kirjoita oire', 'premius'); ?>" />
		<span class="search-reset hidden">&times;</span>
		<div class="wp-block-buttons results">
			<?php foreach( $posts as $post) : ?>
			<div class="result hidden" data-search-values="<?php echo $post->post_title; echo get_field('symptoms', $post->ID) ? ' ' . implode(' ', array_column(get_field('symptoms', $post->ID), 'name') ) : '' ?>">
				<div class="wp-block-button is-style-arrow">
					<a class="wp-block-button__link has-white-background-color has-background" href="<?php the_permalink( $post->ID ); ?>">
						<?php echo $post->post_title; ?>
					</a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>