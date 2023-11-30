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
$id = 'accordion-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$classes = 'block-accordion';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}

$accordion_items = get_field('accordion_items');

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="accordion-container">
		<?php foreach( $accordion_items as $item) : ?>
		<div class="ac">
			<h2 class="ac-header">
				<button type="button" class="ac-trigger"><?php echo $item['accordion_item_heading'] ?></button>
			</h2>
			<div class="ac-panel">
				<div>
					<?php echo $item['accordion_item_content'] ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>