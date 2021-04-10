<?php

add_action( 'rest_api_init', function(){
	register_rest_route( WELLRIX_SMTP_PLUGIN_NAME . '/v2', '/api/mail/send', [
		'methods'  => 'POST',
		'callback' => 'send_mail',
	] );
	
} );

// Report api routes
function send_mail( WP_REST_Request $request ){

	include( WELLRIX_SMTP_PLUGIN_PATH . 'api/mail/send.php' );
}
?>