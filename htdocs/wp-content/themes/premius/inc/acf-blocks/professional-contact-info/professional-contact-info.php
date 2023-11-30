<?php

/**
 * Professional contact-info Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'professional-contact-info-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-professional-contact-info';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}

$post_id = get_the_ID();

// Contact info
$pro_tel = get_field('tel', $post_id);
$pro_email = get_field('email', $post_id);
$pro_booking_url = get_field('booking_url', $post_id);

// Location info
$location_id = get_field('location', $post_id);
if( !is_array($location_id) ){
	$location_id = array( $location_id );
}
$location_tel = get_field('tel', $location_id[0]);
// $location_email = get_field('email', $location_id);
$location_opening_hours = get_field('opening_hours', $location_id[0]);
$location_tel = get_field('tel', $location_id[0]);

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

	<?php if( $pro_booking_url ) : ?>
	<div class="wp-block-buttons">
		<div class="wp-block-button is-style-arrow">
			<a class="wp-block-button__link has-white-background-color has-background" href="<?php echo $pro_booking_url; ?>" target="_blank">
				<?php _e('Verkkoajanvaraus', 'premius') ?>
			</a>
		</div>
	</div>
	<?php endif; ?>
	
	<p>
		<?php if( count( $location_id ) === 1 ) : ?>
		<?php _e('Toimipiste', 'premius') ?>: <a href="<?php echo get_the_permalink( $location_id[0] ); ?>"><?php echo get_the_title( $location_id[0] ); ?></a><br>
		<?php elseif( count( $location_id ) > 1 ) : ?>
		<?php _e('Toimipisteet', 'premius') ?>: 
			<?php foreach($location_id as $key => $l) : ?>
			<a href="<?php echo get_the_permalink( $l ); ?>"><?php echo get_the_title( $l ); ?></a><?php echo $key !== count($location_id) -1 ? ', ' : '<br>'; ?>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if( $pro_tel ) : ?>
		<?php _e('p.', 'premius') ?> <a href="tel:<?php echo str_replace(' ', '', $pro_tel); ?>"><?php echo $pro_tel; ?></a><br>
		<?php endif; ?>

		<?php if( $pro_email ) : ?>
		<a href="mailto:<?php echo $pro_email; ?>"><?php echo $pro_email; ?></a>
		<?php endif; ?>
	</p>

	<?php if( get_field('custom_contact_info') ) : 
	the_field('custom_contact_info');
	else : ?>
	<p>
		<strong><?php _e('Premius Kuntoutus asiakaspalvelu', 'premius'); ?></strong><br>

		<?php if( $location_opening_hours ) : ?>
		<?php echo $location_opening_hours; ?><br>
		<?php endif; ?>

		<?php if( $location_tel ) : ?>
		<?php _e('p.', 'premius') ?> <a href="tel:<?php echo str_replace(' ', '', $location_tel); ?>"><?php echo $location_tel; ?></a>
		<?php endif; ?>
	</p>
	<?php endif; ?>
</div>