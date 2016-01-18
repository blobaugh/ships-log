<?php

BLShipLog::get_instance();
class BLShipLog {

	/**
	 * Name of the CPT
	 *
	 * @var string
	 **/
	private $mPostType = 'blshiplog';

	/**
	 * Taxonomy names
	 *
	 * @var string
	 **/
	private $mSkipperTax 	= 'blskipper';
	private $mCrewTax 		= 'blcrew';
	private $mGuestTax		= 'blguest';
	private $mPeopleMet		= 'blpeoplemet';
	private $mPurposeTax	= 'blpurpose';
	private $mTrip			= 'bltrip'; // What trip is this entry part of

	/**
	 * Holds instance of this class
	 *
	 * @var BLShipLog
	 **/
	private static $instance = null;

	/**
	 * Default constructor - Singleton
	 **/
	private function __construct() {
		// Register the post type
		add_action( 'init', array( $this, 'registerPostType' ) );

		// Add meta box
		add_action( 'cmb2_init', array( $this, 'cmb2_init' ) );

		// Register the shared taxonomy
		add_action( 'init', array( $this, 'registerTaxonomy' ) );

		// Register shortcodes
		add_action( 'init', array( $this, 'registerShortcodes' ) );
	}

	/**
	 * Gets the single instance of this class
	 *
	 * @return BLShipLog
	 **/
	public static function get_instance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new BLShipLog();
		}
		return self::$instance;
	}

	/**
	 * Registers a new post type with WordPress
	 **/
	public function registerPostType() {
		global $blship;
		$labels = array(
            'name' => 'Ship Log',
            'singular_name' => 'Ship Log',
            'add_new' => 'New Log Entry ',
            'add_new_item' => 'New Log Entry',
            'edit_item' => 'Edit Log Entry',
            'new_item' => 'New Log Entry',
            'view_item' => 'View Log Entry',
            'search_items' => 'Search Logs',
            'not_found' => 'No Logs found',
            'not_found_in_trash' => 'No Logs found in trash'
        );
        
        $args = array(
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'labels' => $labels,
            'hierarchical' => false,
            'has_archive' => true,
            'query_var' => 'shiplog',
            'rewrite' => array( 'slug' => 'ship-log', 'with_front' => false ),
            'menu_icon' => SHIPS_LOG_PLUGIN_URL . 'images/ship-icons/aosicon112.png',
            'register_meta_box_cb' => array( &$blship, 'registerLogMetabox' )
            
        );
        
        register_post_type( $this->mPostType, $args );

	}

	public function registerTaxonomy() {
		$this->_registerTaxonomy( $this->mPurposeTax, 'Log Purpose' );
		$this->_registerTaxonomy( $this->mSkipperTax, 'Skippers' );
		$this->_registerTaxonomy( $this->mCrewTax, 'Crew' );
		$this->_registerTaxonomy( $this->mGuestTax, 'Guests' );
		$this->_registerTaxonomy( $this->mPeopleMet, 'People Met' );
		$this->_registerTaxonomy( $this->mTrip, 'Trip' );
	}
	private function _registerTaxonomy( $taxonomy, $name ) {
		$object_types = array(
			$this->mPostType
		);

		$labels = array(
			'name'		=> $name,
		);
		$args = array(
			'hierarchical'		=> false,
			'labels'			=> $labels,
			'show_ui'			=> true,
			'show_admin_column'	=> true,
			'query_var'			=> true,
			'rewrite'			=> array( 'slug' => 'ship/people' ),
			'meta_box_cb'		=> false,
		);
		register_taxonomy( $taxonomy, $object_types, $args );
	}

	/**
	 * Creates the metabox for the ship log via cmb2
	 **/
	public function cmb2_init() {
		$cmb = new_cmb2_box( array(
			'id'			=> 'ship-log',
			'title'			=> __( 'Log Details', 'blshiplog' ),
			'object_types'	=> array( $this->mPostType ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'show_names'	=> true,
		) );

		$cmb->add_field( array(
			'name'			=> 'Tax test',
			'id'			=> 'taxtTest',
			'type'			=> 'taxonomy_manage_select',
			'taxonomy'		=> $this->mSkipperTax,
		) );

		$cmb->add_field( array(
			'name'			=> 'T2',
			'id'			=> 't2',
			'type'			=> 'taxonomy_manage_select',
			'taxonomy'		=> $this->mCrewTax,
		) );

		$cmb->add_field( array( 
			'name'			=> __( 'Ship', 'blshiplog' ),
			'id'			=> 'ShipId',
			'type'			=> 'select',
			'options_cb'	=> array( $this, 'shipOptions' ),
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Log Purpose', 'blshiplog' ),
			'id'			=> 'Purpose',
			'taxonomy'		=> $this->mPurposeTax,
			'type'			=> 'taxonomy_radio',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Trip', 'blshiplog' ),
			'id'			=> 'Trip',
			'desc'			=> __( 'Trip this entry is part of (Optional)', 'blshiplog' ),
			'type'			=> 'taxonomy_radio',
			'taxonomy'		=> $this->mTrip,
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Location', 'blshiplog' ),
			'desc'			=> __( 'Place the marker to set the location or enter exact coordinates below', 'blshiplog' ),
			'id'			=> 'Location',
			'type'			=> 'pw_map',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Skipper', 'blshiplog' ),
			'id'			=> 'Skipper2',
			'taxonomy'		=> $this->mSkipperTax,
			'type'			=> 'taxonomy_multicheck',
		) );
		$cmb->add_field( array(
			'name'			=> __( 'Crew', 'blshiplog' ),
			'id'			=> 'Crew2',
			'taxonomy'		=> $this->mCrewTax,
			'type'			=> 'taxonomy_multicheck',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Guests', 'blshiplog' ),
			'id'			=> 'Guests2',
			'taxonomy'		=> $this->mGuestTax,
			'type'			=> 'taxonomy_multicheck',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Departure', 'blshiplog' ),
			'desc'			=> __( 'Date and Time of departure', 'blshiplog' ),
			'id'			=> 'Departure',
			'type'			=> 'text_datetime_timestamp',
		) );
		
		$cmb->add_field( array( 
			'name'			=> __( 'Estimated Arrival', 'blshiplog' ),
			'desc'			=> __( 'Date and Time of estimated arrival', 'blshiplog' ),
			'id'			=> 'EstimatedArrival',
			'type'			=> 'text_datetime_timestamp',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Actual Arrival', 'blshiplog' ),
			'desc'			=> __( 'Date and Time of actual arrival, if different than expected', 'blshiplog' ),
			'id'			=> 'ActualArrival',
			'type'			=> 'text_datetime_timestamp',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Route', 'blshiplog' ),
			'id'			=> 'Route',
			'type'			=> 'textarea',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Distance Traveled', 'blshiplog' ),
			'id'			=> 'DistanceTraveled',
			'type'			=> 'text',
		) );

		$cmb->add_field( array(
			'name'			=> __ ( 'Weather Forecast', 'blshiplog' ),
			'id'			=> 'WeatherForecast',
			'type'			=> 'text',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Weather Observed', 'blshiplog' ),
			'id'			=> 'WeatherObserved',
			'type'			=> 'text',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Food Consumed', 'blshiplog' ),
			'id'			=> 'FoodConsumed',
			'type'			=> 'text',
		) );

		// People met

		$cmb->add_field( array(
			'name'			=> __( 'Average Motor RPMs', 'blshiplog' ),
			'id'			=> 'AverageMotorRpms',
			'type'			=> 'text',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Fuel Intake', 'blshiplog' ),
			'id'			=> 'FuelIntake',
			'type'			=> 'text',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Fuel Used', 'blshiplog' ),
			'id'			=> 'FuelUsed',
			'type'			=> 'text',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Water Intake', 'blshiplog' ),
			'id'			=> 'WaterIntake',
			'type'			=> 'text',
		) );

		$cmb->add_field( array(
			'name'			=> __( 'Water Used', 'blshiplog' ),
			'id'			=> 'WaterUsed',
			'type'			=> 'text'
		) );
	} // end cmb2_init


	/**
	 * Returns a list of ships as an array to be used by cmb2
	 *
	 * @return array
	 **/
	public function shipOptions() {
		$args = array(
        	'post_type'   => 'blship',
        	'numberposts' => 10,
    	);

    	$posts = get_posts( $args );

    	$post_options = array();
    	if ( $posts ) {
        	foreach ( $posts as $post ) {
          	  $post_options[ $post->ID ] = $post->post_title;
        	}
    	}
    	return $post_options;	
	}

	/**
	 * Retrieves the logs of a speciic ship
	 *
	 * @param integer $ship_id Optional. Defaults to the current post id
	 * @param array $query_args WP_Query args. For pagination and stuff
	 * @return array
	 **/
	public function getLogs( $ship_id = null, $query_args = array() ) {
		// Determine the id of the post
		if( is_null( $ship_id ) ) {
			$ship_id = get_queried_object_id();
		}

		$args = wp_parse_args( $query_args, array(
			'post_type'		=> $this->mPostType,
			'numberposts'	=> 10,
			'meta_key'		=> 'ShipId',
			'meta_value'	=> (int)$ship_id,
		) );;

		return new WP_Query( $args );
	}

	/**
	 * Adds ship log shortcodes
	 **/
	public function registerShortcodes() {
		add_shortcode( 'ship-logs', array( $this, 'shortcodeShipLogs' ) );

	}

	/**
	 * Function that builds the ship logs shortcode data
	 *
	 * @param array $atts
	 * @param string $content No used!
	 * @return string
	 **/
	public function shortcodeShipLogs( $atts, $content = '' ) {
		$ship_id = ( isset( $atts['ship'] ) )? $atts['ship']: null;
		$posts = $this->getLogs( $ship_id );

		require( SHIPS_LOG_PLUGIN_DIR . 'views/shortcode_ship-logs.php' );

		wp_reset_postdata();
	}

	/**
	 * Magic method
	 *
	 * @param string $what
	 * @return mixed
	 **/
	public function __get( $what ) {
		switch( $what ) {
			case 'postType':
				return $this->mPostType;
				break;
		}
		return null;
	}
} // end class
