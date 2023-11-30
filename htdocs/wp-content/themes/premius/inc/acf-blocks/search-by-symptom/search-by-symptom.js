document.addEventListener(
	'DOMContentLoaded',
	function () {

		let quicksearch = document.querySelector('.quicksearch');

		let resetButton = document.querySelector('.search-reset');
		let resultContainer = document.querySelector('.results');
		let results = document.querySelectorAll('.result');

		if( quicksearch ) {
			// quick search regex
			let qsRegex;

			quicksearch.addEventListener( 'keyup', debounce( showResults, 50 ) );
			resetButton.addEventListener( 'click', function(){
				quicksearch.value = '';
				resetButton.classList.add('hidden');
				showResults();
			})
		}

		function showResults() {
			if( quicksearch.value.length > 2 ){
				
				qsRegex = new RegExp( quicksearch.value, 'gi' );
				resultContainer.classList.remove('hidden');

				results.forEach((result) => {
					if( qsRegex ? result.dataset.searchValues.match( qsRegex ) : true ){
						result.classList.remove('hidden');
					}
					else {
						result.classList.add('hidden');
					}
				});

				if( document.querySelectorAll('.result:not(.hidden)').length != 0 ){
					resetButton.classList.remove('hidden');
				}
				else {
					resetButton.classList.add('hidden');
				}
			}
			else {
				resultContainer.classList.add('hidden');
				resetButton.classList.add('hidden');
				results.forEach((result) => {
					result.classList.add('hidden');
				});
			}
		}

		// debounce so filtering doesn't happen every millisecond
		function debounce( fn, threshold ) {
			let timeout;
			threshold = threshold || 100;
			return function debounced() {
				clearTimeout( timeout );
				let args = arguments;
				let _this = this;
				function delayed() {
					fn.apply( _this, args );
				}
				timeout = setTimeout( delayed, threshold );
			};
		}

	},
	false
);