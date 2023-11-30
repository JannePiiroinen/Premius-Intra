<?php

/**
 * Service locations Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'service-locations-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-service-locations';
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

	$locations = get_field('locations', $post_id);

	if( $locations ) : ?>
	<ul class="service-locations flex-container align-center">
		<?php foreach( $locations as $location ): 
		$permalink = get_permalink( $location );
		$title = get_the_title( $location );
		?>
		<li class="location text-center">
			<a href="<?php echo esc_url( $permalink ); ?>">
				<img alt="" src="<?php echo esc_url( get_theme_file_uri( 'img/map-pin.svg' ) ); ?>" />
				<h3 class="h4"><?php echo esc_html( $title ); ?></h3>
				<img alt="" src="<?php echo esc_url( get_theme_file_uri( 'img/arrow-light-blue-1.svg' ) ); ?>" />
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
	<?php endif; ?>

</div>