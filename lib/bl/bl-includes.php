<?php

require_once( SHIPS_LOG_PLUGIN_DIR . 'lib/bl/bl-functions.php' );

/*
 * Custom DebugBar extension
 * 
 * Only include this if in wp-admin
 * OR if user has the bar enabled for the front end
 * 
 * HRM!!! THE $current_user VAR IS NOT AVAILABLE YET AT THIS POINT! GRR
 */
//if( is_admin() || get_user_meta( $current_user->ID, 'show_admin_bar_front', true ) ) {
if( is_admin() ) {

    // Fancy var_dump
    if( !class_exists( 'dBug' ) ) 
        require_once( SHIPS_LOG_PLUGIN_DIR . 'lib/bl/dBug.php' );

    /*
    * Local extension to debug bar
    */
    require_once( SHIPS_LOG_PLUGIN_DIR . 'lib/bl/BLDebugBar.class.php' );
}


/*
* Load generic plugin functions file
*/
require_once( SHIPS_LOG_PLUGIN_DIR . 'lib/functions.php' );