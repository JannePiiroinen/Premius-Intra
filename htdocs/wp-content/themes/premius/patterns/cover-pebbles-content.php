<?php

/**
 * Title: Sisältöosio "kivet"
 * Slug: premius/cover-pebbles-content
 * Categories: premius-common
 * Description: Sisältöosio vaaleansinisellä "kivi" -taustalla
 * Keywords: kivi, kivet, vaaleansininen, sisältö, kansi, cover
 * Block Types: 
 * Inserter: true
 */

?>

<!-- wp:cover {"dimRatio":0,"isDark":false,"align":"full","className":"is-style-pebbles-content"} -->
<div class="wp-block-cover alignfull is-light is-style-pebbles-content">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:acf/max-width {"name":"acf/max-width","data":{"field_acf_block_max_width_max_width":"800"},"align":"center","mode":"preview","alignText":"center"} -->

            <!-- wp:paragraph {"align":"center"} -->
            <p class="has-text-align-center">Lorem ipsum dolor sit amet...</p>
            <!-- /wp:paragraph -->

        <!-- /wp:acf/max-width -->
	</div>
</div>
<!-- /wp:cover -->