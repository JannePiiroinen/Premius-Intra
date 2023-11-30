<?php

/**
 * Service professionals Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'service-professionals-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-service-professionals';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}

$service_id = get_the_ID();

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> grid-x grid-margin-x has-small-gap">
	<?php 

	/**
	 * REGEXP search for ACF field
	 * @link https://barn2.com/querying-posts-by-custom-field-acf/
	 */
	$regexp = sprintf( '^%1$s$|s:%2$u:"%1$s";', $service_id, strlen( $service_id ) );
	$professionals = get_posts(array(
		'numberposts' => -1,
		'post_type' => 'professional',
		'meta_query' => array(
			array(
				'key' => 'services',
				'value' => $regexp,
				'compare' => 'REGEXP'
			)
		)
	));

	if( $professionals ) : foreach( $professionals as $post ) : setup_postdata( $post ); ?>
	<div class="cell small-12 medium-6 large-4 professional">
		<?php
		$permalink = get_permalink( $post->ID );
		$name = explode( ', ', get_the_title( $post->ID ) );
		?>
		<a href="<?php echo esc_url( $permalink ); ?>">
			<img alt="" src="<?php echo get_the_post_thumbnail_url( $post, 'post-thumbnail' ); ?>" />
			<h3 class="h6"><?php echo esc_html( $name[0] ); ?></h3>
		</a>
	</div>
	<?php wp_reset_postdata(); endforeach; endif; ?>

</div>