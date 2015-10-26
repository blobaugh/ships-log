<?php
$bl_ship = new BL_Ship();
$bl_ship->hooks();
class BL_Ship {

	/**
	 * Name of post type
	 *
	 * @var string
	 **/
	private $mPostType = 'blship';

	/**
	 * Sets the WordPress hooks
	 **/
	public function hooks() {
		add_filter( 'the_content', array( $this, 'render_ship_details_in_log' ) );
	}

	public function render_ship_details_in_log( $content ) {
		global $post;

		// Make sure we are on a log page
		if( BLShipLog::get_instance()->postType != $post->post_type ) {
			// Nope, lets stop here
			return $content;
		}

		// Get the ship id from the log entry
		$ship_id = $post->ShipId;
	
		// Get the ship
		$ship = $this->getShip( $ship_id );

		// Load the view file for this ship
		ob_start();
		if( $template = locate_template( 'content-ship-the_content.php' ) ) {
			/*
			 * Developers can place the file 'content-ship.php'
			 * in either a child or parent theme to override the
			 * template included in this plugin
			 */
			 require( $template );
		} else {
			require( SHIPS_LOG_PLUGIN_DIR . 'views/content-ship-the_content.php' );
		}
		$log_template = ob_get_contents();
		ob_end_clean();

		/*
		 * Should the ship show before or after the content?
		 *
		 * Relies on an option being set. If the option is not set then
		 * display after
		 */
		 return $content . $log_template;

	}

	/**
	 * Retrieves the passed in ship id
	 *
	 * @param integer $ship_id
	 * @return WP_Post
	 **/
	public function getShip( $ship_id  ) {
		$post = get_post( $ship_id );
		if( $post->post_type == $this->mPostType ) {
			return $post;
		}
		return new WP_Post();
	}
} // end class
