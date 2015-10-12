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

/**
 * Setup list of 3rd party plugins that "should" be installed also
 **/
function tgmpa_plugin_list() {
	$plugins = array(
		array(
			'name'				=> __( 'Shortcake (Shortcode UI)', 'blshiplog' ),
			'slug'				=> 'shortcode-ui',
			'required'			=> false,
			'force_activation'	=> true,
		),
	);

	$config = array(
		'id'			=> 'blshiplog-plugin-notice',
		'is_automatic'	=> true,
		'strings'		=> array(
			'notice_can_install_recommended'	=> _n_noop(
				'Ship Log recommends the following plugin: %1$s.',
				'Ship Log recommends the following plugins: %1$s.',
				'blshiplog'
			),
		),
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'tgmpa_plugin_list' );
