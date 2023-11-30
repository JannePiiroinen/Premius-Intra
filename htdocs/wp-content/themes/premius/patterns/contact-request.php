<?php

/**
 * Title: Yhteydenottopyyntö
 * Slug: premius/contact-request
 * Categories: premius-common
 * Description: Gravity Forms -lomake ja CTA-tekstit vaaleansinisen Cover -lohkon sisällä.
 * Keywords: lomake, yhteydenottopyyntö
 * Block Types: 
 * Inserter: true
 */

?>
<!-- wp:cover {"overlayColor":"light-blue-3","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light">
	<span aria-hidden="true" class="wp-block-cover__background has-light-blue-3-background-color has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:acf/max-width {"lock":{"move":true,"remove":true},"name":"acf/max-width","data":{"field_acf_block_max_width_max_width":"custom","field_acf_block_max_width_custom_width":"900"},"mode":"preview","alignText":"center","alignContent":"top"} -->
			<!-- wp:heading {"textAlign":"center","level":4,"fontSize":"heading2"} -->
			<h4 class="has-text-align-center has-heading-2-font-size">Kiinnostuitko?</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","textColor":"petrol"} -->
			<p class="has-text-align-center has-petrol-color has-text-color"><strong>Jätä yhteystietosi niin olemme sinuun yhteydessä</strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:gravityforms/form {"formId":"1","title":false,"description":false,"ajax":true,"formPreview":false} /-->
		<!-- /wp:acf/max-width -->
	</div>
</div>
<!-- /wp:cover -->