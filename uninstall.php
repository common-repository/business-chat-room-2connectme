<?php
/*
Runs on Uninstall of Live Chat - 2ConnectMe
Plugin URI: https://wordpress.org/plugins/business-chat-room-2connectme/
*/


// Check that we should be doing this
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit; // Exit if accessed directly
}


// Delete Options

$options = array(
	'livechat_2connectme_elements_options',
	'livechat_2connectme_elements_options9',
);

foreach ( $options as $option ) {
	if ( get_option( $option ) ) {
		delete_option( $option );
	}
}