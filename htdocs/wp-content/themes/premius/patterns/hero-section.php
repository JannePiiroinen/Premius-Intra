<?php

/**
 * Title: Hero-osio, yleinen
 * Slug: premius/hero-section
 * Categories: premius-common
 * Description: Hero-osio "kivi" -taustalla ja -artikkelikuvalla (featured image)
 * Keywords: hero
 * Block Types: 
 * Inserter: true
 */

?>

<!-- wp:cover {"dimRatio":0,"minHeight":65,"minHeightUnit":"vh","isDark":false,"lock":{"move":true,"remove":true},"align":"full","className":"is-style-pebbles-hero"} -->
<div class="wp-block-cover alignfull is-light is-style-pebbles-hero" style="min-height:65vh">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:columns {"verticalAlignment":"center","lock":{"move":true,"remove":true}} -->
		<div class="wp-block-columns are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","lock":{"move":true,"remove":true},"className":"small-order-2 medium-order-1"} -->
			<div class="wp-block-column is-vertically-aligned-center small-order-2 medium-order-1">
				<!-- wp:post-title {"level":1} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","lock":{"move":true,"remove":true},"className":"small-order-1 medium-order-2"} -->
			<div class="wp-block-column is-vertically-aligned-center small-order-1 medium-order-2">
				<!-- wp:post-featured-image /-->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
</div>
<!-- /wp:cover -->