<?php

/**
 * Title: Palvelun toimipisteet
 * Slug: premius/service-locations
 * Categories: premius-service
 * Description: Listaa toimipisteet, joissa editoitava palvelu on saatavilla. Huom: Toimii vain palveluissa!
 * Keywords: toimipiste, palvelu, listaus
 * Block Types: 
 * Inserter: true
 */

?>


<!-- wp:cover {"overlayColor":"light-sand","isDark":false,"align":"full"} -->
<div class="wp-block-cover alignfull is-light">
	<span aria-hidden="true" class="wp-block-cover__background has-light-sand-background-color has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:heading {"textAlign":"center","level":4,"fontSize":"heading2"} -->
		<h4 class="has-text-align-center has-heading-2-font-size">Tämä palvelu on saatavilla seuraavissa toimipisteissämme</h4>
		<!-- /wp:heading -->
		
		<!-- wp:acf/service-locations {"name":"acf/service-locations","align":"center","mode":"preview"} /-->
		
		<!-- wp:acf/service-booking-button {"name":"acf/service-booking-button","align":"center","data":{"field_service_booking_buttons_alignment":"vertical","field_service_booking_button_color":"petrol"},"mode":"auto"} /-->
	</div>
</div>
<!-- /wp:cover -->