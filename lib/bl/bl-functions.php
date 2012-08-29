<?php

if( !function_exists( 'ships_log_debug' ) ) {
    /**
     * Sends debugging data to a custom debug bar extension
     * 
     * @since 1.0
     * @param String $title
     * @param Mixed $data
     * @param String $format Optional - (Default:log) log | warning | error | notice | dump
     */
    function ships_log_debug( $title, $data, $format='log' ) { 
        do_action( 'ships_log_debug', $title, $data, $format );
    }
}

if( !function_exists( 'ships_log_dump' ) ) {
    /**
     * Sends an object to a custom debug bar extension to be dumped with a 
     * fancy var_dump variant
     * 
     * @since 1.0
     * @param String $title
     * @param Mixed $data 
     */
    function ships_log_dump( $title, $data) { 
        do_action( 'ships_log_debug', $title, $data, 'dump' );
    }
}