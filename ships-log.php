<?php
/*
Plugin Name: Ships Log
Plugin URI: https://github.com/blobaugh/ships-log
Description: Plugin to add a ship's log capability to WordPress. Create ship profiles and store logs for each trip per ship
Version: 0.6
Author: Ben Lobaugh
Author URI: http://ben.lobaugh.net
License: 
License URI: 
Text Domain: ships-log
*/
define( 'SHIPS_LOG_TEXTDOMAIN', 'ships-log' );
define( 'SHIPS_LOG_PLUGIN_DIR', trailingslashit( dirname( __FILE__) ) );
define( 'SHIPS_LOG_PLUGIN_URL', trailingslashit ( WP_PLUGIN_URL . "/" . basename( __DIR__  ) ) );
define( 'SHIPS_LOG_PLUGIN_FILE', SHIPS_LOG_PLUGIN_DIR . basename( __DIR__  ) . ".php" );

require_once( SHIPS_LOG_PLUGIN_DIR . 'lib/bl/bl-includes.php' ); // Required to setup bl functionality


/*
 * **************************************************************************
 * **************************************************************************
 * ******** YOU MAY BEGIN YOUR CUSTOM PLUGIN CODE BELOW THIS COMMENT ********
 * **************************************************************************
 * **************************************************************************
 */
require_once( 'lib/Ships.class.php' );
//
////add_action( 'transition_post_status', 'test_publish_post', 10, 3 );
//add_action( 'publish_blshiplog', 'test_publish_post' );//, 10, 3 );
//
//function test_publish_post( $post_id ) {
////    die( var_dump($post_id) );
////    if( $new_status == 'publish' ) 
////        die( 'publishing ' );
//    //die('test_publish_post' );
//}