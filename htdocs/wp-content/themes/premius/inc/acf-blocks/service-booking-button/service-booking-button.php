<?php

/**
 * Service booking button Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'service-booking-button-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-service-booking-button';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
/*if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}*/

$post_id = get_the_ID();

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<?php 

	$booking_url = get_field('booking_url', $post_id);
	$booking_tel = get_field('booking_tel', $post_id);

	if( $booking_url || $booking_tel ) : ?>
	<div class="wp-block-buttons flex-container flex-dir-<?php echo get_field('buttons_alignment') == 'vertical' ? 'column' : 'column large-flex-dir-row' ?> <?php echo $block['align'] == 'center' ? 'align-' . $block['align'] . '-middle' : 'align-' . $block['align']; ?>">
		<?php if( $booking_url ) : ?>
		<div class="wp-block-button is-style-arrow">
			<a class="wp-block-button__link has-<?php the_field('button_color') ?>-background-color has-background" href="<?php echo esc_url( $booking_url ); ?>" target="_blank">
				<?php _e('Varaa aika verkossa', 'premius') ?>
			</a>
		</div>
		<?php endif; ?>
		<?php if( $booking_tel ) : ?>
		<div class="wp-block-button is-style-arrow">
			<a class="wp-block-button__link has-<?php the_field('button_color') ?>-background-color has-background" href="tel:<?php echo $booking_tel; ?>">
				<span><?php printf( __( 'Varaa aika puhelimitse: %s', 'premius' ), ' <span>' . str_replace( '+358 ', '0', $booking_tel ) ) . '</span>'; ?></span>
			</a>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>

</div>