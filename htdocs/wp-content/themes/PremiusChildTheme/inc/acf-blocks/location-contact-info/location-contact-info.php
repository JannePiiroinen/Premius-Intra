<?php

/**
 * Location contact info Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'location-contact-info-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-location-contact-info';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}

$post_id = get_the_ID();
$location = get_field( 'location_map', $post_id );

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="grid-x">
		<div class="small-12 medium-6 cell small-order-2 medium-order-1">
			<div class="map">
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				</div>
			</div>
		</div>
		<div class="small-12 medium-6 cell small-order-1 medium-order-2">
			<div class="location-info">
				<?php the_title( '<h2 class="h3">', '</h2>' ); ?>

				<?php if( get_field('address', $post_id) ) : ?>
				<p>
					<strong><?php _e('Käyntiosoite', 'premius') ?></strong><br>
					<?php the_field('address', $post_id) ?>
				</p>
				<?php endif; ?>
				
				<?php if( get_field('opening_hours', $post_id) ) : ?>
				<p>
					<strong><?php _e('Aukioloajat', 'premius') ?></strong><br>
					<?php the_field('opening_hours', $post_id) ?>
				</p>
				<?php endif; ?>
				
				<?php if( get_field('service_hours', $post_id) ) : ?>
				<p>
					<strong><?php _e('Palvelut', 'premius') ?></strong><br>
					<?php the_field('service_hours', $post_id) ?>
				</p>
				<?php endif; ?>
				
				<?php if( get_field('tel', $post_id) || get_field('email', $post_id) ) : ?>
				<p>
					<strong><?php _e('Yhteystiedot', 'premius') ?></strong><br>
					<?php echo get_field('tel', $post_id) ? __('Puh') . ': <a href="tel:' . get_field('tel', $post_id) . '">' . str_replace('+358 ', '0', get_field('tel', $post_id) ) . '</a>' : ''; ?>
					<?php echo get_field('tel_prices', $post_id) ? '<span class="tel-prices">(' . get_field('tel_prices', $post_id) . ')</span><br>' : '<br>'; ?>
					<?php echo get_field('email', $post_id) ? __('Sposti') . ': <a href="mailto:' . get_field('email', $post_id) . '">' . get_field('email', $post_id) . '</a><br>' : ''; ?>
				</p>

				<?php echo get_field('arriving', $post_id) ? wpautop( '<strong>' . __('Kulkuyhteydet', 'premius') . '</strong><br>' . get_field('arriving', $post_id) ) : ''; ?>
				<?php endif; ?>

				<?php 

				$booking_url = get_field('booking_url', $post_id);

				if( $booking_url ) : ?>
				<div class="wp-block-buttons">
					<div class="wp-block-button is-style-arrow">
						<a class="wp-block-button__link has-petrol-background-color has-background" href="<?php echo $booking_url; ?>" target="_blank">
							<?php _e('Verkkoajanvaraus', 'premius') ?>
						</a>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>