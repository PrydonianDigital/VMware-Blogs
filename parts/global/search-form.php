<div class="row expanded small-up-1 align-center align-stretch search animated fadeIn">

	<div class="column search">

		<div class="row">

			<div class="column">

				<form role="search" method="get" class="searchform group" action="<?php echo home_url( '/' ); ?>">

					<div class="input-group">

						<label for="searchInput" class="screen-reader-text"><?php _e( 'What are you looking for?', 'vmw' ) ?></label>

						<input type="search" class="search-field input-group-field" placeholder="<?php _e( 'What are you looking for?', 'vmw' ) ?>" value="<?php echo get_search_query() ?>" name="s" id="searchInput" title="<?php _e( 'What are you looking for?', 'vmw' ) ?>" data-swplive="true" />

						<div class="input-group-button">

							<button type="submit" class="button rounded" title="<?php _e( 'Search', 'vmw' ) ?>"><i class="fas fa-search" aria-hidden="true"></i></button>

						</div>

					</div>

				</form>

			</div>

		</div>

	</div>

</div>