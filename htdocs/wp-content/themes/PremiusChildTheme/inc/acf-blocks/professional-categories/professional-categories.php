<?php

/**
 * Professional categories Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
	
// Create id attribute allowing for custom "anchor" value.
$id = 'professional-categories-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className".
$classes = 'block-professional-categories';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}

// vd(get_field('professional_categories_orderby'));
// vd(get_field('professional_categories_order'));

$terms = get_terms( array( 
	'taxonomy' => 'professional_category',
	'hide_empty' => true,
	'orderby' => get_field('professional_categories_orderby'),
	'order' => get_field('professional_categories_order')
) );

if( 'name' === get_field('professional_categories_orderby') ) {
	if( 'ASC' === get_field('professional_categories_order') )
		usort($terms, fn($a, $b) => strcmp($a->name, $b->name));
	else
		usort($terms, fn($a, $b) => strcmp($b->name, $a->name));
}
/*else if( 'term_order' === get_field('professional_categories_orderby') ) {
	array_multisort(
		array_column($terms, 'term_order'), SORT_NATURAL, 
		$terms
	);
}*/

//$professionals_parent_page = get_page_by_path('ammattilaiset');
//apply_filters( 'wpml_object_id', $professionals_parent_page->ID, 'post' );

?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="wp-block-buttons grid-x category-list">
	<?php foreach( $terms as $term) : 
		$archive_page = get_posts( array(
			'numberposts' => 1,
			'post_type' => 'page',
			'title' => $term->name,
			'fields' => array(
				'post_parent' => get_the_ID()
			)
		));
		if( $archive_page ) :
		?>
		<div class="wp-block-button is-style-arrow">
			<a class="wp-block-button__link has-white-background-color has-background" href="<?php the_permalink( $archive_page[0]->ID ); ?>">
				<?php echo $term->name; ?>
			</a>
		</div>
		<?php endif;
	endforeach; ?>
	</div>
</div>