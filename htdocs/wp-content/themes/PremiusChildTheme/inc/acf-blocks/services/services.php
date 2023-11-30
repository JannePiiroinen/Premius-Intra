<?php

/**
 * Services Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'services-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$classes = 'block-services';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}

$posts = get_posts(array(
	'numberposts' => -1,
	'post_parent' => 0,
	'post_type' => 'service',
	'orderby' => get_field('services_orderby'),
	'order' => get_field('services_order')
));

// vdd( $posts );

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="wp-block-buttons grid-x service-list">
	<?php foreach( $posts as $post) : setup_postdata($post); ?>
		<div class="wp-block-button is-style-arrow">
			<a class="wp-block-button__link has-white-background-color has-background" href="<?php the_permalink( $post ); ?>">
				<?php echo wp_kses_post( get_the_title($post) ); ?>
			</a>
		</div>
	<?php endforeach; wp_reset_postdata(); ?>
	</div>
</div>