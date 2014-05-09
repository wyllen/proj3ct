<?php
show_admin_bar(false);

register_sidebar( array( 'id' => 'sidebar', 'name' => __( 'Main Sidebar', $text_domain ) ) );

/*----------------------------------------- AJAX -------------------------------------*/



add_action( 'wp_ajax_get_sidebar_left', 'get_sidebar_left' );

function get_sidebar_left() {
	global $wpdb; // this is how you get access to the database

		get_sidebar();

	die(); // this is required to return a proper result
}
add_action( 'wp_ajax_get_detail', 'get_detail' );

function get_detail() {
	global $wpdb; // this is how you get access to the database

		get_template_part( 'detail',$_REQUEST['podtype']);

	die(); // this is required to return a proper result
}