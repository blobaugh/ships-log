<?php
/*
Plugin Name: Ships Log
Plugin URI: https://github.com/blobaugh/ships-log
Description: Plugin to add a ship's log capability to WordPress. Create ship profiles and store logs for each trip per ship
Version: 1.3.3
Author: Ben Lobaugh
Author URI: http://ben.lobaugh.net
License: 
License URI: 
Text Domain: ships-log
*/
define( 'SHIPS_LOG_PLUGIN_DIR', trailingslashit( dirname( __FILE__) ) );
define( 'SHIPS_LOG_PLUGIN_URL', trailingslashit ( WP_PLUGIN_URL . "/" . basename( __DIR__  ) ) );
define( 'SHIPS_LOG_PLUGIN_FILE', SHIPS_LOG_PLUGIN_DIR . basename( __DIR__  ) . ".php" );

require_once( SHIPS_LOG_PLUGIN_DIR . '3rd-party/class-tgm-plugin-activation.php' );
require_once( SHIPS_LOG_PLUGIN_DIR . '3rd-party/cmb2/init.php' );

require_once( SHIPS_LOG_PLUGIN_DIR . 'lib/functions.php' ); // Required to setup bl functionality

require_once( 'lib/Ships.class.php' );

require_once( SHIPS_LOG_PLUGIN_DIR . 'lib/Ship.class.php' );
require_once( SHIPS_LOG_PLUGIN_DIR . 'lib/ShipLog.class.php' );

function get_ship_from_log() {
	global $post;

	// Make sure we are on a log page
	if( BLShipLog::get_instance()->postType != $post->post_type ) { 
		// Nope, stop here
		return;
	}

	$ship = new BL_Ship();
	return $ship->getShip( $post->ShipId );
}
