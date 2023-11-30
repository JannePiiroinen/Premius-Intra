<?php

/**
 * Booking info Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'booking-info-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

$booking_info_type = get_field('booking_info_type');
$title = get_field('custom_title');

// Create class attribute allowing for custom "className" and "booking_info_type" values.
$classes = 'block-booking-info';
$classes .= ' booking-type-' . $booking_info_type;
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}

if( !$title && $booking_info_type === 'tel' ){
	$title = get_field('default_title_tel_booking', 'option');
}
elseif( !$title && $booking_info_type === 'web' ){
	$title = get_field('default_title_web_booking', 'option');
}

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> flex-container flex-dir-column">
	
	<h3 class="h5"><?php echo $title; ?></h3>

	<div class="booking-info-container flex-container flex-dir-column">
	
	<?php 

	// Verkkoajanvaraus
	if( $booking_info_type === 'web' ) :

		$services = get_field('services_web_booking', 'option');

		if( $services ) : ?>
		<div class="booking-info-section">
			<div class="wp-block-buttons flex-container flex-dir-column align-left">
				<?php foreach ($services as $service) : 
				$booking_url = get_field('booking_url', $service->ID);
				$icon = get_field('icon', $service->ID);
				?>
				<div class="wp-block-button is-style-arrow">
					<a class="wp-block-button__link has-transparent-background-color has-background" href="<?php echo $booking_url; ?>">
						<?php if( !empty( $icon ) ) : ?>
						<img src="<?php echo $icon ?>" alt=""><?php echo $service->post_title; ?>
						<?php else : ?>
						<span class="icon-placeholder" style="height: 36px; width: 36px; margin-right: 1rem;"></span><?php echo $service->post_title; ?>
						<?php endif; ?>
					</a>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php endif;
	// Puhelinajanvaraus
	elseif( $booking_info_type === 'tel' ) :

		$booking_info = get_field('tel_booking_info', 'option');
		$services_booking_num = get_field('services_tel_booking_num', 'option');
		$services_booking_page = get_field('services_tel_booking_page', 'option');

		?>
		
		<div class="booking-info-section">
			<div class="extra-padding">
				<?php echo $booking_info ? $booking_info : ''; ?>
			</div>
		</div>
		
		<div class="booking-info-section">
			<?php if( $services_booking_num ) : ?>
			<div class="extra-padding">
				<?php foreach ($services_booking_num as $service) : ?>
				<div class="grid-x align-justify booking-num">
					<div class="cell small-12 medium-6">
						<strong><?php echo $service['service_title']; ?></strong>
					</div>
					<div class="cell small-12 medium-6 medium-text-right">
						<strong>
							<a href="tel:<?php echo $service['service_booking_num']; ?>"><?php echo $service['service_booking_num']; ?></a>
						</strong>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<?php if( $services_booking_page ) : ?>
			<div class="wp-block-buttons flex-container flex-dir-column align-left">
				<?php foreach ($services_booking_page as $service) : ?>
				<div class="wp-block-button is-style-arrow">
					<a class="wp-block-button__link has-transparent-background-color has-background" href="<?php echo get_the_permalink($service->ID); ?>">
						<?php echo $service->post_title; ?>
					</a>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>

	<?php endif; ?>

	<?php 

	?>
	</div>

</div>