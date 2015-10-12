<?php

/**
 * Retrieves a set of logs for a ship
 *
 * @param integer $ship_id Optional. Defaults to current post id. The post_id of the ship to retrieve logs of
 * @param array $query_args WP_Query args. For pagination and stuff
 * @return array
 **/
function get_ship_logs( $ship_id = null, $query_args = array() ) {
	return BLShipLog::get_instance()->getLogs( $ship_id, $query_args );
}
