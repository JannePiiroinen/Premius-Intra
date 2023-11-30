<?php

/**
 * Professional services Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'professional-services-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-professional-services';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}

$post_id = get_the_ID();

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<?php 

	$professional_services = get_field('services', $post_id);

	if( $professional_services ) : ?>
	<div class="wp-block-buttons flex-container flex-dir-column align-left">
		<?php foreach ($professional_services as $service) : ?>
		<div class="wp-block-button is-style-arrow">
			<a class="wp-block-button__link has-transparent-background-color has-background" href="<?php the_permalink( $service->ID ); ?>">
				<?php echo $service->post_title; ?>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>