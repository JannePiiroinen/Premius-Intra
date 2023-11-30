<?php

/**
 * Professionals by category Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'professionals-by-category-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$classes = 'block-professionals-by-category';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}

$term_id = get_field('professional_category');

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> grid-x grid-margin-x has-small-gap">
	<?php 

	$professionals = get_posts(array(
		'numberposts' => -1,
		'post_type' => 'professional',
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'professional_category',
				'field'  => 'term_id',
				'terms' => $term_id,
			),
		),
	));

	if( $professionals ) : 

	// Get professional last name...
	foreach( $professionals as $key => $values ){
		$professionals[$key]->sorting_last_name = preg_split('/(\s|,)/', $values->post_title, -1, PREG_SPLIT_NO_EMPTY)[1];
		$professionals[$key]->sorting_first_name = preg_split('/(\s|,)/', $values->post_title, -1, PREG_SPLIT_NO_EMPTY)[0];
	}
	// ...and sort by it
	// usort($professionals, fn($a, $b) => strcmp($a->sorting_last_name, $b->sorting_last_name));
	array_multisort(
		array_column($professionals, 'sorting_last_name'), SORT_ASC, 
		array_column($professionals, 'sorting_first_name'), SORT_ASC, 
		$professionals
	);

	foreach( $professionals as $post ) : setup_postdata( $post ); ?>
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