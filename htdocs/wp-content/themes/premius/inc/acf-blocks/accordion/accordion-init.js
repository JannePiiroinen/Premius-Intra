document.addEventListener(
	'DOMContentLoaded',
	function () {
		if ( document.querySelector( '.block-accordion .accordion-container' ) ) {
			const accordions = Array.from(document.querySelectorAll('.block-accordion .accordion-container'));
			new Accordion(accordions, {
				showMultiple: true
			} );
		}
	},
	false
);
