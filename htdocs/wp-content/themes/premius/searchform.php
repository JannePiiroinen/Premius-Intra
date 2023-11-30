<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
	<div>
		<span class="screen-reader-text"><?php _e('Haku', 'premius') ?>:</span>

		<input type="search" class="search-field" placeholder="<?php _e('Hae', 'premius') ?>…" name="<?php _ex('haku', 'Hakuparametrin nimi, älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius'); ?>" value="<?php echo get_query_var( _x('haku', 'Hakuparametrin nimi, älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius') ) ? get_query_var( _x('haku', 'Hakuparametrin nimi, älä muuta, jos et ole varma mitä tämä tarkoittaa.', 'premius') ) : ''; ?>">
		
		<?php if( isset( $args['icon'] ) ) : ?>
		<button type="submit" class="search-submit button icon" value="<?php _e('Hae', 'premius') ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><path d="M33.4,36a2.55,2.55,0,0,1-1.83-.77L22.4,26.07a14.3,14.3,0,1,1,3.67-3.67l9.18,9.17A2.6,2.6,0,0,1,33.4,36ZM14.29,5.2a9.1,9.1,0,1,0,9.1,9.09A9.1,9.1,0,0,0,14.29,5.2Z" style="fill:#006781;"/></svg>
		</button>
		<?php else : ?>
		<input type="submit" class="search-submit button" value="<?php _e('Hae', 'premius') ?>">
		<?php endif; ?>
		
		<div class="search-results"></div>
	</div>
</form>