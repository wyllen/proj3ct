	<style id="search_style">
	</style>
	<div class="parent-box-head">
				<div class="sidebar-search-input-wrapper input-wrapper">
					<input type="text" class="sidebar-search-input">					
				</div>
			</div>	
			<div class="box-content">
				<div class="item-add-input-wrapper input-wrapper">
					<form>
						<input type="text" class="item-add-input" placeholder="Nouveau client">
						<span class="item-submit"></span>				
					</form>					
				</div>
				<div class="sidebar-search-result">
					<ul class="item-list">

						<?php
$args = array(
	'post_type' => 'projet'
);
// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		echo '<li class="item-list-wrapper" data-search="' . strtolower ( get_the_title() ) . '"><a href="#detail" class="item-list-link" data-detail-type="client">' . get_the_title() . '</a><span class="item-list-delete item-delete"></span></li>';
	}
} else {
		echo '<li class="item-list-wrapper">Pas de client.</li>';
}
/* Restore original Post Data */
wp_reset_postdata();
?></ul>					
				</div>
			</div>	